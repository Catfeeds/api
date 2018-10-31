<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>雅培菁挚品牌发布会</title>
    <script src="./js/amfe-flexible.js"></script>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/swiper.min.css">
    <link rel="stylesheet" href="./css/animate.min.css">
    <link rel="stylesheet" href="./css/index.min.css">
</head>

<body>
<audio src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/bg.mp3" id="bgm" autoplay loop preload></audio>
<div class="loading">
    <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/logo.png" class="logo">
    <div class="progress"><span></span></div>
    <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/loading.png" class="loading-text">
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide page1">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/01_text.png" class="ani"
                 swiper-animate-effect="fadeInDown" swiper-animate-duration="1s" swiper-animate-delay="0.1s">
            <img class="arrwo_bottom" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/arrow_bottom.png">
        </div>
        <div class="swiper-slide page2">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/02_text.png" class="ani"
                 swiper-animate-effect="zoomIn" swiper-animate-duration="1s" swiper-animate-delay="0.1s">
            <img class="arrwo_bottom" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/arrow_bottom.png">
        </div>
        <div class="swiper-slide page3">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/03_text.png" class="ani"
                 swiper-animate-effect="fadeInUp" swiper-animate-duration="1s" swiper-animate-delay="0.1s">
            <img class="arrwo_bottom" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/arrow_bottom.png">
        </div>
        <div class="swiper-slide page4">
            <!-- <img class="arrwo_bottom" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/arrow_bottom.png"> -->
        </div>
        <!-- <div class="swiper-slide page5">
            <img class="logo" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/logo2.png">
            <div class="title"><img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/title.png"></div>
            <div class="content"><img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/01_content.png"></div>
            <img class="arrwo_bottom" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/arrow_bottom.png">
        </div>
        <div class="swiper-slide page6">
            <img class="logo" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/logo2.png">
            <div class="title"><img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/title.png"></div>
            <div class="content"><img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/02_content.png"></div>
            <img class="arrwo_bottom" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/arrow_bottom.png">
        </div>
        <div class="swiper-slide page7">
            <img class="logo" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/logo2.png">
            <div class="content1"><img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/03_content1.png"></div>
            <div class="content2">
                <div class="wrap">
                    <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/03_content2.png">
                    <div class="video_wrap">
                        <video src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/video.mp4" poster="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/poster.jpg"
                            controls></video>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<script src="./js/resLoader.js"></script>
<script src="./js/swiper.min.js"></script>
<script src="./js/swiper.animate.min.js"></script>
<script src="./js/index.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '雅培菁挚品牌发布会', // 分享标题
            link: window.location.href,
            imgUrl: "{{ url('res/abbott/share.png') }}", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '雅培菁挚品牌发布会', // 分享标题
            desc: "雅培菁挚诚邀您，与我们一起倡导亲子执手，去感知更大的世界", // 分享描述
            link: window.location.href,
            imgUrl: "{{ url('res/abbott/share.png') }}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
</script>

</body>

</html>