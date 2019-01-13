/* 
 * Homepage Animations and Parallax effects.
 * copyright: Nick Murphy 2016
 * All rights reserved.
 */

( function( $ ) {
	// Picture of Me
	function checkWidth() {
		var windowSize = $(window).width();

		if (windowSize <= 751) {
            $("#aboutMe .parallax").backstretch( heroSmall );
        }
        else if (windowSize <= 1024) {
            $("#aboutMe .parallax").backstretch( heroMedium );
        }
        else if (windowSize >= 1025) {
            $("#aboutMe .parallax").backstretch( heroLarge );
        }
    } // end checkWidth
    checkWidth();
	
	var heroHeight, aboutHeight, blockHeight, typeHeight, slideHeight, resizeTimer;
	
	function math(){
		heroHeight = $("#heroSlides").height();
		aboutHeight = $("#aboutMe").height();
		blockHeight = $('#meText').height()/2;
		typeHeight = $('#aboutText').height()*2;
		slideHeight = $('#aboutSlide').height()*2;
		
		// Set About Slides
		$('#meText').css('margin-top', - blockHeight );
		
		// Set Blog Tiles
		$('.postImage').each(function() {
			$(this).height($('.postImage').width());
		});
	}
	math();
	
	// Parallax effects
	var controller = new ScrollMagic.Controller();
					
	var parallaxHero = new TimelineMax().add(TweenMax.to($("#heroText"), 0.01, { y: -300, ease: Linear.easeNone }))
		.add(TweenMax.to($("#heroSlides"), 0.01, { y: -200, ease: Linear.easeNone }), 0)
	var scene = new ScrollMagic.Scene({
		triggerElement: "#prjkts",
		triggerHook: 100,
		duration: "100%",
		tweenChanges: true
	}).setTween(parallaxHero).addTo(controller);
	
	var parallaxAbout = new TimelineMax().add(TweenMax.to($("#aboutText"), 0.01, { y: 600, ease: Linear.easeNone }))
		.add(TweenMax.to($("#aboutMe .parallax"), 0.01, { y: 400, ease: Linear.easeNone }), 0)
	var scene2 = new ScrollMagic.Scene({
		triggerElement: "#aboutMe",
		triggerHook: 100,
		duration: "200%",
		tweenChanges: true
	}).setTween(parallaxAbout).setClassToggle("#heroText, #heroSlides", "hide").addTo(controller);
	
	//Window resize functions
	$(window).resize(function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(math, 150);
    });
} )( jQuery );
	
	( function( $ ) {
		function shuffle(){
			var sata = JSON.parse($("#sata").html());
			var titles = $(".titles");
			var subtitles = $(".subtitles");
			var carousel = $("#heroSlides .carousel");
			var windowSize = $(window).width();
			
			for (var i in sata.data) {
				$('<li class="' + sata.data[i].color + '"><a href="' + sata.data[i].url + '"><h1>' + sata.data[i].name + '</h1></a></li>').appendTo(titles);
				$('<li class="' + sata.data[i].color + '"><h2>&mdash;' + sata.data[i].category + '</h2></li>').appendTo(subtitles);
				if (windowSize <= 751) {
					$('<li class="sheet">').backstretch( sata.data[i].small).appendTo(carousel);
				}
				else if (windowSize <= 1024) {
					$('<li class="sheet">').backstretch( sata.data[i].medium).appendTo(carousel);
				}
				else if (windowSize >= 1025) {
					$('<li class="sheet">').backstretch( sata.data[i].large).appendTo(carousel);
				}
			};
			wipeout();
		}
		shuffle();
		
		function wipeout(){
	        var sheets = $(".carousel li");
	        var titles = $(".titles li");
	        var subtitles = $(".subtitles li");
	        var tick = $(".tick");
	        var nmbr = sheets.length;
	        var currentSlide = 0;
	                
			TweenLite.set(sheets.filter(":gt(0)"), {alpha:"0"});
			TweenLite.set(titles.filter(":gt(0)"), {top:"100%"});
			TweenLite.set(subtitles.filter(":gt(0)"), {top:"100%"});
			TweenLite.delayedCall(0, tickr );	
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
					TweenLite.delayedCall(0, tickr );
					TweenLite.delayedCall(6, nextSlide);								
			}
			
			function tickr() {
				$(".tick").html( '0' + (currentSlide+1) + '/0' + nmbr );
			}
			
			TweenLite.to($(".nudge"), 1.5, { y:"-30px" }).delay(2.5);
		}	
	} )( jQuery );