<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>人人三小时</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('alibaba/css/index.css') }}">
</head>
<body>
<div class="all">
    <!--序列帧-->

    <canvas id='canvas'></canvas>
    <div class="text">
        <p>姓名:<span>{{ $ali->name }}</span></p>
        <p>2018财年累计申报<span>{{ $ali->hours }}</span>公益时</p>
    </div>
</div>
{{--<div class="all">--}}
{{--<!--轮播图-->--}}
{{--<div id="temp3">--}}
{{--<ul class="JQ-slide-content">--}}
{{--@for( $i=0;$i<10;$i++)--}}
{{--<li>--}}
{{--<img src="{{ asset('upload/ali') .'/'. $ali->uid  . '/p' . $i . '.png' }}"/>--}}
{{--</li>--}}
{{--@endfor--}}
{{--</ul>--}}
{{--</div>--}}
{{--<div class="text">--}}
{{--<p>姓名:<span>{{ $ali->name }}</span></p>--}}
{{--<p>2018财年累计申报<span>{{ $ali->hours }}</span>公益时</p>--}}
{{--</div>--}}
{{--</div>--}}

</body>
<script src="{{ asset('alibaba/js/jquery.1.4.2-min.js') }}"></script>
<script src="{{ asset('alibaba/js/sequenceFrame.js') }}"></script>
<script>
    $(function () {
        //轮播图函数
        var imgarr = [];
        //有多少张图片，len就等于多少;
        var len = 10;
        for (var i = 0; i < len; i++) {
            imgarr.push("{{ asset('upload/ali') .'/'. $ali->uid  . '/p' }}" + i + '.png');
        }
        for (var j = len - 1; j >= 0; j--) {
            imgarr.push("{{ asset('upload/ali') .'/'. $ali->uid  . '/p' }}" + j + '.png');
        }
        var frame2 = new SequenceFrame({
            id: $('#canvas')[0],
            width: 480,
            height: 270,
            speed: 200,
            loop: true,
            imgArr: imgarr
        });

    })
</script>
</html>