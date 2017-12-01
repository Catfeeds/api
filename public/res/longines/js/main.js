$(function(){
    var tree, tree_arr = [];
    var horse, horse_arr = [];
    var audio_state = 'on';
    init_img();
    init_anim();
    init_audio();
    init_loading();

    document.addEventListener('touchmove', function(e){e.preventDefault()}, false);
    // page1
    var movestate = true;
    var progressstate = true;
    $('.page1').on('touchmove',function(){
        if(movestate && progressstate){
            tree.play();
            $('.tips').hide();
            $('.progress_box').show();
        }
        movestate = false;
    })
    $('.page1').on('touchend',function(){
        tree.pause();
        movestate = true;
    })
    $('.page1 button').on('touchend', function(){
        $('.page2').fadeIn().siblings('section').hide();
        $('.switch').hide();
    })

    // page2
    $('.page2 .select').on('touchend',function(){
        switch($(this).attr('id')){
            case 'select1':
                $('.scene1').fadeIn().siblings('section').hide();
                break;
            case 'select2':
                $('.scene2').fadeIn().siblings('section').hide();
                break;
            case 'select3':
                $('.scene3').fadeIn().siblings('section').hide();
                break;
            case 'select4':
                $('.scene4').fadeIn().siblings('section').hide();
                break;
        }

        if(audio_state == 'on'){
            $('.switch').attr('src', 'images/on_white.png');
        }else if(audio_state == 'off'){
            $('.switch').attr('src', 'images/off_white.png');
        }
        $('.switch').show();

    })

    // send friend
    $('button').on('touchend',function(){
        switch($(this).attr('id')){
            case 'scene1':
                $('.show_scene .text').html($('.scene1 input').val());
                $('.show_scene .username').html($('.scene1 input').val());
                $('.show_scene').css({
                    "background": 'url(images/scene1.png)'
                }).fadeIn().siblings('section').hide();
                break;
            case 'scene2':
                $('.show_scene .text').html($('.scene2 input').val());
                $('.show_scene .username').html($('.scene2 input').val());
                $('.show_scene').css({
                    "background": 'url(images/scene2.png)'
                }).fadeIn().siblings('section').hide();
                break;
            case 'scene3':
                $('.show_scene .text').html($('.scene3 input').val());
                $('.show_scene .username').html($('.scene3 input').val());
                $('.show_scene').css({
                    "background": 'url(images/scene3.png)'
                }).fadeIn().siblings('section').hide();
                break;
            case 'scene4':
                $('.show_scene .text').html($('.scene4 input').val());
                $('.show_scene .username').html($('.scene4 input').val());
                $('.show_scene').css({
                    "background": 'url(images/scene4.png)'
                }).fadeIn().siblings('section').hide();
                break;
        }
        var youzikuClient = new YouzikuClient();
        var data = {
            Tags: [{
                AccessKey:'ceccf5bd7d0246da8adabd8e0cefd5ea',
                Content: $('.show_scene .text').html(),
                Tag: '.show_scene .text'
            },{
                AccessKey:'ceccf5bd7d0246da8adabd8e0cefd5ea',
                Content: $('.show_scene .username').html(),
                Tag: '.show_scene .username'
            }]
        }
        var entity={
            AccessKey:'ceccf5bd7d0246da8adabd8e0cefd5ea',
            Content: $('.show_scene .text').html(),
            Tag: '.show_scene .text'
        };

        youzikuClient.getBatchFontFace(data, function (json) {
            if(json.Code == 200){
                $('head').append('<style>' + json.FontfaceList[0].FontFace + '</style>');
                for(var i = 0; i < json.FontfaceList.length; i++){
                    var item = json.FontfaceList[i];
                    $('head').append('<style>' + item.FontFace + '</style>');
                    $(item.Tag).addClass('animated zoomIn').show();
                }
            }
        });

    })

    function init_img(){
        //tree
        for(var i = 1; i < 56; i++){
            tree_arr.push('../res/longines/images/step/' + i + '.png');
        }

        //horse
        for(var i = 1; i < 5; i++){
            horse_arr.push('../res/longines/images/horse/horse' + i + '.png');
        }
    }

    function init_loading(){
        var loader = new PxLoader();
        var URL = window.location.href;
        var BASE_PATH = URL.substring(0, URL.lastIndexOf('/') + 1);
        var realLoadingNum = 0;
        var fakeLoadingNum = 0;
        var myLoadingInterval = null;
        var tempArr = [];
        //加入数组
        var fileList= [
            'images/page1_tree.png',
            'images/scene1.png',
            'images/scene2.png',
            'images/scene3.png',
            'images/scene4.png',
            'images/select1.png',
            'images/select2.png',
            'images/select3.png',
            'images/select4.png',
            'images/share.png',
        ];

        fileList = tempArr.concat(tree_arr, horse_arr);

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
                $('.loading .num')[0].innerHTML = fakeLoadingNum + "%";
            }else{
                $('.loading .num')[0].innerHTML = realLoadingNum + "%";
            }
            if(fakeLoadingNum >= 100 && realLoadingNum >= 100){
                $('.loading').hide();
                $('.page1').show();
                $('.ling').show();
                clearInterval(myLoadingInterval);
            }
        },30);
        loader.start();
    }

    function init_anim(){
        //tree
        tree = new SequenceFrame({
            id: $('#tree')[0],
            firstImg: true,
            width: 613,
            height: 677,
            speed: 40,
            loop: false,
            imgArr: tree_arr,
            autoplay: false,
            callback: function(){
                $('.page1 .popup').fadeIn();
                $('.page1 .progress_box').hide();
                progressstate = false;
                //触发圣诞树点亮事件
                socketIo();
            },
            img_num: function(num , allnum){
                var percent = num / allnum * 100 + '%';
                $('.progress_box span').width(percent);
                $('.progress_box #horse').css({
                    left: percent
                });
            },
        })

        //horse
        horse = new SequenceFrame({
            id: $('#horse')[0],
            firstImg: true,
            width: 100,
            height: 100,
            speed: 100,
            loop: true,
            imgArr: horse_arr,
            autoplay: true,
        })
    }

    function init_audio(){
        var audio = document.getElementById('audio');
        document.addEventListener("WeixinJSBridgeReady", function () {
            audio.play();
        }, false);
        window.addEventListener('touchstart', function firstTouch(){
            audio.play();
            this.removeEventListener('touchstart', firstTouch);
        });
        $('.switch').click(function(){
            if($('.switch').attr('src') == 'images/on_black.png'){
                //关闭黑色按钮
                $('.switch').attr('src', 'images/off_black.png');
                audio_state = 'off';
                audio.pause();
            }else if($('.switch').attr('src') == 'images/off_black.png'){
                //打开黑色按钮
                $('.switch').attr('src', 'images/on_black.png');
                audio_state = 'on';
                audio.play();
            }else if($('.switch').attr('src') == 'images/on_white.png'){
                //关闭白色按钮
                $('.switch').attr('src', 'images/off_white.png');
                audio_state = 'off';
                audio.pause();
            }else if($('.switch').attr('src') == 'images/off_white.png'){
                //打开白色按钮
                $('.switch').attr('src', 'images/on_white.png');
                audio_state = 'on';
                audio.play();
            }

        })
    }
})
