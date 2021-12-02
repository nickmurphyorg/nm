/*
 * Global JS Controller - nm 
 * Copyright: Nick Murphy
 * All rights reserved.
 */

/* Navigation Bar Logic */
let body = document.getElementsByTagName("BODY")[0],
	searchField = document.getElementById("search"),
	navigationSlideAnimationDuration = 0.8;

let openNavigationTab = (tab) => {
	if (tab.classList.contains("searchTab")) {
		searchField.value = "";
		searchField.focus();
	}

	const animationStartHandler = () => {
		tab.classList.add("active");
		body.classList.add("stop");
	}
	const slideTimeline = gsap.timeline();
	slideTimeline.from(tab.lastElementChild, {opacity: 0, duration: navigationSlideAnimationDuration}, 0);
	slideTimeline.eventCallback("onStart", animationStartHandler, null);
}

let closeNavigationTab = (tab) => {
	if (tab.classList.contains("searchTab")) {
		searchField.blur();
	}
		
	const slide = tab.lastElementChild;
	const animationCompleteHandler = () => {
		tab.classList.remove("active");
		body.classList.remove("stop");
		slide.style.opacity = 1;
	}
	const slideTimeline = gsap.timeline();
	slideTimeline.to(slide, {opacity: 0, duration: navigationSlideAnimationDuration}, 0);
	slideTimeline.eventCallback("onComplete", animationCompleteHandler, null);
}

//should be converted to event bubbling...
let navigationTabBar = document.querySelector("ul.tabbed-navigation");
let toggleNavigationTabs = (tab) => {
	if (tab.classList.contains("active")) {
		closeNavigationTab(tab);
		return;
	}

	const activeTab = navigationTabBar.querySelector("li.active");

	if (activeTab == null) {
		openNavigationTab(tab);
		return;
	}

	// Toggle Tabs
	if (activeTab.classList.contains("searchTab")) {
		searchField.blur();
	}

	activeTab.classList.toggle("active");
	tab.classList.toggle("active");

	if (tab.classList.contains("searchTab")) {
		searchField.value = "";
		searchField.focus();
	}
}

let navigationTabClick = (event) => {
	event.preventDefault();
	toggleNavigationTabs(event.currentTarget.parentNode);
}
let navigationTabs = navigationTabBar.getElementsByTagName("LI");

for (var i = 0; i < navigationTabs.length; i++) {
	navigationTabs[i].getElementsByClassName("text")[0].addEventListener("click", navigationTabClick, false);
}

/* Remote Navigation Anchors */
let handleRemoteNavigationClick = (event) => {
	switch (event.target.dataset.remoteNavigation) {
		case "work":
			event.preventDefault();
			toggleNavigationTabs(document.querySelector("li.workTab"));
			break;

		case "blog":
			event.preventDefault();
			toggleNavigationTabs(document.querySelector("li.blogTab"));
			break;

		case "email":
			event.preventDefault();
			toggleNavigationTabs(document.querySelector("li.emailTab"));
			break;

		case "search":
			event.preventDefault();
			toggleNavigationTabs(document.querySelector("li.searchTab"));
			break;
	
		default:
			break;
	}
}

body.addEventListener('click', handleRemoteNavigationClick, false);

/* Parallax Effect For Interior Pages */ 
if ((body.classList.contains("page-template-default") || body.classList.contains("post-template-default")) && 
	document.querySelector("article.post").classList.contains("has-post-thumbnail") && 
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

/* Page Transition Animation
 *
 * To be built in a future release. Elements of the site have ".high", ".medium", and ".low" classes to create a zoom effect on load.
 */
