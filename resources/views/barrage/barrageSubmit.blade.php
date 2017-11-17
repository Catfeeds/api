<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>碧桂园</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('html/barrage/zhou/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('html/barrage/zhou/css/index.css') }}">

</head>
<body>
<div class="bgy">
    @if(isset($status))
        <p style="font-size: 45px;color: #FFFFFF;text-align: center;padding-top: 55%">
            {{ $status }}
        </p>
    @else
    <form action="{{ url('barrage/barrageSubmit') }}" method="post">
        {!! csrf_field() !!}
        <input class="info_text" type="text" name="barrage" placeholder="请输入弹幕内容">
        <input class="info_phone" type="phone"  name="phone" placeholder="请输入手机号">
        <label for="submit">
            <input id="submit" type="submit" style="display: none">
            <img src="{{ asset('html/barrage/zhou/img/btn_sub.png') }}" alt="">
        </label>
    </form>
    @endif

    {{--@if(session('success'))--}}
        {{--<div class="popup">--}}
            {{--<img src="{{ asset('html/barrage/zhou/img/btn_cancel.png') }}" alt="" class="btn_cancel">--}}
        {{--</div>--}}
    {{--@endif--}}

</div>

</body>
<script src="{{ asset('html/barrage/zhou/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('html/barrage/zhou/js/str.js') }}"></script>
<script>
    @if($errors)
        @forEach ($errors as $error)
        alert('{{ $error }}');
        @endforeach
    @endif
   $('.btn_cancel').click(function () {
        $('.popup').hide();
    });
    var arrMg = str.split('\n');
    $('form').submit(function () {
        if($('.info_text').val() == '' && $('.info_phone').val() == ''){
            alert('内容不能为空');
            return false;
        }else if($('.info_text').val() == ''){
            alert('弹幕不能为空');
            return false;
        }else if($('.info_phone').val() == '' || $('.info_phone').val().length != 11){
            alert('手机号格式错误');
            return false;
        }else if($('.info_text').val().length > 18){
            alert('弹幕字符不能大于18');
            $('.info_text').val('');
            return false;
        }else if(filter($('.info_text').val())){
            alert('弹幕不能有敏感词');
            return false;
        }else if(!regPhone.test($('.info_phone').val())){
            alert('请输入正确的手机号');
            return false;
        }
    })

    function filter(val){
        var can;
        for (var i = 0; i < arrMg.length; i++) {
            var reg = new RegExp(arrMg[i],'ig');
            can = reg.test(val);
            if(can){
                console.log(arrMg[i])
                return can;
            }
        }
        return false;
    }

</script>
</html>
