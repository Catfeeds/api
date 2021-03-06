<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('hxw/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('hxw/css/index.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>和讯网</title>
</head>
<body>
<div class="bg_info">
    <form action="{{ url('hxSign/register') }}" method="post">
        {{ csrf_field() }}
        <div>
            <span class="space">姓名</span>:
            <input class="username" name="name" placeholder="请输入姓名" type="text" value="{{ old('name') }}"/>
        </div>
        <div>
            <span class="space">电话</span>:
            <input class="phone_number" name="phone" placeholder="请输入正确的电话号码"
                   type="text" value="{{ old('phone') }}"/>
        </div>
        <div>
            <span>公司名称</span>:
            <input place="company_name" name="company" placeholder="请输入公司名称" type="text" value="{{ old('company') }}"/>
        </div>
        <label for="submit">
            <input id="submit" type="submit" style="display: none">
            <img src="{{ asset('hxw/img/btn_submit.png') }}" alt="">
        </label>
    </form>
</div>
</body>
<script type="application/javascript">
    @if(session('success'))
    alert('{{ session('success') }}');
    @endif
    @if(count($errors)>0)
    @forEach($errors->all() as $error)
    @if($loop->first)
    alert('{{ $error }}');
    @endif
    @endforeach
    @endif
</script>
</html>