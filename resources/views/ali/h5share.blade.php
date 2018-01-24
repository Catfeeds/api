<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>人人3小时</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('alibaba/h5/css/share.css') }}">
</head>
<body>
<div class="all">
    <img src="{{ env('APP_URL').'/upload/ali/h5/'. $user->path }}" id='canvas'>
    <div class="text">
        <p>姓名:<span>{{ $user->name }}</span></p>
        <p>2018财年累计申报<span>{{ $user->hours }}</span>公益时</p>
    </div>
</div>

</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '人人三小时', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/ali/h5share/{{ $user->id }}",
            imgUrl: "http://api.touchworld-sh.com/alibaba/three/share.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '人人三小时', // 分享标题
            desc: "只有改变我们自己，这世界才会有一点点的改变", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/ali/h5share/{{ $user->id }}",
            imgUrl: "http://api.touchworld-sh.com/alibaba/three/share.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

</script>
</html>
