window.skins={};
                function __extends(d, b) {
                    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
                        function __() {
                            this.constructor = d;
                        }
                    __.prototype = b.prototype;
                    d.prototype = new __();
                };
                window.generateEUI = {};
                generateEUI.paths = {};
                generateEUI.styles = undefined;
                generateEUI.skins = {"eui.Button":"resource/eui_skins/ButtonSkin.exml","eui.CheckBox":"resource/eui_skins/CheckBoxSkin.exml","eui.HScrollBar":"resource/eui_skins/HScrollBarSkin.exml","eui.HSlider":"resource/eui_skins/HSliderSkin.exml","eui.Panel":"resource/eui_skins/PanelSkin.exml","eui.TextInput":"resource/eui_skins/TextInputSkin.exml","eui.ProgressBar":"resource/eui_skins/ProgressBarSkin.exml","eui.RadioButton":"resource/eui_skins/RadioButtonSkin.exml","eui.Scroller":"resource/eui_skins/ScrollerSkin.exml","eui.ToggleSwitch":"resource/eui_skins/ToggleSwitchSkin.exml","eui.VScrollBar":"resource/eui_skins/VScrollBarSkin.exml","eui.VSlider":"resource/eui_skins/VSliderSkin.exml","eui.ItemRenderer":"resource/eui_skins/ItemRendererSkin.exml","PlayerTs":"resource/eui_skins/PlayerTs.exml","HomeView":"resource/eui_skins/Views/HomeView.exml","PrepareView":"resource/eui_skins/Views/PrepareView.exml","GameScence":"resource/Views/GameScence.exml","TiaoBanComponent":"resource/Views/TiaoBanComponent.exml","GameOverView":"resource/eui_skins/Views/GameOverView.exml","Baby":"resource/eui_skins/Views/Baby.exml","GuanJia":"resource/eui_skins/Views/GuanJia.exml"};generateEUI.paths['resource/eui_skins/ButtonSkin.exml'] = window.skins.ButtonSkin = (function (_super) {
	__extends(ButtonSkin, _super);
	function ButtonSkin() {
		_super.call(this);
		this.skinParts = ["labelDisplay","iconDisplay"];
		
		this.minHeight = 50;
		this.minWidth = 100;
		this.elementsContent = [this._Image1_i(),this.labelDisplay_i(),this.iconDisplay_i()];
		this.states = [
			new eui.State ("up",
				[
				])
			,
			new eui.State ("down",
				[
					new eui.SetProperty("_Image1","source","button_down_png")
				])
			,
			new eui.State ("disabled",
				[
					new eui.SetProperty("_Image1","alpha",0.5)
				])
		];
	}
	var _proto = ButtonSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		this._Image1 = t;
		t.percentHeight = 100;
		t.scale9Grid = new egret.Rectangle(1,3,8,8);
		t.source = "button_up_png";
		t.percentWidth = 100;
		return t;
	};
	_proto.labelDisplay_i = function () {
		var t = new eui.Label();
		this.labelDisplay = t;
		t.bottom = 8;
		t.left = 8;
		t.right = 8;
		t.size = 20;
		t.textAlign = "center";
		t.textColor = 0xFFFFFF;
		t.top = 8;
		t.verticalAlign = "middle";
		return t;
	};
	_proto.iconDisplay_i = function () {
		var t = new eui.Image();
		this.iconDisplay = t;
		t.horizontalCenter = 0;
		t.verticalCenter = 0;
		return t;
	};
	return ButtonSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/CheckBoxSkin.exml'] = window.skins.CheckBoxSkin = (function (_super) {
	__extends(CheckBoxSkin, _super);
	function CheckBoxSkin() {
		_super.call(this);
		this.skinParts = ["labelDisplay"];
		
		this.elementsContent = [this._Group1_i()];
		this.states = [
			new eui.State ("up",
				[
				])
			,
			new eui.State ("down",
				[
					new eui.SetProperty("_Image1","alpha",0.7)
				])
			,
			new eui.State ("disabled",
				[
					new eui.SetProperty("_Image1","alpha",0.5)
				])
			,
			new eui.State ("upAndSelected",
				[
					new eui.SetProperty("_Image1","source","checkbox_select_up_png")
				])
			,
			new eui.State ("downAndSelected",
				[
					new eui.SetProperty("_Image1","source","checkbox_select_down_png")
				])
			,
			new eui.State ("disabledAndSelected",
				[
					new eui.SetProperty("_Image1","source","checkbox_select_disabled_png")
				])
		];
	}
	var _proto = CheckBoxSkin.prototype;

	_proto._Group1_i = function () {
		var t = new eui.Group();
		t.percentHeight = 100;
		t.percentWidth = 100;
		t.layout = this._HorizontalLayout1_i();
		t.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
		return t;
	};
	_proto._HorizontalLayout1_i = function () {
		var t = new eui.HorizontalLayout();
		t.verticalAlign = "middle";
		return t;
	};
	_proto._Image1_i = function () {
		var t = new eui.Image();
		this._Image1 = t;
		t.alpha = 1;
		t.fillMode = "scale";
		t.source = "checkbox_unselect_png";
		return t;
	};
	_proto.labelDisplay_i = function () {
		var t = new eui.Label();
		this.labelDisplay = t;
		t.fontFamily = "Tahoma";
		t.size = 20;
		t.textAlign = "center";
		t.textColor = 0x707070;
		t.verticalAlign = "middle";
		return t;
	};
	return CheckBoxSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/HScrollBarSkin.exml'] = window.skins.HScrollBarSkin = (function (_super) {
	__extends(HScrollBarSkin, _super);
	function HScrollBarSkin() {
		_super.call(this);
		this.skinParts = ["thumb"];
		
		this.minHeight = 8;
		this.minWidth = 20;
		this.elementsContent = [this.thumb_i()];
	}
	var _proto = HScrollBarSkin.prototype;

	_proto.thumb_i = function () {
		var t = new eui.Image();
		this.thumb = t;
		t.height = 8;
		t.scale9Grid = new egret.Rectangle(3,3,2,2);
		t.source = "roundthumb_png";
		t.verticalCenter = 0;
		t.width = 30;
		return t;
	};
	return HScrollBarSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/HSliderSkin.exml'] = window.skins.HSliderSkin = (function (_super) {
	__extends(HSliderSkin, _super);
	function HSliderSkin() {
		_super.call(this);
		this.skinParts = ["track","thumb"];
		
		this.minHeight = 8;
		this.minWidth = 20;
		this.elementsContent = [this.track_i(),this.thumb_i()];
	}
	var _proto = HSliderSkin.prototype;

	_proto.track_i = function () {
		var t = new eui.Image();
		this.track = t;
		t.height = 6;
		t.scale9Grid = new egret.Rectangle(1,1,4,4);
		t.source = "track_sb_png";
		t.verticalCenter = 0;
		t.percentWidth = 100;
		return t;
	};
	_proto.thumb_i = function () {
		var t = new eui.Image();
		this.thumb = t;
		t.source = "thumb_png";
		t.verticalCenter = 0;
		return t;
	};
	return HSliderSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/ItemRendererSkin.exml'] = window.skins.ItemRendererSkin = (function (_super) {
	__extends(ItemRendererSkin, _super);
	function ItemRendererSkin() {
		_super.call(this);
		this.skinParts = ["labelDisplay"];
		
		this.minHeight = 50;
		this.minWidth = 100;
		this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
		this.states = [
			new eui.State ("up",
				[
				])
			,
			new eui.State ("down",
				[
					new eui.SetProperty("_Image1","source","button_down_png")
				])
			,
			new eui.State ("disabled",
				[
					new eui.SetProperty("_Image1","alpha",0.5)
				])
		];
		
		eui.Binding.$bindProperties(this, ["hostComponent.data"],[0],this.labelDisplay,"text");
	}
	var _proto = ItemRendererSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		this._Image1 = t;
		t.percentHeight = 100;
		t.scale9Grid = new egret.Rectangle(1,3,8,8);
		t.source = "button_up_png";
		t.percentWidth = 100;
		return t;
	};
	_proto.labelDisplay_i = function () {
		var t = new eui.Label();
		this.labelDisplay = t;
		t.bottom = 8;
		t.fontFamily = "Tahoma";
		t.left = 8;
		t.right = 8;
		t.size = 20;
		t.textAlign = "center";
		t.textColor = 0xFFFFFF;
		t.top = 8;
		t.verticalAlign = "middle";
		return t;
	};
	return ItemRendererSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/PanelSkin.exml'] = window.skins.PanelSkin = (function (_super) {
	__extends(PanelSkin, _super);
	function PanelSkin() {
		_super.call(this);
		this.skinParts = ["titleDisplay","moveArea","closeButton"];
		
		this.minHeight = 230;
		this.minWidth = 450;
		this.elementsContent = [this._Image1_i(),this.moveArea_i(),this.closeButton_i()];
	}
	var _proto = PanelSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.scale9Grid = new egret.Rectangle(2,2,12,12);
		t.source = "border_png";
		t.top = 0;
		return t;
	};
	_proto.moveArea_i = function () {
		var t = new eui.Group();
		this.moveArea = t;
		t.height = 45;
		t.left = 0;
		t.right = 0;
		t.top = 0;
		t.elementsContent = [this._Image2_i(),this.titleDisplay_i()];
		return t;
	};
	_proto._Image2_i = function () {
		var t = new eui.Image();
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.source = "header_png";
		t.top = 0;
		return t;
	};
	_proto.titleDisplay_i = function () {
		var t = new eui.Label();
		this.titleDisplay = t;
		t.fontFamily = "Tahoma";
		t.left = 15;
		t.right = 5;
		t.size = 20;
		t.textColor = 0xFFFFFF;
		t.verticalCenter = 0;
		t.wordWrap = false;
		return t;
	};
	_proto.closeButton_i = function () {
		var t = new eui.Button();
		this.closeButton = t;
		t.bottom = 5;
		t.horizontalCenter = 0;
		t.label = "close";
		return t;
	};
	return PanelSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/PlayerTs.exml'] = window.PlayerTsSkin = (function (_super) {
	__extends(PlayerTsSkin, _super);
	function PlayerTsSkin() {
		_super.call(this);
		this.skinParts = ["ImgPlayer","aniImage","aniImage0"];
		
		this.height = 200;
		this.width = 150;
		this.elementsContent = [this.ImgPlayer_i(),this.aniImage_i(),this.aniImage0_i()];
	}
	var _proto = PlayerTsSkin.prototype;

	_proto.ImgPlayer_i = function () {
		var t = new eui.Image();
		this.ImgPlayer = t;
		t.bottom = -11;
		t.height = 200;
		t.horizontalCenter = 0;
		t.source = "Comp 3_00000_png";
		t.width = 150;
		return t;
	};
	_proto.aniImage_i = function () {
		var t = new eui.Image();
		this.aniImage = t;
		t.anchorOffsetY = 0;
		t.bottom = 49;
		t.left = 0;
		t.right = 0;
		t.source = "加速冲刺_png";
		t.top = 73;
		t.visible = false;
		return t;
	};
	_proto.aniImage0_i = function () {
		var t = new eui.Image();
		this.aniImage0 = t;
		t.anchorOffsetY = 0;
		t.bottom = 13;
		t.left = 0;
		t.right = 0;
		t.source = "保护罩_png";
		t.top = 30;
		t.visible = false;
		return t;
	};
	return PlayerTsSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/ProgressBarSkin.exml'] = window.skins.ProgressBarSkin = (function (_super) {
	__extends(ProgressBarSkin, _super);
	function ProgressBarSkin() {
		_super.call(this);
		this.skinParts = ["thumb","labelDisplay"];
		
		this.minHeight = 18;
		this.minWidth = 30;
		this.elementsContent = [this._Image1_i(),this.thumb_i(),this.labelDisplay_i()];
	}
	var _proto = ProgressBarSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		t.percentHeight = 100;
		t.scale9Grid = new egret.Rectangle(1,1,4,4);
		t.source = "track_pb_png";
		t.verticalCenter = 0;
		t.percentWidth = 100;
		return t;
	};
	_proto.thumb_i = function () {
		var t = new eui.Image();
		this.thumb = t;
		t.percentHeight = 100;
		t.source = "thumb_pb_png";
		t.percentWidth = 100;
		return t;
	};
	_proto.labelDisplay_i = function () {
		var t = new eui.Label();
		this.labelDisplay = t;
		t.fontFamily = "Tahoma";
		t.horizontalCenter = 0;
		t.size = 15;
		t.textAlign = "center";
		t.textColor = 0x707070;
		t.verticalAlign = "middle";
		t.verticalCenter = 0;
		return t;
	};
	return ProgressBarSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/RadioButtonSkin.exml'] = window.skins.RadioButtonSkin = (function (_super) {
	__extends(RadioButtonSkin, _super);
	function RadioButtonSkin() {
		_super.call(this);
		this.skinParts = ["labelDisplay"];
		
		this.elementsContent = [this._Group1_i()];
		this.states = [
			new eui.State ("up",
				[
				])
			,
			new eui.State ("down",
				[
					new eui.SetProperty("_Image1","alpha",0.7)
				])
			,
			new eui.State ("disabled",
				[
					new eui.SetProperty("_Image1","alpha",0.5)
				])
			,
			new eui.State ("upAndSelected",
				[
					new eui.SetProperty("_Image1","source","radiobutton_select_up_png")
				])
			,
			new eui.State ("downAndSelected",
				[
					new eui.SetProperty("_Image1","source","radiobutton_select_down_png")
				])
			,
			new eui.State ("disabledAndSelected",
				[
					new eui.SetProperty("_Image1","source","radiobutton_select_disabled_png")
				])
		];
	}
	var _proto = RadioButtonSkin.prototype;

	_proto._Group1_i = function () {
		var t = new eui.Group();
		t.percentHeight = 100;
		t.percentWidth = 100;
		t.layout = this._HorizontalLayout1_i();
		t.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
		return t;
	};
	_proto._HorizontalLayout1_i = function () {
		var t = new eui.HorizontalLayout();
		t.verticalAlign = "middle";
		return t;
	};
	_proto._Image1_i = function () {
		var t = new eui.Image();
		this._Image1 = t;
		t.alpha = 1;
		t.fillMode = "scale";
		t.source = "radiobutton_unselect_png";
		return t;
	};
	_proto.labelDisplay_i = function () {
		var t = new eui.Label();
		this.labelDisplay = t;
		t.fontFamily = "Tahoma";
		t.size = 20;
		t.textAlign = "center";
		t.textColor = 0x707070;
		t.verticalAlign = "middle";
		return t;
	};
	return RadioButtonSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/ScrollerSkin.exml'] = window.skins.ScrollerSkin = (function (_super) {
	__extends(ScrollerSkin, _super);
	function ScrollerSkin() {
		_super.call(this);
		this.skinParts = ["horizontalScrollBar","verticalScrollBar"];
		
		this.minHeight = 20;
		this.minWidth = 20;
		this.elementsContent = [this.horizontalScrollBar_i(),this.verticalScrollBar_i()];
	}
	var _proto = ScrollerSkin.prototype;

	_proto.horizontalScrollBar_i = function () {
		var t = new eui.HScrollBar();
		this.horizontalScrollBar = t;
		t.bottom = 0;
		t.percentWidth = 100;
		return t;
	};
	_proto.verticalScrollBar_i = function () {
		var t = new eui.VScrollBar();
		this.verticalScrollBar = t;
		t.percentHeight = 100;
		t.right = 0;
		return t;
	};
	return ScrollerSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/TextInputSkin.exml'] = window.skins.TextInputSkin = (function (_super) {
	__extends(TextInputSkin, _super);
	function TextInputSkin() {
		_super.call(this);
		this.skinParts = ["textDisplay","promptDisplay"];
		
		this.minHeight = 40;
		this.minWidth = 300;
		this.elementsContent = [this._Image1_i(),this._Rect1_i(),this.textDisplay_i()];
		this.promptDisplay_i();
		
		this.states = [
			new eui.State ("normal",
				[
				])
			,
			new eui.State ("disabled",
				[
					new eui.SetProperty("textDisplay","textColor",0xff0000)
				])
			,
			new eui.State ("normalWithPrompt",
				[
					new eui.AddItems("promptDisplay","",1,"")
				])
			,
			new eui.State ("disabledWithPrompt",
				[
					new eui.AddItems("promptDisplay","",1,"")
				])
		];
	}
	var _proto = TextInputSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		t.percentHeight = 100;
		t.scale9Grid = new egret.Rectangle(1,3,8,8);
		t.source = "button_up_png";
		t.percentWidth = 100;
		return t;
	};
	_proto._Rect1_i = function () {
		var t = new eui.Rect();
		t.fillColor = 0xffffff;
		t.percentHeight = 100;
		t.percentWidth = 100;
		return t;
	};
	_proto.textDisplay_i = function () {
		var t = new eui.EditableText();
		this.textDisplay = t;
		t.height = 24;
		t.left = "10";
		t.right = "10";
		t.size = 20;
		t.textColor = 0x000000;
		t.verticalCenter = "0";
		t.percentWidth = 100;
		return t;
	};
	_proto.promptDisplay_i = function () {
		var t = new eui.Label();
		this.promptDisplay = t;
		t.height = 24;
		t.left = 10;
		t.right = 10;
		t.size = 20;
		t.textColor = 0xa9a9a9;
		t.touchEnabled = false;
		t.verticalCenter = 0;
		t.percentWidth = 100;
		return t;
	};
	return TextInputSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/ToggleSwitchSkin.exml'] = window.skins.ToggleSwitchSkin = (function (_super) {
	__extends(ToggleSwitchSkin, _super);
	function ToggleSwitchSkin() {
		_super.call(this);
		this.skinParts = [];
		
		this.elementsContent = [this._Image1_i(),this._Image2_i()];
		this.states = [
			new eui.State ("up",
				[
					new eui.SetProperty("_Image1","source","off_png")
				])
			,
			new eui.State ("down",
				[
					new eui.SetProperty("_Image1","source","off_png")
				])
			,
			new eui.State ("disabled",
				[
					new eui.SetProperty("_Image1","source","off_png")
				])
			,
			new eui.State ("upAndSelected",
				[
					new eui.SetProperty("_Image2","horizontalCenter",18)
				])
			,
			new eui.State ("downAndSelected",
				[
					new eui.SetProperty("_Image2","horizontalCenter",18)
				])
			,
			new eui.State ("disabledAndSelected",
				[
					new eui.SetProperty("_Image2","horizontalCenter",18)
				])
		];
	}
	var _proto = ToggleSwitchSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		this._Image1 = t;
		t.source = "on_png";
		return t;
	};
	_proto._Image2_i = function () {
		var t = new eui.Image();
		this._Image2 = t;
		t.horizontalCenter = -18;
		t.source = "handle_png";
		t.verticalCenter = 0;
		return t;
	};
	return ToggleSwitchSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/VScrollBarSkin.exml'] = window.skins.VScrollBarSkin = (function (_super) {
	__extends(VScrollBarSkin, _super);
	function VScrollBarSkin() {
		_super.call(this);
		this.skinParts = ["thumb"];
		
		this.minHeight = 20;
		this.minWidth = 8;
		this.elementsContent = [this.thumb_i()];
	}
	var _proto = VScrollBarSkin.prototype;

	_proto.thumb_i = function () {
		var t = new eui.Image();
		this.thumb = t;
		t.height = 30;
		t.horizontalCenter = 0;
		t.scale9Grid = new egret.Rectangle(3,3,2,2);
		t.source = "roundthumb_png";
		t.width = 8;
		return t;
	};
	return VScrollBarSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/VSliderSkin.exml'] = window.skins.VSliderSkin = (function (_super) {
	__extends(VSliderSkin, _super);
	function VSliderSkin() {
		_super.call(this);
		this.skinParts = ["track","thumb"];
		
		this.minHeight = 30;
		this.minWidth = 25;
		this.elementsContent = [this.track_i(),this.thumb_i()];
	}
	var _proto = VSliderSkin.prototype;

	_proto.track_i = function () {
		var t = new eui.Image();
		this.track = t;
		t.percentHeight = 100;
		t.horizontalCenter = 0;
		t.scale9Grid = new egret.Rectangle(1,1,4,4);
		t.source = "track_png";
		t.width = 7;
		return t;
	};
	_proto.thumb_i = function () {
		var t = new eui.Image();
		this.thumb = t;
		t.horizontalCenter = 0;
		t.source = "thumb_png";
		return t;
	};
	return VSliderSkin;
})(eui.Skin);generateEUI.paths['resource/Views/TiaoBanComponent.exml'] = window.TiaoBanComponentSkin = (function (_super) {
	__extends(TiaoBanComponentSkin, _super);
	function TiaoBanComponentSkin() {
		_super.call(this);
		this.skinParts = ["xiju","daoju","tiaobanLeft","tiaobanRight","zidan"];
		
		this.elementsContent = [this.xiju_i(),this.daoju_i(),this.tiaobanLeft_i(),this.tiaobanRight_i(),this.zidan_i()];
	}
	var _proto = TiaoBanComponentSkin.prototype;

	_proto.xiju_i = function () {
		var t = new eui.Image();
		this.xiju = t;
		t.bottom = 51;
		t.source = "细菌_png";
		t.x = 183.67;
		return t;
	};
	_proto.daoju_i = function () {
		var t = new eui.Image();
		this.daoju = t;
		t.bottom = 55;
		t.height = 80;
		t.source = "消毒液_png";
		t.width = 78.5;
		t.x = 85.75;
		return t;
	};
	_proto.tiaobanLeft_i = function () {
		var t = new eui.Image();
		this.tiaobanLeft = t;
		t.bottom = 0;
		t.left = 0;
		t.source = "森林台阶1-02_01_png";
		return t;
	};
	_proto.tiaobanRight_i = function () {
		var t = new eui.Image();
		this.tiaobanRight = t;
		t.bottom = 0;
		t.source = "森林台阶1-02_03_png";
		t.x = 200;
		return t;
	};
	_proto.zidan_i = function () {
		var t = new eui.Image();
		this.zidan = t;
		t.height = 42;
		t.source = "子弹_png";
		t.width = 114;
		t.x = 11;
		t.y = 38;
		return t;
	};
	return TiaoBanComponentSkin;
})(eui.Skin);generateEUI.paths['resource/Views/GameScence.exml'] = window.GameScenceSkin = (function (_super) {
	__extends(GameScenceSkin, _super);
	var GameScenceSkin$Skin1 = 	(function (_super) {
		__extends(GameScenceSkin$Skin1, _super);
		function GameScenceSkin$Skin1() {
			_super.call(this);
			this.skinParts = ["labelDisplay"];
			
			this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
			this.states = [
				new eui.State ("up",
					[
					])
				,
				new eui.State ("down",
					[
						new eui.SetProperty("_Image1","source","音乐暂停小图标_png")
					])
				,
				new eui.State ("disabled",
					[
					])
			];
		}
		var _proto = GameScenceSkin$Skin1.prototype;

		_proto._Image1_i = function () {
			var t = new eui.Image();
			this._Image1 = t;
			t.percentHeight = 100;
			t.source = "音乐播放小图标_png";
			t.percentWidth = 100;
			return t;
		};
		_proto.labelDisplay_i = function () {
			var t = new eui.Label();
			this.labelDisplay = t;
			t.horizontalCenter = 0;
			t.verticalCenter = 0;
			return t;
		};
		return GameScenceSkin$Skin1;
	})(eui.Skin);

	function GameScenceSkin() {
		_super.call(this);
		this.skinParts = ["bg1","bg2","playerController2","baby","guanjia","playerController","grade","tiaoBan","clickView","renwu","liaotian","daoju","liaotianwenzi","tips","musicTog","tipsQifei","newOver","over","daojishirect","daojishi"];
		
		this.height = 750;
		this.width = 1334;
		this.elementsContent = [this.bg1_i(),this.bg2_i(),this.playerController_i(),this.grade_i(),this.clickView_i(),this.tips_i(),this.musicTog_i(),this.tipsQifei_i(),this.over_i(),this.daojishirect_i(),this.daojishi_i()];
	}
	var _proto = GameScenceSkin.prototype;

	_proto.bg1_i = function () {
		var t = new eui.Image();
		this.bg1 = t;
		t.height = 750;
		t.left = 0;
		t.source = "背景_png";
		t.width = 2003;
		t.y = 0;
		return t;
	};
	_proto.bg2_i = function () {
		var t = new eui.Image();
		this.bg2 = t;
		t.height = 750;
		t.left = 2003;
		t.source = "背景_png";
		t.width = 2003;
		return t;
	};
	_proto.playerController_i = function () {
		var t = new eui.Group();
		this.playerController = t;
		t.anchorOffsetX = 75;
		t.bottom = 275;
		t.height = 220;
		t.left = 125;
		t.width = 150;
		t.elementsContent = [this.playerController2_i(),this.baby_i(),this.guanjia_i()];
		return t;
	};
	_proto.playerController2_i = function () {
		var t = new PlayerTs();
		this.playerController2 = t;
		t.anchorOffsetY = 0;
		t.bottom = 0;
		t.height = 220;
		t.horizontalCenter = 0;
		t.scaleX = 1;
		t.scaleY = 1;
		t.width = 150;
		return t;
	};
	_proto.baby_i = function () {
		var t = new Baby();
		this.baby = t;
		t.bottom = -20;
		t.height = 87.5;
		t.left = -93;
		t.width = 100;
		return t;
	};
	_proto.guanjia_i = function () {
		var t = new GuanJia();
		this.guanjia = t;
		t.anchorOffsetX = 0;
		t.anchorOffsetY = 0;
		t.bottom = -8;
		t.height = 222.67;
		t.left = -111;
		t.width = 148.44;
		return t;
	};
	_proto.grade_i = function () {
		var t = new eui.Label();
		this.grade = t;
		t.anchorOffsetX = 0;
		t.anchorOffsetY = 0;
		t.height = 95.33;
		t.right = 42;
		t.size = 67;
		t.text = "10";
		t.textAlign = "left";
		t.top = 0;
		t.verticalAlign = "bottom";
		return t;
	};
	_proto.clickView_i = function () {
		var t = new eui.Group();
		this.clickView = t;
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.top = 0;
		t.elementsContent = [this.tiaoBan_i()];
		return t;
	};
	_proto.tiaoBan_i = function () {
		var t = new TiaoBanComponent();
		this.tiaoBan = t;
		t.bottom = 138;
		t.scaleX = 1;
		t.scaleY = 1;
		t.skinName = "TiaoBanComponentSkin";
		t.x = 32;
		t.y = 469;
		return t;
	};
	_proto.tips_i = function () {
		var t = new eui.Group();
		this.tips = t;
		t.bottom = 0;
		t.left = 0;
		t.touchEnabled = false;
		t.elementsContent = [this.renwu_i(),this.liaotian_i(),this.daoju_i(),this.liaotianwenzi_i()];
		return t;
	};
	_proto.renwu_i = function () {
		var t = new eui.Image();
		this.renwu = t;
		t.bottom = 0;
		t.scaleX = 1;
		t.scaleY = 1;
		t.source = "人物_02_png";
		t.touchEnabled = false;
		t.x = 0;
		return t;
	};
	_proto.liaotian_i = function () {
		var t = new eui.Image();
		this.liaotian = t;
		t.scaleX = 1;
		t.scaleY = 1;
		t.source = "聊天框_png";
		t.touchEnabled = false;
		t.x = 222;
		t.y = 97;
		return t;
	};
	_proto.daoju_i = function () {
		var t = new eui.Image();
		this.daoju = t;
		t.scaleX = 1;
		t.scaleY = 1;
		t.source = "抑菌洗手液_png";
		t.x = 998;
		t.y = 75;
		return t;
	};
	_proto.liaotianwenzi_i = function () {
		var t = new eui.Label();
		this.liaotianwenzi = t;
		t.anchorOffsetX = 0;
		t.anchorOffsetY = 0;
		t.height = 51.21;
		t.text = "在太空要小心各种细菌哦，别忘了使用滴露道具";
		t.touchEnabled = false;
		t.verticalAlign = "middle";
		t.width = 683.09;
		t.x = 258;
		t.y = 107.78999999999999;
		return t;
	};
	_proto.musicTog_i = function () {
		var t = new eui.ToggleButton();
		this.musicTog = t;
		t.label = "";
		t.right = 43;
		t.selected = false;
		t.top = 109;
		t.width = 60;
		t.skinName = GameScenceSkin$Skin1;
		return t;
	};
	_proto.tipsQifei_i = function () {
		var t = new eui.Image();
		this.tipsQifei = t;
		t.right = 0;
		t.source = "起飞时加入字_png";
		t.top = 0;
		return t;
	};
	_proto.over_i = function () {
		var t = new eui.Group();
		this.over = t;
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.top = 0;
		t.elementsContent = [this._Rect1_i(),this.newOver_i()];
		return t;
	};
	_proto._Rect1_i = function () {
		var t = new eui.Rect();
		t.bottom = 0;
		t.fillAlpha = 0.7;
		t.left = 0;
		t.right = 0;
		t.top = 0;
		return t;
	};
	_proto.newOver_i = function () {
		var t = new eui.Image();
		this.newOver = t;
		t.horizontalCenter = 0;
		t.source = "游戏结束弹窗_png";
		t.verticalCenter = 0;
		return t;
	};
	_proto.daojishirect_i = function () {
		var t = new eui.Rect();
		this.daojishirect = t;
		t.bottom = 0;
		t.fillAlpha = 0.5;
		t.left = 0;
		t.right = 0;
		t.top = 0;
		return t;
	};
	_proto.daojishi_i = function () {
		var t = new eui.Image();
		this.daojishi = t;
		t.horizontalCenter = 0;
		t.source = "daojiashi3_png";
		t.verticalCenter = 0;
		return t;
	};
	return GameScenceSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/Views/Baby.exml'] = window.BabySkin = (function (_super) {
	__extends(BabySkin, _super);
	function BabySkin() {
		_super.call(this);
		this.skinParts = ["ImgBaby"];
		
		this.height = 350;
		this.width = 400;
		this.elementsContent = [this.ImgBaby_i()];
	}
	var _proto = BabySkin.prototype;

	_proto.ImgBaby_i = function () {
		var t = new eui.Image();
		this.ImgBaby = t;
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.source = "婴儿爬 2_00000_png";
		t.top = 0;
		return t;
	};
	return BabySkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/Views/GameOverView.exml'] = window.GameOverViewSkin = (function (_super) {
	__extends(GameOverViewSkin, _super);
	function GameOverViewSkin() {
		_super.call(this);
		this.skinParts = ["ImgType","TxtScore","TxtDilu","TxtXijun","TxtJuli","TxtBeat","BtnDetail","BtnShoot","BtnAgain"];
		
		this.height = 750;
		this.width = 1334;
		this.elementsContent = [this._Image1_i(),this._Group1_i(),this.BtnDetail_i(),this.BtnShoot_i(),this.BtnAgain_i()];
	}
	var _proto = GameOverViewSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.source = "游戏分享界面背景_jpg";
		t.top = 0;
		return t;
	};
	_proto._Group1_i = function () {
		var t = new eui.Group();
		t.height = 750;
		t.width = 1334;
		t.x = -88;
		t.y = 39;
		t.elementsContent = [this.ImgType_i(),this._Label1_i(),this._Label2_i(),this._Label3_i(),this._Label4_i(),this.TxtScore_i(),this.TxtDilu_i(),this.TxtXijun_i(),this.TxtJuli_i(),this.TxtBeat_i()];
		return t;
	};
	_proto.ImgType_i = function () {
		var t = new eui.Image();
		this.ImgType = t;
		t.horizontalCenter = -72;
		t.scaleX = 1;
		t.scaleY = 1;
		t.source = "字幕1_png";
		t.verticalCenter = 0;
		t.x = 207;
		t.y = 45.00000000000001;
		return t;
	};
	_proto._Label1_i = function () {
		var t = new eui.Label();
		t.height = 30;
		t.horizontalCenter = -190;
		t.rotation = -90;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "使用滴露产品的次数:";
		t.textAlign = "right";
		t.textColor = 0x2d2d2d;
		t.verticalAlign = "middle";
		t.verticalCenter = -20;
		t.width = 280;
		t.x = 462;
		t.y = 495;
		return t;
	};
	_proto._Label2_i = function () {
		var t = new eui.Label();
		t.height = 30;
		t.horizontalCenter = -135;
		t.rotation = -90;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "打倒细菌怪兽数量:";
		t.textAlign = "right";
		t.textColor = 0x2D2D2D;
		t.verticalAlign = "middle";
		t.verticalCenter = -20;
		t.width = 280;
		t.x = 517;
		t.y = 495;
		return t;
	};
	_proto._Label3_i = function () {
		var t = new eui.Label();
		t.height = 30;
		t.horizontalCenter = -80;
		t.rotation = -90;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "完成探索距离:";
		t.textAlign = "right";
		t.textColor = 0x2D2D2D;
		t.verticalAlign = "middle";
		t.verticalCenter = -20;
		t.width = 280;
		t.x = 572;
		t.y = 495;
		return t;
	};
	_proto._Label4_i = function () {
		var t = new eui.Label();
		t.height = 30;
		t.horizontalCenter = -25;
		t.rotation = -90;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "打败全球玩家:";
		t.textAlign = "right";
		t.textColor = 0x2D2D2D;
		t.verticalAlign = "middle";
		t.verticalCenter = -20;
		t.width = 280;
		t.x = 627;
		t.y = 495;
		return t;
	};
	_proto.TxtScore_i = function () {
		var t = new eui.BitmapLabel();
		this.TxtScore = t;
		t.font = "font2_fnt";
		t.height = 233;
		t.horizontalCenter = -310;
		t.rotation = 180;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "298";
		t.textAlign = "center";
		t.verticalAlign = "middle";
		t.verticalCenter = -66;
		t.width = 90;
		t.x = 402;
		t.y = 426.00000000000006;
		return t;
	};
	_proto.TxtDilu_i = function () {
		var t = new eui.BitmapLabel();
		this.TxtDilu = t;
		t.font = "font1_fnt";
		t.height = 80;
		t.horizontalCenter = -190;
		t.rotation = 180;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "0";
		t.verticalCenter = -215;
		t.width = 25;
		t.x = 490.00000000000006;
		t.y = 200;
		return t;
	};
	_proto.TxtXijun_i = function () {
		var t = new eui.BitmapLabel();
		this.TxtXijun = t;
		t.font = "font1_fnt";
		t.height = 80;
		t.horizontalCenter = -135;
		t.rotation = 180;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "0";
		t.verticalCenter = -215;
		t.width = 25;
		t.x = 545;
		t.y = 200;
		return t;
	};
	_proto.TxtJuli_i = function () {
		var t = new eui.BitmapLabel();
		this.TxtJuli = t;
		t.font = "font1_fnt";
		t.height = 80;
		t.horizontalCenter = -80;
		t.rotation = 180;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "0";
		t.verticalCenter = -215;
		t.width = 25;
		t.x = 600;
		t.y = 200;
		return t;
	};
	_proto.TxtBeat_i = function () {
		var t = new eui.BitmapLabel();
		this.TxtBeat = t;
		t.font = "font1_fnt";
		t.height = 80;
		t.horizontalCenter = -25;
		t.rotation = 180;
		t.scaleX = 1;
		t.scaleY = 1;
		t.text = "0";
		t.verticalCenter = -215;
		t.width = 25;
		t.x = 655;
		t.y = 200;
		return t;
	};
	_proto.BtnDetail_i = function () {
		var t = new eui.Image();
		this.BtnDetail = t;
		t.right = 290;
		t.source = "按钮一_png";
		t.verticalCenter = 0;
		return t;
	};
	_proto.BtnShoot_i = function () {
		var t = new eui.Image();
		this.BtnShoot = t;
		t.right = 175;
		t.source = "按钮二_png";
		t.verticalCenter = 0;
		return t;
	};
	_proto.BtnAgain_i = function () {
		var t = new eui.Image();
		this.BtnAgain = t;
		t.right = 60;
		t.source = "按钮三_png";
		t.verticalCenter = 0;
		return t;
	};
	return GameOverViewSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/Views/GuanJia.exml'] = window.GuanJiaSkin = (function (_super) {
	__extends(GuanJiaSkin, _super);
	function GuanJiaSkin() {
		_super.call(this);
		this.skinParts = ["ImgGuanJia"];
		
		this.height = 300;
		this.width = 200;
		this.elementsContent = [this.ImgGuanJia_i()];
	}
	var _proto = GuanJiaSkin.prototype;

	_proto.ImgGuanJia_i = function () {
		var t = new eui.Image();
		this.ImgGuanJia = t;
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.source = "侧面男B 5_00000_png";
		t.top = 0;
		return t;
	};
	return GuanJiaSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/Views/HomeView.exml'] = window.HomeViewSkin = (function (_super) {
	__extends(HomeViewSkin, _super);
	function HomeViewSkin() {
		_super.call(this);
		this.skinParts = ["BtnStart","ImgTrans"];
		
		this.height = 750;
		this.width = 1334;
		this.elementsContent = [this._Image1_i(),this.BtnStart_i(),this.ImgTrans_i()];
	}
	var _proto = HomeViewSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.source = "背景_jpg";
		t.top = 0;
		return t;
	};
	_proto.BtnStart_i = function () {
		var t = new eui.Image();
		this.BtnStart = t;
		t.right = 125;
		t.source = "点击进入按钮_png";
		t.verticalCenter = 0;
		return t;
	};
	_proto.ImgTrans_i = function () {
		var t = new eui.Image();
		this.ImgTrans = t;
		t.anchorOffsetY = 0;
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.source = "";
		t.top = 0;
		return t;
	};
	return HomeViewSkin;
})(eui.Skin);generateEUI.paths['resource/eui_skins/Views/PrepareView.exml'] = window.PrepareViewSkin = (function (_super) {
	__extends(PrepareViewSkin, _super);
	var PrepareViewSkin$Skin2 = 	(function (_super) {
		__extends(PrepareViewSkin$Skin2, _super);
		function PrepareViewSkin$Skin2() {
			_super.call(this);
			this.skinParts = ["labelDisplay"];
			
			this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
			this.states = [
				new eui.State ("up",
					[
					])
				,
				new eui.State ("down",
					[
						new eui.SetProperty("_Image1","source","滴露免洗手液选中状态_png")
					])
				,
				new eui.State ("disabled",
					[
					])
			];
		}
		var _proto = PrepareViewSkin$Skin2.prototype;

		_proto._Image1_i = function () {
			var t = new eui.Image();
			this._Image1 = t;
			t.percentHeight = 100;
			t.source = "滴露免洗手液未选中状态_png";
			t.percentWidth = 100;
			return t;
		};
		_proto.labelDisplay_i = function () {
			var t = new eui.Label();
			this.labelDisplay = t;
			t.horizontalCenter = 0;
			t.verticalCenter = 0;
			return t;
		};
		return PrepareViewSkin$Skin2;
	})(eui.Skin);

	var PrepareViewSkin$Skin3 = 	(function (_super) {
		__extends(PrepareViewSkin$Skin3, _super);
		function PrepareViewSkin$Skin3() {
			_super.call(this);
			this.skinParts = ["labelDisplay"];
			
			this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
			this.states = [
				new eui.State ("up",
					[
					])
				,
				new eui.State ("down",
					[
						new eui.SetProperty("_Image1","source","滴露消毒液选中后_png")
					])
				,
				new eui.State ("disabled",
					[
					])
			];
		}
		var _proto = PrepareViewSkin$Skin3.prototype;

		_proto._Image1_i = function () {
			var t = new eui.Image();
			this._Image1 = t;
			t.percentHeight = 100;
			t.source = "滴露消毒液未选中_png";
			t.percentWidth = 100;
			return t;
		};
		_proto.labelDisplay_i = function () {
			var t = new eui.Label();
			this.labelDisplay = t;
			t.horizontalCenter = 0;
			t.verticalCenter = 0;
			return t;
		};
		return PrepareViewSkin$Skin3;
	})(eui.Skin);

	var PrepareViewSkin$Skin4 = 	(function (_super) {
		__extends(PrepareViewSkin$Skin4, _super);
		function PrepareViewSkin$Skin4() {
			_super.call(this);
			this.skinParts = ["labelDisplay"];
			
			this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
			this.states = [
				new eui.State ("up",
					[
					])
				,
				new eui.State ("down",
					[
						new eui.SetProperty("_Image1","source","滴露泡沫洗手液选中后_png")
					])
				,
				new eui.State ("disabled",
					[
					])
			];
		}
		var _proto = PrepareViewSkin$Skin4.prototype;

		_proto._Image1_i = function () {
			var t = new eui.Image();
			this._Image1 = t;
			t.percentHeight = 100;
			t.source = "滴露泡沫洗手液未选中_png";
			t.percentWidth = 100;
			return t;
		};
		_proto.labelDisplay_i = function () {
			var t = new eui.Label();
			this.labelDisplay = t;
			t.horizontalCenter = 0;
			t.verticalCenter = 0;
			return t;
		};
		return PrepareViewSkin$Skin4;
	})(eui.Skin);

	var PrepareViewSkin$Skin5 = 	(function (_super) {
		__extends(PrepareViewSkin$Skin5, _super);
		function PrepareViewSkin$Skin5() {
			_super.call(this);
			this.skinParts = ["labelDisplay"];
			
			this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
			this.states = [
				new eui.State ("up",
					[
					])
				,
				new eui.State ("down",
					[
						new eui.SetProperty("_Image1","source","滴露宝贝选中后_png")
					])
				,
				new eui.State ("disabled",
					[
					])
			];
		}
		var _proto = PrepareViewSkin$Skin5.prototype;

		_proto._Image1_i = function () {
			var t = new eui.Image();
			this._Image1 = t;
			t.percentHeight = 100;
			t.source = "滴露宝贝未选中_png";
			t.percentWidth = 100;
			return t;
		};
		_proto.labelDisplay_i = function () {
			var t = new eui.Label();
			this.labelDisplay = t;
			t.horizontalCenter = 0;
			t.verticalCenter = 0;
			return t;
		};
		return PrepareViewSkin$Skin5;
	})(eui.Skin);

	var PrepareViewSkin$Skin6 = 	(function (_super) {
		__extends(PrepareViewSkin$Skin6, _super);
		function PrepareViewSkin$Skin6() {
			_super.call(this);
			this.skinParts = ["labelDisplay"];
			
			this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
			this.states = [
				new eui.State ("up",
					[
					])
				,
				new eui.State ("down",
					[
						new eui.SetProperty("_Image1","source","滴露管家选中后_png")
					])
				,
				new eui.State ("disabled",
					[
					])
			];
		}
		var _proto = PrepareViewSkin$Skin6.prototype;

		_proto._Image1_i = function () {
			var t = new eui.Image();
			this._Image1 = t;
			t.percentHeight = 100;
			t.source = "滴露管家未选中_png";
			t.percentWidth = 100;
			return t;
		};
		_proto.labelDisplay_i = function () {
			var t = new eui.Label();
			this.labelDisplay = t;
			t.horizontalCenter = 0;
			t.verticalCenter = 0;
			return t;
		};
		return PrepareViewSkin$Skin6;
	})(eui.Skin);

	var PrepareViewSkin$Skin7 = 	(function (_super) {
		__extends(PrepareViewSkin$Skin7, _super);
		function PrepareViewSkin$Skin7() {
			_super.call(this);
			this.skinParts = ["labelDisplay"];
			
			this.elementsContent = [this._Image1_i(),this.labelDisplay_i()];
			this.states = [
				new eui.State ("up",
					[
					])
				,
				new eui.State ("down",
					[
						new eui.SetProperty("_Image1","source","音乐暂停小图标_png")
					])
				,
				new eui.State ("disabled",
					[
					])
			];
		}
		var _proto = PrepareViewSkin$Skin7.prototype;

		_proto._Image1_i = function () {
			var t = new eui.Image();
			this._Image1 = t;
			t.percentHeight = 100;
			t.source = "音乐播放小图标_png";
			t.percentWidth = 100;
			return t;
		};
		_proto.labelDisplay_i = function () {
			var t = new eui.Label();
			this.labelDisplay = t;
			t.horizontalCenter = 0;
			t.verticalCenter = 0;
			return t;
		};
		return PrepareViewSkin$Skin7;
	})(eui.Skin);

	function PrepareViewSkin() {
		_super.call(this);
		this.skinParts = ["Props1","Props2","Props3","GroupProps","ImgBreath","Group1","Player1","Player2","GroupPlayers","Group2","RectProps","RectPlayers","GroupShowPlayers","BtnStart","musicTog"];
		
		this.height = 750;
		this.width = 1334;
		this.elementsContent = [this._Image1_i(),this.Group1_i(),this.Group2_i(),this.RectProps_i(),this.RectPlayers_i(),this.GroupShowPlayers_i(),this.BtnStart_i(),this._Image6_i(),this.musicTog_i()];
	}
	var _proto = PrepareViewSkin.prototype;

	_proto._Image1_i = function () {
		var t = new eui.Image();
		t.bottom = 0;
		t.left = 0;
		t.right = 0;
		t.source = "选择道具界面背景_jpg";
		t.top = 0;
		return t;
	};
	_proto.Group1_i = function () {
		var t = new eui.Group();
		this.Group1 = t;
		t.left = 55;
		t.verticalCenter = 0;
		t.width = 776;
		t.elementsContent = [this._Image2_i(),this.GroupProps_i(),this.ImgBreath_i()];
		return t;
	};
	_proto._Image2_i = function () {
		var t = new eui.Image();
		t.horizontalCenter = 0;
		t.source = "选择道具选中后的背景框_03_png";
		t.verticalCenter = 0;
		return t;
	};
	_proto.GroupProps_i = function () {
		var t = new eui.Group();
		this.GroupProps = t;
		t.anchorOffsetX = 0;
		t.anchorOffsetY = 0;
		t.height = 437;
		t.horizontalCenter = 0;
		t.scaleX = 1;
		t.scaleY = 1;
		t.verticalCenter = 85;
		t.width = 745;
		t.elementsContent = [this.Props1_i(),this.Props2_i(),this.Props3_i()];
		return t;
	};
	_proto.Props1_i = function () {
		var t = new eui.ToggleButton();
		this.Props1 = t;
		t.alpha = 1;
		t.enabled = true;
		t.horizontalCenter = -245;
		t.name = "1";
		t.scaleX = 1;
		t.scaleY = 1;
		t.selected = true;
		t.verticalCenter = 6.5;
		t.x = 7;
		t.y = 18;
		t.skinName = PrepareViewSkin$Skin2;
		return t;
	};
	_proto.Props2_i = function () {
		var t = new eui.ToggleButton();
		this.Props2 = t;
		t.enabled = true;
		t.horizontalCenter = 0;
		t.label = "";
		t.name = "2";
		t.scaleX = 1;
		t.scaleY = 1;
		t.verticalCenter = 6.5;
		t.x = 267;
		t.y = 32;
		t.skinName = PrepareViewSkin$Skin3;
		return t;
	};
	_proto.Props3_i = function () {
		var t = new eui.ToggleButton();
		this.Props3 = t;
		t.enabled = true;
		t.horizontalCenter = 245;
		t.label = "";
		t.name = "3";
		t.scaleX = 1;
		t.scaleY = 1;
		t.verticalCenter = 6.5;
		t.x = 512;
		t.y = 32;
		t.skinName = PrepareViewSkin$Skin4;
		return t;
	};
	_proto.ImgBreath_i = function () {
		var t = new eui.Image();
		this.ImgBreath = t;
		t.horizontalCenter = 189;
		t.source = "呼吸灯_png";
		t.verticalCenter = -180;
		t.x = 10;
		t.y = 10;
		return t;
	};
	_proto.Group2_i = function () {
		var t = new eui.Group();
		this.Group2 = t;
		t.left = 55;
		t.verticalCenter = 0;
		t.visible = false;
		t.width = 776;
		t.elementsContent = [this._Image3_i(),this.GroupPlayers_i()];
		return t;
	};
	_proto._Image3_i = function () {
		var t = new eui.Image();
		t.horizontalCenter = 0;
		t.source = "拉上伙伴选中后的背景框_03_png";
		t.verticalCenter = 0;
		return t;
	};
	_proto.GroupPlayers_i = function () {
		var t = new eui.Group();
		this.GroupPlayers = t;
		t.anchorOffsetX = 0;
		t.anchorOffsetY = 0;
		t.height = 437;
		t.horizontalCenter = 0;
		t.scaleX = 1;
		t.scaleY = 1;
		t.verticalCenter = 85;
		t.width = 745;
		t.elementsContent = [this.Player1_i(),this.Player2_i()];
		return t;
	};
	_proto.Player1_i = function () {
		var t = new eui.ToggleButton();
		this.Player1 = t;
		t.alpha = 1;
		t.enabled = true;
		t.horizontalCenter = -195;
		t.name = "1";
		t.scaleX = 1;
		t.scaleY = 1;
		t.selected = true;
		t.verticalCenter = 6.5;
		t.x = 7;
		t.y = 18;
		t.skinName = PrepareViewSkin$Skin5;
		return t;
	};
	_proto.Player2_i = function () {
		var t = new eui.ToggleButton();
		this.Player2 = t;
		t.enabled = true;
		t.horizontalCenter = 195;
		t.label = "";
		t.name = "2";
		t.scaleX = 1;
		t.scaleY = 1;
		t.verticalCenter = 6.5;
		t.x = 267;
		t.y = 32;
		t.skinName = PrepareViewSkin$Skin6;
		return t;
	};
	_proto.RectProps_i = function () {
		var t = new eui.Rect();
		this.RectProps = t;
		t.anchorOffsetX = 0;
		t.anchorOffsetY = 0;
		t.fillAlpha = 0;
		t.height = 58;
		t.horizontalCenter = -410;
		t.strokeAlpha = 0;
		t.verticalCenter = -188;
		t.width = 366;
		return t;
	};
	_proto.RectPlayers_i = function () {
		var t = new eui.Rect();
		this.RectPlayers = t;
		t.anchorOffsetX = 0;
		t.anchorOffsetY = 0;
		t.fillAlpha = 0;
		t.height = 58;
		t.horizontalCenter = -30;
		t.strokeAlpha = 0;
		t.verticalCenter = -191;
		t.width = 366;
		return t;
	};
	_proto.GroupShowPlayers_i = function () {
		var t = new eui.Group();
		this.GroupShowPlayers = t;
		t.height = 400;
		t.horizontalCenter = 445;
		t.verticalCenter = -135;
		t.visible = false;
		t.width = 300;
		t.elementsContent = [this._Image4_i(),this._Image5_i()];
		return t;
	};
	_proto._Image4_i = function () {
		var t = new eui.Image();
		t.height = 400;
		t.horizontalCenter = 0;
		t.scaleX = 1;
		t.scaleY = 1;
		t.source = "抑菌洗手液_png";
		t.verticalCenter = 0;
		t.width = 300;
		t.x = -1.0000000000001137;
		t.y = 1;
		return t;
	};
	_proto._Image5_i = function () {
		var t = new eui.Image();
		t.height = 400;
		t.horizontalCenter = 0;
		t.scaleX = 1;
		t.scaleY = 1;
		t.source = "泡沫洗手液_png";
		t.verticalCenter = 0;
		t.visible = false;
		t.width = 300;
		t.x = -1.0000000000001137;
		t.y = 1;
		return t;
	};
	_proto.BtnStart_i = function () {
		var t = new eui.Image();
		this.BtnStart = t;
		t.horizontalCenter = 441;
		t.source = "开始游戏按钮_png";
		t.verticalCenter = 233;
		return t;
	};
	_proto._Image6_i = function () {
		var t = new eui.Image();
		t.left = 637;
		t.source = "选择人物字幕_png";
		t.verticalCenter = -262;
		return t;
	};
	_proto.musicTog_i = function () {
		var t = new eui.ToggleButton();
		this.musicTog = t;
		t.label = "";
		t.right = 25;
		t.selected = false;
		t.top = 25;
		t.skinName = PrepareViewSkin$Skin7;
		return t;
	};
	return PrepareViewSkin;
})(eui.Skin);