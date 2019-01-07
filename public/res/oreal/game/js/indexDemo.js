$(function(){
  // register
  $('.register input').on('input', function () {
    if ($(this).val()) {
      $(this).attr('class', '')
    } else {
      $(this).addClass($(this).attr('id'))
    }
  })
  $('.register input').on('blur', function () {
    $('body').scrollTop(0)
  })

  // home
  checkGameStatusOne()
  $('.home .project').on('touchend', function(){
    var qr_code = ''
    if (!$(this).hasClass('complete')) {
      // clarification
      if ($(this).attr('id') === 'project2') {
        router('clarification')
      }
      // project3 project4
      if ($(this).attr('id') === 'project1' || $(this).attr('id') === 'project3') {
        qr_code = 'https://api.shanghaichujie.com/api/qrcode/generate?text=' + encodeURIComponent('openid='+ openid)
        $('.game_qrcode').attr('src', qr_code)
        router('game')
        $(this).attr('id') === 'project1' && checkGameStatusLoop(1)
        $(this).attr('id') === 'project3' && checkGameStatusLoop(3)
      }
    }
  })

  // clarification
  // console.log(clarificationData)
  var clarificationArray = clarificationData
  var index = randomQuestion(clarificationArray)
  console.log(clarificationData[index])
  function randomQuestion (clarificationArray) {
    var len = clarificationArray.length
    var index = Math.floor(Math.random() * (len + 1))
    var data = clarificationArray[index]
    $('.clarification p').text(data.question)
    clarificationArray.splice(index, 1)
    return index
    // console.log(index)
    // console.log(data)
    // console.log(clarificationData)
    // clarificationData.
    // data['isUse'] = true
    // console.log(index)
    // console.log(clarificationData)
  }

  function checkGameStatusOne () {
    $.ajax({
      type: 'POST',
      url: 'https://api.shanghaichujie.com/api/oreal/game/check',
      data: { openid: openid },
      success: function(res){
        res.data.game1 && $('#project4').addClass('complete')
        res.data.game2 && $('#project2').addClass('complete')
        res.data.game3 && $('#project3').addClass('complete')
        res.data.game4 && $('#project1').addClass('complete')
       
      }
    })
  }

  function checkGameStatusLoop (num) {
    var timer = setInterval(function(){
      $.ajax({
        type: 'POST',
        url: 'https://api.shanghaichujie.com/api/oreal/game/check',
        data: { openid: openid },
        success: function(res){
          var game1Status = res.data.game4
          var game3Status = res.data.game3
          if (num === 1 && game1Status === 1) {
            clearInterval(timer)
            $('#project1').addClass('complete')
            router('home')
          }
          if (num === 3 && game3Status === 1) {
            clearInterval(timer)
            $('#project3').addClass('complete')
            router('home')
          }
        }
      })
    }, 1000)
  }

  function router (path) {
    $('.' + path).show().siblings().hide()
  }
})