// Kaas.homeStyles = '.home-main-images > div { opacity: 0; }';
// Kaas.preloadStyle.init(Kaas.homeStyles);

var $ = jQuery,
	_w = $(window),
	_d = $(document),
	_b,
	main,
	// slide,
	minHeight = 750,

	setHeight = function() {
		var wh = _w.height();
		if (_w.width() < bs3breakpoints.xs) {
			return wh;
		} else if (wh > minHeight) {
			return wh;
		} else {
			return minHeight;
		}
	},
	setWidthEven = function(selector) {
		var t = $(selector);
		t.width('auto');
		if (t.width() % 2 == 1) {
			t.width(t.width() - 1);
		}
	};

jQuery(function($) {
	_b = $('body');
	setWidthEven('.grid-container');
	// main = $('.home-main-container').eq(0);
	// main.height(setHeight());
	// slide = $('#slide1').hide();
});


_w.on('load', function(e) {
	_b.addClass('body-loaded');
	
	$('.box-item').matchHeight();
	$('.height-faq').matchHeight();
	$('.height-category').matchHeight();
	$('.height-achievements').matchHeight();

	vgridInit({
		container: '.grid-container'
	});

	lightboxInit({
		container: '.lightbox'
	});

	// slide.show().slick({
	// 	arrows: false,
	// 	autoplay: true,
	// 	autoplaySpeed: 6000,
	// 	speed: 1000,
	// 	// speed: 4000,
	// 	fade: true,
	// 	pauseOnFocus: false,
	// 	pauseOnHover: false
	// });

});


var _timer = 0;

_w.resize(function(e) {
	if (_timer > 0) {
		clearTimeout(_timer);
	}

	setWidthEven('.grid-container');

	_timer = setTimeout(function () {
		$('.box-item').matchHeight();
		$('.height-faq').matchHeight();
		$('.height-achievements').matchHeight();
		$('.height-achievements').matchHeight();
		// main.height(setHeight());
	}, 200);
});
