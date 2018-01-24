<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>人人3小时</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="../../alibaba/h5/css/reset.css">
    <link rel="stylesheet" href="../../alibaba/h5/css/index2.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="all">
    <img class="bg" src="../../alibaba/h5/images/bg.png" alt="">
    <img id="clipBtn" src="../../alibaba/h5/images/btn.png" alt="">
    <img src="../../alibaba/h5/images/view.png" alt="" class="viewbg">
    <label for="file">
        <span>点击选择亲的照片</span>
        <input name="photo" style="display:none;" id="file" type="file" accept="image/*"/>
    </label>
    <input type="text" id="code" placeholder="请输入亲的工号">
    <div id="clipArea" class=""></div>
    <div id="view" class="hidden"></div>
</div>

</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="../../alibaba/h5/js/hammer.min.js"></script>
<script src="../../alibaba/h5/js/iscroll-zoom-min.js"></script>
<script src="../../alibaba/h5/js/lrz.all.bundle.js"></script>

<script src="../../alibaba/h5/js/PhotoClip.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '人人三小时', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "http://api.touchworld-sh.com/ali/h5",
            imgUrl: "http://api.touchworld-sh.com/alibaba/three/share.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '人人三小时', // 分享标题
            desc: "只有改变我们自己，这世界才会有一点点的改变", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "http://api.touchworld-sh.com/ali/h5",
            imgUrl: "http://api.touchworld-sh.com/alibaba/three/share.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            url: 'http://30.3.28.247/api/ali/user',
            timeout: 2000,
            error: function () {
                alert('请接入办公网络参与活动！');
            }
        })
    })

    new PhotoClip('#clipArea', {
        size: [410, 350],
        outputSize: 640,
        //adaptive: ['60%', '80%'],
        file: '#file',
        view: '#view',
        ok: '#clipBtn',
        //img: 'img/mm.jpg',
        loadStart: function () {
            $('#file').val('');
            console.log('开始读取照片');
            $('.viewbg').hide();
            $('#clipArea').show();

        },
        loadComplete: function () {
            console.log('照片读取完成');
        },
        done: function (dataURL) {
            let code = $('#code').val();
            if (code === '') {
                alert('亲请填写工号');
            } else {
                $.get(`http://30.3.28.247/api/ali/user?id=${code}`, function (res) {
                    if (res.code === 'true') {
                        if (res.hours <= 3.0) {
                            alert(`您当前公益时长${res.hours},未达到3小时，请再接再厉`);
                        } else {
                            //上传到服务器
                            let formData = new FormData();
                            formData.append('name', res.name);
                            formData.append('photo', dataURL);
                            formData.append('hours', res.hours);
                            $.ajax({
                                url: 'https://api.shanghaichujie.com/api/ali/h5/upload',
                                method: 'POST',
                                async: false,
                                data: formData,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                contentType: false,
                                processData: false,
                                success: function (res) {
                                    window.location.href = `{{ env('APP_URL') . '/' . 'ali/h5share/' }}${res}`;
                                },
                                error: function (res) {
                                    alert('上传失败，请检查网络');
                                }

                            });
                        }
                    } else {
                        alert('工号输入有误，请检查');
                    }
                }).fail(function (error) {
                        alert('网络出错，无法访问，请检查是否接入办公网络');
                    }
                )
            }
        },
        fail: function (msg) {
            alert(msg);
        }
    });

</script>
</html>
