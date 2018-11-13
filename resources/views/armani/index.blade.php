<!DOCTYPE html>
<html xmlns:wb="https://open.weibo.com/wb">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/armani/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('res/armani/css/index.css') }}">
    <title>GIORGIO ARMANI</title>
    <script src="https://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
    <div class="wrapper">
        <section>
            <img src="{{ asset('res/armani/img/logo.png') }}" alt="" class="logo">
            <video
            id="video"
            src="{{ $videoPath }}"
            controls
            x5-video-player-type = "h5"
            x5-video-player-fullscreen="true"
            webkit-playsinline
            playsinline
            preload="preload"
            autoplay
            loop="loop"
            ></video>
            <a class="btnDownloadShare" href="{{ $videoPath }}" download="" > 下载您的视频</a>
            <div class="btnShare">
                <wb:share-button class="wb" appkey="1643480269" addition="simple" type="button" default_text="查看我的Armani Box专属视频"></wb:share-button>
            </div>
            <a class="btnVideoShare"> 分享您的视频</a>
            <div class="ipopup hide">
                <div class="con-wrapper">
                    <input type="text" placeholder="请输入邮箱地址">
                    <div class="btn">
                        <span class="submit">提交</span>
                        <span class="close">关闭</span>
                    </div>
                    <p>请输入你的邮箱地址，系统自动将您的视频发送到您的邮箱</p>
                    <div class="rta hide">
                        <img src="{{ asset('res/armani/img/loading.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="apopup hide">
                <img src="{{ asset('res/armani/img/arr.png') }}" alt="" class="arr">
                <p  class="text">
                    打开手机浏览器<br>
                    <span>在浏览器中进行下载</span>
                </p>
            </div>
        </section>
    </div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">


    // 提交邮箱
    $('.submit')[0].addEventListener('touchstart',submit);
    var isClick = true;
    function submit(){
        var val = $('input').val();
        var reg = /^\w+@[a-z0-9]+(\.[a-z]+){1,3}$/;
        if(val == ''){
            alert('请输入正确的邮箱地址');
        }else if(!reg.test(val)){
            alert('请输入正确的邮箱格式');
        }else{
            // alert('提交成功');
            if(isClick){
                $('.rta').show();
                email(val);
            }else{
                alert('您已发送过视频，请勿重新发送')
            }

        }
    }
    var path = '{{ $videoPath }}';
    function email(email) {
        $.ajax({
            url: `{{ url('api/armani/email') }}?email=${email}&path=${ encodeURIComponent('{{ $path }}')}`,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method: 'GET',
        }).done(function (res) {
            alert('发送成功');
            $('.rta').hide();
            isClick = false;

        }).fail(function (res) {
            alert('发送失败');
        })
    }
</script>
<script src="{{ asset('res/armani/js/index.js') }}"></script>
</html>
