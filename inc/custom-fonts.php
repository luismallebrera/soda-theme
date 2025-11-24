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
		add_action( 'init', array( $this, 'prepare_custom_fonts' ), 999 );
		add_filter( 'soda_theme_fonts_list', array( $this, 'elementor_custom_fonts' ), 10 );
		add_filter( 'soda_theme_fonts_list', array( $this, 'custom_fonts' ), 20 );
		add_filter( 'soda_theme_fonts_list', array( $this, 'typekit_fonts' ), 30 );
	}

	/**
	 * Prepare Custom fonts
	 * Supports both Elementor Custom Fonts and Custom Fonts plugin
	 */
	public function prepare_custom_fonts() {

		// Support for Custom Fonts plugin (used by some themes)
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

		// Support for Elementor Custom Fonts
		if ( did_action( 'elementor/loaded' ) ) {
			$elementor_fonts = get_option( 'elementor_custom_fonts', array() );
			if ( ! empty( $elementor_fonts ) ) {
				update_option( 'soda_theme_elementor_fonts', $elementor_fonts );
			}
		}

		return;

	}

	/**
	 * Elementor Custom Fonts
	 */
	public function elementor_custom_fonts( $fonts ) {

		// Method 1: Check Elementor's custom fonts option
		$elementor_fonts = get_option( 'elementor_custom_fonts', array() );

		// Method 2: Try to get fonts from Elementor Pro if available
		if ( empty( $elementor_fonts ) && class_exists( '\ElementorPro\Modules\AssetsManager\Classes\Assets_Manager' ) ) {
			$assets_manager = \ElementorPro\Modules\AssetsManager\Classes\Assets_Manager::instance();
			if ( method_exists( $assets_manager, 'get_custom_fonts' ) ) {
				$elementor_fonts = $assets_manager->get_custom_fonts();
			}
		}

		// Method 3: Query custom font posts directly
		if ( empty( $elementor_fonts ) && did_action( 'elementor/loaded' ) ) {
			$font_posts = get_posts(
				array(
					'post_type'      => 'elementor_font',
					'posts_per_page' => -1,
					'post_status'    => 'publish',
				)
			);

			if ( ! empty( $font_posts ) ) {
				$elementor_fonts = array();
				foreach ( $font_posts as $post ) {
					$font_data = get_post_meta( $post->ID, '_elementor_font_data', true );
					$font_name = get_the_title( $post->ID );
					if ( ! empty( $font_name ) ) {
						$elementor_fonts[ $font_name ] = array(
							'name' => $font_name,
							'id'   => $post->ID,
						);
					}
				}
			}
		}

		if ( ! empty( $elementor_fonts ) ) {

			$fonts['families']['elementor_fonts'] = array(
				'text'     => esc_html__( 'Elementor Custom Fonts', 'soda-theme' ),
				'children' => array(),
			);

			foreach ( $elementor_fonts as $font_key => $font_data ) {

				// Handle different data structures
				$font_name = is_array( $font_data ) && isset( $font_data['name'] ) ? $font_data['name'] : $font_key;
				
				$fonts['families']['elementor_fonts']['children'][] = array(
					'id'   => $font_name,
					'text' => $font_name,
				);

				// Add all font weights for Elementor custom fonts
				$fonts['variants'][ $font_name ] = array( '100', '200', '300', '400', '500', '600', '700', '800', '900' );

			}

		}

		return $fonts;

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

/**
 * Debug helper - Add to check what fonts are detected
 * Add this to your functions.php temporarily: add_action('admin_notices', 'soda_theme_debug_custom_fonts');
 */
function soda_theme_debug_custom_fonts() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Check what's detected
	$debug_info = array();

	// Check Elementor
	if ( did_action( 'elementor/loaded' ) ) {
		$debug_info['elementor_loaded'] = true;
		$debug_info['elementor_fonts_option'] = get_option( 'elementor_custom_fonts', 'not found' );
		
		// Check for font posts
		$font_posts = get_posts(
			array(
				'post_type'      => 'elementor_font',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			)
		);
		$debug_info['elementor_font_posts'] = count( $font_posts ) . ' posts found';
		if ( ! empty( $font_posts ) ) {
			foreach ( $font_posts as $post ) {
				$debug_info['font_post_' . $post->ID] = get_the_title( $post->ID );
			}
		}
	} else {
		$debug_info['elementor_loaded'] = false;
	}

	// Check Custom Fonts plugin
	if ( class_exists( 'Bsf_Custom_Fonts_Render' ) ) {
		$debug_info['custom_fonts_plugin'] = true;
		$fonts = Bsf_Custom_Fonts_Render::get_instance()->get_existing_font_posts();
		$debug_info['custom_fonts_count'] = count( $fonts );
	} else {
		$debug_info['custom_fonts_plugin'] = false;
	}

	// Check what's stored
	$debug_info['stored_custom_fonts'] = get_option( 'soda_theme_custom_fonts', 'not set' );
	$debug_info['stored_elementor_fonts'] = get_option( 'soda_theme_elementor_fonts', 'not set' );

	// Check the final fonts list
	$fonts_list = apply_filters( 'soda_theme_fonts_list', array() );
	$debug_info['families_detected'] = isset( $fonts_list['families'] ) ? array_keys( $fonts_list['families'] ) : 'none';

	echo '<div class="notice notice-info"><h3>Soda Theme Custom Fonts Debug</h3><pre>';
	print_r( $debug_info );
	echo '</pre><p><strong>To use debug:</strong> Add this to functions.php: <code>add_action(\'admin_notices\', \'soda_theme_debug_custom_fonts\');</code></p></div>';
}
