<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
		<link rel="stylesheet" href="{{asset('jc/css/index.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('jc/css/video-js.css')}}"/>
		<title></title>
		<script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?8a6e9e7210f32dc650e98e3c6d78bddd";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
		</script>
	</head>

	<body>
		<div class="page">
			<div class="content content1">
				<video webkit-playsinline playsinline  preload='true' loop autoplay   controls id="my-video" class="video-js" width="640" height="505" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
					<source src="{!! $path !!}"> 您的浏览器不支持HTML5视频
				</video>

				<img src="{{asset('jc/img/shareBtn2.png')}}" alt="" class="shareBtn hidden">
				<img src="{{asset('jc/img/careBtn.png')}}" alt="" class="careBtn hidden">
			</div>
			<div class="content hidden content2">
				<img src="{{asset('jc/img/code.png')}}" alt="" class="code">
				<img src="{{asset('jc/img/knowBtn.png')}}" alt="" class="kownBtn">
			</div>
			<div class="content hidden content3">
				<img src="{{asset('jc/img/shareText.png')}}" alt="" class="shareText">
				<img src="{{asset('jc/img/plane.png')}}" alt="" class="plane">
				<img src="{{asset('jc/img/knowBtn.png')}}" alt="" class="kownBtn">
			</div>
		</div>

	</body>
	<script src="{{asset('jc/js/jquery.min.js')}}"></script>

	<script src="{{asset('jc/js/video.min.js')}}" type="text/javascript" charset="utf-8"></script>
	<script src="{{asset('jc/js/index.js')}}"></script>
	<script type="text/javascript">
			var myPlayer = videojs('my-video');
				videojs("my-video").ready(function() {
					var myPlayer = this;
					myPlayer.play();
					
					var video = $('video');
	

			
					video[0].play(); 
					document.addEventListener("WeixinJSBridgeReady", function () { 
						video[0].play();
 
				    }, false);
				});
				
				

	</script>

</html>

