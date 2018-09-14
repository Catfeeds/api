<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta name="msapplication-tap-highlight" content="no"/>
    <title>战队报名</title>
    <link rel="stylesheet" type="text/css" href="//unpkg.com/iview/dist/styles/iview.css">
    <script type="text/javascript" src="//vuejs.org/js/vue.min.js"></script>
    <script type="text/javascript" src="//unpkg.com/iview/dist/iview.min.js"></script>
</head>
<style>

</style>
<body>
<div id="app">
    <row style="padding-top: 60px; font-size: 25px">
        <i-col span="12" offset="7">
            <h1>战队报名页面</h1>
        </i-col>
    </row>

</div>
<script>
    new Vue({
        el: '#app',
        data: {
            visible: false
        },
        methods: {
            show: function () {
                this.visible = true;
            }
        }
    })
</script>
</body>
</html>