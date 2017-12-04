<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <title>LONGINES</title>
    <link rel="stylesheet" href="../../res/longines/css/normalize.css">
    <style>
        body{
            position: absolute;
            left: 0;
            top: 0;
            width: 640px;
            height: 1040px;
            overflow: hidden;
        }
        section{
            position: absolute;
            left: 0;
            top: 0;
            width: 640px;
            height: 1040px;
            overflow: hidden;
        }
        .busy_bg{
            position: absolute;
            left: 0;
            top: 0;
            width: 640px;
            height: 1040px;
        }
        .busy_scene .text{
            position: absolute;
            left: 0;
            right: 0;
            bottom: 120px;
            margin: auto;
            font-size: 36px;
            text-align: center;
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- busy scene -->
    <section class="busy_scene">
        <img src="../../res/longines/images/scene3.png" class="busy_bg">
        <div class="text">
            有玩家正在互动中<br/>请等待15秒后重试
        </div>
    </section>
</body>
</html>
