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
    <img src="{{ asset('alibaba/images/bg2.png') }}" alt="" class="bg">
    <div class="text">
        <p><span class="declareBg declareBg1">00000</span><span class="greyText">阿里人次申报公益时</span></p>
        <p><span class="declareBg declareBg2">00000</span><span class="greyText">阿里人申报>=3公益时</span></p>
        <div>
            <p class="textOnly">全体阿里人共申报</p>
            <p><span class="declareBg declareBg3">00000</span><span class="greenText">公益时</span></p>
        </div>
    </div>


</div>

</body>

<script src="https://unpkg.com/vue@2.4.2" type="text/javascript" charset="utf-8"></script>
{{--<script src="//{{ Request::getHost() }}:8080/socket.io/socket.io.js"></script>--}}
<script type="application/javascript">
    //    var app = new Vue({
    //        el: '#temp3',
    //        data: {
    //            uid0: '',
    //            uid1: '',
    //            uid2: '',
    //            uid3: '',
    //            uid4: '',
    //            uid5: '',
    //            uid6: '',
    //            uid7: '',
    //            uid8: '',
    //            uid9: ''
    //        }
    //    });

    {{--var socket = io('http://{{ Request::getHost() }}:8080');--}}

    //    socket.on('ali:App\\Events\\AliPhoto', function (data) {
    //        app.$data.uid0 = data.uid[0].uid;
    //        app.$data.uid1 = data.uid[1].uid;
    //        app.$data.uid2 = data.uid[2].uid;
    //        app.$data.uid3 = data.uid[3].uid;
    //        app.$data.uid4 = data.uid[4].uid;
    //        app.$data.uid5 = data.uid[5].uid;
    //        app.$data.uid6 = data.uid[6].uid;
    //        app.$data.uid7 = data.uid[7].uid;
    //        app.$data.uid8 = data.uid[8].uid;
    //        app.$data.uid9 = data.uid[9].uid;
    //    });

    $(function () {

        setInterval(function () {
            $.ajax({
                url: "http://192.168.169.101/api/ali/total",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('.declareBg1').html(data.totalCount);
                    $('.declareBg2').html(data.totalFullCount);
                    $('.declareBg3').html(data.totalTimes)
                },
                error: function (res) {

                }
            });
        }, 60000);
//
//        setInterval(function () {
//            $.ajax({
//                url: "http://api.touchworld-sh.com/api/ali/event",
//                type: "GET",
//                success: function (data) {
//
//                },
//                error: function (res) {
//
//                }
//            });
//        }, 300000)
    })
</script>
</html>
