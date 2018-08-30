<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <title>Coach互动照片获取</title>
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iview/3.0.1/iview.js"></script>
    <script src="//cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/v-charts/lib/index.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/iview/3.0.1/styles/iview.css" rel="stylesheet">
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.1.3/weui.min.css"/>
</head>
<body>

<div id="app">
    <img width="640px" v-bind:src="url"
         alt="">
</div>
</body>
<script type="application/javascript">


    var Main = {
        data() {
            return {
                value: 0,
                inputVal:''
            }
        },
        computed: {
            url: function () {
                return 'https://unitytouch.oss-cn-shanghai.aliyuncs.com/Fred%2Fcoach%2F' + this.value + '.png'
            }
        },
        mounted: function () {
            this.$Modal.confirm({
                width: '50px',
                title: '请输入照片提取码',
                cancelText: ' ',
                onOk: () => this.value = this.inputVal,

                render: (h) => {
                    return h('Input', {
                        props: {
                            value: this.inputVal,
                            autofocus: true,

                            placeholder: '请输入照片提取码....'
                        },
                        on: {
                            input: (val) => {
                                this.inputVal = val;
                            }
                        }
                    })
                }
            })
        },
    }
    var Component = Vue.extend(Main)
    new Component().$mount('#app')
</script>

</html>
