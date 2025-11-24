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
 * Debug helper - Add ?soda_debug_fonts=1 to any admin URL to see debug info
 * Example: wp-admin/index.php?soda_debug_fonts=1
 */
function soda_theme_debug_custom_fonts() {
	// Temporarily remove all checks to test
	echo '<div class="notice notice-error" style="border: 5px solid red; padding: 20px; margin: 20px 0;"><h1 style="color: red;">🔴 FUNCTION RUNS - NO CHECKS</h1><p>If you see this, the function is executing!</p></div>';
	
	if ( ! current_user_can( 'manage_options' ) ) {
		echo '<div class="notice notice-error"><p>❌ Stopped: No manage_options capability</p></div>';
		return;
	}
	
	// Only show if debug parameter is set
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( ! isset( $_GET['soda_debug_fonts'] ) || empty( $_GET['soda_debug_fonts'] ) ) {
		echo '<div class="notice notice-error"><p>❌ Stopped: Parameter not set or empty</p></div>';
		return;
	}
	
	// Force output to test if function runs
	echo '<div class="notice notice-warning" style="border-left-color: #ff0000; border-width: 5px;"><h2>🔴 DEBUG FUNCTION IS RUNNING!</h2></div>';

	// Check what's detected
	$debug_info = array();
	
	$debug_info['debug_active'] = 'YES - Debug is working!';
	$debug_info['current_url'] = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : 'unknown';

	// Check Elementor
	if ( did_action( 'elementor/loaded' ) ) {
		$debug_info['elementor_loaded'] = 'YES';
		$debug_info['elementor_fonts_option'] = get_option( 'elementor_custom_fonts', 'not found' );
		
		// Check for font posts
		$font_posts = get_posts(
			array(
				'post_type'      => 'elementor_font',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			)
		);
		$debug_info['elementor_font_posts_count'] = count( $font_posts );
		if ( ! empty( $font_posts ) ) {
			$debug_info['elementor_font_names'] = array();
			foreach ( $font_posts as $post ) {
				$debug_info['elementor_font_names'][] = get_the_title( $post->ID );
			}
		}
	} else {
		$debug_info['elementor_loaded'] = 'NO - Elementor not detected';
	}

	// Check Custom Fonts plugin
	if ( class_exists( 'Bsf_Custom_Fonts_Render' ) ) {
		$debug_info['custom_fonts_plugin'] = 'YES';
		$fonts = Bsf_Custom_Fonts_Render::get_instance()->get_existing_font_posts();
		$debug_info['custom_fonts_count'] = count( $fonts );
	} else {
		$debug_info['custom_fonts_plugin'] = 'NO - Custom Fonts plugin not detected';
	}

	// Check what's stored
	$debug_info['stored_custom_fonts'] = get_option( 'soda_theme_custom_fonts', 'not set' );
	$debug_info['stored_elementor_fonts'] = get_option( 'soda_theme_elementor_fonts', 'not set' );

	// Check the final fonts list
	$fonts_list = apply_filters( 'soda_theme_fonts_list', array() );
	if ( isset( $fonts_list['families'] ) && ! empty( $fonts_list['families'] ) ) {
		$debug_info['families_detected'] = array_keys( $fonts_list['families'] );
		$debug_info['total_fonts_count'] = count( $fonts_list['families'] );
	} else {
		$debug_info['families_detected'] = 'NONE - No custom fonts detected';
	}

	echo '<div class="notice notice-info" style="padding: 15px;"><h2 style="margin-top: 0;">🔍 Soda Theme Custom Fonts Debug</h2>';
	echo '<p><strong>This debug box shows what custom fonts are detected by the theme.</strong></p>';
	echo '<pre style="background: #f5f5f5; padding: 15px; overflow: auto; max-height: 500px;">';
	print_r( $debug_info );
	echo '</pre>';
	echo '<p><strong>Need help?</strong> Check if:</p>';
	echo '<ul>';
	echo '<li>Elementor Pro is installed and active (required for custom fonts)</li>';
	echo '<li>You have added custom fonts in Elementor > Custom Fonts</li>';
	echo '<li>Font posts are published (not draft)</li>';
	echo '</ul>';
	echo '<p><a href="' . esc_url( admin_url( 'admin.php?page=elementor-custom-fonts' ) ) . '" class="button">Go to Elementor Custom Fonts</a></p>';
	echo '</div>';
}

// Always hook the debug function (it only shows when ?soda_debug_fonts=1 is in URL)
add_action( 'admin_notices', 'soda_theme_debug_custom_fonts', 5 );

/**
 * Quick test function - Shows a simple message to confirm theme is active
 * Remove this after confirming the theme files are loaded
 */
function soda_theme_test_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	
	// Only show if NOT debugging
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( isset( $_GET['soda_debug_fonts'] ) && ! empty( $_GET['soda_debug_fonts'] ) ) {
		return; // Don't show this notice when debug is active
	}
	
	echo '<div class="notice notice-success"><p><strong>✓ Soda Theme is active and loaded!</strong> To see custom fonts debug, add <code>?soda_debug_fonts=1</code> to the URL.</p></div>';
}
add_action( 'admin_notices', 'soda_theme_test_notice', 10 );
