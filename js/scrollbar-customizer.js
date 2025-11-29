/**
 * Scrollbar Customizer Live Preview
 */
(function( $ ) {
	'use strict';

	// Width
	wp.customize( 'wp_scrollbar_width', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--wp-scrollbar-width', newval + 'px' );
		});
	});

	// Track color
	wp.customize( 'wp_scrollbar_track_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--wp-scrollbar-track', newval );
		});
	});

	// Thumb color
	wp.customize( 'wp_scrollbar_thumb_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--wp-scrollbar-thumb', newval );
		});
	});

	// Thumb hover/scrolling color
	wp.customize( 'wp_scrollbar_thumb_hover_color', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--wp-scrollbar-thumb-hover', newval );
		});
	});

})( jQuery );
