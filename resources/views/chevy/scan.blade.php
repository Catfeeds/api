<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>扫码程序</title>
    <link rel="stylesheet" href="css/normalize.css">
    <style>
        html,
        body {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .hide {
            display: none;
        }

        button {
            position: absolute;
            left: 50%;
            top: 50%;
            padding: 20px 50px;
            transform: translate3d(-50%, -50%, 0);
        }

        p {
            position: absolute;
            left: 50%;
            top: 30%;
            padding: 20px 50px;
            width: 100%;
            transform: translate3d(-50%, -50%, 0);
            text-align: center;
            font-size: 50px;
        }
    </style>
</head>

<body>
<section class="page1 hide">
    <button id="checkJsApi">扫码</button>
</section>
<section class="page2">
    <p>是会员</p>
    <button>返回</button>
</section>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    wx.config(<?php echo $js->config(array('scanQRCode'), true) ?>);
    var vipArr = [
        'a139480a-1f44-4081-92e7-11d223cf0cc3',
        '9abb4e9c-40a4-482e-9f78-0b272dbe14cb',
        '8183eac5-22fe-48ed-80b2-5d3d3300f633',
        '70091774-3c3d-4654-89b1-b1a28caea788',
        '03fd50ca-bfca-4fe8-8a7a-a0c1f8a2142a',
        '28c592e3-c371-43ef-9c13-b374c3b9394a',
        '924bfd45-3dd6-4780-af4f-025045821868',
        '52a563a8-f1ef-43ef-901a-92a97d95dbb3',
        'c36d42c8-b707-49cd-bd3e-b63dbba0d18e',
        'acddbc5d-56ca-42bb-8524-50b9e81aafe3',
        'bc2d21f8-b768-4357-a65f-a763bdb875a2',
        'e6aa2a55-ff3e-412d-8d12-e9e0f6a7200d',
        '17cc98f4-214e-4a6c-846d-af56d6dacf26',
        '137ddc03-8ffe-47da-93bf-1a3d6edba038',
        '628657c7-6261-4914-9406-a707497c2c22',
        '19833840-bcbe-4c9f-94c5-3aab8a984e70',
        '6fd26f4c-a7c3-4544-ba90-e04c0c14f916',
        '2dfe7733-92c7-445c-a3c4-943a084091a3',
        '847aa26d-5e3c-4e7d-b1d2-ffd946719e4d',
        'ef4033ec-f213-4b12-9161-87c47989e560',
        '8006691d-e634-4174-a171-016dc0b4c331',
        '178140bc-4128-44ba-8a9e-e3fa2c0553d3',
        'eaef1d6f-5939-486b-be05-39c73f9b4b67',
        'b7c25426-1cf0-480f-b389-8bcd8cfdb81e',
        '7d9caf22-3362-43b7-9247-49db3d630163',
        'd090ea00-9a43-4c11-914a-7ba69c60dfa0',
        '52ca2200-8e8a-4128-963b-a6ecc3b5c39a',
        'a2f8fae8-92e8-493c-9c50-3e74d5d5522b',
        '3e9bf231-93d5-494c-acea-3408a365b1de',
        '98c2a2b5-7e85-4093-922a-53d9e6061a7e',
        '6193fc5a-4eca-4f33-a4e5-92957d8482ee',
        'e879924f-a10b-47c0-8ff4-8541acd84d3c',
        'c549536b-7117-440d-9cfc-6197fb8716df',
        '8adb3b21-78a9-47b7-9466-c844d6c68d16',
        '89f2875f-5517-4fbe-9bca-8a866aaa98ad',
        'f636a12e-9f23-4ba1-b99f-6cb8693043ca',
        '59b1902f-919e-43db-85eb-ceaa8766d38d',
        '4e2bead7-8b4d-4bc2-8989-7f52f20048f5',
        '84ef1acb-a53b-4879-bf31-c19dd2c8bab1',
        'e7943aec-e7ab-410a-b952-ec917104e0ca',
        '0989b0e6-6536-46f9-8b24-3341daf738ce',
        '9fde09e0-27be-447d-a57c-5c8befa160da',
        '50328888-0a0b-4375-9f7b-481c86322b49',
        '829a8ad6-8703-47f5-8266-d8b737ef6164',
        'd9d9df48-5715-4124-8f3f-f2c27c1fd745',
        '2724c608-205d-4795-bd1b-3fc4130afa15',
        'fb2fcbec-ac1c-44ce-a15b-bb78b39df43e',
        'c2a852e3-068a-4ca3-845d-2c56e4ae6be7',
        '16860cb2-9ffd-403e-946d-cfccb55672fa',
        '40dc998a-acb0-4301-b5c4-71e7b95e05b3'
    ]
    wx.ready(function () {
        document.querySelector('#checkJsApi').onclick = function () {
            wx.checkJsApi({
                jsApiList: [
                    'scanQRCode',
                ],
                success: function (res) {
                    alert(JSON.stringify(res))
                }
            });
            // wx.scanQRCode({
            //     needResult: 1,
            //     scanType: ["qrCode", "barCode"],
            //     success: function (res) {
            //         var vip = JSON.stringify(res.resultStr)
            //         var vips = vipArr.join()
            //         if (vips.indexOf(vip) > -1) {
            //             $('.page2 p').text('是会员')
            //         } else {
            //             $('.page2 p').text('不是会员')
            //         }
            //         $('.page2').show().siblings('section').hide()
            //     }
            // });
        };

        $('.page1 button').on('click', function () {

            // wx.scanQRCode({
            //     needResult: 1,
            //     desc: 'scanQRCode desc',
            //     success: function (res) {
            //         alert(JSON.stringify(res));
            //     }
            // });
        })
    });

    $('.page2 button').on('click', function () {
        $('.page2 p').text('')
        $('.page1').show().siblings('section').hide()
    })

</script>
</body>

</html>