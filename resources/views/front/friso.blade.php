<!DOCTYPE html><html lang=en><head><meta charset=utf-8><meta http-equiv=X-UA-Compatible content="IE=edge"><meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no"><title>美素佳儿</title><script>var serverData = cookie2Obj(document.cookie)
    if (!serverData.openid) {
      location.replace('https://api.shanghaichujie.com/friso/answer/index')
    } else {
      alert(document.cookie)
      window.openid = serverData.openid
      if (serverData.status === 'true') {
        window.page = 'page_finish'
      } else {
        window.page = ''
      }
    }

    function cookie2Obj (cookie) {
      var objCookie = {}
      var strCookie = cookie
      var arrCookie = strCookie.split("; ")
      for (var i = 0, len = arrCookie.length; i < len; i++) {
        var arr = arrCookie[i].split('=')
        objCookie[arr[0]] = arr[1]
      }
      return objCookie
    }</script><link href=/res/front/friso/css/app.a1cee311.css rel=preload as=style><link href=/res/front/friso/css/chunk-vendors.e3f0641a.css rel=preload as=style><link href=/res/front/friso/js/app.2bb971de.js rel=preload as=script><link href=/res/front/friso/js/chunk-vendors.34610456.js rel=preload as=script><link href=/res/front/friso/css/chunk-vendors.e3f0641a.css rel=stylesheet><link href=/res/front/friso/css/app.a1cee311.css rel=stylesheet></head><body><noscript><strong>We're sorry but friso doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript><div id=app></div><script src=/res/front/friso/js/chunk-vendors.34610456.js></script><script src=/res/front/friso/js/app.2bb971de.js></script></body></html>