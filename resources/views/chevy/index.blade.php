<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <title>雪佛兰</title>
  <script src="js/rem.js"></script>
<link href="css/app.1a7b6.css?1a7b6dd2daf20ee82744" rel="stylesheet"></head>

<body>
  <div class="logo"></div>
  <section class="loading">
    <p class="text">加载中</p>
    <p class="progress"><span>0</span>%</p>
  </section>
  <section class="page1 hide">
    <div class="btn_explore breathing"></div>
    <div class="btn_challenge breathing"></div>
    <div class="btn_rank breathing"></div>
  </section>
  <section class="page2 hide">
    <div class="page2_menu">
      <div class="btn_group">
        <div class="btn_prev breathing"></div>
        <div class="btn_next breathing"></div>
        <div class="btn_returnTop breathing"></div>
      </div>
    </div>
  </section>
  <section class="page3 hide">
    <div class="page2_frame"></div>
    <div class="exhibition1"></div>
    <div class="exhibition2"></div>
    <div class="exhibition3"></div>
    <div class="btn_exhibition1 breathing"></div>
    <div class="btn_exhibition2 breathing"></div>
    <div class="btn_exhibition3 breathing"></div>
    <div class="btn_index breathing"></div>
  </section>
  <section class="page4 hide">
    <div class="map">
      <img src="images/7b3eaf2ddaf5b999b2be562d593fce01.jpg">
    </div>
    <div class="popup"></div>
    <div class="btn_challenge2 breathing"></div>
    <div class="btn_prev breathing"></div>
  </section>
  <section class="page5 hide">
    <div class="page4_frame"></div>
    <img class="qrCode" src="https://qr.api.cli.im/qr?data=1&level=H&transparent=false&bgcolor=%23ffffff&forecolor=%23000000&blockpixel=12&marginblock=1&logourl=&size=280&kid=cliim&key=de32a4c489f3b70d8e9cc43ca476e2c8">
    <div class="btn_index breathing"></div>
  </section>
  <script>
    var openid = '{{ $user->openid }}'
    var gameTime = '{{ $user->updated_at }}'
  </script>
<script type="text/javascript" src="js/app.1a7b6.js?1a7b6dd2daf20ee82744"></script></body>

</html>