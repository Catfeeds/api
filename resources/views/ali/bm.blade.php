<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>斑马</title>
    <meta name="viewport" content="width=640,user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <!-- force webkit on 360 -->
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <!-- force edge on IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    <!-- force full screen on some browser -->
    <meta name="full-screen" content="yes"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <!-- force screen orientation on some browser -->
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-orientation" content="portrait">
    <link rel="stylesheet" href="{{ asset('alibaba/bm/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('alibaba/bm/css/style.css') }}">
</head>
<body>
    <section>
        <div class="video1">
            <img src="{{ asset('alibaba/bm/images/city.png') }}" id="img1">
            <video 
                id="video1"
                controls
                preload="auto" 
                src="{{ asset('alibaba/bm/bm1.mp4') }}"
                >
            </video>
        </div>
        <div class="video2">
            <img src="{{ asset('alibaba/bm/images/self.png') }}" id="img2">
            <video
                id="video2"
                controls
                preload="auto" 
                src="{{ asset('alibaba/bm/bm2.mp4') }}"
            >
            </video>
        </div>
    </section>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
    <script type="application/javascript">
        wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
        // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
        wx.ready(function () {
            // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
            wx.onMenuShareTimeline({
                title: '让出行更智慧  斑马互联网汽车AI体验之旅', // 分享标题
                {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
                link: "http://api.touchworld-sh.com/ali/bmShow",
                imgUrl: "http://api.touchworld-sh.com/alibaba/bm/share.png", // 分享图标
                success: function () {
                    // 用户确认分享后执行的回调函数
                }
            });
            // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
            wx.onMenuShareAppMessage({
                title: '让出行更智慧', // 分享标题
                desc: "斑马互联网汽车AI体验之旅", // 分享描述
                {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
                link: "http://api.touchworld-sh.com/ali/bmShow",
                imgUrl: "http://api.touchworld-sh.com/alibaba/bm/share.png", // 分享图标
                type: 'link', // 分享类型,music、video或link，不填默认为link
                success: function () {
                    // 用户确认分享后执行的回调函数
                }
            });
        });
        var video1 = document.getElementById('video1');
        var video2 = document.getElementById('video2');
        var img1 = document.getElementById('img1');
        var img2 = document.getElementById('img2');

        img1.addEventListener('touchstart',_touchstart,false);
        img2.addEventListener('touchstart',_touchstart,false);

        img1.addEventListener('touchend',_touchend,false);
        img2.addEventListener('touchend',_touchend,false);

        function _touchstart(e){
            switch (e.target.id){
                case 'img1':
                    img1.style.transform = "scale(0.9)";
                    break;
                case 'img2':
                    img2.style.transform = "scale(0.9)";
                    break;
                default:
                    break;
            }
        }

        function _touchend(e){
            switch (e.target.id){
                case 'img1':
                    img1.style.transform = "scale(1)";
                    video1.play();
                    break;
                case 'img2':
                    img2.style.transform = "scale(1)";
                    video2.play();
                    break;
                default:
                    break;
            }
        }
    </script>
</body>
</html>