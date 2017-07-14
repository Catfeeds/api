$(function(){
    $('.page1').one('click',function(){
        $('.page1').fadeOut();
        $('.page2').fadeIn()
    });
});