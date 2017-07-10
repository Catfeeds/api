$(function(){
	//点击第一次图片 第二段序列帧加载
	
	$('.page2 img').click(function() {
			console.log(999);
			$('#canvas').hide();
			$('.page2').hide();

			var frame2 = new SequenceFrame({
				id: $('#canvas1')[0],
				width: 640,
				height: 1038,
				speed: 100,
				loop: false,
				callback: function() {

					$('.essence1').show();

				},
				imgArr: [

					"images/1.jpg",
					"images/2.jpg",
					"images/3.jpg",
					"images/4.jpg",
					"images/5.jpg",
					"images/6.jpg",
					"images/7.jpg",
					"images/8.jpg",
					"images/9.jpg",
					"images/10.jpg",
					"images/11.jpg",
					"images/12.jpg",
					"images/13.jpg",
					"images/14.jpg",
					"images/15.jpg",
					"images/16.jpg",
					"images/17.jpg",
					"images/18.jpg",
					"images/19.jpg",
					"images/20.jpg",
					"images/21.jpg",
					"images/22.jpg",
					"images/23.jpg",
					"images/24.jpg",
					"images/25.jpg",
					"images/26.jpg",
					"images/27.jpg",
					"images/28.jpg",
					"images/29.jpg",
					"images/30.jpg",
					"images/31.jpg",
					"images/32.jpg",
					"images/33.jpg",
					"images/34.jpg",
					"images/35.jpg",
					"images/36.jpg",
					"images/37.jpg",
					"images/38.jpg",
					"images/39.jpg",

				]
			});

		})

    //点击水滴动画
	$('.essence1 img').one("click",function(){
		$('.page3').fadeOut('slow');
	    $('#canvas1').fadeOut('slow',function(){
            $('.page1').fadeIn('slow');
            $('.leaf2').animate({
                    width: "260px",
					left: "120px",
                    top: "280px"
                },1800).animate({
                	width: "284px",
					left: "144px",
                    top: "350px"
                },2000);
                
                setTimeout(function(){
                	
	                $('.leaf3').animate({
	                    width: "413px",
						left: "168px",
	                    top: "233px"
	                },2800);
                	
                },1000)

        });
    });


})
