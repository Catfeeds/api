<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>AIA游戏互动</title>

    <!--http://www.html5rocks.com/en/mobile/mobifying/-->
    <meta name="viewport"
          content="width=device-width,user-scalable=no,initial-scale=1, minimum-scale=1,maximum-scale=1"/>

    <!--https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html-->
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

    <!--fix fireball/issues/3568 -->
    <!--<meta name="browsermode" content="application">-->
    <meta name="x5-page-mode" content="app">

    <!--<link rel="apple-touch-icon" href=".png" />-->
    <!--<link rel="apple-touch-icon-precomposed" href=".png" />-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('aia/style-mobile.css') }}"/>

</head>
<body>
<canvas id="GameCanvas" oncontextmenu="event.preventDefault()" tabindex="0"></canvas>
<div id="splash">
    <div class="load">loading</div>
    <div class="progress-bar stripes">
        <span>0%</span>
    </div>
</div>
<script>
    window.aia = {
        start_time: new Date().getTime(),
        end_time: 0,
        play_time: 0,
        cp1_score: 0,
        cp2_score: 0,
        cp3_score: 0,
        cp4_score: 0,
        cp5_score: 0,
        game_score: 0,
        title_score: 0,
        title: '见习',
        score: 0,
        openid: '{{ $wechatInfo['id'] }}',
        server_score: {{ $userInfo->totalScore }},
        is_times: true,
        title_score_1: 120,
        title_score_2: 400,
        title_score_3: 800,
        title_score_4: 1400,
        title_score_5: 2000,
        title_text_1: '初级健康大厨',
        title_text_2: '中级健康大厨',
        title_text_3: '高级健康大厨',
        title_text_4: '至尊健康大厨',
        title_text_5: '食神'
    }
</script>
<script src="{{ asset('aia/src/settings.js') }}" charset="utf-8"></script>
<script src="{{ asset('aia/main.js') }}" charset="utf-8"></script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '【我是健康大厨】友邦客服节养生PK游戏，带您玩转美食赢好礼', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/aiaGame/index",
            imgUrl: "https://api.shanghaichujie.com/aia/aiaLogo.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '【我是健康大厨】友邦客服节养生PK游戏，玩转美食赢好礼', // 分享标题
            desc: "快来和我PK吧！跟AIA一起揭秘养生餐", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/aiaGame/index",
            imgUrl: "https://api.shanghaichujie.com/aia/aiaLogo.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
</script>

</body>
</html>
