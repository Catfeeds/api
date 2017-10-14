<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <title>AIA游戏互动</title>
    <link rel="stylesheet" href="{{ asset('aia/html/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('aia/html/css/aia.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<section class="rank ">
    <div class="record">
        <div class="recordText">
            <p>你已获得<span>高级技师</span>健康大厨称号,</p>
            <p>您本次游戏得分<span>{{ $score }}</span>,</p>
            <p>历史最高得分<span>{{ $topScore }}</span>,</p>
            <p>击败了<span>{{$rank}}</span>%的其他健康大厨.</p>
            <p class="space">今天还有<span>{{ $userCount }}</span>次挑战机会。继续加油！</p>
            <p>点击"我要参加"</p>
            <p>客服节线下活动赢好礼!</p>
            <p class="red">击败80%的玩家还有机会</p>
            <p class="red">额外参加抽奖哦!</p>
        </div>
    </div>
    <div class="btn">
        <img class="join" src="{{ asset('aia/html/img/join.png') }}" alt="">
        <img class="share" src="{{ asset('aia/html/img/share.png') }}" alt="">
    </div>
    <img src="{{ asset('aia/html/img/hand.png') }}" alt="" class="hand">
    <div class="popup hidden">
        <img src="{{ asset('aia/html/img/sharebg.png') }}" alt="" class="popup">
    </div>

</section>
<section class="food hidden">
    <div class="food_y">
        <form action="{{ url('aiaGame/phone') }}" method="post">
            {{ csrf_field() }}
            <input id="ipu" class="ipu" name="ipu" type="text" value="" placeholder="输入易服务登录手机号码">
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
//        joinBtn
        $('.join').click(function () {
            $('.rank').hide().siblings().show();
        })
//        share
        $('.share').click(function () {
            $('.popup').show();
        })
//        popup
        $('.popup').click(function () {
            $(this).hide();
        })
//        cancel
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
                $('#ipu').val('');
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