/**
 * Created by yqh1 on 2018/1/10.
 */


    var swiperArr = [];
    var swiper;
    var activeIndex;




    layui.use('flow', function(){
        var flow = layui.flow;
        //按屏加载图片
        flow.lazyimg({
            elem: '#main img'
            ,scrollElem: '#main' //一般不用设置，此处只是演示需要。
        });

    })

    $('.main').find('img').each(function () {
        if($(this).attr('lay-src')){
            swiperArr.push($(this).attr('lay-src'));
        }else{
            swiperArr.push($(this).attr('src'));
        }
    });


    var myactive;
    $('.main').on('click', ".box", function (){

        myactive = $(this).index();

        activeIndex = myactive;

        $('#swiper').show().siblings().hide();

        bigImage();
        swiper.slideTo(myactive,0,false);

    });
    //
    $('.bigImage_cancel').click(function () {
        $('#home').show().siblings().hide();
    })

    $('.bigImage_download').click(function () {
        alert('长按保存图片到手机')
    })



function bigImage() {
    for(var i = 0;i <swiperArr.length;i++){
        $('.swiper-wrapper').append('<div class="swiper-slide">'+
            '<img src="'+swiperArr[i]+'">'+
            '</div>');
    };

    swiper = new Swiper('.swiper-container', {
        // Enable lazy loading
        on: {
            slideChangeTransitionEnd: function () {
                activeIndex = this.activeIndex;//切换结束时，告诉我现在是第几个slide
                console.log(activeIndex)
            },
        }

    });
}




