<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>雪佛兰</title>
    <script src="js/rem.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<section class="page6">
    <div class="rank_frame">
        @isset($user)
        <div class="myInfo">
            <img class="avatar" src="images/bg.jpg">
            <span>您本轮排名是第{{ $user->rank }}名,本轮得分{{ $user->score }}</span>
        </div>
        @endisset
        <ul class="rank">
            @foreach($rank as $item)
                <li>
                    <div class="avatar"><img src="images/bg.jpg"></div>
                    <div class="info">
                        <span>{{ $item->nickname }}</span>
                        <time>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at)->format('m-d H:i') }}</time>
                    </div>
                    <div class="score">
                        <div>{{ $item->top }}</div>
                    </div>

                    <div class="ranking">
                        @if($loop->index <3)
                            <img src="images/no{{$loop->index +1}}.png">
                        @else
                            <span>{{$loop->index +1}}</span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="btn_index breathing"></div>
</section>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script>
    $('.btn_index').on('touchend', function () {
        window.location.href = 'https://m.chevrolet.com.cn/act/ultramusic/Auth.aspx?scope=snsapi_userinfo&redirect_uri=https://api.shanghaichujie.com/res/chevy/index'
    })

    changeBtn('btn_index')

    function changeBtn(btn) {
        $('.' + btn).on('touchstart', function () {
            $('.' + btn).css({
                background: "url(images/" + btn + "_press.png) no-repeat",
                backgroundSize: '100% 100%'
            })
        })
        $('.' + btn).on('touchend', function () {
            $(`.${btn}`).css({
                background: "url(images/" + btn + ".png) no-repeat",
                backgroundSize: '100% 100%'
            })
        })
    }
</script>
</body>

</html>