<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <title>凯翼汽车</title>
    <script src='../../res/cowin/guide/js/flexible.js'></script>
    <link rel='stylesheet' href='../../res/cowin/guide/css/normalize.css'>
    <link rel='stylesheet' href='../../res/cowin/guide/css/swiper.min.css'>
    <link rel='stylesheet' href='../../res/cowin/guide/css/animate.css'>
    <link rel='stylesheet' href='../../res/cowin/guide/css/style.css'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <img class='mascot animated tada' style='animation-delay:0.5s' src='../../res/cowin/guide/images/mascot.png'>
                <img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'>
                进入年会
            </button>
        </div>
    </section>
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
                        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
                    </div>
                </div>
                <div class='swiper-slide slise2'>
                    <img class='logo' src='../../res/cowin/guide/images/logo.png'>
                    <img class='bg' src='../../res/cowin/guide/images/site2.png' alt=''>
                    <div class='return_btn'>
                        <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
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
        <img class='bg' src='../../res/cowin/guide/images/hotel.jpg' alt=''>
        <div class='return_btn'>
            <button><img class='btn_bg' src='../../res/cowin/guide/images/btn_bg.png'><i class='return'></i>返回</button>
        </div>
    </section>
    <script src='../../res/cowin/guide/js/swiper.min.js'></script>
    <script src='../../res/cowin/guide/js/jquery.js'></script>
    <script src='../../res/cowin/guide/js/pxloader-all.min.js'></script>
    <script src='../../res/cowin/guide/js/index.js'></script>
</body>

<script type="application/javascript">
    //进入年会
    $('.welcome button').on('touchstart', function(){
        // $('.sign').fadeIn().siblings().hide();
        $('.select').fadeIn().siblings().hide();
    })
    //完成签到
    $('.sign button').on('touchstart', function(){
        var phoneReg = /[0-9]{11}/;
        var val = $.trim($('.phone').val())
        if (!phoneReg.test(val)) {
            $('.phone').val('请输入手机号');
            alert('请输入有效的手机号码！');
        }else{
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
                    phone : val,
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
