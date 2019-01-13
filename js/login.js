/*
 * Animate Login Page
 * Copyright Nick Murphy 2016
 * All rights reserved.
 */

jQuery(document).ready(function( $ ) {
	TweenLite.from($("h1"), 0.5, { y:"20px", alpha:"0" });
	TweenLite.from($("#loginform"), 0.5, { y:"40px", alpha:"0" }).delay(0.1);
	TweenLite.from($("#nav"), 0.5, { y:"60px", alpha:"0" }).delay(0.2);
	TweenLite.from($("#backtoblog"), 0.5, { y:"60px", alpha:"0" }).delay(0.2);
});