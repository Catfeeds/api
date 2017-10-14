<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <title>AIA游戏互动</title>
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
                战绩榜
            </a>
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
        <img src="{{ asset('aia/html/img/ewm.png') }}" alt="" class="ewm">
        <p><a href="http://my.aia.com.cn">点击此处,</a>登录易服务即可抽奖，无人机，京东券等您来带走</p>
        <img src="{{ asset('aia/html/img/food_cancel.png') }}" alt="" class="cancel">
    </div>
</section>

</body>
<script src="{{ asset('aia/html/js/jquery-1.11.3.min.js') }}"></script>
<script>
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