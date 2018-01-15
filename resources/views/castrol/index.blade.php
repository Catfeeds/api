<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="../../res/castrol/css/reset.css">
    <link rel="stylesheet" href="../../res/castrol/css/swiper.min.css">
    <link rel="stylesheet" href="../../res/castrol/css/layui.css">
    <link rel="stylesheet" href="../../res/castrol/css/index.css">
    <title>嘉实多</title>
</head>

<body>
    <section id="home" class="">
        <div class="main" id="main">
            <div class="picAll">
            </div>
        </div>
        <div class="btn">
            <img src="../../res/castrol/img/bigImage.png" alt="" class="btn_bigImage">
        </div>
    </section>
    <section id="swiper" class="hide">
        <div class="bigImage_cancel">
            X
        </div>
        <div class="swiper-container" id="swiper">
            <!--放大图-->
            <div class="swiper-wrapper">
            </div>
        </div>
        <div class="bigImage_info">
            <div class="bigImage_download">
                <span>下载</span>
            </div>
        </div>
    </section>
    <div class="bigImage_popup hidden">
        <div class="bigImage">
            <img src="../../res/castrol/img/big.png" alt="">
        </div>
        <div class="popup_cancel">X</div>
    </div>



</body>
<script src="../../res/castrol/js/jquery.js"></script>
<script src="../../res/castrol/js/layui.js"></script>
<script src="../../res/castrol/js/swiper.min.js"></script>
<script type="application/javascript">
    // ...............begin..............
    @foreach($paths as $path)
    $('.picAll').append('<div class="box"><img lay-src="{{ env('APP_URL') . '/upload/' . $path->path }}" alt=""></div>');
    @endforeach
    // .............end..............
</script>
<script src="../../res/castrol/js/index.js"></script>
</html>
