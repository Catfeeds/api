<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>AIA</title>

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
        title_score_1: 500,
        title_score_2: 1000,
        title_score_3: 1500,
        title_score_4: 2000,
        title_score_5: 3000,
        title_text_1: '初级健康大厨',
        title_text_2: '中级健康大厨',
        title_text_3: '高级健康大厨',
        title_text_4: '技师健康大厨',
        title_text_5: '高级技师健康大厨'
    }
</script>
<script src="{{ asset('aia/src/settings.js') }}" charset="utf-8"></script>
<script src="{{ asset('aia/main.js') }}" charset="utf-8"></script>


</body>
</html>
