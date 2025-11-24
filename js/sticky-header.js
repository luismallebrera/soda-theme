/**
 * Sticky Header functionality
 */
(function($) {
	'use strict';

	$(document).ready(function() {
		var $body = $('body');
		var $header = $('.site-header');
		var $logo = $('.custom-logo');
		var $stickyLogoData = $('.sticky-logo-data');
		var scrollThreshold = (typeof sodaThemeSettings !== 'undefined') ? sodaThemeSettings.scrollThreshold : 100;
		var originalLogoSrc = $logo.attr('src');
		var stickyLogoSrc = $stickyLogoData.data('sticky-logo');
		var hasStickyHeader = $body.hasClass('has-sticky-header');
		var hasFixedHeader = $body.hasClass('has-fixed-header');
		var isLayout3 = $header.hasClass('header-layout-3');
		var $mainNav = $('#site-navigation');
		var $toggleHolder = $('.site-navigation-toggle-holder');
		
		// Only proceed if sticky or fixed header is enabled
		if (!hasStickyHeader && !hasFixedHeader && !isLayout3) {
			return;
		}

		// For sticky header, add sticky-header class immediately (header is always fixed)
		if (hasStickyHeader) {
			$header.addClass('sticky-header');
		}

		$(window).on('scroll', function() {
			var scrollTop = $(window).scrollTop();

			if (scrollTop > scrollThreshold) {
				$body.addClass('scroll');
				$header.addClass('scroll');
				
				// Layout 3 specific behavior: swap main-navigation with toggle
				if (isLayout3) {
					$mainNav.hide();
					$toggleHolder.show();
				}
				
				// Swap logo after scroll threshold if sticky header is enabled
				if (hasStickyHeader) {
					// Swap to sticky logo if available
					if (stickyLogoSrc && $logo.length) {
						$logo.attr('src', stickyLogoSrc);
					}
				}
			} else {
				$body.removeClass('scroll');
				$header.removeClass('scroll');
				
				// Layout 3 specific behavior: restore main-navigation, hide toggle
				if (isLayout3) {
					$mainNav.show();
					$toggleHolder.hide();
				}
				
				// Restore logo when scrolled back up (sticky-header class remains)
				if (hasStickyHeader) {
					// Restore original logo
					if (originalLogoSrc && $logo.length) {
						$logo.attr('src', originalLogoSrc);
					}
				}
			}
		});
	});

})(jQuery);
