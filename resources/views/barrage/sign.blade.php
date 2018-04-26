<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('zhongL/sign/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('zhongL/sign/css/index.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>签到</title>
</head>
<body>
<div class="bg_info">
    @if(isset($status))
        <p style="font-size: 45px;color: #FFFFFF;text-align: center;padding-top: 500px">
            {{ $status }}
        </p>
    @else
        <form action="{{ url('barrage/barrageSubmit') }}" method="post">
            {{ csrf_field() }}
            <div>
                <span class="space">姓名</span>:
                <input class="username" placeholder="请输入姓名" type="text" name="name" value="{{ old('name') }}"/>
            </div>
            <div>
                <span class="space">电话</span>:
                <input class="phone_number" placeholder="请输入正确的电话号码" name="phone" value="{{ old('phone') }}"
                       type="text"/>
            </div>
            <label for="submit">
                <input id="submit" type="submit" style="display: none">
                <img src="{{ asset('zhongL/sign/img/btn_submit.png') }}" alt="">
            </label>
        </form>
    @endif
</div>
</body>
<script src="{{ asset('zhongL/sign/js/jquery-1.11.3.min.js') }}"></script>
<script>
    var reg = /^1[0-9]{10}$/;
    $('form').submit(function () {
        if ($('.username').val() == "" || $('.username').val().length >= 10) {
            alert('姓名填写有误');
            return false;
        } else if ($('.phone_number').val() == "" || !reg.test($('.phone_number').val())) {
            alert('电话号码格式错误');
            return false;
        }
    })


    @if(count($errors)>0)
    @forEach($errors->all() as $error)
    @if($loop->first)
    alert('{{ $error }}');
    @endif
    @endforeach
    @endif
</script>
</html>
