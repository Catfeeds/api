<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>欧莱雅</title>
    <script src="js/amfe-flexible.js"></script>
    <link rel="stylesheet" href="css/style.min.css">
    <script>
        var openid = '{{ $wechat['id'] }}'
    </script>
</head>

<body>
<audio src="https://h5-touch.oss-cn-shanghai.aliyuncs.com/loreal/music.mp3" loop autoplay id="music"></audio>
<!-- register -->
<section class="register hide">
    <div class="title">
        <img src="imgs/title.png">
    </div>
    <div class="container">
        <div class="content">
            <img class="register_title" src="imgs/register_title.png">
            <input id="username" class="username" type="text">
            <input id="mobile" class="mobile" type="text">
            <img class="btn_submit" src="imgs/btn_submit.png">
            <img class="register_foot" src="imgs/register_foot.png">
        </div>
    </div>
    <div class="logo">
        <img src="imgs/logo.png">
    </div>
</section>

<!-- home -->
<section class="home hide">
    <div class="title">
        <img src="imgs/title.png">
    </div>
    <div class="container">
        <div id="box1" class="box"><img id="project1" class="project" src="imgs/project3.png"></div>
        <div id="box2" class="box"><img id="project2" class="project" src="imgs/project2.png"></div>
        <div id="box3" class="box"><img id="project3" class="project" src="imgs/project1.png"></div>
        <div id="box4" class="box"><img id="project4" class="project" src="imgs/project4.png"></div>
        <p class="text">
            前往10楼约吧<br/>
            参与解密新规购不同游戏
        </p>
    </div>
    <div class="logo">
        <img src="imgs/logo.png">
    </div>
</section>

<!-- unity -->
<section class="unity hide">
    <div class="title">
        <img src="imgs/title.png">
    </div>
    <div class="container">
        <div class="content">
            <img class="game_qrcode" src="">
            <img class="game_food" src="imgs/game_food.png">
            <img class="btn_home" src="imgs/btn_home.png">
        </div>
    </div>
    <div class="logo">
        <img src="imgs/logo.png">
    </div>
</section>

<!-- h5 -->
<section class="h5 hide">
    <div class="title">
        <img src="imgs/title.png">
    </div>
    <div class="container">
        <div class="content">
            <h5 class="completion">
                <img src="imgs/completion.png">
                <span class="time">00:00</span>
            </h5>
            <div class="textBox">
                <p></p>
            </div>
            <input id="answer" class="answer" type="text">
            <input id="clue" class="clue" type="text">
            <img class="btn_submit" src="imgs/btn_submit.png">
        </div>
    </div>
    <div class="logo">
        <img src="imgs/logo.png">
    </div>
    <div class="popup" style="display: none">
        <div class="pannel">
            <img class="error" src="imgs/error.png">
            <img class="publishAnswer" src="imgs/publishAnswer.png">
            <div class="answerText">第三方间接</div>
            <img class="publishClue" src="imgs/publishClue.png">
            <div class="clueText">手电筒</div>
        </div>
    </div>
    <div class="popup_time">
        <div class="pannel">
            <img class="time_start" src="imgs/time_start.png">
            <div class="time">00:00</div>
            <img class="btn_home" src="imgs/btn_home.png">
        </div>
    </div>
</section>

<!-- success -->
<section class="success hide">
    <div class="title">
        <img src="imgs/title.png">
    </div>
    <div class="container">
        <div class="content">
            <img class="text" src="imgs/success_text.png">
            <img class="gameType" src="">
            <img class="btn_continue" src="imgs/btn_continue.png">
        </div>
    </div>
    <div class="logo">
        <img src="imgs/logo.png">
    </div>
</section>

<!-- complete -->
<section class="complete hide">
    <div class="title">
        <img src="imgs/title.png">
    </div>
    <div class="container">
        <div class="content">
            <img class="complete_title" src="imgs/complete_title.png">
            <img class="complete_qrcode" src="">
            <img class="complete_food" src="imgs/complete_food.png">
            <img class="btn_rank" src="imgs/btn_rank.png">
        </div>
    </div>
    <div class="logo">
        <img src="imgs/logo.png">
    </div>
</section>

<!-- rank -->
<section class="rank hide">
    <div class="title">
        <img src="imgs/title.png">
    </div>
    <div class="container">
        <div class="content">
            <img class="rank_title" src="imgs/rank_title.png">
            <table>
                <thead>
                <tr>
                    <td><img class="rank_no" src="imgs/rank_no.png"></td>
                    <td><img class="rank_name" src="imgs/rank_name.png"></td>
                    <td><img class="rank_score" src="imgs/rank_score.png"></td>
                    <td><img class="rank_time" src="imgs/rank_time.png"></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>第一名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第二名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第三名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第四名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第五名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第六名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第七名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第八名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第九名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                <tr>
                    <td>第十名</td>
                    <td class="rank_name"></td>
                    <td class="rank_score"></td>
                    <td class="rank_time"></td>
                </tr>
                </tbody>
            </table>
            <img class="btn_home" src="imgs/btn_home.png">
        </div>
    </div>
    <div class="logo">
        <img src="imgs/logo.png">
    </div>
</section>

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="js/clariticationData.js"></script>
<script src="js/formalizationData.js"></script>
<script src="js/index.js"></script>
<script>
    document.addEventListener("WeixinJSBridgeReady", function () {
        $('#music')[0].play();
    }, false);
    document.addEventListener('touchstart', firstTouch);

    function firstTouch() {
        $('#music')[0].play();
        document.removeEventListener('touchstart', firstTouch);
    }

    var app = new App()
</script>
</body>

</html>