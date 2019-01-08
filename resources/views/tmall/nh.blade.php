<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title>年货节品牌大街</title>

  <!--http://www.html5rocks.com/en/mobile/mobifying/-->
  <meta name="viewport"
        content="width=device-width,user-scalable=no,initial-scale=1, minimum-scale=1,maximum-scale=1"/>

  <!--https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html-->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="format-detection" content="telephone=no">

  <!-- force webkit on 360 -->
  <meta name="renderer" content="webkit"/>
  <meta name="force-rendering" content="webkit"/>
  <!-- force edge on IE -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta name="msapplication-tap-highlight" content="no">

  <!-- force full screen on some browser -->
  <meta name="full-screen" content="yes"/>
  <meta name="x5-fullscreen" content="true"/>
  <meta name="360-fullscreen" content="true"/>
  
  <!-- force screen orientation on some browser -->
  <meta name="screen-orientation" content=""/>
  <meta name="x5-orientation" content="">

  <!--fix fireball/issues/3568 -->
  <!--<meta name="browsermode" content="application">-->
  <meta name="x5-page-mode" content="app">

  <!--<link rel="apple-touch-icon" href=".png" />-->
  <!--<link rel="apple-touch-icon-precomposed" href=".png" />-->
  <script src="js/amfe-flexible.js"></script>
  <link rel="stylesheet" type="text/css" href="style-mobile.72851.css"/>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
  <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b999659011b4bc2ab504c965c37947d8";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
    $(function () {
      window.peopleNum = {{$num}} // 领取人数赋值
      window.endTime = new Date(2019, 0, 10, 0, 0).getTime()

      window.clickBox = function (state) {
        if (state) {
          $('.popup_success').show().find('.success').addClass('scale1')
        } else {
          $('.popup_error').show().find('.error').addClass('scale1')
        }
      }

      // 优惠券
      $('.popup_error .close').on('touchend', function () {
        $('.popup_error').hide()
      })

      $('.popup_success .share').on('touchend', function () {
        $('.popup_success').hide()
        $('.popup_share').show()
      })

      $('.popup_share').on('touchend', function () {
        $('.popup_share').hide()
      })

      $('.popup_share_success').on('touchend', function () {
        $('.popup_share_success').hide()
      })

      /* 前半部分ui展示 */
      var video = document.querySelector('#video')
      var startGameBtn = document.querySelector('#startGame')
      // 开始画面
      $('#startVideo').on('touchend', function () {
        $('.pageStart').hide()
        $('.pageVideo').show()
        $('#video')[0].play()
        $('#audio')[0].play()
      })
      // 视频画面
      video.addEventListener('ended', function () {
        $('.pageEnd').show()
      })

      // 游戏开始画面
      startGameBtn.addEventListener('touchend', function () {
        $('.pageEnd').hide()
        $('.pageVideo').hide()
        // $('#audio')[0].play()
      })
    })
  </script>
</head>
<body>
  <audio id="audio" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/20190105_tmall/music.mp3" loop></audio>
  <div style="display: none">20个县域品牌下沉</div>
  <div id="splash">
    <div class="loading_box">
      <div class="progress-bar stripes">
        <span style="width: 0%"></span>
      </div>
      <div class="loading_text"><img src="imgs/loading_text.png"></div>
    </div>
  </div>
  <div class="pageStart">
    <button id="startVideo"></button>
  </div>
  <div class="pageVideo">
    <video id="video" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/20190105_tmall/video.mp4" preload
      webkit-playsinline="true" playsinline="true" x5-video-player-type="h5"   x5-video-player-fullscreen="true"  
      x5-video-orientation="portraint"></video>
  </div>
  <div class="pageEnd">
    <button id="startGame"></button>
    <img class="hand" src="imgs/hand.png">
  </div>
  <div class="arrow"><img src="imgs/arrow.png"></div>
  <canvas id="GameCanvas" oncontextmenu="event.preventDefault()" tabindex="0"></canvas>
  <div class="popup_success">
    <div class="success">
      <img class="share" src="imgs/btn_share.png">
    </div>
  </div>
  <div class="popup_error">
    <div class="error">
      <img class="close" src="imgs/btn_close.png">
    </div>
  </div>
  <div class="popup_share">
    <img src="imgs/share_text.png">
  </div>
  <div class="popup_share_success">
    <img src="imgs/share_success.png">
  </div>
  <script src="src/settings.64a99.js" charset="utf-8"></script>
  <script src="main.a5c3b.js" charset="utf-8"></script>
  <script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
  <script type="application/javascript">
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '年货节品牌大街', // 分享标题
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/tmall_nh.png", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
              {{ \Illuminate\Support\Facades\Redis::incr('tmall_nh_share') }}
              $('.popup_share').hide()
              $('.popup_share_success').show()
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '年货节品牌大街', // 分享标题
            desc: "20个县域品牌下沉", // 分享描述
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/logo/tmall_nh.png", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
              {{ \Illuminate\Support\Facades\Redis::incr('tmall_nh_share') }}
              $('.popup_share').hide()
              $('.popup_share_success').show()
            }
        });
    });
  </script>
</body>
</html>
