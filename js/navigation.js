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

/* Parallax Effect For Interior Pages - NOW BROKEN */ 
if ((body.classList.contains("page-template-default") || body.classList.contains("post-template-default")) && 
	document.querySelector("article").classList.contains("has-post-thumbnail") && 
	!body.classList.contains("home")
	) {
		const heroTimeline = gsap.timeline({
			scrollTrigger: {
				trigger: body,
				start: "top top",
				endTrigger: ".window",
				end: "bottom top",
				scrub: true
			}
		});
		
		const postHeroElement = document.querySelector('div.hero');
		if (postHeroElement) {
			heroTimeline.to(postHeroElement, {y: 200, ease: "none"}, 0);
		}

		const projectHeroElement = document.querySelector('div.projectHero');
		if (projectHeroElement) {
			heroTimeline.to(projectHeroElement, {y: 150, ease: "none"}, 0);
		}
}

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