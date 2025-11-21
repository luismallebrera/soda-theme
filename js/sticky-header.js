/**
 * Sticky Header functionality
 */
(function($) {
	'use strict';

	$(document).ready(function() {
		var $header = $('.site-header');
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
				$header.addClass('sticky-header');
				
				// Swap to sticky logo if available
				if (stickyLogoSrc && $logo.length) {
					$logo.attr('src', stickyLogoSrc);
				}
			} else {
				$header.removeClass('sticky-header');
				
				// Restore original logo
				if (originalLogoSrc && $logo.length) {
					$logo.attr('src', originalLogoSrc);
				}
			}
		});
	});

})(jQuery);
