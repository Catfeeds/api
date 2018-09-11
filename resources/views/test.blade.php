<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="UTF-8">
    <title></title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

</body>


<script type="application/javascript">
    function ksort(obj){
        let keys = Object.keys(obj).sort()
            , sortedObj = {};

        for(let i in keys) {
            sortedObj[keys[i]] = obj[keys[i]];
        }

        return sortedObj;
    }
    let arr = {
        'app_id': '2108118185',
        'image' : '',
        'cosmetic' : 1,
        'time_stamp' : new Date().getTime(),
        'nonce_str' : Math.round(Math.random()*100000),
        'sign' : '',
    };
    function getSign(obj, appkey) {
        obj = ksort(obj);

        let str = '';

        for (let key in obj) {
            if (obj[key] !== '') {
                str += key + '=' + encodeURI(obj[key]) +'&'
            }
        }
        str += 'app_key=' + appkey;

        str = md5(str).toUpperCase();

        return str;
    }
    arr['sign'] = getSign(arr, 'app_key')
</script>
</html>