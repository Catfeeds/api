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
            <p>你已获得
                <span>
                    @if($userInfo->totalScore < 500)
                        见习
                    @elseif($userInfo->totalScore<1000)
                        初级
                    @elseif($userInfo->totalScore<1500)
                        中级
                    @elseif($userInfo->totalScore<2000)
                        高级
                    @elseif($userInfo->totalScore<3000)
                        技师
                    @else
                        高级技师
                    @endif
                </span>
                健康大厨称号,
            </p>
            <p>您本次游戏得分<span>{{ $score }}</span>,</p>
            <p>历史最高得分<span>{{ $topScore }}</span>,</p>
            <p>击败了<span>{{$rank}}</span>%的其他健康大厨.</p>
            <p class="space">今天还有<span>{{ 3-$userCount }}</span>次挑战机会。继续加油！</p>
            <p>点击"我要参加"</p>
            <p>客服节线下活动赢好礼!</p>
            <p class="red">击败50%的玩家还有机会</p>
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

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '【我是健康大厨】友邦客服节养生PK游戏，不但会吃还会玩，更有线下活动好礼等您拿，AIA带您玩转健康美食赢好礼！', // 分享标题
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/aiaGame/index",
            imgUrl: "https://api.shanghaichujie.com/aia/aiaShare.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '【我是健康大厨】友邦客服节养生PK游戏，不但会吃还会玩，更有线下活动好礼等您拿，AIA带您玩转健康美食赢好礼！', // 分享标题
            desc: "我已打败{{ $rank }}%健康大厨，快来和我PK吧！跟AIA一起揭秘养生餐", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/aiaGame/index",
            imgUrl: "https://api.shanghaichujie.com/aia/aiaShare.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });

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