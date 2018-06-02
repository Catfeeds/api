

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>FedEx Shanghai</title>
    <style>
        .fed {
            background: url('../../res/fed/f_bg.jpg') no-repeat;
            background-size: 100% 100%;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .tp {
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -o-transform: translateY(-50%);
        }

        .tp img {
            width: 100%;
        }
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        html, ul, ol, li, dl, dt, dd, p, h1, h2, h3, h4, h5, h6, a, img, th, td, form, fieldset, iframe, object, pre, code, legend, blockquote {
            border: 0 none;
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        body {
            font-family: 'microsoft yahei',Verdana,Arial,Helvetica,sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
            min-width: 320px;
            margin:0;
        }
        input:focus{outline:none;box-shadow:none;border:solid 1px #ccc}
        .hide {
            display: none;
        }


        img {
            border: 0;
            max-width:100%;
            vertical-align:middle;
        }

        .clear {
            clear: both;
            height: 0px;
            overflow: hidden;
            font-size: 0px;
        }

        .form-control{font-size:1em!important;}
        @media screen and (min-width:480px) {
            body {
                font-size: 21px;
            }
        }

        @media screen and (min-width:640px) {
            body {
                font-size: 21px;
            }

            .content {
                width: 640px;
                margin: auto auto;
            }
        }

        html {
            -ms-touch-action: none;
        }
        ul, li {
            list-style: none outside none;
        }

        a,a:hover,a:active,a:visited,a:link,a:focus{-webkit-tap-highlight-color: rgba(255, 255, 255, 0);
            -webkit-user-select: none;
            -moz-user-focus: none;
            -moz-user-select: none;}
        a{text-decoration:none;}
    </style>
</head>
<body>
<div class="content">
    <div class="fed">
        <img src="../../res/fed/f_logo.png" />
        <div class="tp">
            <img src="{{ env('APP_URL') . '/upload/' . $path }}" />
</div>
</div>
</div>
</body>
</html>