function _calculateScrollbarWidth() {
	document.documentElement.style.setProperty('--scrollbar-width', (window.innerWidth - document.documentElement.clientWidth) + "px");
}
// recalculate on resize
window.addEventListener('resize', _calculateScrollbarWidth, false);
// recalculate on dom load
document.addEventListener('DOMContentLoaded', _calculateScrollbarWidth, false); 
// recalculate on load (assets loaded as well)
window.addEventListener('load', _calculateScrollbarWidth);

// Burger menus
document.addEventListener('DOMContentLoaded', function() {
	// open
	const burger = document.querySelectorAll('.navbar-burger');
	const menu = document.querySelectorAll('.navbar-menu');
	const side = document.querySelector('.side-navbar ');

	if (burger.length && menu.length) {
		for (var i = 0; i < burger.length; i++) {
			burger[i].addEventListener('click', function() {
				for (var j = 0; j < menu.length; j++) {
					menu[j].classList.toggle('hidden');
					side.classList.add('active');
				}
			});
		}
	}

	// close
	const close = document.querySelectorAll('.navbar-close');
	const backdrop = document.querySelectorAll('.navbar-backdrop');

	if (close.length) {
		for (var i = 0; i < close.length; i++) {
			close[i].addEventListener('click', function() {
				for (var j = 0; j < menu.length; j++) {
					menu[j].classList.toggle('hidden');
					side.classList.remove('active');
				}
			});
		}
	}

	if (backdrop.length) {
		for (var i = 0; i < backdrop.length; i++) {
			backdrop[i].addEventListener('click', function() {
				for (var j = 0; j < menu.length; j++) {
					menu[j].classList.toggle('hidden');
				}
			});
		}
	}

	var menuToggles = document.querySelectorAll('.menu-toggle');

	// Add a click event listener to each menu-toggle element
	menuToggles.forEach(function(menuToggle) {
			menuToggle.addEventListener('click', function() {
					console.log('rfrff');
					// Find the parent element (in this case, the 'menu' div)
					var parentElement = menuToggle.closest('.menu-item');
					// Toggle the 'open' class on the parent element
					parentElement.classList.toggle('open');
			});
	});

	    var toggles = document.querySelectorAll('.mobile-menu-toggle');

    // Loop through each toggle
    toggles.forEach(function(toggle) {
        // Add click event listener to each toggle
        toggle.addEventListener('click', function() {
            // Find the first child .sub-menu of the parent li
            var subMenu = this.parentElement.querySelector('.sub-menu');
            // Toggle the 'open' class on the sub-menu
            subMenu.classList.toggle('open');
						this.classList.toggle('open');
        });
    });
	
});

// Get the header element
const header = document.querySelector('.site-header');

// Function to toggle the class
function toggleHeaderClass() {
	if (window.scrollY - 50 > 0) {
		header.classList.add('scroll');
	} else {
		header.classList.remove('scroll');
	}
}
// Attach scroll event listener
window.addEventListener('scroll', toggleHeaderClass);


// Scroll page to IDs of sections
document.addEventListener("DOMContentLoaded", function() {
	const scrollLinks = document.querySelectorAll(".scroll-link a");

	for (let i = 0; i < scrollLinks.length; i++) {
		scrollLinks[i].addEventListener("click", smoothScroll);
	}

	function smoothScroll(event) {
		event.preventDefault();

		const targetId = this.getAttribute("href");
		const targetElement = document.querySelector(targetId);

		targetElement.scrollIntoView({
			behavior: "smooth",
			block: "start",
		});
	}
});

// Animations

function checkElementsInView() {
	var pageTop = window.pageYOffset;
	var pageBottom = pageTop + window.innerHeight;
	var animateElements = document.querySelectorAll('.animate[class*="animate-"]');

	animateElements.forEach(function(element) {
		var elementTop = element.getBoundingClientRect().top + pageTop;

		if (elementTop < pageBottom) {
			element.classList.add('on');
		} else {
			element.classList.remove('on');
		}
	});
}

document.addEventListener('DOMContentLoaded', function() {
	checkElementsInView();
});
window.addEventListener('scroll', function() {
	checkElementsInView();
});

function handleIntersection(entries, observer) {
	entries.forEach((entry) => {
		if (entry.isIntersecting) {
			entry.target.classList.add('active');
		} else {
			entry.target.classList.remove('active');
		}
	});
}

// Create an Intersection Observer instance
const observerviewport = new IntersectionObserver(handleIntersection, {
	root: null, // Use the viewport as the root
	threshold: 1 // Trigger when 50% of the element is in the viewport
});

// Select all elements with the class 'in-viewport'
const inViewportElements = document.querySelectorAll('.in-viewport');

// Observe each 'in-viewport' element
inViewportElements.forEach((element) => {
	observerviewport.observe(element);
});


// Accordions
const accordionItems = document.querySelectorAll(".accordion-item");
accordionItems.forEach((item) => {
	const header = item.querySelector(".accordion-header");
	const content = item.querySelector(".accordion-content");
	header.addEventListener("click", () => {
		// close other items
		accordionItems.forEach((otherItem) => {
			if (otherItem !== item && otherItem.classList.contains("active")) {
				otherItem.classList.remove("active");
				otherItem.querySelector(".accordion-content").style.height = 0;
			}
		});

		item.classList.toggle("active");

		if (item.classList.contains("active")) {
			content.style.height = `${content.scrollHeight}px`;
		} else {
			content.style.height = 0;
		}
	});
});




function _calculateScrollbarWidth() {
		var hasScrollbar = window.innerWidth > document.documentElement.clientWidth;
    
		// Add class 'has-scrollbar' to body if a scrollbar exists, remove it otherwise
		document.body.classList.toggle('has-scrollbar', hasScrollbar);

		// Set the custom property '--scrollbar-width' based on scrollbar existence
		document.documentElement.style.setProperty('--scrollbar-width', (hasScrollbar ? (window.innerWidth - document.documentElement.clientWidth) : 0) + "px");
}

// Recalculate on resize
window.addEventListener('resize', _calculateScrollbarWidth, false);

// Recalculate on DOM load
document.addEventListener('DOMContentLoaded', _calculateScrollbarWidth, false);

// Recalculate on load (assets loaded as well)
window.addEventListener('load', _calculateScrollbarWidth);



document.addEventListener('click', function (event) {
	const dropdownTrigger = event.target.closest('.dropdown-trigger');
	const dropdownToggle = event.target.closest('.dropdown-toggle');

	// Hide the dropdown if clicked outside the dropdown and trigger button
	if (!dropdownTrigger && !dropdownToggle) {
		const allDropdowns = document.querySelectorAll('.dropdown-toggle.active');
		allDropdowns.forEach(function (dropdown) {
			dropdown.classList.add('hidden');
			dropdown.classList.remove('active');
		});
	}

	// If the clicked element is a dropdown-trigger button
	if (dropdownTrigger) {
		const dropdownId = dropdownTrigger.getAttribute('data-dropdown-toggle');
		const dropdown = document.getElementById(dropdownId);

		// Toggle the visibility of the clicked dropdown
		if (dropdown) {
			dropdown.classList.toggle('hidden');
			dropdown.classList.toggle('active');
		}
	}
});

// Stats Counter

 const counters = document.querySelectorAll('.counter');

const options = {
		threshold: 0.5 // Trigger when 50% of the element is visible
};

const intersectionObserver = new IntersectionObserver((entries, observer) => {
		entries.forEach(entry => {
				if (entry.isIntersecting) {
						const target = entry.target;
						const count = target.getAttribute('data-count');
						const span = target.querySelector('.number');
						const startCount = 0;
						const endCount = parseInt(count);
						const duration = 1000; // Duration of animation in milliseconds
						const difference = endCount - startCount;
						const interval = duration / difference;

						let currentCount = startCount;
						const timer = setInterval(() => {
								currentCount += 1;
								span.textContent = currentCount;
								if (currentCount === endCount) {
										clearInterval(timer);
								}
						}, interval);

						observer.unobserve(target); // Stop observing once animation starts
				}
		});
}, options);

if (counters.length > 0) {
		counters.forEach(counter => {
				intersectionObserver.observe(counter);
		});
}


// Project single gallery slider
document.addEventListener('DOMContentLoaded', function() {
	var gallerySlider = document.querySelector('.gallery-slider');
	if (gallerySlider) {
			// Convert the element to a jQuery object to use Slick
			jQuery(gallerySlider).slick({
				infinite: true,
				slidesToShow: 1,

				slidesToScroll: 1,
				arrows: true,
				dots: true,
				appendArrows: jQuery('.gallery-wrapper .arrows'),
				appendDots: jQuery('.gallery-wrapper .dots'),
				prevArrow:'<svg class="slick-prev text-white hover:text-accent" xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none"><circle cx="21.4044" cy="21.4044" r="21.4044" transform="matrix(-1 0 0 1 42.8086 0)" fill="currentColor"/><path d="M13.2315 21.793L20.7315 17.4628L20.7315 26.1231L13.2315 21.793ZM30.355 22.543L19.9815 22.543L19.9815 21.043L30.355 21.043L30.355 22.543Z" fill="black"/></svg>',
        nextArrow: '<svg class="slick-next text-white hover:text-accent" xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none"><circle cx="21.4044" cy="21.4044" r="21.4044" fill="currentColor"/><path d="M29.5766 21.793L22.0766 17.4628L22.0766 26.1231L29.5766 21.793ZM12.4531 22.543L22.8266 22.543L22.8266 21.043L12.4531 21.043L12.4531 22.543Z" fill="black"/></svg>',
		});
	}
});


// Hero slider
document.addEventListener('DOMContentLoaded', function() {
	var heroSlider = document.querySelector('.hero-slider');
	if (heroSlider) {
			// Convert the element to a jQuery object to use Slick
			jQuery(heroSlider).slick({
				infinite: true,
				slidesToShow: 1,
				autoplay: true,
				autoplaySpeed: 4000,
				slidesToScroll: 1,
				fade: true,
				arrows: false,
				dots: true,
				appendDots: jQuery('.hero .dots'),
		});
	}
});


// Glass slider
document.addEventListener('DOMContentLoaded', function() {
	var glassSlider = document.querySelector('.glass-slider');
	if (glassSlider) {
			// Convert the element to a jQuery object to use Slick
			var $glassSlider = jQuery(glassSlider);
			$glassSlider.slick({
					infinite: true,
					slidesToShow: 4,
					slidesToScroll: 1,
					arrows: true,
					dots: false,
					appendArrows: $glassSlider.parents('.related-sytems').find('.slider-arrows'),
					prevArrow: '<svg class="slick-prev text-accent hover:text-gray" xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none"><circle cx="21.4044" cy="21.4044" r="21.4044" transform="matrix(-1 0 0 1 42.8086 0)" fill="currentColor"/><path d="M13.2315 21.793L20.7315 17.4628L20.7315 26.1231L13.2315 21.793ZM30.355 22.543L19.9815 22.543L19.9815 21.043L30.355 21.043L30.355 22.543Z" fill="black"/></svg>',
					nextArrow: '<svg class="slick-next text-accent hover:text-gray" xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none"><circle cx="21.4044" cy="21.4044" r="21.4044" fill="currentColor"/><path d="M29.5766 21.793L22.0766 17.4628L22.0766 26.1231L29.5766 21.793ZM12.4531 22.543L22.8266 22.543L22.8266 21.043L12.4531 21.043L12.4531 22.543Z" fill="black"/></svg>',
					responsive: [
							{
									breakpoint: 1024,
									settings: {
											slidesToShow: 3,
									}
							},
							{
									breakpoint: 768,
									settings: {
											slidesToShow: 2,
									}
							}
					]
			});
	}
});


// Related Projects slider
document.addEventListener('DOMContentLoaded', function() {
	var glassSlider = document.querySelector('.projects-slider');
	if (glassSlider) {
			// Convert the element to a jQuery object to use Slick
			var $glassSlider = jQuery(glassSlider);
			$glassSlider.slick({
					infinite: true,
					slidesToShow: 2,
					slidesToScroll: 1,
					arrows: true,
					dots: false,
					appendArrows: $glassSlider.parents('.related-projects').find('.slider-arrows'),
					prevArrow: '<svg class="slick-prev text-accent hover:text-gray" xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none"><circle cx="21.4044" cy="21.4044" r="21.4044" transform="matrix(-1 0 0 1 42.8086 0)" fill="currentColor"/><path d="M13.2315 21.793L20.7315 17.4628L20.7315 26.1231L13.2315 21.793ZM30.355 22.543L19.9815 22.543L19.9815 21.043L30.355 21.043L30.355 22.543Z" fill="black"/></svg>',
					nextArrow: '<svg class="slick-next text-accent hover:text-gray" xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none"><circle cx="21.4044" cy="21.4044" r="21.4044" fill="currentColor"/><path d="M29.5766 21.793L22.0766 17.4628L22.0766 26.1231L29.5766 21.793ZM12.4531 22.543L22.8266 22.543L22.8266 21.043L12.4531 21.043L12.4531 22.543Z" fill="black"/></svg>',
					responsive: [
							{
									breakpoint: 768,
									settings: {
											slidesToShow: 1,
									}
							}
					]
			});
	}
});

// Video popup
// Function to handle click on elements with class "vpop"
function handleVideoPopupClick(event) {
	event.preventDefault();

	// Show video popup elements
	document.getElementById("video-popup-overlay").style.display = "block";
	document.getElementById("video-popup-iframe-container").style.display = "block";
	document.getElementById("video-popup-container").style.display = "block";
	document.getElementById("video-popup-close").style.display = "block";

	// Get data attributes
	var srchref = "";
	var autoplay = "";
	var id = this.getAttribute("data-id");

	if (this.getAttribute("data-type") == "vimeo") {
			srchref = "//player.vimeo.com/video/";
	} else if (this.getAttribute("data-type") == "youtube") {
			srchref = "https://www.youtube.com/embed/";
	}

	if (this.getAttribute("data-autoplay") == "true") {
			autoplay = "?autoplay=1";
	}

	// Set the src attribute of the video popup iframe
	document.getElementById("video-popup-iframe").src = srchref + id + autoplay;

	// Attach load event to the video popup iframe
	document.getElementById("video-popup-iframe").addEventListener("load", function() {
			document.getElementById("video-popup-container").style.display = "block";
	});
}

// Attach click event to elements with class "vpop"
var vpopElements = document.querySelectorAll(".vpop");
vpopElements.forEach(function(element) {
	element.addEventListener("click", handleVideoPopupClick);
});

// Function to handle click on close button and overlay
function closeVideoPopup() {
	// Hide video popup elements
	document.getElementById("video-popup-iframe-container").style.display = "none";
	document.getElementById("video-popup-container").style.display = "none";
	document.getElementById("video-popup-close").style.display = "none";
	document.getElementById("video-popup-overlay").style.display = "none";

	// Clear the src attribute of the video popup iframe
	document.getElementById("video-popup-iframe").src = "";
}

// Attach click event to close button and overlay
document.getElementById("video-popup-close").addEventListener("click", closeVideoPopup);
document.getElementById("video-popup-overlay").addEventListener("click", closeVideoPopup);

