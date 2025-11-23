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
	$line_color      = get_theme_mod( 'grid_line_line_color', '#eeeeee' );
	$column_color    = get_theme_mod( 'grid_line_column_color', 'transparent' );
	$columns         = get_theme_mod( 'grid_line_columns', 12 );
	$outline         = get_theme_mod( 'grid_line_outline', false );
	$max_width       = get_theme_mod( 'grid_line_max_width', '100%' );
	$the_width       = get_theme_mod( 'grid_line_the_width', '100%' );
	$line_width      = get_theme_mod( 'grid_line_line_width', '1px' );
	$direction       = get_theme_mod( 'grid_line_direction', 90 );
	$z_index         = get_theme_mod( 'grid_line_z_index', 0 );
	$right_display   = get_theme_mod( 'grid_line_right_display', 'none' );

	// Build outline styles
	$outline_style = '';
	if ( $outline ) {
		$outline_style = 'outline: ' . $line_width . ' solid ' . $line_color . ';';
	}

	// Build right side styles
	$right_side_style = '';
	if ( $right_display === 'background' ) {
		$right_side_style = 'body::after {
			content: "";
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			margin-right: auto;
			margin-left: auto;
			pointer-events: none;
			z-index: var(--grid-line-z-index, 0);
			min-height: 100vh;
			width: calc(var(--grid-line-the-width) - (2 * 0px));
			max-width: var(--grid-line-max-width, 100%);
			background-size: calc(100% + var(--grid-line-width, 1px)) 100%;
			background-image: repeating-linear-gradient(var(--grid-line-direction, 90deg), var(--grid-line-column-color, transparent), var(--grid-line-column-color, transparent) calc((100% / var(--grid-line-columns, 12)) - var(--grid-line-width, 1px)), var(--grid-line-color, #eee) calc((100% / var(--grid-line-columns, 12)) - var(--grid-line-width, 1px)), var(--grid-line-color, #eee) calc(100% / var(--grid-line-columns, 12)));
		}';
	} elseif ( $right_display === 'outline' ) {
		$right_side_style = 'body::after {
			content: "";
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			margin-right: auto;
			margin-left: auto;
			pointer-events: none;
			z-index: var(--grid-line-z-index, 0);
			min-height: 100vh;
			width: calc(var(--grid-line-the-width) - (2 * 0px));
			max-width: var(--grid-line-max-width, 100%);
			background-size: calc(100% + var(--grid-line-width, 1px)) 100%;
			background-image: repeating-linear-gradient(var(--grid-line-direction, 90deg), var(--grid-line-column-color, transparent), var(--grid-line-column-color, transparent) calc((100% / var(--grid-line-columns, 12)) - var(--grid-line-width, 1px)), var(--grid-line-color, #eee) calc((100% / var(--grid-line-columns, 12)) - var(--grid-line-width, 1px)), var(--grid-line-color, #eee) calc(100% / var(--grid-line-columns, 12)));
			outline: var(--grid-line-width, 1px) solid var(--grid-line-color, #eee);
		}';
	}

	?>
	<style type="text/css">
		:root {
			--grid-line-color: <?php echo esc_attr( $line_color ); ?>;
			--grid-line-column-color: <?php echo esc_attr( $column_color ); ?>;
			--grid-line-columns: <?php echo (int) $columns; ?>;
			--grid-line-max-width: <?php echo esc_attr( $max_width ); ?>;
			--grid-line-the-width: <?php echo esc_attr( $the_width ); ?>;
			--grid-line-width: <?php echo esc_attr( $line_width ); ?>;
			--grid-line-direction: <?php echo (int) $direction; ?>deg;
			--grid-line-z-index: <?php echo (int) $z_index; ?>;
		}
		body::before {
			content: "";
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			margin-right: auto;
			margin-left: auto;
			pointer-events: none;
			z-index: var(--grid-line-z-index, 0);
			min-height: 100vh;
			width: calc(var(--grid-line-the-width) - (2 * 0px));
			max-width: var(--grid-line-max-width, 100%);
			background-size: calc(100% + var(--grid-line-width, 1px)) 100%;
			background-image: repeating-linear-gradient(var(--grid-line-direction, 90deg), var(--grid-line-column-color, transparent), var(--grid-line-column-color, transparent) calc((100% / var(--grid-line-columns, 12)) - var(--grid-line-width, 1px)), var(--grid-line-color, #eee) calc((100% / var(--grid-line-columns, 12)) - var(--grid-line-width, 1px)), var(--grid-line-color, #eee) calc(100% / var(--grid-line-columns, 12)));
			<?php echo $outline_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		}
		<?php echo $right_side_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</style>
	<?php
}
add_action( 'wp_head', 'soda_theme_grid_line_styles' );

/**
 * Output Menu Typography CSS with Elementor global typography variables
 */
function soda_theme_menu_typography_styles() {
	$menu_font_family    = get_theme_mod( 'menu_typography_family', 'inherit' );
	$submenu_font_family = get_theme_mod( 'menu_submenu_typography_family', 'inherit' );

	$menu_font_var    = '';
	$submenu_font_var = '';

	// Map selection to Elementor CSS variable
	switch ( $menu_font_family ) {
		case 'primary':
			$menu_font_var = 'var(--e-global-typography-primary-font-family)';
			break;
		case 'secondary':
			$menu_font_var = 'var(--e-global-typography-secondary-font-family)';
			break;
		case 'text':
			$menu_font_var = 'var(--e-global-typography-text-font-family)';
			break;
		case 'accent':
			$menu_font_var = 'var(--e-global-typography-accent-font-family)';
			break;
		default:
			$menu_font_var = 'inherit';
			break;
	}

	switch ( $submenu_font_family ) {
		case 'primary':
			$submenu_font_var = 'var(--e-global-typography-primary-font-family)';
			break;
		case 'secondary':
			$submenu_font_var = 'var(--e-global-typography-secondary-font-family)';
			break;
		case 'text':
			$submenu_font_var = 'var(--e-global-typography-text-font-family)';
			break;
		case 'accent':
			$submenu_font_var = 'var(--e-global-typography-accent-font-family)';
			break;
		default:
			$submenu_font_var = 'inherit';
			break;
	}

	if ( $menu_font_family !== 'inherit' || $submenu_font_family !== 'inherit' ) {
		?>
		<style type="text/css">
			<?php if ( $menu_font_family !== 'inherit' ) : ?>
			.main-navigation a {
				font-family: <?php echo $menu_font_var; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			}
			<?php endif; ?>
			<?php if ( $submenu_font_family !== 'inherit' ) : ?>
			.main-navigation .sub-menu a {
				font-family: <?php echo $submenu_font_var; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>;
			}
			<?php endif; ?>
		</style>
		<?php
	}
}
add_action( 'wp_head', 'soda_theme_menu_typography_styles' );
