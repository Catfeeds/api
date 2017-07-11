<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=640,target-densitydpi=device-dpi,user-scalable=no">
		<link rel="stylesheet" href="{{ asset('qifu/share2/css/index.css') }}" />
		<title></title>
	</head>
	<body>
		<div class="share">
			<img src="{{ asset('qifu/share2/img/bg.png') }}" alt="" class="bg" />
			<img src="{{ asset('qifu/share2/img/logo.png') }}" alt="" class="logo" />
			<img src="{{ asset('qifu/share2/img/buyBtn.png') }}" class="buyBtn"/>
			<div class="popup">
				<img src="{{ asset('qifu/share2/img/popup.png') }}" alt="" class="popupbg" />
				<img src="{{ asset('qifu/share2/img/cancel.png') }}" alt="" class="cancel" />
			</div>
		</div>
		
	</body>
	<script src="{{ asset('qifu/share2/js/jquery-1.11.3.min.js') }}" type="text/javascript" charset="utf-8"></script>
	<script>
		$('.popup .cancel').click(function(){
			$('.popup').hide();
		})
	</script>
</html>
