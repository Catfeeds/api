<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/armani/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('res/armani/css/index.css') }}">
    <title>阿玛尼</title>
</head>
<body>
    <div class="wrapper">
        <section>
            <img src="{{ asset('res/armani/img/logo.png') }}" alt="" class="logo">
            <video
            id="video"
            src="{{ $path }}"
            controls
            x5-video-player-type = "h5"
            x5-video-player-fullscreen="true"
            webkit-playsinline
            playsinline
            preload="preload"
            autoplay
            loop="loop"
            ></video>
            <a class="btnDownloadShare" download="" > 下载您的视频</a>
            <a class="btnVideoShare"> 分享您的视频</a>
            <div class="ipopup hide">
                <div class="con-wrapper">
                    <input type="text" placeholder="请输入邮箱地址">
                    <div class="btn">
                        <span class="submit">提交</span>
                        <span class="close">关闭</span>
                    </div>
                    <p>请输入你的邮箱地址，系统自动将您的视频发送到您的邮箱</p>
                </div>
            </div>
            <div class="apopup hide">
                <img src="{{ asset('res/armani/img/arr.png') }}" alt="" class="arr">
                <p  class="text">
                    打开手机浏览器<br>
                    <span>在浏览器中进行下载</span>
                </p>
            </div>
        </section>
    </div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script type="application/javascript">
    var path = '{{ $path }}';
</script>
<script src="{{ asset('res/armani/js/index.js') }}"></script>
</html>
