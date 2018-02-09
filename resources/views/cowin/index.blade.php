<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <title>凯翼汽车</title>
    <link rel='stylesheet' href='../../res/cowin/css/normalize.css'>
    <link rel='stylesheet' href='../../res/cowin/css/swiper.min.css'>
    <link rel='stylesheet' href='../../res/cowin/css/animate.min.css'>
    <link rel='stylesheet' href='../../res/cowin/css/style.css'>
    <script src='../../res/cowin/js/flexible.js'></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<audio src='../../res/cowin/music.mp3' autoplay loop></audio>
<div class='swiper-container'>
    <div class='swiper-wrapper'>
        <section class='swiper-slide clap'>
            <img class='logo' src='../../res/cowin/images/logo.png'>
            <div class='text1 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='1s'></div>
            <div class='text2 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='2s'></div>
            <div class='text3 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='3s'></div>
            <img src='../../res/cowin/images/arrow.png' class='arrow'>
        </section>

        <section class='swiper-slide flight'>
            <img class='logo' src='../../res/cowin/images/logo.png'>
            <div class='text1 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='1s'></div>
            <div class='text2 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='2s'></div>
            <div class='text3 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='3s'></div>
            <img src='../../res/cowin/images/arrow.png' class='arrow'>
        </section>

        <section class='swiper-slide hook'>
            <img class='logo' src='../../res/cowin/images/logo.png'>
            <div class='text1 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='1s'></div>
            <div class='text2 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='2s'></div>
            <div class='text3 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='3s'></div>
            <div class='text4 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='4s'></div>
            <img src='../../res/cowin/images/arrow.png' class='arrow'>
        </section>

        <section class='swiper-slide arms'>
            <img class='logo' src='../../res/cowin/images/logo.png'>
            <div class='text1 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='1s'></div>
            <div class='text2 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='2s'></div>
            <div class='text3 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='3s'></div>
            <div class='text4 ani' swiper-animate-effect='fadeIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='4s'></div>
            <img src='../../res/cowin/images/arrow.png' class='arrow'>
        </section>

        <section class='swiper-slide select'>
            <img class='logo' src='../../res/cowin/images/logo.png'>
            <img class='title ani' swiper-animate-effect='zoomIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='.5s' src='../../res/cowin/images/title.png'>
            <img class='btn invite_btn ani' swiper-animate-effect='zoomIn' swiper-animate-duration='1.5s'
                 swiper-animate-delay='1s' src='../../res/cowin/images/invite_btn.png'>
            <img class='btn bless_btn ani'
                 @if(!empty($user))
                 onclick="window.location.href='{{ url('cowin/share') .'/'. $user->id }}'"
                 @else
                 id="bless_btn"
                 @endif
                 swiper-animate-effect='zoomIn' swiper-animate-duration='1.5s' swiper-animate-delay='1.5s'
                 src='../../res/cowin/images/bless_btn.png'>
        </section>
    </div>
</div>

<section class='invite hidden'>
    <img class='logo' src='../../res/cowin/images/logo.png'>
    <img class='return' src='../../res/cowin/images/return.png'>
</section>

<section class='bless hidden'>
    <img class='logo' src='../../res/cowin/images/logo.png'>
    <form action='{{ url('cowin/greeting') }}' method='POST'>
        {!!  csrf_field() !!}
        <input type="hidden" name="avatar" id="avatar" value="">
        <div class='textarea_box'>
            <textarea name='text' cols='30' rows='10'>请在此处输入最多60字祝福语</textarea>
            <div class='confirm'></div>
            <img class='hand hidden' src='../../res/cowin/images/hand.png'>
        </div>
        <div class='popup hidden'>
            <div class='pannel'>
                <p class='phone_line'><input type='text' class='phone' name='phone' value='请输入手机号'></p>
                <input class='submit' type='submit' value=''>
                <div class='reset'></div>
            </div>
        </div>
        <img src='../../res/cowin/images/loading.png' class='loading hidden'>
    </form>
</section>

<script src='../../res/cowin/js/jquery.js'></script>
<script src='../../res/cowin/js/swiper.min.js'></script>
<script src='../../res/cowin/js/swiper.animate1.0.3.min.js'></script>
<script src='../../res/cowin/js/index.js'></script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '翼句祝福', // 分享标题
            link: "https://api.shanghaichujie.com/cowin/index",
            imgUrl: "https://api.shanghaichujie.com/res/cowin/share2.png", // 分享图标
            success: function () {
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '翼句祝福', // 分享标题
            desc: "凯翼汽车2018商务年会邀请函", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/cowin/index",
            imgUrl: "https://api.shanghaichujie.com/res/cowin/share2.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
            }
        });
    });
    $.ajax({
        url: '{{ url('api/cowin/image') }}',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        data: {avatar: '{{ $wechatInfo['avatar'] }}'},
    }).done(function (res) {
        $('#avatar').attr('value', res);
    }).fail(function (msg) {
        // alert('获取微信头像失败！')
    })
</script>
</body>
</html>
