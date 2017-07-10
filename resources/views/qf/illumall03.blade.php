<!DOCTYPE html>
<html>

	<head>
		<title>启赋</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
		<link rel="stylesheet" type="text/css" href="{{ asset('qifu/illumall03/css/index.css') }}">
		<link rel="stylesheet" href="{{asset('qifu/illumall03/css/loading.css')}}" />


	</head>

	<body>
		<div class="page frame">
			<div class="bold">
				<div class="light">
					<img src="{{asset('qifu/illumall03/images/logo.png')}}" class="logo">
				</div>
			</div>
		</div>
		<!-- loading -->
		<div class="loading">
			<div class="loading-container">

				<div class="loadingWrap">
					<div class="loadingDripWrap">
						<div class="loadingDrip1 overlay"></div>
						<div class="loadingDrip2  z2"></div>
					</div>
					<div class="loadingText1"></div>
					<div class="loadingText2 opacity0"></div>
					<div class="loadingNob ">Loading...0%</div>
				</div>

			</div>

		</div>
		<div class="content hidden">
			<canvas id='canvas'></canvas>
			<canvas id='canvas1'></canvas>

			<div class="page2 essence hidden">
				<img src="{{asset('qifu/illumall03/images/illu.png')}}" />
			</div>
			<div class="page3 essence1 hidden">
				<img src="{{asset('qifu/illumall03/images/mo2.png')}}" />
			</div>

			<div class="page page1 hidden">
				<img src="{{asset('qifu/illumall03/images/y.png')}}" alt="" class="leaf" />
				<img src="{{asset('qifu/illumall03/images/gLeaf.png')}}" alt="" class="leaf2" />
				<img src="{{asset('qifu/illumall03/images/mo.png')}}" alt="" class="leaf3" />
				<img src="{{asset('qifu/illumall03/images/text.png')}}" class="text" />
				<img src="{{asset('qifu/illumall03/images/textBtn.png')}}" alt="" class="textBtn" />

			</div>
		</div>

	</body>
	<script type="text/javascript" src="{{asset('qifu/illumall03/js/jquery.min.js')}}"></script>
	<script src="{{asset('qifu/illumall03/js/pxloader-all.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('qifu/illumall03/js/script.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('qifu/illumall03/js/sequenceFrame.js')}}" type="text/javascript" charset="utf-8"></script>
	<!--<script type="text/javascript" src="js/index.js"></script>-->

</html>