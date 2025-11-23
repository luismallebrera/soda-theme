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

	// Add Header Behavior Section
	$wp_customize->add_section(
		'soda_theme_header_behavior',
		array(
			'title'    => __( 'Header Behavior', 'soda-theme' ),
			'priority' => 31,
		)
	);

	// Enable Sticky Header
	$wp_customize->add_setting(
		'enable_sticky_header',
		array(
			'default'           => true,
			'sanitize_callback' => 'rest_sanitize_boolean',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'enable_sticky_header',
		array(
			'label'       => __( 'Enable Sticky Header', 'soda-theme' ),
			'description' => __( 'Make the header stick to the top when scrolling.', 'soda-theme' ),
			'section'     => 'soda_theme_header_behavior',
			'type'        => 'checkbox',
		)
	);

	// Enable Fixed Header
	$wp_customize->add_setting(
		'enable_fixed_header',
		array(
			'default'           => false,
			'sanitize_callback' => 'rest_sanitize_boolean',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'enable_fixed_header',
		array(
			'label'       => __( 'Enable Fixed Header', 'soda-theme' ),
			'description' => __( 'Keep the header fixed at the top of the page at all times.', 'soda-theme' ),
			'section'     => 'soda_theme_header_behavior',
			'type'        => 'checkbox',
		)
	);

	// Enable Transparent Header
	$wp_customize->add_setting(
		'enable_transparent_header',
		array(
			'default'           => false,
			'sanitize_callback' => 'rest_sanitize_boolean',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'enable_transparent_header',
		array(
			'label'       => __( 'Enable Transparent Header', 'soda-theme' ),
			'description' => __( 'Make the header background transparent (works best on homepage with hero images).', 'soda-theme' ),
			'section'     => 'soda_theme_header_behavior',
			'type'        => 'checkbox',
		)
	);

	// Scroll Threshold
	$wp_customize->add_setting(
		'scroll_threshold',
		array(
			'default'           => 100,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'scroll_threshold',
		array(
			'label'       => __( 'Scroll Threshold (px)', 'soda-theme' ),
			'description' => __( 'Number of pixels to scroll before adding "scrolled" class to body and header.', 'soda-theme' ),
			'section'     => 'soda_theme_header_behavior',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 500,
				'step' => 10,
			),
		)
	);

	// Add Header Spacing Section
	$wp_customize->add_section(
		'soda_theme_header_spacing',
		array(
			'title'    => __( 'Header Spacing', 'soda-theme' ),
			'priority' => 32,
		)
	);

	// Header Padding Top
	$wp_customize->add_setting(
		'header_padding_top',
		array(
			'default'           => 24,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_padding_top',
		array(
			'label'       => __( 'Header Padding Top (px)', 'soda-theme' ),
			'description' => __( 'Set the top padding for the header.', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	);

	// Header Padding Bottom
	$wp_customize->add_setting(
		'header_padding_bottom',
		array(
			'default'           => 24,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_padding_bottom',
		array(
			'label'       => __( 'Header Padding Bottom (px)', 'soda-theme' ),
			'description' => __( 'Set the bottom padding for the header.', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	);

	// Sticky Header Padding Top
	$wp_customize->add_setting(
		'sticky_header_padding_top',
		array(
			'default'           => 12,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'sticky_header_padding_top',
		array(
			'label'       => __( 'Sticky Header Padding Top (px)', 'soda-theme' ),
			'description' => __( 'Set the top padding for the sticky header.', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	);

	// Sticky Header Padding Bottom
	$wp_customize->add_setting(
		'sticky_header_padding_bottom',
		array(
			'default'           => 12,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'sticky_header_padding_bottom',
		array(
			'label'       => __( 'Sticky Header Padding Bottom (px)', 'soda-theme' ),
			'description' => __( 'Set the bottom padding for the sticky header.', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		)
	);

	// Header Container Width Type
	$wp_customize->add_setting(
		'header_container_width_type',
		array(
			'default'           => 'boxed',
			'sanitize_callback' => 'soda_theme_sanitize_container_width',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'header_container_width_type',
		array(
			'label'       => __( 'Header Container Width', 'soda-theme' ),
			'description' => __( 'Choose between boxed or full width container.', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'select',
			'choices'     => array(
				'boxed'      => __( 'Boxed (Max Width with Padding)', 'soda-theme' ),
				'full-width' => __( 'Full Width (Edge to Edge)', 'soda-theme' ),
			),
		)
	);

	// Header Padding Left Unit
	$wp_customize->add_setting(
		'header_padding_left_unit',
		array(
			'default'           => 'px',
			'sanitize_callback' => 'soda_theme_sanitize_unit',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_padding_left_unit',
		array(
			'label'   => __( 'Left Padding Unit', 'soda-theme' ),
			'section' => 'soda_theme_header_spacing',
			'type'    => 'select',
			'choices' => array(
				'px'  => __( 'px', 'soda-theme' ),
				'%'   => __( '%', 'soda-theme' ),
				'vw'  => __( 'vw', 'soda-theme' ),
			),
		)
	);

	// Header Padding Left
	$wp_customize->add_setting(
		'header_padding_left',
		array(
			'default'           => 16,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_padding_left',
		array(
			'label'       => __( 'Header Padding Left', 'soda-theme' ),
			'description' => __( 'Set the left padding for the header container.', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	);

	// Header Padding Right Unit
	$wp_customize->add_setting(
		'header_padding_right_unit',
		array(
			'default'           => 'px',
			'sanitize_callback' => 'soda_theme_sanitize_unit',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_padding_right_unit',
		array(
			'label'   => __( 'Right Padding Unit', 'soda-theme' ),
			'section' => 'soda_theme_header_spacing',
			'type'    => 'select',
			'choices' => array(
				'px'  => __( 'px', 'soda-theme' ),
				'%'   => __( '%', 'soda-theme' ),
				'vw'  => __( 'vw', 'soda-theme' ),
			),
		)
	);

	// Header Padding Right
	$wp_customize->add_setting(
		'header_padding_right',
		array(
			'default'           => 16,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_padding_right',
		array(
			'label'       => __( 'Header Padding Right', 'soda-theme' ),
			'description' => __( 'Set the right padding for the header container.', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		)
	);

	// Header Container Max Width
	$wp_customize->add_setting(
		'header_container_max_width',
		array(
			'default'           => 1200,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_container_max_width',
		array(
			'label'       => __( 'Header Container Max Width (px)', 'soda-theme' ),
			'description' => __( 'Set the maximum width for the header container (only applies to boxed layout).', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 600,
				'max'  => 2000,
				'step' => 10,
			),
		)
	);

	// Header Height
	$wp_customize->add_setting(
		'header_height',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'header_height',
		array(
			'label'       => __( 'Header Container Min Height (px)', 'soda-theme' ),
			'description' => __( 'Set a minimum height for the header container (0 = auto).', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 300,
				'step' => 5,
			),
		)
	);

	// Sticky Header Height
	$wp_customize->add_setting(
		'sticky_header_height',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'sticky_header_height',
		array(
			'label'       => __( 'Sticky Header Container Min Height (px)', 'soda-theme' ),
			'description' => __( 'Set a minimum height for the sticky header container (0 = auto).', 'soda-theme' ),
			'section'     => 'soda_theme_header_spacing',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 150,
				'step' => 5,
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

/**
 * Sanitize container width setting.
 *
 * @param string $input The input value.
 * @return string Sanitized value.
 */
function soda_theme_sanitize_container_width( $input ) {
	$valid = array( 'boxed', 'full-width' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'boxed';
}

/**
 * Sanitize unit setting.
 *
 * @param string $input The input value.
 * @return string Sanitized value.
 */
function soda_theme_sanitize_unit( $input ) {
	$valid = array( 'px', '%', 'vw' );
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}
	return 'px';
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
	$regular_logo_width        = get_theme_mod( 'regular_logo_width', 150 );
	$sticky_logo_width         = get_theme_mod( 'sticky_logo_width', 100 );
	$sticky_logo_id            = get_theme_mod( 'sticky_logo' );
	$header_padding_top        = get_theme_mod( 'header_padding_top', 24 );
	$header_padding_bottom     = get_theme_mod( 'header_padding_bottom', 24 );
	$header_padding_left       = get_theme_mod( 'header_padding_left', 16 );
	$header_padding_right      = get_theme_mod( 'header_padding_right', 16 );
	$padding_left_unit         = get_theme_mod( 'header_padding_left_unit', 'px' );
	$padding_right_unit        = get_theme_mod( 'header_padding_right_unit', 'px' );
	$sticky_padding_top        = get_theme_mod( 'sticky_header_padding_top', 12 );
	$sticky_padding_bottom     = get_theme_mod( 'sticky_header_padding_bottom', 12 );
	$container_width_type      = get_theme_mod( 'header_container_width_type', 'boxed' );
	$container_max_width       = get_theme_mod( 'header_container_max_width', 1200 );
	$header_height             = get_theme_mod( 'header_height', 0 );
	$sticky_header_height      = get_theme_mod( 'sticky_header_height', 0 );
	
	$css = '<style type="text/css">';
	
	// Regular logo width
	if ( $regular_logo_width ) {
		$css .= '.custom-logo { max-width: ' . absint( $regular_logo_width ) . 'px; height: auto; }';
	}
	
	// Header padding
	if ( $header_padding_top || $header_padding_bottom ) {
		$css .= '.site-header { padding-top: ' . absint( $header_padding_top ) . 'px; padding-bottom: ' . absint( $header_padding_bottom ) . 'px; }';
	}
	
	// Header min height
	if ( $header_height > 0 ) {
		$css .= '.site-header .header-container { min-height: ' . absint( $header_height ) . 'px; display: flex; align-items: center; }';
	}
	
	// Header container padding left/right
	if ( $header_padding_left || $header_padding_right ) {
		$css .= '.site-header .header-container { padding-left: ' . absint( $header_padding_left ) . esc_attr( $padding_left_unit ) . '; padding-right: ' . absint( $header_padding_right ) . esc_attr( $padding_right_unit ) . '; }';
	}
	
	// Container max width
	if ( $container_max_width && 'boxed' === $container_width_type ) {
		$css .= '.site-header .header-container { max-width: ' . absint( $container_max_width ) . 'px; }';
	}
	
	// Full width container
	if ( 'full-width' === $container_width_type ) {
		$css .= '.site-header .header-container { max-width: 100%; }';
	}
	
	// Sticky header padding
	if ( $sticky_padding_top || $sticky_padding_bottom ) {
		$css .= '.has-sticky-header .site-header.sticky-header { padding-top: ' . absint( $sticky_padding_top ) . 'px; padding-bottom: ' . absint( $sticky_padding_bottom ) . 'px; }';
	}
	
	// Sticky header min height
	if ( $sticky_header_height > 0 ) {
		$css .= '.has-sticky-header .site-header.sticky-header .header-container { min-height: ' . absint( $sticky_header_height ) . 'px; }';
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

/**
 * Add custom CSS to Customizer controls
 */
function soda_theme_customizer_controls_styles() {
	?>
	<style type="text/css">
		.customize-control-kirki-margin .kirki-control-fields,
		.customize-control-kirki-padding .kirki-control-fields {
			display: flex;
			flex-wrap: wrap;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'soda_theme_customizer_controls_styles' );
