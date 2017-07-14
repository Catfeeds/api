<!DOCTYPE html>
<html>
<head>
    <title>启赋有机新上市</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone=no" />
    <meta name="format-detection" content="address=no" />
    <link rel="stylesheet" type="text/css" href="{{asset('online/css/component.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('online/css/animation.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('online/css/style.css') }}" />
</head>
<body>
<audio id="bgm" src="{{ asset('sound/music.mp3') }}" preload="auto" loop="loop" autoplay="autoplay"></audio>
<img class="imgTemp hidden ">
<!-- loading -->
<div class="loading-container">
    <!--<div class="logo loadingLogo"></div>-->
    <div class="loadingWrap">
        <div class="loadingDripWrap">
            <div class=" loadingDrip1 overlay"></div>
            <div class=" loadingDrip2  z2"></div>
        </div>
        <div class="loadingText1"></div>
        <div class="loadingText2 opacity0"></div>
        <div class="loadingNob ">Loading...0%</div>
    </div>

</div>
<div class="musicicon on musicplay"></div>
<div class="logo videoLogo z5"></div>

<!-- 主页面 -->
<div class="page-container hidden">
    <div data-page="1" class="page p1 cur">
        <canvas class="mainVideo" width="640" height="1100"></canvas>
        <!--<div class="logo logoVideo z2 opacity0 "></div>-->
        <a href="http://api.touchworld-sh.com/qf/shareto?openid={{$openid}}&nickname={{$nickname}}">
            <div class="goToExperience z2 opacity0 invisible"></div>
        </a>
        <!--滑动提示遮罩-->
        <div class="overlay hintHost z2">
            <div class="finger finger_amin noevent"></div>
        </div>
    </div>
    <!--6.26 京东独家首发-->
    <!--<div data-page="2" class="page p2  ">-->
    <!--<div class="JDlogo"></div>-->
    <!--<div class="p2Title"></div>-->
    <!--<div class="demoPic p2_demoPic"></div>-->
    <!--<div class="p2_t"></div>-->
    <!--<a href="https://pro.m.jd.com/mall/active/YVBtBdo3jPCu3ot5UAvaMEjHkVT/index.html" class="aBtn">-->
    <!--<div class="appointMentBtn"></div>-->
    <!--</a>-->
    <!--</div>-->
</div>
<style type="text/css">
    @-webkit-keyframes rotation {
        10% { transform: rotate(90deg); -webkit-transform: rotate(90deg) }
        50%, 60% { transform: rotate(0deg); -webkit-transform: rotate(0deg) }
        90% { transform: rotate(90deg); -webkit-transform: rotate(90deg) }
        100% { transform: rotate(90deg); -webkit-transform: rotate(90deg) }
    }
    @keyframes rotation {
        10% { transform: rotate(90deg); -webkit-transform: rotate(90deg) }
        50%, 60% { transform: rotate(0deg); -webkit-transform: rotate(0deg) }
        90% { transform: rotate(90deg); -webkit-transform: rotate(90deg) }
        100% { transform: rotate(90deg); -webkit-transform: rotate(90deg) }
    }
    #orientLayer { display: none; }
    @media screen and (min-aspect-ratio: 13/11) { #orientLayer { display: block; } }
    .mod-orient-layer { display: none; position: fixed; height: 100%; width: 100%; left: 0; top: 0; right: 0; bottom: 0; background: #000; z-index: 9997 }
    .mod-orient-layer__content { position: absolute; width: 100%; top: 45%; margin-top: -75px; text-align: center }
    .mod-orient-layer__icon-orient {background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIYAAADaCAMAAABU68ovAAAAXVBMVEUAAAD29vb////x8fH////////x8fH5+fn29vby8vL////5+fn39/f6+vr////x8fH////////+/v7////09PT////x8fH39/f////////////////////x8fH///+WLTLGAAAAHXRSTlMAIpML+gb4ZhHWn1c2gvHBvq1uKJcC6k8b187lQ9yhhboAAAQYSURBVHja7d3blpowFIDhTUIAOchZDkre/zE7ycySrbUUpsRN2/1fzO18KzEqxEVgTiZNfgmmtxRc8iaR8HNe8x4BtjQePKayYCIoyBSgvNNE1AkNSHqZyLqk97EgUCCHBzZ5mkg7ScvIJuIyOyXBRFxgpqWZyGsAZLB1KjsJi8nutHU4JCRbFRH8tmirI9k8Jx2sqNs8K/m0LQkrktO2crgcgXGB4AiTEsB0hJfo9MGgX7CGcYiYwQxmMOOvZwRhBG8tCoMXjBDeXvWCEcHbi14wgCBmMIMZzGAGM5jxETNwzMAxA8cMHDNwzMAxA8cMHDNwzMAxA8cMHDNwzMAxY6E2rUQxnH2tz9cirlJFwFBJedaPnUv0M7++egPDE8iAJcIDmxwH5wwv9vUviw2kLbVO3TJU5uul/EyB0FoLp4x60PdGUd3qPurrWyjGGTc05u+1dcgI7/+tCCPARWGhH7o5Y7RCf+bH9ctXLp6v2BVDxfqz0oPXeSVaNtINo/1SXDv4dck8IIkbhtC2ol+iouEonTBCbYvVMnXOjxww6s/RFrBUpXHh/gw1rHj5d/qhYn9Gpk2FWh6xRBRX5Oj3Znh2Sq49/L6+y8pB26q9GbE2dbA2mVbx6I+7MfBglLCttm73ZQi7AD3iL4HqjFYJHSPRppqaUaJ3ATpGa+ckpGak2hRRMyqjGMkvl+xyFeSMwjAqcsZgGDdyhl0oNTnDN4yenJGZFGxNChP5/Y3efh6SM2rDOJMzboYxkDMqwyjIGcIw6F+io2FU1IxIm1JqRmgXSkvNKNCXeTpGrU0JNSO2c6LIGPgCS8AuDHz9ta0SXWDtxoDRH+MqlbC2Dt2G2JFRadtQZt2qq/orGowdGb2euxYiqWEpVWhTBnszoNAPdStuQwxqf0aocdWKW4Z+DfszIh8pxJqbuCE4YAC+4bm0evtipjpgJHeFnyyt1Ku2xa0bhjxr27p75rECNwyI9ZwvXkHq+7aTaMEV44YYy/spfgjgjNHaWW+GeUhGEX7tLlVinIFDDSgnOwhi1V6bU0b6tVS9eAERe863g4dRrtiHdc6o+nn5vtyVVgR79Cqt4uL6gfHPQyGqtP2vf7HADGbcYwaOGThm4JiBYwaOGThm4JiBYwaOGThm4JiBYwaOGThm4JiBYwaOGThm4JjhtOM+J/AgT008yDMkN/dPP9hzS8zAMQN3OEYeekp5YU7KOKXwVXqiY+QS7smcinGKABWdiBgpPJTSMHJ4KidhhPBUSMLw4CmPhKHgKUXCkHsygum71ftNSgCX6bsl8FQyfbcL5EdYsDk0R3j7aiA5wpt5AjKg/2gLJEBD/0Hf2OOf/vRrj6z/7GtP4B3nMKyjHA12kIPSjnJs3FEO0TvKkYJHOWCR+rjJH0Vn6fI5PjNbAAAAAElFTkSuQmCC');display: inline-block; width: 67px; height: 109px;
        transform: rotate(90deg); -webkit-transform: rotate(90deg); -webkit-animation: rotation infinite 1.5s ease-in-out; animation: rotation infinite 1.5s ease-in-out; -webkit-background-size: 67px; background-size: 67px }
    .mod-orient-layer__desc { margin-top: 20px; font-size: 15px; color: #fff }
</style>
<div id="orientLayer" class="mod-orient-layer">
    <div class="mod-orient-layer__content">
        <i class="icon mod-orient-layer__icon-orient"></i>
        <div class="mod-orient-layer__desc">为了更好的体验，请使用竖屏浏览</div>
    </div>
</div>
<script src="{{ asset('online/js2/zepto.min.js') }}"></script>
<script src="{{ asset('online/js2/pxloader-all.min.js') }}"></script>
<script src="{{ asset('online/js2/resizeDiv.js') }}"></script>
<script src="{{ asset('online/js2/script.js') }}"></script>
<script src="{{ asset('online/js2/canvas.js') }}"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    $(function(){
        var appId, timestamp, nonceStr, signature;
        var link = document.URL.split("#")[0];
        $.ajax({
            url: '/wechat_inter/get_jssdk.php',
            type: 'get',
            dataType: 'json',
            data: {url: link},
            success: function (data) {
                console.log(data)
                appId = data.appId;
                timestamp = data.timestamp;
                nonceStr = data.nonceStr;
                signature = data.signature;
                weixinShare();
            }
        });
        function weixinShare() {
            wx.config({
//                        debug: true,
                appId: appId,
                timestamp: timestamp,
                nonceStr: nonceStr,
                signature: signature,
                jsApiList: [
                    // 所有要调用的 API 都要加到这个列表中
                    'onMenuShareAppMessage','onMenuShareTimeline','onMenuShareQQ','onMenuShareWeibo','onMenuShareQZone'
                ]
            });
            wx.ready(function () {
                wx.onMenuShareAppMessage({
                    title: '启赋有机新上市', // 分享标题
                    desc: '纯净、天然、健康.....什么是有机新定义？启赋带你一探究竟', // 分享描述
                    link: window.location.href, // 分享链接
                    imgUrl: 'http://organic.iprotime.com/online/img/share.jpg', // 分享图标
                    type: '', // 分享类型,music、video或link，不填默认为link
                    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                    success: function () {
                        // 用户确认分享后执行的回调函数

                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数

                    }
                });
                wx.onMenuShareTimeline({
                    title: '启赋有机新上市', // 分享标题
                    desc: '纯净、天然、健康.....什么是有机新定义？启赋带你一探究竟', // 分享描述
                    link: window.location.href, // 分享链接
                    imgUrl: 'http://organic.iprotime.com/online/img/share.jpg', // 分享图标
                    success: function () {
                        // 用户确认分享后执行的回调函数
//
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
//
                    }
                });
                wx.onMenuShareQQ({
                    title: '启赋有机新上市', // 分享标题
                    desc: '纯净、天然、健康.....什么是有机新定义？启赋带你一探究竟', // 分享描述
                    link: window.location.href, // 分享链接
                    imgUrl: 'http://organic.iprotime.com/online/img/share.jpg', // 分享图标
                    success: function () {
                        // 用户确认分享后执行的回调函数
//
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                        alert('QQ取消分享');
                        wx.hideOptionMenu();
                    }
                });
                wx.onMenuShareWeibo({
                    title: '启赋有机新上市', // 分享标题
                    desc: '纯净、天然、健康.....什么是有机新定义？启赋带你一探究竟', // 分享描述
                    link: window.location.href, // 分享链接
                    imgUrl: 'http://organic.iprotime.com/online/img/share.jpg', // 分享图标
                    success: function () {
                        // 用户确认分享后执行的回调函数
                        alert('腾讯微博分享成功');
                        wx.hideOptionMenu();
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                        alert('腾讯微博取消分享');
                        wx.hideOptionMenu();
                    }
                });
                wx.onMenuShareQZone({
                    title: '启赋有机新上市', // 分享标题
                    desc: '纯净、天然、健康.....什么是有机新定义？启赋带你一探究竟', // 分享描述
                    link: window.location.href, // 分享链接
                    imgUrl: 'http://organic.iprotime.com/online/img/share.jpg', // 分享图标
                    success: function () {
                        // 用户确认分享后执行的回调函数
                        alert('QQ空间分享成功');
                        wx.hideOptionMenu();
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                        alert('QQ空间博取消分享');
                        wx.hideOptionMenu();
                    }
                });

            });
        }

    })

</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-89505146-13', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>