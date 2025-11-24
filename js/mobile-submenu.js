/**
 * Mobile Submenu Toggle
 *
 * Handles collapsible submenus in the mobile dropdown navigation
 */
(function() {
	'use strict';

	function initMobileSubmenus() {
		const dropdownMenu = document.querySelector('.site-navigation-dropdown .mobile-nav-menu');
		
		if (!dropdownMenu) {
			return;
		}

		// Find all menu items with children
		const menuItems = dropdownMenu.querySelectorAll('.menu-item-has-children');
		
		menuItems.forEach(function(item) {
			const link = item.querySelector('> a');
			
			if (!link) {
				return;
			}

			// Create toggle button
			const toggle = document.createElement('span');
			toggle.className = 'submenu-toggle';
			toggle.setAttribute('aria-expanded', 'false');
			toggle.setAttribute('role', 'button');
			toggle.setAttribute('tabindex', '0');
			
			// Add toggle after the link text
			link.appendChild(toggle);
			
			// Toggle submenu on click
			toggle.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				toggleSubmenu(item, toggle);
			});
			
			// Toggle submenu on Enter/Space key
			toggle.addEventListener('keydown', function(e) {
				if (e.key === 'Enter' || e.key === ' ') {
					e.preventDefault();
					toggleSubmenu(item, toggle);
				}
			});
		});
	}

	function toggleSubmenu(item, toggle) {
		const isOpen = item.classList.contains('submenu-open');
		
		if (isOpen) {
			item.classList.remove('submenu-open');
			toggle.setAttribute('aria-expanded', 'false');
		} else {
			item.classList.add('submenu-open');
			toggle.setAttribute('aria-expanded', 'true');
		}
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initMobileSubmenus);
	} else {
		initMobileSubmenus();
	}
})();
