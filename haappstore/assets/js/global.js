jQuery(document).ready(function($){

	$('.nav li').each(function(){
		if($(this).find('li').length > 0){
			$(this).children('a').after('<em></em>');
		}
	});
	$('.nav li em').click(function(){
		$(this).toggleClass('on').siblings('ul').toggleClass('show').parent().siblings('li').children('em').removeClass('on').siblings('ul').removeClass('show');
	});
	$('.social li.wx a').click(function(){
		$(this).siblings('.qr').stop().fadeToggle('fast');
	});
	/*首页幻灯片*/
	if($('#hmtop').length > 0){
		$('#hmtop').slick({
		  	dots: false,
		  	infinite: true,
		 	arrows: false,
		  	speed: 300,
		  	fade: true,
		  	cssEase: 'linear',
		  	autoplay:true,
		  	autoplaySpeed:2000
		});
	}	
	$('.searchbtn').click(function(){
		$('.header .right').toggleClass('show');
		$('.searchform .text').focus();
		$('.bar, body, .social').removeClass('show');
		$('.bg').fadeOut('fast');
	});
	$('.navbtn').click(function(){
		$('.bar, body, .social').toggleClass('show');
		$('.header .right').removeClass('show');
		$('.bg').fadeToggle('fast');
	});
	$('.bg').click(function(){
		$('.bar, body, .social').removeClass('show');
		$(this).fadeOut('fast');
	});
	$('.backtop').click(function(){
		$('body,html').animate({scrollTop:0},300);
	});
	
	if($('#screen').length > 0){
		$('#screen').on('init', function(event, slick, currentSlide, nextSlide){
		  $('.appscreen .load').remove();
		  
		});
		$('#screen').slick({
		  dots: false,
		  infinite: false,
		  arrows: true,
		  speed: 300,
		  slidesToShow: 3,
	  		slidesToScroll: 1
		}).show();
	}
	$('.appscreen .pic a').click(function(event){
		event.preventDefault();
		var _pic = '<div class="popupImg"><div class="box">'+$(this).html()+'<span></span></div></div>';
		$('body').append(_pic);
		$('.popupImg span').click(function(){		
			$('.popupImg').remove();
		});
		$(document).click(function(event){
			if($(event.target).closest('img').length === 0){
				$('.popupImg').remove();
			}
		});
	});
	
	$(window).resize(function(){
		if($('body').width() > 768){
			$('.bg').removeAttr('style');
			$('.bar, body, .social').removeClass('show');
			$('.nav li').on('mouseover mouseleave');
			$('.nav li').mouseover(function(){
				$(this).addClass('on').children('ul').stop().slideDown('fast');
			}).mouseleave(function(){
				$(this).removeClass('on').children('ul').stop().slideUp('fast');
			});

			$('#rankingTop .boxtop').off('click').removeClass('cur');
			$('.ranking').removeAttr('style');
		}else{
			$('.nav li').off('mouseover mouseleave');

			$('#rankingTop .boxtop').on('click');
			$('#rankingTop .boxtop').click(function(){
				var _index = $(this).index();
				$(this).addClass('cur').siblings().removeClass('cur');
				$('.ranking').eq(_index).stop().fadeIn('fast').siblings().hide();
			});	
		}
	}).trigger('resize');

});