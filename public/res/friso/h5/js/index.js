$(function () {
    init();

    function init() {

        // 表单提交
        $('.btn_submit').click(function () {
            // var data = $('.date select').val();
            var locate = $('.activity select').val();
            window.locate = locate;
            if ($('.activity select')[0].selectedIndex == 0) {
                alert('请选择活动场次')
            } else {
                $('.draw').show().siblings().hide();
                rand(locate);
            }

        })

        //根据选择场次计算中奖
        function rand(select) {
            window.locs.forEach(function (loc) {
                if (loc.location === select) {
                    let sum = loc.type1 + loc.type2 + loc.type3 + loc.type4 + loc.type5;
                    var item = 0;
                    let rand = Math.floor(Math.random() * (0 - sum + 1) + sum);
                    console.log(rand);
                    if (rand>0 && rand < loc.type1) {
                        item = 1;
                    } else if (rand < loc.type1 + loc.type2) {
                        item = 2;
                    } else if (rand < loc.type1 + loc.type2 + loc.type3) {
                        item = 3;
                    } else if (rand < loc.type1 + loc.type2 + loc.type3 + loc.type4) {
                        item = 4;
                    } else if (rand < sum) {
                        item = 5;
                    }
                    window.item = item;
                    console.log(window.item);
                    if (item === 0) {
                        alert('该场次礼品库存不足')
                    } else {
                        draw()
                    }
                }
            })
        }

        // draw();
    }

    //抽奖流程函数
    function draw() {
        var bRotate = false;
        //全局的0,1,2,3,4,5,6
        var globalAwards = null;
        // 全局的奖品名字
        var globalTxt = null;
        //点击中间按钮开始抽奖
        $('.btn_draw').click(function () {
            qrcode(item, locate);
            if (bRotate) return;
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
        // function rnd(n, m){
        //     var index =  Math.floor(Math.random()*(m-n+1)+n);
        //     return index;
        // }
        // var ante = [0,1,2];
        // var pm = [1,3,4];
        //抽奖函数
        function rotateFn(awards, angles, txt) {
            bRotate = !bRotate;
            $('#rotate').stopRotate();
            $('#rotate').rotate({
                angle: 0,
                animateTo: angles + 1800,
                duration: 8000,
                easing: $.easing.easeInOutExpo,
                //抽奖完成的回调
                callback: function () {
                    $('.rotate').removeClass('rta')
                    globalAwards = awards;
                    globalTxt = txt;
                    bRotate = !bRotate;
                    $('.popup .bg_popup').attr('src', '../../res/friso/h5/img/draw_' + globalAwards + '.png')
                    $('.popup').show();
                }
            })
        }
    }
})

