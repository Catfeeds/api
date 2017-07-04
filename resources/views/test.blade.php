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
    <span class="exception_title"><abbr title="ErrorException">ErrorException</abbr> in <a title="/home/api/app/Http/Controllers/Mini/IndexController.php line 43">IndexController.php line 43</a>:</span>
    <span class="exception_message">Undefined index: openid</span>
  </h2>
  <div class="block">
    <ol class="traces list_exception">
      <li> in <a title="/home/api/app/Http/Controllers/Mini/IndexController.php line 43">IndexController.php line 43</a></li>
      <li>at <abbr title="Illuminate\Foundation\Bootstrap\HandleExceptions">HandleExceptions</abbr>->handleError(8, 'Undefined index: openid', '/home/api/app/Http/Controllers/Mini/IndexController.php', 43, <em>array</em>('request' => <em>object</em>(<abbr title="Illuminate\Http\Request">Request</abbr>), 'iv' => 'RJSQjc39gFzNdyOlC7anyA==', 'code' => '061SZ0LZ0XTrj22Z7qKZ00P1LZ0SZ0Lp', 'run_iv' => 'YNKl1yIa2M5QGsiSGkJmlA==', 'encrypted_run' => 'ncyHOK86xcOMu9A0a/TOa7oE4yjuBdupXG/15xuhe3Az3cEPLiolnrgJl+c/7Q5OUbU9R54pH/X+mgCl1WAK76SV52VQrTy8nfR1u9sy4WljcJ3UEk+mfV81qt06p+iS2fT8OlVvgcokSe2DrtvHJjeEHEiBQLuIkLaCYu2iMMJgQdIhQAW1h+4JbDMk2Ah+2gXRRQPohSSzb7NSwnwoqcJgbofGwOC2QaZLuOXtFbfdJ6Qjz7uN+1bXAjU9LzBT7Cpa+1ce5etVFVo0oqpp0M9wYkXXbcXEqKHSAweNM6mEVa8dL0n9Ryy5Lnwq4TuyrgRFOXU6F2Z6AmLp/jg2fvR719M1XQhu417r5JhH+8esEpYQQDQTKz9QAq1HiFxJCNgUSYrMxPaCbOAbGbi10V5U3kFZOoP4Sk1VHwUYZMi4lB0wXFrJ1xLtNM9PbaM4/G2tyXVBVRotVLO9EiWZS45QwVLbJ120TD4oM9L8EdCEPixB4KKGDhZsLpsi33OBiOuk7NPxcgUm+0WMst+R4Hx1eQlIUKlIEQHU4D5EcdDn6fKVR08GQ+EA0wVtVoUmp1gZMf7sECdGqTWl8caFxy1pPDOT4CEK+GbuPGSF1cVoLcqhKGSc6Tzea7vWoO/yREDpQAVWNp+8aJYeAhZ7co4bftORzrGpjeit63eWFoUUy89fEzBlKxeBuFM6vBEoFGX+mDXXS2q6W9ZpdAYGTWsxbCde+sWN1vfWdvSKqY1voj38aHRHk0buSsypuLP8LkP5rYh5O88vieTWdN+eZ1uh3+qnvsizpomkejhYfNSqW+Hq6u4mEZ+uewH5qTWcsfo6PsueXaPCz4dOm7i0yz+SdOgtnjPnGSbmzYb4+6OrL1NYQO0lgX7GS7uFik2leho28uItIh0govzIRD9mSQtzxQrnnzyM1HnR31cxu3IiW8kPcxqWfyAspr9cYNxxWFXsY+NRVxVO9Yh+TRDpbSb7AN8PjRxJ+dfMMENN7jEQLM8nNuBIw4RDV6hQou+56l9eFey8Bhto+wOrrBhZ3W9LxAyv9X6Mj4CJ160VpMCp+cOElG9NjOdnGqq+lW4rCqk7N+ICMGjtnLTIq1YY+MoMYWTwdOptEPITpwVbaFk0Jvk3oRZ7MFthnWrKQWC4HXmZk8gw87iwzQZbuFZE/F/5w7pmDcoSBkblp4jWarEDUBGiQyKgF4PRoWhY3SfZQbFSCZBE2aWCd/uIl/siPEXMGRi2jiXqedJ7fv727vf+/601Lj+mkekOiiF/bMQ7oWkbXCtBMnHfaPhjFlbRJe49l8uQFBL+D/8qd3qLfdntudhnkFKW0XZbPi8AXgxcu3dB3EH2QqZ/1d4MEBpb/PUWqRfKVBERVAA6fMOSCwI+vcKNkQwvRj+bGo2VAfPrJ7wjhR42CEEXv+ZzjaEOWMUQlv5dOvECyN6xKydtWgJHOw7oIcq8v/XclVMbLcCF7I6/uB+xkY1aLrf1kGhqo3hoO8w8HEEaFb/EbshTD74O8GgehW6yUUWffObvW2vl8sNo8CWgVcYzysE6tZJLxA==', 'encrypted_user' => 'ME7i2NjYBT8+3Cb8CxxhbriOLeuZzVbcqnyFMqDobOZi4ItC/c+xIBzgEIib5oKz11mJ/BEBbVtqtFPMmW1rw51sPTIH67/KO6m83r5BAyCeGGnmPZm/9GNiAgsFVBmzhsc/Xp3/j6LA831lC5gTjso6/rPjdJF316euGyau5ZLRG06odfbM9CKnRE8Hj7vVyKUY/5BZhzRomIFk+ws4G0cI2kjCiv2A5gA5SWehEsud9igq6uN5ygcd8R1Yy/Bbe0wEkH31nNRUFcgw0fo0K4YX9VqTtWh1jtFPr0In3wiT65NXZIww/vfUOlrpLDVW/AOzuYY57uFiR2k1zxwbDQnw9R2qMCWydkcJvQ09yMGKu7gLiEL2ssZj8I6/sgngaaW18o3EKC0aurbNfdOWFd/waKVhyCiYAnBYM32HGy0VOAb2476rkkSH5/sWq7cwZ/66vleiq7JNpvJAM5UQ/Q==', 'share_openid' => 'test', 'res' => <em>object</em>(<abbr title="EasyWeChat\Support\Collection">Collection</abbr>), 'session_key' => '/DoKw9wI881mR14ITOdZHg==', 'run_data' => <em>array</em>('stepInfoList' => <em>array</em>(<em>array</em>('timestamp' => 1496505600, 'step' => 0), <em>array</em>('timestamp' => 1496592000, 'step' => 0), <em>array</em>('timestamp' => 1496678400, 'step' => 0), <em>array</em>('timestamp' => 1496764800, 'step' => 0), <em>array</em>('timestamp' => 1496851200, 'step' => 0), <em>array</em>('timestamp' => 1496937600, 'step' => 0), <em>array</em>('timestamp' => 1497024000, 'step' => 0), <em>array</em>('timestamp' => 1497110400, 'step' => 0), <em>array</em>('timestamp' => 1497196800, 'step' => 0), <em>array</em>('timestamp' => 1497283200, 'step' => 0), <em>array</em>('timestamp' => 1497369600, 'step' => 0), <em>array</em>('timestamp' => 1497456000, 'step' => 0), <em>array</em>('timestamp' => 1497542400, 'step' => 0), <em>array</em>('timestamp' => 1497628800, 'step' => 0), <em>array</em>('timestamp' => 1497715200, 'step' => 0), <em>array</em>('timestamp' => 1497801600, 'step' => 0), <em>array</em>('timestamp' => 1497888000, 'step' => 0), <em>array</em>('timestamp' => 1497974400, 'step' => 0), <em>array</em>('timestamp' => 1498060800, 'step' => 0), <em>array</em>('timestamp' => 1498147200, 'step' => 0), <em>array</em>('timestamp' => 1498233600, 'step' => 0), <em>array</em>('timestamp' => 1498320000, 'step' => 0), <em>array</em>('timestamp' => 1498406400, 'step' => 0), <em>array</em>('timestamp' => 1498492800, 'step' => 0), <em>array</em>('timestamp' => 1498579200, 'step' => 0), <em>array</em>('timestamp' => 1498665600, 'step' => 1288), <em>array</em>('timestamp' => 1498752000, 'step' => 3350), <em>array</em>('timestamp' => 1498838400, 'step' => 4745), <em>array</em>('timestamp' => 1498924800, 'step' => 7357), <em>array</em>('timestamp' => 1499011200, 'step' => 4686), <em>array</em>('timestamp' => 1499097600, 'step' => 3675)), 'watermark' => <em>array</em>('timestamp' => 1499153685, 'appid' => 'wx1e47a69c963a7021')), 'last_run_data' => <em>array</em>('timestamp' => 1499097600, 'step' => 3675), 'user_data' => <em>array</em>('openId' => 'oi5sY0bcPbocHNvT00pqE9Wx64nE', 'nickName' => '陈兆阳', 'gender' => 1, 'language' => 'zh_CN', 'city' => 'Luan', 'province' => 'Anhui', 'country' => 'CN', 'avatarUrl' => 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJurMibINsjIcibkGdBFsL2d5VClKU1JV3k2wljic6EwkHPAEhZxoNcrGvaZKYlWElvPp7ODo1d4qmBA/0', 'watermark' => <em>array</em>('timestamp' => 1499153685, 'appid' => 'wx1e47a69c963a7021')), 'user' => <em>object</em>(<abbr title="App\Models\Group_user">Group_user</abbr>), 'share_user' => <em>object</em>(<abbr title="App\Models\Group_user">Group_user</abbr>))) in <a title="/home/api/app/Http/Controllers/Mini/IndexController.php line 43">IndexController.php line 43</a></li>
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