/* 
 * Homepage Animations and Parallax effects.
 * copyright: Nick Murphy 2016
 * All rights reserved.
 */

( function( $ ) {
	// Set Blog Tiles
	$('.postImage').each(function() {
		$(this).height($('.postImage').width());
	});
	
	// Parallax Hero
	const heroSlides = document.getElementById('heroSlides');
	let heroAnimationTimeline = gsap.timeline({
			scrollTrigger: {
				trigger: "#hero",
				start: "top 56px",
				end: "bottom top",
				scrub: true
			}
		});
	heroAnimationTimeline.to(heroSlides, {y: heroSlides.offsetHeight * 0.6, ease: "none"}, 0);
	heroAnimationTimeline.to('.heroNavigation', {y: 30, ease: 'none'}, 0);

	// Parallax About
	let aboutAnimationTimeline = gsap.timeline({
			scrollTrigger: {
				trigger: "#about",
				start: "top bottom",
				end: "bottom top",
				scrub: true
			}
		});
	aboutAnimationTimeline.fromTo("#aboutText", {y: -300}, {y: 300, ease: "none"}, 0);
	aboutAnimationTimeline.fromTo("#aboutBackgroundImage", {y: -400}, {y: 400, ease: "none"}, 0);

	// Hero Carousel
	const carousel = document.querySelector('.carousel'),
		carouselSlides = carousel.querySelectorAll('li'),
		carouselSlideCount = carouselSlides.length,
		slideNavigationContainer = document.querySelector('.slideTabs'),
		titles = document.querySelector('.titles'),
		subtitles = document.querySelector('.subtitles');

	// Setup Hero Carousel
	function setupHeroCarousel() {
		for (i = 0; i < carouselSlideCount; ++i) {
			slideNavigationContainer.insertAdjacentHTML('beforeend', '<li data-index="' + i + '"><span data-index="' + i + '"></span></li>');
			titles.insertAdjacentHTML('beforeend', '<li><a href="' + carouselSlides[i].dataset.url + '"><h1 class="xl">' + carouselSlides[i].dataset.name + '</h1></a></li>');
			subtitles.insertAdjacentHTML('beforeend', '<li><h3>' + carouselSlides[i].dataset.category + '</h3></li>');
		}
	}
	setupHeroCarousel();
	
	// Hero Carousel
	let currentSlide = 0;
	const slideNavigationTabs = slideNavigationContainer.querySelectorAll('li'),
		titleSlides = titles.querySelectorAll('li'),
		subtitleSlides = subtitles.querySelectorAll('li');

	for (i = 0; i < carouselSlideCount; ++i) {
		if (i === 0) { continue; }
		
		TweenLite.set(carouselSlides[i], {alpha:"0"});
		TweenLite.set(titleSlides[i], {top:"100%"});
		TweenLite.set(subtitleSlides[i], {top:"100%"});
	}

	slideNavigationTabs[currentSlide].classList.toggle('active');

	const changeSlide = (destinationIndex) => {
		if (destinationIndex === currentSlide) return;

		TweenLite.to( carouselSlides[currentSlide], 1, {alpha:"0"} );
		TweenLite.to( titleSlides[currentSlide], 1, {top:"-100%"} );
		TweenLite.to( subtitleSlides[currentSlide], 1, {top:"-100%"} );
		slideNavigationTabs[currentSlide].classList.toggle('active');

		TweenLite.fromTo( carouselSlides[destinationIndex], 1, {alpha: "0"}, {alpha:"1"} );
		TweenLite.fromTo( titleSlides[destinationIndex], 1, {top: "100%"}, {top:"0px"} );
		TweenLite.fromTo( subtitleSlides[destinationIndex], 1, {top: "100%"}, {top:"0px"} );
		slideNavigationTabs[destinationIndex].classList.toggle('active');

		currentSlide = destinationIndex;
	}

	const advanceSlide = () => {
		const nextIndex = currentSlide < (carouselSlideCount - 1) ? currentSlide + 1 : 0;

		changeSlide(nextIndex);
		carouselTimeout.restart(true);
	}

	var carouselTimeout = TweenLite.delayedCall(6, advanceSlide);

	// Navigate Hero Carousel
	const previousSlideButton = document.querySelector('.carouselSkipButtons .prev'),
		nextSlideButton = document.querySelector('.carouselSkipButtons .next');

	slideNavigationContainer.addEventListener('click', (event) => {
		const targetIndex = event.target.dataset.index;

		if (targetIndex !== undefined && targetIndex !== null) {
			carouselTimeout.restart(true);
			changeSlide(parseInt(targetIndex));
		}
	});

	previousSlideButton.addEventListener('click', () => {
		carouselTimeout.restart(true);

		if (currentSlide === 0 && (carouselSlideCount > 1)) {
			changeSlide(carouselSlideCount - 1);
		} else if (carouselSlideCount > 1) {
			changeSlide(currentSlide - 1);
		}
	});

	nextSlideButton.addEventListener('click', () => {
		carouselTimeout.restart(true);

		if (currentSlide < carouselSlideCount - 1) {
			changeSlide(currentSlide + 1);
		} else {
			changeSlide(0);
		}
	});
} )( jQuery );