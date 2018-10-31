<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>{{ isset($title) ? $tile : '' }}</title>
    <style>
        .img-box {
            padding-bottom: 100%;
        }

        .img-box img {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="img-box">
    <img src="{{ $path }}"/>
</div>
</body>
</html>