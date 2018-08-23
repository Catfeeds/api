var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

//middleware 处理sockid
io.use((socket, next) => {
   let clientId = socket.handshake.query.clientId;
   if (clientId) {
       //针对游戏客户端
       if (clientId === 'pc') {
           socket.join('pc');
           return next();
       }
       //普通用户修改为openid
       socket.id = clientId;
       return next();
   }
    return next(new Error('authentication error'));
});
redis.subscribe('game');
redis.on('message', function (channel, message) {
    message = JSON.parse(message);
    console.log(message);
    if (message.event === 'gameStart') {
        console.log('gameStart');

        //向pc端发送游戏开始
        io.sockets.in('pc').emit('gameStart', {data: message.data})
    }else if  (message.event === 'gameOver'){
        console.log('gameOver');
        //向指定用户发送游戏结束
        io.sockets.sockets[message.data.openid].emit('gameOver', {data: message.data});
    }
});

io.on('connection', function (socket) {
        console.log(socket.id);
        // var tweets = setInterval(function () {
        //     io.sockets.sockets[socket.id].emit('gameReady', 'sss', function (data) {
        //         console.log(data);
        //         if (data) {
        //             clearInterval(tweets);
        //         }
        //     });
        // }, 1000);
        socket.on('disconnect', function () {
            // clearInterval(tweets);
            console.log('user disconnected');
        });
    socket.on('gameStatus', function (msg) {
        //告知指定用户准备游戏
        console.log(msg);
        redis.setex(msg.openid, 120, 'true');
        io.sockets.sockets[msg.openid].emit('gameReady', {data: msg});
    })
});

http.listen(3000, function () {
    console.log('listening on *:3000');
});
