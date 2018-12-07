let http = require('http').Server();
let io = require('socket.io')(http);
let Redis = require('ioredis');
let redis = new Redis();

redis.subscribe('GameSuning');
redis.on('message', function (channel, message) {
    console.log(message);
    message = JSON.parse(message);
    console.log(message);
    io.emit(message.event, message.data);
});

io.on('connection', function(socket){
    console.log('a user connected');
    socket.on('disconnect', function(){
        console.log('user disconnected');
    });
    socket.on('shake', function (data) {
        console.log(data);
        io.emit('suningShake', data)
    })
});
http.listen(3001, function () {
    console.log('listening on *:3000');
});