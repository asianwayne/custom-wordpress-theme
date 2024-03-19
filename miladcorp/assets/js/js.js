function unableScroll() {
	var top = jQuery(document).scrollTop();
	jQuery(document).on('scroll.unable',function (e) {
		jQuery(document).scrollTop(top);
	})
}
function enableScroll() {
	jQuery(document).unbind("scroll.unable");
}
var wow = new WOW({
    boxClass:     'wow',
    animateClass: 'animate__animated',
    offset:       50,
    mobile:       true,
    live:         true,
    callback:     function(box) {},
    scrollContainer: null,
    resetAnimation: true, 
});
wow.init();


jQuery(document).ready(function($) {
	/*公共部分*/
	var header = $('#header');
	var nav = $('#nav');
	var navItem = nav.find('li');
	navItem.each(function(){
		var _href = $(this).children('a').attr('href');
		if(_href == _url){
			if($(this).parents('li').length > 0){
				$(this).parents('li').addClass('cur');
			}else{
				//$(this).addClass('cur');
			}			
		}
		if($(this).children('ul').length > 0){
			$(this).children('a').after('<em></em>');
		}
	});	
	/***/
	navItem.find('em').click(function(){
		$(this).siblings('ul').stop().slideToggle('fast').parent().siblings().find('ul').stop().slideUp('fast');
	});
	/***/
	$('#navBtn').click(function(){
		if($(this).hasClass('active')){
			enableScroll();
			$(this).removeClass('active');
			header.removeClass('current');
			nav.stop().fadeOut('fast',function(){
				$(this).removeAttr('style').find('li').removeClass('show');
			});
		}else{
			unableScroll();
			$(this).addClass('active');
			header.addClass('current');
			var win = $(window).height() - $('#header').height();;
			nav.height(win).stop().fadeIn('fast',function(){
				$(this).find('li').addClass('show');
			});
		}
	});
	/****/
	$('.social a').click(function(){
		if($(this).siblings('.qr').length > 0){
			$(this).siblings('.qr').stop().fadeToggle('fast').parents('li').siblings('li').children('.qr').stop().fadeOut('fast');
		}
	});
	/**/
	$('#search .submit').click(function(){
		if($(this).siblings('.text').val() == ''){
			alert('请输入关键词再搜索！');
			return false;
		}
	});
	/*公共部分结束*/	
    /*首页开始*/
	/**/
	var slides = $('#slides .slick-load');
	if(slides.length > 0){	
		slides.on('init',function(){
			$(this).find('.slick-current .info').addClass('active');
		});
		slides.on('afterChange',function(){
			$(this).find('.slick-current .info').addClass('active').parents('.slick-slide').siblings('.slick-slide').find('.info').removeClass('active');
		});
		slides.slick({
			autoplay:false,
			autoplaySpeed:5000,
			speed:500,
	        dots: false,
	        arrows: true,
	        fade:true,
	        vertical: false,
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        focusOnSelect:true,
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',
	    });
	}	
	/**/
	var product = $('#product .slick-load');
	if(product.length > 0){	
		product.slick({
			autoplay:true,
			autoplaySpeed:5000,
			speed:500,
	        dots: false,
	        arrows: true,
	        fade:false,
	        rows:2,
	        slidesPerRow:1,
	        vertical: false,
	        slidesToShow: 5,
	        slidesToScroll: 1,
	        pauseOnHover:true,
	        focusOnSelect:false,
	        waitForAnimate:false,
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',
	        responsive: [
			    {
			      breakpoint: 1537,
			      	settings: {
			       	slidesToShow: 4
			        
			      }
			    },
			    {
			      breakpoint: 1025,
			      	settings: {
			       	slidesToShow: 3
			        
			      }
			    },
			    {
			      breakpoint: 769,
			      	settings: {
			       	slidesToShow: 3,
			        rows:3,
			      }
			    },
			    {
			      breakpoint: 541,
			      	settings: {
			       	slidesToShow: 2,
			        rows:4,
			      }
			    }
			]
	    });
	}
	/**/
	var parnter = $('#parnter .slick-load');
	if(parnter.length > 0){	
		var rows = 1;
		if(parnter.find('.item').length > 20){
			if($(window).width() > 768){
				rows = 2;
			}else{
				rows = 3;
			}
		}
		parnter.slick({
			autoplay:true,
			autoplaySpeed:3000,
			speed:500,
	        dots: false,
	        arrows: true,
	        fade:false,	        
	      	centerMode:true,
	      	centerPadding:'5%',
	        vertical: false,
	        variableWidth:true,
	        rows:rows,
	        slidesToShow: 5,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        focusOnSelect:false,
	        waitForAnimate:false,
	        prevArrow:'<div class="slick-prev"></div>',
	        nextArrow:'<div class="slick-next"></div>'
	    });
	}	
	/**/	
	/**/
	var evaluation = $('#evaluation .slick-load');
	if(evaluation.length > 0){	
		evaluation.slick({
			autoplay:false,
			autoplaySpeed:3000,
			speed:500,
	        dots: true,
	        arrows: false,
	        fade:true,	
	        vertical: false,
	        variableWidth:false,
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        focusOnSelect:true,
	        waitForAnimate:false,
	    });
	}
	/*首页结束*/
	/*新闻频道页开始*/
	/****/
	var newstop = $('#newstop .slick-load');
	if(newstop.length > 0){
		newstop.slick({
			autoplay:true,
			autoplaySpeed:3000,
			speed:800,
	        dots: false,
	        arrows: true,
	        vertical: false,
	        fade:false,
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',
	        appendArrows:$('#newstop .arrows')
	    });
	}
	/*新闻频道页结束*/
	/*案例频道页开始*/
	if($('#case .slick-load').length > 0){	
		$('#case .slick-load').slick({
			autoplay:false,
			autoplaySpeed:3000,
			speed:500,
	        dots: false,
	        arrows: true,
	        fade:false,	
	        vertical: false,
	        variableWidth:false,
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        focusOnSelect:true,
	        waitForAnimate:false,
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',
	        responsive: [
			    {
			      breakpoint: 1281,
			      	settings: {
			       	slidesToShow: 2
			        
			      }
			    },
			    {
			      breakpoint: 769,
			      	settings: {
			       	slidesToShow: 1
			        
			      }
			    }
			]
	        
	    });
	}
	if($('#casetop .slick-load').length > 0){	
		$('#casetop .slick-load').slick({
			autoplay:false,
			autoplaySpeed:3000,
			speed:500,
	        dots: false,
	        arrows: true,
	        fade:false,	
	        vertical: false,
	        variableWidth:false,
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        focusOnSelect:true,
	        waitForAnimate:false,
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',
	        responsive: [
			    {
			      breakpoint: 1281,
			      	settings: {
			       	slidesToShow: 2
			        
			      }
			    },
			    {
			      breakpoint: 769,
			      	settings: {
			       	slidesToShow: 1
			        
			      }
			    }
			]
	        
	    });
	}
	var casepost = $('#casepost .gallery');
	if(casepost.length > 0){		
		casepost.find('.slick-load').slick({
			autoplay:false,
			autoplaySpeed:3000,
			speed:800,
	        dots: false,
	        arrows: true,
	        vertical: false,
	        fade:false,
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        focusOnSelect:true,
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',	        
	    });
	}
	/*案例频道页结束*/
	/*产品图片列表频道*/
	/**/
	var protop = $('#protop .slick-load');
	if(protop.length > 0){	
		protop.slick({
			autoplay:false,
			autoplaySpeed:5000,
			speed:500,
	        dots: false,
	        arrows: true,
	        fade:false,
	        rows:2,
	        slidesPerRow:1,
	        vertical: false,
	        slidesToShow: 5,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        focusOnSelect:true,
	        waitForAnimate:false,
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',
	        responsive: [			    
			    {
			      breakpoint: 1281,
			      	settings: {
			       	slidesToShow: 4
			        
			      }
			    },
			    {
			      breakpoint: 911,
			      	settings: {
			       	slidesToShow: 3
			        
			      }
			    },
			    {
			      breakpoint: 541,
			      	settings: {
			       	slidesToShow: 2,
			        
			      }
			    }
			]
	    });
	}
	/*首页我们的服务*/
	var service = $('#service .slick-load');
	if(service.length > 0){
		service.slick({
			autoplay:false,
			autoplaySpeed:5000,
			speed:500,
	        dots: true,
	        arrows: false,
	        fade:false,
	        vertical: false,
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        pauseOnHover:false,
	        responsive: [
	        	{
			      breakpoint: 1025,
			      settings: {
			       slidesToShow: 2
			        
			      }
			    },
			    {
			      breakpoint: 541,
			      settings: {
			       slidesToShow: 1
			        
			      }
			    }
			]
	    });
	}
	/**/
	/**/
	if($('#imgbig').length > 0){
		$('#imgbig .slick-load').slick({
	        autoplay: true,
	        autoplaySpeed: 5000,
	        speed: 500,
	        dots: false,
	        arrows: true,
	        vertical: false,
	        fade:true,
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        pauseOnHover: true,
	        asNavFor:$('#imgtab .slick-load'),
	        prevArrow:'<div class="slick-prev"><i class="ri-arrow-left-s-line"></i></div>',
	        nextArrow:'<div class="slick-next"><i class="ri-arrow-right-s-line"></i></div>',
	        appendArrows:$('#imgtab .arrows'),
	        responsive: [			   
			    {
			      breakpoint: 769,
			      settings: {
			        fade:false,
			      }
			    }
			]
	    });
	    $('#imgtab .slick-load').slick({
	        autoplay: false,
	        autoplaySpeed: 5000,
	        speed: 500,
	        dots: false,
	        arrows: false,
	        vertical: false,
	        slidesToShow: 5,
	        slidesToScroll: 1,
	        pauseOnHover: false,
	        focusOnSelect:true,
	        draggable:false,
	        asNavFor:$('#imgbig .slick-load'),
	        responsive: [
			    {
			      breakpoint: 1025,
			      settings: {
			        slidesToShow: 4,
			      }
			    },
			    {
			      breakpoint: 769,
			      settings: {
			        slidesToShow: 3,
			      }
			    },
			    {
			      breakpoint: 541,
			      settings: {
			        slidesToShow: 2,
			      }
			    }
			]
	    });
	}
	$(window).resize(function(){
		var win = $(this).height();
		if($(this).width() > 1024){
			nav.removeAttr('style');
			navItem.on('mouseover mouseleave');
			navItem.mouseover(function(){
				$(this).addClass('on');
			}).mouseleave(function(){
				$(this).removeClass('on');
			});
		}else{
			navItem.off('mouseover mouseleave');
		}			
		$(window).scroll(function(){
			var scrolltop = $(this).scrollTop();			
			if(scrolltop > header.height()){
				header.addClass('active');
			}else{
				header.removeClass('active');
			}
			slides.css('opacity',1-1/win*scrolltop);
		}).trigger('scroll');
	}).trigger('resize');
	/*rebox*/
	$('.lightbox').rebox({ selector: 'a' });	
	/**/
	$('#vcode').click(function(){
		$(this).attr('src',bloghost+'zb_system/script/c_validcode.php?id=zbstudio&r='+Math.random());
	});
});