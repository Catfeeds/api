<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>腾讯手游助手</title>
  <style>
    html, body {
      position: relative;
      width: 100%;
      height: 100%;
      margin: 0;
      background: url({{ asset('res/tencent/image.png') }}) no-repeat;
      background-size: 100% 100%;
    }
    #imgBox {
      position: absolute;
      top: 37.8%;
      left: 11.9%;
      width: 74.8%;
      height: 25.5%;
    }
    #imgBox img {
      width: 100%;
      height: 100%;
    }
  </style>
</head>
<body>
  <div id="imgBox"><img src="{{ $path }}"></div>
</body>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '腾讯手游助手', // 分享标题
            link: window.location.href,
            imgUrl: "{{ asset('res/tencent/share.png') }}", // 分享图标
            success: function () {
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '腾讯手游助手', // 分享标题
            desc: "您有一份3d照片等待领取", // 分享描述
            link: window.location.href,
            imgUrl: "{{ asset('res/tencent/share.png') }}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
            }
        });
    });
</script>
</html>
