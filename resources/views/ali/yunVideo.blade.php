<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('alibaba/yun/css/index2.css') }}">
    <title>我的Freestyle是今天不上班</title>
</head>
<body>
<section class="loading">
    <img src="{{ asset('upload/ali/yun/'.$pid.'/p0.png') }}" style="height: 640px;width: 1040px">
    <div class="textAll">
        <div class="text">加载中</div>
        <div class="num">0%</div>
    </div>
</section>
<section class="sequenceFrame hidden">
	<div class="can1 ">
        <canvas id="canvas1"></canvas>
	</div>
	<div class="can2 hidden">
        <canvas id="canvas2"></canvas>
	</div>
</section>
</body>
<script src="{{ asset('alibaba/yun/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('alibaba/yun/js/sequenceFrame.js') }}"></script>
<script src="{{ asset('alibaba/yun/js/pxloader-all.min.js') }}"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '2017杭州·云栖大会', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/ali/yunVideo?pid={{ $pid }}",
            imgUrl: "https://api.shanghaichujie.com/alibaba/aliShare.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '2017杭州·云栖大会', // 分享标题
            desc: "#我在云栖大会# 孤独球败，你点开试试看", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/ali/yunVideo?pid={{ $pid }}",
            imgUrl: "https://api.shanghaichujie.com/alibaba/aliShare.png", // 分享图标
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
            var URL = '';
            var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
            var realLoadingNum = 0;
            var fakeLoadingNum = 0;
            var myLoadingInterval = null;

            //添加图片到预加载
            var fileList = [];

            /*---------- 后台修改部分 start ----------*/
            for (var i = 1; i < 120; i++) {
                fileList.push('{{asset('upload/ali/yun/'.$pid)}}/p' + i + '.png')
            }
//            for(var i = 1; i < 7;i++){
//                fileList.push('img/'+i+'.png')
//            }
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
            for (var i = 1; i < 120; i++) {
                imgarr.push('{{asset('upload/ali/yun/'.$pid)}}/p' + i + '.png')
            }
            /*---------- 后台修改部分 end ----------*/
           		frame1 = new SequenceFrame({
	                id: $('#canvas1')[0],
	                width: 1040,
	                height: 640,
	                speed: 20,
	                loop: true,
	                autoplay: true,
	                imgArr: imgarr
	            })
          		frame2 = new SequenceFrame({
	                id: $('#canvas2')[0],
	                width: 1040,
	                height: 640,
	                speed: 20,
	                loop: true,
	                autoplay: true,
	                imgArr: imgarr
	            });
        })();
        
        //判断横竖屏状态
        (function(){

        	window.addEventListener("onorientationchange" in window ? "orientationchange" : "resize", function() {
		        if (window.orientation === 180 || window.orientation === 0) {
//		            alert('竖屏状态！');
					$('.can1').show();
					$('.can2').hide();
}
		        if (window.orientation === 90 || window.orientation === -90 ){
//		            alert('横屏状态！');
					$('.can1').hide();
					$('.can2').show();
}
		    }, false);
    })

</script>
</html>