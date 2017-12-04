<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <title>LONGINES</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/show.css">
</head>
<body>

<img src="../images/on_white.png" class="switch">
<audio src="../images/music.mp3" id="audio" preload="auto" loop="loop" autoplay="autoplay"></audio>

<!-- show scene -->
<section class="show_scene">
    <!-- 根据scene参数将更换下面图片路径 -->
    <img src="../images/scene1.png" class="show_bg">
    <div class="share_box">
        <span>分享朋友圈可前往店铺领取精美礼品</span>
        <img src="../images/share.png">
    </div>
    <!-- 根据text和username参数更换div中的文字 -->
    <div class="text hidden">测试</div>
    <div class="username hidden">文字</div>
</section>

<script src="../js/jquery.js"></script>
<script src="http://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.service.sdk.min.js" type="text/javascript"></script>
<script>
    //字体加载
    var youzikuClient = new YouzikuClient();
    var data = {
        Tags: [{
            AccessKey:'ceccf5bd7d0246da8adabd8e0cefd5ea',
            Content: $('.show_scene .text').html(),
            Tag: '.show_scene .text'
        },{
            AccessKey:'ceccf5bd7d0246da8adabd8e0cefd5ea',
            Content: $('.show_scene .username').html(),
            Tag: '.show_scene .username'
        }]
    }

    youzikuClient.getBatchFontFace(data, function (json) {
        if(json.Code == 200){
            $('head').append('<style>' + json.FontfaceList[0].FontFace + '</style>');
            for(var i = 0; i < json.FontfaceList.length; i++){
                var item = json.FontfaceList[i];
                $('head').append('<style>' + item.FontFace + '</style>');
                $(item.Tag).addClass('animated zoomIn').show();
            }
        }
    });

    //音乐控制
    var audio = document.getElementById('audio');
    document.addEventListener("WeixinJSBridgeReady", function () {
        audio.play();
    }, false);
    window.addEventListener('touchstart', function firstTouch(){
        audio.play();
        this.removeEventListener('touchstart', firstTouch);
    });
    $('.switch').click(function(){
        if($('.switch').attr('src') == '../images/on_white.png'){
            //关闭白色按钮
            $('.switch').attr('src', '../images/off_white.png');
            audio.pause();
        }else if($('.switch').attr('src') == '../images/off_white.png'){
            //打开白色按钮
            $('.switch').attr('src', '../images/on_white.png');
            audio.play();
        }

    })
</script>
</body>
</html>