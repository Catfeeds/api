<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/friso/h5/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('res/friso/h5/css/index.css') }}">
    <title>美素佳儿</title>
</head>
<body>
<div class="wrapper">
    <section class="session ">
        <form action="">
            {{--<div class="date">--}}
            {{--<i></i>--}}
            {{--<select name="" id="">--}}
            {{--<option>点击此处选择活动日期</option>--}}
            {{--</select>--}}
            {{--</div>--}}
            <div class="activity">
                <i></i>
                <select name="" id="">
                    <option>点击此处选择本次的活动场次</option>
                    @foreach($locs as $loc)
                        <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                    @endforeach
                </select>
            </div>
            <img class="btn_submit" id="btn" src="{{ asset('res/friso/h5/img/btn_submit.png') }}" alt="">

        </form>
    </section>
    <section class="draw hide">
        <div class="turntable">
            <img class="pointer" src="{{ asset('res/friso/h5/img/pointer.png') }}" id="rotate" alt="">
            <img src="{{ asset('res/friso/h5/img/rta_gift.png') }}" alt="" class="rta_gift">
            <img src="{{ asset('res/friso/h5/img/rta.png') }}" alt="" class="rotate">
        </div>
        <img src="{{ asset('res/friso/h5/img/btn_draw.png') }}" alt="" class="btn_draw">
        <div class="popup hide">
            <img class="bg_popup" src="{{ asset('res/friso/h5/img/draw_0.png') }}" alt="">
            <div class="mask">
                <div class="ewm">
                    <img id="qrcode" src="" alt="">
                </div>
                <img src="{{ asset('res/friso/h5/img/text.png') }}" alt="" class="text">
                <p>当前礼品剩余：<span>10</span></p>
            </div>
        </div>
    </section>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="{{ asset('res/friso/h5/js/awardRotate.js') }}"></script>
<script src="{{ asset('res/friso/h5/js/index.js') }}"></script>
<script type="application/javascript">
    //抽奖过程
    window.locs = {!! $locs !!};

    function qrcode(item, location) {
        document.getElementById('qrcode').src = 'https://api.shanghaichujie.com/api/qrcode/generate?text='
            + encodeURIComponent(`openid={{ $openid }}&type=type${item}&location=${location}`)
    }


</script>

</html>
