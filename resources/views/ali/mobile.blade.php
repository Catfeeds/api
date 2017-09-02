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
    <!--轮播图-->
    <div id="temp3">
        <ul class="JQ-slide-content">
            @for( $i=0;$i<10;$i++)
                <li>
                    <img src="{{ asset('upload/ali') .'/'. $ali->uid  . '/p' . $i . '.png' }}"/>
                </li>
            @endfor
        </ul>
    </div>
    <div class="text">
        <p>姓名:<span>{{ $ali->name }}花名</span></p>
        <p>2018财年累计申报<span>{{ $ali->hours }}</span>公益时</p>
    </div>
</div>

</body>
<script src="{{ asset('alibaba/js/jquery.1.4.2-min.js') }}"></script>
<script src="{{ asset('alibaba/js/jq.Slide.js') }}"></script>
<script>
    $(function () {
        //轮播图函数
        $("#temp3").Slide({
            effect: "fade",
            speed: "normal",
            timer: 200
        });
    })
</script>
</html>