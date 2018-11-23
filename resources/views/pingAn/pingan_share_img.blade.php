<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>与古代帅哥美女一起来battle！</title>
</head>
<body>
<div style="position:absolute; width:100%; height:100%; z-index:-1">  
    <img src="{{ $path }}" height="100%" width="100%"/>  
</div>
</body>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '与古代帅哥美女一起来battle！', // 分享标题
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/%E5%B9%B3%E5%AE%89logo.jpeg", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '与古代帅哥美女一起来battle！', // 分享标题
            desc: "第二届中国平安简单生活大会", // 分享描述
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/%E5%B9%B3%E5%AE%89logo.jpeg", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
</script>
</html>