$(function(){
	var status = 1;
    $('.btn').click(function(){
        if($('.ipt').val() != ''&& status == 2){
            $('.page1').fadeOut();
            $('.page2').fadeIn()
        }else{
            $('.mask').fadeIn();
        }
    });
    $('.close').click(function(){
        $('.mask').fadeOut();
    });
    
    $('.ipt').focus(function(){
    	status = 2;
    	$(this).val('');
    	$(this).css('color','#edbf00');
    })
});