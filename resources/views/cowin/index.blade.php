<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <title>凯翼汽车</title>
    <link rel='stylesheet' href='{{ asset('res/cowin/css/normalize.css') }}'>
    <link rel='stylesheet' href='{{ asset('res/cowin/css/animate.css') }}'>
    <link rel='stylesheet' href='{{ asset('res/cowin/css/style.cs') }}s'>
    <script src='{{ asset('res/cowin/js/flexible.js') }}'></script>
</head>
<body>
<audio src="{{ asset('res/cowin/music.mp3') }}"></audio>
<section class='clap'>
    <img class='logo' src='{{ asset('res/cowin/images/logo.png') }}'>
    <img class='text1 animated bounceInDown' src='{{ asset('res/cowin/images/clap_text1.png') }}'>
    <img class='text2 animated bounceInLeft' style='animation-delay:1s'
         src='{{ asset('res/cowin/images/clap_text2.png') }}'>
    <img class='text3 animated bounceInUp' style='animation-delay:2s'
         src='{{ asset('res/cowin/images/clap_text3.png') }}'>
</section>
<section class='hook hidden'>
    <img class='logo' src='{{ asset('res/cowin/images/logo.png') }}'>
    <img class='text1 animated bounceInDown' style='animation-delay:1s'
         src='{{ asset('res/cowin/images/hook_text1.png') }}'>
    <img class='text2 animated bounceInDown' style='animation-delay:2s'
         src='{{ asset('res/cowin/images/hook_text2.png') }}'>
    <img class='text3 animated bounceInDown' style='animation-delay:3s'
         src='{{ asset('res/cowin/images/hook_text3.png') }}'>
    <img class='text4 animated bounceInDown' style='animation-delay:4s'
         src='{{ asset('res/cowin/images/hook_text4.png') }}'>
</section>
<section class='flight hidden'>
    <img class='logo' src='{{ asset('res/cowin/images/logo.png') }}'>
    <img class='text1 animated flipInX' style='animation-delay:1s' src='{{ asset('res/cowin/images/clap_text1.png') }}'>
    <img class='text2 animated flipInY' style='animation-delay:2s'
         src='{{ asset('res/cowin/images/flight_text2.png') }}'>
    <img class='text3 animated flipInX' style='animation-delay:3s'
         src='{{ asset('res/cowin/images/flight_text3.png') }}'>
</section>
<section class='arms hidden'>
    <img class='logo' src='{{ asset('res/cowin/images/logo.png') }}'>
    <img class='text1 animated jackInTheBox' style='animation-delay:1s'
         src='{{ asset('res/cowin/images/arms_text1.png') }}'>
    <img class='text2 animated rotateInDownLeft' style='animation-delay:2s'
         src='{{ asset('res/cowin/images/arms_text2.png') }}'>
    <img class='text3 animated rotateInDownRight' style='animation-delay:3s'
         src='{{ asset('res/cowin/images/arms_text3.png') }}'>
    <img class='text4 animated rotateIn' style='animation-delay:4s'
         src='{{ asset('res/cowin/images/arms_text4.png') }}'>
</section>
<section class='select hidden'>
    <img class='logo' src='{{ asset('res/cowin/images/logo.png') }}'>
    <img class='title' src='{{ asset('res/cowin/images/title.png') }}'>
    <img class='btn invite_btn' src='{{ asset('res/cowin/images/invite_btn.png') }}'>
    <img class='btn bless_btn'
         @if(!empty($user))
         onclick="window.location.href='{{ url('cowin/share') .'/'. $user->id }}'"
         @endif
         src='{{ asset('res/cowin/images/bless_btn.png') }}'>
</section>
<section class='invite hidden'>
    <img class='logo' src='{{ asset('res/cowin/images/logo.png') }}'>
    <img class='title' src='{{ asset('res/cowin/images/title.png') }}'>
    <div class='text_container'>
        <p>机遇与挑战并存,梦想与方向仍在。</p>
        <p>让我们一起携手,共筑凯翼梦!</p>
        <p class='time_location'>
            <i class='time_icon'></i>时间: 2018年2月28日<br/>
            <i class='location_icon'></i>地点: 中国 · 成都&nbsp;香格里拉大酒店
        </p>
        <h2>会议日程</h2>
        <p class='time'>2月27日</p>
        <p>全天经销商报道</p>
        <p class='time'>2月28日</p>
        <p class='plan'>
            <time>08:30-11:40</time>
            <span>主题大会</span><br/>
            <time>13:30-14:30</time>
            <span>商务政策解读</span><br/>
            <time>14:30-16:30</time>
            <span>经销商培训</span><br/>
            <time>18:00-19:30</time>
            <span>颁奖盛典</span><br/>
            <time>19:30-20:40</time>
            <span>答谢晚宴</span><br/>
        </p>
        <p class='time'>3月1日</p>
        <p>全天 返程</p>
        <img class='return' src="{{ asset('res/cowin/images/return.png') }}">
    </div>
</section>
<section class='bless hidden'>
    <form action='{{ url('cowin/greeting') }}' method='POST'>
        {!!  csrf_field() !!}
        <div class="textarea_box">
            <textarea name="text" cols="30" rows="10"></textarea>
            <div class='confirm'></div>
        </div>
        <div class='popup hidden'>
            <div class='pannel'>
                <p class='phone_line'>
                    <input type="text" class='phone' name='phone' value="请输入手机号" size="11">
                </p>
                <p class='tips'>您生成的祝福海报将会在晚宴上进行抽奖，请填写您的真实手机号。</p>
                <input class='submit' type="submit" value="OK">
                <div class='reset'>重新编辑</div>
            </div>
        </div>
    </form>
</section>

<script src='{{ asset('res/cowin/js/jquery.js') }}'></script>
<script src='{{ asset('res/cowin/js/index.js') }}'></script>
</body>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
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
</html>
