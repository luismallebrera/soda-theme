<?php
/**
 * Redux Framework Complete Configuration - Migrated from Kirki
 *
 * @package soda-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'soda_theme_options';

/**
 * Set Arguments
 */
$args = array(
	'opt_name'             => $opt_name,
	'display_name'         => esc_html__( 'Soda Theme Options', 'soda-theme' ),
	'display_version'      => _S_VERSION,
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'soda-theme' ),
	'page_title'           => esc_html__( 'Soda Theme Options', 'soda-theme' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => true,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => 50,
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => null,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => '',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => 'soda_theme_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'show_options_object'  => false,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
	'templates_path'       => '',
	'use_cdn'              => true,
);

Redux::set_args( $opt_name, $args );

/**
 * Logo Settings Section
 */
Redux::set_section(
	$opt_name,
	array(
		'title'  => esc_html__( 'Logo Settings', 'soda-theme' ),
		'id'     => 'logo_settings',
		'icon'   => 'el el-picture',
		'fields' => array(
			array(
				'id'       => 'sticky_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Sticky Header Logo', 'soda-theme' ),
				'subtitle' => esc_html__( 'Upload a different logo for the sticky header (optional).', 'soda-theme' ),
				'default'  => '',
			),
			array(
				'id'       => 'logo_max_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Logo Max Width (px)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Set the maximum width for the logo.', 'soda-theme' ),
				'default'  => 200,
				'min'      => 50,
				'max'      => 500,
				'step'     => 1,
			),
			array(
				'id'       => 'sticky_logo_max_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Sticky Logo Max Width (px)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Set the maximum width for the sticky header logo.', 'soda-theme' ),
				'default'  => 150,
				'min'      => 50,
				'max'      => 500,
				'step'     => 1,
			),
		),
	)
);

/**
 * Header Layout Section
 */
Redux::set_section(
	$opt_name,
	array(
		'title'  => esc_html__( 'Header Layout', 'soda-theme' ),
		'id'     => 'header_layout',
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'       => 'header_layout_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Header Layout Style', 'soda-theme' ),
				'subtitle' => esc_html__( 'Choose your preferred header layout.', 'soda-theme' ),
				'options'  => array(
					'layout-1' => array(
						'title' => esc_html__( 'Layout 1', 'soda-theme' ),
						'img'   => get_template_directory_uri() . '/assets/images/layout-1.png',
					),
					'layout-2' => array(
						'title' => esc_html__( 'Layout 2', 'soda-theme' ),
						'img'   => get_template_directory_uri() . '/assets/images/layout-2.png',
					),
					'layout-3' => array(
						'title' => esc_html__( 'Layout 3', 'soda-theme' ),
						'img'   => get_template_directory_uri() . '/assets/images/layout-3.png',
					),
					'layout-4' => array(
						'title' => esc_html__( 'Layout 4', 'soda-theme' ),
						'img'   => get_template_directory_uri() . '/assets/images/layout-4.png',
					),
				),
				'default'  => 'layout-1',
			),
		),
	)
);

/**
 * Header Behavior Section
 */
Redux::set_section(
	$opt_name,
	array(
		'title'  => esc_html__( 'Header Behavior', 'soda-theme' ),
		'id'     => 'header_behavior',
		'icon'   => 'el el-cog',
		'fields' => array(
			array(
				'id'       => 'enable_sticky_header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sticky Header', 'soda-theme' ),
				'subtitle' => esc_html__( 'Make the header stick to the top when scrolling.', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'enable_sticky_header_shadow',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sticky Header Shadow', 'soda-theme' ),
				'subtitle' => esc_html__( 'Add a shadow effect to the sticky header.', 'soda-theme' ),
				'default'  => true,
				'required' => array( 'enable_sticky_header', '=', true ),
			),
			array(
				'id'       => 'enable_sticky_header_border',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sticky Header Border', 'soda-theme' ),
				'subtitle' => esc_html__( 'Add a border bottom to the sticky header.', 'soda-theme' ),
				'default'  => false,
				'required' => array( 'enable_sticky_header', '=', true ),
			),
			array(
				'id'       => 'sticky_header_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sticky Header Border Color', 'soda-theme' ),
				'default'  => '#e0e0e0',
				'required' => array( 'enable_sticky_header_border', '=', true ),
			),
			array(
				'id'       => 'sticky_header_border_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Sticky Header Border Width (px)', 'soda-theme' ),
				'default'  => 1,
				'min'      => 1,
				'max'      => 10,
				'step'     => 1,
				'required' => array( 'enable_sticky_header_border', '=', true ),
			),
			array(
				'id'       => 'sticky_header_menu_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sticky Header Menu Link Color', 'soda-theme' ),
				'default'  => '#333333',
				'required' => array( 'enable_sticky_header', '=', true ),
			),
			array(
				'id'       => 'sticky_header_menu_link_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sticky Header Menu Link Hover Color', 'soda-theme' ),
				'default'  => '#000000',
				'required' => array( 'enable_sticky_header', '=', true ),
			),
			array(
				'id'       => 'sticky_header_menu_link_active_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sticky Header Menu Link Active Color', 'soda-theme' ),
				'default'  => '#333333',
				'required' => array( 'enable_sticky_header', '=', true ),
			),
			array(
				'id'       => 'enable_fixed_header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Fixed Header', 'soda-theme' ),
				'subtitle' => esc_html__( 'Header stays fixed at the top (no scroll behavior).', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'enable_transparent_header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Transparent Header', 'soda-theme' ),
				'subtitle' => esc_html__( 'Make the header background transparent (works best on homepage with hero images).', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'scroll_threshold',
				'type'     => 'slider',
				'title'    => esc_html__( 'Scroll Threshold (px)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Number of pixels to scroll before adding "scroll" class to body and header.', 'soda-theme' ),
				'default'  => 100,
				'min'      => 0,
				'max'      => 500,
				'step'     => 10,
			),
		),
	)
);

/**
 * Header Spacing Section
 */
Redux::set_section(
	$opt_name,
	array(
		'title'  => esc_html__( 'Header Spacing', 'soda-theme' ),
		'id'     => 'header_spacing',
		'icon'   => 'el el-resize-vertical',
		'fields' => array(
			array(
				'id'       => 'header_padding_top',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Padding Top (px)', 'soda-theme' ),
				'default'  => 20,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'header_padding_bottom',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Padding Bottom (px)', 'soda-theme' ),
				'default'  => 20,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'header_padding_left',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Padding Left (px)', 'soda-theme' ),
				'default'  => 20,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'header_padding_right',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Padding Right (px)', 'soda-theme' ),
				'default'  => 20,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'header_container_max_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Container Max Width (px)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Maximum width for the header content.', 'soda-theme' ),
				'default'  => 1200,
				'min'      => 800,
				'max'      => 2000,
				'step'     => 10,
			),
		),
	)
);

/**
 * Menu Settings Section
 */
Redux::set_section(
	$opt_name,
	array(
		'title'  => esc_html__( 'Menu Settings', 'soda-theme' ),
		'id'     => 'menu_settings',
		'icon'   => 'el el-lines',
		'fields' => array(
			// Menu Navigation Padding
			array(
				'id'       => 'menu_navigation_padding_top',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Navigation Padding Top', 'soda-theme' ),
				'default'  => 0,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'menu_navigation_padding_right',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Navigation Padding Right', 'soda-theme' ),
				'default'  => 0,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'menu_navigation_padding_bottom',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Navigation Padding Bottom', 'soda-theme' ),
				'default'  => 0,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'menu_navigation_padding_left',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Navigation Padding Left', 'soda-theme' ),
				'default'  => 0,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			// Menu Navigation Background
			array(
				'id'       => 'menu_navigation_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Menu Navigation Background Color', 'soda-theme' ),
				'default'  => array(
					'color' => 'transparent',
					'alpha' => '1',
				),
			),
			// Menu Link Padding
			array(
				'id'       => 'menu_link_padding_top',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Link Padding Top', 'soda-theme' ),
				'default'  => 10,
				'min'      => 0,
				'max'      => 50,
				'step'     => 1,
			),
			array(
				'id'       => 'menu_link_padding_right',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Link Padding Right', 'soda-theme' ),
				'default'  => 15,
				'min'      => 0,
				'max'      => 50,
				'step'     => 1,
			),
			array(
				'id'       => 'menu_link_padding_bottom',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Link Padding Bottom', 'soda-theme' ),
				'default'  => 10,
				'min'      => 0,
				'max'      => 50,
				'step'     => 1,
			),
			array(
				'id'       => 'menu_link_padding_left',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu Link Padding Left', 'soda-theme' ),
				'default'  => 15,
				'min'      => 0,
				'max'      => 50,
				'step'     => 1,
			),
			// Menu Link Colors
			array(
				'id'       => 'menu_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Link Color', 'soda-theme' ),
				'default'  => '#333333',
			),
			array(
				'id'       => 'menu_link_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Link Hover Color', 'soda-theme' ),
				'default'  => '#000000',
			),
			array(
				'id'       => 'menu_link_active_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Link Active Color', 'soda-theme' ),
				'default'  => '#000000',
			),
			// Mobile Menu Settings
			array(
				'id'       => 'mobile_menu_show_text',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Menu Text', 'soda-theme' ),
				'subtitle' => esc_html__( 'Display text next to the mobile menu icon.', 'soda-theme' ),
				'default'  => true,
			),
			array(
				'id'       => 'mobile_menu_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Menu Text', 'soda-theme' ),
				'default'  => 'MENU',
				'required' => array( 'mobile_menu_show_text', '=', true ),
			),
			array(
				'id'       => 'mobile_menu_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'soda-theme' ),
				'default'  => array(
					'color' => '#ffffff',
					'alpha' => '0.45',
				),
			),
			array(
				'id'       => 'mobile_menu_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Text/Icon Color', 'soda-theme' ),
				'default'  => '#000000',
			),
			array(
				'id'       => 'mobile_menu_breakpoint',
				'type'     => 'slider',
				'title'    => esc_html__( 'Mobile Menu Breakpoint (px)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Screen width at which the mobile menu toggle appears and desktop menu hides.', 'soda-theme' ),
				'default'  => 768,
				'min'      => 320,
				'max'      => 1440,
				'step'     => 1,
			),
			// Hamburger Icon Settings
			array(
				'id'       => 'hamburger_line_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Hamburger Line Width (px)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Width of the hamburger menu icon lines.', 'soda-theme' ),
				'default'  => 25,
				'min'      => 20,
				'max'      => 80,
				'step'     => 1,
			),
			array(
				'id'       => 'hamburger_line_height',
				'type'     => 'slider',
				'title'    => esc_html__( 'Hamburger Line Height (px)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Height/thickness of the hamburger menu icon lines.', 'soda-theme' ),
				'default'  => 2,
				'min'      => 1,
				'max'      => 10,
				'step'     => 1,
			),
			array(
				'id'       => 'hamburger_line_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Line Color', 'soda-theme' ),
				'subtitle' => esc_html__( 'Color of the hamburger menu icon lines.', 'soda-theme' ),
				'default'  => '#ecf0f1',
			),
			array(
				'id'       => 'hamburger_scale',
				'type'     => 'slider',
				'title'    => esc_html__( 'Hamburger Scale', 'soda-theme' ),
				'subtitle' => esc_html__( 'Scale/size of the entire hamburger icon.', 'soda-theme' ),
				'default'  => 1,
				'min'      => 0.5,
				'max'      => 3,
				'step'     => 0.1,
			),
			// Menu Border
			array(
				'id'       => 'menu_border_bottom',
				'type'     => 'switch',
				'title'    => esc_html__( 'Border Bottom', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'menu_border_bottom_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Border Bottom Color', 'soda-theme' ),
				'default'  => '#e0e0e0',
				'required' => array( 'menu_border_bottom', '=', true ),
			),
			array(
				'id'       => 'menu_border_bottom_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Border Bottom Width (px)', 'soda-theme' ),
				'default'  => 1,
				'min'      => 1,
				'max'      => 10,
				'step'     => 1,
				'required' => array( 'menu_border_bottom', '=', true ),
			),
		),
	)
);

/**
 * Helper function to get Redux option
 *
 * @param string $key     Option key.
 * @param mixed  $default Default value.
 * @return mixed
 */
function soda_theme_get_option( $key, $default = '' ) {
	global $soda_theme_options;
	
	if ( isset( $soda_theme_options[ $key ] ) ) {
		return $soda_theme_options[ $key ];
	}
	
	return $default;
}
