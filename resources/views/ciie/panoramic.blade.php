<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>新西兰</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    html,
    body
      {
      overflow: hidden;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
    .loading {
      position: absolute;
      left: 0;
      top: 0;
      z-index: 1000;
      width: 100%;
      height: 100%;
      text-align: center;
      background: #fff;
    }
    .loading .logo {
      position: absolute;
      top: 2%;
      left: 50%;
      transform: translate3d(-50%, 0, 0);
    }
    .loading .progress-wrap {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate3d(-50%, 0, 0);
      width: 90%;
    }
    .loading .bird {
      position: absolute;
      top: 0;
      left: 0;
      width: 80px;
      height: 80px;
    }
    .loading .progress-bar {
      box-sizing: border-box;
      position: absolute;
      top: 70px;
      padding: 5px;
      width: 100%;
      height: 50px;
      background: url(imgs/progress_bar.png) no-repeat;
      background-size: 100% 100%;
    }
    .loading .progress {
      display: block;
      height: 40px;
      width: 10%;
      border-radius: 15px;
      background: url(imgs/progress.png) no-repeat;
      background-size: cover;
    }
    .loading .text {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 100%;
      transform: translate3d(-50%, -50%, 0);
      text-align: center;
      text-shadow: 0 0 4px #000;
      color: #fff;
    }
    canvas {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 500;
      width: 100%;
      height: 100%;
    }
    .videos {
      position: absolute;
      left: 0;
      top: 0;
      z-index: 999;
      width: 50%;
      height: 50%;
    }
    .popup {
      display: none;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 9999999;
      color: #fff;
      background: rgba(0, 0, 0, 0.8);
    }
  </style>
</head>

<body>
  <div class="loading">
    <img class="logo" src="imgs/logo.png">
    <div class="progress-wrap">
      <img class="bird" src="imgs/bird.gif">
      <div class="progress-bar">
        <span class="progress"></span>
        <p class="text">loading...<span>0</span>%</p>
      </div>
    </div>
  </div>
  <canvas id="canvas"></canvas>
  <div class="videos" style="display: none">
    <video src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/ciie/1.mp4" controls id="scene3Video"></video>
    <video src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/ciie/2.mp4" controls id="scene5Video"></video>
  </div>
  <div class="popup">视频加载中...</div>
  <script src="js/pxloader-all.min.js"></script>
  <script src="js/three.js"></script>
  <script src="js/tween.js"></script>
  <script src="js/orbitcontrols.js"></script>
  <script src="js/index.js"></script>
  <script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
  <script>
    wx.config(<?php echo $js->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '新西兰国家馆全景', // 分享标题
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/%E6%96%B0%E8%A5%BF%E5%85%B0LOGO.jpg", // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '新西兰国家馆全景', // 分享标题
            desc: "新西兰国家馆5.2H-G02，等你来哦", // 分享描述
            link: window.location.href,
            imgUrl: "https://h5-touch.oss-cn-shanghai.aliyuncs.com/%E6%96%B0%E8%A5%BF%E5%85%B0LOGO.jpg", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
                // 用户确认分享后执行的回调函数
            }
        });
    });
    
    var app = new App(document.querySelector('canvas'))
    app.initGL()
    app.render()
    init_loading()
    // app.initContent()

    var dom_loading = document.querySelector('.loading')
    var dom_bird = document.querySelector('.bird')
    var dom_progress = document.querySelector('.progress')
    var dom_text = document.querySelector('.text span')

    function init_loading() {
      var loader = new PxLoader();
      var URL = window.location.href;
      var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
      var realLoadingNum = 0;
      var fakeLoadingNum = 0;
      var myLoadingInterval = null;
      var tempArr = [];
      //加入数组
      var fileList = [
        'imgs/logo.png',
        'imgs/bird.gif',
        'imgs/progress_bar.png',
        'imgs/progress.png',
        'imgs/0.jpg',
        'imgs/1.jpg',
        'imgs/2.jpg',
        'imgs/3.jpg',
        'imgs/4.jpg',
        'imgs/icon.png',
        'imgs/spot14.png',
      ];

      for (var i = 0, len = fileList.length; i < len; i++) {
        var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);
        pxImage.imageNumber = i + 1;
        loader.add(pxImage);
      }
      loader.addCompletionListener(function() {
        console.log("预加载图片：" + fileList.length + "张");
      });
      loader.addProgressListener(function(e) {
        var percent = Math.round((e.completedCount / e.totalCount) * 100); //正序, 1-100
        realLoadingNum = percent;
      });
      loader.start()
      var loading = document.getElementById('loading');
      var fade30 = true;
      var fade60 = true;
      var fade90 = true;
      myLoadingInterval = setInterval(function() {
        fakeLoadingNum++;
        if (realLoadingNum > fakeLoadingNum) {
          dom_text.innerText = fakeLoadingNum
          dom_progress.style.width = fakeLoadingNum + '%'
          dom_bird.style.left = fakeLoadingNum - 10 + '%'
        } else {
          dom_text.innerText = realLoadingNum
          dom_progress.style.width = realLoadingNum + '%'
          dom_bird.style.left = realLoadingNum - 10 + '%'
        }
        if (fakeLoadingNum >= 100 && realLoadingNum >= 100) {
          app.initContent()
          dom_loading.style.display = 'none'
          clearInterval(myLoadingInterval);
        }
      }, 30);
    }
  </script>
</body>