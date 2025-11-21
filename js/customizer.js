/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	// Regular Logo Width
	wp.customize( 'regular_logo_width', function( value ) {
		value.bind( function( to ) {
			$( '.custom-logo' ).css( {
				'max-width': to + 'px'
			} );
		} );
	} );

	// Sticky Logo Width
	wp.customize( 'sticky_logo_width', function( value ) {
		value.bind( function( to ) {
			var style = '<style id="sticky-logo-width-preview">.site-header.sticky-header .custom-logo { max-width: ' + to + 'px; }</style>';
			$( '#sticky-logo-width-preview' ).remove();
			$( 'head' ).append( style );
		} );
	} );

	// Header Padding Top
	wp.customize( 'header_padding_top', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( 'padding-top', to + 'px' );
		} );
	} );

	// Header Padding Bottom
	wp.customize( 'header_padding_bottom', function( value ) {
		value.bind( function( to ) {
			$( '.site-header' ).css( 'padding-bottom', to + 'px' );
		} );
	} );

	// Sticky Header Padding Top
	wp.customize( 'sticky_header_padding_top', function( value ) {
		value.bind( function( to ) {
			var style = '<style id="sticky-padding-top-preview">.has-sticky-header .site-header.sticky-header { padding-top: ' + to + 'px; }</style>';
			$( '#sticky-padding-top-preview' ).remove();
			$( 'head' ).append( style );
		} );
	} );

	// Sticky Header Padding Bottom
	wp.customize( 'sticky_header_padding_bottom', function( value ) {
		value.bind( function( to ) {
			var style = '<style id="sticky-padding-bottom-preview">.has-sticky-header .site-header.sticky-header { padding-bottom: ' + to + 'px; }</style>';
			$( '#sticky-padding-bottom-preview' ).remove();
			$( 'head' ).append( style );
		} );
	} );
}( jQuery ) );
