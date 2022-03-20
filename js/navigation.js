/*
 * Global JS Controller - nm 
 * Copyright: Nick Murphy
 * All rights reserved.
 */

/* Navigation Bar Logic */
let body = document.getElementsByTagName("BODY")[0];

/* Mobile Menu */
const navigationTabBar = document.querySelector("ul.tabbed-navigation");
const menuButton = document.querySelector("button.menuButton");

const toggleMobileMenu = () => {
	menuButton.classList.toggle("active");
	menuButton.innerHTML = menuButton.classList.contains("active") ? 'Close' : 'Menu';
	navigationTabBar.classList.toggle("active");
}

menuButton.addEventListener('click', () => {
	toggleMobileMenu()
});

/*
 * Escape special characters from protected pages
 */
const passwordField = document.querySelectorAll('input[name=post_password]');

if (passwordField.length > 0) {
	passwordField[0].addEventListener('paste', (event) => {
  	setTimeout(() => {
			passwordField[0].value = passwordField[0].replace(/^[\r\n]+|\.|[\r\n]+$/g, '');
    });
	});
}