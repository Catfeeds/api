<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>科莱丽人员信息核对</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        (function flexible(window, documet) {
            var html = document.documentElement

            //  set 1rem = viewWidth / 10
            function setRemUnit() {
                var htmlWidth = html.clientWidth || document.body.clientWidth || document.body.getBoundingClientRect().width
                htmlWidth = htmlWidth > 750 ? 750 : htmlWidth
                html.style.fontSize = htmlWidth / 10 + 'px'
            }

            setRemUnit()
            //  reset rem unit on page resize
            window.addEventListener('resize', setRemUnit)
        }(window, document))
    </script>
</head>

<body>
<img class="logo" src="images/logo.png">
<section>
    @if($user)
        <h2>信息核对</h2>
        <p><span><img src="images/icon1.png"></span><strong>{{ $user->department }}</strong></p>
        <p><span><img src="images/icon2.png"></span><strong>{{ $user->name }}</strong></p>
        <p><span><img src="images/icon3.png"></span><strong>{{ $user->sex }}</strong></p>
        <p><span><img src="images/icon4.png"></span><strong>{{ $user->IdCard }}</strong></p>
        <img class="avatar" src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/project%2Fclari%2F{{ $user->id }}.jpg">
    @else
        <h2>查不到讯息</h2>
    @endif
</section>
</body>

</html>
