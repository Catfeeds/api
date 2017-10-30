<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('hxw/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('hxw/css/index.css') }}">
    <title>和讯网</title>
</head>
<body>
<div class="bg_ewm">
    <img class="ewm"
         src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($id)) !!} ">
</div>
</body>
</html>