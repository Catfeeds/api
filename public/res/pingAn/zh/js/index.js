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
		let reader = new FileReader()
		reader.readAsDataURL(e.target.files[0])
		reader.onload = function (e) {
			userInfo.businessCard = reader.result
			$('.businessCard img').attr('src', reader.result)
			$('.businessCard img')[0].onload = () => {
				$('.stage1').hide()
				$('.stage2').show()
				userInfo.username = $('.stage1 .username').val()
				userInfo.phone = $('.stage1 .phone').val()
				userInfo.email = $('.stage1 .email').val()
				userInfo.company = $('.stage1 .company').val()
				userInfo.image = reader.result
				$('.stage2 .username span').text(userInfo.username)
				$('.stage2 .phone span').text(userInfo.phone)
				$('.stage2 .email span').text(userInfo.email)
				$('.stage2 .company span').text(userInfo.company)
			}
		};
	})
	$('.stage2 .submit').on('touchend', () => {
		var reg_email = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/
		if (userInfo.username === '') {
			alert('姓名不能为空')
		} else if (userInfo.phone === '') {
			alert('手机号不能为空')
		} else if (userInfo.email === '') {
			alert('邮箱地址不能为空')
		} else if (userInfo.company === '') {
			alert('企业名不能为空')
		} else if (userInfo.phone.length !== 11) {
			alert('手机号错误')
		} else if (!reg_email.test(userInfo.email)) {
			alert('邮箱格式错误')
		} else {
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