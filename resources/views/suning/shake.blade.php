<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>苏宁聚物展</title>
    <script src="js/amfe-flexible.js"></script>
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>

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
</body>
<script src="//192.168.1.106:3000/socket.io/socket.io.js"></script>

<script>
    var socket = io('192.168.1.106:3000');
    socket.emit('shake', '{"openid":"test1"}');
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
</script>

</html>