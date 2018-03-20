<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="{{ asset('res/zyhx/lolo/js/flexible.js') }}"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2018腾讯移动游戏合作伙伴大会</title>
    <link rel="stylesheet" href="{{ asset('res/zyhx/lolo/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('res/zyhx/lolo/css/icon.css') }}">
    <link rel="stylesheet" href="{{ asset('res/zyhx/lolo/css/index.css') }}">
    <style>
        [v-cloak] {
            display: none;
        }
    </style>
</head>
<body>
<section id="app" class="barrage" v-cloak>
    <div class="titleWrapper">
        <h1 style="color: #fff9ec">{{ $topic->topic }} </h1>
    </div>
    <div class="infoPannel" ref="infoPannel">
        <div>
            <ul>
                <li class="infoItem" v-for="(item, index) in infos.infosList">
                    <div class="q_num">Q@{{index+1}}:</div>
                    <div class="text">@{{item.text}}</div>
                    <div class="favorite icon-favorite"
                         :class="{'active': infos.favorites.indexOf(item.id) > -1 && infos.favorites[infos.favorites.indexOf(item.id)] == item.id}"
                         @click="toggleFavorite(item.id)"></div>
                    <div class="line"></div>
                </li>
            </ul>
            <div class="loading" v-if="isPullUpLoad">loading...</div>
            <div v-show="infos.infosList.length < 5" style="height:1200px;width:100px;"></div>
        </div>
        </div>
    </div>
    <div class="inputWrapper">
        <button class="btn" @click="p_open">我要发言</button>
    </div>
    <div class="popup" v-show="p_state">
        <div class="q_box">
            <div class="title">请输入您的问题?</div>
            <div class="input"><input v-model="text" type="text" placeholder="Answer"></div>
            <div class="btn_group">
                <button @click="submit">OK</button>
                <button @click="p_close">Cancel</button>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('res/zyhx/lolo/js/vue.js') }}"></script>
<script src="{{ asset('res/zyhx/lolo/js/bscroll.js') }}"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            text: '',
            p_state: false,
            isPullUpLoad: false,
            topic_id:{{ isset($topic) ? $topic->id : 0 }},
            openid: '{{  $wechatInfo['id'] }}',
            nickname: '{{ $wechatInfo['name'] }}',
            finalId: {{ is_null($comments) ? $comments->last()->id : 0  }},
            infos: {
                favorites: [
                    @foreach($zans as $zan)
                    {{ $zan->comment_id }},
                    @endforeach
                ],
                infosList: [
                        @foreach($comments as $comment)
                    {
                        id: {{ $comment->id }},
                        text: '{{ $comment->comment }}',
                    },
                    @endforeach
                ]
            }
        },
        created: function () {
            //ajax第一次申请数据，将数据加入this.infos
            let self = this;
            $.ajax({
                url: '{{ url('api/zyhx/comments') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                method: 'GET',
                data: {
                    finalId: this.finalId
                },
            }).done(function (res) {
            }).fail(function (msg) {
            })
        },
        mounted: function () {
            this.initScroll();
        },
        methods: {
            initScroll: function () {
                var options = {
                    scrollbar: {
                        fade: false
                    },
                    pullUpLoad: true,
                    click: true,
                };
                this.scroll = new BScroll(this.$refs.infoPannel, options);
                this.pullUpLoad();
            },
            pullUpLoad: function () {
                this.scroll.on('pullingUp', () => {
                    this.isPullUpLoad = true;
                    this.scroll.refresh();
                    this.updateData();
                });
            },
            updateData: function () {
                var self = this;
                //将setTimeout换成ajax更新数据
                setTimeout(function () {
                    var newData = [
                        {
                            id: 7,
                            text: '我们的使命是通过产业投资促进社会繁荣发展。  '
                        },
                        {
                            id: 8,
                            text: '我们的愿景是打造中国领先的多元化产业投资与专业金融服务集团。'
                        },
                        {
                            id: 9,
                            text: '横跨“大健康、文化、旅游、地产、科技、金融”六大产业于一体的大型民营企业集团。'
                        },
                        {
                            id: 10,
                            text: '打造数据采集平台、数据分析平台、金融服务平台、为所有客户提供标准化、差异化、综合性的金融解决方案。'
                        }
                    ];
                    //ajax更新数据newData, 将数据加入self.infos
                    self.infos.infosList = self.infos.infosList.concat(newData);
                    self.isPullUpLoad = false;
                    self.scroll.finishPullUp();
                }, 2000)
            },
            toggleFavorite: function (id) {
                let self = this;
                this.infos.favorites.push(id);
                $.ajax({
                    url: '{{ url('api/zyhx/zan') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    method: 'POST',
                    data: {
                        openid: self.openid,
                        commentId: id
                    },
                }).done(function (res) {
                    console.log(res)
                }).fail(function (msg) {
                    console.log(msg.responseText)
                })
            },
            p_open: function () {
                this.p_state = true;
            },
            p_close: function () {
                this.p_state = false;
                this.text = '';
            },
            submit: function () {
                //ajax提交信息

                let self = this;
                $.ajax({
                    url: '{{ url('api/zyhx/comment') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    method: 'POST',
                    data: {
                        text: self.text,
                        openid: self.openid,
                        topic: self.topic_id,
                        nickname: self.nickname,
                    },
                }).done(function (res) {
                    alert('提交成功')
                }).fail(function (msg) {
                    console.log(msg)
                })

                self.p_state = false;
                self.text = '';
            }
        }
    })
</script>
</body>
</html>
