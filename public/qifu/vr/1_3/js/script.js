var URL = window.location.href;
var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
var realLoadingNum = 0;
var fakeLoadingNum = 0;
var myLoadingInterval = null;

/**
 * 图片预加载 
 */
$(function() {
	bgm_init();
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
			'img/kuang.png',
			'img/text.png',
			'img/jiantou.gif',
			
		];

	for(var i = 0; i <= 60; i++) {
		fileList.push("images/part01/"+i+".jpg");
	}
		for(var i = 0; i <= 17; i++) {
		fileList.push("images/part02/"+i+".jpg");
	}

	//把图片载入加载器
	for(var i = 0; i < fileList.length; i++) {
		var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);

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
	//	 * ios 手机不能自动播放声音
// */
	function bgm_init(){
		var video = document.getElementById('video');
		document.addEventListener("WeixinJSBridgeReady", function () {
			video.play();
		}, false);
		window.addEventListener('touchstart', function firstTouch(){
			video.play();
			this.removeEventListener('touchstart', firstTouch);
		});
	}
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
			$('.arrow').fadeIn(500);
			$('.content').one('click',function(){

				frame2();
				$('.arrow').fadeOut(500);
			})
		},
		imgArr: [
                    "images/part01/0.jpg",
                    "images/part01/1.jpg",
                    "images/part01/2.jpg",
                    "images/part01/3.jpg",
                    "images/part01/4.jpg",
                    "images/part01/5.jpg",
                    "images/part01/6.jpg",
                    "images/part01/7.jpg",
                    "images/part01/8.jpg",
                    "images/part01/9.jpg",
                    "images/part01/10.jpg",
                    "images/part01/11.jpg",
                    "images/part01/12.jpg",
                    "images/part01/13.jpg",
                    "images/part01/14.jpg",
                    "images/part01/15.jpg",
                    "images/part01/16.jpg",
                    "images/part01/17.jpg",
                    "images/part01/18.jpg",

		]
	});
}



function frame2(){
	var frame2 = new SequenceFrame({
		id: $('#canvas1')[0],
		width: 640,
		height: 1038,
		speed: 50,
		loop: false,
		callback: function() {

            $('.arrow').fadeIn(500);
            $('.content').one('click',function(){

                frame3();
                $('.arrow').fadeOut(500);
            })

		},
		imgArr: [
                    "images/part01/19.jpg",
                    "images/part01/20.jpg",
                    "images/part01/21.jpg",
                    "images/part01/22.jpg",
                    "images/part01/23.jpg",
                    "images/part01/24.jpg",
                    "images/part01/25.jpg",
                    "images/part01/26.jpg",
                    "images/part01/27.jpg",
                    "images/part01/28.jpg",
                    "images/part01/29.jpg",
                    "images/part01/30.jpg",
                    "images/part01/31.jpg",
                    "images/part01/32.jpg",
                    "images/part01/33.jpg",
                    "images/part01/34.jpg",
                    "images/part01/35.jpg",
                    "images/part01/36.jpg",
                    "images/part01/37.jpg",
                    "images/part01/38.jpg",
                    "images/part01/39.jpg",
                    "images/part01/40.jpg",
                    "images/part01/41.jpg",
                    "images/part01/42.jpg",
                    "images/part01/43.jpg",
                    "images/part01/44.jpg",
                    "images/part01/45.jpg",
                    "images/part01/46.jpg",
                    "images/part01/47.jpg",
		]
	});
}

function frame3(){
    var frame3 = new SequenceFrame({
        id: $('#canvas2')[0],
        width: 640,
        height: 1038,
        speed: 50,
        loop: false,
        callback: function() {

            $('.textPic').fadeIn(500);

        },
        imgArr: [


            "images/part01/48.jpg",
            "images/part01/49.jpg",
            "images/part01/50.jpg",
            "images/part01/51.jpg",
            "images/part01/52.jpg",
            "images/part01/53.jpg",
            "images/part01/54.jpg",
            "images/part01/55.jpg",
            "images/part01/56.jpg",
            "images/part01/57.jpg",
            "images/part01/58.jpg",
            "images/part01/59.jpg",
            "images/part01/60.jpg",
            "images/part02/0.jpg",
            "images/part02/1.jpg",
            "images/part02/2.jpg",
            "images/part02/3.jpg",
            "images/part02/4.jpg",
            "images/part02/5.jpg",
            "images/part02/6.jpg",
            "images/part02/7.jpg",
            "images/part02/8.jpg",
            "images/part02/9.jpg",
            "images/part02/10.jpg",
            "images/part02/11.jpg",
            "images/part02/12.jpg",
            "images/part02/13.jpg",
            "images/part02/14.jpg",
            "images/part02/15.jpg",
            "images/part02/16.jpg",
            "images/part02/17.jpg",

        ]
    });
}


