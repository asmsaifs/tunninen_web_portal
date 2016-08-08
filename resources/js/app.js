$(document).ready(function() {
  	var num = 10; //number of pixels before modifying styles

	$(window).bind('scroll', function () {
		if ($(window).scrollTop() > num) {
			$('.navbar-default').addClass('affix-top');
		} else {
			$('.navbar-default').removeClass('affix-top');
		}
	})

});