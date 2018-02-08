$(function(){
    // 组织页面滑动
    // document.addEventListener('touchmove',function(e){
    //     e.preventDefault();
    // })

    //设别识别 安卓手机输入
    var u = navigator.userAgent;
    if (u.indexOf('Android') > -1 || u.indexOf('Linux') > -1) {
        $('input[type="text"],textarea').on('click', function () {
            var target = this;
            setTimeout(function(){
                target.scrollIntoViewIfNeeded();
                console.log('scrollIntoViewIfNeeded');
            },400);
        });
    } else if (u.indexOf('iPhone') > -1) {
        //苹果手机
    } 

    var BGM = $('audio')[0];
    document.addEventListener("WeixinJSBridgeReady", function () {
        BGM.play();
    }, false);
    document.addEventListener('touchstart', firstTouch);
    function firstTouch(){
        BGM.play();
        document.removeEventListener('touchstart', firstTouch);
    }

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

    // clap展示完毕
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
    $('.bless_btn').on('touchstart', function(e){
        e.preventDefault();
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
        var phoneVal = $.trim($('.phone').val());
        var textareaVal = $.trim($('textarea').val());
        console.log(textareaVal)
        if(textareaVal.length >= 60){
            alert('请输入小于60字的祝福语');
            return false;    
        }else if(textareaVal == '' || textareaVal == '请在此处输入最多60字祝福语'){
            alert('祝福语不能为空');
            return false;
        }else if(!phoneReg.test(phoneVal)){
            alert('请输入有效的手机号码！');  
            return false;  
        }else{
            $('.loading').show();
            return false;
        }
    })

    $('.phone').focus(function(){
        $(this).val(' ')
    })
    $('.textarea_box textarea').focus(function(){
        $('.textarea_box textarea').html(' ')
    })
    $('.textarea_box textarea').blur(function(){
        $('.hand').fadeIn();
    })

    function delayNext(page){
        // setTimeout(function(){
            $(page).fadeIn(1000).siblings('section').fadeOut(500);
        // },1000)
    }
})


