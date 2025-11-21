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
}
add_action( 'customize_preview_init', 'soda_theme_customize_preview_js' );
