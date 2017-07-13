$(function(){
    //判断设备
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
    console.log(isAndroid,isiOS);
    //音乐播放
    var BGM=$("#bgm")[0];
    bgm_init();
    //图片预加载
    var loader = new PxLoader();
    var URL = window.location.href;
    var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
    var realLoadingNum = 0;
    var fakeLoadingNum = 0;
    var myLoadingInterval = null;
    var fileList = [];
    for (var i = 0; i <= 42; i++) {
        fileList.push("images/part01/" + i + ".jpg");
    }
    for(var i = 0; i <= 37; i++){
        fileList.push("images/part02/" + i + ".jpg");
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
            if(fakeLoadingNum > 50){
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
                    if(isAndroid || isiOS){
                        $(document).one('touchstart',bg2);
                    }else{
                        $(document).one('click',bg2);
                    }
                },
                imgArr: [
                    "images/part01/0.jpg",
                    "images/part01/1.jpg",
                    "images/part01/2.jpg",
                    "images/part01/3.jpg",
                    "images/part01/4.jpg",
                    "images/part01/5.jpg",
                    "images/part01/6.jpg",
                    "images/part01/7.jpg",
                    "images/part01/8.jpg",
                    "images/part01/9.jpg",
                    "images/part01/10.jpg",
                    "images/part01/11.jpg",
                    "images/part01/12.jpg",
                    "images/part01/13.jpg",
                    "images/part01/14.jpg",
                    "images/part01/15.jpg",
                    "images/part01/16.jpg",
                    "images/part01/17.jpg",
                    "images/part01/18.jpg",
                    "images/part01/19.jpg",
                    "images/part01/20.jpg",
                    "images/part01/21.jpg",
                    "images/part01/22.jpg",
                    "images/part01/23.jpg",
                    "images/part01/24.jpg",
                    "images/part01/25.jpg",
                    "images/part01/26.jpg",
                    "images/part01/27.jpg",
                    "images/part01/28.jpg",
                    "images/part01/29.jpg",
                    "images/part01/30.jpg",
                    "images/part01/31.jpg",
                    "images/part01/32.jpg",
                    "images/part01/33.jpg",
                    "images/part01/34.jpg",
                    "images/part01/35.jpg",
                    "images/part01/36.jpg",
                    "images/part01/37.jpg",
 
                ]
            });
        }
    },30);
    loader.start();

    function bg2(e){
        e.stopPropagation();
        var bg2 = new SequenceFrame({
                id: $('#canvas2')[0],
                width: 640,
                height: 1038,
                speed: 50,
                loop: false,
                callback: function(){
                    $('.textPic').fadeIn('slow');
                },
                imgArr: [
                    "images/part02/0.jpg",
                    "images/part02/1.jpg",
                    "images/part02/2.jpg",
                    "images/part02/3.jpg",
                    "images/part02/4.jpg",
                    "images/part02/5.jpg",
                    "images/part02/6.jpg",
                    "images/part02/7.jpg",
                    "images/part02/8.jpg",
                    "images/part02/9.jpg",
                    "images/part02/10.jpg",
                    "images/part02/11.jpg",
                    "images/part02/12.jpg",
                    "images/part02/13.jpg",
                    "images/part02/14.jpg",
                    "images/part02/15.jpg",
                    "images/part02/16.jpg",
                    "images/part02/17.jpg",
                    "images/part02/18.jpg",
                    "images/part02/19.jpg",
                    "images/part02/20.jpg",
                    "images/part02/21.jpg",
                    "images/part02/22.jpg",
                    "images/part02/23.jpg",
                    "images/part02/24.jpg",
                    "images/part02/25.jpg",
                    "images/part02/26.jpg",
                    "images/part02/27.jpg",
                    "images/part02/28.jpg",
                    "images/part02/29.jpg",
                    "images/part02/30.jpg",
                    "images/part02/31.jpg",
                    "images/part02/32.jpg",
                    "images/part02/33.jpg",
                    "images/part02/34.jpg",
                    "images/part02/35.jpg",
                    "images/part02/36.jpg",
                    "images/part02/37.jpg",

                ]
            });
    }
    function bgm_init(){
        document.addEventListener("WeixinJSBridgeReady", function () {
            BGM.play();
        }, false);
        window.addEventListener('touchstart', function firstTouch(){
            BGM.play();
            this.removeEventListener('touchstart', firstTouch);
        });
    }
});




