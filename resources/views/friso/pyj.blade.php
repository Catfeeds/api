<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="{{ asset('res/friso/pyj/js/flexible.js') }}"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/friso/pyj/css/index.css') }}">
    <title>美素佳儿</title>
</head>
<body>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide page1">
                <img class="bg" src="{!! env('upload_url') . '/' . $path !!}" alt="">
                <a class="btn" href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxd32fafd4a4fd991a&redirect_uri=http%3a%2f%2ffrisowechat.rfc-china.com%2fWebService%2fVendorAuthCB.aspx%3fVendorId%3d1073&response_type=code&scope=snsapi_base&state=0#wechat_redirect">
                    <img  src="{{ asset('res/friso/pyj/img/btn.png') }}" alt="">
                </a>
                <p>长按保存图片</p>
            </div>
        </div>
    </div>

</body>
</html>
