<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="robots" content="noindex,nofollow" />
  <style>
    /* Copyright (c) 2010, Yahoo! Inc. All rights reserved. Code licensed under the BSD License: http://developer.yahoo.com/yui/license.html */
    html{color:#000;background:#FFF;}body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td{margin:0;padding:0;}table{border-collapse:collapse;border-spacing:0;}fieldset,img{border:0;}address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal;}li{list-style:none;}caption,th{text-align:left;}h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;}q:before,q:after{content:'';}abbr,acronym{border:0;font-variant:normal;}sup{vertical-align:text-top;}sub{vertical-align:text-bottom;}input,textarea,select{font-family:inherit;font-size:inherit;font-weight:inherit;}input,textarea,select{*font-size:100%;}legend{color:#000;}

    html { background: #eee; padding: 10px }
    img { border: 0; }
    #sf-resetcontent { width:970px; margin:0 auto; }
    .sf-reset { font: 11px Verdana, Arial, sans-serif; color: #333 }
    .sf-reset .clear { clear:both; height:0; font-size:0; line-height:0; }
    .sf-reset .clear_fix:after { display:block; height:0; clear:both; visibility:hidden; }
    .sf-reset .clear_fix { display:inline-block; }
    .sf-reset * html .clear_fix { height:1%; }
    .sf-reset .clear_fix { display:block; }
    .sf-reset, .sf-reset .block { margin: auto }
    .sf-reset abbr { border-bottom: 1px dotted #000; cursor: help; }
    .sf-reset p { font-size:14px; line-height:20px; color:#868686; padding-bottom:20px }
    .sf-reset strong { font-weight:bold; }
    .sf-reset a { color:#6c6159; cursor: default; }
    .sf-reset a img { border:none; }
    .sf-reset a:hover { text-decoration:underline; }
    .sf-reset em { font-style:italic; }
    .sf-reset h1, .sf-reset h2 { font: 20px Georgia, "Times New Roman", Times, serif }
    .sf-reset .exception_counter { background-color: #fff; color: #333; padding: 6px; float: left; margin-right: 10px; float: left; display: block; }
    .sf-reset .exception_title { margin-left: 3em; margin-bottom: 0.7em; display: block; }
    .sf-reset .exception_message { margin-left: 3em; display: block; }
    .sf-reset .traces li { font-size:12px; padding: 2px 4px; list-style-type:decimal; margin-left:20px; }
    .sf-reset .block { background-color:#FFFFFF; padding:10px 28px; margin-bottom:20px;
      border-bottom-right-radius: 16px;
      border-bottom-left-radius: 16px;
      border-bottom:1px solid #ccc;
      border-right:1px solid #ccc;
      border-left:1px solid #ccc;
      word-wrap: break-word;
    }
    .sf-reset .block_exception { background-color:#ddd; color: #333; padding:20px;
      border-top-left-radius: 16px;
      border-top-right-radius: 16px;
      border-top:1px solid #ccc;
      border-right:1px solid #ccc;
      border-left:1px solid #ccc;
      overflow: hidden;
      word-wrap: break-word;
    }
    .sf-reset a { background:none; color:#868686; text-decoration:none; }
    .sf-reset a:hover { background:none; color:#313131; text-decoration:underline; }
    .sf-reset ol { padding: 10px 0; }
    .sf-reset h1 { background-color:#FFFFFF; padding: 15px 28px; margin-bottom: 20px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body ondblclick="var t = event.target; if (t.title && !t.href) { var f = t.innerHTML; t.innerHTML = t.title; t.title = f; }">
<div id="sf-resetcontent" class="sf-reset">
  <h1>Whoops, looks like something went wrong.</h1>
  <h2 class="block_exception clear_fix">
    <span class="exception_counter">1/1</span>
    <span class="exception_title"><abbr title="ErrorException">ErrorException</abbr> in <a title="/home/api/vendor/overtrue/wechat/src/MiniProgram/Encryption/Encryptor.php line 44">Encryptor.php line 44</a>:</span>
    <span class="exception_message">Missing argument 2 for EasyWeChat\MiniProgram\Encryption\Encryptor::decryptData(), called in /home/api/app/Http/Controllers/Mini/IndexController.php on line 27 and defined</span>
  </h2>
  <div class="block">
    <ol class="traces list_exception">
      <li> in <a title="/home/api/vendor/overtrue/wechat/src/MiniProgram/Encryption/Encryptor.php line 44">Encryptor.php line 44</a></li>
      <li>at <abbr title="Illuminate\Foundation\Bootstrap\HandleExceptions">HandleExceptions</abbr>->handleError(2, 'Missing argument 2 for EasyWeChat\\MiniProgram\\Encryption\\Encryptor::decryptData(), called in /home/api/app/Http/Controllers/Mini/IndexController.php on line 27 and defined', '/home/api/vendor/overtrue/wechat/src/MiniProgram/Encryption/Encryptor.php', 44, <em>array</em>('sessionKey' => '/Vq1MizYGhsyfoVL8j0p3LjJPY/xzmGomwlq/cQrZB8ZOC4ah+05OMU+//ZpiqxQOUeUDh4Tlsk8dG+0KuPQSjBZSfArCM0fSJaK89pg0VM5t9QAq+45PT5ZLpOp1fLjvSbmFWt99L2uPew1U9rNCBMTV9B31RoTKS7R0eexPLhVmfmaB3/3UyZ+KZI3EsWmaNAkYs7kmgaQeGGlebw4dWwoD8xcwjqe5SyWf+f0uOWMy3qM1Afs5dJ8Hs7kCncUMpyqniJayZEtLCom5onyNlw3gdT1rHXNmUXXaVSo5OeRVhRjxEEKHBDUHZmQOrKj3iq4dqnylOrWdwzZNA1ELNH1JqYnx0oGKrGl25rIJMpiozPXuH6C/lNmy2Nv54Uu1zUZeUxiXHcY2LXTajy/o//ZFWlVoGr9UOVNFSmuXDJVN7qzLrRGAAkSw5UTd+qVm7rMEqOQDE3tlWozlxTJjsUgolLrBCAyj/AtQCKhTTbdVQRPU9QpaozB+9R6f3WIuF0NLI9xfN3cpOFOhyUbHC9tlQj82OjUXHUguaajKTtvBs13Sp6Af02DeM3F1R05LTk0p3dQT1xRnC2TgNrBFvIZRTe0WRT2Oa1swzAb2uIEYB9j9A8lC7nE/qmNU8rdoaP6K/xOWlEXVjp2ncJyoINQRQ+weTq52fZrjBn9mwNgHFZJPfyTgy54mDlR4+p5VseWRH93RA4iBsVRL+hOswlapxUUdCvPhL2Ykd2zP9kvWdB2DuCUueFc0rSNiLRDYsPAtg0MOmEjRN/OpZSTRZFjbzkTIAbz1tLtAJiN00L2G4eK8s50+xBr5A87fsk66bEgaPRQmOFRjndVQKqFSIHxWiTWupu0Wv2RVQDyrKBN2pj+ANi7uTdU38tgneTCVfGRE9z6kvhLAUvCmbjjgeVZ7uri3Arb5HXE0ImHEuBzwypsNZhZmQSbXcPvnmLNCun5Mepd3xUZVfT5lLwaITAE4+oXU6LrWHxnmkNGyTgJY1kihx7VBU40uuFexDXLmu8NUYgovDqRK1xkWTs91FNME5/mRq5TkOodRH9FkoX0QWhjndMR9fSPMXbMAEjvIpVOCEioYk9Je/gjRJAecvnfsbjkMxFSacmqKKETaphF5Nxk2fw3S2W36ZHwU7ETWHdLgv7U0O3I6SMdi9fr2hu4UzRe0Bs4mXnG7b4ct2F0uRH74lP8lpQBfTXCqLm/ufW9yZZHLf32gksB5Chd+djEHlPrkU375TbKeeAVJ2bgi3+OSY/9zqddReepSfh8wI+nlqmjUDpNnIEzeDyrq6Jy1xOhwaml90RQcK8IuSwjffCBDxAvyTqCqKGW5QjBcAi1UXzKeXBW5ykWiweUq5BEB3iV0/itvJwuZuHEdj5iRqoC5YSBxb3LBaZhCpAR3fz8FbaDouftTZShuPYNLz/k7QZ/4qHhIVrIrVR3nH2vgTKf2YTH1whxfQK77IqHxZneaVOVqX68VrDiLeGFuu5jEwqwVJ2z6/vy8XjyX/gysTOc+ntDsDJWWbHZ3Ji7bTdgP9Fk8NCnF6Cr11CZUQ==')) in <a title="/home/api/vendor/overtrue/wechat/src/MiniProgram/Encryption/Encryptor.php line 44">Encryptor.php line 44</a></li>
      <li>at <abbr title="EasyWeChat\MiniProgram\Encryption\Encryptor">Encryptor</abbr>->decryptData('/Vq1MizYGhsyfoVL8j0p3LjJPY/xzmGomwlq/cQrZB8ZOC4ah+05OMU+//ZpiqxQOUeUDh4Tlsk8dG+0KuPQSjBZSfArCM0fSJaK89pg0VM5t9QAq+45PT5ZLpOp1fLjvSbmFWt99L2uPew1U9rNCBMTV9B31RoTKS7R0eexPLhVmfmaB3/3UyZ+KZI3EsWmaNAkYs7kmgaQeGGlebw4dWwoD8xcwjqe5SyWf+f0uOWMy3qM1Afs5dJ8Hs7kCncUMpyqniJayZEtLCom5onyNlw3gdT1rHXNmUXXaVSo5OeRVhRjxEEKHBDUHZmQOrKj3iq4dqnylOrWdwzZNA1ELNH1JqYnx0oGKrGl25rIJMpiozPXuH6C/lNmy2Nv54Uu1zUZeUxiXHcY2LXTajy/o//ZFWlVoGr9UOVNFSmuXDJVN7qzLrRGAAkSw5UTd+qVm7rMEqOQDE3tlWozlxTJjsUgolLrBCAyj/AtQCKhTTbdVQRPU9QpaozB+9R6f3WIuF0NLI9xfN3cpOFOhyUbHC9tlQj82OjUXHUguaajKTtvBs13Sp6Af02DeM3F1R05LTk0p3dQT1xRnC2TgNrBFvIZRTe0WRT2Oa1swzAb2uIEYB9j9A8lC7nE/qmNU8rdoaP6K/xOWlEXVjp2ncJyoINQRQ+weTq52fZrjBn9mwNgHFZJPfyTgy54mDlR4+p5VseWRH93RA4iBsVRL+hOswlapxUUdCvPhL2Ykd2zP9kvWdB2DuCUueFc0rSNiLRDYsPAtg0MOmEjRN/OpZSTRZFjbzkTIAbz1tLtAJiN00L2G4eK8s50+xBr5A87fsk66bEgaPRQmOFRjndVQKqFSIHxWiTWupu0Wv2RVQDyrKBN2pj+ANi7uTdU38tgneTCVfGRE9z6kvhLAUvCmbjjgeVZ7uri3Arb5HXE0ImHEuBzwypsNZhZmQSbXcPvnmLNCun5Mepd3xUZVfT5lLwaITAE4+oXU6LrWHxnmkNGyTgJY1kihx7VBU40uuFexDXLmu8NUYgovDqRK1xkWTs91FNME5/mRq5TkOodRH9FkoX0QWhjndMR9fSPMXbMAEjvIpVOCEioYk9Je/gjRJAecvnfsbjkMxFSacmqKKETaphF5Nxk2fw3S2W36ZHwU7ETWHdLgv7U0O3I6SMdi9fr2hu4UzRe0Bs4mXnG7b4ct2F0uRH74lP8lpQBfTXCqLm/ufW9yZZHLf32gksB5Chd+djEHlPrkU375TbKeeAVJ2bgi3+OSY/9zqddReepSfh8wI+nlqmjUDpNnIEzeDyrq6Jy1xOhwaml90RQcK8IuSwjffCBDxAvyTqCqKGW5QjBcAi1UXzKeXBW5ykWiweUq5BEB3iV0/itvJwuZuHEdj5iRqoC5YSBxb3LBaZhCpAR3fz8FbaDouftTZShuPYNLz/k7QZ/4qHhIVrIrVR3nH2vgTKf2YTH1whxfQK77IqHxZneaVOVqX68VrDiLeGFuu5jEwqwVJ2z6/vy8XjyX/gysTOc+ntDsDJWWbHZ3Ji7bTdgP9Fk8NCnF6Cr11CZUQ==') in <a title="/home/api/app/Http/Controllers/Mini/IndexController.php line 27">IndexController.php line 27</a></li>
      <li>at <abbr title="App\Http\Controllers\Mini\IndexController">IndexController</abbr>->index(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))</li>
      <li>at <abbr title=""></abbr>call_user_func_array(<em>array</em>(<em>object</em>(<abbr title="App\Http\Controllers\Mini\IndexController">IndexController</abbr>), 'index'), <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Controller.php line 55">Controller.php line 55</a></li>
      <li>at <abbr title="Illuminate\Routing\Controller">Controller</abbr>->callAction('index', <em>array</em>(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>))) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/ControllerDispatcher.php line 44">ControllerDispatcher.php line 44</a></li>
      <li>at <abbr title="Illuminate\Routing\ControllerDispatcher">ControllerDispatcher</abbr>->dispatch(<em>object</em>(<abbr title="Illuminate\Routing\Route">Route</abbr>), <em>object</em>(<abbr title="App\Http\Controllers\Mini\IndexController">IndexController</abbr>), 'index') in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Route.php line 203">Route.php line 203</a></li>
      <li>at <abbr title="Illuminate\Routing\Route">Route</abbr>->runController() in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Route.php line 160">Route.php line 160</a></li>
      <li>at <abbr title="Illuminate\Routing\Route">Route</abbr>->run() in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 559">Router.php line 559</a></li>
      <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 30">Pipeline.php line 30</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/barryvdh/laravel-cors/src/HandleCors.php line 36">HandleCors.php line 36</a></li>
      <li>at <abbr title="Barryvdh\Cors\HandleCors">HandleCors</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/SubstituteBindings.php line 41">SubstituteBindings.php line 41</a></li>
      <li>at <abbr title="Illuminate\Routing\Middleware\SubstituteBindings">SubstituteBindings</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Middleware/ThrottleRequests.php line 49">ThrottleRequests.php line 49</a></li>
      <li>at <abbr title="Illuminate\Routing\Middleware\ThrottleRequests">ThrottleRequests</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>), '60', '1') in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 102">Pipeline.php line 102</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then(<em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 561">Router.php line 561</a></li>
      <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->runRouteWithinStack(<em>object</em>(<abbr title="Illuminate\Routing\Route">Route</abbr>), <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 520">Router.php line 520</a></li>
      <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->dispatchToRoute(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Router.php line 498">Router.php line 498</a></li>
      <li>at <abbr title="Illuminate\Routing\Router">Router</abbr>->dispatch(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php line 174">Kernel.php line 174</a></li>
      <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->Illuminate\Foundation\Http\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 30">Pipeline.php line 30</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/barryvdh/laravel-cors/src/HandlePreflight.php line 38">HandlePreflight.php line 38</a></li>
      <li>at <abbr title="Barryvdh\Cors\HandlePreflight">HandlePreflight</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php line 30">TransformsRequest.php line 30</a></li>
      <li>at <abbr title="Illuminate\Foundation\Http\Middleware\TransformsRequest">TransformsRequest</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/TransformsRequest.php line 30">TransformsRequest.php line 30</a></li>
      <li>at <abbr title="Illuminate\Foundation\Http\Middleware\TransformsRequest">TransformsRequest</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/ValidatePostSize.php line 27">ValidatePostSize.php line 27</a></li>
      <li>at <abbr title="Illuminate\Foundation\Http\Middleware\ValidatePostSize">ValidatePostSize</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/CheckForMaintenanceMode.php line 46">CheckForMaintenanceMode.php line 46</a></li>
      <li>at <abbr title="Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode">CheckForMaintenanceMode</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), <em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 148">Pipeline.php line 148</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->Illuminate\Pipeline\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Routing/Pipeline.php line 53">Pipeline.php line 53</a></li>
      <li>at <abbr title="Illuminate\Routing\Pipeline">Pipeline</abbr>->Illuminate\Routing\{closure}(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Pipeline/Pipeline.php line 102">Pipeline.php line 102</a></li>
      <li>at <abbr title="Illuminate\Pipeline\Pipeline">Pipeline</abbr>->then(<em>object</em>(<abbr title="Closure">Closure</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php line 149">Kernel.php line 149</a></li>
      <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->sendRequestThroughRouter(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/vendor/laravel/framework/src/Illuminate/Foundation/Http/Kernel.php line 116">Kernel.php line 116</a></li>
      <li>at <abbr title="Illuminate\Foundation\Http\Kernel">Kernel</abbr>->handle(<em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>)) in <a title="/home/api/public/index.php line 53">index.php line 53</a></li>
    </ol>
  </div>

</div>
</body>
</html>