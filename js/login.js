/*
 * Animate Login Page
 * Copyright Nick Murphy 2016
 * All rights reserved.
 */

jQuery(document).ready(function( $ ) {
	const messageBox = document.getElementsByClassName("message");
	const formTimeOut = messageBox[0] != null ? 0.1 : 0.0;
	const formExtraDistance = messageBox[0] != null ? 20 : 0;
	
	TweenLite.from($("h1"), 0.5, { y:"20px", alpha:"0" });
	
	if (messageBox[0] != null) {
		TweenLite.from(messageBox[0], 0.5, { y:"40px", alpha:"0" }).delay(0.1);
	}
	
	TweenLite.from($("#loginform"), 0.5, { y:(formExtraDistance + 40).toString() + "px", alpha:"0" }).delay(0.1 + formTimeOut);
	TweenLite.from($("#nav"), 0.5, { y:(formExtraDistance + 60).toString() + "px", alpha:"0" }).delay(0.2 + formTimeOut);
	TweenLite.from($("#backtoblog"), 0.5, { y:(formExtraDistance + 60).toString() + "px", alpha:"0" }).delay(0.2 + formTimeOut);
});