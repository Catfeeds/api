<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="{{ asset('zhongL/sign/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('zhongL/sign/css/index.css') }}">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <title>抽奖弹幕</title>
</head>
<body>
<div class="barrage">
    <ul>
        <li>他们说发弹幕能增加中奖率，我试试灵不灵</li>
        <li>我爱丽水，我爱中梁翡翠滨江</li>
        <li>黄金我来啦，为中梁翡翠滨江疯狂打 call !!!!</li>
        <li>第一次见这么高端的双屏发布会~~~</li>
        <li>其实我主要是来看发布会的，顺便抽个奖~~</li>
    </ul>
    <form action="{{ url('zl/barrageSubmit') }}" method="post">
        {{ csrf_field() }}
        <input id="ipu" name="barrage" type="text" style="display: none">
        <label for="submit">
            <input id="submit" type="submit" style="display: none">
            <img src="{{ asset('zhongL/sign/img/btn_submit.png') }}" alt="">
        </label>
    </form>
</div>
<div class="info_text hidden">

</div>

</body>
<script src="{{ asset('zhongL/sign/js/jquery-1.11.3.min.js') }}"></script>
<script>
    $('li').click(function () {
        $(this).css('background-color', 'grey').siblings().css('background-color', '#f0ead3');

        var index = $(this).html();

        $('#ipu').val(index);

    })
    @if(session('success'))
    alert('{{ session('success') }}');
    @endif
    @if(session('status'))
    alert('{{ session('status') }}');
    @endif
</script>
</html>
