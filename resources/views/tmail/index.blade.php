<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../../res/tmail/js/flexible.js"></script>
    <title>奇屋妙享-大牌们的N次方</title>
    <link rel="stylesheet" href="../../res/tmail/css/normalize.css">
    <link rel="stylesheet" href="../../res/tmail/css/index.css">
</head>
<body>
<audio class="bg_music" src="../../res/tmail/music/bg.mp3" preload loop autoplay></audio>
<!-- loading -->
<!--<section class="loading">-->
<!--<div class="progress">0</div>-->
<!--<div class="text">loading...</div>-->
<!--</section>-->
<section class="loading">
<div class="progress"><span></span></div>
<div class="text">loading</div>
</section>

<!-- 开始动画 -->
<section class="open_animate hide">
    <canvas class="canvas"></canvas>
    <div class="click_tips hide">
        <img class="click_light" src="../../res/tmail/images/click_light.png">
        <img class="click_hand" src="../../res/tmail/images/hand.png">
    </div>
    <div class="click_area hide"></div>
</section>

<!-- 选择界面 -->
<section class="select hide">
    <div class="mac">
        <img class="bubble" src="../../res/tmail/images/bubble.png">
        <div class="content">
            <img class="mac_logo" src="../../res/tmail/images/mac_logo.png"><br/>
            <p class="text">
                <span class="title">越夜越魅丽<sup>N</sup></span><br/>
                流光溢彩，
                在最深的夜实现最美的你。<br/>
                ——天猫超级品牌日<br/>
                <strong>已有{{ Redis::get('tmail_mac') }}人进入</strong><br/>
            </p>
        </div>
        <div class="click_tips">
            <img class="click_light" src="../../res/tmail/images/click_light.png">
            <img class="click_hand" src="../../res/tmail/images/hand.png">
        </div>
    </div>
    <div class="pocky">
        <img class="bubble" src="../../res/tmail/images/bubble.png">
        <div class="content">
            <img class="pocky_logo" src="../../res/tmail/images/pocky_logo.png"><br/>
            <p class="text">
                <span class="title">私享才解压<sup>N</sup></span><br/>
                每个人都需要独处的空间和能力，
                喝口茶，放个空。<br/>
                ——天猫超级品牌日<br/>
                <strong>已有{{ Redis::get('tmail_pocky') }}人进入</strong><br/>
            </p>
        </div>
        <div class="click_tips">
            <img class="click_light" src="../../res/tmail/images/click_light.png">
            <img class="click_hand" src="../../res/tmail/images/hand.png">
        </div>
    </div>
    <div class="oysho">
        <img class="bubble" src="../../res/tmail/images/bubble.png">
        <div class="content">
            <img class="oysho_logo" src="../../res/tmail/images/oysho_logo.png"><br/>
            <p class="text">
                <span class="title">身临其境<sup>N</sup></span><br/>
                最美不是下雨天，
                而是你在试衣间<br/>
                ——天猫超级品牌日<br/>
                <strong>已有{{ Redis::get('tmail_oysho') }}人进入</strong><br/>
            </p>
        </div>
        <div class="click_tips">
            <img class="click_light" src="../../res/tmail/images/click_light.png">
            <img class="click_hand" src="../../res/tmail/images/hand.png">
        </div>
    </div>
</section>

<!-- mac抽奖界面 -->
<section class="mac_lottery hide">
    <div class="mac_table_bg">
        <div class="mac_turntable_bg">
            <div class="mac_turntable"></div>
            <div class="mac_start"></div>
        </div>
    </div>
    <div class="return"><img src="../../res/tmail/images/return.png"></div>
</section>

<!-- pocky抽奖界面 -->
<section class="pocky_lottery hide">
    <div class="pocky_table_bg">
        <div class="pocky_turntable_bg">
            <div class="pocky_turntable"></div>
            <div class="pocky_start"></div>
        </div>
    </div>
    <div class="return"><img src="../../res/tmail/images/return.png"></div>
</section>

<!-- oysho抽奖界面 -->
<section class="oysho_lottery hide">
    <div class="oysho_table_bg">
        <div class="oysho_turntable_bg">
            <div class="oysho_turntable"></div>
            <div class="oysho_start"></div>
        </div>
    </div>
    <div class="return"><img src="../../res/tmail/images/return.png"></div>
</section>

<!-- 全局通用 -->
<p class="footer hide" >活动最终解释权归主办方所有</p>
<img class="luck_btn hide" src="../../res/tmail/images/luck_btn.png">

<!-- 积分 -->
<div class="integral hide">
    <div class="integral_wrapper">
        <div class="integral_box">
            <p class="title">
                {{ substr($user->nickname, 0, 8) }}<br/>
            </p>
            <p class="user_num">兑换编号: {{ $user->id }}</p>
            <ul class="content">
                <li>
                    <span><img class="integral_oysho" src="../../res/tmail/images/oysho_logo.png"></span>
                    <span class="oysho_coin">{{ $user->oysho }}</span>
                </li>
                <li class="mac">
                    <span><img class="integral_mac" src="../../res/tmail/images/mac_logo.png"></span>
                    <span class="mac_coin">{{ $user->mac }}</span>
                </li>
                <li class="pocky">
                    <span><img class="integral_pocky" src="../../res/tmail/images/pocky_logo.png"></span>
                    <span class="pocky_coin">{{ $user->pocky }}</span>
                </li>
            </ul>

        </div>
    </div>
</div>

<!-- 分享 -->
<div class="share hide">
    <img class="share_tips" src="../../res/tmail/images/share_tips.png">
    <div class="share_wrapper">
        <div class="share_box">
            <div class="content">
                <p>{{ substr($user->nickname, 0, 8) }}，恭喜您获得<span class="coin">X</span>个幸运值, 点击右下角查看最新分值</p>
                <p>点击右上角分享朋友圈，带上你的小伙伴一起体验奇屋驾到的福利吧!</p>
                <div class="btn">
                    <button>再来一次</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 使用次数用完 -->
<div class="finish hide">
    <div class="finish_wrapper">
        <div class="finish_box">
            <div class="content">
                <p>亲，每个奇屋限定抽5次噢！</p>
                <button>确定</button>
            </div>
        </div>
    </div>
</div>

<!-- 未抽中奖品 -->
<div class="nothing hide">
    <div class="nothing_wrapper">
        <div class="nothing_box">
            <div class="content">
                <p>抱歉，您未抽中幸运值~</p>
                <button>再来一次</button>
            </div>
        </div>
    </div>
</div>

<script src="../../res/tmail/js/jquery.min.js"></script>
<script src="../../res/tmail/js/pxloader-all.min.js"></script>
<script src="../../res/tmail/js/awardRotate.js"></script>
<script src="../../res/tmail/js/sequenceFrame.js"></script>
<script src="../../res/tmail/js/index.js"></script>
</body>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '奇屋妙想-大牌们的N次方', // 分享标题
            link: "{{ url('tmail/index') }}",
            imgUrl: "{{ url('res/tmail/share.jpg') }}", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '奇屋妙想-大牌们的N次方', // 分享标题
            desc: "天猫超级品牌日 妙想好礼 即刻体验 全数拥有", // 分享描述
            link: "{{ url('tmail/index') }}",
            imgUrl: "{{ url('res/tmail/share.jpg') }}", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
    function statistic(type) {
        //统计进入人数
        $.get('{{ url('api/tmail/statistic') }}?type=' + type);
    }

    function draw(type, coin) {
        //抽奖
        $.ajax({
            url: '{{ url('api/tmail/coin/add') }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            method: 'POST',
            data: {
                uid: '{{ $user->id }}',
                type: type,
                coin: coin,
            },
        }).done(function (res) {
            console.log(res)
        }).fail(function (res) {
            console.log(res)

        })
    }
</script>
</html>
