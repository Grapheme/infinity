var grphm_slider = (function(){
	$.fn.slider = function(option) {
		var img = [],
			thumb = [],
			photo_cont = $(this).find('.slider-img'),
			slider_nav = $(this).find('.slider-nav'),
			slider = $(this),
			max = 4,
			slide_length = $(this).find('.js-slider-nav i').length,
			active_thumb,
			active_id = 0,
			slider_allow = true;

		var get_thumb = function(id, thumb, img) {
			return '<li class="thumb" data-id="' + id + '" style="background-image: url(' + thumb + ')" data-img="' + img + '">';
		}

		var init = function() {
			var j = 0;
			
			slider.find('.js-slider-nav i').each(function(){
				$(this).attr('data-id', j);
				img[j] = $(this).attr('data-img');
				thumb[j] = $(this).attr('data-thumb');
				j++;
			});
			for(var i = 0; i < 3; i++) {
				slider_nav.append(get_thumb(i, thumb[i], img[i]));
			}
			for(i = slide_length - 1; i > slide_length - 3; i--) {
				slider_nav.prepend(get_thumb(i, thumb[i], img[i]));
			}
			slider.addClass('js-slider');
			active_thumb = slider_nav.find('.thumb[data-id=0]');
			active_thumb.addClass('active');
			photo_cont.html('<div class="slider-photo" style="background-image: url(' + active_thumb.attr('data-img') + ');"></div>');
			if(option) {
				slider.find('.slider-nav-win').css('width', slider_nav.find('.thumb').outerWidth(true) * (max + 1));
			} else {
				//slider.find('.slider-nav').css('width', slider_nav.find('.thumb').outerWidth(true) * (max + 1));
			}
		}

		init();

		var thumb_rm = function(del, out) {
			slider_allow = false;
			var block = slider.find('.slider-nav .thumb[data-id=' + del + ']');
			var time;
			if(out) {
				block.remove();
				setTimeout(function(){
					slider_allow = true;
				}, 500);
			} else {
				setTimeout(function(){
					block.remove();
					slider_allow = true;
				}, 500);
			}
		}

		var thumb_show = function(id, type) {
			var pre_str = get_thumb(id, thumb[id], img[id]);
			if(type == 'prepend') {
				slider.find('.slider-nav').prepend(pre_str);
			} else {
				slider.find('.slider-nav').append(pre_str);
			}
		}

		var nav_change = function(dif, direction) {
			if(direction == 'prepend') {
				var x = - slider.find('.thumb').outerWidth(true) * dif;
				slider_nav.attr('style', '-webkit-transform: translateX('+ x +'px);');
				setTimeout(function(){
					slider_nav.addClass('transition');
					slider_nav.removeAttr('style');
					setTimeout(function(){
						slider_nav.removeClass('transition');
					}, 500);
				}, 1);
			}
			if(direction == 'append') {
				var x = slider.find('.thumb').outerWidth(true) * dif;
				slider_nav.attr('style', '-webkit-transform: translateX('+ x +'px);');
				setTimeout(function(){
					slider_nav.addClass('transition');
					slider_nav.removeAttr('style');
					setTimeout(function(){
						slider_nav.removeClass('transition');
					}, 500);
				}, 1);
				
				
			}

		}

		var show = function(id) {
			if(id == active_id || !slider_allow) return;

			var dif = Math.abs(slider.find('.thumb[data-id=' + id + ']').index() - active_thumb.index());

			if(slider.find('.thumb[data-id=' + id + ']').index() < active_thumb.index()) {
				var del_id = parseInt(slider.find('.thumb').last().attr('data-id'));
				var add_id = parseInt(slider.find('.thumb').first().attr('data-id')) - 1;

				for(var i = 0; i < dif; i++) {
					del = del_id - i;
					add = add_id - i;
					
					if(add < 0) {
						add = slide_length - Math.abs(add);
					}
					if(del < 0) {
						del = slide_length - Math.abs(del);
					}

					thumb_rm(del);
					thumb_show(add, 'prepend');
					nav_change(dif, 'prepend');
				}

			} else {
				var del_id = parseInt(slider.find('.thumb').first().attr('data-id'));
				var add_id = parseInt(slider.find('.thumb').last().attr('data-id')) + 1;

				for(var i = 0; i < dif; i++) {
					del = del_id + i;
					add = add_id + i;

					if(add > slide_length - 1) {
						add = add - slide_length;
					}
					if(del > slide_length - 1) {
						del = del - slide_length;
					}

					thumb_rm(del, true);
					thumb_show(add, 'append');
					nav_change(dif, 'append');
				}
			}

			active_thumb = slider.find('.thumb[data-id=' + id + ']');
			active_id = id;
			active_thumb.addClass('active').siblings().removeClass('active');
			
			var old_slide = photo_cont.find('.slider-photo');
			var new_slide = $('<div class="slider-photo closed" style="background-image: url(' + img[id] + ');"></div>');
			
			old_slide.addClass('to-remove');
			photo_cont.append(new_slide);

			setTimeout(function(){
				new_slide.removeClass('closed');
			}, 1);

			setTimeout(function(){
				$(old_slide).remove();
			}, 1000);
		}

		$(document).on('click', '.slider-nav .thumb', function(){
			show($(this).attr('data-id'));
			return false;
		});
	}
})();

$('.slider-container').slider(true);
$('.auto-slider').slider();