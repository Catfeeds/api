window.onload = function(){
    document.getElementById('video').addEventListener("x5videoenterfullscreen", function(){
        $('video').addClass('active');
    })
    document.getElementById('video').addEventListener("x5videoexitfullscreen", function(){
        $('video').removeClass('active');
    })
    var ua = navigator.userAgent.toLowerCase();
    var ua = navigator.userAgent.toLowerCase();
    var isWeixin = ua.indexOf('micromessenger') != -1;
    //点击下载视频
    $('.btnDownloadShare').click(function(){
        if (isWeixin){
            if (/iphone|ipad|ipod/.test(ua)) {
                // alert("iphone");
                $(this).attr('href','#');
                $('.ipopup').show();
                $('.apopup').hide();
            } else if (/android/.test(ua)) {
                    // alert("android");
                $('.text span').html('在浏览器中进行下载');
                $('.apopup').show();
                $('.ipopup').hide();
            }
        }else{
            $(this).css('href','a.mp4');
            if (/iphone|ipad|ipod/.test(ua)) {
                // alert("iphone");
                $('.apopup').hide();
                $('.ipopup').hide();

            } else if (/android/.test(ua)) {
                    // alert("android");
                $('.apopup').hide();
                $('.ipopup').hide();
            }
        }
    });
    //再浏览器中，苹果手机下载视频的按钮隐藏
    if(!isWeixin){
        $('video').css('background-color','transparent');
        $('.btnShare').show();
        $('.btnVideoShare').hide();
        if (/iphone|ipad|ipod/.test(ua)) {
            $('.btnDownloadShare').hide();  
            $('.btnVideoShare').addClass('iosBtnVideoShare');  
            $('.btnShare').addClass('iosBtnShare') ;        
        }
    }
    //分享到微博
    $('.btnVideoShare').click(function(){
        if(isWeixin){
            $('.text span').html('分享到新浪微博');
            $('.apopup').show();
        }
    })
    //安卓手机得弹窗关闭
    $('.apopup').click(function(){
        $(this).hide();
    })
    //苹果手机得弹窗关闭
    $('.close').click(function(){
        $('.ipopup').hide();
        $('.rta').hide();
    })
    //视频播放后，改变背景色
    $('video')[0].addEventListener('play',function(){
        $('video').css('background-color','transparent')
    })
}
