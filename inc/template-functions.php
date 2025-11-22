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
