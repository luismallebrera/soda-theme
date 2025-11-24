<?php
/**
 * Kirki Customizer Configuration
 *

	1823		return $this->get_settings();
	1824	}
		'option_type' => 'theme_mod',
	)
);

	)
);

/**
 * Re-add customizer Headline styling (cyan boxed headline)
 * Only prints CSS into the Customizer controls area; no JS.
 */
add_action( 'customize_controls_print_styles', 'soda_theme_customizer_headline_styles' );
function soda_theme_customizer_headline_styles() {
	?>
	<style>
	#customize-theme-controls .customize-pane-child.open {
		overflow: visible;
		background-color: #fff;
		width: calc(100% - 20px);
		margin-left: 10px;
	}

	.customize-control-kirki-headline, .customize-control-kirki-headline .control-label {
		padding: 15px 10px 16px !important;
		background: #00a0d2 !important;
		border-left: 0 !important;
		margin: 0 !important;
		color: #fff !important;
		text-transform: uppercase !important;
		text-align: center !important;
		border-radius: 0px !important;
		margin-bottom: 20px !important;
		left: -12px;
		position: relative;
		width: calc(100% + 24px);
	}

	#customize-controls ul {
		list-style: none !important;
	}

	#customize-controls ol {
		list-style: none !important;
	}

	.control-section-kirki-default, .control-section-kirki-outer {
		min-height: auto !important;
	}
	</style>
	<?php
}

/**
 * Re-add customizer Headline styling (cyan boxed headline)
 * This only affects the Customizer controls area.
 */
/* Removed custom Customizer CSS and grouping JS to fix runtime error / white page. */

/**
 * Add Logo Settings Panel
 */
new \Kirki\Panel(
	'soda_theme_header_panel',
	array(
		'priority' => 29,
		'title' => esc_html__( 'Soda Theme Header', 'soda-theme' ),
		'description' => esc_html__( 'Customize your header appearance and behavior.', 'soda-theme' ),
	)
);

/**
 * Logo Settings Section
 */
new \Kirki\Section(
	'soda_theme_logo_settings',
	array(
		'title' => esc_html__( 'Logo Settings', 'soda-theme' ),
		'panel' => 'soda_theme_header_panel',
		'priority' => 10,
	)
);

/**
 * Logo Settings Header
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'logo_settings_header',
		'section' => 'soda_theme_logo_settings',
		'priority' => 5,
		'default' => '<div style="padding: 10px 10px 11px; background: #00a0d2; border-left: 0; margin: 10px -5px; color: #fff; text-transform: uppercase; text-align: center; border-radius: 6px;"><strong>' . esc_html__( 'Logo Configuration', 'soda-theme' ) . '</strong></div>',
	)
);

/**
 * Sticky Logo Upload
 */
new \Kirki\Field\Image(
	array(
		'settings' => 'sticky_logo',
		'label' => esc_html__( 'Sticky Header Logo', 'soda-theme' ),
		'description' => esc_html__( 'Upload a logo to be displayed when the header is sticky/scrolled.', 'soda-theme' ),
		'section' => 'soda_theme_logo_settings',
		'default' => '',
		'priority' => 10,
		'choices' => array(
			'save_as' => 'id',
		),
	)
);

/**
 * Sticky Logo Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'sticky_logo_divider',
		'section' => 'soda_theme_logo_settings',
		'priority' => 15,
		'choices' => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Regular Logo Width
 */
new \Kirki\Field\Slider(
	array(
		'settings' => 'regular_logo_width',
		'label' => esc_html__( 'Regular Logo Width (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the width for the regular logo.', 'soda-theme' ),
		'section' => 'soda_theme_logo_settings',
		'default' => 150,
		'priority' => 20,
		'transport' => 'postMessage',
		'choices' => array(
			'min' => 50,
			'max' => 500,
			'step' => 5,
		),
	)
);

/**
 * Regular Logo Width Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'regular_logo_width_divider',
		'section' => 'soda_theme_logo_settings',
		'priority' => 25,
		'choices' => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Logo Width
 */
new \Kirki\Field\Slider(
	array(
		'settings' => 'sticky_logo_width',
		'label' => esc_html__( 'Sticky Logo Width (px)', 'soda-theme' ),
		'description' => esc_html__( 'Set the width for the sticky header logo.', 'soda-theme' ),
		'section' => 'soda_theme_logo_settings',
		'default' => 100,
		'priority' => 30,
		'transport' => 'postMessage',
		'choices' => array(
			'min' => 50,
			'max' => 300,
			'step' => 5,
		),
	)
);

/**
 * Sticky Logo Width Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'sticky_logo_width_divider',
		'section' => 'soda_theme_logo_settings',
		'priority' => 35,
		'choices' => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Header Layout Section
 */
new \Kirki\Section(
	'soda_theme_header_layout',
	array(
		'title' => esc_html__( 'Header Layout', 'soda-theme' ),
		'panel' => 'soda_theme_header_panel',
		'priority' => 20,
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

/* (file continues — restored from backup)
 * Note: the full original backup content from `inc/kirki-config.php.bak` has been restored here.
 */
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
 * Logo Settings Header
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'logo_settings_header',
		'section'  => 'soda_theme_logo_settings',
		'priority' => 5,
		'default'  => '<div style="padding: 10px 10px 11px; background: #00a0d2; border-left: 0; margin: 10px -5px; color: #fff; text-transform: uppercase; text-align: center; border-radius: 6px;"><strong>' . esc_html__( 'Logo Configuration', 'soda-theme' ) . '</strong></div>',
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
		'priority'    => 10,
		'choices'     => array(
			'save_as' => 'id',
		),
	)
);

/**
 * Sticky Logo Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'sticky_logo_divider',
		'section'  => 'soda_theme_logo_settings',
		'priority' => 15,
		'choices'  => array(
			'color' => '#dcdcdc',
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
		'priority'    => 20,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 50,
			'max'  => 500,
			'step' => 5,
		),
	)
);

/**
 * Regular Logo Width Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'regular_logo_width_divider',
		'section'  => 'soda_theme_logo_settings',
		'priority' => 25,
		'choices'  => array(
			'color' => '#dcdcdc',
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
		'priority'    => 30,
		'transport'   => 'postMessage',
		'choices'     => array(
			'min'  => 50,
			'max'  => 300,
			'step' => 5,
		),
	)
);

/**
 * Sticky Logo Width Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'sticky_logo_width_divider',
		'section'  => 'soda_theme_logo_settings',
		'priority' => 35,
		'choices'  => array(
			'color' => '#dcdcdc',
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
 * Header Layout Header
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'header_layout_header',
		'section'  => 'soda_theme_header_layout',
		'priority' => 5,
		'default'  => '<div style="padding: 10px 10px 11px; background: #00a0d2; border-left: 0; margin: 10px -5px; color: #fff; text-transform: uppercase; text-align: center; border-radius: 6px;"><strong>' . esc_html__( 'Layout Style', 'soda-theme' ) . '</strong></div>',
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
		'priority'    => 10,
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
 * Header Layout Style Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'header_layout_style_divider',
		'section'  => 'soda_theme_header_layout',
		'priority' => 15,
		'choices'  => array(
			'color' => '#dcdcdc',
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
 * Header Behavior Header
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'header_behavior_header',
		'section'  => 'soda_theme_header_behavior',
		'priority' => 5,
		'default'  => '<div style="padding: 10px 10px 11px; background: #00a0d2; border-left: 0; margin: 10px -5px; color: #fff; text-transform: uppercase; text-align: center; border-radius: 6px;"><strong>' . esc_html__( 'Behavior Options', 'soda-theme' ) . '</strong></div>',
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
		'priority'    => 10,
		'default'     => true,
		'choices'     => array(
			'on'  => esc_html__( 'Enabled', 'soda-theme' ),
			'off' => esc_html__( 'Disabled', 'soda-theme' ),
		),
	)
);

/**
 * Enable Sticky Header Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'enable_sticky_header_divider',
		'section'  => 'soda_theme_header_behavior',
		'priority' => 15,
		'choices'  => array(
			'color' => '#dcdcdc',
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
		'priority'        => 20,
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
 * Action Button Section
 */
new \Kirki\Section(
	'soda_theme_action_button',
	array(
		'title'    => esc_html__( 'Action Button', 'soda-theme' ),
		'panel'    => 'soda_theme_header_panel',
		'priority' => 42,
	)
);

/**
 * Enable Action Button
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'enable_action_button',
		'label'       => esc_html__( 'Enable Action Button', 'soda-theme' ),
		'description' => esc_html__( 'Display an action button in the header navigation area.', 'soda-theme' ),
		'section'     => 'soda_theme_action_button',
		'priority'    => 10,
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_1',
		'section'  => 'soda_theme_action_button',
		'priority' => 15,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Text
 */
new \Kirki\Field\Text(
	array(
		'settings'        => 'action_button_text',
		'label'           => esc_html__( 'Button Text', 'soda-theme' ),
		'description'     => esc_html__( 'Enter the text for the action button.', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 20,
		'default'         => esc_html__( 'Contact', 'soda-theme' ),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_2',
		'section'  => 'soda_theme_action_button',
		'priority' => 25,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button URL
 */
new \Kirki\Field\URL(
	array(
		'settings'        => 'action_button_url',
		'label'           => esc_html__( 'Button URL', 'soda-theme' ),
		'description'     => esc_html__( 'Enter the URL for the action button.', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 30,
		'default'         => '#',
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_3',
		'section'  => 'soda_theme_action_button',
		'priority' => 32,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Padding
 */
new \Kirki\Pro\Field\Padding(
	array(
		'settings'        => 'action_button_padding',
		'label'           => esc_html__( 'Action Button Padding', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 33,
		'default'         => array(
			'top'    => '0.5em',
			'bottom' => '0.5em',
			'left'   => '1.5em',
			'right'  => '1.5em',
		),
		'transport'       => 'auto',
		'output'          => array(
			array(
				'element' => '.action-button',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_4',
		'section'  => 'soda_theme_action_button',
		'priority' => 34,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Typography
 */
new \Kirki\Field\Typography(
	array(
		'settings'        => 'action_button_typography',
		'label'           => esc_html__( 'Action Button Typography', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 35,
		'default'         => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => '600',
			'font-size'      => '16px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'         => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'500',
				'600',
				'700',
			),
		),
		'transport'       => 'auto',
		'output'          => array(
			array(
				'element'   => '.action-button',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_5',
		'section'  => 'soda_theme_action_button',
		'priority' => 36,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Headline
 */
new \Kirki\Pro\Field\Headline(
	array(
		'settings' => 'action_button_headline',
		'section'  => 'soda_theme_action_button',
		'priority' => 40,
		'label'    => esc_html__( 'ACTION BUTTON', 'soda-theme' ),
		'choices'  => soda_theme_customizer_headline_styles(),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_6',
		'section'  => 'soda_theme_action_button',
		'priority' => 45,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Background
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'action_button_bg_color',
		'label'           => esc_html__( 'Action Button Background', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 50,
		'default'         => '#0073aa',
		'transport'       => 'auto',
		'output'          => array(
			array(
				'element'  => '.action-button',
				'property' => 'background-color',
				'suffix'   => ' !important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_7',
		'section'  => 'soda_theme_action_button',
		'priority' => 55,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Action Button Background
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'sticky_action_button_bg_color',
		'label'           => esc_html__( 'Sticky Action Button Background', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 60,
		'default'         => '#0073aa',
		'transport'       => 'auto',
		'output'          => array(
			array(
				'element'  => '.has-sticky-header .site-header.sticky-header .action-button',
				'property' => 'background-color',
				'suffix'   => ' !important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_8',
		'section'  => 'soda_theme_action_button',
		'priority' => 65,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Border
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'        => 'action_button_border',
		'label'           => esc_html__( 'Action Button Border (px)', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 70,
		'default'         => array(
			'border-top-width'    => '0px',
			'border-right-width'  => '0px',
			'border-bottom-width' => '0px',
			'border-left-width'   => '0px',
		),
		'transport'       => 'auto',
		'output'          => array(
			array(
				'element' => '.action-button',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_9',
		'section'  => 'soda_theme_action_button',
		'priority' => 75,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'action_button_border_radius',
		'label'           => esc_html__( 'Action Button Border Radius (px)', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 80,
		'default'         => 4,
		'transport'       => 'auto',
		'choices'         => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'          => array(
			array(
				'element'  => '.action-button',
				'property' => 'border-radius',
				'units'    => 'px',
				'suffix'   => ' !important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_10',
		'section'  => 'soda_theme_action_button',
		'priority' => 85,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Backdrop Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'        => 'action_button_backdrop_blur',
		'label'           => esc_html__( 'Action Button Backdrop Blur (px)', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 90,
		'default'         => 0,
		'transport'       => 'auto',
		'choices'         => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		),
		'output'          => array(
			array(
				'element'       => '.action-button',
				'property'      => 'backdrop-filter',
				'value_pattern' => 'blur($px)',
				'suffix'        => ' !important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'action_button_divider_11',
		'section'  => 'soda_theme_action_button',
		'priority' => 95,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Action Button Box Shadow
 */
new \Kirki\Field\Text(
	array(
		'settings'        => 'action_button_box_shadow',
		'label'           => esc_html__( 'Action Button Box Shadow', 'soda-theme' ),
		'description'     => esc_html__( 'Example: 0 2px 4px rgba(0,0,0,0.1)', 'soda-theme' ),
		'section'         => 'soda_theme_action_button',
		'priority'        => 100,
		'default'         => 'none',
		'transport'       => 'auto',
		'output'          => array(
			array(
				'element'  => '.action-button',
				'property' => 'box-shadow',
				'suffix'   => ' !important',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_action_button',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * Color Settings Section
 */
new \Kirki\Section(
	'soda_theme_color_settings',
	array(
		'title'    => esc_html__( 'Color Settings', 'soda-theme' ),
		'panel'    => 'soda_theme_header_panel',
		'priority' => 45,
		'priority' => 45,
	)
);

/**
 * Header Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_bg_color',
		'label'     => esc_html__( 'Header Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 10,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_1',
		'section'  => 'soda_theme_color_settings',
		'priority' => 15,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);



/**
 * HEADER CONTAINER
 */
new \Kirki\Pro\Field\Headline(
	array(
		'settings' => 'header_container_headline',
		'label'    => esc_html__( 'HEADER CONTAINER', 'soda-theme' ),
		'section'  => 'soda_theme_color_settings',
		'priority' => 20,
		'choices'  => array(
			'background-color' => '#00a0d2',
			'color'            => '#ffffff',
		),
	)
);

/**
 * Header Container Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'header_container_bg_color',
		'label'     => esc_html__( 'Header Container Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 25,
		'default'   => 'transparent',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.header-container',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_2',
		'section'  => 'soda_theme_color_settings',
		'priority' => 30,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Header Container Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_container_bg_color',
		'label'     => esc_html__( 'Sticky Header Container Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 35,
		'default'   => 'transparent',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-sticky-header .site-header.sticky-header .header-container',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_3',
		'section'  => 'soda_theme_color_settings',
		'priority' => 40,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Header Container Border
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'  => 'header_container_border',
		'label'     => esc_html__( 'Header Container Border Width', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 45,
		'default'   => array(
			'border-top-width'    => '0px',
			'border-right-width'  => '0px',
			'border-bottom-width' => '0px',
			'border-left-width'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'border-top-width'    => esc_html__( 'Top', 'soda-theme' ),
				'border-right-width'  => esc_html__( 'Right', 'soda-theme' ),
				'border-bottom-width' => esc_html__( 'Bottom', 'soda-theme' ),
				'border-left-width'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.header-container, .has-sticky-header .site-header.sticky-header .header-container',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_4a',
		'section'  => 'soda_theme_color_settings',
		'priority' => 47,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Header Container Border Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'header_container_border_color',
		'label'     => esc_html__( 'Header Container Border Color', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 48,
		'default'   => '#000000',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.header-container, .has-sticky-header .site-header.sticky-header .header-container',
				'property' => 'border-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_4',
		'section'  => 'soda_theme_color_settings',
		'priority' => 50,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Header Container Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'header_container_border_radius',
		'label'     => esc_html__( 'Header Container Border Radius (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 55,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.header-container, .has-sticky-header .site-header.sticky-header .header-container',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_5',
		'section'  => 'soda_theme_color_settings',
		'priority' => 60,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Header Container Backdrop Filter Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'header_container_backdrop_blur',
		'label'     => esc_html__( 'Header Container Backdrop Blur (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 65,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_6',
		'section'  => 'soda_theme_color_settings',
		'priority' => 70,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Header Container Box Shadow
 */
new \Kirki\Field\Text(
	array(
		'settings'  => 'header_container_box_shadow',
		'label'     => esc_html__( 'Header Container Box Shadow', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 75,
		'default'   => '',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.header-container, .has-sticky-header .site-header.sticky-header .header-container',
				'property' => 'box-shadow',
			),
		),
	)
);

/**
 * LOGO BOX
 */
new \Kirki\Pro\Field\Headline(
	array(
		'settings' => 'logo_box_headline',
		'label'    => esc_html__( 'LOGO BOX', 'soda-theme' ),
		'section'  => 'soda_theme_color_settings',
		'priority' => 76,
		'choices'  => array(
			'background-color' => '#00a0d2',
			'color'            => '#ffffff',
		),
	)
);
/**
 * Logo Box Background
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'logo_box_bg_color',
		'label'     => esc_html__( 'Logo Box Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 77,
		'default'   => 'transparent',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-branding',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'logo_box_divider_1',
		'section'  => 'soda_theme_color_settings',
		'priority' => 78,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Logo Box Sticky Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_logo_box_bg_color',
		'label'     => esc_html__( 'Logo Box Sticky Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 79,
		'default'   => 'transparent',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-sticky-header .site-header.sticky-header .site-branding',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'logo_box_divider_2',
		'section'  => 'soda_theme_color_settings',
		'priority' => 80,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Logo Box Border Width
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'  => 'logo_box_border',
		'label'     => esc_html__( 'Logo Box Border Width', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 81,
		'default'   => array(
			'border-top-width'    => '0px',
			'border-right-width'  => '0px',
			'border-bottom-width' => '0px',
			'border-left-width'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'border-top-width'    => esc_html__( 'Top', 'soda-theme' ),
				'border-right-width'  => esc_html__( 'Right', 'soda-theme' ),
				'border-bottom-width' => esc_html__( 'Bottom', 'soda-theme' ),
				'border-left-width'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.site-branding',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'logo_box_divider_3',
		'section'  => 'soda_theme_color_settings',
		'priority' => 82,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Logo Box Border Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'logo_box_border_color',
		'label'     => esc_html__( 'Logo Box Border Color', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 83,
		'default'   => '#000000',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-branding',
				'property' => 'border-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'logo_box_divider_4',
		'section'  => 'soda_theme_color_settings',
		'priority' => 84,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Logo Box Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'logo_box_border_radius',
		'label'     => esc_html__( 'Logo Box Border Radius (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 85,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-branding',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'logo_box_divider_5',
		'section'  => 'soda_theme_color_settings',
		'priority' => 86,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Logo Box Backdrop Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'logo_box_backdrop_blur',
		'label'     => esc_html__( 'Logo Box Backdrop Blur (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 87,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'logo_box_divider_6',
		'section'  => 'soda_theme_color_settings',
		'priority' => 88,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Logo Box Box Shadow
 */
new \Kirki\Field\Text(
	array(
		'settings'  => 'logo_box_box_shadow',
		'label'     => esc_html__( 'Logo Box Box Shadow', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 89,
		'default'   => '',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-branding',
				'property' => 'box-shadow',
			),
		),
	)
);


		/**
		 * MENU NAVIGATION - wrapper end
		 */
		new \Kirki\Field\Custom(
			array(
				'settings' => 'menu_navigation_wrapper_end',
				'section'  => 'soda_theme_color_settings',
				'priority' => 149,
				'default'  => '</div>',
			)
		);




/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_7',
		'section'  => 'soda_theme_color_settings',
		'priority' => 80,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * MENU NAVIGATION
 */
new \Kirki\Pro\Field\Headline(
	array(
		'settings' => 'menu_navigation_headline',
		'label'    => esc_html__( 'MENU NAVIGATION', 'soda-theme' ),
		'section'  => 'soda_theme_color_settings',
		'priority' => 85,
		'choices'  => array(
			'background-color' => '#00a0d2',
			'color'            => '#ffffff',
		),
	)
);

/**
 * Menu Navigation Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_navigation_bg_color',
		'label'     => esc_html__( 'Menu Navigation Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 90,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_8',
		'section'  => 'soda_theme_color_settings',
		'priority' => 95,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Menu Navigation Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_menu_navigation_bg_color',
		'label'     => esc_html__( 'Sticky Menu Navigation Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 100,
		'default'   => 'transparent',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-sticky-header .site-header.sticky-header .main-navigation',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_9',
		'section'  => 'soda_theme_color_settings',
		'priority' => 105,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Navigation Border
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'  => 'menu_navigation_border',
		'label'     => esc_html__( 'Menu Navigation Border Width', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 110,
		'default'   => array(
			'border-top-width'    => '0px',
			'border-right-width'  => '0px',
			'border-bottom-width' => '0px',
			'border-left-width'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'border-top-width'    => esc_html__( 'Top', 'soda-theme' ),
				'border-right-width'  => esc_html__( 'Right', 'soda-theme' ),
				'border-bottom-width' => esc_html__( 'Bottom', 'soda-theme' ),
				'border-left-width'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.main-navigation, .has-sticky-header .site-header.sticky-header .main-navigation',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_10a',
		'section'  => 'soda_theme_color_settings',
		'priority' => 112,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Navigation Border Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_navigation_border_color',
		'label'     => esc_html__( 'Menu Navigation Border Color', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 113,
		'default'   => '#000000',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation, .has-sticky-header .site-header.sticky-header .main-navigation',
				'property' => 'border-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_10',
		'section'  => 'soda_theme_color_settings',
		'priority' => 115,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Navigation Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'menu_navigation_border_radius',
		'label'     => esc_html__( 'Menu Navigation Border Radius (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 120,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation, .has-sticky-header .site-header.sticky-header .main-navigation',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_11',
		'section'  => 'soda_theme_color_settings',
		'priority' => 125,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Navigation Backdrop Filter Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'menu_navigation_backdrop_blur',
		'label'     => esc_html__( 'Menu Navigation Backdrop Blur (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 130,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_12',
		'section'  => 'soda_theme_color_settings',
		'priority' => 135,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Navigation Box Shadow
 */
new \Kirki\Field\Text(
	array(
		'settings'  => 'menu_navigation_box_shadow',
		'label'     => esc_html__( 'Menu Navigation Box Shadow', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 140,
		'default'   => '',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation, .has-sticky-header .site-header.sticky-header .main-navigation',
				'property' => 'box-shadow',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'menu_navigation_divider_separator',
		'section'  => 'soda_theme_color_settings',
		'priority' => 141,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Enable Menu Item Separators
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'    => 'enable_menu_separators',
		'label'       => esc_html__( 'Enable Menu Item Separators', 'soda-theme' ),
		'description' => esc_html__( 'Add vertical line separators between menu items.', 'soda-theme' ),
		'section'     => 'soda_theme_color_settings',
		'priority'    => 141,
		'default'     => false,
		'choices'     => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

	/**
	 * SUBMENU NAVIGATION
	 */
	new \Kirki\Pro\Field\Headline(
		array(
			'settings' => 'submenu_navigation_headline',
			'label'    => esc_html__( 'SUBMENU NAVIGATION', 'soda-theme' ),
			'section'  => 'soda_theme_color_settings',
			'priority' => 142,
			'choices'  => array(
				'background-color' => '#00a0d2',
				'color'            => '#ffffff',
			),
		)
	);

	/**
	 * Submenu Navigation Background Color
	 */
	new \Kirki\Field\Color(
		array(
			'settings'  => 'submenu_navigation_bg_color',
			'label'     => esc_html__( 'Submenu Navigation Background', 'soda-theme' ),
			'section'   => 'soda_theme_color_settings',
			'priority'  => 143,
			'default'   => 'transparent',
			'choices'   => array(
				'alpha' => true,
			),
			'transport' => 'postMessage',
			'output'    => array(
				array(
					'element'  => '.main-navigation .sub-menu, .main-navigation ul.sub-menu',
					'property' => 'background-color',
				),
			),
		)
	);

	/**
	 * Divider
	 */
	new \Kirki\Pro\Field\Divider(
		array(
			'settings' => 'color_divider_submenu_1',
			'section'  => 'soda_theme_color_settings',
			'priority' => 144,
			'choices'  => array(
				'color' => '#dcdcdc',
			),
		)
	);

	/**
	 * Sticky Submenu Navigation Background Color
	 */
	new \Kirki\Field\Color(
		array(
			'settings'  => 'sticky_submenu_navigation_bg_color',
			'label'     => esc_html__( 'Sticky Submenu Navigation Background', 'soda-theme' ),
			'section'   => 'soda_theme_color_settings',
			'priority'  => 145,
			'default'   => 'transparent',
			'choices'   => array(
				'alpha' => true,
			),
			'transport' => 'postMessage',
			'output'    => array(
				array(
					'element'  => '.has-sticky-header .site-header.sticky-header .main-navigation .sub-menu, .has-sticky-header .site-header.sticky-header .main-navigation ul.sub-menu',
					'property' => 'background-color',
				),
			),
		)
	);

	/**
	 * Divider
	 */
	new \Kirki\Pro\Field\Divider(
		array(
			'settings' => 'color_divider_submenu_2',
			'section'  => 'soda_theme_color_settings',
			'priority' => 146,
			'choices'  => array(
				'color' => '#dcdcdc',
			),
		)
	);

	/**
	 * Submenu Navigation Border Width
	 */
	new \Kirki\Field\Dimensions(
		array(
			'settings'  => 'submenu_navigation_border',
			'label'     => esc_html__( 'Submenu Navigation Border Width', 'soda-theme' ),
			'section'   => 'soda_theme_color_settings',
			'priority'  => 147,
			'default'   => array(
				'border-top-width'    => '0px',
				'border-right-width'  => '0px',
				'border-bottom-width' => '0px',
				'border-left-width'   => '0px',
			),
			'choices'   => array(
				'labels' => array(
					'border-top-width'    => esc_html__( 'Top', 'soda-theme' ),
					'border-right-width'  => esc_html__( 'Right', 'soda-theme' ),
					'border-bottom-width' => esc_html__( 'Bottom', 'soda-theme' ),
					'border-left-width'   => esc_html__( 'Left', 'soda-theme' ),
				),
			),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.main-navigation .sub-menu, .has-sticky-header .site-header.sticky-header .main-navigation .sub-menu',
			),
		),
	)
	);	/**
	 * Divider
	 */
	new \Kirki\Pro\Field\Divider(
		array(
			'settings' => 'color_divider_submenu_3',
			'section'  => 'soda_theme_color_settings',
			'priority' => 148,
			'choices'  => array(
				'color' => '#dcdcdc',
			),
		)
	);

	/**
	 * Submenu Navigation Border Radius
	 */
	new \Kirki\Field\Slider(
		array(
			'settings'  => 'submenu_navigation_border_radius',
			'label'     => esc_html__( 'Submenu Navigation Border Radius (px)', 'soda-theme' ),
			'section'   => 'soda_theme_color_settings',
			'priority'  => 149,
			'default'   => 0,
			'choices'   => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
			'transport' => 'postMessage',
			'output'    => array(
				array(
					'element'  => '.main-navigation .sub-menu, .has-sticky-header .site-header.sticky-header .main-navigation .sub-menu',
					'property' => 'border-radius',
					'units'    => 'px',
				),
			),
		)
	);

	/**
	 * Divider
	 */
	new \Kirki\Pro\Field\Divider(
		array(
			'settings' => 'color_divider_submenu_4',
			'section'  => 'soda_theme_color_settings',
			'priority' => 150,
			'choices'  => array(
				'color' => '#dcdcdc',
			),
		)
	);

	/**
	 * Submenu Navigation Backdrop Filter Blur
	 */
	new \Kirki\Field\Slider(
		array(
			'settings'  => 'submenu_navigation_backdrop_blur',
			'label'     => esc_html__( 'Submenu Navigation Backdrop Blur (px)', 'soda-theme' ),
			'section'   => 'soda_theme_color_settings',
			'priority'  => 151,
			'default'   => 0,
			'choices'   => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
			'transport' => 'postMessage',
		)
	);

	/**
	 * Divider
	 */
	new \Kirki\Pro\Field\Divider(
		array(
			'settings' => 'color_divider_submenu_5',
			'section'  => 'soda_theme_color_settings',
			'priority' => 152,
			'choices'  => array(
				'color' => '#dcdcdc',
			),
		)
	);

	/**
	 * Submenu Navigation Box Shadow
	 */
new \Kirki\Field\Text(
    array(
        'settings'  => 'submenu_navigation_box_shadow',
        'label'     => esc_html__( 'Submenu Navigation Box Shadow', 'soda-theme' ),
        'section'   => 'soda_theme_color_settings',
        'priority'  => 153,
        'default'   => '',
        'transport' => 'postMessage',
        'output'    => array(
            array(
                'element'  => '.main-navigation .sub-menu, .has-sticky-header .site-header.sticky-header .main-navigation .sub-menu',
                'property' => 'box-shadow',
            ),
        ),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_submenu_6',
		'section'  => 'soda_theme_color_settings',
		'priority' => 154,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Submenu Link Text Alignment
 */
new \Kirki\Field\Radio_Buttonset(
	array(
		'settings'  => 'submenu_link_text_align',
		'label'     => esc_html__( 'Submenu Link Text Alignment', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 155,
		'default'   => 'left',
		'choices'   => array(
			'left'   => esc_html__( 'Left', 'soda-theme' ),
			'center' => esc_html__( 'Center', 'soda-theme' ),
			'right'  => esc_html__( 'Right', 'soda-theme' ),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.main-navigation ul ul a',
				'property' => 'text-align',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_submenu_7',
		'section'  => 'soda_theme_color_settings',
		'priority' => 156,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Submenu Link Padding
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'  => 'submenu_link_padding',
		'label'     => esc_html__( 'Submenu Link Padding', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 157,
		'default'   => array(
			'padding-top'    => '10px',
			'padding-right'  => '20px',
			'padding-bottom' => '10px',
			'padding-left'   => '20px',
		),
		'choices'   => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Top', 'soda-theme' ),
				'padding-right'  => esc_html__( 'Right', 'soda-theme' ),
				'padding-bottom' => esc_html__( 'Bottom', 'soda-theme' ),
				'padding-left'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element' => '.main-navigation ul ul a',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_submenu_8',
		'section'  => 'soda_theme_color_settings',
		'priority' => 158,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Enable Submenu Vertical Separators
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings'  => 'enable_submenu_separators',
		'label'     => esc_html__( 'Enable Submenu Vertical Separators', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority'  => 159,
		'default'   => false,
		'choices'   => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_submenu_9',
		'section'  => 'soda_theme_color_settings',
		'priority' => 160,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Submenu Separator Color
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'submenu_separator_color',
		'label'           => esc_html__( 'Submenu Separator Color', 'soda-theme' ),
		'section'         => 'soda_theme_color_settings',
		'priority'        => 161,
		'default'         => '#dcdcdc',
		'choices'         => array(
			'alpha' => true,
		),
		'transport'       => 'postMessage',
		'active_callback' => array(
			array(
				'setting'  => 'enable_submenu_separators',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

/**
 * MOBILE TOGGLE
 */
new \Kirki\Pro\Field\Headline(
	array(
		'settings' => 'mobile_toggle_headline',
		'label'    => esc_html__( 'MOBILE TOGGLE', 'soda-theme' ),
		'section'  => 'soda_theme_color_settings',
		'priority' => 165,
		'choices'  => array(
			'background-color' => '#00a0d2',
			'color'            => '#ffffff',
		),
	)
);

/**
 * MOBILE TOGGLE - wrapper start
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'mobile_toggle_wrapper_start',
		'section'  => 'soda_theme_color_settings',
		'priority' => 164,
		'default'  => '<div class="soda-customizer-section soda-mobile-toggle">',
	)
);


/**
 * Mobile Menu Toggle Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_menu_toggle_bg_color',
		'label'     => esc_html__( 'Mobile Toggle Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 166,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_16',
		'section'  => 'soda_theme_color_settings',
		'priority' => 168,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Mobile Toggle Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_mobile_menu_toggle_bg_color',
		'label'     => esc_html__( 'Sticky Mobile Toggle Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 170,
		'default'   => 'rgba(255, 255, 255, 0.45)',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-sticky-header .site-header.sticky-header .site-navigation-toggle-holder',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_17',
		'section'  => 'soda_theme_color_settings',
		'priority' => 172,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Toggle Border
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'  => 'mobile_toggle_border',
		'label'     => esc_html__( 'Mobile Toggle Border Width', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 174,
		'default'   => array(
			'border-top-width'    => '0px',
			'border-right-width'  => '0px',
			'border-bottom-width' => '0px',
			'border-left-width'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'border-top-width'    => esc_html__( 'Top', 'soda-theme' ),
				'border-right-width'  => esc_html__( 'Right', 'soda-theme' ),
				'border-bottom-width' => esc_html__( 'Bottom', 'soda-theme' ),
				'border-left-width'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.site-navigation-toggle-holder, .has-sticky-header .site-header.sticky-header .site-navigation-toggle-holder',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_18a',
		'section'  => 'soda_theme_color_settings',
		'priority' => 176,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Toggle Border Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_toggle_border_color',
		'label'     => esc_html__( 'Mobile Toggle Border Color', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 178,
		'default'   => '#000000',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-toggle-holder, .has-sticky-header .site-header.sticky-header .site-navigation-toggle-holder',
				'property' => 'border-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_18',
		'section'  => 'soda_theme_color_settings',
		'priority' => 180,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Toggle Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'mobile_toggle_border_radius',
		'label'     => esc_html__( 'Mobile Toggle Border Radius (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 182,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-toggle-holder, .has-sticky-header .site-header.sticky-header .site-navigation-toggle-holder',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_19',
		'section'  => 'soda_theme_color_settings',
		'priority' => 184,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Toggle Backdrop Filter Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'mobile_toggle_backdrop_blur',
		'label'     => esc_html__( 'Mobile Toggle Backdrop Blur (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 186,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_20',
		'section'  => 'soda_theme_color_settings',
		'priority' => 188,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Toggle Box Shadow
 */
new \Kirki\Field\Text(
	array(
		'settings'  => 'mobile_toggle_box_shadow',
		'label'     => esc_html__( 'Mobile Toggle Box Shadow', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 190,
		'default'   => '',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-toggle-holder, .has-sticky-header .site-header.sticky-header .site-navigation-toggle-holder',
				'property' => 'box-shadow',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_21',
		'section'  => 'soda_theme_color_settings',
		'priority' => 192,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * MOBILE TOGGLE - wrapper end
 */
new \Kirki\Field\Custom(
    array(
        'settings' => 'mobile_toggle_wrapper_end',
        'section'  => 'soda_theme_color_settings',
        'priority' => 191,
        'default'  => '</div>',
    )
);


/**
 * MOBILE DROPDOWN
 */
new \Kirki\Pro\Field\Headline(
	array(
		'settings' => 'mobile_dropdown_headline',
		'label'    => esc_html__( 'MOBILE DROPDOWN', 'soda-theme' ),
		'section'  => 'soda_theme_color_settings',
		'priority' => 215,
		'choices'  => array(
			'background-color' => '#00a0d2',
			'color'            => '#ffffff',
		),
	)
);

/**
 * MOBILE DROPDOWN - wrapper start
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'mobile_dropdown_wrapper_start',
		'section'  => 'soda_theme_color_settings',
		'priority' => 214,
		'default'  => '<div class="soda-customizer-section soda-mobile-dropdown">',
	)
);


/**
 * Mobile Dropdown Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_dropdown_bg_color',
		'label'     => esc_html__( 'Mobile Dropdown Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 220,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_22',
		'section'  => 'soda_theme_color_settings',
		'priority' => 225,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * MOBILE DROPDOWN - wrapper end
 */
new \Kirki\Field\Custom(
    array(
        'settings' => 'mobile_dropdown_wrapper_end',
        'section'  => 'soda_theme_color_settings',
        'priority' => 224,
        'default'  => '</div>',
    )
);


/**
 * Mobile Dropdown Border
 */
new \Kirki\Field\Dimensions(
	array(
		'settings'  => 'mobile_dropdown_border',
		'label'     => esc_html__( 'Mobile Dropdown Border Width', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 230,
		'default'   => array(
			'border-top-width'    => '0px',
			'border-right-width'  => '0px',
			'border-bottom-width' => '0px',
			'border-left-width'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'border-top-width'    => esc_html__( 'Top', 'soda-theme' ),
				'border-right-width'  => esc_html__( 'Right', 'soda-theme' ),
				'border-bottom-width' => esc_html__( 'Bottom', 'soda-theme' ),
				'border-left-width'   => esc_html__( 'Left', 'soda-theme' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .site-navigation-background',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_23a',
		'section'  => 'soda_theme_color_settings',
		'priority' => 232,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Dropdown Border Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_dropdown_border_color',
		'label'     => esc_html__( 'Mobile Dropdown Border Color', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 233,
		'default'   => '#000000',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .site-navigation-background',
				'property' => 'border-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_23',
		'section'  => 'soda_theme_color_settings',
		'priority' => 235,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Dropdown Border Radius
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'mobile_dropdown_border_radius',
		'label'     => esc_html__( 'Mobile Dropdown Border Radius (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 240,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .site-navigation-background',
				'property' => 'border-radius',
				'units'    => 'px',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_24',
		'section'  => 'soda_theme_color_settings',
		'priority' => 245,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Dropdown Backdrop Filter Blur
 */
new \Kirki\Field\Slider(
	array(
		'settings'  => 'mobile_dropdown_backdrop_blur',
		'label'     => esc_html__( 'Mobile Dropdown Backdrop Blur (px)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 250,
		'default'   => 0,
		'choices'   => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_25',
		'section'  => 'soda_theme_color_settings',
		'priority' => 255,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Dropdown Box Shadow
 */
new \Kirki\Field\Text(
	array(
		'settings'  => 'mobile_dropdown_box_shadow',
		'label'     => esc_html__( 'Mobile Dropdown Box Shadow', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 260,
		'default'   => '',
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-dropdown .site-navigation-background',
				'property' => 'box-shadow',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_26',
		'section'  => 'soda_theme_color_settings',
		'priority' => 265,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Toggle Text Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_menu_toggle_text_color',
		'label'     => esc_html__( 'Mobile Toggle Text/Icon', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 270,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_27',
		'section'  => 'soda_theme_color_settings',
		'priority' => 275,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Hamburger Lines Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'hamburger_line_color',
		'label'     => esc_html__( 'Hamburger Icon Lines', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 280,
		'default'   => '#ecf0f1',
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_28',
		'section'  => 'soda_theme_color_settings',
		'priority' => 285,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Dropdown Text Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_dropdown_text_color',
		'label'     => esc_html__( 'Mobile Dropdown Text', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 290,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_29',
		'section'  => 'soda_theme_color_settings',
		'priority' => 295,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Dropdown Text Hover Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'mobile_dropdown_text_hover_color',
		'label'     => esc_html__( 'Mobile Dropdown Hover', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 300,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_30',
		'section'  => 'soda_theme_color_settings',
		'priority' => 305,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Header Border Bottom Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_border_bottom_color',
		'label'     => esc_html__( 'Header Border Bottom', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 310,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_31',
		'section'  => 'soda_theme_color_settings',
		'priority' => 315,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Enable Custom Link Color
 */
new \Kirki\Field\Checkbox_Switch(
	array(
		'settings' => 'menu_solid_link_custom',
		'label'    => esc_html__( 'Enable Custom Link Colors', 'soda-theme' ),
		'section'  => 'soda_theme_color_settings',
		'priority' => 320,
		'default'  => false,
		'choices'  => array(
			'on'  => esc_html__( 'Yes', 'soda-theme' ),
			'off' => esc_html__( 'No', 'soda-theme' ),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_32',
		'section'  => 'soda_theme_color_settings',
		'priority' => 325,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Link Color (Regular)
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'menu_link_color_regular',
		'label'           => esc_html__( 'Menu Link (Regular)', 'soda-theme' ),
		'section'         => 'soda_theme_color_settings',
		'priority' => 330,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_33',
		'section'  => 'soda_theme_color_settings',
		'priority' => 335,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Link Color (Hover)
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'menu_link_color_hover',
		'label'           => esc_html__( 'Menu Link (Hover)', 'soda-theme' ),
		'section'         => 'soda_theme_color_settings',
		'priority' => 340,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_34',
		'section'  => 'soda_theme_color_settings',
		'priority' => 345,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Menu Link Color (Active)
 */
new \Kirki\Field\Color(
	array(
		'settings'        => 'menu_link_color_active',
		'label'           => esc_html__( 'Menu Link (Active)', 'soda-theme' ),
		'section'         => 'soda_theme_color_settings',
		'priority' => 350,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_35',
		'section'  => 'soda_theme_color_settings',
		'priority' => 355,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Transparent Menu Link Color (Regular)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_transparent_link_color_regular',
		'label'     => esc_html__( 'Transparent Link (Regular)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 360,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_36',
		'section'  => 'soda_theme_color_settings',
		'priority' => 365,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Transparent Menu Link Color (Hover)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_transparent_link_color_hover',
		'label'     => esc_html__( 'Transparent Link (Hover)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 370,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_37',
		'section'  => 'soda_theme_color_settings',
		'priority' => 375,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Transparent Menu Link Color (Active)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'menu_transparent_link_color_active',
		'label'     => esc_html__( 'Transparent Link (Active)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 380,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_38',
		'section'  => 'soda_theme_color_settings',
		'priority' => 385,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Header Menu Link Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_menu_link_color',
		'label'     => esc_html__( 'Sticky Menu Link (Regular)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 390,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_39',
		'section'  => 'soda_theme_color_settings',
		'priority' => 395,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Header Menu Link Color (Hover)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_menu_link_color_hover',
		'label'     => esc_html__( 'Sticky Menu Link (Hover)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 400,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_40',
		'section'  => 'soda_theme_color_settings',
		'priority' => 405,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Header Menu Link Color (Active)
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_menu_link_color_active',
		'label'     => esc_html__( 'Sticky Menu Link (Active)', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 410,
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
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_41',
		'section'  => 'soda_theme_color_settings',
		'priority' => 415,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Sticky Header Background Color
 */
new \Kirki\Field\Color(
	array(
		'settings'  => 'sticky_header_bg_color',
		'label'     => esc_html__( 'Sticky Header Background', 'soda-theme' ),
		'section'   => 'soda_theme_color_settings',
		'priority' => 420,
		'default'   => '#ffffff',
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.has-transparent-header.has-sticky-header .site-header.sticky-header',
				'property' => 'background-color',
			),
		),
	)
);

/**
 * Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'color_divider_42',
		'section'  => 'soda_theme_color_settings',
		'priority' => 425,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
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
		'responsive'  => true,
		'default'     => array(
			'desktop' => array(
				'padding-top'    => '24px',
				'padding-right'  => '0px',
				'padding-bottom' => '24px',
				'padding-left'   => '0px',
			),
			'tablet'  => array(
				'padding-top'    => '20px',
				'padding-right'  => '0px',
				'padding-bottom' => '20px',
				'padding-left'   => '0px',
			),
			'mobile'  => array(
				'padding-top'    => '16px',
				'padding-right'  => '0px',
				'padding-bottom' => '16px',
				'padding-left'   => '0px',
			),
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
				'element'     => '.site-header',
				'media_query' => array(
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				),
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
		'responsive'  => true,
		'default'     => array(
			'desktop' => array(
				'padding-top'    => '12px',
				'padding-right'  => '0px',
				'padding-bottom' => '12px',
				'padding-left'   => '0px',
			),
			'tablet'  => array(
				'padding-top'    => '10px',
				'padding-right'  => '0px',
				'padding-bottom' => '10px',
				'padding-left'   => '0px',
			),
			'mobile'  => array(
				'padding-top'    => '8px',
				'padding-right'  => '0px',
				'padding-bottom' => '8px',
				'padding-left'   => '0px',
			),
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
				'element'     => '.has-sticky-header .site-header.sticky-header',
				'media_query' => array(
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				),
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
new \Kirki\Field\Dimensions(
	array(
		'settings'    => 'grid_line_the_width',
		'label'       => esc_html__( 'Grid Width', 'soda-theme' ),
		'description' => esc_html__( 'Width of the grid container.', 'soda-theme' ),
		'section'     => 'soda_theme_grid_line',
		'responsive'  => true,
		'default'     => array(
			'desktop' => array(
				'width' => '100%',
			),
			'tablet'  => array(
				'width' => '100%',
			),
			'mobile'  => array(
				'width' => '100%',
			),
		),
		'choices'     => array(
			'labels' => array(
				'width' => esc_html__( 'Width', 'soda-theme' ),
			),
		),
		'output'      => array(
			array(
				'element'     => 'body',
				'property'    => '--grid-line-width',
				'media_query' => array(
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				),
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
				'property' => '--grid-line-thickness',
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
			'min'  => -9999,
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
		'priority' => 60,
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
 * Mobile Menu Close Text
 */
new \Kirki\Field\Text(
	array(
		'settings'        => 'mobile_menu_close_text',
		'label'           => esc_html__( 'Menu Close Text', 'soda-theme' ),
		'description'     => esc_html__( 'Text to display when mobile menu is open.', 'soda-theme' ),
		'section'         => 'soda_theme_menu_settings',
		'default'         => 'CLOSE',
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
 * Mobile Menu Toggle Gap
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'mobile_menu_toggle_gap',
		'label'       => esc_html__( 'Toggle Gap (px)', 'soda-theme' ),
		'description' => esc_html__( 'Space between hamburger icon and text.', 'soda-theme' ),
		'section'     => 'soda_theme_menu_settings',
		'default'     => 10,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'transport' => 'postMessage',
		'output'    => array(
			array(
				'element'  => '.site-navigation-toggle-holder .site-navigation-toggle',
				'property' => 'gap',
				'suffix'   => 'px',
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

/**
 * ============================================================
 * Typography Settings
 * ============================================================
 */

/**
 * Typography Panel
 */
new \Kirki\Panel(
	'soda_theme_typography_panel',
	array(
		'priority'    => 31,
		'title'       => esc_html__( 'Typography', 'soda-theme' ),
		'description' => esc_html__( 'Customize typography settings. Custom fonts from Elementor and other plugins will appear here.', 'soda-theme' ),
	)
);

/**
 * Body Typography Section
 */
new \Kirki\Section(
	'soda_theme_body_typography',
	array(
		'title'       => esc_html__( 'Body Typography', 'soda-theme' ),
		'panel'       => 'soda_theme_typography_panel',
		'priority'    => 10,
		'description' => esc_html__( 'Typography settings for body text. Custom fonts from Elementor will appear in the font family dropdown.', 'soda-theme' ),
	)
);

/**
 * Body Typography
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'body_typography',
		'label'    => esc_html__( 'Body Typography', 'soda-theme' ),
		'section'  => 'soda_theme_body_typography',
		'priority' => 10,
		'default'  => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.6',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'500',
				'600',
				'700',
			),
		),
		'output'   => array(
			array(
				'element' => 'body',
			),
		),
	)
);

/**
 * Headings Typography Section
 */
new \Kirki\Section(
	'soda_theme_headings_typography',
	array(
		'title'       => esc_html__( 'Headings Typography', 'soda-theme' ),
		'panel'       => 'soda_theme_typography_panel',
		'priority'    => 20,
		'description' => esc_html__( 'Typography settings for headings (H1-H6). Custom fonts from Elementor will appear in the font family dropdown.', 'soda-theme' ),
	)
);

/**
 * Navigation Typography Section
 */
new \Kirki\Section(
	'soda_theme_navigation_typography',
	array(
		'title'       => esc_html__( 'Navigation Typography', 'soda-theme' ),
		'panel'       => 'soda_theme_header_panel',
		'priority'    => 50,
		'description' => esc_html__( 'Typography settings for menu and submenu items.', 'soda-theme' ),
	)
);

/**
 * Desktop Menu Header
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'desktop_menu_header',
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 5,
		'default'  => '<div style="padding: 10px 10px 11px; background: #00a0d2; border-left: 0; margin: 10px -5px; color: #fff; text-transform: uppercase; text-align: center; border-radius: 6px;"><strong>' . esc_html__( 'Desktop Menu', 'soda-theme' ) . '</strong></div>',
	)
);

/**
 * Menu Font
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'menu_typography',
		'label'    => esc_html__( 'Menu Font', 'soda-theme' ),
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 10,
		'transport'   => 'auto',
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => 'regular',
			'font-size'      => '1rem',
			'line-height'    => '1.6',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'400',
				'500',
				'600',
				'700',
			),
		),
		'output'   => array(
			array(
				'element' => '.main-navigation a, .site-navigation a',
			),
		),
	)
);

/**
 * Menu Font Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'menu_typography_divider',
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 15,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Submenu Font
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'submenu_typography',
		'label'    => esc_html__( 'Submenu Font', 'soda-theme' ),
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 20,
		'transport'   => 'auto',
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => 'regular',
			'font-size'      => '0.9rem',
			'line-height'    => '1.6',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'400',
				'500',
				'600',
				'700',
			),
		),
		'output'   => array(
			array(
				'element' => '.main-navigation .sub-menu a, .site-navigation .sub-menu a',
			),
		),
	)
);

/**
 * Submenu Font Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'submenu_typography_divider',
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 22,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Menu Toggle Header
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'mobile_toggle_header',
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 25,
		'default'  => '<div style="padding: 10px 10px 11px; background: #00a0d2; border-left: 0; margin: 10px -5px; color: #fff; text-transform: uppercase; text-align: center; border-radius: 6px;"><strong>' . esc_html__( 'Mobile Menu Toggle', 'soda-theme' ) . '</strong></div>',
	)
);

/**
 * Toggle Font
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'mobile_menu_text_typography',
		'label'    => esc_html__( 'Toggle Font', 'soda-theme' ),
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 30,
		'transport'   => 'auto',
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => 'regular',
			'font-size'      => '0.875rem',
			'line-height'    => '1',
			'letter-spacing' => '0',
			'text-transform' => 'uppercase',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'400',
				'500',
				'600',
				'700',
			),
		),
		'output'   => array(
			array(
				'element' => '.site-navigation-toggle .menu-text',
			),
		),
	)
);

/**
 * Toggle Font Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'toggle_typography_divider',
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 32,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * Mobile Menu Dropdown Header
 */
new \Kirki\Field\Custom(
	array(
		'settings' => 'mobile_dropdown_header',
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 35,
		'default'  => '<div style="padding: 10px 10px 11px; background: #00a0d2; border-left: 0; margin: 10px -5px; color: #fff; text-transform: uppercase; text-align: center; border-radius: 6px;"><strong>' . esc_html__( 'Mobile Menu Dropdown', 'soda-theme' ) . '</strong></div>',
	)
);

/**
 * Mobile Menu Font
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'mobile_dropdown_typography',
		'label'    => esc_html__( 'Mobile Menu Font', 'soda-theme' ),
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 40,
		'transport'   => 'auto',
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => '600',
			'font-size'      => '24px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'400',
				'500',
				'600',
				'700',
			),
		),
		'output'   => array(
			array(
				'element' => '.site-navigation-dropdown .mobile-nav-menu a',
			),
		),
	)
);

/**
 * Mobile Menu Font Divider
 */
new \Kirki\Pro\Field\Divider(
	array(
		'settings' => 'mobile_menu_typography_divider',
		'section'  => 'soda_theme_navigation_typography',
		'priority' => 42,
		'choices'  => array(
			'color' => '#dcdcdc',
		),
	)
);

/**
 * H1 Typography
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'h1_typography',
		'label'    => esc_html__( 'H1 Typography', 'soda-theme' ),
		'section'  => 'soda_theme_headings_typography',
		'priority' => 10,
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => '700',
			'font-size'      => '2.5rem',
			'line-height'    => '1.2',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'500',
				'600',
				'700',
				'800',
				'900',
			),
		),
		'output'   => array(
			array(
				'element' => 'h1',
			),
		),
	)
);

/**
 * H2 Typography
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'h2_typography',
		'label'    => esc_html__( 'H2 Typography', 'soda-theme' ),
		'section'  => 'soda_theme_headings_typography',
		'priority' => 20,
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => '700',
			'font-size'      => '2rem',
			'line-height'    => '1.3',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'500',
				'600',
				'700',
				'800',
				'900',
			),
		),
		'output'   => array(
			array(
				'element' => 'h2',
			),
		),
	)
);

/**
 * H3 Typography
 */
new \Kirki\Field\Typography(
	array(
		'settings' => 'h3_typography',
		'label'    => esc_html__( 'H3 Typography', 'soda-theme' ),
		'section'  => 'soda_theme_headings_typography',
		'priority' => 30,
		'default'  => array(
			'font-family'    => 'inherit',
			'variant'        => '700',
			'font-size'      => '1.75rem',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'choices'  => array(
			'fonts' => soda_theme_get_custom_fonts_for_kirki(),
			'variant' => array(
				'300',
				'regular',
				'500',
				'600',
				'700',
				'800',
				'900',
			),
		),
		'output'   => array(
			array(
				'element' => 'h3',
			),
		),
	)
);
