<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
  <title>雪佛兰</title>
  <script src="js/rem.js"></script>
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <section class="page6">
    <div class="rank_frame">
      <div class="myInfo">
        <img class="avatar" src="images/bg.jpg">
        <span>您本轮排名是第18名,本轮得分29828</span>
      </div>
      <ul class="rank">
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><img src="images/no1.png"></div>
        </li>
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><img src="images/no2.png"></div>
        </li>
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><img src="images/no3.png"></div>
        </li>
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><span>4</span></div>
        </li>
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><span>5</span></div>
        </li>
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><span>6</span></div>
        </li>
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><span>7</span></div>
        </li>
        <li>
          <div class="avatar"><img src="images/bg.jpg"></div>
          <div class="info">
            <span>测试名字一定要长</span>
            <time>09-08&nbsp;18:22</time>
          </div>
          <div class="score">
            <div>29828</div>
          </div>
          <div class="ranking"><span>8</span></div>
        </li>
      </ul>
    </div>
    <div class="btn_index breathing"></div>
  </section>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $('.btn_index').on('touchend', function(){
      window.location.href = 'https://www.baidu.com'
    })
    
    changeBtn('btn_index')
    function changeBtn(btn) {
      $('.' + btn).on('touchstart', function(){
        $('.' + btn).css({
          background: "url(images/" + btn + "_press.png) no-repeat",
          backgroundSize: '100% 100%'
        })
      })
      $('.' + btn).on('touchend', function(){
        $(`.${btn}`).css({
          background: "url(images/" + btn + ".png) no-repeat",
          backgroundSize: '100% 100%'
        })
      })
    }
  </script>
</body>

</html>