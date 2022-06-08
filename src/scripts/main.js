/*
 * Main JS file
 *
 * Jquery bound to doc, so $ can be used.
 */
jQuery(document).ready(function ($) {
	/*
	 * Mobile Navigation - show/hide menu
	 */
	$(".checkbox").on("click", function () {
		if ($(this).is(":checked")) {
			$("#mobile-menu").css("transform", "translate(0)");
			$("body").css("overflow", "hidden");
		} else {
			$("#mobile-menu").css("transform", "translate(-150%)");
			$("body").css("overflow", "auto");
		}
	});

	/*
	 * Navigation - active class
	 */
	const activePage = $(location).attr("href");
	const navItems = $(".menu-item a");
	navItems.each(function () {
		if (this.href === activePage) {
			$(this).addClass("active");
		}
	});

	/*
	 * Video resize
	 */
	// Find all YouTube videos
	// Expand that selector for Vimeo and whatever else
	var $allVideos = $("iframe[src^='//www.youtube.com']"),
		// The element that is fluid width
		$fluidEl = $("body");

	// Figure out and save aspect ratio for each video
	$allVideos.each(function () {
		$(this)
			.data("aspectRatio", this.height / this.width)

			// and remove the hard coded width/height
			.removeAttr("height")
			.removeAttr("width");
	});

	// When the window is resized
	$(window)
		.resize(function () {
			var newWidth = $fluidEl.width();

			// Resize all videos according to their own aspect ratio
			$allVideos.each(function () {
				var $el = $(this);
				$el.width(newWidth).height(newWidth * $el.data("aspectRatio"));
			});

			// Kick off one resize to fix all videos on page load
		})
		.resize();
});
