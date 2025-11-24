/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const button = document.querySelector( '.site-navigation-toggle' );

	// Return early if the button doesn't exist.
	if ( ! button ) {
		return;
	}

	const siteNavigation = document.getElementById( 'site-navigation' );
	
	// Check if we have a main navigation menu (for layout-1, layout-3, layout-4)
	if ( siteNavigation ) {
		const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

		// Hide menu toggle button if menu is empty and return early.
		if ( 'undefined' === typeof menu ) {
			button.style.display = 'none';
			return;
		}

		if ( ! menu.classList.contains( 'nav-menu' ) ) {
			menu.classList.add( 'nav-menu' );
		}
	}

	// Mobile dropdown navigation
	const mobileDropdown = document.querySelector( '.site-navigation-dropdown' );
	const hamburger = document.getElementById( 'hamburger-1' );

	// Toggle function
	function toggleMobileMenu() {
		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
			button.classList.remove( 'toggled' );
			if ( hamburger ) {
				hamburger.classList.remove( 'is-active' );
			}
			if ( mobileDropdown ) {
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
			}
			// Resume Lenis smooth scrolling
			if ( window.lenis ) {
				window.lenis.start();
			}
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
			button.classList.add( 'toggled' );
			if ( hamburger ) {
				hamburger.classList.add( 'is-active' );
			}
			if ( mobileDropdown ) {
				mobileDropdown.setAttribute( 'aria-hidden', 'false' );
				document.body.style.overflow = 'hidden';
			}
			// Stop Lenis smooth scrolling when dropdown is open
			if ( window.lenis ) {
				window.lenis.stop();
			}
		}
	}

	// Toggle on click
	button.addEventListener( 'click', toggleMobileMenu );

	// Toggle on Enter or Space key
	button.addEventListener( 'keydown', function( event ) {
		if ( event.key === 'Enter' || event.key === ' ' ) {
			event.preventDefault();
			toggleMobileMenu();
		}
	} );

	// Close mobile dropdown when clicking on background
	if ( mobileDropdown ) {
		const background = mobileDropdown.querySelector( '.site-navigation-background' );
		if ( background ) {
			background.addEventListener( 'click', function() {
				button.setAttribute( 'aria-expanded', 'false' );
				if ( hamburger ) {
					hamburger.classList.remove( 'is-active' );
				}
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
				// Resume Lenis smooth scrolling
				if ( window.lenis ) {
					window.lenis.start();
				}
			} );
		}

		// Close mobile dropdown when clicking on a menu link
		const mobileLinks = mobileDropdown.querySelectorAll( 'a' );
		for ( const link of mobileLinks ) {
			link.addEventListener( 'click', function() {
				button.setAttribute( 'aria-expanded', 'false' );
				if ( hamburger ) {
					hamburger.classList.remove( 'is-active' );
				}
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
				// Resume Lenis smooth scrolling
				if ( window.lenis ) {
					window.lenis.start();
				}
			} );
		}
	}

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickOnDropdown = mobileDropdown && mobileDropdown.contains( event.target );
		const isClickOnToggle = button.contains( event.target );

		if ( ! isClickOnDropdown && ! isClickOnToggle ) {
			button.setAttribute( 'aria-expanded', 'false' );
			if ( hamburger ) {
				hamburger.classList.remove( 'is-active' );
			}
			if ( mobileDropdown ) {
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
			}
		}
	} );

	// Only run keyboard navigation if we have a site navigation menu
	if ( siteNavigation ) {
		const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];
		
		if ( menu ) {
			// Get all the link elements within the menu.
			const links = menu.getElementsByTagName( 'a' );

			// Get all the link elements with children within the menu.
			const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

			// Toggle focus each time a menu link is focused or blurred.
			for ( const link of links ) {
				link.addEventListener( 'focus', toggleFocus, true );
				link.addEventListener( 'blur', toggleFocus, true );
			}

			// Toggle focus each time a menu link with children receive a touch event.
			for ( const link of linksWithChildren ) {
				link.addEventListener( 'touchstart', toggleFocus, false );
			}
		}
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );
