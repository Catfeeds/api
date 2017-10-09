<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('alibaba/yun/css/index2.css') }}">
    <title>2017杭州·云栖大会</title>
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
    <canvas id="canvas"></canvas>
</section>
</body>
<script src="{{ asset('alibaba/yun/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('alibaba/yun/js/sequenceFrame.js') }}"></script>
<script src="{{ asset('alibaba/yun/js/pxloader-all.min.js') }}"></script>
<script>
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
                id: $('#canvas')[0],
                width: 1040,
                height: 640,
                speed: 80,
                loop: true,
                autoplay: true,
                imgArr: imgarr
            });
        })();
    })

</script>
</html>