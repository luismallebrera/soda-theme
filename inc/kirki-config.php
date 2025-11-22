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
 * Header Padding Top
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'header_padding_top',
		'label'       => esc_html__( 'Header Padding Top (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the top padding for the header.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 24,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	)
);

/**
 * Header Padding Bottom
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'header_padding_bottom',
		'label'       => esc_html__( 'Header Padding Bottom (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the bottom padding for the header.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 24,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	)
);

/**
 * Sticky Header Padding Top
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'sticky_header_padding_top',
		'label'       => esc_html__( 'Sticky Header Padding Top (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the top padding for the sticky header.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 12,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
	)
);

/**
 * Sticky Header Padding Bottom
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'sticky_header_padding_bottom',
		'label'       => esc_html__( 'Sticky Header Padding Bottom (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the bottom padding for the sticky header.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 12,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
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
 * Header Padding Left Unit
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings'  => 'header_padding_left_unit',
		'label'     => esc_html__( 'Left Padding Unit', 'soda-theme' ),
		'section'   => 'soda_theme_header_spacing',
		'default'   => 'px',
		'transport' => 'postMessage',
		'choices'   => array(
			'px' => esc_html__( 'px', 'soda-theme' ),
			'%'  => esc_html__( '%', 'soda-theme' ),
			'vw' => esc_html__( 'vw', 'soda-theme' ),
		),
	)
);

/**
 * Header Padding Left
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'header_padding_left',
		'label'       => esc_html__( 'Header Padding Left', 'soda-theme' ),
		'description' => esc_html__( 'Set the left padding for the header container.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 16,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	)
);

/**
 * Header Padding Right Unit
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings'  => 'header_padding_right_unit',
		'label'     => esc_html__( 'Right Padding Unit', 'soda-theme' ),
		'section'   => 'soda_theme_header_spacing',
		'default'   => 'px',
		'transport' => 'postMessage',
		'choices'   => array(
			'px' => esc_html__( 'px', 'soda-theme' ),
			'%'  => esc_html__( '%', 'soda-theme' ),
			'vw' => esc_html__( 'vw', 'soda-theme' ),
		),
	)
);

/**
 * Header Padding Right
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'header_padding_right',
		'label'       => esc_html__( 'Header Padding Right', 'soda-theme' ),
		'description' => esc_html__( 'Set the right padding for the header container.', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 16,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	)
);

/**
 * Header Container Max Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'header_container_max_width',
		'label'       => esc_html__( 'Header Container Max Width (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the maximum width for the header container (only applies to boxed layout).', 'soda-theme' ),
		'section'     => 'soda_theme_header_spacing',
		'default'     => 1200,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 600,
			'max'  => 2000,
			'step' => 10,
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

