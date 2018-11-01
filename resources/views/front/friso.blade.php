<!DOCTYPE html><html lang=en><head><meta charset=utf-8><meta http-equiv=X-UA-Compatible content="IE=edge"><meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no"><link rel=icon href=/res/front/friso/favicon.ico><title>friso</title><script>var serverData = cookie2Obj(document.cookie)
    if (!serverData) {
      location.replace('https://api.shanghaichujie.com/friso/answer/index')
    }
    if (serverData.status === 'true') {
      window.page = 'page_finish'
    } else {
      window.page = ''
    }
    window.openid = serverData.openid

    function cookie2Obj (cookie) {
      var objCookie = {}
      var strCookie = cookie
      var arrCookie = strCookie.split("; ")
      for (var i = 0, len = arrCookie.length; i < len; i++) {
        var arr = arrCookie[i].split('=')
        objCookie[arr[0]] = arr[1]
      }
      return objCookie
    }</script><link href=/res/front/friso/css/app.a1cee311.css rel=preload as=style><link href=/res/front/friso/css/chunk-vendors.6e2670d5.css rel=preload as=style><link href=/res/front/friso/js/app.021bd7e2.js rel=preload as=script><link href=/res/front/friso/js/chunk-vendors.353e6dac.js rel=preload as=script><link href=/res/front/friso/css/chunk-vendors.6e2670d5.css rel=stylesheet><link href=/res/front/friso/css/app.a1cee311.css rel=stylesheet></head><body><noscript><strong>We're sorry but friso doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id=app></div><script src=/res/front/friso/js/chunk-vendors.353e6dac.js></script><script src=/res/front/friso/js/app.021bd7e2.js></script></body></html>