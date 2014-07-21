var grphm_slider = (function(){
	$.fn.slider = function(options) {
		var obj = [];
		var photo_cont = $(this).find('.slider-photo').parent();
		var slider_nav = $(this).find('.slider-nav');
		var slider = $(this);

		var init = function() {
			var j = 0;
			slider.find('.thumb').each(function(){
				$(this).attr('data-id', j);
				obj[j] = $(this).attr('data-img');
				j++;
			});
			slider.addClass('js-slider');
		}

		init();

		var show = function(id) {
			slider.find('.thumb[data-id=' + id + ']').addClass('active').siblings().removeClass('active');
			
			var old_slide = photo_cont.find('.slider-photo');
			var new_slide = $('<div class="slider-photo closed" style="background-image: url(' + obj[id] + ');"></div>');
			
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

$('.slider-container').slider();