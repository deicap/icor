$(document).ready(function(){

	
	$('.flexslider').flexslider({
		
		'pauseOnHover': true,
		'directionNav': false,
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
		
	});
	
	
	$('[data-action="scroll-to-icor-page"]').click(function(ev){

		ev.preventDefault();

		$('html, body').animate({
			
			scrollTop: $(".site-main").offset().top
			
		}, 700);
		
	});
	
	
});