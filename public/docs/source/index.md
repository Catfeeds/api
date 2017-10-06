---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# 注意事项

 接口地址为： `http://api.touchworld-sh.com:8000`

<!-- END_INFO -->

#主体
<!-- START_6d6e66eb819571cd6b9d61a5318a8cec -->
## 微信程序初始化接口

> Example request:

```bash
curl -X GET "http://api.touchworld-sh.com:8000/api/mini/index" \
-H "Accept: application/json" \
    -d "code"="quaerat" \
    -d "encrypted_user"="quaerat" \
    -d "iv"="quaerat" \
    -d "encrypted_run"="quaerat" \
    -d "run_iv"="quaerat" \
    -d "share_openid"="quaerat" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.touchworld-sh.com:8000/api/mini/index",
    "method": "GET",
    "data": {
        "code": "quaerat",
        "encrypted_user": "quaerat",
        "iv": "quaerat",
        "encrypted_run": "quaerat",
        "run_iv": "quaerat",
        "share_openid": "quaerat"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    'data' : [
        [
            'openid':'xxxxxxx',
            'nickname': 'xxxx',
            'avatar': 'http://api.touchworld-sh.com:8000/img.jpg'
        ]
    ],
    'user_if'
}
```

### HTTP Request
`GET api/mini/index`

`HEAD api/mini/index`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | string |  required  | 通过wx.login获取，用于兑换sessionKey
    encrypted_user | string |  required  | 通过`wx.getUserInfo`获取，用户加密信息
    iv | string |  required  | 通过 `wx.getUserInfo`获取，用于解密
    encrypted_run | string |  required  | 通过`wx.getWeRunData`获取，微信运动加密数据
    run_iv | string |  required  | 通过`wx.getWeRunData`获取，用于解密
    share_openid | string |  required  | 分享人的`openid`,用于判断所属群，默认为 `test`

**返回参数**:

>数据格式为`json`,但是会被小程序自动转化为`object`

参数名 | 说明
---|---
data | 所属群用户集合，包含 `openid`, `nickname`, `avatar`, `steps`, `praise`
user_openid | 小程序使用者的`openid`,服务端通过 `encrypted_user` 解密出来

<!-- END_6d6e66eb819571cd6b9d61a5318a8cec -->

<!-- START_dc47d78648455fed5aff35e1d843865a -->
## 微信运动群间PK接口

> Example request:

```bash
curl -X GET "http://api.touchworld-sh.com:8000/api/mini/groups" \
-H "Accept: application/json" \
    -d "openid"="sit" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.touchworld-sh.com:8000/api/mini/groups",
    "method": "GET",
    "data": {
        "openid": "sit"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/mini/groups`

`HEAD api/mini/groups`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    openid | string |  required  | 

<!-- END_dc47d78648455fed5aff35e1d843865a -->

<!-- START_7feb2a3705e582d632c5487e12f15058 -->
## 群设置接口

返回群设置信息和用户类型（是否是群主）

> Example request:

```bash
curl -X GET "http://api.touchworld-sh.com:8000/api/mini/setting" \
-H "Accept: application/json" \
    -d "openid"="et" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.touchworld-sh.com:8000/api/mini/setting",
    "method": "GET",
    "data": {
        "openid": "et"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/mini/setting`

`HEAD api/mini/setting`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    openid | string |  required  | 

<!-- END_7feb2a3705e582d632c5487e12f15058 -->

<!-- START_e6a7f09b0f6dc85033e0d6f330a024b9 -->
## 保存群设置接口

> Example request:

```bash
curl -X POST "http://api.touchworld-sh.com:8000/api/mini/setting" \
-H "Accept: application/json" \
    -d "openid"="dolores" \
    -d "gname"="3" \
    -d "avatar"="dolores" \
    -d "step_aim"="97" \
    -d "introduction"="dolores" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.touchworld-sh.com:8000/api/mini/setting",
    "method": "POST",
    "data": {
        "openid": "dolores",
        "gname": 3,
        "avatar": "dolores",
        "step_aim": 97,
        "introduction": "dolores"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/mini/setting`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    openid | string |  required  | 
    gname | string |  required  | Between: `2` and `10`
    avatar | image |  optional  | Must be an image (jpeg, png, bmp, gif, or svg)
    step_aim | numeric |  required  | 
    introduction | string |  optional  | 

<!-- END_e6a7f09b0f6dc85033e0d6f330a024b9 -->

