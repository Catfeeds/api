$(function(){
//  $('.btn').click(function(){
//      if($('.ipt').val() != ''){
//          $('.page1').fadeOut();
//          $('.page2').fadeIn()
//      }else{
//          $('.mask').fadeIn();
//      }
//  });
    $('.ipt').click(function(){
        $('#myCanvas').show().animate({'top':'646px'},1000);
    });
    $('.close').click(function(){
        $('.mask').fadeOut();
        $('#myCanvas').show();
    });
});