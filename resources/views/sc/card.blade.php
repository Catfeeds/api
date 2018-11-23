<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>渣打银行梦想留言机</title>
    <script src="js/amfe-flexible.js"></script>
    <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
<section>
    <div class="title">
        <img src="./imgs/title.png">
    </div>
    <div class="container">
        <div class="content_wrapper">
            <div class="content">
                <!-- 模板start -->
                <img class="content_bg" src="./imgs/{{ $type }}.jpg">
                <audio class="audio1" src="./media/{{ $type }}.mp3" preload></audio>
                <audio class="audio2" src="{{ $path }}" preload></audio>
                <!-- 模板end -->
                <img class="content_btn" src="./imgs/play.png">
                <p>点击播放</p>
            </div>
        </div>
    </div>
    <div class="qrCode">
        <img src="./imgs/qr_code.png">
    </div>
</section>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '你有一封来自{{ $country }}的语音明信片，请查收！', // 分享标题
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/%E6%A2%A6%E6%83%B3%E6%B8%B8%E4%B9%90%E5%9B%ADlogo.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '你有一封来自{{ $country }}的语音明信片，请查收！', // 分享标题
            desc: "我在上海K11四楼渣打银行梦想游乐园给你录了一封语音明信片", // 分享描述
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/%E6%A2%A6%E6%83%B3%E6%B8%B8%E4%B9%90%E5%9B%ADlogo.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
    var playURL = './imgs/play.png'
    var pauseURL = './imgs/pause.png'
    $('.content_btn').on('touchend', function () {
      if ($(this).attr('src') === playURL) {
        // 播放
        $(this).attr('src', pauseURL)
        $('.audio1')[0].load()
        $('.audio2')[0].load()
        $('.audio1')[0].play()
        $('.audio2')[0].play()
      } else if ($(this).attr('src') === pauseURL) {
        // 暂停
        $(this).attr('src', playURL)
        $('.audio1')[0].pause()
        $('.audio2')[0].pause()
      }
    })
    $('.audio2').on('ended', function () {
      $(this).attr('src', pauseURL)
      $('.audio1')[0].pause()
      $('.audio2')[0].pause()
    })
</script>
</body>

</html>