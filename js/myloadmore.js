jQuery(document).ready(function () {

	var buscando = false;

	jQuery('.misha_loadmore').click(function () {
		var button = jQuery(this),
			data = {
				'action': 'loadmore',
				'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
				'page': misha_loadmore_params.current_page
			};
		jQuery.ajax({
			url: misha_loadmore_params.ajaxurl, // AJAX handler
			data: data,
			type: 'POST',
			beforeSend: function (xhr) {
				button.text('Carregando...'); // change the button text, you can also add a preloader image
			},
			success: function (data) {
				console.log(data);
				if (data) {
					button.text('Mostrar mais').prev().after(data); // insert new posts
					misha_loadmore_params.current_page++;

					if (misha_loadmore_params.current_page == misha_loadmore_params.max_page)
						button.remove(); // if last page, remove the button
				} else {
					button.remove(); // if no data, remove the button as well
				}
			},
			fail: function (data) {
				console.error('Erro ao procurar');
			}
		});
	});



	/* cminetti si es mobile No hacemos la animacion */
	if (!jQuery.browser.mobile) {

	};


	/*cminetti Head animatioon change JQuery code below*/

	jQuery(document).on('scroll', function () {
		if (!buscando) {
			if (jQuery(this).scrollTop() > 1) {
				jQuery('#wrapper-navbar').addClass('stivky');
				jQuery('.search-toggle').removeClass('open');
				jQuery('.wrapper-search').css({ "top": -148 }).find('.search-input').focusout();
			}
			else {
				jQuery('#wrapper-navbar').removeClass('stivky');
			}
		}
		buscando = false;
	});

	// detect page first load
	var isMobile = window.matchMedia("only screen and (max-width: 768px)");
	if (isMobile.matches) {
		jQuery('nav').addClass('is-mobile');
	}

	// detectamos el ancho de la pantalla para detectar el mobile
	//   jQuery( window ).resize(function() {
	//   	var width = jQuery( window ).width();
	//   	// ocultamos wrapper-search por si se encontrara abierto
	//   	if (jQuery('.search-toggle').hasClass('open')) {
	//   		jQuery('.search-toggle').removeClass('open');
	//   		jQuery('.wrapper-search').css({ "top": -148 }).find('.search-input');
	//   	}
	//   	// opciones para cuando pasa de desktop a mobile
	//     if (width < 768) {
	// 	  	// mostramos icono de busqueda
	// 			if (jQuery('.search').css('display') == 'block') {
	// 	  		jQuery('nav .search').fadeOut(10);
	// 	  	}
	//     	jQuery('nav').addClass('is-mobile');
	//     } else {
	// 	  	// mostramos icono de busqueda
	// 			if (jQuery('.search').css('display') == 'none') {
	// 	  		jQuery('nav .search').fadeIn('fast');
	// 	  	}
	//     	jQuery('nav').removeClass('is-mobile');
	//     }
	//   });

	// abrir caja de busqueda 
	jQuery('.search-toggle').click(function () {
		if (jQuery(this).hasClass('open')) {
			// asigne el valor -150 arbitrariamente ya que no formaba bien el valor negativo
			jQuery('.wrapper-search').css({ "top": -148 }).find('.search-input');
			jQuery(this).removeClass('open');
		} else {
			buscando = true;
			// detectar si estamos en la vista mobile
			if (jQuery('nav').hasClass('is-mobile')) {
				jQuery('nav .search').fadeOut('fast');
				jQuery('#navbarNavDropdown').removeClass('show');
				jQuery('.navbar-toggler').addClass('collapsed');
			}
			// posicionamiento de caja de busqueda "wrapper-search"
			if (jQuery('#wrapper-navbar').hasClass('stivky') && !jQuery('.navbar-plot').hasClass('is-mobile')) {
				// var navbar_height = Math.abs(parseInt(jQuery('.navbar-plot').css("height"))); //toma la altura de la navbar stivky, es incorrecto
				var navbar_height = Math.abs(parseInt(jQuery('.navbar-brand img').css("height"))); //toma la altura del logo, para colocar la caja de busqueda debajo
				jQuery('.wrapper-search').css({ "top": navbar_height }).find('.search-input').focus();
				jQuery(this).addClass('open');
				// console.log('ACA: ' + navbar_height);
			} else if (jQuery('.navbar-plot').hasClass('is-mobile')) {
				var navbar_height = 110;
				// console.log(navbar_height);
				jQuery('.wrapper-search').css({ "top": navbar_height }).find('.search-input').focus();
				jQuery(this).addClass('open');
			} else {
				var navbar_height = 106;
				// console.log(navbar_height);
				jQuery('.wrapper-search').css({ "top": navbar_height }).find('.search-input').focus();
				jQuery(this).addClass('open');
			}
		}
	});

	// control boton de busqueda para vista mobile
	jQuery('.navbar-toggler').click(function () {
		if (jQuery('.search').css('display') == 'none') {
			jQuery('nav .search').fadeIn('fast');
		} else {
			jQuery('nav .search').fadeOut('fast');
		}
	});

});