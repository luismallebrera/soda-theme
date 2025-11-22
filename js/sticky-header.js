/**
 * Sticky Header functionality
 */
(function($) {
	'use strict';

	$(document).ready(function() {
		var $body = $('body');
		
		// Check if sticky header is enabled
		if (!$body.hasClass('has-sticky-header')) {
			return;
		}

		var $header = $('.site-header');
		var $logo = $('.custom-logo');
		var $stickyLogoData = $('.sticky-logo-data');
		var scrollThreshold = (typeof sodaThemeSettings !== 'undefined') ? sodaThemeSettings.scrollThreshold : 100;
		var originalLogoSrc = $logo.attr('src');
		var stickyLogoSrc = $stickyLogoData.data('sticky-logo');

		$(window).on('scroll', function() {
			var scrollTop = $(window).scrollTop();

			if (scrollTop > scrollThreshold) {
				$body.addClass('scroll');
				$header.addClass('sticky-header scroll');
				
				// Swap to sticky logo if available
				if (stickyLogoSrc && $logo.length) {
					$logo.attr('src', stickyLogoSrc);
				}
			} else {
				$body.removeClass('scroll');
				$header.removeClass('sticky-header scroll');
				
				// Restore original logo
				if (originalLogoSrc && $logo.length) {
					$logo.attr('src', originalLogoSrc);
				}
			}
		});
	});

})(jQuery);
