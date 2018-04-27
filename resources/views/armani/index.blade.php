<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/armani/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('res/armani/css/index.css') }}">
    <title>阿玛尼</title>
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
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '查看我的#Armani Box#专属视频', // 分享标题
            link: "{{ $url }}",
            imgUrl: "{{ asset('res/armani/share.png') }}", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: 'Armani Box', // 分享标题
            desc: "查看我的#Armani Box#专属视频", // 分享描述
            link: "{{ $url }}",
            imgUrl: "{{ asset('res/armani/share.png') }}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    // 提交邮箱
    $('.submit')[0].addEventListener('touchstart',submit);
    function submit(){
        var val = $('input').val();
        var reg = /^\w+@[a-z0-9]+(\.[a-z]+){1,3}$/;
        if(val == ''){
            alert('请输入正确的邮箱地址');
        }else if(!reg.test(val)){
            alert('请输入正确的邮箱格式');
        }else{
            // alert('提交成功');
            $('.rta').show();
            email(val);
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
            $('.submit')[0].removeEventListener('touchstart',submit)
        }).fail(function (res) {
            alert('发送失败');
        })
    }
</script>
<script src="{{ asset('res/armani/js/index.js') }}"></script>
</html>
