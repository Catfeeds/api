<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>欧莱雅</title>
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
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrap_phone">
    <p><input type="text" class="username"  placeholder="NAME | 姓名"></p>
    <p><input type="text" class="department" placeholder="DEPARTMENT | 部门"></p>
    <p><input type="text" class="email" placeholder="E-MAIL | 邮箱"></p>
    <p><input type="text" class="phone" placeholder="PHONE | 电话"></p>
    <div class="btn_register"><button></button></div>
  </div>
  <div class="wrap_pc hide">
    <p><input type="text" class="username"  placeholder="NAME | 姓名"></p>
    <p><input type="text" class="department" placeholder="DEPARTMENT | 部门"></p>
    <p><input type="text" class="email" placeholder="E-MAIL | 邮箱"></p>
    <p><input type="text" class="phone" placeholder="PHONE | 电话"></p>
    <div class="btn_register"><button></button></div>
  </div>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
  <script>
    resize()

    window.onresize = function(){
      console.log(123)
      resize()
    }

    function resize () {
      var winWidth = window.innerWidth
      console.log(winWidth)
      if  (winWidth > 768) {
        $('html,body').css({
            position: 'relative',
            minWidth: '1400px',
            width: '100%',
            height: '100%',
            background: "url('images/bg.jpg') no-repeat",
            backgroundSize: '100% 100%'
        })
        $('.wrap_phone').hide()
        $('.wrap_pc').show()
      } else {
        $('html,body').css({
          position: 'relative',
          minWidth: 0,
          width: (750 / 750 * 10) + 'rem',
          height: (1547 / 750 * 10) + 'rem',
          background: "url('images/bg.png') no-repeat",
        }).css('background-size', '100% 100%')
        $('.wrap_phone').show()
        $('.wrap_pc').hide()
      }
    }

    $('.wrap_phone .btn_register button').on('click', register)
    $('.wrap_pc .btn_register button').on('click', register)

    function register () {
      if  (window.innerWidth > 768) {
        var username = $('.wrap_pc .username').val()
        var department = $('.wrap_pc .department').val()
        var email = $('.wrap_pc .email').val()
        var phone = $('.wrap_pc .phone').val()
      } else {
        var username = $('.wrap_phone .username').val()
        var department = $('.wrap_phone .department').val()
        var email = $('.wrap_phone .email').val()
        var phone = $('.wrap_phone .phone').val()
      }
      var reg_email = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/
      if (username === '') {
        alert('请输入姓名')
      } else if (department === '') {
        alert('请输入部门')
      } else if (email === '') {
        alert('请输入邮箱')
      } else if (!reg_email.test(email)) {
        alert('邮箱格式错误')
      }else if (phone === '') {
        alert('请输入电话')
      } else if (phone.length !== 11) {
        alert('请输入正确的手机号')
      }else {
        $.ajax({
          method: 'POST',
          url: 'https://api.shanghaichujie.com/api/oreal/user',
          data: {
            username: username,
            department: department,
            email: email,
            phone: phone
          }
        }).done(function (res) {
          if (res.status) {
            $('.wrap_phone .btn_register button').off('click', register)
            $('.wrap_pc .btn_register button').off('click', register)
            alert('注册成功')
          }
        })
      }
    }
  </script>
</body>
</html>