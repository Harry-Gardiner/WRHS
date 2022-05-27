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
		if (this.href.includes(`${activePage}`)) {
			$(this).addClass("active");
		}
	});
});
