<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <link rel="stylesheet" href="{{ asset('zhongL/sign/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('zhongL/sign/css/draw2.css') }}">
    <title>Title</title>
</head>
<body>
<div class="draw">
    <ul>
        @foreach($users as $user)
            <li>
                <img src="{{ $user->avatar }}" alt="">
                <div>
                    <span class="nickname">{{ $user->nickname }}</span>
                </div>
            </li>
        @endforeach
        @foreach($unofficially as $item)
            <li>
                <img src="{{ $user->avatar }}" alt="">
                <div>
                    <span class="nickname">{{ $user->nickname }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
</body>
<script src="//api.touchworld-sh.com:6001/socket.io/socket.io.js"></script>
<script src="{{ asset('zhongL/sign/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('js/echo.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    var width = $(window).width();
    $('.draw').css({'width':width,'height':width*6/15 + 'px'});

    var i = 0;

    var timer = setInterval(function () {
        $('li').eq(i).show();

        $('li').eq(i).addClass("animated flipInY");

        i++;

        if(i > 10){

            clearInterval(timer)
        }
    },200)



    window.onresize = function(){
        var width = $(window).width();
        $('.draw').css({'width':width,'height':width*6/15 + 'px'});

    }
</script>

<script type="application/javascript">
    Echo.channel('Zl')
        .listen('ZlChange', (e) => {
            if (e.change === 'barrage') {
                window.location.href = 'http://api.touchworld-sh.com/zhongL/barrage/barrage.html'
            }
        });
</script>
</html>