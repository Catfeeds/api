var adjArr = ['无所不能的','探索技能满格的','大名鼎鼎的','一往无前的','开挂一般的','强无敌的','深藏不露的','拥有主角光环的']
var nArr = ['巡山小钻风', '福尔摩斯第N代传人', '蓝精灵的好伙伴', '黑珍珠号新任船长', '海神波塞冬头号跟班', '第M78号行星观测员', '绝地武士']
var descArr = [
  '大王叫你来巡山，你却穿越海陆空，跑遍了整个地球。真是满满的求知欲和探索心啊，可能在未来某一天，大王的位子就是你的!',
  '你动作如此迅速，思维如此敏锐，已经没有什么能阻挡住你前进的脚步！快老实交代福尔摩斯和你到底是什么关系？',
  '在山的那边海的那边有一群蓝精灵，还有一个同样可爱又充满好奇心的你。你热爱生活，更渴望探索更大的世界!',
  '什么艰难险阻都难不倒你，主角光环真的是满格，杰克船长都要将船长的位子让给你，带领大家远行探索。',
  '不知洞悉海洋，更洞悉世界，不知知识渊博，更是身手敏捷，能成为波塞冬的头号跟班，你是真的厉害。',
  '地球已经装不下你的好奇心了，给你一艘飞船，宇宙可能都已经被你探索了一遍!',
  '你坚忍不拔，克服了沿路的困难与艰险，你充满自信，从容面对每一个挑战，愿原力与你同在，助你一直勇往直前!'
]

var text = {
  adj: '',
  n: '',
  desc: ''
}

function createAdjIndex(){
  return Math.floor(Math.random() * adjArr.length)
}

function createCodeIndex(score) {
  if (score % 900 <= 300) {
    return Math.floor(Math.random() * 2)
  } else if (score % 900 <= 600) {
    return Math.floor(Math.random() * (4-3+1)+3)
  } else if (score % 900 <= 900) {
    return Math.floor(Math.random() * (6-5+1)+5)
  }
}

function createUl(index) {
  let lastpage = document.querySelector('.lastPage')
  let lastpageCenter = document.querySelector('.lastPage .center')
  if (index === 0 || index === 1 || index === 2) {
    lastpage.style.background = "url('./resource/ui/other/forest_bg.jpg') no-repeat"
    lastpage.style.backgroundSize = "100% 100%";
    lastpageCenter.setAttribute('src', './resource/ui/other/forest_center.png')
  }else if (index === 3 || index === 4) {
    lastpage.style.background = "url('./resource/ui/other/sea_bg.jpg') no-repeat"
    lastpage.style.backgroundSize = "100% 100%";
    lastpageCenter.setAttribute('src', './resource/ui/other/sea_center.png')
  } else if (index === 5 || index === 6) {
    lastpage.style.background = "url('./resource/ui/other/space_bg.jpg') no-repeat"
    lastpage.style.backgroundSize = "100% 100%";
    lastpageCenter.setAttribute('src', './resource/ui/other/space_center.png')
  }
}

function updateUrl(url, key) {
  var key = (key || 't') + '=';  //默认是"t"
  let reg = new RegExp(key + '\\d+');  //正则：t=1472286066028
  let timestamp = + new Date();
  if (url.indexOf(key) > -1) { //有时间戳，直接更新
    return url.replace(reg, key + timestamp);
  } else {  //没有时间戳，加上时间戳
    if (url.indexOf('\?') > -1) {
      let urlArr = url.split('\?');
      if (urlArr[1]) {
        return urlArr[0] + '?' + key + timestamp + '&' + urlArr[1];
      } else {
        return urlArr[0] + '?' + key + timestamp;
      }
    } else {
      if (url.indexOf('#') > -1) {
        return url.split('#')[0] + '?' + key + timestamp + location.hash;
      } else {
        return url + '?' + key + timestamp;
      }
    }
  }
}
