jQuery(document).ready(function($) {
	
	
	// Toggle blog-menu
	$(".nav-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".mobile-menu-container").slideToggle();
	});
	
	
	// Toggle search form
	$(".search-toggle").on("click", function(){	
		$(this).toggleClass("active");
		$(".header-search-block").slideToggle();
		if ( $( this ).hasClass( 'active' ) ) {
			$(".header-search-block .search-field").focus();
		}
		return false;
	});
	
	
	// Hide mobile-menu > 1000
	$(window).resize(function() {
		if ($(window).width() > 1000) {
			$(".nav-toggle").removeClass("active");
			$(".mobile-menu-container").hide();
		}
	});
	
	
	// Hide header search block at < 1000
	$(window).resize(function() {
		if ($(window).width() < 1000) {
			$(".search-toggle").removeClass("active");
			$(".header-search-block").hide();
		}
	});
	
	
	// Smooth scroll to the top	
    $('.tothetop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });
	

	// Add focus class to dropdown menus
    $( '.main-menu a' ).on( 'blur focus', function( e ) {
		$( this ).parents( 'li.menu-item-has-children' ).toggleClass( 'focus' );
		if ( e.type == 'focus' ) $( this ).trigger( 'focus-applied' );
	} );

    
    // Resize videos after container
	var vidSelector = ".post iframe, .post object, .post video, .widget-content iframe, .widget-content object, .widget-content iframe";	
	var resizeVideo = function(sSel) {
		$( sSel ).each(function() {
			var $video = $(this),
				$container = $video.parent(),
				iTargetWidth = $container.width();

			if ( !$video.attr("data-origwidth") ) {
				$video.attr("data-origwidth", $video.attr("width"));
				$video.attr("data-origheight", $video.attr("height"));
			}

			var ratio = iTargetWidth / $video.attr("data-origwidth");

			$video.css("width", iTargetWidth + "px");
			$video.css("height", ( $video.attr("data-origheight") * ratio ) + "px");
		});
	};

	resizeVideo(vidSelector);

	$(window).resize(function() {
		resizeVideo(vidSelector);
	});
	
});