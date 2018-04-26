<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台兑换系统</title>
    <link href="https://cdn.bootcss.com/iview/2.13.1/styles/iview.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/vue/2.5.16/vue.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/iview/dist/iview.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script></head>
<body>
<div id="app">
    <row type="flex" style="font-size: 48px; margin-top: 3em">
        <i-col span="8" offset="8">
            @if(Auth::user()->name == 'pocky')
                百奇后台兑换
            @elseif(Auth::user()->name == 'mac')
                越夜越魅力后台兑换
            @else
                身临其境后台兑换
            @endif
        </i-col>
    </row>
    <br>
    <row style="margin-top: 1em">
        <i-col span="3" offset="6">
            <label for="userId">兑奖编号(用户手机上查看幸运值)：</label>
            <i-input v-model="userId" size="large" placeholder=""></i-input>
        </i-col>
        <i-col span="3" offset="1">
            <label for="兑换积分">扣除积分：</label>
            <i-input v-model="coin" size="large" placeholder=""></i-input>
        </i-col>
        <i-col span="6" offset="1" style="margin-top: 18px">
            <i-button type="primary" @click="post">兑换</i-button>
            <i-button type="primary" @click="search">查找</i-button>
            <i-button type="info" @click="reset">刷新</i-button>
        </i-col>
    </row>
    <br>
    <row>
        <i-col span="9" offset="3">
            <i-table stripe :columns="table_construct" :data="table_data"></i-table>
        </i-col>
        <i-col span="9" offset="1">
            <i-table stripe :columns="table2_construct" :data="table2_data"></i-table>
        </i-col>
    </row>
</div>
<script>
    let vue = new Vue({
        el: '#app',
        data: {
            userId: '',
            coin: 5,
            visible: false,
            table_construct: [
                {
                    title: '兑奖编号',
                    key: 'id'
                },
                {
                    title: '微信昵称',
                    key: 'nickname'
                },
                {
                    title: '{{ Auth::user()->name }}积分',
                    key: '{{ Auth::user()->name }}'
                },
                {
                    title: '兑换次数',
                    key: 'num'
                }
            ],
            table_data_bak: {!! $users !!},
            table_data: {!! $users !!},
            table2_construct: [
                {
                    title: '兑奖编号',
                    key: 'uid'
                },
                {
                    title: '微信昵称',
                    key: 'nickname'
                },
                {
                    title: '兑换时间',
                    key: 'created_at'
                }
            ],
            table2_data: {!! $reward !!},
            table2_data_bak: {!! $reward !!},

        },
        methods: {
            infotext: function (title, content) {
                this.$Modal.info({
                    title: title,
                    content:content,
                    onOk: ()=>{
                        window.location.reload();
                    }
                });
            },

            post: function () {
                let self = this;
                $.ajax({
                    url: '{{ url('api/tmail/coin/sub') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    method: 'POST',
                    data: {
                        uid: self.userId,
                        type: '{{ Auth::user()->name }}',
                        coin: self.coin,
                    },
                }).done(function (res) {
                    self.infotext('提示', res);
                }).fail(function (msg) {
                    console.log(msg);
                    alert('提交失败:' + msg);
                })
            },
            reset: function () {
                window.location.reload();
            },
            search: function () {
                if (this.userId !=='') {
                    let arr = [];
                    this.table_data_bak.map(obj => {
                        if (obj.id == this.userId) {
                            arr.push(obj);
                        }
                    });
                    this.table_data = arr;

                    let arr = [];
                    this.table2_data_bak.map(obj => {
                        if (obj.id == this.userId) {
                            arr.push(obj);
                        }
                    });
                    this.table2_data = arr;
                }
            }
        }
    })
</script>
</body>
</html>
