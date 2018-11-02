var btn_submit = document.querySelector('.submit img')
var dom_taobaoID = document.querySelector('.taobaoID')
var dom_username = document.querySelector('.username')
var dom_phone = document.querySelector('.phone')
var dom_gender = document.querySelector('.gender')
var dom_popup = document.querySelector('.popup')

btn_submit.onclick = function () {
  var taobaoID = dom_taobaoID.value
  var username = dom_username.value
  var phone = dom_phone.value
  var gender = dom_gender.value
  console.log(taobaoID, username, phone, gender)

  if (taobaoID === '') {
    alert('淘宝ID不能为空')
  } else if (username === '') {
    alert('姓名不能为空')
  } else if (phone === '') {
    alert('电话不能为空')
  } else if (!validatePhone(phone)){
    alert('手机号格式错误')
  }else if (gender === '') {
    alert('性别不能为空')
  }  else {
    // ajax
    store(taobaoID, username, phone, gender)
  }
}


// 手机号验证
function validatePhone (val) {
  let reg = /^1\d{10}$/
  if (reg.test(val)) {
    return true
  } else {
    return false
  }
}