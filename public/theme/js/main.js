var MenuLine = (function(){

	var transform = function(left, width) {
		var str = "-webkit-transform: translateX(" + left + "px); transform: translateX(" + left + "px); width:" + width + "px;";
		return str;
	}

	var set = function(left, width) {
		$('.nav-line .line').attr('style', transform(left, width));
	}
	
	var init = function() {
		var active = $('.nav-main a.active');
		if(active.length == 0) {
			var width = 0;
			var left = 0;
		} else {
			var width = active.width();
			var left = active.position().left + parseInt(active.css('padding-left'));
		}
		set(left, width);
	}

	$(document).on('mouseover', '.nav-main a', function(){
		var left = $(this).position().left + parseInt($(this).css('padding-left'));
		var width = $(this).width();
		set(left, width);
	});

	$(document).on('mouseout', '.nav-main a', function(){
		init();
	});

	$(window).on('load', function(){
		init();
	});

})();

var List = (function(){

	$('.us-page ol, .num-list').each(function(){
		var i = 1;
		$(this).find('li').each(function(){
			$(this).attr('data-number', i);
			i++;
		});
	});

})();

var Parallax = (function(){

	var parPos = [];
	var scrollDown;

	var setVars = function() {
		parPos[0] = $('.par-item').eq(0).offset().top;
		parPos[1] = $('.par-item').eq(1).offset().top;
		scrollDown = $(window).scrollTop() + $(window).height();
	}
	
	var set = function() {
		if(check(0)) {
			var y1 = Math.round((scrollDown - parPos[0]) / 6) + pos1;
			$('.par-item').eq(0).attr('style', '-webkit-transform: translateY(' + y1 + 'px); transform: translateY(' + y1 + 'px);');
		}

		if(check(1)) {
			var y2 = Math.round((scrollDown - parPos[1]) / 3) + pos2;
			$('.par-item').eq(1).attr('style', '-webkit-transform: translateY(' + y2 + 'px); transform: translateY(' + y2 + 'px);');
		}
	}

	var init = function() {
		if($('.parallax').length == 0) return;

		$(window).on('scroll', function(){
			setVars();
			set();
		});

		var pos1 = $('.par-item').eq(0).position().top;
		var pos2 = $('.par-item').eq(1).position().top;

		setVars();
		set();
	}

	var check = function(number) {
		if(parPos[number] < scrollDown && parPos[number] + $('.par-item').eq(number).height() > $(window).scrollTop())
		{
			return true;
		} else {
			return false;
		}
	}

	init();

})();

var Posts = (function(){

	var init = function() {
		if($('.post-ul').length == 0) return;
		var closed_h = 0;
		for(var i = 0; i < 3; i++) {
			closed_h = closed_h + $('.post-ul li').eq(i).outerHeight(true);
			
		}
		$('.posts-window').css('height', closed_h);

		$(document).on('click', '.js-posts', function(){
			$(this).addClass('active');
			$('.posts-window').css('height', $('.post-ul').height());
			return false;
		});
	}	

	init();

})();

var Search = (function(){
	var timeout;

	$(document).on('click', '.search-icon', function(){
		if($('.search').hasClass('active')) {
			clearTimeout(timeout);
			if($('.search-input').val() == '') {
				$('.search').removeClass('active');
				return false;
			}
		} else {
			$('.search').addClass('active');
			timeout = setTimeout(function(){
				$('.search-input').trigger('focus');
			}, 500);
			return false;
		}
		
	});
})();

var Circles = (function(){
	var amount = $('.info-block').length;
	var active = 0;
	var interval = true;

	var show = function(block) {
		block.siblings().removeClass('active');
		block.addClass('active');
		$('.info-circle[data-id="' + block.attr('data-id') + '"]').addClass('active').siblings().removeClass('active');
		$('.slider-dot').eq(block.index()).addClass('active').siblings().removeClass('active');
	}

	var slideshow = function() {
		if(!interval) return;

		show($('.info-block').eq(active));
		active++;
		if(active == amount) active = 0;

		setTimeout(function(){
			slideshow();
		}, 3000);
	}

	$(document).on('click', '.info-block', function(){
		show($(this));
		interval = false;
		return false;
	});

	$(document).on('click', '.slider-dot', function(){
		show($('.info-block').eq($(this).index()));
		interval = false;
		return false;
	});

	slideshow();
})();

var main_slider = (function(){
	if($('.slider_fotorama').length != 0) {
		var $fotoramaDiv = $('.slider_fotorama').fotorama();
		var fotorama = $fotoramaDiv.data('fotorama');

		$(document).on('click', '.slider-prev', function(){
			fotorama.show('<');
			return false;
		});

		$(document).on('click', '.slider-next', function(){
			fotorama.show('>');
			return false;
		});
	}
})();