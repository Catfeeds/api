<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>摇一摇</title>
    <script src="js/amfe-flexible.js"></script>
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>

<body>
<!-- 摇一摇 -->
<section>
    <div class="head"></div>
    <div class="container">
        <div class="border">
            <div class="content">
                <img src="imgs/hand.png">
            </div>
        </div>
    </div>
    <div class="foot"><img src="imgs/foot.png"></div>
</section>
<!-- 重复参与 -->
<section class="repeat"></section>
<script src="http://api.touchworld-sh.com:3001/socket.io/socket.io.js"></script>

<script>
    var socket = io('http://api.touchworld-sh.com:3001');
    let num = 0;
    var shake = 4000,
        last_update = 0,
        x = y = z = last_x = last_y = last_z = 0;
    if (window.DeviceMotionEvent) {
        window.addEventListener("devicemotion", deviceMotionHandler, false);
    } else {
        alert("本设备不支持该功能");
    }

    function deviceMotionHandler(eventData) {
        var acceleration = eventData.accelerationIncludingGravity,
            currTime = new Date().valueOf(),
            diffTime = currTime - last_update;

        if (diffTime > 100) {
            last_update = currTime;
            x = acceleration.x;
            y = acceleration.y;
            z = acceleration.z;
            var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000
            if (speed > shake) {
                ani();
                num += 1;
            }
            last_x = x;
            last_y = y;
            last_z = z;
        }
    }

    ani()
    var status = 1;

    function ani() {
        if (status) {
            status = 0;
            var hand = document.querySelector('.content img');
            hand.style.animation = ''
            setTimeout(function () {
                hand.style.animation = 'shake 1s ease';
                status = 1;
            })
        }
    }

    setInterval(function () {
        socket.emit('shake', `{"openid":"{{ $wechat['id'] }}","speed":${num}}`);
        num = 0
    }, 1000)
</script>
</body>

</html>