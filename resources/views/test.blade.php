<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>test.blade.php</title>
</head>
<body>
<form action="{{url('api/audio/upload')}}" method="post" enctype="multipart/form-data">
  <input type="file" name="audio" id="audio">
  <button type="submit">提交</button>
</form>
</body>
</html>