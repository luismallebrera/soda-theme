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
		
		// Only proceed if sticky or fixed header is enabled
		if (!hasStickyHeader && !hasFixedHeader) {
			return;
		}

		$(window).on('scroll', function() {
			var scrollTop = $(window).scrollTop();

			if (scrollTop > scrollThreshold) {
				$body.addClass('scroll');
				$header.addClass('scroll');
				
				// Add sticky-header class and swap logo only if sticky header is enabled
				if (hasStickyHeader) {
					$header.addClass('sticky-header');
					
					// Swap to sticky logo if available
					if (stickyLogoSrc && $logo.length) {
						$logo.attr('src', stickyLogoSrc);
					}
				}
			} else {
				$body.removeClass('scroll');
				$header.removeClass('scroll');
				
				// Remove sticky-header class and restore logo only if sticky header is enabled
				if (hasStickyHeader) {
					$header.removeClass('sticky-header');
					
					// Restore original logo
					if (originalLogoSrc && $logo.length) {
						$logo.attr('src', originalLogoSrc);
					}
				}
			}
		});
	});

})(jQuery);
