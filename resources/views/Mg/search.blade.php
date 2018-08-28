@extends('Mg.layout')

@section('content')

    <Row>
        <div style="background:#eee;padding: 20px">
            <Card :bordered="false">
                <p slot="title" style="padding-bottom: 40px">
                    <i-col span="10">
                        <i-input search enter-button="搜索" v-model="phone" placeholder="请输入手机号查询" @on-search="search"/>
                    </i-col>
                </p>

                <p>
                    <i-table border :columns="columns7" :data="data6"></i-table>
                </p>
            </Card>
        </div>
    </Row>
@endsection

@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        let Main = {
            data() {
                return {
                    theme1: 'primary',
                    columns7: [
                        {
                            title: '事件',
                            key: 'type'
                        },
                        {
                            title:'操作',
                            key: 'handle'
                        },
                        {
                            title: '积分',
                            key: 'coin'
                        },
                        {
                            title: '礼品兑换数量',
                            key: 'num'
                        },
                        {
                            title: '时间',
                            key: 'created_at'
                        }
                    ],
                    data6: [],
                    phone: null
                }
            },
            methods: {
                search: function () {
                    console.log(this.phone)
                    axios.get('{{ url('api/mc/search/phone') }}', {
                        params: {
                            phone: this.phone,
                        }
                    }).then(res => this.data6=res.data);
                }
            }
        };

        let Component = Vue.extend(Main);
        new Component().$mount('#app')
    </script>
@endsection
