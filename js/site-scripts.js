$(document).ready(function(){

	
	$('.flexslider').flexslider({
		
		'slideshowSpeed': 3500,
		'startAt': 0,
		
		after: function(slider){
			
			$('.slide-expanded').removeClass('slide-expanded');
			$('.flexslider').attr('current-slide', slider.currentSlide);
			
		}
		
	});

	$('.flexslider').attr('current-slide', 0);
	
	
	$('[data-action="expand-slide"]').click(function(ev){

		ev.preventDefault();

		$(this).parent().parent().parent().parent().parent().toggleClass('slide-expanded');

		if ($(this).parent().parent().parent().parent().parent().hasClass('slide-expanded')) {
			$('.flexslider').flexslider("pause");
		} else {
			$('.flexslider').flexslider("play");
		}

	});
	
	
	$('[data-action="scroll-to-icor-page"]').click(function(ev){

		ev.preventDefault();

		$('html, body').animate({
			
			scrollTop: $(".site-main").offset().top
			
		}, 700);
		
	});
	
	setTimeout(function(){
		
		$('html').removeClass('loading');
		
	}, 250);
	
	
});