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

	// Header Padding Left
	wp.customize( 'header_padding_left', function( value ) {
		value.bind( function( to ) {
			var unit = wp.customize( 'header_padding_left_unit' )();
			$( '.site-header .header-container' ).css( 'padding-left', to + unit );
		} );
	} );

	// Header Padding Left Unit
	wp.customize( 'header_padding_left_unit', function( value ) {
		value.bind( function( to ) {
			var val = wp.customize( 'header_padding_left' )();
			$( '.site-header .header-container' ).css( 'padding-left', val + to );
		} );
	} );

	// Header Padding Right
	wp.customize( 'header_padding_right', function( value ) {
		value.bind( function( to ) {
			var unit = wp.customize( 'header_padding_right_unit' )();
			$( '.site-header .header-container' ).css( 'padding-right', to + unit );
		} );
	} );

	// Header Padding Right Unit
	wp.customize( 'header_padding_right_unit', function( value ) {
		value.bind( function( to ) {
			var val = wp.customize( 'header_padding_right' )();
			$( '.site-header .header-container' ).css( 'padding-right', val + to );
		} );
	} );

	// Header Container Max Width
	wp.customize( 'header_container_max_width', function( value ) {
		value.bind( function( to ) {
			$( '.site-header .header-container' ).css( 'max-width', to + 'px' );
		} );
	} );

	// Header Height
	wp.customize( 'header_height', function( value ) {
		value.bind( function( to ) {
			if ( to > 0 ) {
				$( '.site-header .header-container' ).css( {
					'min-height': to + 'px',
					'display': 'flex',
					'align-items': 'center'
				} );
			} else {
				$( '.site-header .header-container' ).css( {
					'min-height': '',
					'display': '',
					'align-items': ''
				} );
			}
		} );
	} );

	// Sticky Header Height
	wp.customize( 'sticky_header_height', function( value ) {
		value.bind( function( to ) {
			var style = '';
			if ( to > 0 ) {
				style = '<style id="sticky-height-preview">.has-sticky-header .site-header.sticky-header .header-container { min-height: ' + to + 'px; }</style>';
			}
			$( '#sticky-height-preview' ).remove();
			if ( style ) {
				$( 'head' ).append( style );
			}
		} );
	} );
}( jQuery ) );
