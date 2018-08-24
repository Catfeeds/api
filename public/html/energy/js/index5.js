var BGM = $('#bgm')[0];
document.addEventListener("WeixinJSBridgeReady", function () {
  BGM.play();
}, false);
document.addEventListener('touchstart', firstTouch);
function firstTouch() {
  BGM.play();
  document.removeEventListener('touchstart', firstTouch);
}

$(function () {
  var page3Container = new Swiper('.page3-container', {
    direction: 'horizontal',
    on: {
      init: function () {
        swiperAnimateCache(this); //隐藏动画元素 
        swiperAnimate(this); //初始化完成开始动画
      },
      slideChangeTransitionStart: function () {
        swiperAnimateCache(this);
        swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
      }
    }
  })

  var page5Container = new Swiper('.page5-container', {
    direction: 'horizontal',
    loop: true,
    on: {
      init: function () {
        swiperAnimateCache(this); //隐藏动画元素 
        swiperAnimate(this); //初始化完成开始动画
      },
      slideChangeTransitionEnd: function () {
        swiperAnimateCache(this);
        swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
      }
    }
  })

  var mySwiper = new Swiper('.swiper-container', {
    direction: 'vertical',
    // initialSlide: 1,
    loop: true,
    on: {
      init: function () {
        swiperAnimateCache(this); //隐藏动画元素 
        swiperAnimate(this); //初始化完成开始动画
      },
      slideChangeTransitionEnd: function () {
        if (this.activeIndex !== 3 && this.activeIndex !== 4) {
          swiperAnimateCache(this);
          swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
        } 
        if (this.activeIndex === 3) {
          swiperAnimate(page3Container)
        }
        if (this.activeIndex === 4) {
          swiperAnimate(page5Container)
        }
      }
    }
  })

  var date = new Date().getDate()
  
  if (date === 5) {
    $('.sep5 .time').css('transform', 'scale(1.5)')
  } else if (date === 6) {
    $('.time').css('transform', '')
    $('.sep6 .time').css('transform', 'scale(1.5)')
  } else if (date === 7) {
    $('.time').css('transform', '')
    $('.sep7 .time').css('transform', 'scale(1.5)')
  }

  var photoid = ''
  var name = ''
  var mobile = ''
  var companyname = ''
  var email = ''
  var invitecode = ''
  var hotel = ''
  var forums = ''


  // 单选
  $('.radioBox').on('touchend', function () {
    $('.radio').attr('checked', false)
    $(this).find('.radio').attr('checked', true)
  })

  // 多选
  $('.checkbox1').on('touchend', function () {
    $('.checkbox1').find('.checkbox').attr('checked', false)
    $(this).find('.checkbox').attr('checked', true)
  })
  $('.checkbox2').on('touchend', function () {
    $('.checkbox2').find('.checkbox').attr('checked', false)
    $(this).find('.checkbox').attr('checked', true)
  })

  $('#file').on('input change', function () {
    var file = $(this)[0].files[0]
    if (typeof (file) == "undefined" || file.size <= 0) {
      console.log('选择照片')
      return;
    }
    var formFile = new FormData();
    formFile.append("file", file);
    $.ajax({
      url: "http://yes-summit.com/API/upload.ashx",
      data: formFile,
      type: "POST",
      processData: false,
      contentType: false,
      success: function (result) {
        photoid = result
        $('.photoid').text('上传成功')
      },
    })
  })

  $('.submit').on('touchend', function () {
    name = $('.username').val()
    mobile = $('.mobile').val()
    companyname = $('.companyname').val()
    email = $('.email').val()
    invitecode = $('.invitecode input').val()
    hotel = $("input[name='hotel']:checked").val()
    forums = ''
    var forumsArr = []

    $("input[name='forums'][checked]").each(function () {
      forumsArr.push(this.value)
    })
    forums = forumsArr.join()

    if (name === '' || mobile === '' || companyname === '' || email === '' || invitecode === '') {
      alert('必填项不能为空')
    } else if (photoid === '') {
      alert('请先上传照片')
    } else {
      var data = {
        name: name,
        companyname: companyname,
        mobile: mobile,
        email: email,
        photoid: photoid,
        invitecode: invitecode,
        hotel: hotel,
        forums: forums
      }
      $.ajax({
        url: "http://yes-summit.com/API/reg.ashx",
        type: "POST",
        data: data,
        success: function (result) {
          if (result.Success) {
            $('.popup').show();
            setTimeout(function(){
              $('.popup').hide();
              mySwiper.slideTo(6)
            }, 3000)
          } else {
            alert('注册失败')
          }
        },
      })
    }
  })
})