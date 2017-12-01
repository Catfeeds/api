var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('longines');

redis.on('message', function (channel, message) {
    message = JSON.parse(message);
    console.log(message.data);
    io.emit(channel, { location : message.data.location});
});

io.on('connection', function(socket){
    console.log('a user connected');
    socket.on('disconnect', function(){
        console.log('user disconnected');
    });
});
http.listen(8080);
