<?php
/**
 * soda-theme Theme Customizer
 *
 * @package soda-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function soda_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'soda_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'soda_theme_customize_partial_blogdescription',
			)
		);
	}

	// Add Logo Settings Section
	$wp_customize->add_section(
		'soda_theme_logo_settings',
		array(
			'title'    => __( 'Logo Settings', 'soda-theme' ),
			'priority' => 29,
		)
	);

	// Sticky Logo Upload
	$wp_customize->add_setting(
		'sticky_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'sticky_logo',
			array(
				'label'       => __( 'Sticky Header Logo', 'soda-theme' ),
				'description' => __( 'Upload a logo to be displayed when the header is sticky/scrolled.', 'soda-theme' ),
				'section'     => 'soda_theme_logo_settings',
				'mime_type'   => 'image',
			)
		)
	);

	// Regular Logo Width
	$wp_customize->add_setting(
		'regular_logo_width',
		array(
			'default'           => 150,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'regular_logo_width',
		array(
			'label'       => __( 'Regular Logo Width (px)', 'soda-theme' ),
			'description' => __( 'Set the width for the regular logo.', 'soda-theme' ),
			'section'     => 'soda_theme_logo_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 50,
				'max'  => 500,
				'step' => 5,
			),
		)
	);

	// Sticky Logo Width
	$wp_customize->add_setting(
		'sticky_logo_width',
		array(
			'default'           => 100,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'sticky_logo_width',
		array(
			'label'       => __( 'Sticky Logo Width (px)', 'soda-theme' ),
			'description' => __( 'Set the width for the sticky header logo.', 'soda-theme' ),
			'section'     => 'soda_theme_logo_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 50,
				'max'  => 300,
				'step' => 5,
			),
		)
	);

	// Add Header Layout Section
	$wp_customize->add_section(
		'soda_theme_header_layout',
		array(
			'title'    => __( 'Header Layout', 'soda-theme' ),
			'priority' => 30,
		)
	);

	// Add Header Layout Setting
	$wp_customize->add_setting(
		'header_layout_style',
		array(
			'default'           => 'layout-1',
			'sanitize_callback' => 'soda_theme_sanitize_header_layout',
			'transport'         => 'refresh',
		)
	);

	// Add Header Layout Control
	$wp_customize->add_control(
		'header_layout_style',
		array(
			'label'       => __( 'Header Layout Style', 'soda-theme' ),
			'description' => __( 'Choose your preferred header layout style.', 'soda-theme' ),
			'section'     => 'soda_theme_header_layout',
			'type'        => 'select',
			'choices'     => array(
				'layout-1' => __( 'Layout 1 - Default (Logo Left, Menu Right)', 'soda-theme' ),
				'layout-2' => __( 'Layout 2 - Centered (Logo & Menu Centered)', 'soda-theme' ),
				'layout-3' => __( 'Layout 3 - Stacked (Logo Above Menu)', 'soda-theme' ),
				'layout-4' => __( 'Layout 4 - Full Width (Menu Below Logo)', 'soda-theme' ),
			),
		)
	);
}

/**
 * Sanitize header layout setting.
 *
 * @param string $input The input value.
 * @return string Sanitized value.
 */
function soda_theme_sanitize_header_layout( $input ) {
	$valid = array( 'layout-1', 'layout-2', 'layout-3', 'layout-4' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'layout-1';
}
add_action( 'customize_register', 'soda_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function soda_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function soda_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function soda_theme_customize_preview_js() {
	wp_enqueue_script( 'soda-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
	
	// Pass logo width settings to customizer JS
	$logo_data = array(
		'regular_logo_width' => get_theme_mod( 'regular_logo_width', 150 ),
		'sticky_logo_width'  => get_theme_mod( 'sticky_logo_width', 100 ),
	);
	wp_localize_script( 'soda-theme-customizer', 'sodaThemeLogoData', $logo_data );
}
add_action( 'customize_preview_init', 'soda_theme_customize_preview_js' );

/**
 * Output custom logo styles.
 */
function soda_theme_logo_styles() {
	$regular_logo_width = get_theme_mod( 'regular_logo_width', 150 );
	$sticky_logo_width  = get_theme_mod( 'sticky_logo_width', 100 );
	$sticky_logo_id     = get_theme_mod( 'sticky_logo' );
	
	$css = '<style type="text/css">';
	
	// Regular logo width
	if ( $regular_logo_width ) {
		$css .= '.custom-logo { max-width: ' . absint( $regular_logo_width ) . 'px; height: auto; }';
	}
	
	// Sticky logo styles
	if ( $sticky_logo_id && $sticky_logo_width ) {
		$css .= '.site-header.sticky-header .custom-logo { max-width: ' . absint( $sticky_logo_width ) . 'px; }';
		$css .= '.site-header.sticky-header .custom-logo-link { background-image: url(' . esc_url( wp_get_attachment_url( $sticky_logo_id ) ) . '); }';
		$css .= '.site-header.sticky-header .custom-logo-link .custom-logo { opacity: 0; }';
		$css .= '.custom-logo-link { background-size: contain; background-repeat: no-repeat; background-position: center; display: inline-block; }';
	}
	
	$css .= '</style>';
	
	echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_head', 'soda_theme_logo_styles' );
