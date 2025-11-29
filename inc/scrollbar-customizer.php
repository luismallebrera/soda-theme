<?php
/**
 * Scrollbar Customizer integration using Kirki
 *
 * @package soda-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * Add Scrollbar Section
 */
new \Kirki\Section(
	'soda_theme_scrollbar',
	array(
		'title'    => esc_html__( 'Scrollbar', 'soda-theme' ),
		'priority' => 160,
	)
);

/**
 * Scrollbar Width
 */
new \Kirki\Field\Slider(
	array(
		'settings'    => 'wp_scrollbar_width',
		'label'       => esc_html__( 'Scrollbar Width (px)', 'soda-theme' ),
		'section'     => 'soda_theme_scrollbar',
		'default'     => 4,
		'choices'     => array(
			'min'  => 1,
			'max'  => 64,
			'step' => 1,
		),
		'transport'   => 'postMessage',
	)
);

/**
 * Scrollbar Track Color
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'wp_scrollbar_track_color',
		'label'       => esc_html__( 'Scrollbar Track Color', 'soda-theme' ),
		'section'     => 'soda_theme_scrollbar',
		'default'     => '#dddddd',
		'transport'   => 'postMessage',
	)
);

/**
 * Scrollbar Thumb Color
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'wp_scrollbar_thumb_color',
		'label'       => esc_html__( 'Scrollbar Thumb Color', 'soda-theme' ),
		'section'     => 'soda_theme_scrollbar',
		'default'     => '#ff0000',
		'transport'   => 'postMessage',
	)
);

/**
 * Scrollbar Thumb Hover Color (html.scrolling)
 */
new \Kirki\Field\Color(
	array(
		'settings'    => 'wp_scrollbar_thumb_hover_color',
		'label'       => esc_html__( 'Scrollbar Thumb (html.scrolling) Color', 'soda-theme' ),
		'description' => esc_html__( 'Color when html has scrolling class.', 'soda-theme' ),
		'section'     => 'soda_theme_scrollbar',
		'default'     => '#ffffff',
		'transport'   => 'postMessage',
	)
);

/**
 * Output Scrollbar CSS
 */
function soda_theme_scrollbar_styles() {
	$width = get_theme_mod( 'wp_scrollbar_width', 4 );
	$track = get_theme_mod( 'wp_scrollbar_track_color', '#dddddd' );
	$thumb = get_theme_mod( 'wp_scrollbar_thumb_color', '#ff0000' );
	$hover = get_theme_mod( 'wp_scrollbar_thumb_hover_color', '#ffffff' );

	// Ensure width is an int
	$width = (int) $width;
	if ( $width < 1 ) {
		$width = 1;
	}

	$width_px = $width . 'px';

	?>
	<style id="wp-scrollbar-customizer-styles">
	:root {
		--wp-scrollbar-width: <?php echo esc_html( $width_px ); ?>;
		--wp-scrollbar-track: <?php echo esc_attr( $track ); ?>;
		--wp-scrollbar-thumb: <?php echo esc_attr( $thumb ); ?>;
		--wp-scrollbar-thumb-hover: <?php echo esc_attr( $hover ); ?>;
	}
	
	/* WebKit scrollbars */
	::-webkit-scrollbar {
		width: var(--wp-scrollbar-width);
		background: var(--wp-scrollbar-track);
	}

	body.scrollbar::-webkit-scrollbar {
		width: var(--wp-scrollbar-width);
		background: var(--wp-scrollbar-track);
		display: block;
	}

	::-webkit-scrollbar-track {
		background: var(--wp-scrollbar-track);
	}

	::-webkit-scrollbar-thumb {
		background: var(--wp-scrollbar-thumb);
		width: var(--wp-scrollbar-width);
	}

	html.scrolling ::-webkit-scrollbar {
		width: var(--wp-scrollbar-width);
	}

	html.scrolling ::-webkit-scrollbar-thumb {
		background: var(--wp-scrollbar-thumb-hover);
		width: var(--wp-scrollbar-width);
	}
	</style>
	<?php
}
add_action( 'wp_head', 'soda_theme_scrollbar_styles' );
