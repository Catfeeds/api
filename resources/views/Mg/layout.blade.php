<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>名爵车展小程序统计页面</title>
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iview/3.0.1/iview.js"></script>
    <script src="//cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/v-charts/lib/index.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/v-charts/lib/style.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iview/3.0.1/styles/iview.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <Row>
        <i-menu mode="horizontal" :theme="theme1" active-name="1">
            <menu-item name="1">
                库存总览
            </menu-item>

            <menu-item name="2">
                兑换数据
            </menu-item>
            <menu-item name="3">
                库存设置
            </menu-item>
            <menu-item name="3">
                注销
            </menu-item>
        </i-menu>
    </Row>
    <br/>
    @yield('content')
</div>

@yield('script')

</body>
</html>