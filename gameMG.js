var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('game');

redis.on('message', function (channel, message) {
    message = JSON.parse(message);

    console.log(message);
    io.emit(message.event, {data: message.data});
});

io.on('connection', function (socket) {
    console.log('a user connected');
    socket.on('disconnect', function () {
        console.log('user disconnected');
    });
    socket.on('gameStatus', function (msg) {
        //告知用户准备游戏
        io.emit('gameReady', {data: msg})
    })
});

http.listen(3000, function () {
    console.log('listening on *:3000');
});
