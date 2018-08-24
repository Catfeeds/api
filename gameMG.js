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
redis.subscribe('MG');
redis.on('message', function (channel, message) {
    message = JSON.parse(message);
    if (message.event === 'gameStart') {

        //向pc端发送游戏开始
        io.sockets.in('pc').emit('gameStart', {data: message.data})
    }else{
        //向指定用户发送通知
        io.sockets.sockets[message.data.openid].emit(message.event, {data: message.data});
    }
});
let redis2 = new Redis();

io.on('connection', function (socket) {
        socket.on('disconnect', function () {
            console.log('user disconnected');
        });
    socket.on('gameStatus', function (msg) {
        //告知指定用户准备游戏
        redis2.setex(msg.openid, 120, 'true');
        io.sockets.sockets[msg.openid].emit('gameReady', {data: msg});
    })
});

http.listen(3000, function () {
    console.log('listening on *:3000');
});
