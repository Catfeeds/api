var BGM = document.getElementById('bgm')
document.addEventListener("WeixinJSBridgeReady", function() {
  BGM.play();
}, false);
document.addEventListener('touchstart', firstTouch);

function firstTouch () {
  BGM.play();
  document.removeEventListener('touchstart', firstTouch);
}

var realLoadingNum = 0
var fakeLoadingNum = 0
var loader = new resLoader({
  resources: [
    './img/01.jpg',
    './img/01_text.png',
    './img/02.jpg',
    './img/02_text.png',
    './img/03.jpg',
    './img/03_text.png',
    './img/04.jpg',
  ],
  onStart: function(total) {
    console.log('加载图片数:' + total);
  },
  onProgress: function(current, total) {
    realLoadingNum = current / total * 100;
  },
  onComplete: function(total) {
    // alert('加载完毕:' + total + '个资源');
  }
});

loader.start();
var progressbar = document.querySelector('.progress span')
var myLoadingInterval = setInterval(function() {
  fakeLoadingNum++;
  if (realLoadingNum > fakeLoadingNum) {
    progressbar.style.width = fakeLoadingNum + '%'
  } else {
    progressbar.style.width = realLoadingNum + '%'
  }
  if (fakeLoadingNum >= 100 && realLoadingNum >= 100) {
    clearInterval(myLoadingInterval);
    document.querySelector('.loading').style.display = 'none'
    new Swiper('.swiper-container', {
      direction: 'vertical', // 垂直切换选项
      on: {
        init: function() {
          swiperAnimateCache(this); //隐藏动画元素 
          swiperAnimate(this); //初始化完成开始动画
        },
        slideChangeTransitionEnd: function() {
          swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
        }
      }
    })
  }
}, 30)
