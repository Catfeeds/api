<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>美素佳儿</title>
    <link rel="stylesheet" href="{{ asset('res/friso/reward/css/index.css') }}">
</head>
<body>
<div class="all">
    <section>
        <div style="position: absolute; left: 132px;top: 160px;">
            {!! QrCode::size('376')->margin('0')->generate($openid) !!}
        </div>
        <img src="{{ asset('res/friso/reward/img/popup.png') }}" alt="" class="popup hide">
    </section>
</div>
</body>
</html>
