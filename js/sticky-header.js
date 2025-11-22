/**
 * Sticky Header functionality
 */
(function($) {
	'use strict';

	$(document).ready(function() {
		// Check if sticky header is enabled
		if (!$('body').hasClass('has-sticky-header')) {
			return;
		}

		var $header = $('.site-header');
		var $body = $('body');
		var $logo = $('.custom-logo');
		var $logoLink = $('.custom-logo-link');
		var $stickyLogoData = $('.sticky-logo-data');
		var headerOffset = $header.offset().top;
		var scrollThreshold = 100;
		var originalLogoSrc = $logo.attr('src');
		var stickyLogoSrc = $stickyLogoData.data('sticky-logo');

		$(window).on('scroll', function() {
			var scrollTop = $(window).scrollTop();

			if (scrollTop > scrollThreshold) {
				$header.addClass('sticky-header scroll');
				$body.addClass('scroll');
				
				// Swap to sticky logo if available
				if (stickyLogoSrc && $logo.length) {
					$logo.attr('src', stickyLogoSrc);
				}
			} else {
				$header.removeClass('sticky-header scroll');
				$body.removeClass('scroll');
				
				// Restore original logo
				if (originalLogoSrc && $logo.length) {
					$logo.attr('src', originalLogoSrc);
				}
			}
		});
	});

})(jQuery);
