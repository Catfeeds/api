<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>科思创</title>
    <meta name="description" content="科思创">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1, maximum-scale=1,,user-scalable=no">
    <meta name="format-detection" content="telephone=no,email=no"/>
    <meta http-equiv="X-UA-Compatible" content="chrome=1"/>
    <link rel="stylesheet" href="{{asset('css/common.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
<div class="page position">
    <div class="logo">
        <img src="{{asset('img/logo.png')}}"/>
    </div>
    <audio id="audio" preload>
        <source src="{{asset($path)}}"></source>
    </audio>
    <div class="text position">
        <img src="{{asset('img/text.png')}}"/>
    </div>
    <div class="center position">
        <img src="{{asset('img/4_03.png')}}"/>
    </div>
    <div class="btm position">
        <img id="playBtm" src="{{asset('img/audioBtn.png')}}"/>
    </div>
</div>

</body>
<script type="text/javascript">
    var playBtm = document.getElementById('playBtm');
    var audio = document.getElementById('audio')

    playBtm.addEventListener('touchstart',function(){

        audio.play();

    })


</script>
</html>
