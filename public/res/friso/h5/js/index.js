
    $(function(){
        init();
        function init(){

            // 表单提交
            $('.btn_submit').click(function(){
                // var data = $('.date select').val();
                let location = $('.activity select').val();
                if($('.activity select')[0].selectedIndex == 0){
                    alert('请选择活动场次')
                }else{
                    $('.draw').show().siblings().hide();
                }

            })
            //点击隐藏礼品层
            $('.popup').click(function(){
                $(this).hide()
            })
            draw();
        }
        //抽奖流程函数
        function draw(){
            var bRotate = false;
            //全局的0,1,2,3,4,5,6
            var globalAwards = null;
            // 全局的奖品名字
            var globalTxt = null;
            //点击中间按钮开始抽奖
            $('.btn_draw').click(function (){
                if(bRotate) return;
                // var item = rnd(0,4);
                switch (item) {
                    case 5:
                        rotateFn(0, 324, 'Decobebe 分装奶粉盒');
                        break;
                    case 1:
                        rotateFn(1, 252, '美素佳儿定制储蓄罐');
                        break;
                    case 4:
                        rotateFn(2, 180, '法国Globber 5合1滑板车');
                        break;
                    case 3:
                        rotateFn(3, 108, '荷兰Elittile轻巧 折叠推车');
                        break;
                    case 2:
                        rotateFn(4, 36, '韩国Bontoy行李箱');
                        break;
                }
                $('.rotate').addClass('rta')
            });
            //随机数
            function rnd(n, m){
                var index =  Math.floor(Math.random()*(m-n+1)+n);
                return index;
            }
            // var ante = [0,1,2];
            // var pm = [1,3,4];
            //抽奖函数
            function rotateFn(awards, angles, txt){
                bRotate = !bRotate;
                $('#rotate').stopRotate();
                $('#rotate').rotate({
                    angle:0,
                    animateTo:angles+1800,
                    duration:8000,
                    easing: $.easing.easeInOutExpo,
                    //抽奖完成的回调
                    callback:function (){
                        $('.rotate').removeClass('rta')
                        globalAwards = awards;
                        globalTxt = txt;
                        bRotate = !bRotate;
                        $('.popup .bg_popup').attr('src','../../res/friso/h5/img/draw_'+globalAwards+'.png')
                        $('.popup').show();
                    }
                })
            }
        }
    })

