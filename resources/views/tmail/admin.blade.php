<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台兑换系统</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/iview.css') }}">
    <script type="text/javascript" src="{{ asset('js/vue.js') }}"></script>
    <script type="text/javascript" src="http://unpkg.com/iview/dist/iview.min.js"></script>
    <script type="application/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
</head>
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
            <label for="userId">{{ Auth::user()->name }}用户编号：</label>
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
        <i-col span="18" offset="3">
            <i-table stripe :columns="table_construct" :data="table_data"></i-table>
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
                    title: '编号',
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

        },
        methods: {
            infotext: function (title, content) {
                this.$Modal.info({
                    title: title,
                    content:content
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
                    this.table_data.map(obj => {
                        if (obj.id == this.userId) {
                            arr.push(obj);
                        }
                    });
                    this.table_data = arr;
                }
            }
        }
    })
</script>
</body>
</html>
