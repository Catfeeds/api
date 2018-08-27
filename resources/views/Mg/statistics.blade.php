@extends('Mg.layout')

@section('content')
    <Row>
        <div style="background:#eee;padding: 20px">
            <Card :bordered="false">
                <p slot="title">每日兑换总览</p>
                <ve-histogram :data="chartData"></ve-histogram>
            </Card>
        </div>
    </Row>
@endsection

@section('script')
    <script>
        new Vue({
            el: '#app',
            data: {
                theme1: 'primary',
                chartData: {
                    columns: {!! json_encode($keys) !!} ,
                    rows: {!! json_encode($lists) !!}
                }
            },
            methods: {}
        })
    </script>
@endsection