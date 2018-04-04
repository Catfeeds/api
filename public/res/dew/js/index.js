$(function () {
    var chunyue = new Chunyue();

    //音乐控制
    document.addEventListener("WeixinJSBridgeReady", function () {
        $('.bg_music')[0].play();
    }, false);
    window.addEventListener('touchstart', function firstTouch() {
        $('.bg_music')[0].play();
        this.removeEventListener('touchstart', firstTouch);
    });

    //login
    $('.start').on('touchend', function () {
        $('.checkPoint1').show().siblings('section').hide();
    })

    /* 界面UI */
    //第一关
    $('.checkPoint1 .play').on('touchend', function () {
        $('.checkPoint1 .tips').hide();
        chunyue.countDown(7, $('.time')[0], function () {
            $('.checkPoint2').show().siblings('section').hide()
        })
    })
    //第二关
    $('.checkPoint2 .play').on('touchend', function () {
        $('.checkPoint2 .tips').hide();
        chunyue.countDown(10, $('.time')[1], function () {
            $('.checkPoint3').show().siblings('section').hide()
            //第三关场景居中
            var scrollLeft = $('.checkPoint3 .content').width() / 4;
            var scrollTop = $('.checkPoint3 .content').height() / 4;
            $('.checkPoint3 .scroll_container').scrollLeft(scrollLeft);
            $('.checkPoint3 .scroll_container').scrollTop(scrollTop);
        })
    })
    //第三关
    //点击开始
    $('.checkPoint3 .play').on('touchend', function () {
        $('.checkPoint3 .tips').hide();
        chunyue.countDown(15, $('.time')[2], function () {
            //不需要
            //$('.info').show().siblings('section:not(.checkPoint3)').hide();
            if (isRegister) {
                //注册过直接跳转分数页
                var score = chunyue.getScore();
                go_result(openid, score);
            } else {
                //未注册专家跳转注册页
                $('.info').show().siblings('section:not(.checkPoint3)').hide();
            }
        })
    })

    //输入信息确认
    $('.info .confirm button').on('touchend', function () {
        var username = $('.username_box input').val();
        var contact = $('.contact_box input').val();
        if (username === '') {
            alert('姓名不能为空')
        } else if (contact === '') {
            alert('联系方式不能为不能为空')
        } else {
            //输入无误，提交后台
            var score = chunyue.getScore();

            //不需要
            // $('.result .num').text(score);
            // if(score <= 2500){
            //     $('.result1').show().siblings('section:not(.checkPoint3)').hide();
            // }else if(score <= 3000){
            //     $('.result2').show().siblings('section:not(.checkPoint3)').hide();
            // }else if(score > 3000){
            //     $('.result3').show().siblings('section:not(.checkPoint3)').hide();
            // }
            $.ajax({
                url: 'https://api.shanghaichujie.com/api/dew/user',
                type: 'POST',
                data: {
                    username: username,
                    connect: contact,
                    openid: openid
                },
                success: function (data) {
                    go_result(openid, score);
                }
            });
        }
    })

    //结果页按钮
    $('.result .confirm .reset').on('touchend', function () {
        window.location.href = updateUrl(window.location.href);
    })

    //解决安卓在微信中无法reload的问题
    function updateUrl(url, key) {
        var key = (key || 't') + '=';  //默认是"t"
        var reg = new RegExp(key + '\\d+');  //正则：t=1472286066028
        var timestamp = +new Date();
        if (url.indexOf(key) > -1) { //有时间戳，直接更新
            return url.replace(reg, key + timestamp);
        } else {  //没有时间戳，加上时间戳
            if (url.indexOf('\?') > -1) {
                var urlArr = url.split('\?');
                if (urlArr[1]) {
                    return urlArr[0] + '?' + key + timestamp + '&' + urlArr[1];
                } else {
                    return urlArr[0] + '?' + key + timestamp;
                }
            } else {
                if (url.indexOf('#') > -1) {
                    return url.split('#')[0] + '?' + key + timestamp + location.hash;
                } else {
                    return url + '?' + key + timestamp;
                }
            }
        }
    }

    $('.result .confirm .share_btn').on('touchend', function () {
        //不需要
        //$('.ranking').show().siblings('section:not(.checkPoint3)').hide();

        $('.share').show().siblings('section:not(.checkPoint3)').hide();
        //分享成功后运行下面代码
        //get_rank()
        status = 1;
    })


    /* 游戏逻辑 */
    $('.point').on('touchend', function (e) {
        if (this.dataset.point === 'true') {
            chunyue.addScore(e)
            this.dataset.point = 'false';
        }
    })
    $('.point').on('touchstart', function (e) {
        if (this.dataset.point === 'true') {
            chunyue.addScore(e);
            var that = $(this);
            setTimeout(function () {
                that.addClass('point_light');
            }, 500)
            this.dataset.point = 'false';
            $('.click_music')[0].load();
            $('.click_music')[0].play();
        }
    })
})

//跳转分数页
function go_result(openid, score) {
    $('.result .num').text(score);
    if (score <= 2500) {
        post_score(openid, score, function () {
            $('.result1').show().siblings('section:not(.checkPoint3)').hide();
        })
    } else if (score <= 3000) {
        post_score(openid, score, function () {
            $('.result2').show().siblings('section:not(.checkPoint3)').hide();
        })
    } else if (score > 3000) {
        post_score(openid, score, function () {
            $('.result3').show().siblings('section:not(.checkPoint3)').hide();
        })
    }
}

//上传分数
function post_score(openid, score, callback) {
    $.ajax({
        url: 'https://api.shanghaichujie.com/api/dew/score',
        type: 'POST',
        async: false,
        data: {
            openid: openid,
            score: score
        },
        success: function (data) {
            callback(data);
        }
    });
}

function Chunyue() {
    this.score = 0;
}

Chunyue.prototype.addScore = function (e) {
    this._showIcon(e);
    this._addScore();
}

Chunyue.prototype.getScore = function () {
    return this.score;
}

Chunyue.prototype.countDown = function (second, el, callback) {
    var timer = null;
    var s = parseInt(second);
    s = second < 10 ? '0' + second : second;
    $(el).text(s);
    timer = setInterval(function () {
        s--;
        if (s <= 0) {
            clearInterval(timer);
            callback();
        }
        s = s < 10 ? '0' + s : s;
        $(el).text(s);
    }, 1000)
}

Chunyue.prototype._showIcon = function (e) {
    var posX = e.changedTouches[0].clientX - $('.icon').width() / 2;
    var posY = e.changedTouches[0].clientY - $('.icon').height() / 2;
    $('.icon').css({
        left: posX + 'px',
        top: posY + 'px',
    }).stop().show().animate({
        top: posY - 100 + 'px'
    }, 500, function () {
        $('.icon').hide()
    });
}

Chunyue.prototype._addScore = function () {
    this.score += 100;
    $('.score').text(this.score)
}
