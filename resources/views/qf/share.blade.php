<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('qifu/share2/css/index.css') }}"/>
    <title></title>
</head>
<body>
<div class="share">
    <img src="{{asset('qifu/share2/img/bg.png')}}" alt="" class="bg"/>
    @if(!is_null($logo))
        <div class="logo1 ">
            <img src="{!! $logo !!}" alt="" class="logo"/>
            <img src="{{asset('qifu/share2/img/logo2.png') }}" alt="" class="qLogo"/>
            <img src="{{asset('qifu/share2/img/line.png') }}" alt="" class="line"/>
        </div>
    @else
        <div class="logo2">
            <img src="{{asset('qifu/share2/img/logo2.png')}}"/>
        </div>
    @endif
    @if(!is_null($shop_url))
        <div class="footer ">
            <img src="{{asset('qifu/share2/img/text.png')}}" class="textPic"/>
            <a href="{!! $shop_url !!}">
                <img src="{{asset('qifu/share2/img/buyBtn.png')}}" class="buyBtn"/>
            </a>
        </div>
    @else
        <div class="footer2">
            <img class="textPic2" src="{{asset('qifu/share2/img/text.png')}}"/>
        </div>
    @endif
    <div class="popup">
        <img src="{{asset('qifu/share2/img/popup.png')}}" alt="" class="popupbg"/>
        <img src="{{asset('qifu/share2/img/cancel.png')}}" alt="" class="cancel"/>
    </div>
</div>

</body>
<script src="{{ asset('qifu/share2/js/jquery-1.11.3.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '亲和人体科技，重新定义有机', // 分享标题
            link: "http://api.touchworld-sh.com/qf/shareto?openid={{$openid}}&nickname={{$nickname}}",
            imgUrl: "http://api.touchworld-sh.com/img/qf_logo.jpeg", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '亲和人体科技，重新定义有机', // 分享标题
            desc: "启赋有机，真正的全链有机", // 分享描述
            link: "http://api.touchworld-sh.com/qf/shareto?openid={{$openid}}&nickname={{$nickname}}",
            imgUrl: "http://api.touchworld-sh.com/img/qf_logo.jpeg", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    $('.popup .cancel').click(function () {
        $('.popup').hide();
    })
</script>
</html>
