<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>雪佛兰电音节</title>
    <script src="js/rem.js"></script>
    <link href="css/app.9ae78.css?9ae78891641e82d87e73" rel="stylesheet">
</head>

<body>
<div class="logo"></div>
<section class="loading">
    <p class="text">加载中</p>
    <p class="progress"><span>0</span>%</p>
</section>
<section class="page1 hide">
    <div class="btn_explore breathing"></div>
    <div class="btn_challenge breathing"></div>
    <div class="btn_rank breathing"></div>
</section>
<section class="page2 hide">
    <div class="page2_menu">
        <div class="btn_group">
            <div class="btn_prev breathing"></div>
            <div class="btn_next breathing"></div>
            <div class="btn_returnTop breathing"></div>
        </div>
    </div>
</section>
<section class="page3 hide">
    <div class="page2_frame"></div>
    <div class="exhibition1"></div>
    <div class="exhibition2"></div>
    <div class="exhibition3"></div>
    <div class="btn_exhibition1 breathing"></div>
    <div class="btn_exhibition2 breathing"></div>
    <div class="btn_exhibition3 breathing"></div>
    <div class="btn_index breathing"></div>
</section>
<section class="page4 hide">
    <div class="map">
        <img src="images/7b3eaf2ddaf5b999b2be562d593fce01.jpg">
    </div>
    <div class="popup"></div>
    <div class="btn_challenge2 breathing"></div>
    <div class="btn_prev breathing"></div>
</section>
<section class="page5 hide">
    <div class="page4_frame"></div>
    <img class="qrCode" src='{{ url("api/qrcode/generate") }}?text={"openid":"{{ $user->openid }}"}'>
    <div class="btn_index breathing"></div>
</section>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), true) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '雪佛兰电音节', // 分享标题
            link: 'https://m.chevrolet.com.cn/act/ultramusic/Auth.aspx?scope=snsapi_userinfo&redirect_uri=https://api.shanghaichujie.com/res/chevy/index',
            imgUrl: "{{ asset('res/chevy/share.png') }}", // 分享图标
            success: function () {
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '雪佛兰电音节', // 分享标题
            desc: "当狂热电音遇见雪佛兰", // 分享描述
            link: 'https://m.chevrolet.com.cn/act/ultramusic/Auth.aspx?scope=snsapi_userinfo&redirect_uri=https://api.shanghaichujie.com/res/chevy/index',
            imgUrl: "{{ asset('res/chevy/share.png') }}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
            }
        });
    });
    var openid = '{{ $user->openid }}'
    var gameTime = '{{ $user->updated_at }}'
</script>
<script type="text/javascript" src="js/app.9ae78.js?9ae78891641e82d87e73"></script>
</body>
</html>