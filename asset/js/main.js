$(document).ready(function () {

	var slide_count = 0;
	
	var sw = $('.swiper-container').swiper({
		autoplay : 5000,
		keyboardControl : true,
		mousewheelControl : true,
		grabCursor : true,
		effect: 'fade',
		speed: 800,
		onInit:function(swiper) {
			var $items = JSON.parse(items);
			
			slide_count = $items.length;
			
			$.each($items, function(i,v){
				var a_url = '';
				if( v.url ) { a_url = 'href="'+v.url+'"'; }

				swiper.appendSlide('<div class="swiper-slide"><a '+a_url+' target="'+v.url_target+'"><img src="'+v.image_path+'/'+v.image+'?v='+v.utime+'"></a></div>');
			});
			swiper.slideTo(3);
		},
		onReachBeginning : function(swiper){
			setTimeout(function(){
				$('.swiper-container').css('visibility','visible');
			}, 200);
			$('.page-num').html('<span>01&nbsp;/</span>&nbsp;0'+slide_count);
		},
		onSlideChangeStart: function(swiper){
			$('.page-num').html('<span>0'+(swiper.activeIndex+1)+'&nbsp;/</span>&nbsp;0'+slide_count);
		}
	});
	$(document.body).on('click','.next', function(e) {
		e.preventDefault();
		sw.slideNext();
	});
	
	$(document.body).on('click','.prev', function(e) {
		e.preventDefault();
		sw.slidePrev();
	});
});
