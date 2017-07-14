$(function(){
    $('.page1').one('click',function(){
        $('.page1').fadeOut();
        $('.page2').fadeIn()
    });
    //判断设备
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
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
    for (var i = 0; i <= 269; i++) {
        fileList.push("images/video/" + i + ".png");
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
            });
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
            $('.page1').fadeIn();
        }
    },30);
    loader.start();

    if(isAndroid || isiOS){
        $('.page1').one('touchstart',playVideo);
    }else{
        $('.page1').one('click',playVideo);
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

    function playVideo(){
        var imgArr = [];
        for(var i = 0; i < 269; i++){
            imgArr.push("images/video/"+ i +".png")
        }
        //绘制序列帧动态背景
        var bg1 = new SequenceFrame({
            id: $('#canvas')[0],
            width: 640,
            height: 1038,
            speed: 60,
            loop: false,
            callback: function(){

            },
            imgArr: imgArr
        });
    }
});