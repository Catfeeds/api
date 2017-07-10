$(function(){
	//图片预加载
    var loader = new PxLoader();
    var URL = window.location.href;
    var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') - 2) + 'qifu/illumall01/';
    var realLoadingNum = 0;
    var fakeLoadingNum = 0;
    var myLoadingInterval = null;
    var fileList = [
            'images/bg.png',
            'images/font.png',
            'images/loading.jpg',
            'images/loadingDrip.png',
            'images/logo.png',
            'images/name.png',
            'images/subBtn.png',
            'images/tips.png',
            'images/water.png',
            'images/water01.png',
            'images/water02.png',
            'images/X.png',
        ];
    for (var i = 0; i <= 21; i++) {
        fileList.push("images/animation/" + i + ".jpg");
    }
    for(var i = 0; i < fileList.length; i++){
        var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);
        pxImage.imageNumber = i + 1;
        loader.add(pxImage);
    }
    loader.addCompletionListener(function(){
        console.log("预加载图片："+fileList.length+"张");
    });
    loader.addProgressListener(function(e){
        var percent = Math.round( (e.completedCount / e.totalCount) * 100); //正序, 1-100
        realLoadingNum = percent;
    });
    var myLoadingInterval=setInterval(function(){
        fakeLoadingNum++;
        if(realLoadingNum > fakeLoadingNum){
            $(".loadingDrip2").css({
                height: fakeLoadingNum+ "%"
            })
            if(fakeLoadingNum>50){
                $(".loadingText1").fadeOut('slow',function(){
                    $(".loadingText2").fadeIn('slow');
                });
            }
            $(".loadingNob").html("Loading..."+fakeLoadingNum+"%");
        }else{
            $(".loadingNob").html("Loading..."+realLoadingNum+"%");
        }
        if(fakeLoadingNum>=100 && realLoadingNum==100){
            clearInterval(myLoadingInterval);
            $('.loading-container').hide();
            //绘制序列帧动态背景
            var bg1 = new SequenceFrame({
				id: $('#canvas')[0],
				width: 640,
				height: 1038,
				speed: 100,
				loop: false,
		        callback: function(){
				    $('.essence').show();
				    $('.essence input').fadeIn("slow");
		        },
				imgArr: [
					"images/animation/0.jpg",
					"images/animation/1.jpg",
					"images/animation/2.jpg",
					"images/animation/3.jpg",
					"images/animation/4.jpg",
					"images/animation/5.jpg",
					"images/animation/6.jpg",
					"images/animation/7.jpg",
					"images/animation/8.jpg",
					"images/animation/9.jpg",
					"images/animation/10.jpg",
					"images/animation/11.jpg",
					"images/animation/12.jpg",
					"images/animation/13.jpg",
					"images/animation/14.jpg",
					"images/animation/15.jpg",
					"images/animation/16.jpg",
					"images/animation/17.jpg",
					"images/animation/18.jpg",
					"images/animation/19.jpg",
					"images/animation/20.jpg",
					"images/animation/21.jpg",
				]
			});
        }
    },30);
    loader.start();

	//当输入框有内容时，显示提交按钮
	$('.essence input').change(function(){
		if($('.essence input').val() != ''){
			$('.essence button').fadeIn("slow");
		}
	})

	//点击提交那妞切换动画
	$("button").click(function(){
		// var val = $('.essence input').val();
		// $.ajax({
		// 	type: 'GET',
		// 	url: '',
		// 	data: {
		// 		openid: 123,
		// 		nickname: 123,
		// 		value: val
		// 	},
		// 	dataType: "json",
		// 	success: function(data) {
		// 		if(data == true){
		// 			$('.essence input').fadeOut("slow");
		// 			$('.essence button').fadeOut("slow");
		// 			$('#canvas').fadeOut('slow',function(){
		// 	            $('.page1').fadeIn('slow');
		// 	            $('.essence img').animate({
		// 	                    width: "198px",
		// 	                    height: "227px",
		// 	                    left: "120px",
		// 	                    top: "50px"
		// 	                },800)
		// 	                .animate({
		// 	                	width: "148px",
		// 	                    height: "177px",
		// 	                    left: "142px",
		// 	                    top: "270px"
		// 	                },800,function(){
		// 	                    $('.font').animate({
		// 	                        bottom: "150px",
		// 	                        opacity: 1
		// 	                    },800)
		// 	                })
		// 	        });
		// 		}else{
		// 			$(".mask").show();
		// 		}
		// 	},
		// 	error: function(res) {

		// 	}
		// });

		
		//打开上面注释没删除下面这段的内容
		$('.essence input').fadeOut("slow");
		$('.essence button').fadeOut("slow");
		$('#canvas').fadeOut('slow',function(){
            $('.page1').fadeIn('slow');
            $('.essence img').animate({
                    width: "198px",
                    height: "227px",
                    left: "120px",
                    top: "50px"
                },800)
                .animate({
                	width: "148px",
                    height: "177px",
                    left: "142px",
                    top: "270px"
                },800,function(){
                    $('.font').animate({
                        bottom: "150px",
                        opacity: 1
                    },800)
                })
        });
	});


	//点击关闭弹窗
	$(".close").click(function(){
		$(".mask").hide();
		$('.essence input').focus();
		$('.essence button').fadeOut("slow");
	});

});




