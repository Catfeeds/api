$(function(){
  var mySwiper = new Swiper ('.swiper-container', {
    direction: 'vertical',
    on: {
      init: function(){
        swiperAnimateCache(this); //隐藏动画元素 
        swiperAnimate(this); //初始化完成开始动画
      }, 
      slideChangeTransitionEnd: function(){ 
        swiperAnimate(this); //每个slide切换结束时也运行当前slide动画
      }
    }
  }) 

  // $('.content').addClass('ani')
  // $('.content').attr('swiper-animate-effect', 'zoomIn')


  var photoid = ''
  var name = ''
  var mobile = ''
  var companyname = ''
  var email = ''
  var invitecode = ''
  var hotel = ''
  var forums = ''


  // 单选
  $('.radioBox').on('touchend', function(){
    $('.radio').attr('checked', false)
    $(this).find('.radio').attr('checked', true)
  })

  // 多选
  $('.checkbox1').on('touchend', function(){
    $('.checkbox1').find('.checkbox').attr('checked', false)
    $(this).find('.checkbox').attr('checked', true)
  })
  $('.checkbox2').on('touchend', function(){
    $('.checkbox2').find('.checkbox').attr('checked', false)
    $(this).find('.checkbox').attr('checked', true)
  })

  // 上传照片
  $('.updatePic').on('touchend', function(){
    $('#file').click()
  })


  $('#file').on('input', function(){
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

  $('.submit').on('touchend', function(){
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
            $('.swiper-container').hide()
            $('.page9').show()
          } else {
            alert('注册失败')
          }
        },
      })
    }
  })
})