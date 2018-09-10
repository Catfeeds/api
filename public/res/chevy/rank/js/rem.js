(function flexible (window, documet) {
  var html = document.documentElement
  //  set 1rem = viewWidth / 10
  function setRemUnit () {
    var htmlWidth = html.clientWidth || document.body.clientWidth || document.body.getBoundingClientRect().width
    htmlWidth = htmlWidth > 750 ? 750 : htmlWidth
    html.style.fontSize = htmlWidth / 10 + 'px'
  }

  setRemUnit()

  //  reset rem unit on page resize
  window.addEventListener('resize', setRemUnit)
}(window, document))

