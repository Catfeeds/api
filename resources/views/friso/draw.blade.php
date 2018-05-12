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
    <section class="draw">
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
<script type="application/javascript">
    //抽奖过程
    function qrcode() {
        document.getElementById('qrcode').src = 'https://api.shanghaichujie.com/api/qrcode/generate?text='
            + encodeURIComponent(`openid={{ $openid }}&type={{ $type }}&location={{ $location }}`)
    }

    console.log('{{$type}}');
    $(function () {
        //抽奖流程函数
        var bRotate = false;
        //全局的0,1,2,3,4,5,6
        var globalAwards = null;
        // 全局的奖品名字
        var globalTxt = null;
        //点击中间按钮开始抽奖
        $('.btn_draw').click(function () {
            @if($location!=$user->location && !is_null($user->location))
            alert('您已经在 {{ $user->location }} 参与过抽奖');
            @else
            @if($type!='type0')
            qrcode();
            if (bRotate) return;
            switch ('{{ $type }}') {
                case 'type5':
                    rotateFn(0, 324, 'Decobebe 分装奶粉盒');
                    break;
                case 'type1':
                    rotateFn(1, 252, '美素佳儿定制储蓄罐');
                    break;
                case 'type4':
                    rotateFn(2, 180, '法国Globber 5合1滑板车');
                    break;
                case 'type3':
                    rotateFn(3, 108, '荷兰Elittile轻巧 折叠推车');
                    break;
                case 'type2':
                    rotateFn(4, 36, '韩国Bontoy行李箱');
                    break;
            }
            $('.rotate').addClass('rta')
            @else
            alert('很遗憾，礼品已经被领完！')
            @endif
            @endif
        });

        //抽奖函数
        function rotateFn(awards, angles, txt) {
            bRotate = !bRotate;
            $('#rotate').stopRotate();
            $('#rotate').rotate({
                angle: 0,
                animateTo: angles + 1800,
                duration: 8000,
                easing: $.easing.easeInOutExpo,
                //抽奖完成的回调
                callback: function () {
                    $('.rotate').removeClass('rta')
                    globalAwards = awards;
                    globalTxt = txt;
                    bRotate = !bRotate;
                    $('.popup .bg_popup').attr('src', '../../res/friso/h5/img/draw_' + globalAwards + '.png')
                    $('.popup').show();
                }
            })
        }
    })


</script>

</html>