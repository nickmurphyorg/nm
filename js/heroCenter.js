/* 
 * Center Static Hero Images.
 * copyright: Nick Murphy 2016
 * All rights reserved. 
 */
jQuery(function ($) {
	var resizeTimer;
	
	function setHeros() {
		$('.size-post-thumbnail').each(function() {
			$(this).css("marginTop", ($('.postHero').height() - ($(window).width()/1.5))/2);
		});	
	}
	setHeros();
		
	$(window).resize(function(){
	    clearTimeout(resizeTimer);
		resizeTimer = setTimeout(setHeros, 100);
	});
});