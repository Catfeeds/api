<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>新西兰展馆互动</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    html,
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100%;
      background: #f0f0f0;
      font-size: 0;
      text-align: center;
    }

    .header {
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      flex: 0 0 150px;
      width: 100%;
      height: 150px;
    }

    .header img {
      width: 20%;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      flex: 1;
      width: 100%;
    }

    .container video {
      background: #000;
      width: 90%;
      height: 90%;
    }

    .footer {
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
      flex: 0 0 100px;
      width: 100%;
      height: 100px;
    }

    .footer button {
      padding: 15px 50px;
      color: #fff;
      border: none;
      border-radius: 5px;
      background: #09bb07;
      font-size: 16px;
    }
  </style>
</head>

<body>
  <div class="header">
    <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/%E6%96%B0%E8%A5%BF%E5%85%B0LOGO.jpg">
  </div>
  <div class="container">
    <video src="{{ $path }}" controls webkit-playsinline="true" playsinline="true"></video>
  </div>
  <div class="footer">
    <button>下载</button>
  </div>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
  wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
  // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
  wx.ready(function() {
    // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
    wx.onMenuShareTimeline({
      @if (isset($type))
        @if ($type == 'bird')
          title: '刚刚我在新西兰，偶遇呆萌傻鸟!', // 分享标题
        @elseif($type == 'air')
          title: '刚刚我在新西兰，偶遇呆萌傻鸟!', // 分享标题
        @endif
      @else
        title: '刚刚我在新西兰，偶遇呆萌傻鸟!', // 分享标题
      @endif
      link: window.location.href,
      imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/%E6%96%B0%E8%A5%BF%E5%85%B0LOGO.jpg", // 分享图标
      success: function () {
        // 用户确认分享后执行的回调函数
      }
  });
  // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
  wx.onMenuShareAppMessage({
    @if (isset($type))
      @if ($type == 'bird')
        title: '刚刚我在新西兰，偶遇呆萌傻鸟!', // 分享标题
        desc: "刚刚我在新西兰，偶遇呆萌傻鸟!", // 分享描述
      @elseif($type == 'air')
        title: '快来看，我刚去了趟新西兰!', // 分享标题
        desc: "快来看，我刚去了趟新西兰!",
      @endif
    @else
      title: '刚刚我在新西兰，偶遇呆萌傻鸟!', // 分享标题
      desc: "刚刚我在新西兰，偶遇呆萌傻鸟!", // 分享描述
    @endif
    link: window.location.href,
    imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/%E6%96%B0%E8%A5%BF%E5%85%B0LOGO.jpg", // 分享图标
    type: 'link', // 分享类型,music、video或link，不填默认为link
      success: function () {
        // 用户确认分享后执行的回调函数
      }
    });
  });

  var btn = document.querySelector('button')
  btn.onclick = function() {
    var u = navigator.userAgent;
    var email = prompt('请输入邮箱');
    var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
    if (email === '') {
      alert('输入内容不能为空')
    } else if (!reg.test(email)) {
      alert('邮箱格式错误')
    } else {
      axios.post('https://api.shanghaichujie.com/api/newzealand/video/email', {
        email: email,
        path: '{{ $path }}'
      }).then(function(res) {
        alert('邮件发送成功！');
      }).catch(function(res) {
        alert('很抱歉邮件发送失败！')
      })
    }
  }
</script>

</html>