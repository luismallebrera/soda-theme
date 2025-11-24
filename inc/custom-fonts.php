<?php
/**
 * Add Custom Fonts / Typekit Fonts to Kirki
 * Integrates custom fonts from plugins like Elementor Custom Fonts, Custom Fonts, and Custom Typekit Fonts
 *
 * @package Soda_Theme
 * @author VLThemes (adapted)
 * @version 1.0
 */

if ( ! class_exists( 'Soda_Theme_Add_Custom_Fonts' ) ) {
	class Soda_Theme_Add_Custom_Fonts {

		/**
		 * The single class instance.
		 * @var $_instance
		 */
		private static $_instance = null;

		/**
		 * Main Instance
		 * Ensures only one instance of this class exists in memory at any one time.
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
				self::$_instance->init_hooks();
			}
			return self::$_instance;
		}

		public function __construct() {
			// We do nothing here!
		}

		/**
		 * Init hooks
		 */
		public function init_hooks() {
			add_action( 'init', array( $this, 'prepare_custom_fonts' ) );
			add_filter( 'soda_theme_fonts_list', array( $this, 'custom_fonts' ), 20 );
			add_filter( 'soda_theme_fonts_list', array( $this, 'typekit_fonts' ), 20 );
		}

		/**
		 * Prepare Custom fonts
		 * Supports both Elementor Custom Fonts and Custom Fonts plugin
		 */
		public function prepare_custom_fonts() {

			// Support for Custom Fonts plugin (used by Elementor)
			if ( class_exists( 'Bsf_Custom_Fonts_Render' ) ) {

				$fonts = Bsf_Custom_Fonts_Render::get_instance()->get_existing_font_posts();
				$custom_fonts = array();

				if ( ! empty( $fonts ) ) {
					foreach ( $fonts as $key => $post_id ) {
						$font_family_name = get_the_title( $post_id );
						$custom_fonts[ $font_family_name ] = $font_family_name;
					}
				}
				update_option( 'soda_theme_custom_fonts', $custom_fonts );
			}

			return;

		}

		/**
		 * Custom fonts
		 */
		public function custom_fonts( $fonts ) {

			$custom_fonts = get_option( 'soda_theme_custom_fonts' );

			if ( ! empty( $custom_fonts ) ) {

				$fonts['families']['custom_fonts'] = array(
					'text'     => esc_html__( 'Custom Fonts', 'soda-theme' ),
					'children' => array(),
				);

				foreach ( $custom_fonts as $font => $key ) {

					$fonts['families']['custom_fonts']['children'][] = array(
						'id'   => $font,
						'text' => $font,
					);

					// Add all font weights for custom fonts
					$fonts['variants'][ $font ] = array( '100', '200', '300', '400', '500', '600', '700', '800', '900' );

				}

			}

			return $fonts;

		}

		/**
		 * Typekit fonts
		 */
		public function typekit_fonts( $fonts ) {

			$typekit_data = get_option( 'custom-typekit-fonts' );

			if ( ! empty( $typekit_data ) && isset( $typekit_data['custom-typekit-font-details'] ) ) {

				$typekit_fonts = $typekit_data['custom-typekit-font-details'];

				$fonts['families']['typekit_fonts'] = array(
					'text'     => esc_html__( 'TypeKit Fonts', 'soda-theme' ),
					'children' => array(),
				);

				foreach ( $typekit_fonts as $font ) {

					$id = $font['slug'];

					$fonts['families']['typekit_fonts']['children'][] = array(
						'id'   => $font['slug'],
						'text' => $font['family'],
					);

					$fonts['variants'][ $id ] = $font['weights'];

				}

			}

			return $fonts;

		}

	}

	return Soda_Theme_Add_Custom_Fonts::instance();

}

add_filter( 'soda_theme_fonts_choices', 'soda_theme_kirki_fonts_choices' );

/**
 * Add support for custom fonts in Kirki
 */
function soda_theme_kirki_fonts_choices( $settings = array() ) {

	$fonts_list = apply_filters( 'soda_theme_fonts_list', array() );

	if ( ! $fonts_list ) {
		return $settings;
	}

	$fonts_settings = array(
		'fonts' => array(
			'google'   => array(),
			'families' => isset( $fonts_list['families'] ) ? $fonts_list['families'] : null,
			'variants' => isset( $fonts_list['variants'] ) ? $fonts_list['variants'] : null,
		),
	);

	$fonts_settings = array_merge( (array) $fonts_settings, (array) $settings );

	return $fonts_settings;
}
