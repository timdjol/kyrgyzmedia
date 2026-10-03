$(function() {
	//menu
	$(".toggle-mnu").click(function() {
		$(this).toggleClass("on");
		$(this).parent().find("ul").slideToggle();
		return false;
	});

	//fixed menu
	$(window).scroll(function() {
		if ($(this).scrollTop() > 110) {
			$('nav').addClass("fixed");
		} else {
			$('nav').removeClass("fixed");
		};
	});
	
	//sticky popular
	$(window).scroll(function() {
		if($(document).scrollTop() > $('.left').offset().top && $(document).scrollTop() < $('.footer').offset().top) {
			$('.sticky').addClass("fixed");
		} else{
			$('.sticky').removeClass("fixed");
		}
	});

  //button up
	$('.top').click(function() {
		$('html, body').stop().animate({scrollTop: 0}, 'slow', 'swing');
	});
	$(window).scroll(function() {
		if ($(this).scrollTop() > $(window).height()) {
			$('.top').addClass("active");
		} else {
			$('.top').removeClass("active");
		};
	});
});
