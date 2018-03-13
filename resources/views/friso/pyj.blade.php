<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="js/flexible.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/friso/pyj/css/swiper-4.1.6.min.css') }}">
    <link rel="stylesheet" href="{{ asset('res/friso/pyj/css/index.css') }}">
    <title>美素</title>
</head>
<body>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide page1">
                <img class="bg" src="{!! env('upload_url') . '/' . $path !!}" alt="">
                <div class="arrow">
                    <img src="{{ asset('res/friso/pyj/img/arrow.png') }}" alt="" >
                    <img src="{{ asset('res/friso/pyj/img/arrow.png') }}" alt="">
                </div>

            </div>
            <div class="swiper-slide page2">
                <img src="{{ asset('res/friso/pyj/img/ewm.png') }}" alt="">
            </div>
        </div>
    </div>

</body>
<script src="{{ asset('js/swiper-4.1.6.min.js') }}"></script>
<script>
    var mySwiper = new Swiper('.swiper-container',{
        direction:'vertical'
    })
</script>
</html>
