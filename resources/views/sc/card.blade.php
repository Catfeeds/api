<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>渣打银行梦想留言机</title>
  <script src="js/amfe-flexible.js"></script>
  <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
  <section>
    <div class="title">
      <img src="./imgs/title.png">
    </div>
    <div class="container">
      <div class="content_wrapper">
        <div class="content">
          <!-- 模板start -->
          <img class="content_bg" src="./imgs/{{ $type }}.jpg">
          <audio class="audio1" src="./media/{{ $type }}.mp3" preload></audio>
          <audio class="audio2" src="{{ $path }}" preload></audio>
          <!-- 模板end -->
          <img class="content_btn" src="./imgs/play.png">
        </div>
      </div>
    </div>
    <div class="qrCode">
      <img src="./imgs/qr_code.png">
    </div>
  </section>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $('.content_btn').on('touchend', function () {
      $('.audio1')[0].load()
      $('.audio2')[0].load()
      $('.audio1')[0].play()
      $('.audio2')[0].play()
      $('.content_btn').hide()
    })
    $('.audio2').on('ended', function () {
      $('.audio1')[0].pause()
      $('.audio2')[0].pause()
      $('.content_btn').show()
    })
  </script>
</body>

</html>