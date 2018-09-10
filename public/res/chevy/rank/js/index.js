
changeBtn('btn_index')
$('.btn_index').on('touchend', function(){
  window.location.href = 'https://www.baidu.com'
})

function changeBtn(btn) {
  $('.' + btn).on('touchstart', function(){
    $('.' + btn).css({
      background: "url(images/" + btn + "_press.png) no-repeat",
      backgroundSize: '100% 100%'
    })
  })
  $('.' + btn).on('touchend', function(){
    $(`.${btn}`).css({
      background: "url(images/" + btn + ".png) no-repeat",
      backgroundSize: '100% 100%'
    })
  })
}