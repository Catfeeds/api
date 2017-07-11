$(function(){
    //点击水滴动画
	$('.essence').one("click",function(){
	    $('#canvas').fadeOut('slow',function(){
            $('.page1').fadeIn('slow');
            $('.essence img').animate({
                    width: "204px",
                    height: "245px",
                    left: "350px",
                    top: "150px"
                },800)
                .animate({
                    left: "230px",
                    top: "210px"
                },800,function(){
                    $('.font').animate({
                        bottom: "150px",
                        opacity: 1
                    },800)
                })
        });
    });

    //图片预加载
    var loader = new PxLoader();
    var URL = window.location.href;
    // var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
    var BASE_PATH = 'http://api.touchworld-sh.com/qifu/illumall02/';
    var realLoadingNum = 0;
    var fakeLoadingNum = 0;
    var myLoadingInterval = null;
    var fileList = [
            'images/bg.png',
            'images/font.png',
            'images/loading.jpg',
            'images/loadingDrip.png',
            'images/logo.png',
            'images/logo.png',
            'images/water01.png',
            'images/water02.png',
            'images/water03.png',
        ];
    for (var i = 0; i <= 32; i++) {
        fileList.push("images/yezi2/" + i + ".jpg");
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
                height: fakeLoadingNum + "%"
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
                },
                imgArr: [
                    BASE_PATH+"images/yezi2/0.jpg",
                    BASE_PATH+"images/yezi2/1.jpg",
                    BASE_PATH+"images/yezi2/2.jpg",
                    BASE_PATH+"images/yezi2/3.jpg",
                    BASE_PATH+"images/yezi2/4.jpg",
                    BASE_PATH+"images/yezi2/5.jpg",
                    BASE_PATH+"images/yezi2/6.jpg",
                    BASE_PATH+"images/yezi2/7.jpg",
                    BASE_PATH+"images/yezi2/8.jpg",
                    BASE_PATH+"images/yezi2/9.jpg",
                    BASE_PATH+"images/yezi2/10.jpg",
                    BASE_PATH+"images/yezi2/11.jpg",
                    BASE_PATH+"images/yezi2/12.jpg",
                    BASE_PATH+"images/yezi2/13.jpg",
                    BASE_PATH+"images/yezi2/14.jpg",
                    BASE_PATH+"images/yezi2/15.jpg",
                    BASE_PATH+"images/yezi2/16.jpg",
                    BASE_PATH+"images/yezi2/17.jpg",
                    BASE_PATH+"images/yezi2/18.jpg",
                    BASE_PATH+"images/yezi2/19.jpg",
                    BASE_PATH+"images/yezi2/20.jpg",
                    BASE_PATH+"images/yezi2/21.jpg",
                    BASE_PATH+"images/yezi2/22.jpg",
                    BASE_PATH+"images/yezi2/23.jpg",
                    BASE_PATH+"images/yezi2/24.jpg",
                    BASE_PATH+"images/yezi2/25.jpg",
                    BASE_PATH+"images/yezi2/26.jpg",
                    BASE_PATH+"images/yezi2/27.jpg",
                    BASE_PATH+"images/yezi2/28.jpg",
                    BASE_PATH+"images/yezi2/29.jpg",
                    BASE_PATH+"images/yezi2/30.jpg",
                    BASE_PATH+"images/yezi2/31.jpg",
                    BASE_PATH+"images/yezi2/32.jpg"
                ]
            });
        }
    },30);
    loader.start();
});




