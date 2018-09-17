$(function () {
	var BGM = $('#bgm')[0];
	document.addEventListener("WeixinJSBridgeReady", function () {
		BGM.play();
	}, false);
	document.addEventListener('touchstart', firstTouch);
	function firstTouch() {
		BGM.play();
		document.removeEventListener('touchstart', firstTouch);
	}
	var userInfo = {}
	var mySwiper = new Swiper('.swiper-container', {
		direction: 'vertical',
		initialSlide: 0,
		on: {
			init: function () {
				swiperAnimateCache(this)
				swiperAnimate(this); //初始化完成开始动画
			},
			slideChangeTransitionEnd: function () {
				swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
			}
		}
	})
	$('.updateImg #file').on('change', (e) => {
		var reader = new FileReader()
		reader.readAsDataURL(e.target.files[0])
		reader.onload = function (e) {
			userInfo.businessCard = reader.result
			$('.businessCard img').attr('src', reader.result)
			if ($('.businessCard img').attr('src') === reader.result) {
				$('.stage1').hide()
				$('.stage2').show()
				userInfo.username = $('.stage1 .username').val()
				userInfo.phone = $('.stage1 .phone').val()
				userInfo.email = $('.stage1 .email').val()
				userInfo.company = $('.stage1 .company').val()
				userInfo.image = reader.result
				$('.stage2 .username .right').text(userInfo.username)
				$('.stage2 .phone .right').text(userInfo.phone)
				$('.stage2 .email .right').text(userInfo.email)
				$('.stage2 .company .right').text(userInfo.company)
			} else {
				$('.businessCard img')[0].onload = () => {
					$('.stage1').hide()
					$('.stage2').show()
					userInfo.username = $('.stage1 .username').val()
					userInfo.phone = $('.stage1 .phone').val()
					userInfo.email = $('.stage1 .email').val()
					userInfo.company = $('.stage1 .company').val()
					userInfo.image = reader.result
					$('.stage2 .username .right').text(userInfo.username)
					$('.stage2 .phone .right').text(userInfo.phone)
					$('.stage2 .email .right').text(userInfo.email)
					$('.stage2 .company .right').text(userInfo.company)
				}
			}
		};
	})
	$('.stage2 .submit').on('touchend', () => {
		var reg_email = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/
		if (userInfo.username === '') {
			alert('Name should not be empty')
		} else if (userInfo.phone === '') {
			alert('The phone number can not be empty')
		} else if (userInfo.email === '') {
			alert('E-mail address can not be empty')
		} else if (userInfo.company === '') {
			alert('Enterprises can not be empty')
		} else if ($.trim(userInfo.phone).length !== 11) {
			alert('Wrong phone number')
		} else if (!reg_email.test(userInfo.email)) {
			alert('Error in mailbox format')
		} else {
			$('.loading').show()
			$.ajax({
				method: 'POST',
				url: 'https://api.shanghaichujie.com/api/pingAn/user',
				data: {
					username: userInfo.username,
					company: userInfo.company,
					email: userInfo.email,
					phone: userInfo.phone,
					image: userInfo.image
				}
			}).done(function (res) {
				if (res) {
					$('.loading').hide()
					$('.stage2').hide()
					$('.stage3').show()
				}
			})
		}
	})
	$('.stage2 .return').on('touchend', () => {
		$('.stage2').hide()
		$('.stage1').show()
		$('.updateImg #file').val('')
	})
	$('.stage3 .return').on('touchend', () => {
		// $('.stage3').hide()
		// $('.stage1').show()
		mySwiper.slideTo(0, 0, true)
	})
})