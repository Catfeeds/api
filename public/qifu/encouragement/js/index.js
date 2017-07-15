$(function(){
    $('.btn').click(function(){
        if($('.ipt').val() != ''){
            $('.page1').fadeOut();
            $('.page2').fadeIn()
        }else{
            $('.mask').fadeIn();
        }
    });
    $('.close').click(function(){
        $('.mask').fadeOut();
    });
});