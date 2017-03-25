$(document).ready(function(){
	$('.form-btn').click(function(){
		$('.contact-form').css({
			'margin-left' : '0px'
		})
	});
	$('.exit').click(function(){
		$('.contact-form').css({
			'margin-left' : '-150vw'
		})
	})
});


$(window).scroll(function(){

	var wScroll = $(this).scrollTop();

	var docHeight = $(document).height();

	$('.header-text').css({
		'transform' : 'translate(0px, '+ wScroll/4 +'%)'
	});

	if(wScroll > docHeight/2){
		$('.contact-button-left').css({
			'left': '0px'
		});
	}
	if(wScroll < docHeight/2){
		$('.contact-button-left').css({
			'left': '-100vh'
		});
	}

	if(wScroll < $(window).height()-20){
		$('.contact-button-top').css({
			'top' : '0px'
		})
	}
	if(wScroll > $(window).height()+20){
		$('.contact-button-top').css({
			'top' : '-70px'
		})
	}

});