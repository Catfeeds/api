<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <title>凯翼汽车</title>
    <script src='../../res/cowin/js/flexible.js'></script>
    <link rel='stylesheet' href='../../res/cowin/css/share.css'>
</head>
<body>
    <section>
        <img class='bg' src='{{ $user->greeting }}'>
        @if($share)
            <img id='share_btn'
                 onclick="window.location.href='{{ url('cowin/index') }}'" src="{{ asset('res/cowin/images/share_btn2.png') }}">
            @else
            <img id='share_btn' src='../../res/cowin/images/share_btn.png'>
            <img class='popup hidden' id='popup' src='../../res/cowin/images/share.png' alt=''>
        @endif
    </section>
    <script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
    <script type="application/javascript">
        wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
        // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
        wx.ready(function () {
            // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
            wx.onMenuShareTimeline({
                title: '凯翼汽车', // 分享标题
                link: "https://api.shanghaichujie.com/cowin/share/{{ $user->id }}",
                imgUrl: "https://api.shanghaichujie.com/res/cowin/share.png", // 分享图标
                success: function () {
                }
            });
            // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
            wx.onMenuShareAppMessage({
                title: '凯翼汽车', // 分享标题
                desc: "机遇与挑战并存,梦想与方向仍在,让我们一起携手,共筑凯翼梦!", // 分享描述
                {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
                link: "https://api.shanghaichujie.com/cowin/share/{{ $user->id }}",
                imgUrl: "https://api.shanghaichujie.com/res/cowin/share.png", // 分享图标
                type: 'link', // 分享类型,music、video或link，不填默认为link
                success: function () {
                }
            });
        });

        var share_btn = document.getElementById('share_btn');
        var popup = document.getElementById('popup');

        share_btn.addEventListener('touchstart', function(){
            popup.style.display = 'block';
        })
        popup.addEventListener('touchstart', function(){
            popup.style.display = 'none';
        })
    </script>
</body>
</html>
