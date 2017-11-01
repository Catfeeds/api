<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <title>抽奖</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=640,user-scalable=no">
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }

        input[type="submit"]{
            width: 300px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            color: white;
            background-color: #0D9BF2;
            border-radius: 10px;
            border: none;
            font-size: 28px;
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
        }
        .btn_sub1{
            top: 400px;
        }
        .btn_sub2{
            top: 530px;
        }
    </style>
</head>
<body>
<form action="{{ url('zl/change') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="draw" name="change">
    <input class="btn_sub1" type="submit" value="抽奖">
</form>

<form action="{{ url('zl/change') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" value="barrage" name="change">
    <input class="btn_sub2" type="submit" value="返回弹幕">
</form>
</body>
<script type="application/javascript">
    @if(session('success'))
    alert('{{ session('success') }}');
    @endif
</script>
</html>