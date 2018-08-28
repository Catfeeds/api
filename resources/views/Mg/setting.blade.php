@extends('Mg.layout')

@section('content')
    <Row>
        <div style="background:#eee;padding: 20px">
            <Card :bordered="false">
                <p slot="title" style="padding-bottom: 40px">
                    <i-button type="success" @click="modal = true">设置可发礼品数量</i-button>
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
    <modal
        v-model="modal"
        title="设置可发礼品数量"
        @on-ok="ok"
        @on-cancel="cancel">
        <p>
            <i-form :model="formItem" :label-width="80">
                @foreach($surplus as $key =>$value)
                    @if(!$loop->first)
                        <form-item label="{{ $key }}">
                            <input-number :max="{{ $value }}" :min="0" v-model="formItem['{{ $key}}']"></input-number>
                        </form-item>
                    @endif
                @endforeach
            </i-form>
        </p>
    </modal>
@endsection

@section('script')
    <script>

        var Main = {
            data() {
                return {
                    formItem: {!! json_encode($wait) !!},
                    modal: false,
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
                ok() {

                },
                cancel() {
                    this.$Message.info('Clicked cancel');
                }
            }
        };

        var Component = Vue.extend(Main)
        new Component().$mount('#app')
    </script>
@endsection
