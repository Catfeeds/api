$(function(){
    var tree, tree_arr = [];
    var horse, horse_arr = [];
    
    init_img();
    init_anim();
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
        var text, username, scene;
        switch($(this).attr('id')){
            case 'scene1': 
                text = $('.scene1 .input_text').val();
                username = $('.scene1 .input_username').val();
                scene = 1;
                break;
            case 'scene2':
                text = $('.scene2 .input_text').val();
                username = $('.scene2 .input_username').val();
                scene = 2;
                break;
            case 'scene3':
                text = $('.scene3 .input_text').val();
                username = $('.scene3 .input_username').val();
                scene = 3;
                break;
            case 'scene4':
                text = $('.scene4 .input_text').val();
                username = $('.scene4 .input_username').val();
                scene = 4;
                break;
        }

        //跳转地址
        // window.location.href = 'http://www.baidu.com?text='+text+'&username='+username+'&scene='+scene;
    })

    function init_img(){
        //tree
        for(var i = 1; i < 56; i++){
            tree_arr.push('../../res/longines/images/step/' + i + '.png');
        }

        //horse
        for(var i = 1; i < 5; i++){
            horse_arr.push('../../res/longines/images/horse/horse' + i + '.png');
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
})