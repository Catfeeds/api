<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>玫琳凯</title>
    <script src="js/amfe-flexible.js"></script>
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
@if(is_null($user))
<section class="vote">
    <div class="logo">
        <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/logo.png">
    </div>
    <div class="container">
        <label>
            <input name="program" type="radio" value="稻香">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program1.png">
        </label>
        <label>
            <input name="program" type="radio" value="Boots">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program2.png">
        </label>
        <label>
            <input name="program" type="radio" value="旅程">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program3.png">
        </label>
        <label>
            <input name="program" type="radio" value="2018抖音金曲串烧">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program4.png">
        </label>
        <label>
            <input name="program" type="radio" value="旅行">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program5.png">
        </label>
        <label>
            <input name="program" type="radio" value="河东北联盟">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program6.png">
        </label>
        <label>
            <input name="program" type="radio" value="突然想起你">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program7.png">
        </label>
        <label>
            <input name="program" type="radio" value="醉苗乡">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program8.png">
        </label>
        <label>
            <input name="program" type="radio" value="怒放的生命">
            <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/program9.png">
        </label>
        <p class="username"><input type="text" placeholder="姓&nbsp;&nbsp;&nbsp;&nbsp;名"></p>
        <p class="phone"><input type="text" placeholder="手机号"></p>
        <p class="submit"><img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/submit.png"></p>
    </div>
    <div class="foot">
        <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/foot.png">
    </div>
</section>
<section class="result hide">
    <img src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/marykay/result.png">
</section>
@else
<section class="registered">
    <p>您已经参与过投票</p>
</section>
@endif
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>
<script>
    $('.submit img').on('touchend', function () {
        var show = $('input[type="radio"]:checked').val()
        var username = $('.username input').val()
        var phone = $('.phone input').val().replace(/\s/gi, '')

        if (show === undefined) {
            alert('请选择节目')
        } else if (username === '') {
            alert('姓名不能为空')
        } else if (phone === '') {
            alert('请输入手机号')
        } else if (!validatePhone(phone)) {
            alert('手机号格式错误')
        } else {
            axios.post('https://api.shanghaichujie.com/api/marykay/user/store', {
                username: username,
                phone: phone,
                show: show,
                openid: '{{ $wechat['id'] }}'
            }).then((res) => {
                if (res.data) {
                    $('.result').css('display', 'flex')
                }
            })
        }
    })

    function validatePhone(val) {
        let reg = /^1\d{10}$/
        if (reg.test(val)) {
            return true
        } else {
            return false
        }
    }
</script>
</body>

</html>