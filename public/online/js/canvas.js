/**
 * Created by Programmer on 2017/6/23.
 */

var CANVAS_VIDEO=$(".mainVideo")[0];
var CTX_VIDEO=CANVAS_VIDEO.getContext("2d");

function videoImgInit() {
    var first=0;
    var last=345;
    var html="";
    for(var i=first;i<=last;i++){
        html+="	<img src="+BASE_PATH+"img/video/"+i+".jpg id='mainVideo"+i+"'/>";
    }
    $(".imgTemp").append(html);

    $("#mainVideo"+first)[0].onload=function(){
        CTX_VIDEO.drawImage($("#mainVideo"+first)[0], 0, 0, 640, 1050);
    };
}

var videoPause=false; // 序列帧暂停
var touchStart;
var move=0;
var videoGap=1; //正常每5针 放一针 加快时 为正常
var j=0; //计算最后速度加快时 每隔多少针跑一次
var releaseBtn=false; //放手后 任然倒退1s 开关
// function fullScreen() {
//     var i=0;
//     var videoFrame=10;    //加速情况下的帧速
//     var videoInterval;
//     videoInterval=setInterval(function () {
//         if(videoPause){                 //移动加速
//             CTX_VIDEO.clearRect(0, 0, 640, 1100);
//             CTX_VIDEO.drawImage($("#mainVideo"+i)[0], 0, 0, 640, 1100);
//             if(move>0 ){            //下滑 i--
//                 i=i-3;
//                 if(i<=0) i=0 ;
//             }else if(move<0 ){             //上滑 i++
//                 i=i+3;
//                 if(i>=690){
//                     videoEnd();
//                 };
//             }else {                  //按住不移动 停止
//                 i=i;
//             }
//         }else {               //正常播放
//             CTX_VIDEO.clearRect(0, 0, 640, 1100);
//             CTX_VIDEO.drawImage($("#mainVideo"+i)[0], 0, 0, 640, 1100);
//             j++;
//             if(j%videoGap==0){
//                 i++;
//             }
//             if(i>=690){  //409+1
//                 videoEnd();
//                 // i=0     //启示为0;
//             }
//         }
//     },videoFrame);
//     function videoEnd() {
//         clearInterval(videoInterval);
//         $(".videoLogo").addClass("opacity0");
//         $(".logoVideo").removeClass("opacity0");
//         $(".goToExperience").removeClass("opacity0 invisible");
//         $(".fingerHint").addClass("invisible");
//         $(".finger").addClass("invisible");
//     }
//
// }

function fullScreen() {
    var i=0;
    var videoFrame=10;    //加速情况下的帧速
    var videoInterval;
    videoInterval=setInterval(function () {
        if(videoPause){                 //移动加速
            CTX_VIDEO.clearRect(0, 0, 640, 1100);
            CTX_VIDEO.drawImage($("#mainVideo"+i)[0], 0, 0, 640, 1100);
            if(move>0 ){            //下滑 i--
                i=i-2;
                if(i<=0)i=0;
                releaseBtn=true; // 开始倒退
            }else if(move<0 ){             //上滑 i++
                i=i+2;
                if(i>=690){
                    videoEnd();
                };
            }else {                  //按住不移动 停止
                i=i;
            }
        }else {               //正常播放
            CTX_VIDEO.clearRect(0, 0, 640, 1100);
            CTX_VIDEO.drawImage($("#mainVideo"+i)[0], 0, 0, 640, 1100);
            j++;
            if(releaseBtn){
                if(j%200==0){
                    videoGap++;
                    if(videoGap>=6)videoGap=6;
                }
                if(j%5==0){
                    i=i-2;
                    if(i<=0) {
                        i=0 ;
                        releaseBtn=false; // 倒退 到第一针正向
                    }
                }
                console.log(videoGap)
            }else {
                videoGap=6;
                if(j%videoGap==0){
                    i++;
                }
            }
            if(i>=345){  //409+1
                videoEnd();
                // i=0     //启示为0;
            }
        }
    },videoFrame);
    function videoEnd() {
        clearInterval(videoInterval);
        $(".goToExperience").removeClass("opacity0 invisible");

    }

}

















