/*!
 *@name     jquery.barrager.js
 *@author   yaseng@uauc.net
 *@url      https://github.com/yaseng/jquery.barrager.js
 */
(function($) {

	$.fn.barrager = function(barrage) {
		barrage = $.extend({
			close:true,
			bottom: 0,
			max: 10,
			speed: 6,
			color: '#fff',
			old_ie_color : '#000000'
		}, barrage || {});

		var time = new Date().getTime();
		var barrager_id = 'barrage_' + time;
		var id = '#' + barrager_id;
		var div_barrager = $("<div class='barrage' id='" + barrager_id + "'></div>").appendTo($(this));
		var window_height = $('body').height() - 100;
		var bottom = (barrage.bottom == 0) ? Math.floor(Math.random() * window_height + 250) : barrage.bottom;
		// var bottom = (barrage.bottom == 0) ? Math.floor(Math.random() * window(_height / 4)) : barrage.bottom;
		div_barrager.css("bottom", bottom + "px");
		div_barrager_box = $("<div class='barrage_box cl'></div>").appendTo(div_barrager);
		if(barrage.img){
			div_barrager_box.append("<a class='portrait z' href='javascript:;'></a>");
			var img = $("<img src='' >").appendTo(id + " .barrage_box .portrait");
			img.attr('src', barrage.img);
		}
		
		div_barrager_box.append(" <div class='z p'></div>");
		
		var content = $("<a title=''></a>").appendTo(id + " .barrage_box .p");
		content.attr({
			'id': barrage.id
		}).empty().append(barrage.info);
		
		var i = 0;
		div_barrager.css('margin-right', i);
		var looper = setInterval(barrager, barrage.speed);

		function barrager() {
			var window_width = $('body').width() + 500;
			if (i < window_width) {
				i += 1;
				$(id).css('margin-right', i);
			} else {
				clearInterval(looper);
				$(id).remove();
 				return false;
			}
		}
	}
 
	$.fn.barrager.removeAll=function(){
		 $('.barrage').remove();
	}

})(jQuery);