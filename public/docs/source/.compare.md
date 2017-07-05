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
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://api.dev/docs/collection.json)
<!-- END_INFO -->

#微信运动小程序接口

微信运动小程序接口API文档
<!-- START_6d6e66eb819571cd6b9d61a5318a8cec -->
## api/mini/index

> Example request:

```bash
curl -X GET "http://api.dev/api/mini/index" \
-H "Accept: application/json" \
    -d "code"="sit" \
    -d "encrypted_user"="sit" \
    -d "iv"="sit" \
    -d "encrypted_run"="sit" \
    -d "run_iv"="sit" \
    -d "share_openid"="sit" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.dev/api/mini/index",
    "method": "GET",
    "data": {
        "code": "sit",
        "encrypted_user": "sit",
        "iv": "sit",
        "encrypted_run": "sit",
        "run_iv": "sit",
        "share_openid": "sit"
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
`GET api/mini/index`

`HEAD api/mini/index`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    code | string |  required  | 
    encrypted_user | string |  required  | 
    iv | string |  required  | 
    encrypted_run | string |  required  | 
    run_iv | string |  required  | 
    share_openid | string |  required  | 

<!-- END_6d6e66eb819571cd6b9d61a5318a8cec -->

<!-- START_dc47d78648455fed5aff35e1d843865a -->
## 微信运动群间PK接口

> Example request:

```bash
curl -X GET "http://api.dev/api/mini/groups" \
-H "Accept: application/json" \
    -d "openid"="dolore" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.dev/api/mini/groups",
    "method": "GET",
    "data": {
        "openid": "dolore"
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

