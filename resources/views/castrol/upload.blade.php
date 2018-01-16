<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640,user-scalable=no">
    <link rel="stylesheet" href="../../res/castrol/css/reset.css">
    <link rel="stylesheet" href="../../res/castrol/css/index2.css">
    <title>嘉实多</title>
</head>
<body>
    <section class="">
        <div class="upload_image">

        </div>
        <form id="uploadForm" enctype="multipart/form-data">
        <label for="file_input">
            <img src="../../res/castrol/img/upload.png" alt="" class="btn_upload">
            <input name="photo" style="display: none" id="file_input" type="file" accept="image/*" multiple/>
        </label>
        </form>
        <img src="../../res/castrol/img/comfirm.png" alt="" class="upload_comfirm">


    </section>

</body>
<script src="../../res/castrol/js/jquery.js"></script>
<script>
    var result;
    var photo;
    var input = document.getElementById("file_input");
    if(typeof FileReader==='undefined'){
        alert = "抱歉，你的浏览器不支持 FileReader";
        input.setAttribute('disabled','disabled');
    }else{
        input.addEventListener('change',readFile,false);
    }

    function readFile() {
        $('.upload_image').html('')
        if (!input['value'].match(/.jpg|.gif|.png|.jpeg|.bmp/i)) {　　//判断上传文件格式
            return alert("上传的图片格式不正确，请重新选择")
        }
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function (e) {
            result = e.currentTarget.result;
            $('.upload_image').append('<img src="' + this.result+ '" alt="">')
        };
        var reader2 = new FileReader();
        reader2.readAsBinaryString(this.files[0]);
        photo =this.files[0];
    }
    $('.upload_comfirm').click(function () {
        var formData = new FormData($('#uploadForm')[0]);
        // console.log($('#uploadForm').files[1])
        // formData.append('photo', $('#uploadForm')[0].files[0]);
        $.ajax({
            url: 'http://api.test/api/castrol/photo/upload',
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res)
                alert('上传成功')
            },
            error: function (res) {
                console.log(res.responseText)
                alert('上传失败，请重新上传')
            }
        });
    })
</script>
</html>
