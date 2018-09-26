<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>人脸识别</title>
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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- <div class="loading"></div> -->
<div class="picBox">
    <!-- <img src="images/pic.jpg">
    <img src="images/pic.jpg"> -->
    @for($i = 1;$i<= $pid; $i++)
        <img src="https://oss-unity.touchworld-sh.com/ZhangChi/MultiAnglePhoto/{{ $timestamp }}-{{ $i }}.png" crossOrigin="Anonymous">
    @endfor
</div>
<div class="result"></div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="js/html2canvas.js"></script>
<script src="https://cdn.bootcss.com/vConsole/3.2.0/vconsole.min.js"></script>
<script>

    window.onload = function () {
        html2canvas($(".picBox")[0]).then(canvas => {
            var img = new Image()
            var imgURL = canvas.toDataURL("image/jpeg")
            img.src = imgURL
            img.onload = function () {
                $(".result").append(img)
                $('.loading').hide()
            }
            console.log(111);
        });
    }
</script>
</body>

</html>