var App = function (canvas) {
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
  this.currentScene = 'scene1'
  this.scene1 = new THREE.Group()
  this.scene1.name = 'scene1'
  this.scene2 = new THREE.Group()
  this.scene2.name = 'scene2'
  this.scene3 = new THREE.Group()
  this.scene3.name = 'scene3'
  this.scene4 = new THREE.Group()
  this.scene4.name = 'scene4'
  this.dropTimer = null
  this.video1 = document.querySelector('#video1')
  this.video2 = document.querySelector('#video2')
  this.video3 = document.querySelector('#video3')
  this.hotScenePoint = [
    { pos1X: 480, pos1Y: 100, pos1Z: 650, pos2X: 500, pos2Y: 70, pos2Z: 630, name: 'scene1', info: '进入场景二' },
    { pos1X: -180, pos1Y: 100, pos1Z: 800, pos2X: -150, pos2Y: 50, pos2Z: 800, name: 'scene2', info: '进入场景三' },
    { pos1X: -600, pos1Y: 0, pos1Z: 700, pos2X: -600, pos2Y: -50, pos2Z: 750, name: 'scene3', info: '进入场景四' },
    { pos1X: 150, pos1Y: 100, pos1Z: -800, pos2X: 120, pos2Y: 80, pos2Z: -800, name: 'scene4', info: '返回场景一' }
  ],
  this.hotVideoPoint = [
    { x: 680, y: 10, z: 650, name: 'video1'},
    { x: -800, y: 70, z: 300, name: 'video2'},
    { x: -200, y: 350, z: 800, name: 'video3'},
  ]
}

App.prototype = {
  constructor: App,
  initGL: function () {
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
    this.camera.position.set(0, 999, 1);
    this.lookAtPos.set(0, 100, 0)
    // this.camera = new THREE.PerspectiveCamera(65, window.innerWidth / window.innerHeight, 0.1, 10000);
    // this.camera.position.set(0, 100, -1);
    // this.lookAtPos.set(0, 100, 0)
    // this.enableControl()

    // light
    var ambientLight = new THREE.AmbientLight(0xffffff);
    this.scene.add(ambientLight);

    // event
    document.addEventListener('click', this.myClick.bind(this))
    document.addEventListener('touchend', this.myClick.bind(this))

    // helper
    // var helper = new THREE.GridHelper(5000, 100);
    // this.scene.add(new THREE.AxisHelper(10000))
    // this.scene.add(helper);
  },
  render: function () {
    TWEEN.update()

    this.camera.lookAt(this.lookAtPos)
    this.camera.updateProjectionMatrix()

    if (this.control) {
      this.control.target = this.lookAtPos
      this.control.update();
    }

    if(this.arrowAnimation.length === 4) {
      var delta = this.clock.getDelta()
      this.arrowAnimation[0].update(2000 * delta)
      this.arrowAnimation[1].update(2000 * delta)
      this.arrowAnimation[2].update(2000 * delta)
      this.arrowAnimation[3].update(2000 * delta)
    }

    this.renderer.render(this.scene, this.camera)
    requestAnimationFrame(this.render.bind(this))
  },
  initContent: function () {
    var _this = this
    this.loadScene1()
    this.loadScene2()
    this.loadScene3()
    this.loadScene4()

    var texture = new THREE.TextureLoader().load('imgs/1.jpg', function () {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene.add(mesh)

      //drop
      setTimeout(function () {
        new TWEEN.Tween(_this.camera.position)
          .to({ x: 0, y: 100, z: 500 }, 2000)
          .start().onComplete(function () {
            _this.enableControl()
          })
        new TWEEN.Tween(_this.lookAtPos)
          .to({ x: 0, y: 100, z: 0 }, 2000)
          .start().onComplete(function () {
            _this.scene.remove(mesh)
            _this.scene.add(_this.scene1)
          })
        clearInterval(_this.dropTimer);
        _this.dropTimer = setInterval(function () {
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
  loadScene1: function () {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/1.jpg', function () {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene1.add(mesh)
      var hot = _this.createHotScenePoint.call(_this, _this.hotScenePoint[0])
      _this.scene1.add(hot.hotFont)
      _this.scene1.add(hot.hotImg)
    })
  },
  loadScene2: function () {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/2.jpg', function () {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene2.add(mesh)
      // 切换场景按钮
      var hot = _this.createHotScenePoint.call(_this, _this.hotScenePoint[1])
      _this.scene2.add(hot.hotFont)
      _this.scene2.add(hot.hotImg)
      // // 视频按钮
      var hotVideo1 = _this.createHotVideoPoint.call(_this, _this.hotVideoPoint[0])
      var hotVideo2 = _this.createHotVideoPoint.call(_this, _this.hotVideoPoint[1])
      var hotVideo3 = _this.createHotVideoPoint.call(_this, _this.hotVideoPoint[2])
      _this.scene2.add(hotVideo1)
      _this.scene2.add(hotVideo2)
      _this.scene2.add(hotVideo3)
    })
  },
  loadScene3: function () {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/3.jpg', function () {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene3.add(mesh)
      var hot = _this.createHotScenePoint.call(_this, _this.hotScenePoint[2])
      _this.scene3.add(hot.hotFont)
      _this.scene3.add(hot.hotImg)
    })
  },
  loadScene4: function () {
    var _this = this
    var texture = new THREE.TextureLoader().load('imgs/4.jpg', function () {
      var geometry = new THREE.SphereGeometry(1000, 100, 100)
      var material = new THREE.MeshLambertMaterial({ map: texture, side: THREE.DoubleSide })
      var mesh = new THREE.Mesh(geometry, material)
      _this.scene4.add(mesh)
      var hot = _this.createHotScenePoint.call(_this, _this.hotScenePoint[3])
      _this.scene4.add(hot.hotFont)
      _this.scene4.add(hot.hotImg)
    })
  },
  createHotScenePoint(hotPoint) {
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
    hotImg.scale.set(100, 100, 1)
    hotImg.name = hotPoint.name
    return {
      hotFont: hotFont,
      hotImg: hotImg
    }
  },
  createHotVideoPoint(hotPoint) {
    var textureLoader = new THREE.TextureLoader()
    var map = textureLoader.load('imgs/icon.png')
    var material = new THREE.SpriteMaterial({
        map: map
    });

    var hotVideo = new THREE.Sprite(material)
    hotVideo.position.set(hotPoint.x,hotPoint.y,hotPoint.z)
    var scale = 120
    var Increasing_state = true
    var timer = setInterval(function(){
        if(Increasing_state){
            scale++;
            if(scale >= 120){
                Increasing_state = false;
            }
        }else{
            scale--;
            if(scale <= 100){
                Increasing_state = true;
            }
        }
        hotVideo.scale.set(scale,scale,1);
    },30)
    hotVideo.name = hotPoint.name;
    return hotVideo
  },
  enableControl: function () {
    this.control = new THREE.OrbitControls(this.camera)
    //是否自动旋转
    this.control.autoRotate = false
    //设置相机距离原点的最远距离 
    this.control.minDistance = 100
    //设置相机距离原点的最远距离 
    this.control.maxDistance = 1000
    //最大仰视角和俯视角
    this.control.minPolarAngle = Math.PI * 0.3
    this.control.maxPolarAngle = Math.PI
  },
  myClick: function (event) {
    var mouse = new THREE.Vector2();
    if (event.changedTouches) {
      mouse.x = (event.changedTouches[0].clientX / window.innerWidth) * 2 - 1;
      mouse.y = - (event.changedTouches[0].clientY / window.innerHeight) * 2 + 1;
    } else {
      mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
      mouse.y = - (event.clientY / window.innerHeight) * 2 + 1;
    }
    this.raycaster.setFromCamera(mouse, this.camera)
    
    // 场景一
    this.scene1_intersects = this.raycaster.intersectObjects(this.scene1.children)
    if (this.currentScene === 'scene1') {
      if (this.scene1_intersects.length > 0 && this.scene1_intersects[0].object.name == 'scene1') {
        this.scene.remove(this.scene1)
        this.scene.add(this.scene2)
        this.currentScene = 'scene2'
      }
    } 
    // 场景二
    this.scene2_intersects = this.raycaster.intersectObjects(this.scene2.children)
    if (this.currentScene === 'scene2') {
      if (this.scene2_intersects.length > 0) {
        if (this.scene2_intersects[0].object.name == 'scene2') {
          this.scene.remove(this.scene2)
          this.scene.add(this.scene3)
          this.currentScene = 'scene3'
        }
        if (this.scene2_intersects[0].object.name == 'video1') {
          this.video1.play()
        }
        if (this.scene2_intersects[0].object.name == 'video2') {
          this.video2.play()
        }
        if (this.scene2_intersects[0].object.name == 'video3') {
          this.video3.play()
        }
      }
    }
    // 场景三
    this.scene3_intersects = this.raycaster.intersectObjects(this.scene3.children)
    if (this.currentScene === 'scene3') {
      if (this.scene3_intersects.length > 0 && this.scene3_intersects[0].object.name == 'scene3') {
        this.scene.remove(this.scene3)
        this.scene.add(this.scene4)
        this.currentScene = 'scene4'
      }
    }
    // 场景四
    this.scene4_intersects = this.raycaster.intersectObjects(this.scene4.children)
    if (this.currentScene === 'scene4') {
      if (this.scene4_intersects.length > 0 && this.scene4_intersects[0].object.name == 'scene4') {
        this.scene.remove(this.scene4)
        this.scene.add(this.scene1)
        this.currentScene = 'scene1'
      }
    }
  },
  _makeTextSprite: function (message, parameters) {
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
    sprite.scale.set(200, 100, 1);
    return sprite;
  },
  _roundRect: function (ctx, x, y, w, h, r) {
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

function TextureAnimator(texture, tilesHoriz, tilesVert, numTiles, tileDispDuration) {
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
TextureAnimator.prototype ={
  constructor: TextureAnimator,
  update: function (milliSec) {
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