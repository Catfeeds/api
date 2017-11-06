<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('mlike/mlike2/css/index.css') }}">
    <title>180度美丽无极限！这是你从没见过的我的另一面</title>
</head>
<body>
<section class="loading">
    <div class="textAll">
        <div class="text">加载中</div>
        <div class="num">0%</div>
    </div>
</section>
<section class="sequenceFrame hidden">
    <canvas id="canvas1"></canvas>
</section>
</body>
<script src="{{ asset('mlike/mlike2/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('mlike/mlike2/js/sequenceFrame.js') }}"></script>
<script src="{{ asset('mlike/mlike2/js/pxloader-all.min.js') }}"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type = "application/javascript" >
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
wx.ready(function () {
    // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
    wx.onMenuShareTimeline({
        title: '180度美丽无极限！这是你从没见过的我的另一面', // 分享标题
        {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
        link: "https://api.shanghaichujie.com/ali/myLike2?uid={{ $uid }}",
        imgUrl: "https://api.shanghaichujie.com/mlike/share2.jpg", // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
        }
    });
    // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
    wx.onMenuShareAppMessage({
        title: '180度美丽无极限！这是你从没见过的我的另一面', // 分享标题
        desc: "180度美丽无极限！这是你从没见过的我的另一面", // 分享描述
        {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
        link: "https://api.shanghaichujie.com/myLike2?uid={{ $uid }}",
        imgUrl: "https://api.shanghaichujie.com/mlike/share2.jpg", // 分享图标
        type: 'link', // 分享类型,music、video或link，不填默认为link
        success: function () {
            // 用户确认分享后执行的回调函数
        }
    });
});

$(function () {
    // loading
    (function () {
        var loader = new PxLoader();
        var URL = window.location.href;
        var BASE_PATH = '';
        var realLoadingNum = 0;
        var fakeLoadingNum = 0;
        var myLoadingInterval = null;

        //添加图片到预加载
        var fileList = [];

        /*---------- 后台修改部分 start ----------*/

        for (var i = 1; i <= 9; i++) {
            fileList.push("{{ asset('upload/myLike') .'/'. $uid  . '/p' }}" + i + '.jpg')
        }

        /*---------- 后台修改部分 end ----------*/

        for (var i = 0, len = fileList.length; i < len; i++) {
            var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);
            pxImage.imageNumber = i + 1;
            loader.add(pxImage);
        }
        loader.addCompletionListener(function () {
            console.log("预加载图片：" + fileList.length + "张");
        });
        loader.addProgressListener(function (e) {
            var percent = Math.round((e.completedCount / e.totalCount) * 100); //正序, 1-100
            realLoadingNum = percent;
        });
        myLoadingInterval = setInterval(function () {
            fakeLoadingNum++;
            if (realLoadingNum > fakeLoadingNum) {
                $(".loading .num").text(fakeLoadingNum + "%")
            } else {
                $(".loading .num").text(realLoadingNum + "%")
            }
            if (fakeLoadingNum >= 100 && realLoadingNum >= 100) {
                clearInterval(myLoadingInterval);
                $('.loading').hide();
                $('.sequenceFrame').show();

            }
        }, 30);
        loader.start();
    })();

    //序列帧播放
    (function () {
        var imgarr = [];
        /*---------- 后台修改部分 start ----------*/
        for (var i = 1; i <= 9; i++) {
            imgarr.push("{{ asset('upload/myLike') .'/'. $uid  . '/p' }}" + i + '.jpg');
        }
        for (var i = 9; i >= 1; i--) {
            imgarr.push("{{ asset('upload/myLike') .'/'. $uid  . '/p' }}" + i + '.jpg');
        }
        /*---------- 后台修改部分 end ----------*/
        frame1 = new SequenceFrame({
            id: $('#canvas1')[0],
            width: 480,
            height: 270,
            speed: 1200,
            loop: true,
            autoplay: true,
            imgArr: imgarr
        })
    })();

})

</script>
</html>