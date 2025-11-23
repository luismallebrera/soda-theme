<?php
/**
 * Redux Compatibility Layer - Maps get_theme_mod() to Redux options
 *
 * @package soda-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Override get_theme_mod to use Redux options
 *
 * @param string $name    Theme modification name.
 * @param mixed  $default Default value.
 * @return mixed
 */
function soda_theme_get_mod( $name, $default = false ) {
	global $soda_theme_options;
	
	// If Redux options exist, use them
	if ( ! empty( $soda_theme_options ) && isset( $soda_theme_options[ $name ] ) ) {
		return $soda_theme_options[ $name ];
	}
	
	// Fallback to get_theme_mod for non-Redux options
	return get_theme_mod( $name, $default );
}

/**
 * Wrapper function for backward compatibility
 */
if ( ! function_exists( 'soda_theme_option' ) ) {
	function soda_theme_option( $key, $default = '' ) {
		return soda_theme_get_mod( $key, $default );
	}
}
