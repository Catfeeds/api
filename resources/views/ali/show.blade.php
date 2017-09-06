<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920,user-scalable=no">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <link rel="stylesheet" href="{{ asset('alibaba/css/index1.css') }}">
    <title>Title</title>
    <script src="{{ asset('alibaba/js/jquery.1.4.2-min.js') }}"></script>
    <script src="{{ asset('alibaba/js/jq.Slide.js') }}"></script>
</head>
<body>
<div class="all">
    <!--背景图-->
    <img src="{{ asset('alibaba/images/bg1.png') }}" alt="" class="bg">
    <!--图片轮播-->
    <div id="temp3">
        <ul class="JQ-slide-content">
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p1.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p2.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p3.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p4.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p5.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p6.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p7.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p8.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p9.png'}"/></li>
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p0.png'}"/></li>
        </ul>
    </div>
    <div class="declareBg">
        <div class="declareBg1">
            <p>XXXXXX</p>
        </div>
        <div class="declareBg2">
            <p>XXXXX</p>
        </div>
        <div class="declareBg3">
            <p>XXXXXXX</p>
        </div>
    </div>

</div>

</body>

<script src="https://unpkg.com/vue@2.4.2" type="text/javascript" charset="utf-8"></script>
<script src="//{{ Request::getHost() }}:8080/socket.io/socket.io.js"></script>
<script type="application/javascript">
    var app = new Vue({
        el: '#temp3',
        data: {
            uid0: '',
            uid1: '',
            uid2: '',
            uid3: '',
            uid4: '',
            uid5: '',
            uid6: '',
            uid7: '',
            uid8: '',
            uid9: ''
        }
    });

    var socket = io('http://{{ Request::getHost() }}:8080');

    socket.on('ali:App\\Events\\AliPhoto', function (data) {
        app.$data.uid0 = data.uid[0].uid;
        app.$data.uid1 = data.uid[1].uid;
        app.$data.uid2 = data.uid[2].uid;
        app.$data.uid3 = data.uid[3].uid;
        app.$data.uid4 = data.uid[4].uid;
        app.$data.uid5 = data.uid[5].uid;
        app.$data.uid6 = data.uid[6].uid;
        app.$data.uid7 = data.uid[7].uid;
        app.$data.uid8 = data.uid[8].uid;
        app.$data.uid9 = data.uid[9].uid;
    });

    $(function () {
        //轮播函数
        $("#temp3").Slide({
            effect: "fade",
            speed: "normal",
            timer: 2000
        });

        setInterval(function () {
            $.ajax({
                url: "http://192.168.169.101/api/ali/total",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('.declareBg1 p').html(data.totalCount);
                    $('.declareBg2 p').html(data.totalFullCount);
                    $('.declareBg3 p').html(data.totalTimes)
                },
                error: function (res) {

                }
            });
        }, 60000)

    })
</script>
</html>