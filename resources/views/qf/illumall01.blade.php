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
</html>