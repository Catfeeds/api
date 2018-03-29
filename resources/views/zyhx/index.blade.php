<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>2018腾讯移动游戏合作伙伴大会</title>
    <link href="{{ asset('res/zyhx/zhou/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('res/zyhx/zhou/css/index.css') }}">
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <div class="page-header text-center title">
            <h1>{{ $topic->topic }}</h1>
        </div>
    </div>
    <img src="{{ asset('res/zyhx/zhou/images/line.png') }}" style="width:104%;position:relative;left:-2%;" alt="">
    <div class="container">
        <div class="content">
            <ul class="ulCon">
                @if(is_null($comments))
                @else
                    @foreach($comments as $comment)
                        <li class="row">
                            <div class="col-md-1" style="text-align:right">
                                <h3>Q{{ $loop->index +1 }}:</h3>
                            </div>
                            <div class="col-xs-9">
                                <h3>{{ $comment->comment }}</h3>
                            </div>
                            <div class="col-xs-2" style="padding-left:5%">
                                <div class="row" style="">
                                    <h3>
                                        <img src="{{ asset('res/zyhx/zhou/images/heart.png') }}" alt="">
                                        <span>{{ $comment->zan }}</span>
                                    </h3>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

</div>
</body>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('res/zyhx/zhou/js/bootstrap.js') }}"></script>
<script>
    setTimeout(function(){
        window.location.reload();
    },8000);
</script>
<!-- <script src="js/index.js"></script> -->
</html>
