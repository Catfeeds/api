let http = require('http').Server();
let io = require('socket.io')(http);
let Redis = require('ioredis');
let redis = new Redis();

redis.subscribe('SC');
redis.on('message', function (channel, message) {
    console.log(message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

http.listen(3000, function () {
    console.log('listening on *:3000');
});