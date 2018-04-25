$(function(){
  /********** 音乐控制 **********/
  document.addEventListener("WeixinJSBridgeReady", function () {
    $('.bg_music')[0].play();
  }, false);
  window.addEventListener('touchstart', function firstTouch(){
    $('.bg_music')[0].play();
    this.removeEventListener('touchstart', firstTouch);
  });

  /********** 图片加载 **********/
  //序列帧图片
  var frame_arr= [];
  for(var i = 0; i < 225; i++){
    if(i < 10){
      frame_arr.push('../res/tmail/images/video/1_0000' + i + '.jpg')
    }else if(i < 100){
      frame_arr.push('../res/tmail/images/video/1_000' + i + '.jpg')
    }else if(i < 1000){
      frame_arr.push('../res/tmail/images/video/1_00' + i + '.jpg')
    }
  }
  //其他图片
  var img_arr = [
    '../res/tmail/images/bubble.png',
    '../res/tmail/images/click_light.png',
    '../res/tmail/images/hand.png',
    '../res/tmail/images/luck_btn.png',
    '../res/tmail/images/mac_bg.png',
    '../res/tmail/images/mac_logo.png',
    '../res/tmail/images/mac_start.png',
    '../res/tmail/images/mac_turntable.png',
    '../res/tmail/images/oysho_bg.png',
    '../res/tmail/images/oysho_logo.png',
    '../res/tmail/images/oysho_start.png',
    '../res/tmail/images/oysho_turntable.png',
    '../res/tmail/images/pocky_bg.png',
    '../res/tmail/images/pocky_logo.png',
    '../res/tmail/images/pocky_start.png',
    '../res/tmail/images/pocky_turntable.png',
    '../res/tmail/images/return.png',
    '../res/tmail/images/select_bg.png',
    '../res/tmail/images/share_tips.png',
  ]

  /********** loading **********/
  var frame = null;
  var loader = new PxLoader();
  var URL = window.location.href;
  var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
  var realLoadingNum = 0;
  var fakeLoadingNum = 0;
  var myLoadingInterval = null;
  var tempArr = [];
  
  var fileList= [];
  fileList = tempArr.concat(frame_arr,img_arr);

  for(var i = 0, len = fileList.length; i < len; i++){
      var pxImage = new PxLoaderImage(BASE_PATH + fileList[i]);
      pxImage.imageNumber = i + 1;
      loader.add(pxImage);
  }
  loader.addCompletionListener(function(){
      console.log("预加载图片："+fileList.length+"张");
  });
  loader.addProgressListener(function(e){
      var percent = Math.round( (e.completedCount / e.totalCount) * 100); //正序, 1-100
      realLoadingNum = percent;
  });
  var loading = document.getElementById('loading');
  var load_num = document.getElementById('load_num');
  myLoadingInterval = setInterval(function(){
      fakeLoadingNum++;
      if(realLoadingNum > fakeLoadingNum){
        $('.loading .progress span').width(fakeLoadingNum + "%");
        //$('.loading .progress').text(fakeLoadingNum + "%");
      }else{
        $('.loading .progress span').width(realLoadingNum + "%");
        //$('.loading .progress').text(realLoadingNum + "%");
      }
      if(fakeLoadingNum >= 100 && realLoadingNum >= 100){
          $('.open_animate').show().siblings('section').hide();
          frame.replay();
          clearInterval(myLoadingInterval);
      }
  },30);
  // loader.start();

  /********** 开头动画 **********/
  frame = new SequenceFrame({
      id: $('.canvas')[0],
      width: 640,
      height: 1040,
      imgArr: frame_arr,
      speed: 40,
      autoplay: false,
      callback: function(){
        $('.select').fadeIn('slow').siblings('section').fadeOut('slow')
        $('.footer').fadeIn('slow')
        $('.luck_btn').fadeIn('slow')
      },
      img_num: function(num,allNum){
        if(num === 165){
          $('.open_animate .click_area').show()
          $('.open_animate .click_tips').show()
          frame.pause()
        }
      }
  })
  $('.open_animate .click_area').on('touchend', function(){
    $('.open_animate .click_tips').hide()
    $('.open_animate .click_area').hide()
    frame.play()
  })

  /********** 幸运值弹窗和按钮 **********/
  $('.integral').on('touchend', function(){
    $('.integral').hide();
  })
  $('.luck_btn').on('touchend', function(){
    $('.integral').show();
  })

  /********** 分享弹窗 **********/
  $('.share button').on('touchend', function(){
    $('.share').hide();
  })

  /********** 使用次数用完弹窗 **********/
  $('.finish button').on('touchend', function(){
    $('.finish').hide();
  })

  /********** 未抽中奖品弹窗 **********/
  $('.nothing button').on('touchend', function(){
    $('.nothing').hide();
  })

  /********** 产品选择 **********/
  //mac
  $('.select .mac').on('touchend', function(){
    statistic('mac');
    $('.mac_lottery').show().siblings('section').hide()
  })
  //pocky
  $('.select .pocky').on('touchend', function(){
    statistic('pocky');
    $('.pocky_lottery').show().siblings('section').hide()
  })
  //oysho
  $('.select .oysho').on('touchend', function(){
    statistic('oysho');
    $('.oysho_lottery').show().siblings('section').hide()
  })
  //return
  $('.return').on('touchend', function(){
    $('.select').show().siblings('section').hide()
  })

  /********** 抽奖 **********/
  //mac
  $('.mac_start').on('touchend', function(){
    if(isRotate){
      return;
    }
    lotteryDraw('mac')
  })
  //pocky
  $('.pocky_start').on('touchend', function(){
    if(isRotate){
      return;
    }
    lotteryDraw('pocky')
  })
  //oysho
  $('.oysho_start').on('touchend', function(){
    if(isRotate){
      return;
    }
    lotteryDraw('oysho')
  })

  //初始化抽奖次数
  // var mac_num = 5;
  // var pocky_num = 5;
  // var oysho_num = 5;
  //抽奖状态
  var isRotate = false;
  
  function lotteryDraw(product) {
    //是否有使用次数
    // switch(product){
    //   case 'mac':
    //   mac_num--
    //   if(mac_num < 0){
    //     $('.finish').show();
    //     return
    //   }
    //     break;
    //   case 'pocky':
    //     pocky_num--
    //     if(pocky_num < 0){
    //       $('.finish').show();
    //       return
    //     }
    //     break;
    //   case 'oysho':
    //     oysho_num--
    //     if(oysho_num < 0){
    //       $('.finish').show();
    //       return
    //     }
    //     break;
    //   default:
    //     return
    // }

    //抽奖逻辑 
    var chance = rnd(0, 100);
    var index = 0;
    //概率控制
    if(chance < 10){
      index = 0;  //幸运值+3
    }else if(chance < 30){
      index = 2;  //幸运值+2
    }else if(chance < 40){
      index = 4;  //幸运值+1
    }else{
      index = rnd135();
    }

    var angle = 0;
    var text = '';
    var coin = 0;
    var isHit = false;  //是否抽中奖品
    switch(index){
      case 0:
        angle = 0;
        text = '幸运值+3';
        coin = 3;
        isHit = true;
        break;
      case 1:
        angle = 60;
        text = '没抽中';
        isHit = false;
        break;
      case 2:
        angle = 120;
        text = '幸运值+2';
        coin = 2;
        isHit = true;
        break;
      case 3:
        angle = 180;
        text = '没抽中';
        isHit = false;
        break;
      case 4:
        angle = 240;
        text = '幸运值+1';
        isHit = true;
        coin = 1;
        break;
      case 5:
        angle = 300;
        text = '没抽中';
        isHit = false;
        break;
    }

    isRotate = true;

    $('.' + product+'_turntable').rotate({
      angle: 0,
      animateTo: angle+1800,
      duration: 5000,
      easing: $.easing.easeInOutExpo,
      callback: function(){
        isRotate = false;

        if(isHit){
          //改变share提示框分数
          $('.coin').text(coin);
          $('.share').show();
          //改变积分界面分数(当前分数)
          var current_coin = parseInt($('.integral .' + product + '_coin').text());
          //改变积分界面分数(计算后分数current_coin + coin)
          $('.integral .' + product + '_coin').text(current_coin + parseInt(coin));

          //ajax
          //产品分数
          var mac_coin = 0;
          var pocky_coin = 0;
          var oysho_coin = 0;
          if(product === 'mac'){
            mac_coin = coin
          }else if(product === 'pocky'){
            pocky_coin = coin
          }else if(product === 'oysho'){
            oysho_coin = coin
          }
          draw(product, coin);
        }else{
          $('.nothing').show();
        }
      }
    })
  }

  function rnd(n, m){
    var index =  Math.floor(Math.random()*(m-n+1)+n);
    return index;
  }

  function rnd135(){
    var index = rnd(0, 5);
    if(index == 1 || index== 2 || index == 5){
      return index;
    }else{
      return rnd135()
    }
  }

})