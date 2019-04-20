/*
 * Global JS Controller - nm 
 * Copyright: Nick Murphy
 * All rights reserved.
 */

jQuery(document).ready(function( $ ) {
	var bodyElement = $("body"),
		work = $("li#workTab"),
		blog = $("li#blogTab"),
		email = $("li#emailTab"),
		search = $("li#searchTab"),
		workSlide = $("li#workSlide"),
		blogSlide = $("li#blogSlide"),
		emailSlide = $("li#emailSlide"),
		searchSlide = $("li#searchSlide"),
		searchField = $("#search"),
		contactForm = $("#contactForm"),
		tile = $(".tile");

	var resizeTimer;
	
	/*
	 * Type to Search.
	 */
	var searching = function(e) {
		if (e.keyCode >= 48 && e.keyCode <= 90) {
			$(document).unbind( "keydown", searching );
			
			search.addClass("active");
			
			if (searchSlide.siblings().hasClass("open")) {
				searchSlide.siblings().removeClass('open');
				searchSlide.toggleClass('open');
				
				searchField.val('');
				searchField.focus();
			} else {
				searchField.val('');
				searchField.focus();
				
				bodyElement.addClass('stop');
				
				TweenLite.ticker.fps(60);
				
				var showSearch = new TimelineLite();
				showSearch.set((searchSlide),{className:'+=open'});
				showSearch.from(searchSlide, 0.5, {alpha: 0, ease:Expo.easeOut}, 0.1);
				
				return showSearch;
			}
		} else {
			return false;
		}
	};
	
	$(document).bind( "keydown", searching );
	
	/*
	 * Turning Type To Search On and Off.
	 */
	contactForm.focusin(function() {
		$(document).unbind( "keydown", searching );
	});
	
	contactForm.focusout(function() {
		$(document).bind( "keydown", searching );
	});
	
	/*
	 * Navigation Bar Logic
	 */
	$(work).add(blog).add(email).add(search).on("click", function () {
		let selection = $(this);
		let navigationSlide = returnNavigationSlideFor(selection);
		
		selection.toggleClass('active');
		
		if (navigationSlide == null) {
			console.log("Navigation slide could not be returned.");
			
			return
		}
		
		if (navigationSlide.hasClass("open")) {
			// Hide Open Slide
			
			if (navigationSlide.attr("id").toLowerCase() == searchSlide.attr("id").toLowerCase()) {
				searchField.blur();
				searchField.val('');
			
				$(document).bind( "keydown", searching );
			}
			
			TweenLite.ticker.fps(60);
			
			bodyElement.removeClass("stop");
			
			var hideSlide = new TimelineLite();
				hideSlide.to(navigationSlide, 0.5, {alpha: 0, ease:Expo.easeOut});
				hideSlide.set(navigationSlide, {className:'-=open'}, 0.5);
				hideSlide.to(navigationSlide, 0.01, {alpha: 1, ease:Expo.easeOut}, 0.51);
			
			return hideSlide;
		} else if (navigationSlide.siblings().hasClass("open")) {
			// Close Sibiling Slide and Open Selected Slide
			
			selection.siblings().removeClass("active");
			
			// If Showing Search Slide
			if (navigationSlide.attr("id").toLowerCase() == searchSlide.attr("id").toLowerCase()) {
				focusSearchSlide()
			};
			
			// If Leaving Search Slide
			if (searchSlide.hasClass("open")) {
				searchSlide.removeClass("open");
				
				$(document).bind( "keydown", searching );	
			} else {
				navigationSlide.siblings().removeClass("open");
			};
			
			navigationSlide.toggleClass("open");
		} else {
			// Show Selected Slide
			
			bodyElement.addClass("stop");
			
			// If Showing Search Slide
			if (navigationSlide.attr("id").toLowerCase() == searchSlide.attr("id").toLowerCase()) {
				focusSearchSlide()
			};
			
			TweenLite.ticker.fps(60);
			
			var showSlide = new TimelineLite();
				showSlide.set(navigationSlide, {className:'+=open'});
				showSlide.from(navigationSlide, 0.5, {alpha: 0, ease:Expo.easeOut}, 0.1);
			
			return showSlide;
		}
	});
	
	/*
	 * Parallax Effect For Interior Pages
	 */
	if (bodyElement.is(".single-post, .page-template-default") && $("article").hasClass("has-post-thumbnail") && !bodyElement.hasClass("home")) {
		console.log("Parallax time.");
		
		var controller = new ScrollMagic.Controller();
			
		var tween_parallax = new TimelineMax().add(TweenMax.to($("div.hero"), 0.01, { y: 100, ease: Linear.easeNone }))
		var scene = new ScrollMagic.Scene({
	        triggerElement: ".window",
	        duration: ($(".window").height()),
	        tweenChanges: true
	    }).setTween(tween_parallax).addTo(controller);
	        
	    scene.triggerHook(0.05);
	}
	
	/*
	 * Project and Blog Tiles
	 */
	function setTiles() {
		tile.each(function() {
			const thisTile = $(this);
			
			$(thisTile).height($(thisTile).width());
		});
	}
	setTiles();
	
	$(window).resize(function(){
	    clearTimeout(resizeTimer);
	    
		resizeTimer = setTimeout(setTiles, 0);
	})
	
	/*
	 * Comment Box
	 */
	$("#commentform textarea, #commentform input").focusin(function() {
		const input = $(this);
	    
	    if (input.attr("type") != "hidden" || input.attr("type") != "submit") {
	    		$(document).unbind( "keydown", searching );
	    };
	})
		
	$("#commentform textarea, #commentform input").focusout(function() {
		const input = $(this);
	    
	    if (input.attr("type") != "hidden" || input.attr("type") != "submit") {
			$(document).bind( "keydown", searching );
		};
	})
	
	/*
	 * Page Transition Animation
	 *
	 * To be built in a future release. Elements of the site have ".high", ".medium", and ".low" classes to create a zoom effect on load.
	 */
	
	/*
	 * Helper Methods
	 */
	function returnNavigationSlideFor(navigationItem) {
		let selectionID = navigationItem.attr("id");
		
		switch (selectionID) {
			case "workTab":
				return workSlide;
			case "blogTab":
				return blogSlide;
			case "emailTab":
				return emailSlide;
			case "searchTab":
				return searchSlide;
			default:
				return null;
		}
	};
	
	function focusSearchSlide() {
		$(document).unbind( "keydown", searching );
		
		searchField.focus();
	};
});
