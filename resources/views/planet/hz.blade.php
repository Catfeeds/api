<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <![endif]-->
    <title>寻找赛诺菲星球</title>
    <meta id="share-name" itemprop="name" content="这可能是地球之上最美的视角">
    <meta id="share-description" itemprop="description" content="我们终将和世界的美好相遇">
    <meta id="share-image" itemprop="image" content="https://wa.qq.com/xplan/earth/dist/img/share.jpg">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="{{ asset('Planet/h_earth/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Planet/h_earth/css/map.css') }}"/>
    <script>
        (function () {
            var getQuery = function (name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                    results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            };
            if (!getQuery('_wv')) {
                if (location.search) {
                    location.href += '&_wv=1'
                } else {
                    location.href += '?_wv=1'
                }
            }
        }())
    </script>

</head>
<body>
<audio id="myAudio" src="{{ asset('Planet/h_earth/m.mp3') }}" preload="auto" loop="loop" autoplay="autoplay"></audio>
<img src="{{ asset('Planet/h_earth/img/audio2.png') }}" alt="" class="audioMusic">
<div class="ns-meteor-page "></div>

<div class="m-loading ">
    <div class="wrap" data-response="true">
        <div class="inner-box"></div>
        <div class="loadText">0%</div>
        <div class="text"></div>
        <!--<div class="tips">打开声音体验更佳</div>-->
    </div>
</div>
<div class="m-index hidden">
    <div class="wrap" data-response="true">
        <!--地球-->
        <div class="ns-webgl-page"></div>
        <div class="index-box">
            <div class="text"></div>
            <div class="cover"></div>
            <div class="name"></div>
            <div class="btn-tips">
                <div class="inner">
                    <div class="hand"></div>
                </div>
            </div>
        </div>
        <div class="btn-show-end"></div>

        <div class="ns-parallax">
            <div class="ns-video" id="videoWrap"></div>
            <div class="tips">
                <div class="inner"></div>
            </div>
            <div class="ns-kf kf-cloud" data-prefix="kf_cloud_" data-keyto="12"></div>
        </div>

        <div class="btn-show-parallax">
            <div class="bg"></div>
            <div class="inner"></div>
            <!--字体-->
            <div class="text "></div>
            <div class="text2 hidden"></div>
        </div>
    </div>
</div>
<div class="m-end">
    <div class="wrap" data-response="true">
        <div class="text-box">
            <div class="text text1"></div>
            <div class="text text2"></div>
            <div class="text text3"></div>
            <div class="last text text4"></div>
        </div>
        <div class="end-box">
            <div class="title"></div>
            <div class="btn-box">
                <div class="btn-again"></div>
                <div class="btn-link"></div>
            </div>
        </div>
    </div>
</div>

<div class="hz hidden a-site">
    <div class="m-invitation">
        <div class="btn-meet"></div>
    </div>
    <div class="m-agenda hidden">
        <div class="btn-site"></div>
    </div>
    <div class="m-site hidden">
        <p>期待您的莅临</p>
        <div class="site"></div>
        <div class="map">
            <div id="map"></div>
        </div>
        <div class="btn-again"></div>
    </div>
</div>

<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '寻找赛诺菲星球', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "http://api.touchworld-sh.com/ali/bmShow",
            imgUrl: "http://api.touchworld-sh.com/alibaba/bm/share.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '寻找赛诺菲星球', // 分享标题
            desc: "聚力同创，融合无界", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "http://api.touchworld-sh.com/snf/hz",
            imgUrl: "http://api.touchworld-sh.com/Planet/share.jpeg", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    bgm_init();

    function bgm_init() {
        var audio = document.getElementById('myAudio');
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play();
        }, false);
//            window.addEventListener('touchstart', function firstTouch(){
//                audio.play();
//                this.removeEventListener('touchstart', firstTouch);
//            });

        var audioMusic = document.getElementsByClassName('audioMusic')[0];

        audioMusic.addEventListener('touchstart', function () {
            if (audio.paused) {
                audio.play();
                audioMusic.src = '{{ asset('Planet/h_earth/img/audio2.png') }}'
            } else {
                audio.pause();
                audioMusic.src = '{{ asset('Planet/h_earth/img/audio1.png') }}'

            }


        });
    }
</script>
<script src="http://cache.amap.com/lbs/static/es5.min.js"></script>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=您申请的key值&plugin=AMap.ToolBar"></script>
<script src="{{ asset('Planet/h_earth/js/libs/zepto.min.js') }}"></script>
<script>

    map = new AMap.Map("map", {
        zoom: 18,
        center: [120.161529, 30.254822]
    });
    marker = new AMap.Marker({
        map: map,
        position: [120.161529, 30.254822]
    })
    marker.setLabel({
        offset: new AMap.Pixel(20, 20),//修改label相对于maker的位置
        content: "点击蓝色光标打开高德地图"
    });
    marker.on('click', function (e) {
        marker.markOnAMAP({
            name: '凯悦酒店',
            position: marker.getPosition()
        })
    })
    //    map.addControl(new AMap.ToolBar());
    if (AMap.UA.mobile) {
        document.getElementById('button_group').style.display = 'none';
    }

</script>
<script src="{{ asset('Planet/h_earth/js/libs/tvp.player_v2_zepto.js') }}"></script>
<script type="text/javascript" src="{{ asset('Planet/h_earth/js/main.js') }}"></script>
</body>
</html>
