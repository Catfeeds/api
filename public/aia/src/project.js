require = function e(t, i, s) {
    function c(n, o) {
        if (!i[n]) {
            if (!t[n]) {
                var h = "function" == typeof require && require;
                if (!o && h) return h(n, !0);
                if (a) return a(n, !0);
                var _ = new Error("Cannot find module '" + n + "'");
                throw _.code = "MODULE_NOT_FOUND", _
            }
            var r = i[n] = {exports: {}};
            t[n][0].call(r.exports, function (e) {
                var i = t[n][1][e];
                return c(i || e)
            }, r, r.exports, e, t, i, s)
        }
        return i[n].exports
    }

    for (var a = "function" == typeof require && require, n = 0; n < s.length; n++) c(s[n]);
    return c
}({
    Cp1: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "2cf93sT5ERG8aGkgIo6uC/v", "Cp1"), cc.Class({
            extends: cc.Component,
            properties: {base1: 4, base2: 3, base3: 1},
            onLoad: function () {
                this.need1 = 2, this.need2 = 1, this.need3 = 2, cc.director.getCollisionManager().enabled = !0, this.main = cc.find("Canvas").getComponent("Main"), this.title = this.node.getComponent("Title"), this.accel_state = !0, this.cp1_1 = 0, this.cp1_2 = 0, this.cp1_3 = 0, this.main.set_score(window.aia.game_score)
            },
            onCollisionEnter: function (e, t) {
                switch (e.node.destroy(), e.node.name) {
                    case"aia":
                        this.addRandom();
                        break;
                    case"peanut":
                        this.accel_state && this.accel();
                        break;
                    case"meat":
                        this.main.fail(this.main.current_scene);
                        break;
                    case"cp1_1":
                        this.cp1_1++;
                        break;
                    case"cp1_2":
                        this.cp1_2++;
                        break;
                    case"cp1_3":
                        this.cp1_3++;
                        break;
                    case"cp1_4":
                        this.reduceRandom()
                }
                var i = this.cp1_1 * this.base1, s = this.cp1_2 * this.base2, c = this.cp1_3 * this.base3;
                window.aia.cp1_score = i + s + c, window.aia.game_score = window.aia.cp1_score, this.main.set_score(window.aia.game_score), this.main.set_num(this.cp1_1, this.cp1_2, this.cp1_3), this.cp1_1 >= this.need1 && this.cp1_2 >= this.need2 && this.cp1_3 >= this.need3 && this.main.success(), this.title.update_title()
            },
            addRandom: function () {
                switch (Math.floor(3 * Math.random() + 1)) {
                    case 1:
                        this.cp1_1 >= this.need1 ? this.addRandom() : this.cp1_1++;
                        break;
                    case 2:
                        this.cp1_2 >= this.need2 ? this.addRandom() : this.cp1_2++;
                        break;
                    case 3:
                        this.cp1_3 >= this.need3 ? this.addRandom() : this.cp1_3++;
                        break;
                    default:
                        this.cp1_1++
                }
            },
            reduceRandom: function () {
                var e = Math.floor(3 * Math.random() + 1);
                if (1 == e && this.cp1_1 > 0) this.cp1_1--; else if (2 == e && this.cp1_2 > 0) this.cp1_2--; else if (3 == e && this.cp1_3 > 0) this.cp1_3--; else if (0 !== this.cp1_1 || 0 !== this.cp1_2 || 0 !== this.cp1_3) return this.reduceRandom()
            },
            accel: function () {
                var e = this;
                e.accel_state = !1, e.schedule(function () {
                    e.main.new_food(2, 3)
                }, .5, 6), e.scheduleOnce(function () {
                    e.accelState = !0
                }, 3)
            }
        }), cc._RF.pop()
    }, {}], Cp2: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "22e20Yuw8VAMKhn2OA+pKwE", "Cp2"), cc.Class({
            extends: cc.Component,
            properties: {base1: 3, base2: 2, base3: 4},
            onLoad: function () {
                this.need1 = 2, this.need2 = 3, this.need3 = 2, cc.director.getCollisionManager().enabled = !0, this.main = cc.find("Canvas").getComponent("Main"), this.title = this.node.getComponent("Title"), this.accel_state = !0, this.cp2_1 = 0, this.cp2_2 = 0, this.cp2_3 = 0, this.main.set_score(window.aia.game_score)
            },
            onCollisionEnter: function (e, t) {
                switch (e.node.destroy(), e.node.name) {
                    case"aia":
                        this.addRandom();
                        break;
                    case"peanut":
                        this.accel_state && this.accel();
                        break;
                    case"meat":
                        this.main.fail(this.main.current_scene);
                        break;
                    case"cp2_1":
                        this.cp2_1++;
                        break;
                    case"cp2_2":
                        this.cp2_2++;
                        break;
                    case"cp2_3":
                        this.cp2_3++;
                        break;
                    case"cp2_4":
                    case"cp2_5":
                        this.reduceRandom()
                }
                var i = this.cp2_1 * this.base1, s = this.cp2_2 * this.base2, c = this.cp2_3 * this.base3;
                window.aia.cp2_score = i + s + c, window.aia.game_score = window.aia.cp1_score + window.aia.cp2_score, this.main.set_score(window.aia.game_score), this.main.set_num(this.cp2_1, this.cp2_2, this.cp2_3), this.cp2_1 >= this.need1 && this.cp2_2 >= this.need2 && this.cp2_3 >= this.need3 && this.main.success(), this.title.update_title()
            },
            addRandom: function () {
                switch (Math.floor(3 * Math.random() + 1)) {
                    case 1:
                        this.cp2_1 >= this.need1 ? this.addRandom() : this.cp2_1++;
                        break;
                    case 2:
                        this.cp2_2 >= this.need2 ? this.addRandom() : this.cp2_2++;
                        break;
                    case 3:
                        this.cp2_3 >= this.need3 ? this.addRandom() : this.cp2_3++;
                        break;
                    default:
                        this.cp2_1++
                }
            },
            reduceRandom: function () {
                var e = Math.floor(3 * Math.random() + 1);
                if (1 == e && this.cp2_1 > 0) this.cp2_1--; else if (2 == e && this.cp2_2 > 0) this.cp2_2--; else if (3 == e && this.cp2_3 > 0) this.cp2_3--; else if (0 !== this.cp2_1 || 0 !== this.cp2_2 || 0 !== this.cp2_3) return this.reduceRandom()
            },
            accel: function () {
                var e = this;
                e.accel_state = !1, e.schedule(function () {
                    e.main.new_food(2, 3)
                }, .5, 6), e.scheduleOnce(function () {
                    e.accelState = !0
                }, 3)
            }
        }), cc._RF.pop()
    }, {}], Cp3: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "0cff1YF4RhMJ4L4dg2ZDeBW", "Cp3"), cc.Class({
            extends: cc.Component,
            properties: {base1: 3, base2: 3, base3: 4},
            onLoad: function () {
                this.need1 = 3, this.need2 = 2, this.need3 = 2, cc.director.getCollisionManager().enabled = !0, this.main = cc.find("Canvas").getComponent("Main"), this.title = this.node.getComponent("Title"), this.accel_state = !0, this.cp3_1 = 0, this.cp3_2 = 0, this.cp3_3 = 0, this.main.set_score(window.aia.game_score)
            },
            onCollisionEnter: function (e, t) {
                switch (e.node.destroy(), e.node.name) {
                    case"aia":
                        this.addRandom();
                        break;
                    case"peanut":
                        this.accel_state && this.accel();
                        break;
                    case"meat":
                        this.main.fail(this.main.current_scene);
                        break;
                    case"cp3_1":
                        this.cp3_1++;
                        break;
                    case"cp3_2":
                        this.cp3_2++;
                        break;
                    case"cp3_3":
                        this.cp3_3++;
                        break;
                    case"cp3_4":
                    case"cp3_5":
                        this.reduceRandom()
                }
                var i = this.cp3_1 * this.base1, s = this.cp3_2 * this.base2, c = this.cp3_3 * this.base3;
                window.aia.cp3_score = i + s + c, window.aia.game_score = window.aia.cp1_score + window.aia.cp2_score + window.aia.cp3_score, this.main.set_score(window.aia.game_score), this.main.set_num(this.cp3_1, this.cp3_2, this.cp3_3), this.cp3_1 >= this.need1 && this.cp3_2 >= this.need2 && this.cp3_3 >= this.need3 && this.main.success(), this.title.update_title()
            },
            addRandom: function () {
                switch (Math.floor(3 * Math.random() + 1)) {
                    case 1:
                        this.cp3_1 >= this.need1 ? this.addRandom() : this.cp3_1++;
                        break;
                    case 2:
                        this.cp3_2 >= this.need2 ? this.addRandom() : this.cp3_2++;
                        break;
                    case 3:
                        this.cp3_3 >= this.need3 ? this.addRandom() : this.cp3_3++;
                        break;
                    default:
                        this.cp3_1++
                }
            },
            reduceRandom: function () {
                var e = Math.floor(3 * Math.random() + 1);
                if (1 == e && this.cp3_1 > 0) this.cp3_1--; else if (2 == e && this.cp3_2 > 0) this.cp3_2--; else if (3 == e && this.cp3_3 > 0) this.cp3_3--; else if (0 !== this.cp3_1 || 0 !== this.cp3_2 || 0 !== this.cp3_3) return this.reduceRandom()
            },
            accel: function () {
                var e = this;
                e.accel_state = !1, e.schedule(function () {
                    e.main.new_food(2, 3)
                }, .5, 6), e.scheduleOnce(function () {
                    e.accelState = !0
                }, 3)
            }
        }), cc._RF.pop()
    }, {}], Cp4: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "e7ea4u5SVNOP5FSWyo+f3+Q", "Cp4"), cc.Class({
            extends: cc.Component,
            properties: {base1: 4, base2: 3, base3: 3, base4: 2},
            onLoad: function () {
                this.need1 = 2, this.need2 = 3, this.need3 = 2, this.need4 = 4, cc.director.getCollisionManager().enabled = !0, this.main = cc.find("Canvas").getComponent("Main"), this.title = this.node.getComponent("Title"), this.accel_state = !0, this.cp4_1 = 0, this.cp4_2 = 0, this.cp4_3 = 0, this.cp4_4 = 0, this.main.set_score(window.aia.game_score)
            },
            onCollisionEnter: function (e, t) {
                switch (e.node.destroy(), e.node.name) {
                    case"aia":
                        this.addRandom();
                        break;
                    case"peanut":
                        this.accel_state && this.accel();
                        break;
                    case"meat":
                        this.main.fail(this.main.current_scene);
                        break;
                    case"cp4_1":
                        this.cp4_1++;
                        break;
                    case"cp4_2":
                        this.cp4_2++;
                        break;
                    case"cp4_3":
                        this.cp4_3++;
                        break;
                    case"cp4_4":
                        this.cp4_4++;
                        break;
                    case"cp4_5":
                    case"cp4_6":
                    case"cp4_7":
                        this.reduceRandom()
                }
                var i = this.cp4_1 * this.base1, s = this.cp4_2 * this.base2, c = this.cp4_3 * this.base3,
                    a = this.cp4_4 * this.base4;
                window.aia.cp4_score = i + s + c + a, window.aia.game_score = window.aia.cp1_score + window.aia.cp2_score + window.aia.cp3_score + window.aia.cp4_score, this.main.set_score(window.aia.game_score), this.main.set_num(this.cp4_1, this.cp4_2, this.cp4_3, this.cp4_4), this.cp4_1 >= this.need1 && this.cp4_2 >= this.need2 && this.cp4_3 >= this.need3 && this.cp4_4 >= this.need4 && this.main.success(), this.title.update_title()
            },
            addRandom: function () {
                switch (Math.floor(4 * Math.random() + 1)) {
                    case 1:
                        this.cp4_1 >= this.need1 ? this.addRandom() : this.cp4_1++;
                        break;
                    case 2:
                        this.cp4_2 >= this.need2 ? this.addRandom() : this.cp4_2++;
                        break;
                    case 3:
                        this.cp4_3 >= this.need3 ? this.addRandom() : this.cp4_3++;
                        break;
                    case 4:
                        this.cp4_4 >= this.need4 ? this.addRandom() : this.cp4_4++;
                        break;
                    default:
                        this.cp4_1++
                }
            },
            reduceRandom: function () {
                var e = Math.floor(4 * Math.random() + 1);
                if (1 == e && this.cp4_1 > 0) this.cp4_1--; else if (2 == e && this.cp4_2 > 0) this.cp4_2--; else if (3 == e && this.cp4_3 > 0) this.cp4_3--; else if (4 == e && this.cp4_4 > 0) this.cp4_4--; else if (0 !== this.cp4_1 || 0 !== this.cp4_2 || 0 !== this.cp4_3 || 0 !== this.cp4_4) return this.reduceRandom()
            },
            accel: function () {
                var e = this;
                e.accel_state = !1, e.schedule(function () {
                    e.main.new_food(2, 3)
                }, .5, 6), e.scheduleOnce(function () {
                    e.accelState = !0
                }, 3)
            }
        }), cc._RF.pop()
    }, {}], Cp5: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "b5d1aeQOetEAb7r8ojKVvwA", "Cp5"), cc.Class({
            extends: cc.Component,
            properties: {base1: 2, base2: 2, base3: 4, base4: 3},
            onLoad: function () {
                this.need1 = 2, this.need2 = 4, this.need3 = 3, this.need4 = 3, cc.director.getCollisionManager().enabled = !0, this.main = cc.find("Canvas").getComponent("Main"), this.title = this.node.getComponent("Title"), this.accel_state = !0, this.cp5_1 = 0, this.cp5_2 = 0, this.cp5_3 = 0, this.cp5_4 = 0, this.main.set_score(window.aia.game_score)
            },
            onCollisionEnter: function (e, t) {
                switch (e.node.destroy(), e.node.name) {
                    case"aia":
                        this.addRandom();
                        break;
                    case"peanut":
                        this.accel_state && this.accel();
                        break;
                    case"meat":
                        this.main.fail(this.main.current_scene);
                        break;
                    case"cp5_1":
                        this.cp5_1++;
                        break;
                    case"cp5_2":
                        this.cp5_2++;
                        break;
                    case"cp5_3":
                        this.cp5_3++;
                        break;
                    case"cp5_4":
                        this.cp5_4++;
                        break;
                    case"cp5_5":
                    case"cp5_6":
                    case"cp5_7":
                        this.reduceRandom()
                }
                var i = this.cp5_1 * this.base1, s = this.cp5_2 * this.base2, c = this.cp5_3 * this.base3,
                    a = this.cp5_4 * this.base4;
                window.aia.cp5_score = i + s + c + a, window.aia.game_score = window.aia.cp1_score + window.aia.cp2_score + window.aia.cp3_score + window.aia.cp4_score + window.aia.cp5_score, this.main.set_score(window.aia.game_score), this.main.set_num(this.cp5_1, this.cp5_2, this.cp5_3, this.cp5_4), this.cp5_1 >= this.need1 && this.cp5_2 >= this.need2 && this.cp5_3 >= this.need3 && this.cp5_4 >= this.need4 && this.main.success(), this.title.update_title()
            },
            addRandom: function () {
                switch (Math.floor(4 * Math.random() + 1)) {
                    case 1:
                        this.cp5_1 >= this.need1 ? this.addRandom() : this.cp5_1++;
                        break;
                    case 2:
                        this.cp5_2 >= this.need2 ? this.addRandom() : this.cp5_2++;
                        break;
                    case 3:
                        this.cp5_3 >= this.need3 ? this.addRandom() : this.cp5_3++;
                        break;
                    case 4:
                        this.cp5_4 >= this.need4 ? this.addRandom() : this.cp5_4++;
                        break;
                    default:
                        this.cp5_1++
                }
            },
            reduceRandom: function () {
                var e = Math.floor(4 * Math.random() + 1);
                if (1 == e && this.cp5_1 > 0) this.cp5_1--; else if (2 == e && this.cp5_2 > 0) this.cp5_2--; else if (3 == e && this.cp5_3 > 0) this.cp5_3--; else if (4 == e && this.cp5_4 > 0) this.cp5_4--; else if (0 !== this.cp5_1 || 0 !== this.cp5_2 || 0 !== this.cp5_3 || 0 !== this.cp5_4) return this.reduceRandom()
            },
            accel: function () {
                var e = this;
                e.accel_state = !1, e.schedule(function () {
                    e.main.new_food(2, 3)
                }, .5, 6), e.scheduleOnce(function () {
                    e.accelState = !0
                }, 3)
            }
        }), cc._RF.pop()
    }, {}], Link: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "e9bb2C8hbFLAoRMNimMQbx3", "Link"), cc.Class({
            extends: cc.Component,
            properties: {},
            onLoad: function () {
                this.node.on(cc.Node.EventType.TOUCH_END, this.link, this.node), this.node.on(cc.Node.EventType.TOUCH_START, this.feedback, this.node)
            },
            link: function () {
                var e = cc.scaleTo(0, 1, 1);
                switch (this.runAction(e), this.name) {
                    case"enter_game":
                        1 == window.aia.is_times ? cc.director.loadScene("rule") : this.parent.getChildByName("times").active = !0;
                        break;
                    case"start_game":
                        cc.director.loadScene("check_point_1");
                        break;
                    case"title_close":
                        this.main = cc.find("Canvas").getComponent("Main"), this.main.title_close();
                        break;
                    case"replay":
                        window.location.replace("https://api.shanghaichujie.com/aiaGame/index");
                        break;
                    case"next_cp2":
                        cc.director.loadScene("check_point_2");
                        break;
                    case"next_cp3":
                        cc.director.loadScene("check_point_3");
                        break;
                    case"next_cp4":
                        cc.director.loadScene("check_point_4");
                        break;
                    case"next_cp5":
                        cc.director.loadScene("check_point_5");
                        break;
                    case"finish":
                        window.aia.end_time = (new Date).getTime(), window.aia.play_time = window.aia.end_time - window.aia.start_time;
                        var t = new XMLHttpRequest;
                        t.open("POST", "https://api.shanghaichujie.com/api/aiaGame/resultApi", !0), t.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), t.send("openid=" + window.aia.openid + "&score=" + window.aia.game_score + "&time=" + window.aia.play_time + "&result=1"), t.onreadystatechange = function () {
                            4 == this.readyState && 200 == this.status && window.location.replace("https://api.shanghaichujie.com/aiaGame/result?openid=" + window.aia.openid + "&score=" + window.aia.game_score + "&time=" + window.aia.play_time)
                        }
                }
            },
            feedback: function (e) {
                var t = cc.scaleTo(0, .9, .9);
                this.runAction(t)
            }
        }), cc._RF.pop()
    }, {}], Main: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "80c1ePgX5lJQJkb3a/ibAMl", "Main"), cc.Class({
            extends: cc.Component,
            properties: {
                food1: cc.Prefab,
                food2: cc.Prefab,
                food3: cc.Prefab,
                food4: cc.Prefab,
                food5: cc.Prefab,
                food6: cc.Prefab,
                food7: cc.Prefab,
                aia: cc.Prefab,
                peanut: cc.Prefab,
                meat: cc.Prefab,
                padding: 150,
                minDownDuration: 5,
                maxDownDuration: 10,
                speed: 1
            },
            onLoad: function () {
                this.getNode(), this.play_game(), this.current_scene = cc.director.getScene().name, this.foods = [];
                for (var e = 0; e < 7; e++) this["food" + (e + 1)] && this.foods.push(this["food" + (e + 1)]);
                this.special_foods = [this.aia, this.peanut, this.meat]
            },
            getNode: function () {
                this.tips = this.node.getChildByName("tips"), this.play_game_btn = this.tips.getChildByName("play_game"), this.main = this.node.getChildByName("main"), this.player = this.main.getChildByName("player"), this.cp_count = this.main.getChildByName("cp_count"), this.foods_container = this.main.getChildByName("foods_container"), this.time_container = this.main.getChildByName("time_container"), this.game_time = this.time_container.getChildByName("game_time"), this.score_container = this.main.getChildByName("score_container"), this.cp_score = this.score_container.getChildByName("cp_score"), this.pannel = this.main.getChildByName("pannel"), this.pannel.scale = 1.1, this.line1_label = this.pannel.getChildByName("line1").getChildByName("line1_label").getComponent("cc.Label"), this.line2_label = this.pannel.getChildByName("line2").getChildByName("line2_label").getComponent("cc.Label"), this.line3_label = this.pannel.getChildByName("line3").getChildByName("line3_label").getComponent("cc.Label"), this.success_container = this.node.getChildByName("success"), this.success_popup = this.success_container.getChildByName("popup"), this.best_title = this.node.getChildByName("best_title"), this.best_popup = this.best_title.getChildByName("popup"), this.title_tips = this.node.getChildByName("title_tips"), this.title_popup = this.title_tips.getChildByName("popup"), this.text1 = this.title_popup.getChildByName("text1"), this.text2 = this.title_popup.getChildByName("text2"), this.text3 = this.title_popup.getChildByName("text3"), this.text4 = this.title_popup.getChildByName("text4"), this.title_text = this.text1.getChildByName("title_text"), this.score = this.text2.getChildByName("score"), this.next_title = this.text3.getChildByName("next_title"), this.next_score = this.text4.getChildByName("next_score")
            },
            play_game: function () {
                var e = this;
                this.play_game_btn.on(cc.Node.EventType.TOUCH_START, function () {
                    var e = cc.scaleTo(0, .9, .9);
                    this.play_game_btn.runAction(e)
                }, this, !1), this.play_game_btn.on(cc.Node.EventType.TOUCH_END, function () {
                    var t = cc.scaleTo(0, 1, 1);
                    this.play_game_btn.runAction(t), this.tips.active = !1, this.main.active = !0;
                    var i = e.cp_count.getComponent("cc.Label");
                    e.countTimer = function () {
                        i.string--, i.string <= 0 && (e.unschedule(e.countTimer), e.cp_count.active = !1, e.start_game())
                    }, e.schedule(e.countTimer, 1)
                }, this, !1)
            },
            start_game: function () {
                var e = this, t = this.game_time.getComponent("cc.Label");
                this.foods_container.active = !0, e.foodsTimer = function () {
                    e.new_food(e.minDownDuration, e.maxDownDuration)
                }, e.schedule(e.foodsTimer, this.speed), e.gameTimer = function () {
                    t.string--, t.string <= 0 && this.fail(this.current_scene)
                }, e.schedule(e.gameTimer, 1)
            },
            new_food: function (e, t) {
                var i = this.random_food();
                this.foods_container.addChild(i), i.setPosition(this.randomPosition());
                var s = cc.moveTo(cc.random0To1() * (t - e) + e, cc.p(i.x, -this.node.height / 2)),
                    c = cc.callFunc(function () {
                        i.destroy()
                    }, i), a = cc.sequence(s, c);
                i.runAction(a)
            },
            random_food: function () {
                var e = Math.floor(cc.random0To1() * this.foods.length), t = cc.instantiate(this.foods[e]),
                    i = Math.floor(cc.random0To1() * this.special_foods.length),
                    s = cc.instantiate(this.special_foods[i]);
                return Math.floor(100 * cc.random0To1()) >= 90 ? s : t
            },
            randomPosition: function () {
                var e = cc.winSize, t = cc.random0To1() * (e.width - this.padding) - (e.width - this.padding) / 2,
                    i = this.node.height / 2 + 2 * this.padding;
                return cc.p(t, i)
            },
            set_score: function (e) {
                this.cp_score.getComponent("cc.Label").string = e
            },
            set_num: function (e, t, i, s) {
                this.line1_label.string = e, this.line2_label.string = t, this.line3_label.string = i, s && (this.line4_label = this.pannel.getChildByName("line4").getChildByName("line4_label").getComponent("cc.Label"), this.line4_label.string = s)
            },
            success: function () {
                this.stopAllschedule(), this.foods_container.active = !1, this.player.active = !1, this.success_container.active = !0, this.show_popup(this.success_popup)
            },
            fail: function (e) {
                window.aia.end_time = (new Date).getTime(), window.aia.play_time = window.aia.end_time - window.aia.start_time;
                var t = 0;
                switch (e) {
                    case"check_point_1":
                        t = 1;
                        break;
                    case"check_point_2":
                        t = 2;
                        break;
                    case"check_point_3":
                        t = 3;
                        break;
                    case"check_point_4":
                        t = 4;
                        break;
                    case"check_point_5":
                        t = 5
                }
                this.stopAllschedule(), this.send(t)
            },
            modify_title_show: function (e, t, i, s) {
                this.stopAllschedule(), this.player.active = !1, this.title_tips.active = !0, this.show_popup(this.title_popup);
                for (var c = 0, a = this.foods_container.children.length; c < a; c++) this.foods_container.children[c].pauseAllActions();
                this.title_text.getComponent("cc.Label").string = e, this.score.getComponent("cc.Label").string = i, this.next_title.getComponent("cc.Label").string = t, this.next_score.getComponent("cc.Label").string = s
            },
            best_title_show: function () {
                this.stopAllschedule(), this.player.active = !1, this.best_title.active = !0, this.show_popup(this.best_popup);
                for (var e = 0, t = this.foods_container.children.length; e < t; e++) this.foods_container.children[e].pauseAllActions()
            },
            title_close: function () {
                var e = this, t = this, i = t.cp_count.getComponent("cc.Label");
                i.string = 3, t.cp_count.active = !0, t.countTimer = function () {
                    i.string--, i.string <= 0 && (t.unschedule(t.countTimer), t.cp_count.active = !1, t.start_game())
                }, t.schedule(t.countTimer, 1), t.scheduleOnce(function () {
                    for (var t = 0, i = e.foods_container.children.length; t < i; t++) e.foods_container.children[t].resumeAllActions();
                    cc.director.getCollisionManager().enabled = !0
                }, 3), this.title_tips.active = !1, this.best_title.active = !1, 1 != this.success_container.active && (this.foods_container.active = !0, this.player.active = !0)
            },
            stopAllschedule: function () {
                this.unscheduleAllCallbacks(), cc.director.getCollisionManager().enabled = !1
            },
            show_popup: function (e) {
                e.scale = 0;
                var t = cc.scaleTo(.2, 1, 1);
                e.runAction(t)
            },
            send: function (e) {
                window.aia.end_time = (new Date).getTime(), window.aia.play_time = window.aia.end_time - window.aia.start_time;
                var t = new XMLHttpRequest;
                t.open("POST", "https://api.shanghaichujie.com/api/aiaGame/resultApi", !0), t.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), t.send("openid=" + window.aia.openid + "&score=" + window.aia.game_score + "&time=" + window.aia.play_time + "&result=0"), t.onreadystatechange = function () {
                    4 == this.readyState && 200 == this.status && window.location.replace("https://api.shanghaichujie.com/aiaGame/fail?openid=" + window.aia.openid + "&scene=" + e + "&score=" + window.aia.game_score + "&time=" + window.aia.play_time)
                }
            }
        }), cc._RF.pop()
    }, {}], Title: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "ad66bXS5o1Da4x702SxfsR4", "Title"), cc.Class({
            extends: cc.Component,
            properties: {},
            onLoad: function () {
                this.level = {
                    level_score1: window.aia.title_score_1,
                    level_score2: window.aia.title_score_2,
                    level_score3: window.aia.title_score_3,
                    level_score4: window.aia.title_score_4,
                    level_score5: window.aia.title_score_5
                }, this.server_score = 0, window.aia.title_score = window.aia.title_score || window.aia.server_score, this.title = "", this.title_label = this.node.getChildByName("title").getComponent("cc.Label"), this.init_title(), this.main = cc.find("Canvas").getComponent("Main")
            },
            init_title: function () {
                this.server_score = window.aia.server_score + window.aia.game_score, this.server_score < this.level.level_score1 ? this.title = "见习" : this.server_score >= this.level.level_score1 && this.server_score < this.level.level_score2 ? this.title = "初级" : this.server_score >= this.level.level_score2 && this.server_score < this.level.level_score3 ? this.title = "中级" : this.server_score >= this.level.level_score3 && this.server_score < this.level.level_score4 ? this.title = "高级" : this.server_score >= this.level.level_score4 && this.server_score < this.level.level_score5 ? this.title = "至尊" : this.server_score >= this.level.level_score5 && (this.title = "食神"), this.title_label.string = this.title, window.aia.title = this.title
            },
            update_title: function () {
                window.aia.score = window.aia.server_score + window.aia.game_score;
                var e = window.aia.score;
                window.aia.title_score < this.level.level_score1 ? e >= this.level.level_score1 && (this.title = "初级", this.main.modify_title_show(window.aia.title_text_1, window.aia.title_text_2, e, this.level.level_score2), window.aia.title_score = e) : window.aia.title_score < this.level.level_score2 ? e >= this.level.level_score2 && (this.title = "中级", this.main.modify_title_show(window.aia.title_text_2, window.aia.title_text_3, e, this.level.level_score3), window.aia.title_score = e) : window.aia.title_score < this.level.level_score3 ? e >= this.level.level_score3 && (this.title = "高级", this.main.modify_title_show(window.aia.title_text_3, window.aia.title_text_4, e, this.level.level_score4), window.aia.title_score = e) : window.aia.title_score < this.level.level_score4 ? e >= this.level.level_score4 && (this.title = "至尊", this.main.modify_title_show(window.aia.title_text_4, window.aia.title_text_5, e, this.level.level_score5), window.aia.title_score = e) : window.aia.title_score < this.level.level_score5 && e >= this.level.level_score5 && (this.title = "食神", this.main.best_title_show(), window.aia.title_score = e), this.title_label.string = this.title, window.aia.title = this.title
            }
        }), cc._RF.pop()
    }, {}], move: [function (e, t, i) {
        "use strict";
        cc._RF.push(t, "db7f7cG9aRIgqSQikE3FWUA", "move"), cc.Class({
            extends: cc.Component,
            properties: {},
            onLoad: function () {
                this.node.on(cc.Node.EventType.TOUCH_MOVE, function (e) {
                    this.node.x += e.getDelta().x
                }, this)
            }
        }), cc._RF.pop()
    }, {}]
}, {}, ["Cp1", "Cp2", "Cp3", "Cp4", "Cp5", "Link", "Main", "Title", "move"]);