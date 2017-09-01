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
    <img src="{{ asset('alibaba/images/bg.png') }}" alt="" class="bg">
    <!--图片轮播-->
    <div id="temp3">
        <ul class="JQ-slide-content">
            <li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p1.png'}"/></li>
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p2.png'}"/></li>--}}
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p3.png'}"/></li>--}}
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p4.png'}"/></li>--}}
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p5.png'}"/></li>--}}
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p6.png'}"/></li>--}}
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p7.png'}"/></li>--}}
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p8.png'}"/></li>--}}
            {{--<li><img v-bind="{ src : '{{ asset('upload/ali') }}/' + uid + '/p9.png'}"/></li>--}}
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
            uid: '21'
        }
    });

    var socket = io('http://{{ Request::getHost() }}:8080');

    socket.on('ali:App\\Events\\AliPhoto', function (data) {
        console.log(data);
        app.$data.uid = data.uid;
    });

    $(function () {
        //轮播函数
        $("#temp3").Slide({
            effect: "fade",
            speed: "normal",
            timer: 2000
        });

//        setInterval(function () {
//            $.ajax({
//                url: "index.json",
//                type: "GET",
//                dataType: "json",
//                success: function (data) {
//                    $('.declareBg1 p').html(data.total_time)
//                    $('.declareBg2 p').html(data.total_people)
//                    $('.declareBg3 p').html(data.count)
//                },
//                error: function (res) {
//
//                }
//            });
//        }, 60000)

    })
</script>
</html>