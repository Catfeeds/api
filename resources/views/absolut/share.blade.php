<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABSOLUT</title>
    <script>
        (function flexible(window, documet) {
            var html = document.documentElement
            //  set 1rem = viewWidth / 10
            function setRemUnit() {
                var htmlWidth = html.clientWidth || document.body.clientWidth || document.body.getBoundingClientRect().width
                htmlWidth = htmlWidth > 750 ? 750 : htmlWidth
                html.style.fontSize = htmlWidth / 10 + 'px'
            }
            setRemUnit()
            //  reset rem unit on page resize
            window.addEventListener('resize', setRemUnit)
        }(window, document))
    </script>
    <style>
        html {
            /* 禁止选择文本 */
            /* 禁止文字自动调整大小*/
            -webkit-text-size-adjust: 100%;
        }

        body {
            font-family: "Helvetica Neue", Helvetica, STHeiTi, sans-serif;
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        ul,
        ol,
        dl,
        dd {
            margin: 0;
        }

        ul,
        ol {
            padding: 0;
            list-style: none;
        }

        img {
            border: none;
            vertical-align: top;
        }

        a {
            text-decoration: none;
        }

        img,
        a {
            /* 禁止长按页面弹出菜单 */
            -webkit-touch-callout: none;
        }

        input,
        button {
            outline: none;
            -webkit-appearance: none;
            border-radius: 0;
        }

        a,
        input,
        button {
            /* 禁止IOS点击元素高亮 */
            -webkit-tap-highlight-color: transparent;
        }

        /*隐藏滚轮*/
        ::-webkit-scrollbar {
            display: none;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/bg.jpg") no-repeat;
            background-size: 100% 100%;
        }

        section {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translate3d(0, -50%, 0);
            overflow: hidden;
            width: 10rem;
            height: 16.25rem;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/bg.jpg") no-repeat;
            background-size: 100% 100%;
        }

        section .logo {
            width: 2.15625rem;
            height: 0.45312rem;
            margin: 0.3125rem auto 0;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/logo.png") no-repeat;
            background-size: 100% 100%;
        }

        .page5 .share {
            position: absolute;
            right: 0.15625rem;
            top: 0.15625rem;
            width: 1.32812rem;
            height: 1.32812rem;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/share.png") no-repeat;
            background-size: 100% 100%;
        }

        .page5 .vase-bg {
            width: 7.07812rem;
            height: 19.875rem;
            margin: 0.15625rem auto 0;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/vase_bg.png") no-repeat;
            background-size: 100% 100%;
        }

        .page5 .tips {
            position: absolute;
            top: 1.5625rem;
            left: 0;
            right: 0;
            margin: auto;
            width: 4.65625rem;
            height: 0.5625rem;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/save.png") no-repeat;
            background-size: 100% 100%;
        }

        .page5 .image-box {
            position: absolute;
            left: 0;
            right: 0;
            top: 2.8125rem;
            width: 6.0625rem;
            height: 8.65625rem;
            margin: auto;
            background: rgba(159, 165, 123, 0.5);
        }

        .page5 .image-box img {
            width: 100%;
            height: 100%;
        }

        .page5 .again {
            position: absolute;
            top: 11.875rem;
            left: 0;
            right: 0;
            margin: auto;
            width: 2.4375rem;
            height: 0.51562rem;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/again.png") no-repeat;
            background-size: 100% 100%;
        }

        .page5 .qr_code {
            position: absolute;
            top: 13.125rem;
            left: 0;
            right: 0;
            margin: auto;
            width: 2.15625rem;
            height: 2.75rem;
        }

        .page5 .qr_code img {
            width: 100%;
            height: 100%;
        }

        .page5 .shareBox {
            display: none;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: url("https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/share_tips.png") rgba(0, 0, 0, 0.5) no-repeat;
            background-size: 4.70312rem 2.79688rem;
            background-position: top right;
        }

        .popup-generate {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .popup-generate p {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translate3d(0, -50%, 0);
            text-align: center;
            color: #fff;
        }
    </style>
</head>

<body>
<section class="page5">
    <div class="logo"></div>
    <div class="share"></div>
    <div class="vase-bg"></div>
    <div class="tips"></div>
    <div class="image-box"><img src="{{ $path }}"></div>
    <div class="again"></div>
    <div class="qr_code"><img src="https://touchworld.oss-cn-shanghai.aliyuncs.com/absolut/phone/qr_code.png"></div>
    <div class="shareBox"></div>
</section>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: 'ABSOLUT 绝对创意', // 分享标题
            link: window.location.href,
            imgUrl: "{{ url('res/absolut/share.png') }}", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: 'ABSOLUT 绝对创意', // 分享标题
            desc: " ", // 分享描述
            link: window.location.href,
            imgUrl: "{{ url('res/absolut/share.png') }}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    $(function () {
        $('.page5 .again').on('touchend', () => {
            window.location.replace('{{ url('res/phone/index') }}') // H5入口地址
        })
        $('.page5 .share').on('touchend', () => {
            $('.page5 .shareBox').show()
        })
        $('.page5 .shareBox').on('touchend', () => {
            $('.page5 .shareBox').hide()
        })
    })
</script>
</body>

</html>