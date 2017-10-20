<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <title>AIA游戏互动</title>

    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?38864d7b5e167cbe62587e75b760dbc0";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

    <link rel="stylesheet" href="{{ asset('aia/html/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('aia/html/css/aia.css ') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<section class="custom">
    <div class="greens">

        {{--根据失败的不同关卡，显示不同--}}
        <img src="{{ asset('aia/html/img/'.$scene.'.png') }}" alt="" class="text{{$scene}}">

    </div>
    <div class="text">
        <p>可点击
            <a href="https://api.shanghaichujie.com/aiaGame/result?
                openid={{$wechatInfo['id']}}&time={{$time}}&score={{$score}}">
                战绩榜</a>
            ,点击后进入
        </p>
        <p>战绩榜页面.</p>
        <p>失败了没关系</p>
        <p>再接再厉获得属于您的称号,</p>
        <p>点击"我要参加"</p>
        <p>客服节线下活动赢好礼!</p>
    </div>
    <div class="btn">
        <img src="{{ asset('aia/html/img/join.png') }}" alt="" class="join">
        <a class="replay" href="{{ url('aiaGame/index') }}">
            <img src="{{ asset('aia/html/img/replay.png') }}" alt="">
        </a>
    </div>

</section>
<section class="food hidden">
    <div class="food_y">
        <form action="{{ url('aiaGame/phone') }}" method="post">
            {{ csrf_field() }}
            <input class="ipu" id="ipu" name="ipu" type="text" placeholder="输入易服务登录手机号码">
            <label for="sub">
                <input style="display: none" id="sub" type="submit">
                <img src="{{ asset('aia/html/img/food_btn.png') }}" alt="">
            </label>
        </form>
        <p><a id="aiaUrl" href="http://my.aia.com.cn">点击此处,</a>登录易服务即可抽奖，无人机，京东券等您来带走</p>
        <img src="{{ asset('aia/html/img/food_cancel.png') }}" alt="" class="cancel">
    </div>
</section>

</body>
<script src="{{ asset('aia/html/js/jquery-1.11.3.min.js') }}"></script>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '【我是健康大厨】友邦客服节养生PK游戏，带您玩转美食赢好礼', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/aiaGame/index",
            imgUrl: "https://api.shanghaichujie.com/aia/aiaLogo.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '【我是健康大厨】友邦客服节养生游戏，做美食赢好礼', // 分享标题
            desc: "快来和我PK吧！跟AIA一起揭秘养生餐", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/aiaGame/index",
            imgUrl: "https://api.shanghaichujie.com/aia/aiaLogo.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

    (function () {
        var val = '{{ is_null($userInfo->phone) ? '' : $userInfo->phone }}';//用户手机号

        //join
        $('.join').click(function () {
            $('.food').show().siblings().hide();
        })
        // cancel
        $('.cancel').click(function () {
            $('.food').hide().siblings().show();
        })
        //form
        var status = false;
        if (val != '') {
            $('#ipu').val(val)
        }
        $('#ipu').blur(function () {
            var reg = /^[0-9]{11}$/;
            if (reg.test($('#ipu').val())) {
                status = true;
            } else {
                alert('请输入正确的手机号码');
            }
            ;

        })
        $('form').submit(function () {
            if (status == false) {
                alert('请输入正确的手机号码');
                return false;
            } else {
                return true;
            }
        })

    })();

    @if(session('status'))
        alert('手机号成功录入，感谢您的参与！');

    @endif
</script>
</html>