<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>斑马</title>
    <meta name="viewport" content="width=640,user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <!-- force webkit on 360 -->
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <!-- force edge on IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    <!-- force full screen on some browser -->
    <meta name="full-screen" content="yes"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <!-- force screen orientation on some browser -->
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-orientation" content="portrait">
    <link rel="stylesheet" href="{{ asset('alibaba/bm/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('alibaba/bm/css/style.css') }}">
</head>
<body>
    <section>
        <div class="video1">
            <img src="{{ asset('alibaba/bm/images/city.png') }}" id="img1">
            <video 
                id="video1"
                controls
                preload="auto" 
                src="{{ asset('alibaba/bm/images/video.mp4') }}"
                >
            </video>
        </div>
        <div class="video2">
            <img src="{{ asset('alibaba/bm/images/self.png') }}" id="img2">
            <video
                id="video2"
                controls
                preload="auto" 
                src="{{ asset('alibaba/bm/images/video.mp4') }}"
            >
            </video>
        </div>
    </section>
    <script type="text/javascript">
        var video1 = document.getElementById('video1');
        var video2 = document.getElementById('video2');
        var img1 = document.getElementById('img1');
        var img2 = document.getElementById('img2');

        img1.addEventListener('touchstart',_touchstart,false);
        img2.addEventListener('touchstart',_touchstart,false);

        img1.addEventListener('touchend',_touchend,false);
        img2.addEventListener('touchend',_touchend,false);

        function _touchstart(e){
            switch (e.target.id){
                case 'img1':
                    img1.style.transform = "scale(0.9)";
                    break;
                case 'img2':
                    img2.style.transform = "scale(0.9)";
                    break;
                default:
                    break;
            }
        }

        function _touchend(e){
            switch (e.target.id){
                case 'img1':
                    img1.style.transform = "scale(1)";
                    video1.play();
                    break;
                case 'img2':
                    img2.style.transform = "scale(1)";
                    video2.play();
                    break;
                default:
                    break;
            }
        }
    </script>
</body>
</html>