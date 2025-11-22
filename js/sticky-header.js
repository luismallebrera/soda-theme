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
		var scrollThreshold = $body.data('scroll-threshold') || 100;
		var originalLogoSrc = $logo.attr('src');
		var stickyLogoSrc = $stickyLogoData.data('sticky-logo');

		$(window).on('scroll', function() {
			var scrollTop = $(window).scrollTop();

			if (scrollTop > scrollThreshold) {
				$header.addClass('sticky-header');
				$body.addClass('scrolled');
				$header.addClass('scrolled');
				
				// Swap to sticky logo if available
				if (stickyLogoSrc && $logo.length) {
					$logo.attr('src', stickyLogoSrc);
				}
			} else {
				$header.removeClass('sticky-header');
				$body.removeClass('scrolled');
				$header.removeClass('scrolled');
				
				// Restore original logo
				if (originalLogoSrc && $logo.length) {
					$logo.attr('src', originalLogoSrc);
				}
			}
		});
	});

})(jQuery);
