(function($, undefined) {
$(function() {

// Settings
var mobileScreenWidth = {
	min: 320,
	max: 480
};
var sizes = {
	standard: {
		width: 600,
		height: 600
	},
	mobile: {
		width: 260,
		height: 400
	}
};
var atStandardSize = true;

// Cached elements
var $window = $(window);
var $calendar = $('#google-calendar');

// Resizes the calendar based on the current window width.
function resizeCalendar(calendar, windowWidth) {
	if (windowWidth <= mobileScreenWidth.max) {
		// Fit to a mobile screen width
		var width = sizes.mobile.width + (windowWidth - mobileScreenWidth.min);
		calendar.attr({
			width: width,
			height: sizes.mobile.height
		});
		atStandardSize = false;
	} else if (!atStandardSize) {
		// Return to the standard size
		calendar.attr(sizes.standard);
		atStandardSize = true;
	}
}

// Resize the calendar whenever the window's size changes.
$window.on('resize', function() {
	resizeCalendar($calendar, $window.width());
});

// Resize once on page load, in case the window is never again resized.
resizeCalendar($calendar, $window.width());

});
}(jQuery));
