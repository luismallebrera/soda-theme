<?php
/**
 * Redux Framework Configuration
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
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	'output_tag'           => true,
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
				'subtitle' => esc_html__( 'Upload a logo to display when the header is sticky', 'soda-theme' ),
				'url'      => true,
			),
			array(
				'id'       => 'logo_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Logo Width', 'soda-theme' ),
				'subtitle' => esc_html__( 'Width of the main logo in pixels', 'soda-theme' ),
				'default'  => 200,
				'min'      => 50,
				'max'      => 500,
				'step'     => 1,
			),
			array(
				'id'       => 'sticky_logo_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Sticky Logo Width', 'soda-theme' ),
				'subtitle' => esc_html__( 'Width of the sticky logo in pixels', 'soda-theme' ),
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
				'subtitle' => esc_html__( 'Choose a header layout style', 'soda-theme' ),
				'options'  => array(
					'layout-1' => array(
						'alt' => 'Layout 1',
						'img' => get_template_directory_uri() . '/images/layout-1.png',
					),
					'layout-2' => array(
						'alt' => 'Layout 2',
						'img' => get_template_directory_uri() . '/images/layout-2.png',
					),
					'layout-3' => array(
						'alt' => 'Layout 3',
						'img' => get_template_directory_uri() . '/images/layout-3.png',
					),
					'layout-4' => array(
						'alt' => 'Layout 4',
						'img' => get_template_directory_uri() . '/images/layout-4.png',
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
				'subtitle' => esc_html__( 'Make the header stick to the top when scrolling', 'soda-theme' ),
				'default'  => true,
			),
			array(
				'id'       => 'enable_fixed_header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Fixed Header', 'soda-theme' ),
				'subtitle' => esc_html__( 'Keep the header fixed at the top of the page', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'enable_transparent_header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Transparent Header', 'soda-theme' ),
				'subtitle' => esc_html__( 'Make the header transparent', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'scroll_threshold',
				'type'     => 'slider',
				'title'    => esc_html__( 'Scroll Threshold', 'soda-theme' ),
				'subtitle' => esc_html__( 'Number of pixels to scroll before adding "scroll" class', 'soda-theme' ),
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
				'title'    => esc_html__( 'Header Padding Top', 'soda-theme' ),
				'default'  => 20,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'header_padding_bottom',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Padding Bottom', 'soda-theme' ),
				'default'  => 20,
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
			),
			array(
				'id'       => 'header_padding_unit',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Padding Unit', 'soda-theme' ),
				'options'  => array(
					'px'  => 'px',
					'em'  => 'em',
					'rem' => 'rem',
				),
				'default'  => 'px',
			),
			array(
				'id'       => 'header_container_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Container Width', 'soda-theme' ),
				'default'  => 1200,
				'min'      => 800,
				'max'      => 2000,
				'step'     => 10,
			),
			array(
				'id'       => 'header_container_unit',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Container Width Unit', 'soda-theme' ),
				'options'  => array(
					'px' => 'px',
					'%'  => '%',
				),
				'default'  => 'px',
			),
			array(
				'id'       => 'header_height',
				'type'     => 'slider',
				'title'    => esc_html__( 'Header Height', 'soda-theme' ),
				'default'  => 80,
				'min'      => 50,
				'max'      => 200,
				'step'     => 1,
			),
			array(
				'id'       => 'sticky_header_height',
				'type'     => 'slider',
				'title'    => esc_html__( 'Sticky Header Height', 'soda-theme' ),
				'default'  => 60,
				'min'      => 40,
				'max'      => 150,
				'step'     => 1,
			),
		),
	)
);

/**
 * Smooth Scrolling Section
 */
Redux::set_section(
	$opt_name,
	array(
		'title'  => esc_html__( 'Smooth Scrolling', 'soda-theme' ),
		'id'     => 'smooth_scrolling',
		'icon'   => 'el el-chevron-down',
		'fields' => array(
			array(
				'id'       => 'enable_smooth_scrolling',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Smooth Scrolling', 'soda-theme' ),
				'subtitle' => esc_html__( 'Enable Lenis smooth scrolling library', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'smooth_scrolling_disable_wheel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Disable Mouse Wheel', 'soda-theme' ),
				'subtitle' => esc_html__( 'Disable smooth scrolling on mouse wheel', 'soda-theme' ),
				'default'  => false,
				'required' => array( 'enable_smooth_scrolling', '=', true ),
			),
			array(
				'id'       => 'smooth_scrolling_anchor_links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Anchor Links', 'soda-theme' ),
				'subtitle' => esc_html__( 'Enable smooth scrolling for anchor links', 'soda-theme' ),
				'default'  => false,
				'required' => array( 'enable_smooth_scrolling', '=', true ),
			),
			array(
				'id'       => 'smooth_scrolling_gsap_sync',
				'type'     => 'switch',
				'title'    => esc_html__( 'GSAP ScrollTrigger Sync', 'soda-theme' ),
				'subtitle' => esc_html__( 'Synchronize with GSAP ScrollTrigger', 'soda-theme' ),
				'default'  => false,
				'required' => array( 'enable_smooth_scrolling', '=', true ),
			),
			array(
				'id'       => 'smooth_scrolling_anchor_offset',
				'type'     => 'slider',
				'title'    => esc_html__( 'Anchor Offset', 'soda-theme' ),
				'subtitle' => esc_html__( 'Offset for anchor links in pixels', 'soda-theme' ),
				'default'  => 0,
				'min'      => 0,
				'max'      => 500,
				'step'     => 10,
				'required' => array( 'enable_smooth_scrolling', '=', true ),
			),
			array(
				'id'       => 'smooth_scrolling_lerp',
				'type'     => 'slider',
				'title'    => esc_html__( 'Lerp (Smoothness)', 'soda-theme' ),
				'subtitle' => esc_html__( 'Linear interpolation intensity (0-1)', 'soda-theme' ),
				'default'  => 0.1,
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'resolution' => 0.01,
				'required' => array( 'enable_smooth_scrolling', '=', true ),
			),
			array(
				'id'       => 'smooth_scrolling_duration',
				'type'     => 'slider',
				'title'    => esc_html__( 'Duration', 'soda-theme' ),
				'subtitle' => esc_html__( 'Scroll animation duration in seconds', 'soda-theme' ),
				'default'  => 1.2,
				'min'      => 0,
				'max'      => 5,
				'step'     => 0.1,
				'resolution' => 0.1,
				'required' => array( 'enable_smooth_scrolling', '=', true ),
			),
			array(
				'id'       => 'smooth_scrolling_exclude_page',
				'type'     => 'select',
				'title'    => esc_html__( 'Exclude Pages', 'soda-theme' ),
				'subtitle' => esc_html__( 'Select pages where smooth scrolling should be disabled', 'soda-theme' ),
				'data'     => 'pages',
				'multi'    => true,
				'required' => array( 'enable_smooth_scrolling', '=', true ),
			),
		),
	)
);

/**
 * Grid Line Section
 */
Redux::set_section(
	$opt_name,
	array(
		'title'  => esc_html__( 'Grid Line Overlay', 'soda-theme' ),
		'id'     => 'grid_line',
		'icon'   => 'el el-th',
		'fields' => array(
			array(
				'id'       => 'grid_line_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Grid Line', 'soda-theme' ),
				'subtitle' => esc_html__( 'Display a grid line overlay on the page', 'soda-theme' ),
				'default'  => false,
			),
			array(
				'id'       => 'grid_line_line_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Line Color', 'soda-theme' ),
				'subtitle' => esc_html__( 'Color of the grid lines', 'soda-theme' ),
				'default'  => array(
					'color' => '#eeeeee',
					'alpha' => 1,
				),
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_column_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Column Color', 'soda-theme' ),
				'subtitle' => esc_html__( 'Background color between lines', 'soda-theme' ),
				'default'  => array(
					'color' => 'transparent',
					'alpha' => 0,
				),
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_columns',
				'type'     => 'slider',
				'title'    => esc_html__( 'Number of Columns', 'soda-theme' ),
				'subtitle' => esc_html__( 'Number of grid columns to display', 'soda-theme' ),
				'default'  => 12,
				'min'      => 1,
				'max'      => 24,
				'step'     => 1,
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_outline',
				'type'     => 'switch',
				'title'    => esc_html__( 'Grid Outline', 'soda-theme' ),
				'subtitle' => esc_html__( 'Add outline border to grid', 'soda-theme' ),
				'default'  => false,
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_max_width',
				'type'     => 'text',
				'title'    => esc_html__( 'Grid Max Width', 'soda-theme' ),
				'subtitle' => esc_html__( 'Maximum width of the grid overlay', 'soda-theme' ),
				'default'  => '100%',
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_the_width',
				'type'     => 'text',
				'title'    => esc_html__( 'Grid Width', 'soda-theme' ),
				'subtitle' => esc_html__( 'Width of the grid container', 'soda-theme' ),
				'default'  => '100%',
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_line_width',
				'type'     => 'text',
				'title'    => esc_html__( 'Line Width', 'soda-theme' ),
				'subtitle' => esc_html__( 'Thickness of each grid line', 'soda-theme' ),
				'default'  => '1px',
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_direction',
				'type'     => 'slider',
				'title'    => esc_html__( 'Line Direction', 'soda-theme' ),
				'subtitle' => esc_html__( 'Angle of the grid lines in degrees', 'soda-theme' ),
				'default'  => 90,
				'min'      => -360,
				'max'      => 360,
				'step'     => 15,
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_z_index',
				'type'     => 'slider',
				'title'    => esc_html__( 'Z-Index', 'soda-theme' ),
				'subtitle' => esc_html__( 'Stacking order of the grid overlay', 'soda-theme' ),
				'default'  => 0,
				'min'      => 0,
				'max'      => 9999,
				'step'     => 1,
				'required' => array( 'grid_line_enable', '=', true ),
			),
			array(
				'id'       => 'grid_line_right_display',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Right Side Grid Display', 'soda-theme' ),
				'subtitle' => esc_html__( 'Display mode for right side grid', 'soda-theme' ),
				'options'  => array(
					'none'       => esc_html__( 'None', 'soda-theme' ),
					'background' => esc_html__( 'Background', 'soda-theme' ),
					'outline'    => esc_html__( 'Outline', 'soda-theme' ),
				),
				'default'  => 'none',
				'required' => array( 'grid_line_enable', '=', true ),
			),
		),
	)
);

/**
 * Helper function to get Redux option
 *
 * @param string $key Option key.
 * @param mixed  $default Default value.
 * @return mixed
 */
function soda_theme_redux_option( $key, $default = '' ) {
	global $soda_theme_options;
	
	if ( isset( $soda_theme_options[ $key ] ) ) {
		return $soda_theme_options[ $key ];
	}
	
	return $default;
}
