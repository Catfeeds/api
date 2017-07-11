<!DOCTYPE html>
<html>
<head>
	<title>启赋</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=640,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="{{asset('qifu/illumall01/css/index.css')}}">
	<script type="text/javascript" src="{{ asset('qifu/illumall01/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('qifu/illumall01/js/sequenceFrame.js') }}"></script>
	<script type="text/javascript" src="{{ asset('qifu/illumall01/js/pxloader-all.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('qifu/illumall01/js/index.js') }}"></script>
</head>
<body>
	<div class="page loading-container">
		<div class="loadingWrap">
			<div class="loadingDripWrap">
				<div class="loadingDrip1"></div>`
				<div class="loadingDrip2"></div>
			</div>
			<p class="loadingText1">有机，是什么</p>
			<p class="loadingText2 hidden">什么才是真正的有机？</p>
			<p class="loadingNob">Loading...0%</p>
		</div>
	</div>
	<canvas id='canvas'></canvas>
	<div class="page frame">
		<div class="bold">
			<div class="light">
				<img src="{{ asset('qifu/illumall01/images/logo.png') }}">
			</div>
		</div>
	</div>
	<div class="page essence hidden">
		<div class="essence-wrap">
			<img src="{{ asset('qifu/illumall01/images/water.png') }}">
			<input type="text" class="hidden">
		</div>
		<button class="hidden"></button>
    </div>
    <div class="page mask hidden">
	    <div class="popup">
	    	<img src="{{ asset('qifu/illumall01/images/tips.png') }}" class="tips">
    		<img src="{{ asset('qifu/illumall01/images/X.png') }}" class="close">
	    </div>
    </div>
	<div class="page page1 hidden">
        <img src="{{ asset('qifu/illumall01/images/water01.png') }}" class="water01">
        <img src="{{ asset('qifu/illumall01/images/font.png') }}" class="font">
	</div>
</body>
<script type="application/javascript">
    //点击提交那妞切换动画
    $("button").click(function () {
        var val = $('.essence input').val();
        $.ajax({
            type: 'POST',
            url: 'http://api.touchworld-sh.com/api/qf/user',
            data: {
                openid: '{{ $user_info->id }}',
                nickname: '{{ $user_info->nickname }}',
                name: val
            },
            // dataType: "json",
            success: function (data) {
                if (data == true) {
                    $('.essence input').fadeOut("slow");
                    $('.essence button').fadeOut("slow");
                    $('#canvas').fadeOut('slow', function () {
                        $('.page1').fadeIn('slow');
                        $('.essence img').animate({
                            width: "198px",
                            height: "227px",
                            left: "120px",
                            top: "50px"
                        }, 800)
                            .animate({
                                width: "148px",
                                height: "177px",
                                left: "142px",
                                top: "270px"
                            }, 800, function () {
                                $('.font').animate({
                                    bottom: "150px",
                                    opacity: 1
                                }, 800)
                            })
                    });
                } else {
                    $(".mask").show();
                }
            },
            error: function (res) {

            }
        });
    });
</script>
</html>