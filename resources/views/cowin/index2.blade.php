<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>凯翼汽车</title>
    <script src='../../res/cowin/js/flexible.js'></script>
    <link rel='stylesheet' href='../../res/cowin/css/normalize.css'>
    <link rel='stylesheet' href='../../res/cowin/css/animate.css'>
    <link rel='stylesheet' href='../../res/cowin/css/style.css'>
</head>
<body>
    <audio src='../../res/cowin/music.mp3' autoplay loop></audio>
    <section class='clap'>
        <img class='logo' src='../../res/cowin/images/logo.png'>
        <img class='text1 animated fadeIn' style='animation-delay:0.7s;animation-duration:1.5s' src='../../res/cowin/images/clap_text1.png'>
        <img class='text2 animated fadeIn' style='animation-delay:1.4s;animation-duration:1.5s' src='../../res/cowin/images/clap_text2.png'>
        <img class='text3 animated fadeIn' style='animation-delay:2.1s;animation-duration:1s' src='../../res/cowin/images/clap_text3.png'>
    </section>

    <section class='hook hidden'>
        <img class='logo' src='../../res/cowin/images/logo.png'>
        <img class='text1 animated fadeIn' style='animation-delay:.7s;animation-duration:1.5s' src='../../res/cowin/images/hook_text1.png'>
        <img class='text2 animated fadeIn' style='animation-delay:1.4s;animation-duration:1.5s' src='../../res/cowin/images/hook_text2.png'>
        <img class='text3 animated fadeIn' style='animation-delay:2.1s;animation-duration:1.5s' src='../../res/cowin/images/hook_text3.png'>
        <img class='text4 animated fadeIn' style='animation-delay:2.8s;animation-duration:1s' src='../../res/cowin/images/hook_text4.png'>
    </section>

    <section class='flight hidden'>
        <img class='logo' src='../../res/cowin/images/logo.png'>
        <div class='text1 animated fadeIn' style='animation-delay:.7s;animation-duration:1.5s'></div>
        <div class='text2 animated fadeIn' style='animation-delay:1.4s;animation-duration:1.5s'></div>
        <div class='text3 animated fadeIn' style='animation-delay:2.1s;animation-duration:1s'></div>
    </section>

    <section class='arms hidden'>
        <img class='logo' src='../../res/cowin/images/logo.png'>
        <img class='text1 animated fadeIn' style='animation-delay:.7s;animation-duration:1.5s' src='../../res/cowin/images/arms_text1.png'>
        <img class='text2 animated fadeIn' style='animation-delay:1.4s;animation-duration:1.5s' src='../../res/cowin/images/arms_text2.png'>
        <img class='text3 animated fadeIn' style='animation-delay:2.1s;animation-duration:1.5s' src='../../res/cowin/images/arms_text3.png'>
        <img class='text4 animated fadeIn' style='animation-delay:2.8s;animation-duration:1s' src='../../res/cowin/images/arms_text4.png'>
    </section>

    <section class='select hidden'>
        <img class='logo' src='../../res/cowin/images/logo.png'>
        <img class='title animated zoomIn' src='../../res/cowin/images/title.png'>
        <img class='btn invite_btn animated zoomIn' style='animation-delay:1s' src='../../res/cowin/images/invite_btn.png'>
        <img class='btn bless_btn animated zoomIn'
             @if(!empty($user))
             onclick="window.location.href='{{ url('cowin/share') .'/'. $user->id }}'"
             @endif
             style='animation-delay:2s' src='../../res/cowin/images/bless_btn.png'>
    </section>

    <section class='invite hidden'>
        <img class='logo' src='../../res/cowin/images/logo.png'>
        <img class='return' src='../../res/cowin/images/return.png'>
    </section>

    <section class='bless hidden'>
        <img class='logo' src='../../res/cowin/images/logo.png'>
        <form action='{{ url('cowin/greeting') }}' method='POST'>
            {!!  csrf_field() !!}
            <div class="textarea_box">
                <textarea name="text" cols="30" rows="10">请在此处输入最多60字祝福语</textarea>
                <div class='confirm'></div>
                <img class='hand hidden' src='../../res/cowin/images/hand.png'>
            </div>
            <div class='popup hidden'>
                <div class='pannel'>
                    <p class='phone_line'><input type="text" class='phone' name='phone' value="请输入手机号"></p>
                    <input class='submit' type="submit" value="">
                    <div class='reset'></div>
                </div>
            </div>
            <img src='../../res/cowin/images/loading.png' class="loading hidden">
        </form>
    </section>
    <script src='../../res/cowin/js/jquery.js'></script>
    <script src='../../res/cowin/js/index.js'></script>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
    <script type="application/javascript">
        wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
        // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
        wx.ready(function () {
            // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
            wx.onMenuShareTimeline({
                title: '凯翼汽车', // 分享标题
                link: "https://api.shanghaichujie.com/cowin/index",
                imgUrl: "https://api.shanghaichujie.com/res/cowin/share.png", // 分享图标
                success: function () {
                }
            });
            // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
            wx.onMenuShareAppMessage({
                title: '凯翼汽车', // 分享标题
                desc: "机遇与挑战并存,梦想与方向仍在,让我们一起携手,共筑凯翼梦!", // 分享描述
                {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
                link: "https://api.shanghaichujie.com/cowin/index",
                imgUrl: "https://api.shanghaichujie.com/res/cowin/share.png", // 分享图标
                type: 'link', // 分享类型,music、video或link，不填默认为link
                success: function () {
                }
            });
        });
    </script>
</body>
</html>
