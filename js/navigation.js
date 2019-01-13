/**
 * Global JS Controller - nm 
 * Copyright: Nick Murphy
 * All rights reserved.
 **/

/**
 * Open Slides.
 */
jQuery(document).ready(function( $ ) {
	var workSlide = $("li#workSlide"),
		blogSlide = $("li#blogSlide"),
		emailSlide = $("li#emailSlide"),
		searchSlide = $("li#searchSlide"),
		work = $("li#workTab"),
		blog = $("li#blogTab"),
		email = $("li#emailTab"),
		search = $("li#searchTab"),
		target = "50% " + (($( window ).height() / 2 ) + $("body").scrollTop() + 'px'),
		resizeTimer;
	
	//$('#preloader').addClass('open');
	
	/**
	  * Type to Search.
	  */
	var searching = function(e) {
		if (e.keyCode >= 48 && e.keyCode <= 90) {
			$(document).unbind( "keydown", searching );
			if ($(searchSlide).siblings().hasClass("open")) {
				$(searchSlide).siblings().removeClass('open');
				$(searchSlide).toggleClass('open');
				$('#search').val('');
				$('#search').focus();
			} else {
				$('#search').val('');
				$('#search').focus();
				$('body').addClass('stop');
				TweenLite.ticker.fps(60);
				var showSearch = new TimelineLite();
				showSearch.set($(searchSlide),{className:'+=open'})
				showSearch.from($(searchSlide), 0.5, {alpha: 0, ease:Expo.easeOut}, 0.1)
				return showSearch;
			}
		} else {
			return false;
		}
	};
	$(document).bind( "keydown", searching );
		
	$( work ).on('click', function() {
		if ($(workSlide).hasClass("open")) {
			TweenLite.ticker.fps(60);
			$(work).toggleClass('active');
			$('body').removeClass('stop');
			var hideWork = new TimelineLite();
			hideWork.to(workSlide, 0.5, {alpha: 0, ease:Expo.easeOut})
			hideWork.set(workSlide,{className:'-=open'}, 0.5)
			hideWork.to(workSlide, 0.01, {alpha: 1, ease:Expo.easeOut}, 0.51)
			return hideWork;
		} else {
			$(work).toggleClass('active');
			if ($(workSlide).siblings().hasClass("open")) {
				$(work).siblings().removeClass('active');
				if ($(searchSlide).hasClass("open")) {
					$(searchSlide).removeClass('open');
					$(document).bind( "keydown", searching );	
				} else {
					$(workSlide).siblings().removeClass('open');
				}
				$(workSlide).toggleClass('open');
			} else {
				$('body').addClass('stop');
				TweenLite.ticker.fps(60);
				var showWork = new TimelineLite();
				showWork.set($(workSlide),{className:'+=open'})
				showWork.from($(workSlide), 0.5, {alpha: 0, ease:Expo.easeOut}, 0.1)
				return showWork;
			}
		}
	});/*work tab */
	
	$( blog ).on('click', function() {
		if ($(blogSlide).hasClass("open")) {
			TweenLite.ticker.fps(60);
			$(blog).toggleClass('active');
			$('body').removeClass('stop');
			var hideBlog = new TimelineLite();
			hideBlog.to(blogSlide, 0.5, {alpha: 0, ease:Expo.easeOut})
			hideBlog.set(blogSlide,{className:'-=open'}, 0.5)
			hideBlog.to(blogSlide, 0.01, {alpha: 1, ease:Expo.easeOut}, 0.51)
			return hideBlog;
		} else {
			$(blog).toggleClass('active');
			if ($(blogSlide).siblings().hasClass("open")) {
				$(blog).siblings().removeClass('active');
				if ($(searchSlide).hasClass("open")) {
					$(searchSlide).removeClass('open');
					$(document).bind( "keydown", searching );	
				} else {
					$(blogSlide).siblings().removeClass('open');
				}
				$(blogSlide).toggleClass('open');
			} else {
				$('body').addClass('stop');
				TweenLite.ticker.fps(60);
				var showBlog = new TimelineLite();
				showBlog.set($(blogSlide),{className:'+=open'})
				showBlog.from($(blogSlide), 0.5, {alpha: 0, ease:Expo.easeOut}, 0.1)
				return showBlog;
			}
		}
	});/*blog tab */
	
	$( email ).on('click', function() {
		if ($(emailSlide).hasClass("open")) {
			TweenLite.ticker.fps(60);
			$(email).toggleClass('active');
			$('body').removeClass('stop');
			var hideEmail = new TimelineLite();
			hideEmail.to(emailSlide, 0.5, {alpha: 0, ease:Expo.easeOut})
			hideEmail.set(emailSlide,{className:'-=open'}, 0.5)
			hideEmail.to(emailSlide, 0.01, {alpha: 1, ease:Expo.easeOut}, 0.51)
			return hideEmail;
		} else {
			$(email).toggleClass('active');
			if ($(emailSlide).siblings().hasClass("open")) {
				$(email).siblings().removeClass('active');
				if ($(searchSlide).hasClass("open")) {
					$(searchSlide).removeClass('open');
					$(document).bind( "keydown", searching );
				} else {
					$(emailSlide).siblings().removeClass('open');
				}
				$(emailSlide).toggleClass('open');
			} else {
				$('body').addClass('stop');
				TweenLite.ticker.fps(60);
				var showEmail = new TimelineLite();
				showEmail.set($(emailSlide),{className:'+=open'})
				showEmail.from($(emailSlide), 0.5, {alpha: 0, ease:Expo.easeOut}, 0.1)
				return showEmail;
			}
		}
	});/* email tab */
	
	$( search ).on('click', function() {
		if ($(searchSlide).hasClass("open")) {
			$('#search').blur();
			$('#search').val('');
			$(document).bind( "keydown", searching );
			TweenLite.ticker.fps(60);
			$(search).toggleClass('active');
			$('body').removeClass('stop');
			var hideSearch = new TimelineLite();
			hideSearch.to(searchSlide, 0.5, {alpha: 0, ease:Expo.easeOut})
			hideSearch.set(searchSlide,{className:'-=open'}, 0.5)
			hideSearch.to(searchSlide, 0.01, {alpha: 1, ease:Expo.easeOut}, 0.51)
			return hideSearch;
		} else {
			$(search).toggleClass('active');
			if ($(searchSlide).siblings().hasClass("open")) {
				$(search).siblings().removeClass('active');
				$(searchSlide).siblings().removeClass('open');
				$(searchSlide).toggleClass('open');
				$(document).unbind( "keydown", searching );
				$('#search').focus();
			} else {
				$(document).unbind( "keydown", searching );
				$('#search').focus();
				$('body').addClass('stop');
				TweenLite.ticker.fps(60);
				var showSearch = new TimelineLite();
				showSearch.set($(searchSlide),{className:'+=open'})
				showSearch.from($(searchSlide), 0.5, {alpha: 0, ease:Expo.easeOut}, 0.1)
				return showSearch;
			}
		}
	});/* search tab */
	
	/**
	 * Turning Type To Search On and Off.
	 */
	$( "#contactForm" ).focusin(function() {
		$(document).unbind( "keydown", searching );
	});
	$( "#contactForm" ).focusout(function() {
		$(document).bind( "keydown", searching );
	});
	
	/**
	 * Project and Blog Tiles.
	 */
	function setTiles() {
		$('.tile').each(function() {
			$(this).height($('.tile').width());
		});
	}
	setTiles();
	
	$(window).resize(function(){
		//Do not delte this function!!!!!
	    clearTimeout(resizeTimer);
		resizeTimer = setTimeout(setTiles, 0);
	});
	
	/**
	 * Comment Box.
	 */
	if (document.getElementById("comments")) {
	    $('#commentform label').each(function() {
		    $(this).addClass("live");
		});
	}

	function cleanForm(){
		if ($("#comment").filter(function() { return $(this).val(); }).length > 0) {
			$('.comment-form-comment label').css( "opacity", "0" );
		}
		if ($("#author").filter(function() { return $(this).val(); }).length > 0) {
			$('.comment-form-author label').css( "opacity", "0" );
		}
		if ($("#email").filter(function() { return $(this).val(); }).length > 0) {
			$('.comment-form-email label').css( "opacity", "0" );
		}
		if ($("#url").filter(function() { return $(this).val(); }).length > 0) {
			$('.comment-form-url label').css( "opacity", "0" );
		}
	}
	cleanForm();
	 
	$( "#comment" ).focusin(function() {
		$(document).unbind( "keydown", searching );
		$('.comment-form-comment label').css({ "opacity": "0" });
	});
	$( "#author" ).focusin(function() {
		$(document).unbind( "keydown", searching );
		$('.comment-form-author label').css({ "opacity": "0" });
	});
	$( "#email" ).focusin(function() {
		$(document).unbind( "keydown", searching );
		$('.comment-form-email label').css({ "opacity": "0" });
	});
	$( "#url" ).focusin(function() {
		$(document).unbind( "keydown", searching );
		$('.comment-form-url label').css({ "opacity": "0" });
	});
	
	// Apply Text
	$( "#comment, #author, #email, #url" ).focusout(function() {
		$(document).bind( "keydown", searching );
		if ($( this ).filter(function() { return $(this).val(); }).length > 0) {
			$( this ).prev().css( "opacity", "0" );
		} else {
			$( this ).prev().css( "opacity", "1" );
		}
	});
	
	function setTarget() {
		$("#content").css("perspective-origin", target );
	}
	//setTarget();
	
	$(window).load(function(){
		//alert("loaded");
		var epic = new TimelineMax({});
			epic.set($("#preloader"), {className:'-=open'})
				.from($(".high"), 0.5, {alpha:0, ease:Power3.easeOut}, 0)
				.from($(".mid"), 0.5, {z:-100, ease:Power3.easeOut}, 0)
				.from($(".low"), 1, {z:-200, ease:Power3.easeOut}, 0)
	});
	
	var a = new RegExp('/' + window.location.host + '/');
	$('a').click(function() {
		event.preventDefault();
		var pass = this.href;
		if(!a.test(this.href)) {
			event.stopPropagation();
			window.open(this.href, '_blank');
		} else {
			if ($( work ).hasClass("active")){
				TweenLite.to($("#workSlide .container"), 0.5, { alpha:"0" });

			} else if ($( blog ).hasClass("active")){
				TweenLite.to($("#blogSlide .container"), 0.5, { alpha:"0" });
				
			} else {
				TweenLite.to($("#content"), 0.2, { alpha:"0" });
				TweenLite.to($("#colophon"), 0.2, { alpha:"0" });
			}
			setTimeout(function(){
				window.location.href = pass;
			}, 200);
		}
	});
});

//Preloader Start

