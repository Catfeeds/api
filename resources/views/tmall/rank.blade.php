<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>天猫汽车</title>
    <script src="js/rem.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<ul class="teamName">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>
<ul class="teamTime">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>
<!-- <img src="images/qrCode.jpg" style="position:absolute; right: 50px; bottom: 30px; width:200px;height: 200px; border: 5px solid rgb(4, 116, 200)"> -->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script>
    setInterval(function () {
        $.ajax({
            method: 'GET',
            url: 'https://api.shanghaichujie.com/api/tmall/car/rank?path={{$path}}',
        }).done(function (res) {
            console.log(res.data[0])
            for (let i in res.data) {
                $('.teamName li').eq(i).text(res.data[i].name)
                $('.teamTime li').eq(i).text(res.data[i].car)
            }
        })
    }, 8000)

</script>
</body>

</html>