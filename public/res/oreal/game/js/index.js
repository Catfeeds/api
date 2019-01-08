var App = function() {
  this.openid = openid
  this.userStatus = false
  this.gameStatus = {
    compliance: false,
    claritication: false,
    simplitication: false,
    formalization: false
  }
  this.currentPage = 'claritication'
  this.currentAnswer = {
    answer: '',
    clue: '',
    haveQuestion: true
  }
  this.claritication = {
    data: clariticationData,
    score: 0,
    cost: 0
  }
  this.formalization = {
    data: formalizationData,
    score: 0,
    cost: 0
  },
  this.timer = null
  this.time = 0
  this.startTime = 0
  this.init()
}

App.prototype = {
  constructor: App,
  init: function() {
    var _this = this

    $('input').on('blur', function() {
      $('body').scrollTop(0)
    })
    $('input').on('input', function() {
      if ($(this).val()) {
        $(this).attr('class', '')
      } else {
        $(this).addClass($(this).attr('id'))
      }
    })

    this.registerPage()
    this.homePage()
    this.unityPage()
    this.completePage()
    this.rankPage()
    this.checkGameStatus(function() {
      if (_this.userStatus && _this.gameStatus.compliance && _this.gameStatus.claritication && _this.gameStatus.simplitication && _this.gameStatus.formalization) {
        _this.router('complete')
      } else if (_this.userStatus) {
        _this.router('home')
      } else {
        _this.router('register')
      }
    })
    $('.h5 .btn_home').on('touchend', function (event) {
      event.stopPropagation()
      _this.router('home')
    })
  },

  registerPage: function() {
    var _this = this

    $('.register .btn_submit').on('touchend', function() {
      var username = $('#username').val().trim()
      var mobile = $('#mobile').val().trim()

      if (username === '') {
        alert('姓名不能为空')
      } else if (!_this.validateMobile(mobile)) {
        alert('电话格式不正确')
      } else {
        $.ajax({
          url: 'https://api.shanghaichujie.com/api/oreal/game/register',
          type: 'POST',
          data: {
            openid: _this.openid,
            username: username,
            phone: mobile
          },
          success: function(res) {
            console.log(res)
            _this.router('home')
          },
          error: function(err) {
            console.log(err)
            alert('提交失败，请检查网络并重试')
          }
        })
      }
    })
  },

  homePage: function() {
    var _this = this

    // compliance
    $('#box1').on('touchend', function() {
      if (!$(this).hasClass('complete')) {
        _this.router('unity')
        _this.playingWatch('compliance')
      }
    })

    // claritication
    $('#box2').on('touchend', function() {
      if (!$(this).hasClass('complete')) {
        _this.currentPage = 'claritication'
        _this.h5Page()
        _this.router('h5')
      }
    })

    // simplitication
    $('#box3').on('touchend', function() {
      if (!$(this).hasClass('complete')) {
        _this.router('unity')
        _this.playingWatch('simplitication')
      }
    })

    // formalization
    $('#box4').on('touchend', function() {
      if (!$(this).hasClass('complete')) {
        _this.currentPage = 'formalization'
        _this.h5Page()
        _this.router('h5')
      }
    })
  },

  unityPage: function() {
    var _this = this
    var qr_code = 'https://api.shanghaichujie.com/api/qrcode/generate?text=' + encodeURIComponent(this.openid)
    $('.game_qrcode').attr('src', qr_code)
    $('.unity .btn_home').on('touchend', function() {
      _this.router('home')
    })
  },

  h5Page: function() {
    var _this = this
    var initData = _this[this.currentPage].data
    var questionData = [].concat(initData)

    this.showQuestion(questionData)
    $('.h5 .btn_submit').off('touchend', this.h5_submit.bind(this))
    $('.h5 .btn_submit').on('touchend', this.h5_submit.bind(this, questionData))

    // $('.h5 .popup').on('touchend', function() {
    //   $(this).css('display', 'none')
    //   _this.showQuestion(questionData)

    //   if (!_this.currentAnswer.haveQuestion) {
    //     _this.updateScore()
    //   }
    // })

    $('.h5 .popup_time').off('touchend', this.start_game.bind(this))
    $('.h5 .popup_time').on('touchend', this.start_game.bind(this))
  },

  successPage: function(gameType) {
    var _this = this
    $('.success .gameType').attr('src', 'imgs/project' + gameType + '.png')
    _this.router('success')

    $('.success .btn_continue').on('touchend', function() {
      _this.router('home')
    })
  },

  start_game: function () {
    $('.h5 .popup_time').css('display', 'none')
    this.timingStart()
  },

  timingStart: function() {
    var _this = this
    this.time = 0
    var millisecond = 0
    this.timer = setInterval(function() {
      millisecond += 1
      _this.time = millisecond / 10
      $('.completion .time').text(_this.formatTime(millisecond/10))
    }, 100)
  },

  timingEnd: function () {
    clearInterval(this.timer)
  },

  h5_submit: function(questionData) {
    var _this = this
    var answer = $('#answer').val().toLowerCase()
    var clue = $('#clue').val().toLowerCase()

    if (_this.currentAnswer.haveQuestion) {
      // 有题目
      if (answer.toLowerCase() === 'wob') {
        answer = 'WOB(Welcome Onboard package)'
      }
      if (_this.currentAnswer.answer.toLowerCase() === answer.toLowerCase() && _this.currentAnswer.clue.toLowerCase() === clue.toLowerCase()) {
        _this[_this.currentPage].score += 10
        if (_this[_this.currentPage].score >= 20) {
          console.log('2题都正确')
          _this.updateScore()
        } else {
          // 答对题数小于2题
          console.log('正确')
          _this.showQuestion(questionData)
        }
      } else {
        // 错误
        $('.h5 .popup .answerText').text(_this.currentAnswer.answer)
        $('.h5 .popup .clueText').text(_this.currentAnswer.clue)
        $('.h5 .popup').css('display', 'flex')
        setTimeout(function() {
          $('.h5 .popup').css('display', 'none')
          _this.showQuestion(questionData)
          if (!_this.currentAnswer.haveQuestion) {
            _this.updateScore()
          }
        }, 5000)
      }
    } else {
      // 没题目
      console.log('没题目了')
      _this.updateScore()
    }
  },

  showQuestion: function(questionData) {
    $('#clue').val('').addClass($('#clue').attr('id'))
    $('#answer').val('').addClass($('#answer').attr('id'))
    if (questionData.length <= 0) {
      this.currentAnswer.haveQuestion = false
      this.currentAnswer.answer = ''
      this.currentAnswer.clue = ''
    } else {
      this.currentAnswer.haveQuestion = true
      var question = this.randomQuestion(questionData)
      this.currentAnswer.answer = question.answer
      this.currentAnswer.clue = question.clue
    }
  },

  randomQuestion: function(questionData) {
    var max = questionData.length - 1
    var index = Math.floor(Math.random() * (max - 0 + 1) - 0)
    var data = questionData[index]
    $('.h5 p').text(data.question)
    questionData.splice(index, 1)
    return data
  },

  completePage: function() {
    var _this = this
    var qr_code = 'https://api.shanghaichujie.com/api/qrcode/generate?text=' + encodeURIComponent('openid=' + this.openid)
    $('.complete .complete_qrcode').attr('src', qr_code)
    $('.complete .btn_rank').on('touchend', function() {
      _this.updateRank()
      _this.router('rank')
    })
  },

  rankPage: function() {
    var _this = this
    this.updateRank()
    $('.rank .btn_home').on('touchend', function() {
      _this.router('complete')
    })
  },

  updateRank: function() {
    var _this = this
    $.ajax({
      type: 'GET',
      url: 'https://api.shanghaichujie.com/api/oreal/game/rank',
      success: function(res) {
        var data = res.data
        for (var i = 0; i < data.length; i++) {
          $('table tbody tr:eq(' + i + ')').find('.rank_name').text(data[i].username)
          $('table tbody tr:eq(' + i + ')').find('.rank_score').text(data[i].score)
          var time = _this.formatTime(data[i].cost)
          $('table tbody tr:eq(' + i + ')').find('.rank_time').text(time)
        }
      },
      error: function(err) {
        alert('获取数据失败，提交失败，请检查网络并重试')
      }
    })
  },

  formatTime (time) {
    var time = Math.floor(time)
    var seconds = Math.floor(time % 60)
    var minutes = Math.floor(time / 60)

    seconds = seconds < 10 ? '0' + seconds : seconds
    minutes = minutes < 10 ? '0' + minutes : minutes
    return minutes + ":" + seconds
  },

  // calcCost: function() {
  //   var startTime = this.startTime
  //   var endTime = new Date()
  //   return ((endTime - startTime) / 300).toFixed(1)
  // },

  updateScore: function() {
    var _this = this
    var cost = this.time
    var type = this.currentPage === 'claritication' ? 'game2' : 'game1'
    var gameType = this.currentPage === 'claritication' ? 2 : 4
    console.log({
      openid: _this.openid,
      score: _this[_this.currentPage].score,
      cost: cost,
      type: type
    })
    $.ajax({
      type: 'POST',
      url: 'https://api.shanghaichujie.com/api/oreal/game/upload',
      data: {
        openid: _this.openid,
        score: _this[_this.currentPage].score,
        cost: cost,
        type: type
      },
      success: function(res) {
        if (res.data) {
          _this.successPage(gameType)
          // _this.router('home')
        }
      },
      error: function(err) {
        alert('提交失败, 请检查网络并重试')
      }
    })
  },

  randomQuestion: function(questionData) {
    var max = questionData.length - 1
    var index = Math.floor(Math.random() * (max - 0 + 1) - 0)
    var data = questionData[index]
    $('.h5 p').text(data.question)
    questionData.splice(index, 1)
    return data
  },

  playingWatch: function(gameName) {
    var _this = this
    gameType = gameName === 'compliance' ? 1 : 3
    var timer = setInterval(function() {
      _this.checkGameStatus()
      if (_this.gameStatus[gameName]) {
        _this.successPage(gameType)
        clearInterval(timer)
      }
    }, 1000)
  },

  router: function(pageName) {
    this.checkGameStatus()
    $('.' + pageName).show().siblings().hide()
  },

  checkGameStatus: function(callback) {
    var _this = this
    $.ajax({
      type: 'POST',
      url: 'https://api.shanghaichujie.com/api/oreal/game/check',
      data: {
        openid: _this.openid
      },
      success: function(res) {
        if (res.status) {
          _this.gameStatus.compliance = res.data.game4
          _this.gameStatus.claritication = res.data.game2
          _this.gameStatus.simplitication = res.data.game3
          _this.gameStatus.formalization = res.data.game1
          _this.userStatus = res.status
        }
        _this.changeGameStatus()
        if (callback) {
          callback()
        }
      }
    })
  },

  changeGameStatus: function() {
    this.gameStatus.compliance && $('#box1').addClass('complete')
    this.gameStatus.claritication && $('#box2').addClass('complete')
    this.gameStatus.simplitication && $('#box3').addClass('complete')
    this.gameStatus.formalization && $('#box4').addClass('complete')
  },

  validateMobile (mobile) {
    var reg = /^1\d{10}$/
    if (reg.test(mobile)) {
      return true
    }
    return false
  }
}