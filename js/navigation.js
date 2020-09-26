/*
 * Global JS Controller - nm 
 * Copyright: Nick Murphy
 * All rights reserved.
 */

jQuery(document).ready(function( $ ) {
	var bodyElement = $("body"),
		body = document.getElementsByTagName("BODY")[0],
		navigationTabs = document.getElementsByClassName("tabbed-navigation")[0].getElementsByTagName("LI"),
		searchField = document.getElementById("search");
	
	/*
	 * Navigation Bar Logic
	 */
	
	for (var i = 0; i < navigationTabs.length; i++) {
		navigationTabs[i].getElementsByClassName("text")[0].addEventListener("click", navigationTabClick, false);
	}
	
	function navigationTabClick(event) {
		event.preventDefault();
		
		let tab = this.parentNode;
		
		if (tab.classList.contains("active")) {
			if (tab.classList.contains("searchTab")) {
				searchField.blur();
			}
			
			let slide = tab.lastElementChild;
			var slideOpacity = 1;
		    var timer = setInterval(function () {
		        if (slideOpacity <= 0.01){
		            clearInterval(timer);
		            slide.classList.remove("open");
		            tab.classList.remove("active");
					body.classList.remove("stop");
					slide.style.opacity = 1;
					return;
		        }
		        slide.style.opacity = slideOpacity;
		        slideOpacity -= slideOpacity * 0.05;
		    }, 1);
			
			return;
		}
		
		for (var i = 0; i < navigationTabs.length; i++) {
			if (navigationTabs[i] == tab) {
				tab.classList.toggle("active");
				tab.lastElementChild.classList.toggle("open");
				
				if (navigationTabs[i].classList.contains("searchTab")) {
					searchField.value = "";
					searchField.focus();
				}
			} else {
				navigationTabs[i].classList.remove("active");
				navigationTabs[i].lastElementChild.classList.remove("open");
				
				if (navigationTabs[i].classList.contains("searchTab")) {
					searchField.blur();
				}
			}
		}
		
		body.classList.add("stop");
	}
	
	/*
	 * Parallax Effect For Interior Pages
	 */
	 
	if (bodyElement.is(".single-post, .page-template-default") && $("article").hasClass("has-post-thumbnail") && !bodyElement.hasClass("home")) {
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
	 * Page Transition Animation
	 *
	 * To be built in a future release. Elements of the site have ".high", ".medium", and ".low" classes to create a zoom effect on load.
	 */
});
