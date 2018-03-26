<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="{{ asset('res/friso/pyj/js/flexible.js') }}"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/friso/pyj/css/index.css') }}">
    <title>美素</title>
</head>
<body>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide page1">
                <img class="bg" src="{!! env('upload_url') . '/' . $path !!}" alt="">
                <a class="btn" href="http://frisowechat.rfc-china.com/frontPage/Reg.aspx?regsourceid=180&retUrl=https%3a%2f%2fapi.shanghaichujie.com%2ffriso%2freward">
                    <img  src="{{ asset('res/friso/pyj/img/btn.png') }}" alt="">
                </a>
                <p>长按保存图片</p>
            </div>
        </div>
    </div>

</body>
</html>
