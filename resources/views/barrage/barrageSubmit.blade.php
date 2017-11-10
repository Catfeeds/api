<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>碧桂园</title>
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('html/barrage/zhou/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('html/barrage/zhou/css/index.css') }}">
</head>
<body>
<div class="bgy">
    <form action="{{ url('barrage/barrageSubmit') }}" method="post">
        <input class="info_text" type="text"  placeholder="请输入弹幕内容">
        <label for="submit">
            <input id="submit" type="submit" style="display: none">
            <img src="{{ asset('html/barrage/zhou/img/btn_sub.png') }}" alt="">
        </label>
    </form>

    @if(session('success'))
    <div class="popup">
        <img src="{{ asset('html/barrage/zhou/img/btn_cancel.png') }}" alt="" class="btn_cancel">
    </div>
    @endif

</div>

</body>
<script src="{{ asset('html/barrage/zhou/js/jquery-1.11.3.min.js') }}"></script>
<script>
    $('.btn_cancel').click(function(){
        $('.popup').hide();
    });

    $('form').submit(function(){

        if($('.info_text').val() == ''){
            alert('弹幕不能为空');
            return false;
        }else if($('.info_text').val().length > 18){

            alert('弹幕字符不能大于18');
            $('.info_text').val('');
            return false;
        }

    })

</script>
</html>
