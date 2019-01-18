<html>
<body>
<button onclick="f()">测试</button>
<button onclick="f1()">停止</button>

</body>
<script src="http://127.0.0.1:3001/socket.io/socket.io.js"></script>
<script>
    let socket = io('http://127.0.0.1:3001');
    let v;

    function f() {
        let i = 1;
        let r;
        v = setInterval(function () {

            r = getRandomInt(1, 30)
            socket.emit('shake', `{"openid":"id${i}","speed":${r}}`);
            console.log(`{"openid":"id${i}","speed":${r}}`);
            i++;
            if (i > 1000) {
                i = 1;
            }

        }, 1)
    }

    function f1() {
        clearInterval(v)
    }

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min)) + min;
    }
</script>
</html>