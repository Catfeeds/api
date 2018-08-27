@extends('Mg.layout')

@section('content')

    <Row>
        <div style="background:#eee;padding: 20px">
            <Card :bordered="false">
                <p slot="title" style="padding-bottom: 40px">
                    <i-col span="10">
                        <i-input search="true" enter-button="搜索" placeholder="请输入手机号查询" on-click="search"/>
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
    <script>

        let Main = {
            data() {
                return {
                    theme1: 'primary',
                    columns7: [],
                    data6: []
                }
            },
            methods: {
                search() {
                    console.log('查询')
                }
            }
        };

        var Component = Vue.extend(Main)
        new Component().$mount('#app')
    </script>
@endsection