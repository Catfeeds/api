@extends('Mg.layout')

@section('content')
    <Row>
        <div style="background:#eee;padding: 20px">
            <Card :bordered="false">
                <p slot="title" style="padding-bottom: 40px">
                    <i-button type="success">设置可发库存</i-button>
                </p>
                <p style="padding-bottom: 20px">
                    可发库存代表可向用户发放的库存数量，可根据实际情况一天或多天设置一次,
                    数量为0时即使总库存有剩余也不会向用户发放
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

        var Main = {
            data() {
                return {
                    theme1: 'primary',
                    columns7: [
                        {
                            title: '类别',
                            key: 'category',
                        },
                            @forEach($total as $key=>$value)
                            @if(!$loop->first)
                        {
                            title: '{{ $key }}',
                            key: '{{ $key }}'
                        },
                        @endif
                        @endforeach

                    ],
                    data6: [
                        {!! json_encode($total) !!},
                        {!! json_encode($surplus) !!},
                        {!! json_encode($yet) !!},
                        {!! json_encode($wait) !!}
                    ]
                }
            },
            methods: {
                show(index) {

                }
            }
        };

        var Component = Vue.extend(Main)
        new Component().$mount('#app')
    </script>
@endsection