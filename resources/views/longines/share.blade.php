<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <title>LONGINES</title>
    <link rel="stylesheet" href="../../res/longines/css/normalize.css">
    <link rel="stylesheet" href="../../res/longines/css/animate.css">
    <link rel="stylesheet" href="../../res/longines/css/show.css">
</head>
<body>

<img src="../../res/longines/images/on_white.png" class="switch">
<audio src="../../res/longines/images/music.mp3" id="audio" preload="auto" loop="loop" autoplay="autoplay"></audio>

<!-- show scene -->
<section class="show_scene">
    <!-- 根据scene参数将更换下面图片路径 -->
    <img src="../../res/longines/images/scene{{ $scene }}.png" class="show_bg">
    <div class="share_box">
        <span>分享朋友圈可前往店铺领取精美礼品</span>
        <img src="../../res/longines/images/share.png">
    </div>
    <!-- 根据text和username参数更换div中的文字 -->
    <div class="text hidden">{{ $text }}</div>
    <div class="username hidden">{{ $scene }}</div>
</section>

<script src="../../res/longines/js/jquery.js"></script>
<script src="https://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.service.sdk.min.js" type="text/javascript"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: 'Longines', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/longines/share?username={{ $username }}&text={{ $text }}&scene={{ $scene }}",
            imgUrl: "{{ asset('res/longines/images/select2.png') }}", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: 'Longines', // 分享标题
            desc: "我在浪琴点亮了圣诞树", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/longines/share?username={{ $username }}&text={{ $text }}&scene={{ $scene }}",
            imgUrl: "{{ asset('res/longines/images/select2.png') }}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    //字体加载
    var youzikuClient = new YouzikuClient();
    var data = {
        Tags: [{
            AccessKey: 'ceccf5bd7d0246da8adabd8e0cefd5ea',
            Content: $('.show_scene .text').html(),
            Tag: '.show_scene .text'
        }, {
            AccessKey: 'ceccf5bd7d0246da8adabd8e0cefd5ea',
            Content: $('.show_scene .username').html(),
            Tag: '.show_scene .username'
        }]
    }

    youzikuClient.getBatchFontFace(data, function (json) {
        if (json.Code == 200) {
            $('head').append('<style>' + json.FontfaceList[0].FontFace + '</style>');
            for (var i = 0; i < json.FontfaceList.length; i++) {
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
    window.addEventListener('touchstart', function firstTouch() {
        audio.play();
        this.removeEventListener('touchstart', firstTouch);
    });
    $('.switch').click(function () {
        if ($('.switch').attr('src') == '../../res/longines/images/on_white.png') {
            //关闭白色按钮
            $('.switch').attr('src', '../../res/longines/images/off_white.png');
            audio.pause();
        } else if ($('.switch').attr('src') == '../../res/longines/images/off_white.png') {
            //打开白色按钮
            $('.switch').attr('src', '../../res/longines/images/on_white.png');
            audio.play();
        }

    })
</script>
</body>
</html>
