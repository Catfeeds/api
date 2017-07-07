<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>touch</title>
</head>
<body>
<button id="btn1" value="t01">点击</button>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="//127.0.0.1:3000/socket.io/socket.io.js"></script>
<script type="application/javascript">
    var socket = io('http://127.0.0.1:3000');
    //开始游戏
    socket.emit('change', 'tostart');
    $('#btn1').click(function () {
        socket.emit('pc', 't01');
    });
</script>
</html>