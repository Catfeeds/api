<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>天猫精灵</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<ul class="img-container"></ul>
<div class="large-container animated fadeIn" style="display:none">
    <img class="largeImg">
    <div class="close">X</div>
</div>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
<script src="https://cdn.bootcss.com/hammer.js/2.0.8/hammer.min.js"></script>
<script>
    var imgArr = [
        @foreach($ds as $d)
            'https://unitytouch.oss-cn-shanghai.aliyuncs.com/{{ $d }}',
        @endforeach
    ]
    var largeID = 0;
    var hammertime = new Hammer($('.large-container')[0])
    hammertime.on('swipeleft', function (ev) {
        largeID++
        if (largeID > imgArr.length - 1) {
            largeID = imgArr.length - 1
        }
        loadLargeImg(largeID, function () {
            $(".largeImg")[0].addEventListener("webkitAnimationEnd", function () {
                $(".largeImg").removeClass("animated fadeInRight");
                $(".largeImg")[0].removeEventListener("webkitAnimationEnd", arguments.callee);
            }, false)
            $(".largeImg").addClass("animated fadeInRight");
        })
    });
    hammertime.on('swiperight', function (ev) {
        largeID--
        console.log(largeID)
        if (largeID < 0) {
            largeID = 0
        }
        loadLargeImg(largeID, function () {
            $('.largeImg')[0].addEventListener('webkitAnimationEnd', function () {
                $('.largeImg').remove('animated fadeInLeft')
                $('.largeImg')[0].removeEventListener('webkitAnimationEnd', arguments.callee)
            }, false)
            $('.largeImg').addClass('animated fadeInLeft')
        })
    });
    hammertime.on('pan', function (ev) {
        $(".largeImg").removeClass("animated fadeInLeft");
        $(".largeImg").removeClass("animated fadeInRight");
    })

    var isClick = true
    $('.img-container').on('touchmove', function (e) {
        isClick = false
    })
    $('.img-container').on('touchend', function (e) {
        isClick = true
    })
    $('.img-container').delegate('li', 'touchend', function () {
        if (isClick) {
            loadLargeImg($(this).find('img').attr('data-index'))
        }
    })

    $('.large-container .close').on('touchend', function () {
        $('.large-container').hide()
    })

    function loadLargeImg(index, callback) {
        $('.large-container').css({
            width: $(window).width(),
            height: $(window).height()
        })
        $('.large-container').show()
        var img = $('.largeImg')[0]
        img.src = imgArr[index]
        largeID = index
        img.onload = function () {
            var w = this.width
            var h = this.height
            var realw = $(window).height() * w / h
            var paddingLeft = parseInt(($(window).width() - realw) / 2)
            var realh = $(window).width() * h / w
            var paddingTop = parseInt(($(window).height() - realh) / 2)
            $(this).attr('style', '')
            if (h / w < 1.8) {
                // 横图
                $(this).css({
                    width: $(window).width() + 'px',
                    paddingTop: paddingTop + 'px'
                })
            } else {
                // 竖图
                $(this).css({
                    height: $(window).height() + 'px',
                    paddingLeft: paddingLeft + 'px'
                })
            }
            callback && callback()
        }
    }


    /*
     * 缩略图排列渲染
    */
    render()

    function render() {
        var winWidth = $(window).width()
        var space = 2;
        var picWidth = Math.floor((winWidth - space * 4) / 3)

        var templete = ''
        for (var i = 0, len = imgArr.length; i < len; i++) {
            var imgSrc = imgArr[i] + '?x-oss-process=style/breviary'
            if (i === 1 || i % 3 === 1) {
                templete += '<li class="animated bounceIn" style="width: ' + picWidth + 'px; height: ' + picWidth + 'px; margin-top: ' + space + 'px; margin-left: ' + space + 'px;margin-right: ' + space + 'px"><img class="lazy" data-original="' + imgSrc + '" data-index=' + i + '></li>'
            } else {
                templete += '<li class="animated bounceIn" style="width: ' + picWidth + 'px; height: ' + picWidth + 'px; margin-top: ' + space + 'px"><img class="lazy" data-original="' + imgSrc + '" data-index=' + i + '></li>'
            }
        }
        $('.img-container').html(templete)

        $("img.lazy").lazyload({
            placeholder: "images/loading.gif",
            effect: "fadeIn"
        });
    }
</script>
</body>

</html>