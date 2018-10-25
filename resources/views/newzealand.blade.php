<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新西兰展馆互动</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            position: relative;
            width: 100%;
            height: 100%;
            background: #f0f0f0;
            font-size: 0;
            text-align: center;
        }

        .wrap {
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translate3d(-50%, 0, 0);
            width: 93%;
        }

        img {
            width: 30%;
        }

        video {
            margin-top: 40px;
            width: 57%;
            background: #000;
            display: block;
            margin: 20px auto 0;
        }

        button {
            margin-top: 50px;
            padding: 15px 50px;
            color: #fff;
            border: none;
            border-radius: 5px;
            background: #09bb07;
            font-size: 16px;
        }
    </style>
</head>

<body>
<div class="wrap">
    <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/logo.png">
    <video src="{{ $path }}" controls download></video>
    <button>下载</button>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '进口博览会-新西兰馆', // 分享标题
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/logo.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '进口博览会-新西兰馆', // 分享标题
            desc: "您有一份来自新西兰馆的专属视频", // 分享描述
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/abbott/logo.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
    var btn = document.querySelector('button')
    var u = navigator.userAgent;

    btn.onclick = function () {
        if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) {
            //安卓手机
            var el_a = document.createElement('a');
            el_a.href = 'video.mp4';
            el_a.download = 'video.mp4';
            el_a.click();
        } else {
            var email = prompt('请输入邮箱');
            var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
            if (email === '') {
                alert('输入内容不能为空')
            } else if (!reg.test(email)) {
                alert('邮箱格式错误')
            } else {
                axios.post('https://api.shanghaichujie.com/api/newzealand/video/email', {
                    data: {
                        email: email,
                        path: '{{ $path }}'
                    }
                }).then(function (res) {
                    if (res.code === 0) {
                        alert('下载成功')
                    }
                })
            }
        }
    }
</script>
</body>

</html>