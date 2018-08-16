<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>滴露探索乐园</title>
    <meta name="viewport"
          content="width=device-width,initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="full-screen" content="true"/>
    <meta name="screen-orientation" content="portrait"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <script>
        (function flexible(window, documet) {
            var html = document.documentElement

            function setRemUnit() {
                var htmlWidth = html.clientWidth || document.body.clientWidth || document.body.getBoundingClientRect().width
                htmlWidth = htmlWidth > 750 ? 750 : htmlWidth
                html.style.fontSize = htmlWidth / 10 + 'px'
            }

            setRemUnit()
            window.addEventListener('resize', setRemUnit)
        }(window, document))
    </script>
    <link rel="stylesheet" href="{{ asset('res/dettol/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('res/dettol/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('res/dettol/css/style.css') }}">
</head>

<body>
<audio id="bgmusic" src="{{ asset('res/dettol/resource/sound/bgmusic.mp3') }}" loop="loop"></audio>
<div style="margin: auto;width: 100%;height: 100%;" class="egret-player" data-entry-class="Main"
     data-orientation="landscape"
     data-scale-mode="fixedHeight" data-frame-rate="30" data-content-width="1334" data-content-height="750"
     data-show-paint-rect="false"
     data-multi-fingered="2" data-show-fps="false" data-show-log="false"
     data-show-fps-style="x:0,y:0,size:12,textColor:0xffffff,bgAlpha:0.9">
</div>
<section class="lastPage hide">
    <img class="logo" src="{{ asset('res/dettol/resource/ui/other/logo.png') }}">
    <img class="qrCode" src="{{ asset('res/dettol/resource/ui/other/qr_code.png') }}">
    <img class="center" src="{{ asset('res/dettol/resource/ui/other/space_center.png') }}">
    <div class="title">
        <p>
            <span class="username"></span>
            <span class="textAdj">探索技能满格的</span>
        </p>
        <p class="textN">第M78号行星观测员</p>
    </div>
    <div class="desc">地球已经装不下你的好奇心了，给你一艘飞船，宇宙可能都已经被你探索了一遍!</div>
</section>
<section class="popup hide" id="popup">
    <div class="pannel">
        <div class="page1"></div>
        <div class="page2 hide">
            <button class="copy" data-clipboard-text="【Dettol滴露官方...】，復·制这段描述€3Uy4b1qHBr7€后咑閞淘♂寳♀"></button>
        </div>
        <img class="next" src="{{ asset('res/dettol/resource/ui/other/next.png') }}">
    </div>
    <img class="box" src="{{ asset('res/dettol/resource/ui/other/box.png') }}">
</section>
<section class="lastImgBox hide"></section>

<script src="https://cdn.bootcss.com/axios/0.18.0/axios.min.js"></script>
<script src="{{ asset('res/dettol/js/clipboard.min.js') }}"></script>
<script src="{{ asset('res/dettol/js/canvas2html.js') }}"></script>
<script src="{{ asset('res/dettol/js/index.js') }}"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script>


    var clipboard = new ClipboardJS('.copy')
    clipboard.on('success', function (e) {
        alert('复制成功')
        e.clearSelection();
    })

    document.querySelector('.popup .next').addEventListener('touchend', function () {
        document.querySelector('.popup .page1').style.display = "none"
        document.querySelector('.popup .page2').style.display = "block"
    })

    document.querySelector('.popup').addEventListener('touchend', function (e) {
        if (e.target.id === 'popup') {
            document.querySelector('.popup').style.display = "none"
        }
    })

    //设置超越人数
    function diaoTs(num) {
        window.imTS.tsFun(num);
    }

    //分数 道具 细菌 距离 超越人数
    var detailClick = function (score, dilu, xiju, distance, beatNum) {
        document.querySelector('.popup').style.display = "block"
        document.querySelector('.pannel').setAttribute('class', 'pannel ani')
    }

    var shootClick = function (score, dilu, xiju, distance, beatNum) {
        var username = prompt('请输入您的名字');
        document.querySelector('.username').innerHTML = username

        var index = createCodeIndex(score)
        text.adj = adjArr[createAdjIndex()]
        text.n = nArr[index]
        text.desc = descArr[index]

        createUl(index)
        document.querySelector('.lastPage .textAdj').innerHTML = text.adj
        document.querySelector('.lastPage .textN').innerHTML = text.n
        document.querySelector('.lastPage .desc').innerHTML = text.desc
        document.querySelector('.lastPage').style.display = 'block'

        html2canvas(document.querySelector(".lastPage")).then(canvas => {
            document.body.appendChild(canvas)
            var img = new Image()
            img.src = canvas.toDataURL('image/png')
            img.onload = function () {
                document.querySelector('.lastImgBox').appendChild(img)
                document.querySelector('.lastPage').style.display = 'none'
                document.querySelector('.egret-player').style.display = 'none'
                document.querySelector('.lastImgBox').style.display = 'block'
            }
        })
    }

    var againClick = function (score, dilu, xiju, distance, beatNum) {
        window.location.reload();
    }

    var getChaoYueNum = function (score, dilu, xiju, distance) {
        axios({
            method: 'post',
            url: 'https://api.shanghaichujie.com/api/dettol/rank',
            data: {
                openid: "xxxg",
                score: score
            }
        }).then(function (res) {
            diaoTs(res.data)
        });
    }

    function playSound() {
        var sound = document.getElementById("bgmusic");
        sound.volume = 0.5;
        sound.play();
    }

    function stopSound() {
        var sound = document.getElementById("bgmusic");
        sound.pause();
    }

    var music_mp3 = document.getElementById('bgmusic');
    //监听旧版的微信api接口
    document.addEventListener("WeixinJSBridgeReady", function () {
        WeixinJSBridge.invoke('getNetworkType', {}, function (e) {
            network = e.err_msg.split(":")[1]; //结果在这里
            //这里写调用音频播放 如：music_mp3.play()
            music_mp3.play();
        });
    }, false);
</script>

<script>
    var loadScript = function (list, callback) {
        var loaded = 0;
        var loadNext = function () {
            loadSingleScript(list[loaded], function () {
                loaded++;
                if (loaded >= list.length) {
                    callback();
                }
                else {
                    loadNext();
                }
            })
        };
        loadNext();
    };

    var loadSingleScript = function (src, callback) {
        var s = document.createElement('script');
        s.async = false;
        s.src = src;
        s.addEventListener('load', function () {
            s.parentNode.removeChild(s);
            s.removeEventListener('load', arguments.callee, false);
            callback();
        }, false);
        document.body.appendChild(s);
    };

    var xhr = new XMLHttpRequest();
    xhr.open('GET', './manifest.json?v=' + Math.random(), true);
    xhr.addEventListener("load", function () {
        var manifest = JSON.parse(xhr.response);
        var list = manifest.initial.concat(manifest.game);
        loadScript(list, function () {
            /**
             * {
         * "renderMode":, //Engine rendering mode, "canvas" or "webgl"
         * "audioType": 0 //Use the audio type, 0: default, 2: web audio, 3: audio
         * "antialias": //Whether the anti-aliasing is enabled in WebGL mode, true: on, false: off, defaults to false
         * "calculateCanvasScaleFactor": //a function return canvas scale factor
         * }
             **/
            egret.runEgret({
                renderMode: "canvas", audioType: 0, calculateCanvasScaleFactor: function (context) {
                    var backingStore = context.backingStorePixelRatio ||
                        context.webkitBackingStorePixelRatio ||
                        context.mozBackingStorePixelRatio ||
                        context.msBackingStorePixelRatio ||
                        context.oBackingStorePixelRatio ||
                        context.backingStorePixelRatio || 1;
                    return (window.devicePixelRatio || 1) / backingStore;
                }
            });
        });
    });
    xhr.send(null);
</script>
</body>

</html>
