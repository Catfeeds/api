// var URL = window.location.href;
// var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
var BASE_PATH = 'http://api.touchworld-sh.com/qifu/illumall03/';

/**
 * 图片预加载 
 */
$(function() {
	// prevent iphone touchmove
	$(".p1").on("touchmove", function(event) {
		event.preventDefault();
	});

	var loader = new PxLoader(),
		// 把页面的图片列在这里
		fileList = [
			'img/loading.jpg',
			'img/loadingDrip.png',
			'img/loadingText1.png',
			'img/loadingText2.png',
			'img/logo.png',
			'images/bg.png',
			'images/gLeaf.png',
			'images/illu.png',
			'images/logo.png',
			'images/mo.png',
			'images/mo2.png',
			'images/text.png',
			'images/textBtn.png',
			'images/y.png',

		];
	for(var i = 1; i <= 39; i++) {
		fileList.push("images/" + i + ".jpg");
	}
	for(var i = 0; i <= 9; i++) {
		fileList.push("/images/003_0000" + i + ".jpg");
	}
    for(var i = 10; i <= 16; i++) {
        fileList.push("images/003_000" + i + ".jpg");
    }
	//把图片载入加载器
	for(var i = 0; i < fileList.length; i++) {
		var pxImage = new PxLoaderImage( BASE_PATH+fileList[i]);

		pxImage.imageNumber = i + 1;
		loader.add(pxImage);
	}

	//当加载完成时
	loader.addCompletionListener(function() {
		console.log("预加载图片：" + fileList.length + "张");
		loadingFinish();
	});
	//loading 进度监听
	loader.addProgressListener(function(e) {
		var percent = Math.round((e.completedCount / e.totalCount) * 100); //正序, 1-100
		realLoadingNum = percent;
		//      console.log(percent);
	});
	var realLoadingNum = 0;
	var fakeLoadingNum = 0;
	var myLoadingInterval = setInterval(function() {
		fakeLoadingNum++;
		if(realLoadingNum > fakeLoadingNum) {
			if(fakeLoadingNum > 50) {
				$(".loadingText2").removeClass("opacity0");
				$(".loadingText1").addClass("opacity0");
			}
			$(".loadingNob").html("Loading..." + fakeLoadingNum + "%");
			$(".loadingDrip2").css("height", fakeLoadingNum + "%");

		} else {
			if(realLoadingNum > 50) {
				$(".loadingText2").removeClass("opacity0");
				$(".loadingText1").addClass("opacity0");
			}
			$(".loadingNob").html("Loading..." + realLoadingNum + "%");
			$(".loadingDrip2").css("height", realLoadingNum + "%");
		}
		if(fakeLoadingNum >= 100 && realLoadingNum == 100) {
			isIntervalFinish = true;
			loadingFinish();
			clearInterval(myLoadingInterval);
		}
	}, 30);
	//下面的参数测试时改为true by sl
	var isIntervalFinish = false;
	// var isIntervalFinish=true;
	function loadingFinish() {
		if(isIntervalFinish == false) {
			return;
		}
		isIntervalFinish = true;
		//BGM.play();
		__isAnimate = false;

		loadingClose = false;
		$(".loading-container").addClass("loading_amin");
		setTimeout(function() {
			$(".loading").hide();
			xuliezhen();

		}, 600);
		$(".content").show();

	}

	//启动
	loader.start();
});

function mobilecheck() {
	var check = false;
	(function(a) { if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true })(navigator.userAgent || navigator.vendor || window.opera);
	return check;
}
//第一段序列帧加载
function xuliezhen() {
	var frame1 = new SequenceFrame({
		id: $('#canvas')[0],
		width: 640,
		height: 1038,
		speed: 100,
		loop: false,
		callback: function() {
			$('.essence').show();
		},
		imgArr: [
			BASE_PATH+"images/003_00000.jpg",
			BASE_PATH+"images/003_00001.jpg",
			BASE_PATH+"images/003_00002.jpg",
			BASE_PATH+"images/003_00003.jpg",
			BASE_PATH+"images/003_00004.jpg",
			BASE_PATH+"images/003_00005.jpg",
			BASE_PATH+"images/003_00006.jpg",
			BASE_PATH+"images/003_00007.jpg",
			BASE_PATH+"images/003_00008.jpg",
			BASE_PATH+"images/003_00009.jpg",
			BASE_PATH+"images/003_00010.jpg",
			BASE_PATH+"images/003_00011.jpg",
			BASE_PATH+"images/003_00012.jpg",
			BASE_PATH+"images/003_00013.jpg",
			BASE_PATH+"images/003_00014.jpg",
			BASE_PATH+"images/003_00015.jpg",
			BASE_PATH+"images/003_00016.jpg",

		]
	});
}

$('.page2 img').click(function() {
	console.log(999);
	$('#canvas').hide();
	$('.page2').hide();

	var frame2 = new SequenceFrame({
		id: $('#canvas1')[0],
		width: 640,
		height: 1038,
		speed: 100,
		loop: false,
		callback: function() {

			$('.essence1').show();

		},
		imgArr: [

			BASE_PATH+"images/1.jpg",
			BASE_PATH+"images/2.jpg",
			BASE_PATH+"images/3.jpg",
			BASE_PATH+"images/4.jpg",
			BASE_PATH+"images/5.jpg",
			BASE_PATH+"images/6.jpg",
			BASE_PATH+"images/7.jpg",
			BASE_PATH+"images/8.jpg",
			BASE_PATH+"images/9.jpg",
			BASE_PATH+"images/10.jpg",
			BASE_PATH+"images/11.jpg",
			BASE_PATH+"images/12.jpg",
			BASE_PATH+"images/13.jpg",
			BASE_PATH+"images/14.jpg",
			BASE_PATH+"images/15.jpg",
			BASE_PATH+"images/16.jpg",
			BASE_PATH+"images/17.jpg",
			BASE_PATH+"images/18.jpg",
			BASE_PATH+"images/19.jpg",
			BASE_PATH+"images/20.jpg",
			BASE_PATH+"images/21.jpg",
			BASE_PATH+"images/22.jpg",
			BASE_PATH+"images/23.jpg",
			BASE_PATH+"images/24.jpg",
			BASE_PATH+"images/25.jpg",
			BASE_PATH+"images/26.jpg",
			BASE_PATH+"images/27.jpg",
			BASE_PATH+"images/28.jpg",
			BASE_PATH+"images/29.jpg",
			BASE_PATH+"images/30.jpg",
			BASE_PATH+"images/31.jpg",
			BASE_PATH+"images/32.jpg",
			BASE_PATH+"images/33.jpg",
			BASE_PATH+"images/34.jpg",
			BASE_PATH+"images/35.jpg",
			BASE_PATH+"images/36.jpg",
			BASE_PATH+"images/37.jpg",
			BASE_PATH+"images/38.jpg",
			BASE_PATH+"images/39.jpg",

		]
	});

})

//点击水滴动画
$('.essence1 img').one("click", function() {
	$('.page3').fadeOut('slow');
	$('#canvas1').fadeOut('slow', function() {
		$('.page1').fadeIn('slow');
		$('.leaf2').animate({
			width: "260px",
			left: "120px",
			top: "280px"
		}, 1800).animate({
			width: "284px",
			left: "144px",
			top: "350px"
		}, 2000);

		setTimeout(function() {

			$('.leaf3').animate({
				width: "413px",
				left: "168px",
				top: "233px"
			}, 2800);

		}, 1000)

	});
});