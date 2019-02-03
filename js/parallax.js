/* 
 * Hero Image Parallax.
 * copyright: Nick Murphy 2016
 * All rights reserved. 
 */
 
(function($) {	
	var $scale = 1;
	var controller = new ScrollMagic.Controller();
		
	var tween_parallax = new TimelineMax().add(TweenMax.to($(".hero"), 0.01, { y: 100, ease: Linear.easeNone }))
	var scene = new ScrollMagic.Scene({
        triggerElement: ".window",
        duration: ($(".window").height() * $scale),
        tweenChanges: true
    }).setTween(tween_parallax).addTo(controller);
        
    scene.triggerHook(0.05);
})(jQuery);