<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=3120,user-scalable=no">
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

</html>