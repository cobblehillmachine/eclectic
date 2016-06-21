$( window ).load(function() {
	squareMaker($('.press-post'));
	squareMaker($('#map-canvas'));
	masonryLightbox();
	homePageSlider();
	shopPageSlider();
	shopThePostSlider();
	squareMaker($('.circle-wrapper'))
	if ($('.sidebar .instagram').length > 0) {
		instagramFeed();
	}
	if ($('.home.page #instafeed').length > 0) {
		homepageInstagramFeed();
	}
	mobileBlogNav();
	mobileCommentSection();
	blogImages();
	masonry();
	productGallery();
	if ($(window).width() > 930) {
		divEqualizer($('.services .service'));
		divEqualizer($('.products li'));
		desktopProductThumbnailSlider();
		blogWidth();
		splashCookie();
	} else {
		mobileProductThumbnailSlider();
		mobileShopNav();
	mobileShopSubnav();

	}
	singleProductPage();
	vintageSold();
	if ($('.products li').length < 12) {
		$('.products .button').hide();
	}
	$('.splash-signup .close').click(function(){
		$('.splash-signup').fadeOut();
		$('body').css({'overflow-y':'auto'});
	});
	
})

google.maps.event.addDomListener(window, 'load', mapInitialize);

$(window).resize(function() {
	if ($(window).width() > 930) {
		divEqualizer($('.services .service'));
		divEqualizer($('.products li'));
		blogWidth();
// 		splashCookie();
	} else {
		$('.blog.offset-cont .main-cont').css('width', '100%')
		
	}
	squareMaker($('.press-post'))
	squareMaker($('#map-canvas'))
	mapInitialize();
})

function divEqualizer(divSelector) {
	var maxHeight = 0;
	divSelector.each(function(){
   		if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
	});
	divSelector.height(maxHeight);
}

function squareMaker(selector) {
	var width = selector.width();
	selector.css('height', width);
	if ($(window).width() > 1150) {
		$('.contact.offset-cont .side-cont').css('height', width);
	}
}

function masonry() {
	$('.masonry').imagesLoaded(function() {
		$('.masonry').fadeIn();
		$('.masonry').masonry({
			columnWidth: '.grid-sizer',
	 		itemSelector: '.masonry-object',
	 		gutter:'.gutter-sizer'
		})

	})
	}

function masonryLightbox() {
	$(".fancybox").fancybox({
		'padding': 0,
		'margin': 75,
		'overlayShow': true,
		'showNavArrows': true,
		helpers : { 
   			overlay: {
		         css: { 'background': 'rgba(255, 255, 255, 0.75)' }
		    }
  		}
	});
}

function homePageSlider() {
	var raw_slider = $(".flexslider").html();
	$(".flexslider.homepage").remove();
	$("<div class='flexslider homepage'></div>").insertAfter($(".border-left"))
    $(".flexslider.homepage").html(raw_slider);
    if ($(window).width() > 930) {
    	$('.flexslider.homepage').flexslider({
			'slideshow':true,
			'animation': 'fade',
			'slideshowSpeed': 3000,
			'controlNav': true,
			'directionNav':false,
			'smoothHeight':true,
			'start': function() {
				// if ($(window).width() > 930) {
				// 	var height = $('.flexslider').height();
				// 	$('.inner-border').css('height', height);
				// 	$('.flex-control-nav').insertBefore($('.header-image.full-width'));
				// }
			}
		})
    } else {
    	$('.flexslider.homepage').flexslider({
			'slideshow':true,
			'animation': 'fade',
			'slideshowSpeed': 3000,
			'controlNav': true,
			'directionNav':false,
			'smoothHeight':true
		})
    }
	
}


function desktopProductThumbnailSlider() {
	$('#carousel').flexslider({
        controlNav: false,
        animationLoop: false,
        animation: 'slide',
        slideshow: false,
        prevText: '',
        nextText: '',
        itemWidth: 110,
        itemMargin: 20,
        directionNav: false,
        asNavFor: '#slider'
      });
      $('#slider').flexslider({
        animation:'fade',
        startAt: 0,
        direction:'horizontal',
        prevText: '',
        nextText: '',
        slideshow: false,
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        sync: '#carousel'
      });
      $('#carousel .flex-viewport').css('overflow', 'visible');
	  $('#carousel .slides').css('width', $('#carousel .slides li').length * 130);
      $('#carousel .slides').css("margin", "0 auto");
}

function mobileProductThumbnailSlider() {
	$('#carousel').flexslider({
        controlNav: false,
        animationLoop: false,
        animation: 'slide',
        slideshow: false,
        prevText: '',
        nextText: '',
        itemWidth: 60,
        itemMargin: 20,
        directionNav: false,
        asNavFor: '#slider'
      });
      $('#slider').flexslider({
        animation:'fade',
        startAt: 0,
        direction:'horizontal',
        prevText: '',
        nextText: '',
        slideshow: false,
        controlNav: false,
        directionNav: false,
        animationLoop: false,
        sync: '#carousel'
      });
      $('#carousel .flex-viewport').css('overflow', 'visible');
	  $('#carousel .slides').css('width', $('#carousel .slides li').length * 80);
      $('#carousel .slides').css("margin", "0 auto");
}

function shopPageSlider() {
	$('.shop-page.header').flexslider({
		'slideshow' : true,
		'directionNav': false
	})
}

function shopThePostSlider() {
	if ($(window).width() > 700) {
		number = 3;
	} else {
		number = 2;
	}
	$('.shop-the-post .flexslider').flexslider({
		controlNav: false,
        animationLoop: true,
        animation: 'slide',
        slideshow: false,
        prevText: '',
        nextText: '',
        itemWidth: 210,
	    itemMargin: 5,
	    minItems: number,
	    maxItems: number,
        directionNav: true
	})
}


function mapInitialize() {
	var myOptions = {
	    zoom: 15,
	    scaleControl: false,
		scrollwheel: false,
		zoomControl: false,
		panControl:false,
		streetViewControl: false,
		mapTypeControl:false,
	    center: new google.maps.LatLng(32.780274, -79.935241),
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    styles: [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2e5d4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]}]
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);
	var image = new google.maps.MarkerImage('/wp-content/themes/eclectic/assets/images/map-pin.png');
	var marker = new google.maps.Marker({
		position: map.getCenter(),
		map: map,
		icon: image,
		labelClass: 'pin'
	});
}

function singleProductPage() {
	$('#tab-description').insertBefore($('.price'));
}

function mobileBlogNav() {
	$('.toolbar.mobile.blog .mobile-nav-header').on('click', function(e) {
		e.preventDefault();
		$('.toolbar.mobile.blog ul').slideToggle();
	})
}

function mobileShopNav() {
	$('.toolbar.shop .mobile-nav-header').on('click', function(e) {
		e.preventDefault();
		$('ul.shop-menu').slideToggle();
	})
}

function mobileShopSubnav() {
	$('.toolbar.shop ul.shop-menu li .topcategory').on('click', function(e) {
		e.preventDefault();
		$(this).next($('ul.sub-menu')).slideToggle();
/*
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
		} else {
			$(this).addClass('active');
		}
*/
	})
}


function sliderHeight() {
	$('.homepage.flexslider .slides img').each(function() {
		var imgH = $(this).height();
		// var imgW = $(this).width();
		$('.flexslider.homepage .slides .slider-text').delay(500).css({'height': imgH});
	});

	
}

function mobileCommentSection() {
	$('.add-a-comment').on('click', function() {
		$('.form-wrapper.comment').slideToggle();
	})
	$('.view-comments').on('click',function() {
		$('.comments').slideToggle();
	})
}

function instagramFeed() {
	 var feed = new Instafeed({
        accessToken: '6883815.4b07bb4.baaad29afc03420ea966f3b04e282984',
        clientId: '4b07bb475d01479b94a6ee3c1e84b768',
        get: 'user',
        userId: 6883815,
        sortBy: 'most-recent',
        limit: 8,
        resolution: 'thumbnail'

    });
    feed.run();
}

function homepageInstagramFeed() {
	 var feed = new Instafeed({
        accessToken: '6883815.4b07bb4.baaad29afc03420ea966f3b04e282984',
        clientId: '4b07bb475d01479b94a6ee3c1e84b768',
        get: 'user',
        userId: 6883815,
        sortBy: 'most-recent',
        limit: 6,
        resolution: 'low_resolution'

    });
    feed.run();
}

function productGallery() {
	$(".thumbnails a img").on('click', function(e) {
		e.preventDefault();
		$('.woocommerce-main-image img').attr('src',$(this).attr('src'));
		pinterestLink();
	})
	$('.product-type-variable .images img').on('load',function() {
		pinterestLink();		
	})
}

 function pinterestLink() {
	var permalink = window.location.href;
	var image = $('.woocommerce-main-image img').attr('src');
	var title = document.title;
	$('.social a.pinterest').attr('href', 'https://pinterest.com/pin/create/button/?url=' + permalink + '&media=' + image + '&description=' + title);
 }
 
 function blogWidth() {
	 var width = $('.blog.offset-cont').width();
	 $('.blog.offset-cont .main-cont').css('width', width-325);
 }


function blogImages() {
	$('.blog p').has('img').css('text-align', 'center')

}

function vintageSold() {
	$('.product-cat-vintage.outofstock .price span').text("SOLD");
}

function splashCookie() {
	var COOKIE_NAME = 'home-page-cookie';
	$go = $.cookie(COOKIE_NAME);
	if ($go == null) {
		$.cookie(COOKIE_NAME, 'test', { path: '/', expires: 6 });
		$('.splash-signup').fadeIn();
// 		$('body').css({'overflow-y':'hidden'});
	}
	else {
		$('.splash-signup').hide();
	}
}

$( document ).on( 'click', '.plus, .minus', function() {
    var $qty        = $( this ).closest( '.quantity' ).find( '.qty' ),
        currentVal  = parseFloat( $qty.val() ),
        max         = parseFloat( $qty.attr( 'max' ) ),
        min         = parseFloat( $qty.attr( 'min' ) ),
        step        = $qty.attr( 'step' );
    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
    if ( max === '' || max === 'NaN' ) max = '';
    if ( min === '' || min === 'NaN' ) min = 0;
    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;
    if ( $( this ).is( '.plus' ) ) {
        if ( max && ( max == currentVal || currentVal > max ) ) {
            $qty.val( max );
        } else {
            $qty.val( currentVal + parseFloat( step ) );
        }
    } else {
        if ( min && ( min == currentVal || currentVal < min ) ) {
            $qty.val( min );
        } else if ( currentVal > 0 ) {
            $qty.val( currentVal - parseFloat( step ) );
        }
    }
    $qty.trigger( 'change' );
});

