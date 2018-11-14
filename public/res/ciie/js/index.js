var App = function(canvas) {
  this.canvas = canvas
  this.renderer = null
  this.scene = null
  this.camera = null
  this.control = null
  this.arrowAnimation = []
  this.clock = new THREE.Clock()
  this.raycaster = new THREE.Raycaster()
  this.intersects = null
  this.lookAtPos = new THREE.Vector3()
  // scene_group
  this.currentScene = 'scene0'
  this.scene0 = new THREE.Group()
  this.scene0.name = 'scene0'
  this.scene1 = new THREE.Group()
  this.scene1.name = 'scene1'
  this.scene2 = new THREE.Group()
  this.scene2.name = 'scene2'
  this.scene3 = new THREE.Group()
  this.scene3.name = 'scene3'
  this.scene4 = new THREE.Group()
  this.scene4.name = 'scene4'
  this.scene5 = new THREE.Group()
  this.scene5.name = 'scene5'
  this.scene6 = new THREE.Group()
  this.scene6.name = 'scene6'
  this.scene7 = new THREE.Group()
  this.scene7.name = 'scene7'
  this.dropTimer = null
  this.scene3Video = document.querySelector('#scene3Video')
  this.scene5Video = document.querySelector('#scene5Video')
  this.popup = document.querySelector('.popup')

  this.hotScene0Point = [
    { pos1X: 700, pos1Y: 200, pos1Z: 500, pos2X: 700, pos2Y: 150, pos2Z: 480, name: 'goScene1', info: '进入场景一' },
  ]
  this.hotScene1Point = [
    { pos1X: -800, pos1Y: 200, pos1Z: -100, pos2X: -700, pos2Y: 150, pos2Z: -80, name: 'goScene2', info: '进入场景二' },
    { pos1X: -8, pos1Y: 300, pos1Z: 600, pos2X: 20, pos2Y: 250, pos2Z: 600, name: 'goScene3', info: '进入场景三' },
    { pos1X: -800, pos1Y: 200, pos1Z: 300, pos2X: -800, pos2Y: 160, pos2Z: 350, name: 'goScene4', info: '进入场景四' }
  ]
  this.hotScene2Point = [
    { pos1X: 800, pos1Y: 200, pos1Z: 100, pos2X: 800, pos2Y: 140, pos2Z: 70, name: 'goScene1', info: '进入场景一' },
    { pos1X: 700, pos1Y: 200, pos1Z: 500, pos2X: 700, pos2Y: 140, pos2Z: 460, name: 'goScene4', info: '进入场景四' },
    { pos1X: -300, pos1Y: 200, pos1Z: 800, pos2X: -280, pos2Y: 160, pos2Z: 800, name: 'goScene5', info: '进入场景五' }
  ]
  this.hotScene3Point = [
    { pos1X: 800, pos1Y: 200, pos1Z: 300, pos2X: 800, pos2Y: 140, pos2Z: 270, name: 'goScene1', info: '进入场景一' },
    { pos1X: -500, pos1Y: 100, pos1Z: -750, pos2X: -500, pos2Y: 50, pos2Z: -720, name: 'goScene6', info: '进入场景六' }
  ]
  this.hotScene4Point = [
    { pos1X: -500, pos1Y: 200, pos1Z: -700, pos2X: -530, pos2Y: 160, pos2Z: -700, name: 'goScene1', info: '进入场景一' },
    { pos1X: 200, pos1Y: 220, pos1Z: -700, pos2X: 180, pos2Y: 180, pos2Z: -700, name: 'goScene2', info: '进入场景二' },
    { pos1X: 180, pos1Y: 300, pos1Z: 800, pos2X: 200, pos2Y: 250, pos2Z: 800, name: 'goScene6', info: '进入场景六' }
  ]
  this.hotScene5Point = [
    { pos1X: 200, pos1Y: 200, pos1Z: -700, pos2X: 170, pos2Y: 140, pos2Z: -700, name: 'goScene2', info: '进入场景二' },
    { pos1X: 200, pos1Y: 200, pos1Z: 700, pos2X: 230, pos2Y: 140, pos2Z: 700, name: 'goScene6', info: '进入场景六' }
  ]
  this.hotScene6Point = [
    { pos1X: -500, pos1Y: 100, pos1Z: 600, pos2X: -500, pos2Y: 50, pos2Z: 650, name: 'goScene4', info: '进入场景四' },
    { pos1X: 550, pos1Y: 100, pos1Z: -700, pos2X: 510, pos2Y: 50, pos2Z: -700, name: 'goScene7', info: '进入场景七' }
  ]
  this.hotScene7Point = [
    { pos1X: 180, pos1Y: 200, pos1Z: -800, pos2X: 160, pos2Y: 150, pos2Z: -800, name: 'goScene6', info: '进入场景六' },
    { pos1X: -600, pos1Y: 100, pos1Z: -600, pos2X: -650, pos2Y: 70, pos2Z: -600, name: 'goScene2', info: '进入场景二' },
    { pos1X: 800, pos1Y: 100, pos1Z: -300, pos2X: 750, pos2Y: 80, pos2Z: -330, name: 'goScene1', info: '进入场景一' }
  ]
  this.hotVideoPoint = [
    { x: -200, y: 100, z: 600, name: 'scene3Video' },
    { x: -700, y: 500, z: -200, name: 'scene5Video' }
  ]
}

App.prototype = {
  constructor: App,
  initGL: function() {
    // renderer
    this.renderer = new THREE.WebGLRenderer({
      canvas: this.canvas,
      antialias: true,
      autoClear: true
    });
    this.renderer.setSize(window.innerWidth, window.innerHeight);
    this.renderer.setClearColor(0x050505);

    // scene
    this.scene = new THREE.Scene();

    // camera
    this.camera = new THREE.PerspectiveCamera(140, window.innerWidth / window.innerHeight, 0.1, 10000);
    this.camera.position.set(-1, 999, -1)
    this.lookAtPos.set(0, 100, 0)

    // this.camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 0.1, 10000);
    // this.camera.position.set(-300, 100, -300);
    // this.lookAtPos.set(0, 100, 0)
    // this.enableControl()

    // light
    var ambientLight = new THREE.AmbientLight(0xffffff);
    this.scene.add(ambientLight);

    // event
    // document.addEventListener('click', this.myClick.bind(this))
    document.addEventListener('touchend', this.myClick.bind(this))

    // helper
    // var helper = new THREE.GridHelper(5000, 100);
    // this.scene.add(new THREE.AxisHelper(10000))
    // this.scene.add(helper);
  },
  render: function() {
    TWEEN.update()

    this.camera.lookAt(this.lookAtPos)
    this.camera.updateProjectionMatrix()

    if (this.control) {
      this.control.target = this.lookAtPos
      this.control.update();
    }

    if (this.arrowAnimation.length === 4) {
      var delta = this.clock.getDelta()
      this.arrowAnimation[0].update(2000 * delta)
      this.arrowAnimation[1].update(2000 * delta)
      this.arrowAnimation[2].update(2000 * delta)
      this.arrowAnimation[3].update(2000 * delta)
    }

    this.renderer.render(this.scene, this.camera)
    requestAnimationFrame(this.render.bind(this))
  },
  initContent: function() {
    var _this = this
    this.loadScene0()
    this.loadScene1()
    this.loadScene2()
    this.loadScene3()
    this.loadScene4()
    this.loadScene5()
    this.loadScene6()
    this.loadScene7()

    // this.scene.add(this.scene0)

    var texture = new THREE.TextureLoader().load('imgs/0.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.BackSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene.add(mesh)

      //drop
      setTimeout(function() {
        new TWEEN.Tween(_this.camera.position)
          .to({ x: -300, y: 100, z: -300 }, 2000)
          .start().onComplete(function() {
            _this.enableControl()
          })
        new TWEEN.Tween(_this.lookAtPos)
          .to({ x: 0, y: 200, z: 0 }, 2000)
          .start().onComplete(function() {
            _this.scene.remove(mesh)
            _this.scene.add(_this.scene0)
          })
        clearInterval(_this.dropTimer);
        _this.dropTimer = setInterval(function() {
          _this.camera.fov -= 1
          _this.camera.updateProjectionMatrix()
          if (_this.camera.fov <= 65) {
            _this.camera.fov = 65
            _this.camera.updateProjectionMatrix()
            clearInterval(_this.dropTimer);
          }
        }, 1)
      }, 1000);
    })
  },
  loadScene0: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/0.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene0.add(mesh)
      // 场景一热点
      var hot1 = _this.createHotScenePoint.call(_this, _this.hotScene0Point[0])
      _this.scene0.add(hot1.hotFont)
      _this.scene0.add(hot1.hotImg)
    })
  },
  loadScene1: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/1.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene1.add(mesh)
      // 场景二热点
      var hot2 = _this.createHotScenePoint.call(_this, _this.hotScene1Point[0])
      _this.scene1.add(hot2.hotFont)
      _this.scene1.add(hot2.hotImg)
      // 场景三热点
      var hot3 = _this.createHotScenePoint.call(_this, _this.hotScene1Point[1])
      _this.scene1.add(hot3.hotFont)
      _this.scene1.add(hot3.hotImg)
      // 场景四热点
      var hot4 = _this.createHotScenePoint.call(_this, _this.hotScene1Point[2])
      _this.scene1.add(hot4.hotFont)
      _this.scene1.add(hot4.hotImg)
    })
  },
  loadScene2: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/2.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene2.add(mesh)
      // 场景一热点
      var hot1 = _this.createHotScenePoint.call(_this, _this.hotScene2Point[0])
      _this.scene2.add(hot1.hotFont)
      _this.scene2.add(hot1.hotImg)
      // 场景四热点
      var hot4 = _this.createHotScenePoint.call(_this, _this.hotScene2Point[1])
      _this.scene2.add(hot4.hotFont)
      _this.scene2.add(hot4.hotImg)
      // 场景五热点
      var hot5 = _this.createHotScenePoint.call(_this, _this.hotScene2Point[2])
      _this.scene2.add(hot5.hotFont)
      _this.scene2.add(hot5.hotImg)
    })
  },
  loadScene3: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/3.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene3.add(mesh)
      // 场景一热点
      var hot1 = _this.createHotScenePoint.call(_this, _this.hotScene3Point[0])
      _this.scene3.add(hot1.hotFont)
      _this.scene3.add(hot1.hotImg)
      // 场景六热点
      var hot6 = _this.createHotScenePoint.call(_this, _this.hotScene3Point[1])
      _this.scene3.add(hot6.hotFont)
      _this.scene3.add(hot6.hotImg)
      // 场地三视频
      var hotVideo = _this.createHotVideoPoint.call(_this, _this.hotVideoPoint[0])
      _this.scene3.add(hotVideo)
      // 监听视频状态
      this.scene3Video.addEventListener('pause', function() {
        _this.popup.style.display = 'none'
        _this.control.enabled = true
      })
    })
  },
  loadScene4: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/4.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene4.add(mesh)
      // 场景一热点
      var hot1 = _this.createHotScenePoint.call(_this, _this.hotScene4Point[0])
      _this.scene4.add(hot1.hotFont)
      _this.scene4.add(hot1.hotImg)
      // 场景二热点
      var hot2 = _this.createHotScenePoint.call(_this, _this.hotScene4Point[1])
      _this.scene4.add(hot2.hotFont)
      _this.scene4.add(hot2.hotImg)
      // 场景六热点
      var hot6 = _this.createHotScenePoint.call(_this, _this.hotScene4Point[2])
      _this.scene4.add(hot6.hotFont)
      _this.scene4.add(hot6.hotImg)

    })
  },
  loadScene5: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/5.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene5.add(mesh)
      // 场景二热点
      var hot2 = _this.createHotScenePoint.call(_this, _this.hotScene5Point[0])
      _this.scene5.add(hot2.hotFont)
      _this.scene5.add(hot2.hotImg)
      // 场景六热点
      var hot6 = _this.createHotScenePoint.call(_this, _this.hotScene5Point[1])
      _this.scene5.add(hot6.hotFont)
      _this.scene5.add(hot6.hotImg)
      // 场地五视频
      var hotVideo = _this.createHotVideoPoint.call(_this, _this.hotVideoPoint[1])
      _this.scene5.add(hotVideo)
      // 监听视频状态
      this.scene5Video.addEventListener('pause', function() {
        _this.popup.style.display = 'none'
        _this.control.enabled = true
      })
    })
  },
  loadScene6: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/6.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene6.add(mesh)
      // 场景四热点
      var hot4 = _this.createHotScenePoint.call(_this, _this.hotScene6Point[0])
      _this.scene6.add(hot4.hotFont)
      _this.scene6.add(hot4.hotImg)
      // 场景七热点
      var hot7 = _this.createHotScenePoint.call(_this, _this.hotScene6Point[1])
      _this.scene6.add(hot7.hotFont)
      _this.scene6.add(hot7.hotImg)
    })
  },
  loadScene7: function() {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/7.jpg', function() {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene7.add(mesh)
      // 场景六热点
      var hot6 = _this.createHotScenePoint.call(_this, _this.hotScene7Point[0])
      _this.scene7.add(hot6.hotFont)
      _this.scene7.add(hot6.hotImg)
      // 场景二热点
      var hot2 = _this.createHotScenePoint.call(_this, _this.hotScene7Point[1])
      _this.scene7.add(hot2.hotFont)
      _this.scene7.add(hot2.hotImg)
      // 场景一热点
      var hot1 = _this.createHotScenePoint.call(_this, _this.hotScene7Point[2])
      _this.scene7.add(hot1.hotFont)
      _this.scene7.add(hot1.hotImg)
    })
  },
  createHotScenePoint (hotPoint) {
    var hotFont = this._makeTextSprite(
      hotPoint.info,
      {
        color: 'rgba(255,255,255,1)',
        fontSize: 50,
        borderColor: 'rgba(100,100,100,0.8)',
        backgroundColor: 'rgba(150,150,150,0.5)'

      }
    );
    hotFont.position.set(hotPoint.pos1X, hotPoint.pos1Y, hotPoint.pos1Z)
    hotFont.name = hotPoint.name
    //hotImg
    var textureLoader = new THREE.TextureLoader();
    var map = textureLoader.load("imgs/spot14.png");
    var material = new THREE.SpriteMaterial({
      map: map,
      color: 0xffffff,
      fog: true
    });
    var annie = new TextureAnimator(map, 1, 25, 25, 75)
    // this.annie = new TextureAnimator(map, 1, 25, 25, 75)
    this.arrowAnimation.push(annie)
    // console.log(this.arrowAnimation)
    // this.arrowAnimation = new TextureAnimator(map, 1, 25, 25, 75)
    var hotImg = new THREE.Sprite(material)
    hotImg.position.set(hotPoint.pos2X, hotPoint.pos2Y, hotPoint.pos2Z)
    hotImg.scale.set(150, 150, 1)
    hotImg.name = hotPoint.name
    return {
      hotFont: hotFont,
      hotImg: hotImg
    }
  },
  createHotVideoPoint (hotPoint) {
    var textureLoader = new THREE.TextureLoader()
    var map = textureLoader.load('imgs/icon.png')
    var material = new THREE.SpriteMaterial({
      map: map
    });

    var hotVideo = new THREE.Sprite(material)
    hotVideo.position.set(hotPoint.x, hotPoint.y, hotPoint.z)
    var scale = 120
    var Increasing_state = true
    var timer = setInterval(function() {
      if (Increasing_state) {
        scale++;
        if (scale >= 120) {
          Increasing_state = false;
        }
      } else {
        scale--;
        if (scale <= 100) {
          Increasing_state = true;
        }
      }
      hotVideo.scale.set(scale, scale, 1);
    }, 30)
    hotVideo.name = hotPoint.name;
    return hotVideo
  },
  enableControl: function() {
    this.control = new THREE.OrbitControls(this.camera)
    this.control.enabled = true
    // 反向旋转
    this.control.rotateSpeed = -0.50
    //是否自动旋转
    // this.control.autoRotate = false
    this.control.enableZoom = false
    //最大仰视角和俯视角
    this.control.minPolarAngle = Math.PI * 0.3
    this.control.maxPolarAngle = Math.PI
  },
  myClick: function(event) {
    var mouse = new THREE.Vector2();
    if (event.changedTouches) {
      mouse.x = (event.changedTouches[0].clientX / window.innerWidth) * 2 - 1;
      mouse.y = - (event.changedTouches[0].clientY / window.innerHeight) * 2 + 1;
    } else {
      mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
      mouse.y = - (event.clientY / window.innerHeight) * 2 + 1;
    }
    this.raycaster.setFromCamera(mouse, this.camera)

    // 场景零
    this.scene0_intersects = this.raycaster.intersectObjects(this.scene0.children)
    if (this.currentScene === 'scene0' && this.scene0_intersects.length > 0) {
      // 跳转场景一
      if (this.scene0_intersects[0].object.name === 'goScene1') {
        this.scene.remove(this.scene0)
        this.scene.add(this.scene1)
        this.currentScene = 'scene1'
        this.camera.position.set(-300, 500, -300)
      }
    }

    // 场景一
    this.scene1_intersects = this.raycaster.intersectObjects(this.scene1.children)
    if (this.currentScene === 'scene1' && this.scene1_intersects.length > 0) {
      // 跳转场景二
      if (this.scene1_intersects[0].object.name === 'goScene2') {
        this.scene.remove(this.scene1)
        this.scene.add(this.scene2)
        this.currentScene = 'scene2'
      }
      // 跳转场景三
      if (this.scene1_intersects[0].object.name === 'goScene3') {
        this.scene.remove(this.scene1)
        this.scene.add(this.scene3)
        this.currentScene = 'scene3'
      }
      // 跳转场景四
      if (this.scene1_intersects[0].object.name === 'goScene4') {
        this.scene.remove(this.scene1)
        this.scene.add(this.scene4)
        this.currentScene = 'scene4'
      }
    }

    // 场景二
    this.scene2_intersects = this.raycaster.intersectObjects(this.scene2.children)
    if (this.currentScene === 'scene2' && this.scene2_intersects.length > 0) {
      // 跳转场景一
      if (this.scene2_intersects[0].object.name == 'goScene1') {
        this.scene.remove(this.scene2)
        this.scene.add(this.scene1)
        this.currentScene = 'scene1'
      }
      // 跳转场景四
      if (this.scene2_intersects[0].object.name == 'goScene4') {
        this.scene.remove(this.scene2)
        this.scene.add(this.scene4)
        this.currentScene = 'scene4'
      }
      // 跳转场景五
      if (this.scene2_intersects[0].object.name == 'goScene5') {
        this.scene.remove(this.scene2)
        this.scene.add(this.scene5)
        this.currentScene = 'scene5'
      }
    }

    // 场景三
    this.scene3_intersects = this.raycaster.intersectObjects(this.scene3.children)
    if (this.currentScene === 'scene3' && this.scene3_intersects.length > 0) {
      // 跳转场景一
      if (this.scene3_intersects[0].object.name == 'goScene1') {
        this.scene.remove(this.scene3)
        this.scene.add(this.scene1)
        this.currentScene = 'scene1'
      }
      // 跳转场景六
      if (this.scene3_intersects[0].object.name == 'goScene6') {
        this.scene.remove(this.scene3)
        this.scene.add(this.scene6)
        this.currentScene = 'scene6'
      }
      // 播放视频
      if (this.scene3_intersects[0].object.name == 'scene3Video') {
        this.control.enabled = false
        this.popup.style.display = 'flex'
        this.scene3Video.play()
      }
    }

    // 场景四
    this.scene4_intersects = this.raycaster.intersectObjects(this.scene4.children)
    if (this.currentScene === 'scene4' && this.scene4_intersects.length > 0) {
      // 跳转场景一
      if (this.scene4_intersects[0].object.name == 'goScene1') {
        this.scene.remove(this.scene4)
        this.scene.add(this.scene1)
        this.currentScene = 'scene1'
      }
      // 跳转场景二
      if (this.scene4_intersects[0].object.name == 'goScene2') {
        this.scene.remove(this.scene4)
        this.scene.add(this.scene2)
        this.currentScene = 'scene2'
      }
      // 跳转场景六
      if (this.scene4_intersects[0].object.name == 'goScene6') {
        this.scene.remove(this.scene4)
        this.scene.add(this.scene6)
        this.currentScene = 'scene6'
      }
    }

    // 场景五
    this.scene5_intersects = this.raycaster.intersectObjects(this.scene5.children)
    if (this.currentScene === 'scene5' && this.scene5_intersects.length > 0) {
      // 跳转场景二
      if (this.scene5_intersects[0].object.name == 'goScene2') {
        this.scene.remove(this.scene5)
        this.scene.add(this.scene2)
        this.currentScene = 'scene2'
      }
      // 跳转场景六
      if (this.scene5_intersects[0].object.name == 'goScene6') {
        this.scene.remove(this.scene5)
        this.scene.add(this.scene6)
        this.currentScene = 'scene6'
      }
      // 播放视频
      if (this.scene5_intersects[0].object.name == 'scene5Video') {
        this.control.enabled = true
        this.popup.style.display = 'flex'
        this.scene5Video.play()
      }
    }

    // 场景六
    this.scene6_intersects = this.raycaster.intersectObjects(this.scene6.children)
    if (this.currentScene === 'scene6' && this.scene6_intersects.length > 0) {
      // 跳转场景四
      if (this.scene6_intersects[0].object.name == 'goScene4') {
        this.scene.remove(this.scene6)
        this.scene.add(this.scene4)
        this.currentScene = 'scene4'
      }
      // 跳转场景四
      if (this.scene6_intersects[0].object.name == 'goScene7') {
        this.scene.remove(this.scene6)
        this.scene.add(this.scene7)
        this.currentScene = 'scene7'
      }
    }

    // 场景七
    this.scene7_intersects = this.raycaster.intersectObjects(this.scene7.children)
    if (this.currentScene === 'scene7' && this.scene7_intersects.length > 0) {
      // 跳转场景一
      if (this.scene7_intersects[0].object.name == 'goScene1') {
        this.scene.remove(this.scene7)
        this.scene.add(this.scene1)
        this.currentScene = 'scene1'
      }
      // 跳转场景二
      if (this.scene7_intersects[0].object.name == 'goScene2') {
        this.scene.remove(this.scene7)
        this.scene.add(this.scene2)
        this.currentScene = 'scene2'
      }
      // 跳转场景六
      if (this.scene7_intersects[0].object.name == 'goScene6') {
        this.scene.remove(this.scene7)
        this.scene.add(this.scene6)
        this.currentScene = 'scene6'
      }
    }
  },
  _makeTextSprite: function(message, parameters) {
    if (parameters === undefined) {
      parameters = {};
    }
    var color = parameters.hasOwnProperty('color') ? parameters['color'] : 'rgba(255,255,255,1)';
    var fontFace = parameters.hasOwnProperty('fontFace') ? parameters['fontFace'] : 'Arial';
    var fontSize = parameters.hasOwnProperty('fontSize') ? parameters['fontSize'] : 16;
    var borderThickness = parameters.hasOwnProperty("borderThickness") ? parameters["borderThickness"] : 1;
    var borderColor = parameters.hasOwnProperty('borderColor') ? parameters['borderColor'] : 'rgba(0,0,0,1)';
    var backgroundColor = parameters.hasOwnProperty('backgroundColor') ? parameters['backgroundColor'] : 'rgba(255,255,255,1)';

    var canvas = document.createElement('canvas');
    var context = canvas.getContext('2d');
    context.font = 'Normal ' + fontSize + 'px ' + fontFace;

    var textWidth = context.measureText(message).width;

    //background color
    context.fillStyle = backgroundColor;
    //border color
    context.strokeStyle = borderColor;
    //borderRadius
    context.LineWidth = borderThickness;
    this._roundRect(
      context,
      borderThickness / 2,
      borderThickness / 2,
      textWidth + borderThickness,
      fontSize * 1.4 + borderThickness,
      2
    );

    //text color
    context.fillStyle = color;
    context.fillText(
      message,
      borderThickness,
      fontSize + borderThickness
    );

    var texture = new THREE.Texture(canvas);
    texture.needsUpdate = true;
    var spriteMaterial = new THREE.SpriteMaterial({
      map: texture,
      useScreenCoordinates: false
    });
    var sprite = new THREE.Sprite(spriteMaterial);
    sprite.scale.set(300, 150, 1);
    return sprite;
  },
  _roundRect: function(ctx, x, y, w, h, r) {
    ctx.beginPath();
    ctx.moveTo(x + r, y);
    ctx.lineTo(x + w - r, y);
    ctx.quadraticCurveTo(x + w, y, x + w, y + r);
    ctx.lineTo(x + w, y + h - r);
    ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h);
    ctx.lineTo(x + r, y + h);
    ctx.quadraticCurveTo(x, y + h, x, y + h - r);
    ctx.lineTo(x, y + r);
    ctx.quadraticCurveTo(x, y, x + r, y);
    ctx.closePath();
    ctx.fill();
    ctx.stroke();
  }
}

function TextureAnimator (texture, tilesHoriz, tilesVert, numTiles, tileDispDuration) {
  // note: texture passed by reference, will be updated by the update function.
  this.tilesHorizontal = tilesHoriz
  this.tilesVertical = tilesVert
  this.texture = texture
  // how many images does this spritesheet contain?
  //  usually equals tilesHoriz * tilesVert, but not necessarily,
  //  if there at blank tiles at the bottom of the spritesheet.
  this.numberOfTiles = numTiles
  this.texture.wrapS = this.texture.wrapT = THREE.RepeatWrapping
  this.texture.repeat.set(1 / this.tilesHorizontal, 1 / this.tilesVertical)

  // how long should each image be displayed?
  this.tileDisplayDuration = tileDispDuration

  // how long has the current image been displayed?
  this.currentDisplayTime = 0

  // which image is currently being displayed?
  this.currentTile = 0

  // this.update = function (milliSec) {
  //   this.currentDisplayTime += milliSec;
  //   while (this.currentDisplayTime > this.tileDisplayDuration) {
  //     this.currentDisplayTime -= this.tileDisplayDuration;
  //     this.currentTile--;

  //     var currentColumn = this.currentTile % this.tilesHorizontal;
  //     texture.offset.x = currentColumn / this.tilesHorizontal;
  //     var currentRow = Math.floor(this.currentTile / this.tilesHorizontal);
  //     texture.offset.y = currentRow / this.tilesVertical;
  //     if (this.currentTile == this.numberOfTiles)
  //       this.currentTile = 0;
  //   }
  // }
}
TextureAnimator.prototype = {
  constructor: TextureAnimator,
  update: function(milliSec) {
    this.currentDisplayTime += milliSec;
    while (this.currentDisplayTime > this.tileDisplayDuration) {
      this.currentDisplayTime -= this.tileDisplayDuration;
      this.currentTile--;

      var currentColumn = this.currentTile % this.tilesHorizontal;
      this.texture.offset.x = currentColumn / this.tilesHorizontal;
      var currentRow = Math.floor(this.currentTile / this.tilesHorizontal);
      this.texture.offset.y = currentRow / this.tilesVertical;
      if (this.currentTile == this.numberOfTiles)
        this.currentTile = 0;
    }
  }
}