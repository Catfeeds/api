<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>亚航三周年庆典</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background: #f0f0f0;
            font-size: 0;
            text-align: center;
            background: url(https://h5-touch.oss-cn-shanghai.aliyuncs.com/20190118_ship/bg.jpg) no-repeat #0d3568 top center;
            background-size: cover;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            flex: 0 0 200px;
            width: 100%;
            height: 200px;
        }

        .header img {
            height: 50%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            flex: 1;
            width: 100%;
        }

        .container video {
            background: #000;
            width: 90%;
            height: 100%;
        }

        .footer {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            flex: 0 0 150px;
            width: 100%;
            height: 150px;
        }

        .footer button {
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
<div class="header">
    <!-- <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marathon/title.png"> -->
</div>
<div class="container">
    <video src="{{ $path }}" controls webkit-playsinline="true"
           playsinline="true"></video>
</div>
<div class="footer">
    <button>下载</button>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '亚航三周年庆典', // 分享标题
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/%E5%A4%A7%E8%BF%9E%E4%BA%9A%E8%88%AA.jpeg", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '亚航三周年庆典', // 分享标题
            desc: "亚航周年庆典留念照", // 分享描述
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/%E5%A4%A7%E8%BF%9E%E4%BA%9A%E8%88%AA.jpeg", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
    $('button').on('touchend', function(){
        var email = prompt('请输入邮箱');
        email = email.trim()
        if (email === '') {
            alert('输入内容不能为空')
        } else if (!reg.test(email)) {
            alert('邮箱格式不正确')
        } else {
            $.ajax({
                url: '',
                type: '',
                data: {
                    email: email
                },
                success: function () {
                    alert('邮件发送成功！')
                },
                error: function () {
                    alert('发送失败，请检查网络')
                }
            })
        }
    })
</script>
</body>

</html>