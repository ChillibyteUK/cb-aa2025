// Add your custom JS here.

/**
 * hide navigation
 **/

document.addEventListener('DOMContentLoaded', function() {
  var mainNav = document.querySelector('header');
  var lastScrollTop = 0;
  var threshold = 85; // Minimum scroll distance before toggling

  window.addEventListener('scroll', function() {
      var scrollTop = window.scrollY || document.documentElement.scrollTop;

      // Prevent negative scrollTop (elastic scroll) from causing issues
      if (scrollTop < 0) {
          scrollTop = 0;
      }

      // Check if scrolled by at least 85px before applying the class change
      if (Math.abs(scrollTop - lastScrollTop) >= threshold) {
          if (scrollTop > lastScrollTop) {
              // Scrolling down
              mainNav.classList.add('hidden');
          } else {
              // Scrolling up
              mainNav.classList.remove('hidden');
          }

          lastScrollTop = scrollTop; // Update the last scroll position
      }
  });
});

document.addEventListener('DOMContentLoaded', function() {
	const triggers = document.querySelectorAll('.mega-trigger');
	const panels = document.querySelectorAll('.mega-panel');

	triggers.forEach(trigger => {
		trigger.addEventListener('click', function(e) {
		e.preventDefault();
		const targetId = this.getAttribute('data-mega-target');
		const targetPanel = document.getElementById(targetId);

		// Hide all panels
		panels.forEach(panel => panel.style.display = 'none');

		// Show the target panel
		if (targetPanel) {
			targetPanel.style.display = 'block';
		}
		});
	});

	// Optional: Hide mega menu when clicking outside
	document.addEventListener('click', function(e) {
		if (!e.target.closest('.mega-wrapper') && !e.target.closest('.mega-trigger')) {
		panels.forEach(panel => panel.style.display = 'none');
		}
	});
});

window.addEventListener("load", function () {
  AOS.init({
    duration: 2000,
    once: true,
  });
});
