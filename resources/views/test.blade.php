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
    <span class="exception_title"><abbr title="EasyWeChat\Encryption\EncryptionException">EncryptionException</abbr> in <a title="/home/api/vendor/overtrue/wechat/src/MiniProgram/Encryption/Encryptor.php line 56">Encryptor.php line 56</a>:</span>
    <span class="exception_message">ILLEGAL_BUFFER</span>
  </h2>
  <div class="block">
    <ol class="traces list_exception">
      <li> in <a title="/home/api/vendor/overtrue/wechat/src/MiniProgram/Encryption/Encryptor.php line 56">Encryptor.php line 56</a></li>
      <li>at <abbr title="EasyWeChat\MiniProgram\Encryption\Encryptor">Encryptor</abbr>->decryptData('W6gGuEVrw1Q4Ikm8CwxMPQ==', 'n0DJRXn439J2wa8OsP3H0w==', 'pSd4SblUsStLEUeIpFrg/J3rPb12MPBaB+iSMw4jz9Fd66lefsIdsPA1EhxM+azrwyp5Vhev6Nnf/FAZn2TM9PJu+YAtnfAl907OkTGnM+8SWkbs0i0W4eZFQkOlurySehZ5OOGxUNQDfmIcWPA5jJYCBg+ayQuECxzeYxIzwifFpwB8V/hh7ubCkdF5lwAAKFAW7LHdMagvcLDpvjCE7DXzaCZk+vhSFdFMDHkNMOC2tyyILzaWNxK5wV5SU9fGgjnT6wbEA51nWhCWxV1w9ZvE5qC4PSuHHXGsmpf0413WV/2UvDZ4aWQXjob7go3xOoC4KVHmfq4r7Qay1VRcq0BIb8LknoO7rE+EVx/kdEbz5wH8zUF6asRtxE6jokaUtfZYoDMVpiER/0UBLDStW2RrSnavYXMkTPIslJlWdblLEaapf+gM9WjIjF340EUkGmwwGtB/RGYyXbSwT90KUy76dsXFaEIOD0UxVLL9P4kaHhYVZzHzjAXBieY+IuiusbPL7d6/0YaUU5u4KgHY3Ss0GD1Lo8tzr7j5FRZ4qztkGXdgfpLnjE4+ECyQgLD1Ll/azFuqr7dUPqaJHwqXMKS+KJUCVlwVD3OWSutziRFh00I8QCCN9jald1oxzyjxjyHGtYPNokBb5pqrd+/xRAQeeE3UFOf+nIK6JEfP6vljduB9Zki1Duy3adHp6gLJT62vj7a8mv6eEoOfuLl8cgfIeWbCYJ9+m1BU1FVEFLstwFl+jyQ55lhp8lb11sEjE3PEyGu1m30+teH+TtKp7aPQHpUYkP1E3rLjz3Apq6s6hwruzws17Bi0mHXe42SionLviHjhMJ3OpFOEz6OaK5sCn8N8Go+djF0q4wtKDqYbj52HBtwkoh1PAG2PRK4ycl74qt3VYIpQaUVPY5kHR8VfGZ0vnsb2zB74MEMdAnDhGl3JGS1S6Swj50vHY2fhDcHkPnfS9h1PXgxDOraORFgoc6ozfXwyR7OgjT9JFUEC/Uvh92MycYVC8GUHEdx2CiS73kEyrTMgyAKjle1AzIVFFOrgI8f42RCqwtQ90tQggacjLlf29SmW3OTvjyj8iatj8TZVMbBothii6WpAjF4NqFKTxMtM8VRlmtmNSVZ6WVgsmHa1zI8DgQYc6ZVqXmmuZH1NUaW5H9OCK6kMD6+QUoJN09SedCj3Z4t/GtuWFPBf3Kf/V5Hxg7n6fTivHUEW7rKCyxucDeqOnJfjrem8gUvBZjicbUReJevwFSAR9gu9RbdTTyik1Ub3L1i4CcyprkWJIKPi9h4kJM5cWZbBVD+6M7u6fV0ZimZJ5/FIXfZBKYIGRiAsssgxl0NTbwfo3tdj6r+ps+Z6MVnIBzakKCazmLRmBWX7b76yRmxinwQDKHJCFSD9cqrKyPBuGdx9SLbacIdlFdO3D22qEWKHsieOrYaTgs2UiYN4QdhZ15hMj8WR1sJGN6yN7L6+PY2BW92pc+dUZ73EYsjI7L7ePa686/MGaeitOpWmB26yhDfKl5AWgkSr7NyrOf+bNk6J8vMhD+Dz0TAyRG5kdA==') in <a title="/home/api/app/Http/Controllers/Mini/IndexController.php line 26">IndexController.php line 26</a></li>
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