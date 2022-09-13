$.noConflict();

AOS.init({
	// anchor: '.off-canvas-container',
	disable: 'mobile'
});


(function($){
'use strict';



if( $('.navbar-toggler')[0] ){

	$('.navbar-toggler').on('click', function(){
		$('.off-canvas-wrapper').addClass('in');
	});

}








/*---------------------------------------------------------*/
/*	REPORTE
/*---------------------------------------------------------*/
if( $('.hero')[0] ){


	$('.hero .report .btn').on('click', function(){
		$('.full-report').addClass('active');
		scrollToTop();
	});

	$('.full-report .close').on('click', function(){
		$('.full-report').removeClass('active');
	});


	function scrollToTop(){
		$('body').animate({scrollTop:0},200);
	}




	$('.hero .forecast').owlCarousel({
		items: 				1,
		loop: 				true,
		smartSpeed: 	1200,
		dots: 				false,
		mouseDrag: 		false,
		animateIn: 		'fadeIn',
		animateOut: 	'fadeOut'
	});


	setTimeout(function(){
		$('.hero .forecast').trigger('refresh.owl.carousel');
	},100);


	$('.hero .owl-control a').on('click', function(e){
		e.preventDefault();
		var i = $(this).index();

		$('.hero .owl-control a').removeClass('active');
		$(this).addClass('active');

		$('.hero .forecast').trigger('to.owl.carousel', i);
	});


}//hero





if( $('.mobile')[0] ){

	$('.mobile .screens').owlCarousel({
		items: 						1,
		loop: 						true,
		smartSpeed: 			600,
		dots: 						false,
		nav: 							false,
		mouseDrag: 				false,
		autoplay: 				true,
		autoplayTimeout: 	3000,
		animateIn: 				'fadeIn',
		animateOut: 			'fadeOut'
	});

}




/*---------------------------------------------------------*/
/*	STATIONS
/*---------------------------------------------------------*/
if( $('.stations-slider')[0] ){

	$('.stations-slider').owlCarousel({
		items: 				1,
		loop: 				true,
		smartSpeed: 	600,
		mouseDrag: 		false,
		animateIn: 		'fadeIn',
		animateOut: 	'fadeOut',
		dots: 				false,
		autoplay: 					true,
		autoplayTimeout: 		4000,
		autoplayHoverPause: true,
		responsive:{
			768:{
				dots: true
			}
		}
		
	});

}





/*---------------------------------------------------------*/
/*	FORECAST
/*---------------------------------------------------------*/
if( $('.forecasts-cols .owl-carousel')[0] ){

	$('.forecasts-cols .owl-carousel').owlCarousel({
		items: 				1,
		loop: 				true,
		margin: 			30,
		smartSpeed: 	600,
		mouseDrag: 		false,
		dots: 				false,
		responsive:{
			500:{
				items: 2
			},
			768:{
				dots: true,
				items: 3
			}
		}
	});

}







/*---------------------------------------------------------*/
/*	REPORTE
/*---------------------------------------------------------*/
$.getJSON('/wp-content/themes/dmh/assets/aviso.json', function(_data){

	if( _data.numero_aviso === '' ) return;
	if( localStorage.getItem('alertaMeteorologica') === _data.numero_aviso ) return;


	var _numero_aviso = _data.numero_aviso,
			_departamentos_afectados = _data.departamentos_afectados,
			_counter = 6,

			_alert = $(`<div class="forecast-alert">
				<div class="container">
					<div class="col-center">
						<svg class="alerta"><use xlink:href="#icon-alert"></use></svg>
						<div class="h2">AVISO METEOROLÓGICO VIGENTE</div>
						<div class="locations">Para los departamentos de ${_departamentos_afectados}</div>
						<div class="actions">
							<div>
								<a href="#" class="close-alert"><svg><use xlink:href="#icon-circle-close"></use></svg></a>
							</div>
							<div>
								<a href="#" class="read-more">
									<svg><use xlink:href="#icon-circle-cloud"></use></svg>
									<span>VER<br>PRONÓSTICO</span>
								</a>
							</div>
						</div>
						<footer>
							<div class="close-alert">Este mensaje se cerrará en <span class="countdown">${_counter}</span> segundos</div>
							<button class="btn btn-link btn-sm">
								<i class="fa fa-window-close"></i> 
								<span>DEJAR DE VER ESTE MENSAJE</span>
							</button>
						</footer>
					</div>
				</div>
			</div>`),


	// COUNTDOWN
	_interval = setInterval(function(){
		_counter = _counter-1;
		_alert.find('footer .close-alert .countdown').text(_counter);
		// console.log(_counter);
		if(_counter == 0) {
			closeAlert();
			clearInterval(_interval);
		}
	}, 1000);



	_alert.find('.close-alert').on('click', function(e){
		e.preventDefault();
		closeAlert();
	});


	_alert.find('footer .btn').on('click', function(e){
		closeAlert();
		localStorage.setItem('alertaMeteorologica', _numero_aviso);
	});


	_alert.find('.read-more').on('click', function(e){
		e.preventDefault();
	});



	function closeAlert(){
		_alert.fadeOut(400, function(){
			_alert.detach();
		});
	}


	$('body').append(_alert);

});






})(jQuery)















