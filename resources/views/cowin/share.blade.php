<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <title>凯翼汽车</title>
    <link rel='stylesheet' href='{{ asset('res/cowin/css/normalize.css') }}'>
    <script src='{{ asset('res/cowin/js/flexible.js') }}'></script>
    <style>
        html,body {
            width: 100%;
            height: 100%;
        }
        section {
            position: relative;
            width: 100%;
            height: 100%;
            background: url({{ $user->greeting }}) no-repeat left top;
            background-size: 100%;
        }
        .hidden{
            display: none;
        }
        #share_btn{
            position: absolute;
            left: 0;
            right: 0;
            top: 10.1rem;
            margin: auto;
            width: 2.266rem;
            height: 0.586rem;
        }
        .popup{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <section>
        <img id='share_btn' src="{{ asset('res/cowin/images/share_btn.png') }}">
        <img class='popup hidden' id='popup' src="{{ asset('res/cowin/images/share.png') }}" alt="">
    </section>
    <script>
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
</script>
</html>
