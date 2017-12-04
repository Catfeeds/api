<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <title>LONGINES</title>
    <link rel="stylesheet" href="../../res/longines/css/normalize.css">
    <link rel="stylesheet" href="../../res/longines/css/animate.css">
    <link rel="stylesheet" href="../../res/longines/css/style.css">
</head>
<body>
    <!-- loading -->
    <section class="loading">
        <div class="num">0%</div>
        <div class="text">加载中。。。</div>
    </section>

    <img src="../../res/longines/images/on_black.png" class="switch">
    <audio src="../../res/longines/images/music.mp3" id="audio" preload="auto" loop="loop" autoplay="autoplay"></audio>
    
    <!-- page1 -->
    <section class="page1 hidden">
        <canvas id="tree"></canvas>
        <div class="progress_box hidden">
            <canvas id="horse"></canvas>
            <span></span>
        </div>
        <div class="tips">
            <img src="../../res/longines/images/horse/horse4.png" class="horse">
            <span>滑动屏幕让马匹奔跑。</span>
        </div>
        <div class="popup hidden">
            <p>圣诞快乐</p>
            <p>您已点亮圣诞树</p>
            <p><button>送祝福</button></p>
        </div>
    </section>

    <!-- page2 -->
    <section class="page2 hidden">
        <img src="../../res/longines/images/select1.png" class="select" id="select1">
        <img src="../../res/longines/images/select2.png" class="select" id="select2">
        <img src="../../res/longines/images/select3.png" class="select" id="select3">
        <img src="../../res/longines/images/select4.png" class="select" id="select4">
        <p>选择你的圣诞卡送给朋友或爱人</p>
    </section>

    <!-- scene1 -->
    <section class="scene1 scene hidden">
        <input type="text" placeholder="输入问候" class="input_text">
        <input type="text" placeholder="你的署名" class="input_username">
        <div><button id="scene1">发送给朋友</button></div>
    </section>

    <!-- scene2 -->
    <section class="scene2 scene hidden">
        <input type="text" placeholder="输入问候" class="input_text">
        <input type="text" placeholder="你的署名" class="input_username">
        <div><button id="scene2">发送给朋友</button></div>
    </section>

    <!-- scene3 -->
    <section class="scene3 scene hidden">
        <input type="text" placeholder="输入问候" class="input_text">
        <input type="text" placeholder="你的署名" class="input_username">
        <div><button id="scene3">发送给朋友</button></div>
    </section>
    <!-- scene4 -->
    <section class="scene4 scene hidden">
        <input type="text" placeholder="输入问候" class="input_text">
        <input type="text" placeholder="你的署名" class="input_username">
        <div><button id="scene4">发送给朋友</button></div>
    </section>
    
    <script src="../../res/longines/js/jquery.js"></script>
    <script src="../../res/longines/js/pxloader-all.min.js"></script>
    <script src="../../res/longines/js/sequenceFrame.js"></script>
    <script type="application/javascript">
        function socketIo() {
            $.get("{{ url('longines/socket') . '/' . $location }}");
        }
    </script>
    <script src="../../res/longines/js/main.js"></script>
    <script>
        var audio_state = 'on';
        var audio = document.getElementById('audio');
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play();
        }, false);
        window.addEventListener('touchstart', function firstTouch(){
            audio.play();
            this.removeEventListener('touchstart', firstTouch);
        });
        $('.switch').click(function(){
            if($('.switch').attr('src') == 'images/on_black.png'){
                //关闭黑色按钮
                $('.switch').attr('src', 'images/off_black.png');
                audio_state = 'off';
                audio.pause();
            }else if($('.switch').attr('src') == 'images/off_black.png'){
                //打开黑色按钮
                $('.switch').attr('src', 'images/on_black.png');
                audio_state = 'on';
                audio.play();
            }else if($('.switch').attr('src') == 'images/on_white.png'){
                //关闭白色按钮
                $('.switch').attr('src', 'images/off_white.png');
                audio_state = 'off';
                audio.pause();
            }else if($('.switch').attr('src') == 'images/off_white.png'){
                //打开白色按钮
                $('.switch').attr('src', 'images/on_white.png');
                audio_state = 'on';
                audio.play();
            }
        
        })
    </script>
</body>
</html>