<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <title>Coach互动照片获取</title>
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iview/3.0.1/iview.js"></script>
    <script src="//cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/v-charts/lib/index.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iview/3.0.1/styles/iview.css" rel="stylesheet">
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.1.3/weui.min.css"/>
    <style>
        body {
            width: 640px;
            height: 1038px;
            background: url("https://unitytouch.oss-cn-shanghai.aliyuncs.com/Fred%2Fcoach%2F0.jpg") no-repeat;
            background-size: cover;
            /*background-color: #C49487;*/
        }
        .photo-input {
            position: absolute;
            width: 320px;
            left:0;
            right: 0;
            margin:auto;
            top:430px;
            text-align: center;
        }
        .verify {
            margin-bottom: 80px;
            width: 320px;
            border: none;
            height: 80px;
            line-height: 80px;
            border: 4px solid #C49487;
            font-size: 35px;
            color: #102c4f;
            box-sizing: border-box;
            background-color: #D3D3D3;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="photo-input" id="photo-input">
        <input type="text" class="verify" required id="photo" placeholder="请输入照片提取码">
        <img src="https://unitytouch.oss-cn-shanghai.aliyuncs.com/Fred%2Fcoach%2Fsubmit.png" alt="" onclick="f()">
    </div>
    <div>
        <img id="img" width="640px" src="" alt="">
    </div>
</div>
</body>
<script type="application/javascript">
    function f() {

        let photo = document.getElementById("photo").value;
        if (photo) {
            document.querySelector("body").style.background= 'url("") no-repeat';
            document.getElementById('img').src = 'https://unitytouch.oss-cn-shanghai.aliyuncs.com/Fred%2Fcoach%2F'
                + photo + '.png';
            document.getElementById("photo-input").style.display = "none";
        }

    }
</script>

</html>
