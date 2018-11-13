<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>天猫汽车</title>
    <script src="./js/amfe-flexible.js"></script>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/index.min.css">
</head>

<body>
<section>
    <div class="logo"><img src="./imgs/logo.png"></div>
    <div class="container">
        <h2>信息填写</h2>
        <p><span>淘宝ID：</span><input class="taobaoID" type="text"></p>
        <p><span>姓&nbsp;&nbsp;&nbsp;名：</span><input class="username" type="text"></p>
        <p><span>电&nbsp;&nbsp;&nbsp;话：</span><input class="phone" type="text"></p>
        <p class="select_wrap">
            <span>性&nbsp;&nbsp;&nbsp;别：</span>
            <i class="triangle"></i>
            <select class="gender">
                <option style="display: none"></option>
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
        </p>
        <p class="tips">*该信息仅限于领取奖品核对身份信息使用。</p>
        <p class="tips">*参与者年龄需满12周岁。</p>
    </div>
    <div class="submit"><img src="./imgs/submit.png"></div>
</section>
<section class='popup' style="display: none">
    <img src="./imgs/popup.png">
</section>
<script src="./js/index.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function store(taobao, name, phone, sex) {
        axios.post('{{ url('tmall/car/user/store') }}', {
            name: name,
            phone: phone,
            taobao: taobao,
            sex: sex,
            path: '{{ $path }}',
            game: '{{ $game }}'
        }, {
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(function () {
            document.querySelector('.popup').style.display = 'block'
        }).catch(function () {
            alert('很抱歉上传失败')
        })
    }
</script>
</body>

</html>