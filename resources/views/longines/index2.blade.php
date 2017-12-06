<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LONGINES</title>
    <link rel="stylesheet" href="{{ asset('res/longines/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('res/longines/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('res/longines/css/style.css') }}">
</head>
<body>
<!-- loading -->
<section class="loading">
    <div class="num">0%</div>
    <div class="text">加载中。。。</div>
</section>

<img src="{{ asset('res/longines/images/on_black.png') }}" class="switch">
<audio src="{{ asset('res/longines/images/music.mp3') }}" id="audio" preload="auto" loop="loop"
       autoplay="autoplay"></audio>

<!-- page1 -->
<section class="page1 hidden">
    <canvas id="tree"></canvas>
    <div class="progress_box hidden">
        <canvas id="horse"></canvas>
        <span></span>
    </div>
    <div class="tips">
        <img src="{{ asset('res/longines/images/horse/horse4.png') }}" class="horse">
        <span>滑动屏幕让马匹奔跑。</span>
    </div>
    <div class="popup hidden">
        <p>圣诞快乐</p>
        <p>您已点亮圣诞树</p>
        <p>
            <button>送祝福</button>
        </p>
    </div>
</section>

<!-- page2 -->
<section class="page2 hidden">
    <img src="{{ asset('res/longines/images/select1.png') }}" class="select" id="select1">
    <img src="{{ asset('res/longines/images/select2.png') }}" class="select" id="select2">
    <img src="{{ asset('res/longines/images/select3.png') }}" class="select" id="select3">
    <img src="{{ asset('res/longines/images/select4.png') }}" class="select" id="select4">
    <p>选择你的圣诞卡送给朋友或爱人</p>
</section>

<!-- scene1 -->
<section class="scene1 scene hidden">
    <input type="text" placeholder="输入问候" id="text">
    <input type="text" placeholder="你的署名" id="username">
    <div>
        <button id="scene1">发送给朋友</button>
    </div>
</section>

<!-- scene2 -->
<section class="scene2 scene hidden">
    <input type="text" placeholder="输入问候" id="text">
    <input type="text" placeholder="你的署名" id="username">
    <div>
        <button id="scene2">发送给朋友</button>
    </div>
</section>

<!-- scene3 -->
<section class="scene3 scene hidden">
    <input type="text" placeholder="输入问候" id="text">
    <input type="text" placeholder="你的署名" id="username">
    <div>
        <button id="scene3" >发送给朋友</button>
    </div>
</section>

<!-- scene4 -->
<section class="scene4 scene hidden">
    <input type="text" placeholder="输入问候" id="text">
    <input type="text" placeholder="你的署名" id="username">
    <div>
        <button id="scene4">发送给朋友</button>
    </div>
</section>

<!-- show scene -->
<section class="show_scene hidden">
    <div class="share_box">
        <span>分享朋友圈可前往店铺领取精美礼品</span>
        <img src="{{ asset('res/longines/images/share.png') }}">
    </div>
    <div class="text hidden"></div>
    <div class="username hidden"></div>
</section>

<script src="{{ asset('res/longines/js/jquery.js') }}"></script>
<script src="{{ asset('res/longines/js/pxloader-all.min.js') }}"></script>
<script src="{{ asset('res/longines/js/sequenceFrame.js') }}"></script>
<script src="https://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.service.sdk.min.js" type="text/javascript"></script>

<script type="application/javascript">
    function socketIo() {
        $.get("{{ url('longines/socket') . '/' . $location }}");
    }
</script>
<script src="{{ asset('res/longines/js/main.js') }}"></script>
</body>
</html>
