$(function(){
    // 组织页面滑动
    // document.addEventListener('touchmove',function(e){
    //     e.preventDefault();
    // })
    var BGM = $('audio')[0];
    document.addEventListener("WeixinJSBridgeReady", function () {
        BGM.play();
    }, false);
    window.addEventListener('touchstart', function firstTouch(){
        BGM.play();
        this.removeEventListener('touchstart', firstTouch);
    });

    var animationEnd = (function(el) {
        var animations = {
            animation: 'animationend',
            OAnimation: 'oAnimationEnd',
            MozAnimation: 'mozAnimationEnd',
            WebkitAnimation: 'webkitAnimationEnd',
        };
        
        for (var t in animations) {
            if (el.style[t] !== undefined) {
            return animations[t];
            }
        }
    })(document.createElement('div'));

    //clap展示完毕
    $('.clap .text3').one(animationEnd, function(){
        delayNext('.hook')
    });
    //hook展示完毕
    $('.hook .text4').one(animationEnd, function(){
        delayNext('.flight')
    });
    //flight展示完毕
    $('.flight .text3').one(animationEnd, function(){
        delayNext('.arms')
    });
    //arms展示完毕
    $('.arms .text4').one(animationEnd, function(){
        delayNext('.select')
    });

    //跳转
    $('.invite_btn').on('touchstart', function(){
        $('.invite').fadeIn().siblings('section').fadeOut();
    })
    $('.return').on('click', function(){
        $('.select').fadeIn().siblings('section').fadeOut();
    })
    $('.bless_btn').on('touchstart', function(){
        $('.bless').fadeIn().siblings('section').fadeOut();
    })

    $('.confirm').on('touchstart', function(){
        $('.popup').show();
    })

    $('.reset').on('touchstart', function(){
        $('textarea').val(' ');
        $('.phone').val('请输入手机号');
        $('.popup').hide();
    })

    $('.submit').on('touchstart', function(){
        var phoneReg = /[0-9]{11}/;
        var val = $.trim($('.phone').val())
        console.log(phoneReg.test(val))
        if (!phoneReg.test(val)) {  
            alert('请输入有效的手机号码！');  
            return false;  
        }
    })

    $('.phone').focus(function(){
        $(this).val(' ')
    })

    function delayNext(page){
        setTimeout(function(){
            $(page).fadeIn().siblings('section').fadeOut();
        },1000)
    }
})


