<?php
/**
 * Kirki Customizer Configuration
 *
 * @package soda-theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * Add Kirki configuration.
 */
Kirki::add_config(
	'soda_theme_config',
	array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/**
 * Add Logo Settings Panel
 */
new \Kirki\Panel(
	'soda_theme_header_panel',
	array(
		'priority'    => 29,
		'title'       => esc_html__( 'Soda Theme Header', 'soda-theme' ),
		'description' => esc_html__( 'Customize your header appearance and behavior.', 'soda-theme' ),
	)
);

/**
 * Logo Settings Section
 */
new \Kirki\Section(
	'soda_theme_logo_settings',
	array(
		'title'       => esc_html__( 'Logo Settings', 'soda-theme' ),
		'panel'       => 'soda_theme_header_panel',
		'priority'    => 10,
	)
);

/**
 * Sticky Logo Upload
 */
new \Kirki\Field\Image(
	array(
		'settings'    => 'sticky_logo',
		'label'       => esc_html__( 'Sticky Header Logo', 'soda-theme' ),
		'description' => esc_html__( 'Upload a logo to be displayed when the header is sticky/scrolled.', 'soda-theme' ),
		'section'     => 'soda_theme_logo_settings',
		'default'     => '',
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);

/**
 * Regular Logo Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'regular_logo_width',
		'label'       => esc_html__( 'Regular Logo Width (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the width for the regular logo.', 'soda-theme' ),
		'section'     => 'soda_theme_logo_settings',
		'default'     => 150,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 50,
			'max'  => 500,
			'step' => 5,
		),
	)
);

/**
 * Sticky Logo Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'sticky_logo_width',
		'label'       => esc_html__( 'Sticky Logo Width (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the width for the sticky header logo.', 'soda-theme' ),
		'section'     => 'soda_theme_logo_settings',
		'default'     => 100,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 50,
			'max'  => 300,
			'step' => 5,
		),
	)
);

/**
 * Header Layout Section
 */
new \Kirki\Section(
	'soda_theme_header_layout',
	array(
		'title'    => esc_html__( 'Header Layout', 'soda-theme' ),
		'panel'    => 'soda_theme_header_panel',
		'priority' => 20,
	)
);

/**
 * Header Layout Style
 */
new \Kirki\Field\Radio_Image(
	array(
		'settings'    => 'header_layout_style',
		'label'       => esc_html__( 'Header Layout Style', 'soda-theme' ),
		'description' => esc_html__( 'Choose your preferred header layout style.', 'soda-theme' ),
		'section'     => 'soda_theme_header_layout',
		'default'     => 'layout-1',
		'choices'     => array(
			'layout-1' => get_template_directory_uri() . '/images/layout-1.png',
			'layout-2' => get_template_directory_uri() . '/images/layout-2.png',
			'layout-3' => get_template_directory_uri() . '/images/layout-3.png',
			'layout-4' => get_template_directory_uri() . '/images/layout-4.png',
		),
	)
);

/**
 * Header Behavior Section
 */
new \Kirki\Section(
	'soda_theme_header_behavior',
	array(
		'title'    => esc_html__( 'Header Behavior', 'soda-theme' ),
		'panel'    => 'soda_theme_header_panel',
		'priority' => 30,
	)
);

/**
 * Enable Sticky Header
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'enable_sticky_header',
		'label'       => esc_html__( 'Enable Sticky Header', 'soda-theme' ),
		'description' => esc_html__( 'Make the header stick to the top when scrolling.', 'soda-theme' ),
		'section'     => 'soda_theme_header_behavior',
		'default'     => true,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Enable Sticky Header Box Shadow
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'        => 'enable_sticky_header_shadow',
		'label'           => esc_html__( 'Enable Sticky Header Box Shadow', 'soda-theme' ),
		'description'     => esc_html__( 'Add a shadow below the sticky header.', 'soda-theme' ),
		'section'         => 'soda_theme_header_behavior',
		'default'         => true,
		'choices'         => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
		'transport'       => 'postMessage',
		'output'          => array(
			array(
				'element'  => '.has-transparent-header.has-sticky-header .site-header.sticky-header',
				'property' => 'box-shadow',
				'value_pattern' => '0 2px 5px rgba(0, 0, 0, 0.1)',
				'exclude'  => array( false ),
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_sticky_header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Enable Sticky Header Border Bottom
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'        => 'enable_sticky_header_border',
		'label'           => esc_html__( 'Enable Sticky Header Border Bottom', 'soda-theme' ),
		'description'     => esc_html__( 'Add a border at the bottom of the sticky header.', 'soda-theme' ),
		'section'         => 'soda_theme_header_behavior',
		'default'         => false,
		'choices'         => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_sticky_header',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Sticky Header Border Bottom Color
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'sticky_header_border_color',
		'label'           => esc_html__( 'Sticky Header Border Bottom Color', 'soda-theme' ),
		'section'         => 'soda_theme_header_behavior',
		'default'         => '#e0e0e0',
		'choices'         => array(
			'alpha' => true,
		),
		'transport'       => 'postMessage',
		'output'          => array(
			array(
				'element'  => '.has-transparent-header.has-sticky-header .site-header.sticky-header',
				'property' => 'border-bottom-color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_sticky_header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'enable_sticky_header_border',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Sticky Header Border Bottom Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'sticky_header_border_width',
		'label'           => esc_html__( 'Sticky Header Border Bottom Width (px)', 'soda-theme' ),
		'section'         => 'soda_theme_header_behavior',
		'default'         => 1,
		'transport'       => 'postMessage',
		'choices'         => array(
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		),
		'output'          => array(
			array(
				'element'  => '.has-transparent-header.has-sticky-header .site-header.sticky-header',
				'property' => 'border-bottom-width',
				'units'    => 'px',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_sticky_header',
				'operator' => '==',
				'value'    => true,
			),
			array(
				'setting'  => 'enable_sticky_header_border',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Enable Fixed Header
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'enable_fixed_header',
		'label'       => esc_html__( 'Enable Fixed Header', 'soda-theme' ),
		'description' => esc_html__( 'Keep the header fixed at the top of the page at all times.', 'soda-theme' ),
		'section'     => 'soda_theme_header_behavior',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Enable Transparent Header
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'enable_transparent_header',
		'label'       => esc_html__( 'Enable Transparent Header', 'soda-theme' ),
		'description' => esc_html__( 'Make the header background transparent (works best on homepage with hero images).', 'soda-theme' ),
		'section'     => 'soda_theme_header_behavior',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Scroll Threshold
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'scroll_threshold',
		'label'       => esc_html__( 'Scroll Threshold (px)', 'soda-theme' ),
		'description' => esc_html__( 'Number of pixels to scroll before adding "scroll" class to body and header.', 'soda-theme' ),
		'section'     => 'soda_theme_header_behavior',
		'default'     => 100,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 10,
		),
	)
);

/**
 * Header Spacing Section
 */
new \Kirki\Section(
	'soda_theme_header_spacing',
	array(
		'title'    => esc_html__( 'Header Spacing', 'soda-theme' ),
		'panel'    => 'soda_theme_header_panel',
		'priority' => 40,
	)
);

/**
 * Header Padding
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'    => 'header_padding',
		'label'       => esc_html__( 'Header Padding', 'soda-theme' ),
		'description' => esc_html__( 'Set the padding for the site-header.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => array(
			'padding-top'    => '24px',
			'padding-right'  => '0px',
			'padding-bottom' => '24px',
			'padding-left'   => '0px',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Top', 'soda-theme' ),
				'padding-right'  => esc_html__( 'Right', 'soda-theme' ),
				'padding-bottom' => esc_html__( 'Bottom', 'soda-theme' ),
				'padding-left'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.site-header',
			),
		),
	)
);

/**
 * Sticky Header Padding
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'    => 'sticky_header_padding',
		'label'       => esc_html__( 'Sticky Header Padding', 'soda-theme' ),
		'description' => esc_html__( 'Set the padding for the sticky site-header.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => array(
			'padding-top'    => '12px',
			'padding-right'  => '0px',
			'padding-bottom' => '12px',
			'padding-left'   => '0px',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Top', 'soda-theme' ),
				'padding-right'  => esc_html__( 'Right', 'soda-theme' ),
				'padding-bottom' => esc_html__( 'Bottom', 'soda-theme' ),
				'padding-left'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.has-sticky-header .site-header.sticky-header',
			),
		),
	)
);

/**
 * Header Container Width Type
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings'    => 'header_container_width_type',
		'label'       => esc_html__( 'Header Container Width', 'soda-theme' ),
		'description' => esc_html__( 'Choose between boxed or full width container.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 'boxed',
		'choices'     => array(
			'boxed'      => esc_html__( 'Boxed', 'soda-theme' ),
			'full-width' => esc_html__( 'Full Width', 'soda-theme' ),
		),
	)
);

/**
 * Header Container Max Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'header_container_max_width',
		'label'           => esc_html__( 'Header Container Max Width (px)', 'soda-theme' ),
		'description'     => esc_html__( 'Set the maximum width for the header container (only applies to boxed layout).', 'soda-theme' ),
		'section'         => 'soda_theme_header_spacing',
		'default'         => 1200,
		'transport'       => 'postMessage',
		'choices'         => array(
			'min'  => 600,
			'max'  => 2000,
			'step' => 10,
		),
		'active_callback' => array(
			array(
				'setting'  => 'header_container_width_type',
				'operator' => '===',
				'value'    => 'boxed',
			),
		),
	)
);

/**
 * Header Inner Padding
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'    => 'header_inner_padding',
		'label'       => esc_html__( 'Header Inner Padding', 'soda-theme' ),
		'description' => esc_html__( 'Set the padding for the header-container.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => array(
			'padding-top'    => '0px',
			'padding-right'  => '16px',
			'padding-bottom' => '0px',
			'padding-left'   => '16px',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Top', 'soda-theme' ),
				'padding-right'  => esc_html__( 'Right', 'soda-theme' ),
				'padding-bottom' => esc_html__( 'Bottom', 'soda-theme' ),
				'padding-left'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.header-container',
			),
		),
	)
);

/**
 * Sticky Header Inner Padding
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'    => 'sticky_header_inner_padding',
		'label'       => esc_html__( 'Sticky Header Inner Padding', 'soda-theme' ),
		'description' => esc_html__( 'Set the padding for the sticky header-container.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => array(
			'padding-top'    => '0px',
			'padding-right'  => '16px',
			'padding-bottom' => '0px',
			'padding-left'   => '16px',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Top', 'soda-theme' ),
				'padding-right'  => esc_html__( 'Right', 'soda-theme' ),
				'padding-bottom' => esc_html__( 'Bottom', 'soda-theme' ),
				'padding-left'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.has-sticky-header .site-header.sticky-header .header-container',
			),
		),
	)
);

/**
 * Header Container Min Height
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'header_height',
		'label'       => esc_html__( 'Header Container Min Height (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set a minimum height for the header container (0 = auto).', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 0,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 300,
			'step' => 5,
		),
	)
);

/**
 * Sticky Header Container Min Height
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'sticky_header_height',
		'label'       => esc_html__( 'Sticky Header Container Min Height (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set a minimum height for the sticky header container (0 = auto).', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 0,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 5,
		),
	)
);

/**
 * Smooth Scrolling Section
 */
new \Kirki\Section(
	'soda_theme_smooth_scrolling',
	array(
		'title'    => esc_html__( 'Smooth Scrolling (Lenis)', 'soda-theme' ),
		'priority' => 50,
	)
);

/**
 * Enable Smooth Scrolling
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'enable_smooth_scrolling',
		'label'       => esc_html__( 'Enable Smooth Scrolling', 'soda-theme' ),
		'description' => esc_html__( 'Enable Lenis smooth scrolling on your website.', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Disable Mouse Wheel
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'soda_smooth_scrolling_disable_wheel',
		'label'       => esc_html__( 'Disable Mouse Wheel', 'soda-theme' ),
		'description' => esc_html__( 'Disable smooth scrolling for mouse wheel.', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Smooth Anchor Links
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'soda_smooth_scrolling_anchor_links',
		'label'       => esc_html__( 'Smooth Anchor Links', 'soda-theme' ),
		'description' => esc_html__( 'Enable smooth scrolling for anchor links.', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Synchronize with GSAP/ScrollTrigger
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'soda_smooth_scrolling_gsap',
		'label'       => esc_html__( 'Synchronize with GSAP/ScrollTrigger', 'soda-theme' ),
		'description' => esc_html__( 'Enable GSAP ScrollTrigger synchronization.', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Anchor Link Offset
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'soda_smooth_scrolling_anchor_offset',
		'label'       => esc_html__( 'Smooth Anchor Link Offset (px)', 'soda-theme' ),
		'description' => esc_html__( 'Offset for smooth anchor links in pixels.', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => 0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
	)
);

/**
 * Linear Interpolation (lerp)
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'soda_smooth_scrolling_lerp',
		'label'       => esc_html__( 'Linear Interpolation (lerp) Intensity', 'soda-theme' ),
		'description' => esc_html__( 'Between 0 and 1. Set to 0 to use duration instead. Default: 0.1', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => 0.1,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.01,
		),
	)
);

/**
 * Duration of Scroll Animation
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'soda_smooth_scrolling_duration',
		'label'       => esc_html__( 'Duration of Scroll Animation (seconds)', 'soda-theme' ),
		'description' => esc_html__( 'Set lerp to 0 to use this value. Default: 1.2', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => 1.2,
		'choices'     => array(
			'min'  => 0,
			'max'  => 5,
			'step' => 0.1,
		),
	)
);

/**
 * Exclude Pages
 */
new \Kirki\Field\Select(
	array(
		'settings'    => 'soda_smooth_scrolling_exclude_page',
		'label'       => esc_html__( 'Exclude on These Pages', 'soda-theme' ),
		'description' => esc_html__( 'Select pages where smooth scrolling should be disabled.', 'soda-theme' ),
		'section'     => 'soda_theme_smooth_scrolling',
		'default'     => array(),
		'multiple'    => 999,
		'choices'     => array_reduce(
			get_pages(),
			function( $carry, $page ) {
				$carry[ $page->ID ] = $page->post_title;
				return $carry;
			},
			array()
		),
	)
);

/**
 * Grid Line Section
 */
new \Kirki\Section(
	'soda_theme_grid_line',
	array(
		'title'    => esc_html__( 'Grid Line Overlay', 'soda-theme' ),
		'priority' => 60,
	)
);

/**
 * Enable Grid Line
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'grid_line_enable',
		'label'       => esc_html__( 'Enable Grid Line', 'soda-theme' ),
		'description' => esc_html__( 'Display a grid line overlay on the page.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Line Color
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'grid_line_line_color',
		'label'       => esc_html__( 'Line Color', 'soda-theme' ),
		'description' => esc_html__( 'Color of the grid lines.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '#eeeeee',
		'choices'     => array(
			'alpha' => true,
		),
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-color',
			),
		),
	)
);

/**
 * Column Color
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'grid_line_column_color',
		'label'       => esc_html__( 'Column Color', 'soda-theme' ),
		'description' => esc_html__( 'Background color between lines.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => 'transparent',
		'choices'     => array(
			'alpha' => true,
		),
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-column-color',
			),
		),
	)
);

/**
 * Number of Columns
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'grid_line_columns',
		'label'       => esc_html__( 'Number of Columns', 'soda-theme' ),
		'description' => esc_html__( 'Number of grid columns to display.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => 12,
		'choices'     => array(
			'min'  => 1,
			'max'  => 24,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-columns',
			),
		),
	)
);

/**
 * Grid Outline
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings' => 'grid_line_outline',
		'label'    => esc_html__( 'Grid Outline', 'soda-theme' ),
		'section'  => 'soda_theme_grid_line',
		'default'  => false,
		'choices'  => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Grid Max Width
 */
new \Kirki\Field\Dimension(
	array(
		'settings'    => 'grid_line_max_width',
		'label'       => esc_html__( 'Grid Max Width', 'soda-theme' ),
		'description' => esc_html__( 'Maximum width of the grid overlay.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '100%',
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-max-width',
			),
		),
	)
);

/**
 * Grid Width
 */
new \Kirki\Field\Dimension(
	array(
		'settings'    => 'grid_line_the_width',
		'label'       => esc_html__( 'Grid Width', 'soda-theme' ),
		'description' => esc_html__( 'Width of the grid container.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '100%',
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-the-width',
			),
		),
	)
);

/**
 * Line Width
 */
new \Kirki\Field\Dimension(
	array(
		'settings'    => 'grid_line_line_width',
		'label'       => esc_html__( 'Line Width', 'soda-theme' ),
		'description' => esc_html__( 'Thickness of each grid line.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '1px',
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-width',
			),
		),
	)
);

/**
 * Line Direction
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'grid_line_direction',
		'label'       => esc_html__( 'Line Direction (degrees)', 'soda-theme' ),
		'description' => esc_html__( 'Angle of the grid lines.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => 90,
		'choices'     => array(
			'min'  => -360,
			'max'  => 360,
			'step' => 15,
		),
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-direction',
				'suffix'   => 'deg',
			),
		),
	)
);

/**
 * Z-Index
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'grid_line_z_index',
		'label'       => esc_html__( 'Z-Index', 'soda-theme' ),
		'description' => esc_html__( 'Stacking order of the grid overlay.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => 0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 9999,
			'step' => 1,
		),
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => '--grid-line-z-index',
			),
		),
	)
);

/**
 * Right Side Grid Display
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings' => 'grid_line_right_display',
		'label'    => esc_html__( 'Right Side Grid Display', 'soda-theme' ),
		'section'  => 'soda_theme_grid_line',
		'default'  => 'none',
		'choices'  => array(
			'none'       => esc_html__( 'None', 'soda-theme' ),
			'background' => esc_html__( 'Background', 'soda-theme' ),
			'outline'    => esc_html__( 'Outline', 'soda-theme' ),
		),
	)
);

/**
 * Menu Settings Section
 */
new \Kirki\Section(
	'soda_theme_menu_settings',
	array(
		'title'    => esc_html__( 'Menu Settings', 'soda-theme' ),
		'panel'    => 'soda_theme_header_panel',
		'priority' => 50,
	)
);

/**
 * Mobile Menu Show Text
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'mobile_menu_show_text',
		'label'       => esc_html__( 'Show Menu Text', 'soda-theme' ),
		'description' => esc_html__( 'Display text label next to hamburger icon on mobile menu.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => true,
		'choices'     => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Mobile Menu Text
 */
new \Kirki\Field\Text(
	array(
		'settings'        => 'mobile_menu_text',
		'label'           => esc_html__( 'Menu Text', 'soda-theme' ),
		'description'     => esc_html__( 'Text to display on mobile menu toggle.', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 'MENU',
		'active_callback' => array(
			array(
				'setting'  => 'mobile_menu_show_text',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Mobile Menu Toggle Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_menu_toggle_bg_color',
		'label'     => esc_html__( 'Toggle Background Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'rgba(255, 255, 255, 0.45)',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-toggle-holder',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Mobile Menu Toggle Text Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_menu_toggle_text_color',
		'label'     => esc_html__( 'Toggle Text/Icon Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#000000',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-toggle-holder .site-navigation-toggle',
				'property' => 'color',
			),
		),
	)
);

/**
 * Mobile Menu Toggle Padding
 */
new \Kirki\Pro\Field\Padding(
	array(
		'settings'    => 'mobile_menu_toggle_padding',
		'label'       => esc_html__( 'Toggle Padding', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => array(
			'top'    => '16px',
			'bottom' => '16px',
			'left'   => '21px',
			'right'  => '21px',
		),
		'transport'   => 'postMessage',
		'output'      => array(
			array(
				'element' => '.site-navigation-toggle-holder',
			),
		),
	)
);

/**
 * Mobile Menu Toggle Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'mobile_menu_toggle_border_radius',
		'label'       => esc_html__( 'Toggle Border Radius (px)', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Mobile Menu Toggle Backdrop Filter Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'mobile_menu_toggle_backdrop_blur',
		'label'       => esc_html__( 'Toggle Backdrop Blur (px)', 'soda-theme' ),
		'description' => esc_html__( 'Blur effect for glassmorphism. Set to 0 to disable.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 8,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Mobile Menu Toggle Box Shadow
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings' => 'mobile_menu_toggle_box_shadow',
		'label'    => esc_html__( 'Toggle Box Shadow', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => true,
		'choices'  => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Mobile Menu Breakpoint
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'mobile_menu_breakpoint',
		'label'       => esc_html__( 'Mobile Menu Breakpoint (px)', 'soda-theme' ),
		'description' => esc_html__( 'Screen width at which the mobile menu toggle appears and desktop menu hides.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 768,
		'choices'     => array(
			'min'  => 320,
			'max'  => 1440,
			'step' => 1,
		),
	)
);

/**
 * Hamburger Line Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'hamburger_line_width',
		'label'       => esc_html__( 'Hamburger Line Width (px)', 'soda-theme' ),
		'description' => esc_html__( 'Width of the hamburger menu icon lines.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 25,
		'choices'     => array(
			'min'  => 20,
			'max'  => 80,
			'step' => 1,
		),
	)
);

/**
 * Hamburger Line Height
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'hamburger_line_height',
		'label'       => esc_html__( 'Hamburger Line Height (px)', 'soda-theme' ),
		'description' => esc_html__( 'Height/thickness of the hamburger menu icon lines.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 2,
		'choices'     => array(
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		),
	)
);

/**
 * Hamburger Line Color
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'hamburger_line_color',
		'label'       => esc_html__( 'Hamburger Line Color', 'soda-theme' ),
		'description' => esc_html__( 'Color of the hamburger menu icon lines.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => '#ecf0f1',
	)
);

/**
 * Hamburger Scale
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'hamburger_scale',
		'label'       => esc_html__( 'Hamburger Scale', 'soda-theme' ),
		'description' => esc_html__( 'Scale/size of the entire hamburger icon.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 1,
		'choices'     => array(
			'min'  => 0.5,
			'max'  => 3,
			'step' => 0.1,
		),
	)
);

/**
 * Mobile Dropdown Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_dropdown_bg_color',
		'label'     => esc_html__( 'Mobile Dropdown Background Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'rgba(0, 0, 0, 0.8)',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .site-navigation-background',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Mobile Dropdown Position
 */
new \Kirki\Field\Radio(
	array(
		'settings' => 'mobile_dropdown_position',
		'label'    => esc_html__( 'Mobile Dropdown Position', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => 'fullscreen',
		'choices'  => array(
			'fullscreen' => esc_html__( 'Fullscreen', 'soda-theme' ),
			'custom'     => esc_html__( 'Custom Position (Right/Top)', 'soda-theme' ),
		),
	)
);

/**
 * Mobile Dropdown Width Unit
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings'        => 'mobile_dropdown_width_unit',
		'label'           => esc_html__( 'Mobile Dropdown Width Unit', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 'vw',
		'choices'         => array(
			'px' => esc_html__( 'px', 'soda-theme' ),
			'vw' => esc_html__( 'vw', 'soda-theme' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mobile_dropdown_position',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

/**
 * Mobile Dropdown Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'mobile_dropdown_width',
		'label'           => esc_html__( 'Mobile Dropdown Width', 'soda-theme' ),
		'description'     => esc_html__( 'Width of the dropdown menu container.', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 100,
		'choices'         => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
		),
		'active_callback' => array(
			array(
				'setting'  => 'mobile_dropdown_position',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

/**
 * Mobile Dropdown Height Unit
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings'        => 'mobile_dropdown_height_unit',
		'label'           => esc_html__( 'Mobile Dropdown Height Unit', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 'vh',
		'choices'         => array(
			'px' => esc_html__( 'px', 'soda-theme' ),
			'%'  => esc_html__( '%', 'soda-theme' ),
			'vh' => esc_html__( 'vh', 'soda-theme' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'mobile_dropdown_position',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

/**
 * Mobile Dropdown Height
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'mobile_dropdown_height',
		'label'           => esc_html__( 'Mobile Dropdown Height', 'soda-theme' ),
		'description'     => esc_html__( 'Height of the dropdown menu container.', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 100,
		'choices'         => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
		),
		'active_callback' => array(
			array(
				'setting'  => 'mobile_dropdown_position',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

/**
 * Mobile Dropdown Right Position
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'mobile_dropdown_right',
		'label'           => esc_html__( 'Mobile Dropdown Right Position (px)', 'soda-theme' ),
		'description'     => esc_html__( 'Distance from the right edge.', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 0,
		'choices'         => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'active_callback' => array(
			array(
				'setting'  => 'mobile_dropdown_position',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

/**
 * Mobile Dropdown Top Position
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'mobile_dropdown_top',
		'label'           => esc_html__( 'Mobile Dropdown Top Position (px)', 'soda-theme' ),
		'description'     => esc_html__( 'Distance from the top edge.', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 0,
		'choices'         => array(
			'min'  => 0,
			'max'  => 500,
			'step' => 1,
		),
		'active_callback' => array(
			array(
				'setting'  => 'mobile_dropdown_position',
				'operator' => '===',
				'value'    => 'custom',
			),
		),
	)
);

/**
 * Mobile Dropdown Font Family
 */
new \Kirki\Field\Select(
	array(
		'settings' => 'mobile_dropdown_font_family',
		'label'    => esc_html__( 'Mobile Dropdown Font Family', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => 'inherit',
		'choices'  => array(
			'inherit'    => esc_html__( 'Inherit', 'soda-theme' ),
			'primary'    => esc_html__( 'Primary', 'soda-theme' ),
			'secondary'  => esc_html__( 'Secondary', 'soda-theme' ),
			'text'       => esc_html__( 'Text', 'soda-theme' ),
			'accent'     => esc_html__( 'Accent', 'soda-theme' ),
		),
	)
);

/**
 * Mobile Dropdown Font Size
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'mobile_dropdown_font_size',
		'label'     => esc_html__( 'Mobile Dropdown Font Size', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '24px',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .mobile-nav-menu a',
				'property' => 'font-size',
			),
		),
	)
);

/**
 * Mobile Dropdown Font Weight
 */
new \Kirki\Field\Select(
	array(
		'settings'  => 'mobile_dropdown_font_weight',
		'label'     => esc_html__( 'Mobile Dropdown Font Weight', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '600',
		'choices'   => array(
			'100' => esc_html__( '100 - Thin', 'soda-theme' ),
			'200' => esc_html__( '200 - Extra Light', 'soda-theme' ),
			'300' => esc_html__( '300 - Light', 'soda-theme' ),
			'400' => esc_html__( '400 - Normal', 'soda-theme' ),
			'500' => esc_html__( '500 - Medium', 'soda-theme' ),
			'600' => esc_html__( '600 - Semi Bold', 'soda-theme' ),
			'700' => esc_html__( '700 - Bold', 'soda-theme' ),
			'800' => esc_html__( '800 - Extra Bold', 'soda-theme' ),
			'900' => esc_html__( '900 - Black', 'soda-theme' ),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .mobile-nav-menu a',
				'property' => 'font-weight',
			),
		),
	)
);

/**
 * Mobile Dropdown Text Transform
 */
new \Kirki\Field\Select(
	array(
		'settings'  => 'mobile_dropdown_text_transform',
		'label'     => esc_html__( 'Mobile Dropdown Text Transform', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'none',
		'choices'   => array(
			'none'       => esc_html__( 'None', 'soda-theme' ),
			'uppercase'  => esc_html__( 'Uppercase', 'soda-theme' ),
			'lowercase'  => esc_html__( 'Lowercase', 'soda-theme' ),
			'capitalize' => esc_html__( 'Capitalize', 'soda-theme' ),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .mobile-nav-menu a',
				'property' => 'text-transform',
			),
		),
	)
);

/**
 * Mobile Dropdown Line Height
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'mobile_dropdown_line_height',
		'label'     => esc_html__( 'Mobile Dropdown Line Height', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '1.5',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .mobile-nav-menu a',
				'property' => 'line-height',
			),
		),
	)
);

/**
 * Mobile Dropdown Letter Spacing
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'mobile_dropdown_letter_spacing',
		'label'     => esc_html__( 'Mobile Dropdown Letter Spacing', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '0px',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .mobile-nav-menu a',
				'property' => 'letter-spacing',
			),
		),
	)
);

/**
 * Mobile Dropdown Text Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_dropdown_text_color',
		'label'     => esc_html__( 'Mobile Dropdown Text Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .mobile-nav-menu a',
				'property' => 'color',
			),
		),
	)
);

/**
 * Mobile Dropdown Text Hover Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_dropdown_text_hover_color',
		'label'     => esc_html__( 'Mobile Dropdown Text Hover Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .mobile-nav-menu a:hover, .site-navigation-dropdown .mobile-nav-menu .current-menu-item > a',
				'property' => 'color',
			),
		),
	)
);

/**
 * Mobile Dropdown Text Alignment
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings' => 'mobile_dropdown_text_align',
		'label'    => esc_html__( 'Mobile Dropdown Text Alignment', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => 'left',
		'choices'  => array(
			'left'   => esc_html__( 'Left', 'soda-theme' ),
			'center' => esc_html__( 'Center', 'soda-theme' ),
			'right'  => esc_html__( 'Right', 'soda-theme' ),
		),
		'transport' => 'postMessage',
	)
);

/**
 * Mobile Dropdown Padding
 */
new \Kirki\Pro\Field\Padding(
	array(
		'settings'    => 'mobile_dropdown_padding',
		'label'       => esc_html__( 'Mobile Dropdown Padding', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => array(
			'top'    => '100px',
			'bottom' => '40px',
			'left'   => '40px',
			'right'  => '40px',
		),
		'transport'   => 'postMessage',
		'output'      => array(
			array(
				'element' => '.site-navigation-dropdown .mobile-nav-menu',
			),
		),
	)
);

/**
 * Mobile Dropdown Item Gap
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'mobile_dropdown_item_gap',
		'label'       => esc_html__( 'Mobile Dropdown Item Gap (px)', 'soda-theme' ),
		'description' => esc_html__( 'Space between menu items.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Menu Border Bottom
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings' => 'menu_border_bottom',
		'label'    => esc_html__( 'Border Bottom', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => false,
		'choices'  => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Menu Border Bottom Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_border_bottom_color',
		'label'     => esc_html__( 'Border Bottom Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#F0F0F0',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-header',
				'property' => 'border-bottom-color',
			),
		),
	)
);

/**
 * Menu Sticky
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings' => 'menu_sticky',
		'label'    => esc_html__( 'Sticky', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => false,
		'choices'  => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Contact Email
 */
new \Kirki\Field\Text(
	array(
		'settings' => 'contact_email',
		'label'    => esc_html__( 'Contact Email', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => 'hello@info.com',
	)
);

/**
 * Menu Typography Font Family
 */
new \Kirki\Field\Select(
	array(
		'settings' => 'menu_typography_family',
		'label'    => esc_html__( 'Menu Font Family', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => 'inherit',
		'choices'  => array(
			'inherit'    => esc_html__( 'Inherit', 'soda-theme' ),
			'primary'    => esc_html__( 'Primary', 'soda-theme' ),
			'secondary'  => esc_html__( 'Secondary', 'soda-theme' ),
			'text'       => esc_html__( 'Text', 'soda-theme' ),
			'accent'     => esc_html__( 'Accent', 'soda-theme' ),
		),
	)
);

/**
 * Menu Font Size
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'menu_font_size',
		'label'     => esc_html__( 'Menu Font Size', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '16px',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation a',
				'property' => 'font-size',
			),
		),
	)
);

/**
 * Menu Text Transform
 */
new \Kirki\Field\Select(
	array(
		'settings'  => 'menu_text_transform',
		'label'     => esc_html__( 'Menu Text Transform', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'none',
		'choices'   => array(
			'none'       => esc_html__( 'None', 'soda-theme' ),
			'uppercase'  => esc_html__( 'Uppercase', 'soda-theme' ),
			'lowercase'  => esc_html__( 'Lowercase', 'soda-theme' ),
			'capitalize' => esc_html__( 'Capitalize', 'soda-theme' ),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation a',
				'property' => 'text-transform',
			),
		),
	)
);

/**
 * Menu Line Height
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'menu_line_height',
		'label'     => esc_html__( 'Menu Line Height', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '1.5',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation a',
				'property' => 'line-height',
			),
		),
	)
);

/**
 * Menu Letter Spacing
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'menu_letter_spacing',
		'label'     => esc_html__( 'Menu Letter Spacing', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '0px',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation a',
				'property' => 'letter-spacing',
			),
		),
	)
);

/**
 * Menu Font Weight
 */
new \Kirki\Field\Select(
	array(
		'settings'  => 'menu_font_weight',
		'label'     => esc_html__( 'Menu Font Weight', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '400',
		'choices'   => array(
			'100' => esc_html__( '100 - Thin', 'soda-theme' ),
			'200' => esc_html__( '200 - Extra Light', 'soda-theme' ),
			'300' => esc_html__( '300 - Light', 'soda-theme' ),
			'400' => esc_html__( '400 - Normal', 'soda-theme' ),
			'500' => esc_html__( '500 - Medium', 'soda-theme' ),
			'600' => esc_html__( '600 - Semi Bold', 'soda-theme' ),
			'700' => esc_html__( '700 - Bold', 'soda-theme' ),
			'800' => esc_html__( '800 - Extra Bold', 'soda-theme' ),
			'900' => esc_html__( '900 - Black', 'soda-theme' ),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation a',
				'property' => 'font-weight',
			),
		),
	)
);

/**
 * Sub Menu Typography Font Family
 */
new \Kirki\Field\Select(
	array(
		'settings' => 'menu_submenu_typography_family',
		'label'    => esc_html__( 'Sub Menu Font Family', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => 'inherit',
		'choices'  => array(
			'inherit'    => esc_html__( 'Inherit', 'soda-theme' ),
			'primary'    => esc_html__( 'Primary', 'soda-theme' ),
			'secondary'  => esc_html__( 'Secondary', 'soda-theme' ),
			'text'       => esc_html__( 'Text', 'soda-theme' ),
			'accent'     => esc_html__( 'Accent', 'soda-theme' ),
		),
	)
);

/**
 * Sub Menu Font Size
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'submenu_font_size',
		'label'     => esc_html__( 'Sub Menu Font Size', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '14px',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation .sub-menu a',
				'property' => 'font-size',
			),
		),
	)
);

/**
 * Sub Menu Text Transform
 */
new \Kirki\Field\Select(
	array(
		'settings'  => 'submenu_text_transform',
		'label'     => esc_html__( 'Sub Menu Text Transform', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'none',
		'choices'   => array(
			'none'       => esc_html__( 'None', 'soda-theme' ),
			'uppercase'  => esc_html__( 'Uppercase', 'soda-theme' ),
			'lowercase'  => esc_html__( 'Lowercase', 'soda-theme' ),
			'capitalize' => esc_html__( 'Capitalize', 'soda-theme' ),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation .sub-menu a',
				'property' => 'text-transform',
			),
		),
	)
);

/**
 * Sub Menu Line Height
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'submenu_line_height',
		'label'     => esc_html__( 'Sub Menu Line Height', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '1.5',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation .sub-menu a',
				'property' => 'line-height',
			),
		),
	)
);

/**
 * Sub Menu Letter Spacing
 */
new \Kirki\Field\Dimension(
	array(
		'settings'  => 'submenu_letter_spacing',
		'label'     => esc_html__( 'Sub Menu Letter Spacing', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '0px',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation .sub-menu a',
				'property' => 'letter-spacing',
			),
		),
	)
);

/**
 * Sub Menu Font Weight
 */
new \Kirki\Field\Select(
	array(
		'settings'  => 'submenu_font_weight',
		'label'     => esc_html__( 'Sub Menu Font Weight', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '400',
		'choices'   => array(
			'100' => esc_html__( '100 - Thin', 'soda-theme' ),
			'200' => esc_html__( '200 - Extra Light', 'soda-theme' ),
			'300' => esc_html__( '300 - Light', 'soda-theme' ),
			'400' => esc_html__( '400 - Normal', 'soda-theme' ),
			'500' => esc_html__( '500 - Medium', 'soda-theme' ),
			'600' => esc_html__( '600 - Semi Bold', 'soda-theme' ),
			'700' => esc_html__( '700 - Bold', 'soda-theme' ),
			'800' => esc_html__( '800 - Extra Bold', 'soda-theme' ),
			'900' => esc_html__( '900 - Black', 'soda-theme' ),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation .sub-menu a',
				'property' => 'font-weight',
			),
		),
	)
);

/**
 * Menu Navigation Padding
 */
new \Kirki\Pro\Field\Padding(
	array(
		'settings'    => 'main_navigation_padding',
		'label'       => esc_html__( 'Main Navigation Padding', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => array(
			'top'    => '0px',
			'bottom' => '0px',
			'left'   => '0px',
			'right'  => '0px',
		),
		'transport'   => 'postMessage',
		'output'      => array(
			array(
				'element' => '.main-navigation',
			),
		),
	)
);

/**
 * Menu Item Padding
 */
new \Kirki\Pro\Field\Padding(
	array(
		'settings'    => 'menu_item_padding',
		'label'       => esc_html__( 'Menu Item Padding', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => array(
			'top'    => '0px',
			'bottom' => '0px',
			'left'   => '0px',
			'right'  => '0px',
		),
		'transport'   => 'postMessage',
		'output'      => array(
			array(
				'element' => '.main-navigation a',
			),
		),
	)
);

/**
 * Menu Navigation Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_navigation_bg_color',
		'label'     => esc_html__( 'Menu Navigation Background Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'transparent',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Menu Navigation Box Shadow
 */
new \Kirki\Field\Text(
	array(
		'settings'    => 'menu_navigation_box_shadow',
		'label'       => esc_html__( 'Menu Navigation Box Shadow', 'soda-theme' ),
		'description' => esc_html__( 'Example: 0 2px 5px rgba(0,0,0,0.1)', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 'none',
		'transport'   => 'postMessage',
		'output'      => array(
			array(
				'element'  => '.main-navigation',
				'property' => 'box-shadow',
			),
		),
	)
);

/**
 * Menu Navigation Backdrop Filter Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'menu_navigation_backdrop_blur',
		'label'       => esc_html__( 'Menu Navigation Backdrop Blur', 'soda-theme' ),
		'description' => esc_html__( 'Blur amount in pixels for backdrop filter', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 0,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport'   => 'postMessage',
	)
);

/**
 * Menu Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_bg_color',
		'label'     => esc_html__( 'Background Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-header',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Menu Navigation Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'menu_navigation_border_radius',
		'label'     => esc_html__( 'Menu Navigation Border Radius', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		),
	)
);

/**
 * Menu Link Padding
 */
new \Kirki\Pro\Field\Padding(
	array(
		'settings'  => 'menu_link_padding',
		'label'     => esc_html__( 'Menu Link Padding', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => array(
			'padding-top'    => '0px',
			'padding-right'  => '0px',
			'padding-bottom' => '0px',
			'padding-left'   => '0px',
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element' => '.main-navigation a',
			),
		),
	)
);

/**
 * Enable Custom Link Color
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings' => 'menu_solid_link_custom',
		'label'    => esc_html__( 'Enable Custom Link Color', 'soda-theme' ),
		'section'  => 'soda_theme_menu_settings',
		'default'  => false,
		'choices'  => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Menu Link Color (Regular)
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'menu_link_color_regular',
		'label'           => esc_html__( 'Link Color (Regular)', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => '#656565',
		'choices'         => array(
			'alpha' => true,
		),
		'transport'       => 'postMessage',
		'output'          => array(
			array(
				'element'  => '.main-navigation a',
				'property' => 'color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'menu_solid_link_custom',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Menu Link Color (Hover)
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'menu_link_color_hover',
		'label'           => esc_html__( 'Link Color (Hover)', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => '#252525',
		'choices'         => array(
			'alpha' => true,
		),
		'transport'       => 'postMessage',
		'output'          => array(
			array(
				'element'  => '.main-navigation a:hover',
				'property' => 'color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'menu_solid_link_custom',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Menu Link Color (Active)
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'menu_link_color_active',
		'label'           => esc_html__( 'Link Color (Active)', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => '#656565',
		'choices'         => array(
			'alpha' => true,
		),
		'transport'       => 'postMessage',
		'output'          => array(
			array(
				'element'  => '.main-navigation .current-menu-item > a',
				'property' => 'color',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'menu_solid_link_custom',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Transparent Menu Link Color (Regular)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_transparent_link_color_regular',
		'label'     => esc_html__( 'Transparent Link Color (Regular)', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'rgba(255,255,255,1)',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-transparent-header .main-navigation a',
				'property' => 'color',
			),
		),
	)
);

/**
 * Transparent Menu Link Color (Hover)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_transparent_link_color_hover',
		'label'     => esc_html__( 'Transparent Link Color (Hover)', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'rgba(255,255,255,.5)',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-transparent-header .main-navigation a:hover',
				'property' => 'color',
			),
		),
	)
);

/**
 * Transparent Menu Link Color (Active)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_transparent_link_color_active',
		'label'     => esc_html__( 'Transparent Link Color (Active)', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => 'rgba(255,255,255,.5)',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-transparent-header .main-navigation .current-menu-item > a',
				'property' => 'color',
			),
		),
	)
);

/**
 * Sticky Header Menu Link Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_menu_link_color',
		'label'     => esc_html__( 'Sticky Header Menu Link Color', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#333333',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-transparent-header.has-sticky-header .site-header.sticky-header .main-navigation a',
				'property' => 'color',
			),
		),
	)
);

/**
 * Sticky Header Menu Link Color (Hover)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_menu_link_color_hover',
		'label'     => esc_html__( 'Sticky Header Menu Link Color (Hover)', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#000000',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-transparent-header.has-sticky-header .site-header.sticky-header .main-navigation a:hover',
				'property' => 'color',
			),
		),
	)
);

/**
 * Sticky Header Menu Link Color (Active)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_menu_link_color_active',
		'label'     => esc_html__( 'Sticky Header Menu Link Color (Active)', 'soda-theme' ),
		'section'   => 'soda_theme_menu_settings',
		'default'   => '#333333',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-transparent-header.has-sticky-header .site-header.sticky-header .main-navigation .current-menu-item > a',
				'property' => 'color',
			),
		),
	)
);

/**
 * Enable Right Side Grid (Background)
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'grid_line_right_bg_enable',
		'label'       => esc_html__( 'Enable Right Side Grid (Background)', 'soda-theme' ),
		'description' => esc_html__( 'Display a background grid on the right side.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Right Side Grid Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'grid_line_right_bg_color',
		'label'       => esc_html__( 'Right Side Background Color', 'soda-theme' ),
		'description' => esc_html__( 'Color of the right side background grid.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '#f5f5f5',
		'choices'     => array(
			'alpha' => true,
		),
	)
);

/**
 * Right Side Grid Background Width
 */
new \Kirki\Field\Dimension(
	array(
		'settings'    => 'grid_line_right_bg_width',
		'label'       => esc_html__( 'Right Side Background Width', 'soda-theme' ),
		'description' => esc_html__( 'Width of the right side background grid.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '50%',
	)
);

/**
 * Enable Right Side Grid (Outline)
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'grid_line_right_outline_enable',
		'label'       => esc_html__( 'Enable Right Side Grid (Outline)', 'soda-theme' ),
		'description' => esc_html__( 'Display an outline grid on the right side.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Right Side Grid Outline Color
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'grid_line_right_outline_color',
		'label'       => esc_html__( 'Right Side Outline Color', 'soda-theme' ),
		'description' => esc_html__( 'Color of the right side outline grid.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '#dddddd',
		'choices'     => array(
			'alpha' => true,
		),
	)
);

/**
 * Right Side Grid Outline Width
 */
new \Kirki\Field\Dimension(
	array(
		'settings'    => 'grid_line_right_outline_width',
		'label'       => esc_html__( 'Right Side Outline Width', 'soda-theme' ),
		'description' => esc_html__( 'Width of the right side outline grid.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '50%',
	)
);

/**
 * Right Side Grid Outline Thickness
 */
new \Kirki\Field\Dimension(
	array(
		'settings'    => 'grid_line_right_outline_thickness',
		'label'       => esc_html__( 'Right Side Outline Thickness', 'soda-theme' ),
		'description' => esc_html__( 'Border thickness of the right side outline.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'default'     => '1px',
	)
);
