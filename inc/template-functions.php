<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package soda-theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function soda_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Add header behavior classes
	if ( get_theme_mod( 'enable_sticky_header', true ) ) {
		$classes[] = 'has-sticky-header';
	}

	if ( get_theme_mod( 'enable_fixed_header', false ) ) {
		$classes[] = 'has-fixed-header';
	}

	if ( get_theme_mod( 'enable_transparent_header', false ) ) {
		$classes[] = 'has-transparent-header';
	}

	return $classes;
}
add_filter( 'body_class', 'soda_theme_body_classes' );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function soda_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'soda_theme_pingback_header' );

/**
 * Remove admin bar margin when fixed header is enabled.
 */
function soda_theme_remove_admin_bar_margin() {
	if ( get_theme_mod( 'enable_fixed_header', false ) ) {
		echo '<style>html { margin-top: 0 !important; }</style>';
	}
}
add_action( 'wp_head', 'soda_theme_remove_admin_bar_margin', 99 );

/**
 * Display custom logo with sticky logo support.
 */
function soda_theme_custom_logo() {
	$sticky_logo_id = get_theme_mod( 'sticky_logo' );
	
	if ( has_custom_logo() ) {
		the_custom_logo();
	}
	
	// Add sticky logo data attribute for JavaScript
	if ( $sticky_logo_id ) {
		$sticky_logo_url = wp_get_attachment_image_url( $sticky_logo_id, 'full' );
		if ( $sticky_logo_url ) {
			echo '<span class="sticky-logo-data" data-sticky-logo="' . esc_url( $sticky_logo_url ) . '" style="display:none;"></span>';
		}
	}
}

/**
 * Output Grid Line CSS when enabled
 */
function soda_theme_grid_line_styles() {
	$grid_line_enable = get_theme_mod( 'grid_line_enable', false );
	
	if ( ! $grid_line_enable ) {
		return;
	}

	// Get all grid line settings
	$line_color     = get_theme_mod( 'grid_line_line_color', '#eeeeee' );
	$column_color   = get_theme_mod( 'grid_line_column_color', 'transparent' );
	$columns        = get_theme_mod( 'grid_line_columns', 12 );
	$outline        = get_theme_mod( 'grid_line_outline', false );
	$max_width      = get_theme_mod( 'grid_line_max_width', '100%' );
	$the_width      = get_theme_mod( 'grid_line_the_width', '100%' );
	$line_width     = get_theme_mod( 'grid_line_line_width', '1px' );
	$direction      = get_theme_mod( 'grid_line_direction', 90 );
	$z_index        = get_theme_mod( 'grid_line_z_index', 0 );

	// Build the gradient
	$gradient_parts = array();
	for ( $i = 0; $i < $columns; $i++ ) {
		$gradient_parts[] = $column_color . ' 0%';
		$gradient_parts[] = $column_color . ' calc(100% - ' . $line_width . ')';
		$gradient_parts[] = $line_color . ' calc(100% - ' . $line_width . ')';
		$gradient_parts[] = $line_color . ' 100%';
	}
	$gradient = 'repeating-linear-gradient(' . $direction . 'deg, ' . implode( ', ', $gradient_parts ) . ')';

	// Build outline styles
	$outline_style = '';
	if ( $outline ) {
		$outline_style = 'outline: ' . $line_width . ' solid ' . $line_color . ';';
	}

	?>
	<style type="text/css">
		body::before {
			content: '';
			position: fixed;
			inset: 0;
			width: <?php echo esc_attr( $the_width ); ?>;
			max-width: <?php echo esc_attr( $max_width ); ?>;
			margin: 0 auto;
			background: <?php echo $gradient; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			background-size: calc(100% / <?php echo (int) $columns; ?>) 100%;
			pointer-events: none;
			z-index: <?php echo (int) $z_index; ?>;
			<?php echo $outline_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		}
	</style>
	<?php
}
add_action( 'wp_head', 'soda_theme_grid_line_styles' );
