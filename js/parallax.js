/* 
 * Hero Image Parallax.
 * copyright: Nick Murphy 2016
 * All rights reserved. 
 */
 
(function($) {
	function checkWidth() {
		var windowSize = $(window).width();

		if (windowSize <= 751) {
            $(".hero").backstretch( heroSmall );
        }
        else if (windowSize <= 1024) {
            $(".hero").backstretch( heroMedium );
        }
        else if (windowSize >= 1025) {
            $(".hero").backstretch( heroLarge );
        }
    } // end checkWidth
    checkWidth();
    
	//$(window).resize(function(){
		//resizeTimer = setTimeout(checkWidth, 250);
	//});
	
	var $scale = 1;
	var controller = new ScrollMagic.Controller();
		
	var tween_parallax = new TimelineMax().add(TweenMax.to($(".hero .backstretch"), 0.01, { y: 100, ease: Linear.easeNone }))
	var scene = new ScrollMagic.Scene({
        triggerElement: ".window",
        duration: ($(".window").height() * $scale),
        tweenChanges: true
    }).setTween(tween_parallax).addTo(controller);
        
    scene.triggerHook(0.05);
    //scene.addIndicators();
})(jQuery);