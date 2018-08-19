<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>盐城绿色智慧能源大会</title>
    <script src="js/rem.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<audio src="media/music.mp3" id="bgm" autoplay loop></audio>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <section class="page1 swiper-slide">
            <img src="images/page1_logo.png" class="logo ani" swiper-animate-effect="fadeInDown">
            <img src="images/page1_invitation.png" class="invitation ani" swiper-animate-effect="zoomIn"
                 swiper-animate-delay="0.5s">
            <img src="images/page1_subTitle.png" class="subTitle ani" swiper-animate-effect="fadeInUp"
                 swiper-animate-delay="1s">
            <img src="images/arrow.png" class="arrow">
        </section>
        <section class="page2 swiper-slide">
            <img src="images/page2_logo.png" class="logo">
            <img src="images/page2_title.png" class="title ani" swiper-animate-effect="fadeInDown">
            <img src="images/page2_content.png" class="content ani" swiper-animate-effect="zoomInUp"
                 swiper-animate-duration="2s">
            <img src="images/arrow.png" class="arrow">
        </section>
        <section class="page3 swiper-slide">
            <img src="images/page3_logo.png" class="logo">
            <img src="images/page3_content.png" class="content ani" swiper-animate-effect="fadeInUp">
            <img src="images/arrow.png" class="arrow">
        </section>
        <section class="page4 swiper-slide">
            <img src="images/page3_logo.png" class="logo">
            <img src="images/page4_content.png" class="content ani" swiper-animate-effect="fadeInUp">
            <img src="images/arrow.png" class="arrow">
        </section>
        <section class="page5 swiper-slide">
            <img src="images/page5_logo.png" class="logo">
            <img src="images/page5_content.png" class="content ani" swiper-animate-effect="zoomIn">
            <img src="images/arrow.png" class="arrow">
        </section>
        <section class="page6 swiper-slide">
            <img src="images/page5_logo.png" class="logo">
            <img src="images/page6_content.png" class="content ani" swiper-animate-effect="zoomIn">
            <img src="images/arrow.png" class="arrow">
        </section>
        <section class="page7 swiper-slide">
            <img src="images/page5_logo.png" class="logo">
            <img src="images/page7_content.png" class="content ani" swiper-animate-effect="zoomIn">
            <img src="images/arrow.png" class="arrow">
        </section>
        <section class="page8 swiper-slide">
            <img src="images/page8_logo.png" class="logo">
            <div class="required ani" swiper-animate-effect="bounceIn">
                <div class="title">*必填项:</div>
                <p>姓名：
                    <input type="type" class="username">
                </p>
                <p>手机：
                    <input type="type" class="mobile">
                </p>
                <p>公司名称：
                    <input type="type" class="companyname">
                </p>
                <p>邮箱：
                    <input type="type" class="email">
                </p>
                <p class="updatePic">
            <span class="text">照片：
              <strong class="photoid">(证件照, 2M以内, 600px以上)</strong>
            </span>
                    <span class="updateBox">
              <input type="file" id="file" accept="image/*">
              <button>上传</button>
            </span>
                </p>
            </div>
            <div class="selection ani" swiper-animate-effect="bounceIn">
                <div class="title">选填项:</div>
                <p>
                    <span>是否提前入住当地酒店：</span>
                    <span class="radioBox">是
              <input class="radio" type="radio" name="hotel" value="true">&nbsp;&nbsp;&nbsp;</span>
                    <span class="radioBox">否
              <input class="radio" type="radio" name="hotel" value="false">
            </span>
                </p>
                <p>请在以下主题论坛中挑选要参加的场次(最多选择2场)：</p>
                <p class="checkbox1">
                    <input class="checkbox" type="checkbox" name="forums" value="1">9月7日 9:00-12:00 主题论坛一：智慧电网论坛</p>
                <p class="checkbox1">
                    <input class="checkbox" type="checkbox" name="forums" value="2">9月7日 9:00-12:00 主题论坛二：海上风电发展及产业链论坛
                </p>
                <p class="checkbox1">
                    <input class="checkbox" type="checkbox" name="forums" value="3">9月7日 9:00-12:00 主题论坛三：光伏产业发展论坛</p>
                <p class="checkbox2">
                    <input class="checkbox" type="checkbox" name="forums" value="4">9月7日 14:00-17:00 主题论坛四：燃气产业发展论坛</p>
                <p class="checkbox2">
                    <input class="checkbox" type="checkbox" name="forums" value="5">9月7日 14:00-17:00 主题论坛五：电动车及储能论坛</p>
                <p class="invitecode">参会邀请码：
                    <input type="text">
                </p>
                <p class="submit">
                    <button></button>
                </p>
            </div>
        </section>
        <section class="page9 swiper-slide">
            <img src="images/page9_logo.png" class="logo">
            <img src="images/page9_content.png" class="content animated bounce">
        </section>
    </div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/swiper.animate1.0.3.min.js"></script>
<script src="js/index.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '盐城绿色智慧能源大会', // 分享标题
            link: "http://api.shanghaichujie.com/html/energy/index",
            imgUrl: "http://api.shanghaichujie.com/alibaba/three/share.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '盐城绿色智慧能源大会', // 分享标题
            desc: "主题：创新、绿色、智慧、共享", // 分享描述
            link: "http://api.shanghaichujie.com/html/energy/index",
            imgUrl: "http://api.shanghaichujie.com/html/energy/images/share.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
</script>
</body>

</html>