<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <title>复旦大学教师节祝福</title>
    <script src="js/rem.js"></script>
    <link href="css/app.3e685.css?3e6854323768182f1d69" rel="stylesheet">
</head>

<body>
<section class="loading">
    <p class="text">加载中</p>
    <p class="progress"><span>0</span>%</p>
</section>
<section class="info hide">
    <p class="teacher">
        <span>请输入您要送祝福的教师姓名:</span>
        <input type="text">
    </p>
    <p class="university">
        <span>请选择教师所在学校:</span>
        <select>
            <option selected="selected" disabled="disabled" style='display: none' value=''></option>
            <option value="复旦大学">复旦大学</option>
            <option value="其他大学">其他大学</option>
        </select>
    </p>
    <p class="department hide">
        <span>请输入教师所在院系或部门:</span>
        <input type="text">
    </p>
    <p class="bless">
        <span>请输入祝福语:</span>
        <textarea></textarea>
    </p>
    <p class="username">
        <span>您的姓名:</span>
        <input type="text">
    </p>
    <p class="btn">
        <button>确认</button>
    </p>
</section>
<section class="select hide">
    <h2>请选择祝福卡片样式</h2>
    <div class="content">
        <ul>
            <li>
                <div class="pic">
                    <img src="images/41f57a79d25aa5b7a7601590a93e3a9a.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/a1ce56718847f1500cc6c80a59834dca.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/7c9bdfc2e7665f4aed8282fdde1caf30.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/dc934a43c30da9c5132928f8d51f3617.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/8214697ace9505805037de87c687e275.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/244442acb24cad24affc3bc284150b84.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/3d79df2313b823b1505057c1ddb072bd.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/6c1e73bfa9893f290f0cae0c793c9418.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/1396e4cb4785fe2b45d67ebfa04c5ee2.jpg">
                </div>
            </li>
            <li>
                <div class="pic">
                    <img src="images/57bde7c9ef397300f6a0804806af3ccf.jpg">
                </div>
            </li>
        </ul>
    </div>
    <div class="btn">
        <button>确认</button>
    </div>
</section>
<section class="resultDom">
    <div class="container">
        <div class="pic_z"><img class="resultZ"
                                src="images/41f57a79d25aa5b7a7601590a93e3a9a.jpg"></div>
        <div class="pic_f">
            <h5>老师：</h5>
            <p></p>
            <span>同学</span>
            <time>2018年9月10日</time>
            <img class="resultF" src="images/6f7ae4d7e87016fd35c55bd076082da7.jpg">
        </div>
    </div>
</section>
<section class="result hide"></section>
<div class="layer hide">请填写信息</div>
<div class="popup hide">
    <p>图片生成中...</p>
</div>
<script type="text/javascript" src="js/app.3e685.js?3e6854323768182f1d69"></script>
</body>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('onMenuShareTimeline', 'onMenuShareAppMessage'), false) ?>);
    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
    wx.ready(function () {
        // 获取“分享到朋友圈”按钮点击状态及自定义分享内容接口
        wx.onMenuShareTimeline({
            title: '复旦大学教师节祝福', // 分享标题
            link: window.location.href,
            imgUrl: "logo.jpg", // 分享图标
            success: function () {
            }
        });
        // 获取“分享给朋友”按钮点击状态及自定义分享内容接口
        wx.onMenuShareAppMessage({
            title: '复旦大学教师节祝福', // 分享标题
            desc: " ", // 分享描述
            link: window.location.href,
            imgUrl: "logo.jpg", // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            success: function () {
            }
        });
    });
</script>
</html>