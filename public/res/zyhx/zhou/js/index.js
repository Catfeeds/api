$(function(){
    for(var i = 0;i <20;i++){
        $('.ulCon').append('<li class="row">'+
                                '<div class="col-xs-10" style="padding-left:10%">'+
                                    '<h3>唉，总是在越忙的时候事情越多。。。我的神曲你在哪里呀~~~</h2>'+
                                '</div>'+ 
                                '<div class="col-xs-2" >'+
                                    '<div class="row" style="">'+
                                        '<h3>'+
                                            '<img src="images/heart.png" alt=""> <span>88</span>'+
                                        '</h3>'+
                                    '</div>'+
                                '</div>'+
                                    
                                '</li>')
    }
    setInterval(function(){
        liFirstHeight = $('.ulCon').find("li:first").height();
        console.log(liFirstHeight)
        $('.ulCon').animate({ top: "-"+liFirstHeight+"px" }, 1500, function () {
            $('.ulCon').find("li:first").appendTo($('.ulCon'));
            
            $('.ulCon').css({ top: 0 + "px" });
        });
    },4000);

});