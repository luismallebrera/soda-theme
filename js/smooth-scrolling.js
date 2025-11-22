/**
 * Smooth Scrolling using Lenis
 */
(function() {
	'use strict';

	// Wait for DOM to be ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initLenis);
	} else {
		initLenis();
	}

	function initLenis() {
		// Get settings from localized script
		const settings = window.sodaSmoothScrollingParams || {
			smoothWheel: 1,
			anchorOffset: 0,
			lerp: 0.1,
			duration: 1.2,
			anchorLinks: false,
			gsapSync: false
		};

		// Initialize Lenis
		const lenis = new Lenis({
			duration: settings.lerp > 0 ? undefined : settings.duration,
			lerp: settings.lerp > 0 ? settings.lerp : undefined,
			smoothWheel: settings.smoothWheel === 1,
			smoothTouch: false,
			wheelMultiplier: 1,
		});

		// Animation frame
		function raf(time) {
			lenis.raf(time);
			requestAnimationFrame(raf);
		}

		requestAnimationFrame(raf);

		// Smooth anchor links
		if (settings.anchorLinks) {
			document.querySelectorAll('a[href^="#"]').forEach(anchor => {
				anchor.addEventListener('click', function (e) {
					const href = this.getAttribute('href');
					if (href === '#' || href === '') return;

					const target = document.querySelector(href);
					if (target) {
						e.preventDefault();
						const offset = settings.anchorOffset || 0;
						lenis.scrollTo(target, {
							offset: -offset,
							duration: settings.duration
						});
					}
				});
			});
		}

		// GSAP ScrollTrigger sync
		if (settings.gsapSync && typeof gsap !== 'undefined' && gsap.registerPlugin) {
			gsap.registerPlugin(ScrollTrigger);
			
			lenis.on('scroll', ScrollTrigger.update);

			gsap.ticker.add((time) => {
				lenis.raf(time * 1000);
			});

			gsap.ticker.lagSmoothing(0);
		}

		// Expose lenis instance globally
		window.lenis = lenis;
	}

})();
