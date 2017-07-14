var URL = window.location.href;
// var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
var BASE_PATH = 'http://api.touchworld-sh.com/online/';
var EVENT_TYPE=mobilecheck() ? 'tap' : 'click';
var BGM=$("#bgm")[0];
var __isAnimate=true;
var __isSoundOn=true;

/**
 * 音乐icon & 提示箭头 
 */
$(function(){
// 	var musicHtml = "<img src=\""+BASE_PATH+"img/music.png\" class=\"musicicon musicplay\"/>";
// 	$(".page").append(musicHtml);
//
	$(".musicicon").on(EVENT_TYPE, function() {
		__isSoundOn=!__isSoundOn;
		__isSoundOn?$(".musicicon").addClass("musicplay on"):$(".musicicon").removeClass("musicplay on");
		__isSoundOn?BGM.play():BGM.pause();

	});
});

/**
 * 图片预加载 
 */
$(function(){
	// prevent iphone touchmove
	$(".p1").on("touchmove",function (event) {
    	event.preventDefault();
    });
	
    var loader = new PxLoader(),
	    // 把页面的图片列在这里
        fileList = [
            'img/loading.jpg',
            'img/loadingDrip.png',
            'img/loadingText1.png',
            'img/loadingText2.png',
            'img/music.png',
        	'img/finger.png',
        	'img/goToExperience.png',
        	'img/logo.png',
        	'img/qr.png',
        	'img/appointMentBtn.png',
        	'img/demoPic.png',
        	'img/p2_t.png',
        	'img/p2Title.png',
        	'img/p3_t1.png',
        	'img/p3_t2.png',
        	'img/p3Title.png',
        	'img/p4Title.png',

        	'img/share.jpg',
        ];
     for (var i = 0; i <= 689; i++) {
        fileList.push("img/video/" + i + ".jpg");
    }
	//把图片载入加载器
    for(var i = 0; i < fileList.length; i++){
        var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);

        pxImage.imageNumber = i + 1;
        loader.add(pxImage);
    }

    //当加载完成时
    loader.addCompletionListener(function(){
        console.log("预加载图片："+fileList.length+"张");
        // loadingFinish();
    });
    //loading 进度监听
    loader.addProgressListener(function(e){
        var percent = Math.round( (e.completedCount / e.totalCount) * 100); //正序, 1-100
        realLoadingNum=percent;
    });
    var realLoadingNum=0;
    var fakeLoadingNum=0;
    var myLoadingInterval=setInterval(function(){
        fakeLoadingNum++;
        if(realLoadingNum>fakeLoadingNum){
            if(fakeLoadingNum>50){
                $(".loadingText2").removeClass("opacity0");
                $(".loadingText1").addClass("opacity0");
            }
            $(".loadingNob").html("Loading..."+fakeLoadingNum+"%");
            $(".loadingDrip2").css("height",fakeLoadingNum+"%");

        }else{
            if(realLoadingNum>50){
                $(".loadingText2").removeClass("opacity0");
                $(".loadingText1").addClass("opacity0");
            }
            $(".loadingNob").html("Loading..."+realLoadingNum+"%");
            $(".loadingDrip2").css("height",realLoadingNum+"%");
        }
        if(fakeLoadingNum>=100 && realLoadingNum==100){
            isIntervalFinish=true;
            loadingFinish();
            clearInterval(myLoadingInterval);
        }
    },30);
    //下面的参数测试时改为true by sl
    var isIntervalFinish=false;
    // var isIntervalFinish=true;
    function loadingFinish(){
        if(isIntervalFinish==false){
            return;
        }
        isIntervalFinish=true;
        //BGM.play();
        __isAnimate=false;
        pageShow();
        loadingClose=false;
        $(".loading-container").addClass("loading_amin");
        setTimeout(function () {
            $(".loading-container").hide();

        },600);
        $(".page-container").show();
    }

    //启动
    loader.start();
});

/**
 * 交互事件监听 
 */
$(function(){
	bgm_init();
    videoImgInit();
    //滑动提示点击
    $(".hintHost").on("touchstart",function(){
        $(".hintHost").addClass("opacity0");
        setTimeout(function () {
            fullScreen();
            $(".hintHost").addClass("invisible");
        },500);
    });

 	$(".mainVideo").on("touchstart",function (e) {
        videoPause=true;  //暂停
        releaseBtn=false;  //按下 重置倒退

        touchStart=e.touches[0].clientY;
        // console.log("touchstart:"+touchStart);
    });
 	$(".mainVideo").on("touchmove",function (e) {
        var curY=e.touches[0].clientY;
        move=curY-touchStart;

    });
 	$(".mainVideo").on("touchend",function (e) {
        videoPause=false;  //继续播放
        move=0;
        setTimeout(function () {
            releaseBtn=false;   //放手后 任然倒退1s
        },1000);
    });
    $(".aBtn").on(EVENT_TYPE,function () {
        ga('send','event','Orgnaic','reserve');
    });
    //立即体验
 	$(".goToExperience").on(EVENT_TYPE,function(){
        nextPage();
        ga('send','event','Orgnaic','Experience');
    });

});
/**
 * ios 手机不能自动播放声音
 */
function bgm_init(){
	document.addEventListener("WeixinJSBridgeReady", function () {
		BGM.play();
	}, false);
	window.addEventListener('touchstart', function firstTouch(){
		BGM.play();
		this.removeEventListener('touchstart', firstTouch);
	});
}

function nextPage(){
    if(__isAnimate) return;
    var pageNo=$(".cur").attr("data-page");
    if(pageNo==5) return;

    __isAnimate=true;
    $(".cur").addClass("page-cur-fadeout");
    $(".cur").next(".page").addClass("page-next-fadein");
    setTimeout(function(){
        $(".cur").removeClass("cur").next(".page").addClass("cur");
    },200);
    setTimeout(function(){
        $(".page-cur-fadeout").removeClass("page-cur-fadeout");
        $(".page-next-fadein").removeClass("page-next-fadein");
        __isAnimate=false;
        pageShow();
    },400);
}
function nextToPage(flag){

    if(__isAnimate) return;
    var pageNo=$(".cur").attr("data-page");

    __isAnimate=true;
    $(".cur").addClass("page-cur-fadeout");
    $(".p"+flag).addClass("page-next-fadein");
    setTimeout(function(){
        $(".cur").removeClass("cur");
        $(".p"+flag).addClass("cur");
    },200);
    setTimeout(function(){
        $(".page-cur-fadeout").removeClass("page-cur-fadeout");
        $(".page-next-fadein").removeClass("page-next-fadein");
        __isAnimate=false;
        pageShow();
    },400);
}

function pageShow(){
	var pageNo=$(".cur").attr("data-page");
	switch(pageNo){
		case "1":showPage1();break;
		default:showPage1();break;
	}
}

function showPage1() {

}


function mobilecheck() {
	var check = false;
	(function(a){if(/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
	return check;
}

// style
$(window).resize(function(){
	setTimeout(function () {
        resize();
    },200);
});
$(document).ready(function(){
    setTimeout(function () {
        resize();
    },200);

});

function resize(){
    var resizeSpeed = resizeTool.initial({
        portrait: "null", //portrait true 竖屏 landscape false 横屏 null 没有任何效果
        windowWidth: 320, //默认屏幕320
    });
    resizeSpeed.start();
    resizeSpeed.resizeText("loadingNob","16","16");

    resizeSpeed.resizeMarginCenter(1,"mainVideo","320","550");

    resizeSpeed.resizeMarinTop("appointMentBtn","467","420","15");

    resizeSpeed.resizeMarginCenter(1,"loadingWrap","320","109");
    resizeSpeed.resizeScale("p4Wrap","504","320","446.56");
    resizeSpeed.resizeScale("p3Wrap","504","320","446.56");

    var w=$(window).width();
	var h=$(window).height();



}












