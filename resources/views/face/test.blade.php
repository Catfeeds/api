<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>人脸融合测试</title>
    <!-- 引入Vue -->
    <script src="//vuejs.org/js/vue.js"></script>
    <!-- 引入样式 -->
    <link rel="stylesheet" href="//unpkg.com/iview/dist/styles/iview.css">
    <!-- 引入组件库 -->
    <script src="//unpkg.com/iview/dist/iview.js"></script>
    <style type="text/css">
        .code-row-bg {
            font-size: 38px;
            margin: 10%;
        }
    </style>
</head>
<body>
<div id="app" style="margin-top: 10%">
    <row type="flex" justify="center" align="middle" class="code-row-bg">
        <i-col>
            <p >人脸融合测试</p>
        </i-col>
    </row>
    <row type="flex" justify="center" align="middle" class="code-row-bg">
        <i-col>
            <Upload
                action="#"
                :before-upload="handleUpload"
                :format="['png']"

            >
                <i-Button type="ghost" size="large" icon="ios-cloud-upload-outline" class="">上传文件</i-Button>
            </Upload>
            <div v-if="file !== null"> @{{ file.name }} </div>
        </i-col>
    </row>
</div>
<script>
    new Vue({
        el: '#app',
        data: {
            photo : '',
            file : null,
        },
        methods: {
            handleUpload (file) {
                this.file = file;
                return false;
            }
        }
    })
</script>
</body>
</html>
