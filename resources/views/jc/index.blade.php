<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
    <link rel="stylesheet" href="{{asset('jc/css/index.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('jc/css/video-js.css')}}"/>
    <title></title>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?8a6e9e7210f32dc650e98e3c6d78bddd";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>

<body>
<div class="page">
    <div class="content content1">
        <video webkit-playsinline playsinline preload='true' loop autoplay controls id="my-video" class="video-js"
               width="640" height="505" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
            <source src="{!! $path !!}">
            您的浏览器不支持HTML5视频
        </video>

        <img src="{{asset('jc/img/shareBtn2.png')}}" alt="" class="shareBtn hidden">
        <img src="{{asset('jc/img/careBtn.png')}}" alt="" class="careBtn hidden">
    </div>
    <div class="content hidden content2">
        <img src="{{asset('jc/img/code.png')}}" alt="" class="code">
        <img src="{{asset('jc/img/knowBtn.png')}}" alt="" class="kownBtn">
    </div>
    <div class="content hidden content3">
        <img src="{{asset('jc/img/shareText.png')}}" alt="" class="shareText">
        <img src="{{asset('jc/img/plane.png')}}" alt="" class="plane">
        <img src="{{asset('jc/img/knowBtn.png')}}" alt="" class="kownBtn">
    </div>
</div>

</body>
<script src="{{asset('jc/js/jquery.min.js')}}"></script>

<script src="{{asset('jc/js/video.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('jc/js/index.js')}}"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '查看我的#Own Your Juicy#专属视频', // 分享标题
            link: "https://api.shanghaichujie.com{!! $_SERVER['REQUEST_URI'] !!}",
            imgUrl: "{{asset('jc/img/jc_share.png')}}" // 分享图标
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '查看我的#Own Your Juicy#专属视频', // 分享标题
            desc: "邀你玩转Juicy时尚派对", // 分享描述
            link: "https://api.shanghaichujie.com{!! $_SERVER['REQUEST_URI'] !!}",
            imgUrl: "{{asset('jc/img/jc_share.png')}}", // 分享图标
            type: 'link' // 分享类型,music、video或link，不填默认为link
        });
    });


    var myPlayer = videojs('my-video');
    videojs("my-video").ready(function () {
        var myPlayer = this;
        myPlayer.play();

        var video = $('video');


        video[0].play();
        document.addEventListener("WeixinJSBridgeReady", function () {
            video[0].play();

        }, false);
    });


</script>

</html>

