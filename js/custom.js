/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {


	jQuery("#wpcf7-f153-o1 .wpcf7-form").validationEngine( 'attach', {
		scroll: false,
		promptPosition: "topRight:-90",
		maxErrorsPerField: 1
	} );

	jQuery('.home-slides').bxSlider({
		auto: true,
		controls: false,
		autoControls: true,
		stopAutoOnClick:false,
		pager: true,
	});

	var windowWidth = jQuery(window).width();
	var clientsTestimonialsSettings = {
		auto: true,
		autoControls: true,
		stopAutoOnClick:false,
		pager: false,
		mode: 'fade'
	};
	var clientsTestimonialsSlider = jQuery('.clients-testimonials').bxSlider(clientsTestimonialsSettings);
	var clientsLogosSettings = {
		minSlides: 6,
		maxSlides: 6,
		moveSlides: 1,
		slideWidth: 240,
		pager: false,
		controls: false,
		auto: true,
		slideMargin: 10
	};
	var clientsLogosSlider = jQuery('.clients-logos').bxSlider(clientsLogosSettings);

	var ourWorksSettings = {
		minSlides: 2,
		maxSlides: 2,
		moveSlides: 1,
		slideWidth: '450px',
		pager: true,
		controls: false,
		auto: true,
		slideMargin: 6
	};


	var ourServicesSettings = {
		minSlides: 2,
		maxSlides: 2,
		moveSlides: 1,
		slideWidth: '450px',
		pager: true,
		controls: false,
		auto: true,
	};

	var ourWorksSlider = null;
	var ourServicesSlider = null;

	function performSliderOptions() {
		windowWidth = jQuery(window).width();
		if(windowWidth < 991) {
			clientsLogosSettings.minSlides = 2;
			clientsLogosSettings.maxSlides = 2;
			clientsLogosSlider.reloadSlider();
			if( ourWorksSlider == null ) {
				ourWorksSlider = jQuery('.our-works').bxSlider(ourWorksSettings);
			} else {
				ourWorksSlider.reloadSlider();
			}
			if( ourServicesSlider == null ) {
				ourServicesSlider = jQuery('.our-services').bxSlider(ourServicesSettings);
			} else {
				ourServicesSlider.reloadSlider();
			}

		}
		else {
			clientsLogosSettings.minSlides = 6;
			clientsLogosSettings.maxSlides = 6;
			clientsLogosSlider.reloadSlider();
			if(ourWorksSlider){
				ourWorksSlider.destroySlider();
				ourWorksSlider = null;
			}
			if(ourServicesSlider){
				ourServicesSlider.destroySlider();
				ourWorksSlider = null;
			}

		}
	}

	jQuery(".home-slides .home-slide a").click(function(){
		var dataHref = jQuery(this).data('href');
		window.location.href = dataHref;
	});

	if( jQuery(window).width() < 991 ) {
		jQuery(".our-works .our-work .hover").click(function(){
			var dataHref = jQuery(this).data('href');
			window.location.href = dataHref;
		});
	}

	performSliderOptions();
	jQuery(window).resize(function() {
		performSliderOptions();
		if(windowWidth < 991) {
			if(jQuery('body').hasClass('page-id-206')) {
				jQuery('body').css('opacity',0);
				location.reload();
			}
		} else {
			if(jQuery('body').hasClass('page-id-206')) {
				jQuery('body').css('opacity',0);
				location.reload();
			}
		}
	});

	jQuery(".nav-bar-toggle").on('click', function(event){
		jQuery('.mobile-menu').slideToggle();
	});


	jQuery( document ).ready(function() {
		var back_to_button_btn = jQuery('.back-to-button a');
		windowWidth = jQuery(window).width();
		jQuery(window).scroll(function() {
			if (jQuery(window).scrollTop() > 300) {
				back_to_button_btn.addClass('show');
				if(windowWidth < 991) {
					jQuery('#masthead').addClass('sticky');
				} else {
					jQuery('#masthead').removeClass('sticky');
				}
			} else {
				back_to_button_btn.removeClass('show');
				jQuery('#masthead').removeClass('sticky');
			}
		});

		back_to_button_btn.on('click', function(e) {
			e.preventDefault();
			jQuery('html, body').animate({scrollTop:0}, '300');
		});

	});

}() );

