/* 
 * Homepage Animations and Parallax effects.
 * copyright: Nick Murphy 2016
 * All rights reserved.
 */

( function( $ ) {
	let carousel = $("#heroSlides .carousel");
	
	// Set Blog Tiles
	$('.postImage').each(function() {
		$(this).height($('.postImage').width());
	});
	
	// Parallax Hero
	let heroAnimationTimeline = gsap.timeline({
			scrollTrigger: {
				trigger: "#hero",
				start: "top top",
				end: "bottom top",
				scrub: true
			}
		});
	heroAnimationTimeline.to("#heroText", {y: 300, ease: "none"}, 0);
	heroAnimationTimeline.to("#heroSlides", {y: 400, ease: "none"}, 0);

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

	// Setup Hero Carousel
	let titles = $(".titles"),
		subtitles = $(".subtitles");
		
	function setupHeroCarousel() {
		carousel.children('li').each(function(i) {
			let currentSlide = $(this);
			
			$('<li class="' + currentSlide.data('color') + '"><a href="' + currentSlide.data('url') + '"><h1>' + currentSlide.data('name') + '</h1></a></li>').appendTo(titles);
			$('<li class="' + currentSlide.data('color') + '"><h2>&mdash;' + currentSlide.data('category') + '</h2></li>').appendTo(subtitles);
		});
		
		runHeroCarousel();
	}
	
	// Run Hero Carousel
	function runHeroCarousel(){
        let sheets = $(".carousel li"),
        	titles = $(".titles li"),
        	subtitles = $(".subtitles li"),
        	nmbr = sheets.length,
        	currentSlide = 0,
			nudge = document.getElementsByClassName("nudge")[0];
                
		TweenLite.set(sheets.filter(":gt(0)"), {alpha:"0"});
		TweenLite.set(titles.filter(":gt(0)"), {top:"100%"});
		TweenLite.set(subtitles.filter(":gt(0)"), {top:"100%"});
		TweenLite.delayedCall(4, nextSlide);				
			
		function nextSlide(){					
			TweenLite.to( sheets.eq(currentSlide), 1, {alpha:"0"} );
			TweenLite.to( titles.eq(currentSlide), 1, {top:"-100%"} );
			TweenLite.to( subtitles.eq(currentSlide), 1, {top:"-100%"} );		
						
			if (currentSlide < sheets.length - 1) {
				currentSlide++;
			}
			else {
				currentSlide = 0;
			}
				TweenLite.fromTo( sheets.eq(currentSlide), 1, {alpha: "0"}, {alpha:"1"} );
				TweenLite.fromTo( titles.eq(currentSlide), 1, {top: "100%"}, {top:"0px"} );
				TweenLite.fromTo( subtitles.eq(currentSlide), 1, {top: "100%"}, {top:"0px"} );
				TweenLite.delayedCall(6, nextSlide);								
		}
		
		const nudgeHeight = nudge.getBoundingClientRect().height;
		TweenLite.to(nudge, 1.5, { y: - nudgeHeight + "px" }).delay(2.5);
	}
	
	setupHeroCarousel();
} )( jQuery );