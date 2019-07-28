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
				searchField.focus();
			};
			
			// If Leaving Search Slide
			if (searchSlide.hasClass("open")) {
				searchSlide.removeClass("open");
				searchField.blur();
				searchField.val('');
			} else {
				navigationSlide.siblings().removeClass("open");
			};
			
			navigationSlide.toggleClass("open");
		} else {
			// Show Selected Slide
			
			bodyElement.addClass("stop");
			
			// If Showing Search Slide
			if (navigationSlide.attr("id").toLowerCase() == searchSlide.attr("id").toLowerCase()) {
				searchField.focus();
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
});
