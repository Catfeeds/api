import Echo from "laravel-echo";

window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
    // host: 'localhost:6001'

});