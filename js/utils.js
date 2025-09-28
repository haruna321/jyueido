/**
 * クエリ取得
 */
function getQueryString() {
	var result = {};
	if ( 1 < window.location.search.length ) {
			// 最初の1文字 (?記号) を除いた文字列を取得する
		var query = window.location.search.substring( 1 ),
			// クエリの区切り記号 (&) で文字列を配列に分割する
			parameters = query.split( '&' ),
			i = 0,
			l = parameters.length,
			element,
			paramName,
			paramValue;

		for ( ; i < l; i++ ) {
			// パラメータ名とパラメータ値に分割する
			element = parameters[ i ].split( '=' );

			paramName = decodeURIComponent( element[ 0 ] );
			paramValue = decodeURIComponent( element[ 1 ] );

			// パラメータ名をキーとして連想配列に追加する
			result[ paramName ] = paramValue;
		}
	}
	return result;
}

/**
 * vgrid
 */
function vgridInit(options) {
	var gutter = options.gutter || 0;

	$(options.container).each(function(e) {
		var gridcontainer = $(this),
			col = gridcontainer.data('grid-col'),
			gut = gridcontainer.data('grid-gutter') || gutter,
			gridHeight2 = $('.grid-h-2'),
			calcWidth = function() {
				return Math.floor($(window).width() / col) * col - gut;
			},
			calcGridHeight = function(row) {
				return $('.grid-h-sizer').height() * row + gut * (row -1);
			};


		gridcontainer.width(calcWidth());

		gridcontainer.imagesLoaded().always( function( instance ) {
			gridHeight2.height(calcGridHeight(2));

			gridcontainer.vgrid({
				easing: 'easeOutQuint',
				useLoadImageEvent: true,
				time: 400,
				fadeIn: {
					time: 400,
					delay: 100
				},
				onStart: function() {
					gridcontainer.width(calcWidth());
					gridHeight2.height(calcGridHeight(2));
				},
				onFinish: function() {
					gridcontainer.width(calcWidth());
					gridHeight2.height(calcGridHeight(2));
				}
			});
		});

		$(window).resize(function(e) {
			gridcontainer.width(calcWidth());
			gridHeight2.height(calcGridHeight(2));
			gridcontainer.vgrefresh();
		});
	});
}

/**
 * slick slide
 */
function slideInit(options, slideOptions) {
	return $(options.container).each(function(e) {
		var slidecontainer = $(this);
		slidecontainer.imagesLoaded().always( function( instance ) {
			slidecontainer.slick(slideOptions);
		});
	});
}


/**
 * slick scale
 */
function slideScaleInit(options, slideOptions) {
	return $(options.container).each(function(e) {
		var classAnimate = 'home-animate-scale',
			current = 0,
			main = slideInit(options, slideOptions);


		main.on('init', function(event, slick, currentSlide, nextSlide) {
			$(this).find('.slide:eq(0) img').addClass(classAnimate);
		});

		main.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			$(this).find('.slide:eq(' + nextSlide + ') img').addClass(classAnimate);
			current = currentSlide;
		});

		main.on('afterChange', function(slick, currentSlide) {
			$(this).find('.slide:eq(' + current + ') img').removeClass(classAnimate);
		});
	});
}

/**
 * simple lightbox
 */
function lightboxInit(options) {
	$(options.container).each(function(e, i) {
		var a = $(this).find('a').filter(function() {
			return /\.(jpe?g|png|gif)$/i.test(this.href);
		});

		$(a).simpleLightbox({
			widthRatio: 1.0
			// animationSlide: false,
			// animationSpeed: 100
		});
	});
}

/**
 * Photo Swipe
 */
var initPhotoSwipeFromDOM = function(gallerySelector) {

	$('<div id="photoswipe-modal-placeholder" />').appendTo('body').load(Kaas.root() + 'photoswipe.html', function(e) {

		// parse slide data (url, title, size ...) from DOM elements 
		// (children of gallerySelector)
		var parseThumbnailElements = function(el) {
			var thumbElements = el.childNodes,
				numNodes = thumbElements.length,
				items = [],
				figureEl,
				linkEl,
				size,
				item;

			for (var i = 0; i < numNodes; i++) {

				figureEl = thumbElements[i]; // <figure> element

				// include only element nodes 
				if (figureEl.nodeType !== 1) {
					continue;
				}

				linkEl = figureEl.children[0]; // <a> element

				size = linkEl.getAttribute('data-size').split('x');

				// create slide object
				item = {
					src: linkEl.getAttribute('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10)
				};



				if (figureEl.children.length > 1) {
					// <figcaption> content
					item.title = figureEl.children[1].innerHTML;
				}

				if (linkEl.children.length > 0) {
					// <img> thumbnail element, retrieving thumbnail url
					item.msrc = linkEl.children[0].getAttribute('src');
				}

				item.el = figureEl; // save link to element for getThumbBoundsFn
				items.push(item);
			}

			return items;
		};

		// find nearest parent element
		var closest = function closest(el, fn) {
			return el && (fn(el) ? el : closest(el.parentNode, fn));
		};

		// triggers when user clicks on thumbnail
		var onThumbnailsClick = function(e) {
			e = e || window.event;
			e.preventDefault ? e.preventDefault() : e.returnValue = false;

			var eTarget = e.target || e.srcElement;

			// find root element of slide
			var clickedListItem = closest(eTarget, function(el) {
				return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
			});

			if (!clickedListItem) {
				return;
			}

			// find index of clicked item by looping through all child nodes
			// alternatively, you may define index via data- attribute
			var clickedGallery = clickedListItem.parentNode,
				childNodes = clickedListItem.parentNode.childNodes,
				numChildNodes = childNodes.length,
				nodeIndex = 0,
				index;

			for (var i = 0; i < numChildNodes; i++) {
				if (childNodes[i].nodeType !== 1) {
					continue;
				}

				if (childNodes[i] === clickedListItem) {
					index = nodeIndex;
					break;
				}
				nodeIndex++;
			}



			if (index >= 0) {
				// open PhotoSwipe if valid index found
				openPhotoSwipe(index, clickedGallery);
			}
			return false;
		};

		// parse picture index and gallery index from URL (#&pid=1&gid=2)
		var photoswipeParseHash = function() {
			var hash = window.location.hash.substring(1),
				params = {};

			if (hash.length < 5) {
				return params;
			}

			var vars = hash.split('&');
			for (var i = 0; i < vars.length; i++) {
				if (!vars[i]) {
					continue;
				}
				var pair = vars[i].split('=');
				if (pair.length < 2) {
					continue;
				}
				params[pair[0]] = pair[1];
			}

			if (params.gid) {
				params.gid = parseInt(params.gid, 10);
			}

			if (!params.hasOwnProperty('pid')) {
				return params;
			}
			params.pid = parseInt(params.pid, 10);
			return params;
		};

		var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
			var pswpElement = document.querySelectorAll('.pswp')[0],
				gallery,
				options,
				items;

			items = parseThumbnailElements(galleryElement);

			// define options (if needed)
			options = {
				index: index,
				// history: false,
				showHideOpacity: true,
				// hideAnimationDuration: 0,
				// showAnimationDuration: 0,

				// define gallery index (for URL)
				galleryUID: galleryElement.getAttribute('data-pswp-uid'),

				getThumbBoundsFn: function(index) {
					// See Options -> getThumbBoundsFn section of documentation for more info
					var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
						pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
						rect = thumbnail.getBoundingClientRect();

					return {
						x: rect.left,
						y: rect.top + pageYScroll,
						w: rect.width
					};
				}

			};

			if (disableAnimation) {
				options.showAnimationDuration = 0;
			}

			// Pass data to PhotoSwipe and initialize it
			gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
			gallery.init();

			// http://photoswipe.com/documentation/api.html
			// gallery.listen('imageLoadComplete', function(index, item) { 
			// 	index - index of a slide that was loaded
			// 	item - slide object
			// 	console.log(index, item);
			// 	var help = $('<div class="pswp-help-container" id="pswp-help-container" />').appendTo('#photoswipe-modal-placeholder').click(function(e) {
			// 		$(this).fadeOut();
			// 	});
			// });
		};

		// loop through all gallery elements and bind events
		var galleryElements = document.querySelectorAll(gallerySelector);

		for (var i = 0, l = galleryElements.length; i < l; i++) {
			galleryElements[i].setAttribute('data-pswp-uid', i + 1);
			galleryElements[i].onclick = onThumbnailsClick;
		}

		// Parse URL and open gallery if it contains #&pid=3&gid=1
		var hashData = photoswipeParseHash();
		if (hashData.pid > 0 && hashData.gid > 0) {
			openPhotoSwipe(hashData.pid - 1, galleryElements[hashData.gid - 1], true);
		}
	});
};

