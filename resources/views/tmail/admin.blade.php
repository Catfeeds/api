<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>iview example</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/iview.css') }}">
    <script type="text/javascript" src="{{ asset('js/') }}"></script>
        <script type="text/javascript" src="http://unpkg.com/iview/dist/iview.min.js"></script>
</head>
<body>
<div id="app">
    <row type="flex" style="font-size: large; margin-top: 3em" align="center">
        <i-col span="6" >这是标题</i-col>
    </row>
    <br>
    <row style="margin-top: 1em">
        <i-col span="3" offset="6">
            <label for="userId">用户编号：</label>
            <i-input v-model="userId" size="large" placeholder=""></i-input>
        </i-col>
        <i-col span="3" offset="1">
            <label for="兑换积分">兑换积分：</label>
            <i-input v-model="coin" size="large" placeholder=""></i-input>
        </i-col>
        <i-col span="4" offset="1">
            <i-button type="primary" shape="circle" icon="ios-search">兑换</i-button>
            <i-button type="primary" shape="circle" icon="ios-search">查找</i-button>
            <i-button type="info" shape="circle" icon="ios-search">撤销</i-button>
        </i-col>
    </row>
    <br>
    <row>
        <i-col span="6">col-6</i-col>
        <i-col span="6">col-6</i-col>
        <i-col span="6">col-6</i-col>
        <i-col span="6">col-6</i-col>
    </row>
    <i-button @click="show">Click me!</i-button>
    <Modal v-model="visible" title="Welcome">Welcome to iView</Modal>
</div>
<script>
    new Vue({
        el: '#app',
        data: {
            userId: 10,
            coin:5,
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
