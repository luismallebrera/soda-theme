/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = document.querySelector( '.site-navigation-toggle' );

	// Return early if the button doesn't exist.
	if ( ! button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Mobile dropdown navigation
	const mobileDropdown = document.querySelector( '.site-navigation-dropdown' );

	// Toggle the mobile dropdown menu
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
			if ( mobileDropdown ) {
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
			}
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
			if ( mobileDropdown ) {
				mobileDropdown.setAttribute( 'aria-hidden', 'false' );
				document.body.style.overflow = 'hidden';
			}
		}
	} );

	// Close mobile dropdown when clicking on background
	if ( mobileDropdown ) {
		const background = mobileDropdown.querySelector( '.site-navigation-background' );
		if ( background ) {
			background.addEventListener( 'click', function() {
				siteNavigation.classList.remove( 'toggled' );
				button.setAttribute( 'aria-expanded', 'false' );
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
			} );
		}

		// Close mobile dropdown when clicking on a menu link
		const mobileLinks = mobileDropdown.querySelectorAll( 'a' );
		for ( const link of mobileLinks ) {
			link.addEventListener( 'click', function() {
				siteNavigation.classList.remove( 'toggled' );
				button.setAttribute( 'aria-expanded', 'false' );
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
			} );
		}
	}

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );
		const isClickOnDropdown = mobileDropdown && mobileDropdown.contains( event.target );
		const isClickOnToggle = button.contains( event.target );

		if ( ! isClickInside && ! isClickOnDropdown && ! isClickOnToggle ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
			if ( mobileDropdown ) {
				mobileDropdown.setAttribute( 'aria-hidden', 'true' );
				document.body.style.overflow = '';
			}
		}
	} );

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
