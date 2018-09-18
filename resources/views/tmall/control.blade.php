<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta name="msapplication-tap-highlight" content="no"/>
    <title>战队报名</title>
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    <script src="//unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
    <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.js"></script>
</head>
<style>

</style>
<body>
<div id="app">
    <b-container class="bv-example-row">
        <b-row align-h="center" style="padding-top: 10rem">
            <b-col cols="6"><h1 align="center">战队操作面板</h1></b-col>
        </b-row>
        <b-row align-h="center" style="padding-top: 6rem">
            <b-col cols="5" v-for="team in teams">
                <div align="center">
                    <b-list-group>
                        <b-list-group-item variant="success">战队名:@{{ team.name }}</b-list-group-item>
                        <b-list-group-item variant="success">用时:@{{ team.time }}</b-list-group-item>
                        <b-list-group-item variant="success">进入时间:@{{ team.created_at }}</b-list-group-item>
                    </b-list-group>
                    <b-button size="lg" variant="warning" style="margin-top: 30px" v-on:click="addTime(team.id)"
                              v-show="buttonShow">
                        加时惩罚
                    </b-button>
                </div>
            </b-col>
        </b-row>
    </b-container>


</div>
<script src="https://cdn.bootcss.com/axios/0.18.0/axios.js"></script>
<script>
    let vue = new Vue({
        el: '#app',
        data: {
            buttonShow:true,
            teams: []
        },
        methods: {
            addTime: function (id) {
                let that = this;
                this.buttonShow = false;
                axios.get(`{{url('api/genie/punish')}}/${id}`)
                    .then(function (res) {
                        console.log(res);
                        alert('加时成功');
                        that.buttonShow = true;
                    })
            }
        }
    });

    function f() {
        setInterval(function () {
            axios.get("{{url('api/genie/teams')}}").then(function (res) {
                vue.teams = res.data;
            })
        }, 1000)
    }

    f();
</script>
</body>
</html>