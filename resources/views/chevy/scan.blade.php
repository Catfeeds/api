<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>录音Demo</title>
    <link rel="stylesheet" href="css/normalize.css">
    <style>
       html,
        body {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        }

        .page1 {
        width: 100%;
        height: 100%;
        }

        p {
      position: absolute;
      top: 20%;
      width: 100%;
      text-align: center;
    }
    div {
      position: absolute;
      top: 30%;
      width: 100%;
      text-align: center;
    }

        button {
            position: absolute;
            top: 60%;
            left: 50%;
            width: 300px;
            height: 50px;
            transform: translate3d(-50%, 0, 0);
            text-align: center;
            background: #fff;
            border: 1px solid #000;
        }
    </style>
</head>

<body>
<section class="page1">
    <p>请说出红、蓝、黄、绿中的一种颜色</p>
    <button>长按录音</button>
</section>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('startRecord','stopRecord', 'onVoiceRecordEnd', 'translateVoice'), false) ?>);

    wx.ready(function () {
        // 点击录音
      document.querySelector('button').addEventListener('touchstart', function (e) {
        e.preventDefault()
        document.querySelector('button').innerText = "正在录音"
        wx.startRecord();
      })
      // 放手识别
      document.querySelector('button').addEventListener('touchend', function (e) {
        e.preventDefault()
        document.querySelector('button').innerText = "长按录音"
        wx.stopRecord({
          success: function (res) {
            var localId = res.localId;
            wx.translateVoice({
              localId: localId, // 需要识别的音频的本地Id，由录音相关接口获得
              isShowProgressTips: 1, // 默认为1，显示进度提示
              success: function (res) {
                if (res.translateResult !== 'undifined') {
                    if (res.translateResult.indexOf('红') > -1) {
                    document.querySelector('.page1').style.background = 'red'
                    } else if (res.translateResult.indexOf('蓝') > -1) {
                    document.querySelector('.page1').style.background = 'blue'
                    } else if (res.translateResult.indexOf('黄') > -1) {
                    document.querySelector('.page1').style.background = 'yellow'
                    } else if (res.translateResult.indexOf('绿') > -1) {
                    document.querySelector('.page1').style.background = 'green'
                    } else {
                    document.querySelector('.page1').style.background = 'white'
                    document.querySelector('div').innerText = res.translateResult // 语音识别的结果
                    }
                }
              }
            });
          }
        });
      })

      // 录音时间超过一分钟没有停止的时候会执行 complete 回调
      wx.onVoiceRecordEnd({
        complete: function (res) {
          document.querySelector('button').innerText = "长按录音"
          var localId = res.localId;
          wx.translateVoice({
            localId: localId, // 需要识别的音频的本地Id，由录音相关接口获得
            isShowProgressTips: 1, // 默认为1，显示进度提示
            success: function (res) {
                if (res.translateResult !== 'undifined') {
                if (res.translateResult.indexOf('红') > -1) {
                  document.querySelector('.page1').style.background = 'red'
                } else if (res.translateResult.indexOf('蓝') > -1) {
                  document.querySelector('.page1').style.background = 'blue'
                } else if (res.translateResult.indexOf('黄') > -1) {
                  document.querySelector('.page1').style.background = 'yellow'
                } else if (res.translateResult.indexOf('绿') > -1) {
                  document.querySelector('.page1').style.background = 'green'
                } else {
                  document.querySelector('.page1').style.background = 'white'
                  document.querySelector('div').innerText = res.translateResult // 语音识别的结果
                }
              }
            }
          });
        }
      });
    });
</script>
</body>

</html>