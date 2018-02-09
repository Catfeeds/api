$(function(){
    //loading页面加载
    init_loading();

    //坐席安排滑动
    var mySwiper = new Swiper('.swiper-container',
        {
            init:false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                slideChange: function(){
                if(this.isBeginning){
                    this.navigation.$prevEl.css('display','none');
                }else{
                    this.navigation.$prevEl.css('display','block');
                }
                if(this.isEnd){
                    this.navigation.$nextEl.css('display','none');
                }else{
                    this.navigation.$nextEl.css('display','block');
                }
                },
            },
        }
    );

    var BGM = $('audio')[0];
    document.addEventListener("WeixinJSBridgeReady", function () {
        BGM.play();
    }, false);
    document.addEventListener('touchstart', firstTouch);
    function firstTouch(){
        BGM.play();
        document.removeEventListener('touchstart', firstTouch);
    }

    //签到页
    $('.phone').focus(function(){
        $(this).val(' ')
    })


    //跳转

    //会议安排
    $('.select .btn1 button').on('touchstart', function(){
        $('.plan').fadeIn().siblings().hide();
    })
    //交通安排
    $('.select .btn2 button').on('touchstart', function(){
        $('.traffic').fadeIn().siblings().hide();
    })
    //餐饮安排
    $('.select .btn3 button').on('touchstart', function(){
        $('.catering').fadeIn().siblings().hide();
    })
    //联系会务组
    $('.select .btn4 button').on('touchstart', function(){
        $('.call').fadeIn().siblings().hide();
    })
    //酒店详情
    $('.select .details button').on('touchstart', function(){
        $('.hotel').fadeIn().siblings().hide();
    })
    //议程安排
    $('.plan .btn1 button').on('touchstart', function(){
        $('.schedule').fadeIn().siblings().hide();
    })
    //坐席安排
    $('.plan .btn2 button').on('touchstart', function(){
        $('.site').fadeIn().siblings().fadeOut();
        mySwiper.init();
    })
    //返回到选择页面
    $('.plan .return_btn button').on('touchstart', function(){
        $('.select').fadeIn().siblings().hide();
    })
    //返回到选择页面
    $('.activity .return_btn button').on('touchstart', function(){
        $('.plan').fadeIn().siblings().hide();
    })
    //返回到选择页面
    $('.activity2 .return_btn ').on('touchstart', function(){
        $('.select').fadeIn().siblings().hide();
    })
    window.onscroll = function(){
        var t = document.documentElement.scrollTop || document.body.scrollTop;  //获取距离页面顶部的距离
        if(!$('.schedule').is(':hidden') || !$('.site').is(':hidden')){
            if(t <= 0 ){
                setTimeout(function(){
                    $('.plan').fadeIn().siblings().hide();
                },500)
            }
        }else if(!$('.call').is(':hidden') || !$('.traffic ').is(':hidden') || !$('.catering').is(':hidden') || !$('.hotel').is(':hidden')){
            if(t <= 0){
                setTimeout(function(){
                    $('.select').fadeIn().siblings().hide();
                },500)
            }
        }
    }

    function init_loading(){
        var loader = new PxLoader();
        var URL = '../../res/cowin/guide/';
        var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
        var realLoadingNum = 0;
        var fakeLoadingNum = 0;
        var myLoadingInterval = null;

        var fileList= [
            'images/sprite.png',
            'images/bg1.jpg',
            'images/btn_bg.png',
            'images/btn_bg2.png',
            'images/catering.jpg',
            'images/call.jpg',
            'images/falling_bg.jpg',
            'images/hotel.jpg',
            'images/logo.png',
            'images/p1.png',
            'images/pan.png',
            'images/mascot.png',
            'images/traffic.jpg',
            'images/pannel.png',
            'images/pannel2.png',
            'images/return_icon.png',
            'images/schedule.jpg',
            'images/site1.png',
            'images/site2.png',
        ];

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
            }else{
                $('.loading .progress span').width(realLoadingNum + "%");
            }
            if(fakeLoadingNum >= 100 && realLoadingNum >= 100){
                $('.falling').delay('slow').fadeIn().siblings().delay('slow').fadeOut(500);
                setTimeout(function(){
                    $('.welcome').delay('slow').fadeIn().siblings().delay('slow').fadeOut(500);
                },2000)
                clearInterval(myLoadingInterval);
            }
        },30);
        loader.start();
    }
})


