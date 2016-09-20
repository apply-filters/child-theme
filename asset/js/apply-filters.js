(function($) {
	var resize_timer;
	var menu_toggled = false;
	var menu_state = 'closed';

	function resize_window() {
		var window_width = $(window).width();
		if ( window_width < 970 && false == menu_toggled ) {
			if ( 'closed' == menu_state ) {
				$('#nav').hide();
			}
			menu_toggled = true;
		} else if ( window_width >= 970 && true == menu_toggled ) {
			$('#nav').show();
			menu_toggled = false;
		}
	};

	$(window).resize(function() {
		clearTimeout(resize_timer);
		resize_timer = setTimeout(resize_window, 100);
	});

	$(document).ready(function() {
		$.stellar(); // call Stellar.js
		resize_window();
		$('.gallery-item .image_cont a').attr('data-lightbox', 'lightbox');

		$('.open-menu').toggle(function() {
			$('#nav').stop().height('auto').slideDown(500);
			menu_state = 'opened';
		}, function(){
			$('#nav').stop().slideUp(500);
			menu_state = 'closed';
		});
	});

	/* Loading */
	$(window).load(function($) {
		jQuery('#loading_bg').fadeOut('slow');
	});

	/* Resize Navigation Bar */
	$(document).on('scroll',function() {
		if ( $(document).scrollTop() > 100 ) { 
			$('.above.large_nav').removeClass('large_nav').addClass('small_nav');
		} else {
			$('.above.small_nav').removeClass('small_nav').addClass('large_nav');
		}
	});

})(jQuery);