<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <title>小翼管家</title>
    <script src='../../res/cowin/guide/js/flexible.js'></script>
    <link rel='stylesheet' href='../../res/cowin/guide/css/normalize.css'>
    <link rel='stylesheet' href='../../res/cowin/guide/css/swiper.min.css'>
    <link rel='stylesheet' href='../../res/cowin/guide/css/animate.css'>
    <link rel='stylesheet' href='../../res/cowin/guide/css/style1.css'>
</head>
<body>
<audio src='../../res/cowin/guide/m1.mp3' autoplay loop></audio>
<section class='loading'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <div class='mascot_loading'></div>
    <div class='progress'><span></span></div>
</section>
<section class='falling hidden'></section>
<section class='welcome hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <div class='pannel'>
        <p class='animated fadeIn' style='animation-delay:0.5s;'>Hi，大家好！</p>
        <p class='animated fadeIn' style='animation-delay:1s;'>我是你们的贴心管家“小翼”</p>
        <p class='animated fadeIn' style='animation-delay:1.5s;'>欢迎各位参加“Fighting，翼路向前”</p>
        <p class='animated fadeIn' style='animation-delay:2s;'>凯翼汽车2018商务年会</p>
        <p class='animated fadeIn' style='animation-delay:2.5s;'>有关于会议或行程的问题都可以咨询小翼</p>
        <p class='animated fadeIn' style='animation-delay:3s;'>小翼随时在您身边</p>
        <p class='animated fadeIn' style='animation-delay:3.5s;'>祝大家年会愉快！</p>
    </div>
    <div class='btn animated bounceIn'>
        <button>
            <img class='mascot animated tada' style='animation-delay:0.5s'
                 src='../../res/cowin/guide/images/mascot.png'>
            <img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>
            进入年会
        </button>
    </div>
</section>
@if(!is_null($user))
<section class='sign hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <img class='mascot' src='../../res/cowin/guide/images/mascot.png'>
    <div class='pannel animated bounceIn'>
        <input class='phone' type='text' value='请输入手机号'>
        <p>小贴士: 请填写您的真实手机号, 您的手机号将会在晚宴上进行抽奖</p>
    </div>
    <div class='btn animated bounceIn' style='animation-delay:.5s'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>完成签到</button>
    </div>
</section>
@endif
<section class='select hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <div class='btn btn1 animated flipInX'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>会议安排</button>
    </div>
    <div class='btn btn3 animated flipInX' style='animation-delay:.2s'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>餐饮安排</button>
    </div>
    <div class='btn btn4 animated flipInX' style='animation-delay:.4s'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>联系会务组</button>
    </div>
    <div class='btn btn2 animated flipInX' style='animation-delay:.6s'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>交通安排</button>
    </div>
    <div class='details animated flipInX' style='animation-delay:.8s'>
        <img class='mascot animated wobble' style='animation-delay:1.5s' src='../../res/cowin/guide/images/mascot.png'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg2.png' alt=''>酒店<br/>详情</button>
    </div>
</section>
<section class='plan hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <div class='btn btn1 animated flipInX'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>会议日程及议程安排</button>
    </div>
    <div class='btn btn2 animated flipInX' style='animation-delay:.2s'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>会议及晚宴坐席安排</button>
    </div>
    <div class='btn return_btn animated flipInX' style='animation-delay:.4s'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
    </div>
</section>
<section class='schedule activity hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <img class='bg' src='../../res/cowin/guide/images/schedule.jpg'>
    <div class='return_btn'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
    </div>
</section>
<section class='site activity hidden '>
    <div class='swiper-container'>
        <div class='swiper-wrapper'>
            <div class='swiper-slide slise1'>
                <img class='logo' src='../../res/cowin/guide/images/logo.png'>
                <img class='bg' src='../../res/cowin/guide/images/site1.png' alt=''>
                <div class='return_btn'>
                    <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回
                    </button>
                </div>
            </div>
            <div class='swiper-slide slise2'>
                <img class='logo' src='../../res/cowin/guide/images/logo.png'>
                <img class='bg' src='../../res/cowin/guide/images/site2.png' alt=''>
                <div class='return_btn'>
                    <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回
                    </button>
                </div>
            </div>

        </div>
        <div class='swiper-button-prev'></div>
        <div class='swiper-button-next'></div>
    </div>
</section>
<section class='traffic activity2 hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <img class='bg' src='../../res/cowin/guide/images/traffic.jpg' alt=''>
    <div class='return_btn'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
    </div>
</section>
<section class='catering activity2 hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <img class='bg' src='../../res/cowin/guide/images/catering.jpg' alt=''>
    <div class='return_btn'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
    </div>
</section>
<section class='call activity2 hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <img class='bg' src='../../res/cowin/guide/images/call.jpg' alt=''>
    <div class='return_btn'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
    </div>
</section>
<section class='hotel activity2 hidden'>
    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
    <img class='bg' src='../../res/cowin/guide/images/hotel1.jpg' alt=''>
    <div class='return_btn'>
        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
    </div>
</section>
<script src='../../res/cowin/guide/js/swiper.min.js'></script>
<script src='../../res/cowin/guide/js/jquery.js'></script>
<script src='../../res/cowin/guide/js/pxloader-all.min.js'></script>
<script src='../../res/cowin/guide/js/index.js'></script>
</body>

<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '小翼管家', // 分享标题
            link: "https://api.shanghaichujie.com/ky/index",
            imgUrl: "https://api.shanghaichujie.com/res/cowin/share.png", // 分享图标
            success: function () {
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '小翼管家', // 分享标题
            desc: "凯翼汽车2018商务年会会议指南", // 分享描述
            {{--link: "http://api.touchworld-sh.com/qf/online?oid={{$openid}}&nick={{$nickname}}",--}}
            link: "https://api.shanghaichujie.com/ky/index",
            imgUrl: "https://api.shanghaichujie.com/res/cowin/share.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
            }
        });
    });

    //进入年会
    $('.welcome button').on('touchstart', function () {
        @if(empty($user))
        $('.sign').fadeIn().siblings().hide();
        @else
        $('.select').fadeIn().siblings().hide();
        @endif
    })
    //完成签到
    $('.sign button').on('touchstart', function () {
        var phoneReg = /[0-9]{11}/;
        var val = $.trim($('.phone').val())
        if (!phoneReg.test(val)) {
            $('.phone').val('请输入手机号');
            alert('请输入有效的手机号码！');
        } else {
//            $('.select').delay(100).fadeIn().siblings().delay(100).fadeOut(500);
            //ajax提交，确认后进入用以下代码进入下一步
            $.ajax({
                url: '{{ url('api/cowin/phone') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                data: {
                    openid: '{{ $wechatInfo['id'] }}',
                    avatar: '{{ $wechatInfo['avatar'] }}',
                    nickname: '{{ $wechatInfo['name'] }}',
                    phone: val,
                },
            }).done(function (res) {
                 $('.select').delay(100).fadeIn().siblings().delay(100).fadeOut(500);
            }).fail(function (msg) {
                // alert('获取微信头像失败！')
            })
        }
    })

</script>
</html>
