<!DOCTYPE html>
<html lang="zh_cn">
<head>
  <meta charset="UTF-8">
  <title></title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

</body>

<script src="//localhost:6001/socket.io/socket.io.js"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript" charset="utf-8"></script>
<script type="application/javascript">
    Echo.channel('Zl')
        .listen('ZlSign', (e) => {
            console.log(e.nickname);
        });
</script>
</html>