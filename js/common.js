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
			$('header').addClass("fixed");
		} else {
			$('header').removeClass("fixed");
		};
	});

	$(".head a").click(function(e) {
		e.preventDefault();
		var position = $($(this).attr("href")).offset().top;
		$("body, html").animate({
			scrollTop: position
		}, 'slow', 'swing' );
	});
	
	//sticky popular
	$(window).scroll(function() {
		if($(document).scrollTop() > $('.left').offset().top && $(document).scrollTop() < $('.footer').offset().top) {
			$('.sticky').addClass("fixed");
		} else{
			$('.sticky').removeClass("fixed");
		}

		if($(document).scrollTop() > $('.left').offset().top && $(document).scrollTop() < $('.footer').offset().top) {
			$('.single-card .head').addClass("fixed");
		} else{
			$('.single-card .head').removeClass("fixed");
		}
	});

	$('.owl-slide').owlCarousel({
		loop: true,
		smartSpeed: 1700,
		autoplay: true,
		//autoHeight: true,
		autoplayTimeout: 5000,
		navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		nav: true,
		dots: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1,
			},
			767: {
				items: 1,
			},
			1200: {
				items: 1,
			}
		}
	});

	//tabs
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});

	$(".single img").each(function() {
      var src = $(this).attr('src');
      var a = $('<a/>').attr('href', src);
      $(this).wrap(a);
    });

	$(".gallery, .wp-caption").each(function() {
		$(this).magnificPopup({
			delegate: 'a',
			mainClass: 'mfp-zoom-in',
			type: 'image',
			tLoading: '',
			gallery:{
				enabled: true,
			},
			removalDelay: 300,
			callbacks: {
				beforeChange: function() {
					this.items[0].src = this.items[0].src + '?=' + Math.random(); 
				},
				open: function() {
					$.magnificPopup.instance.next = function() {
						var self = this;
						self.wrap.removeClass('mfp-image-loaded');
						setTimeout(function() { $.magnificPopup.proto.next.call(self); }, 120);
					}
					$.magnificPopup.instance.prev = function() {
						var self = this;
						self.wrap.removeClass('mfp-image-loaded');
						setTimeout(function() { $.magnificPopup.proto.prev.call(self); }, 120);
					}
				},
				imageLoadComplete: function() { 
					var self = this;
					setTimeout(function() { self.wrap.addClass('mfp-image-loaded'); }, 16);
				}
			}
		});
	});

	$("img[usemap]").mapster({
		scaleMap: true,
		fill: true,
		fillColor: "fc982f",
		fillOpacity: .75,
		fade: true,
		fadeDuration: 450,
		stroke: true,
		strokeColor: "e31d1a"
	});
	$("area").mouseover(function() {
		$(this).parent().addClass('active');
	}).mouseout(function() {
		$(this).parent().removeClass('active');
	});
	// $(".tiptext").mouseover(function() {
	// 	$(this).children(".description").show();
	// }).mouseout(function() {
	// 	$(this).children(".description").hide();
	// });

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
