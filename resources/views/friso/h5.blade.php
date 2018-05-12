<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('res/friso/h5/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('res/friso/h5/css/index.css') }}">
    <title>美素佳儿</title>
</head>
<body>
<div class="wrapper">
    <section class="session ">
        <form action="{{ url('friso/h5/draw') }}" method="post" id="form">
            {{ csrf_field() }}
            <input type="hidden" name="openid" value="{{ $openid }}">
            {{--<div class="date">--}}
            {{--<i></i>--}}
            {{--<select name="" id="">--}}
            {{--<option>点击此处选择活动日期</option>--}}
            {{--</select>--}}
            {{--</div>--}}
            <div class="activity">
                <i></i>
                <select name="location" id="location">
                    <option>点击此处选择本次的活动场次</option>
                    @foreach($locs as $loc)
                        <option value="{{ $loc->location }}">{{ $loc->location }}</option>
                    @endforeach
                </select>
            </div>
            <img class="btn_submit" id="btn" src="{{ asset('res/friso/h5/img/btn_submit.png') }}" alt="">

        </form>
    </section>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="{{ asset('res/friso/h5/js/awardRotate.js') }}"></script>
<script type="application/javascript">
    // 表单提交
    $('.btn_submit').click(function () {
        // var data = $('.date select').val();
        var locate = $('.activity select').val();
        window.locate = locate;
        if ($('.activity select')[0].selectedIndex == 0) {
            alert('请选择活动场次')
        } else {
            // $('.draw').show().siblings().hide();
            $('#form').submit();
        }
    })
</script>

</html>
