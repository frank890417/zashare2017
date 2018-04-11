import Vue from 'vue'
import Router from 'vue-router'
import store from '../store'
import $ from 'jquery'
Vue.use(Router)


let router = new Router({
  mode: "history",
  routes: [
    ...require("./site_routes").default,
    require("./manage_routes").default,
    require("./member_routes").default
    
  ]
})

var savePositions = {}
var jfFontLoaded = {}
router.beforeEach((to, from, next) => {
  console.log(to);

  if (to.meta.preload_img){
    console.log(to.meta.preload_img)
  }

  if (to.path.indexOf("/manage") == 0) {
  } else {
    window.softScrollDisable = false
  }
  // if (to.meta.type=="news" || to.meta.type=="post"){
    
  // }

  if (to.path.indexOf("/manage") == 0) {
    window.softScrollDisable = true
  } else {
    window.softScrollDisable = false
  }
  savePositions[from.path] = $(window).scrollTop()

  next()
})

//送出pageview
router.afterEach((route) => {
  if (window.ga) {
    ga('send', 'pageview', route.path);
  }
  if (savePositions[route.path]) {
    setTimeout(function () {
      // window.scrollTo(0, savePositions[route.path])
      console.log("Scroll To Saved Path:" + savePositions[route.path])
      $("html, body").animate({ scrollTop: savePositions[route.path] }, 0);
    }, 0)
  } else {
    setTimeout(function () {
      // window.scrollTo(0, savePositions[route.path])
      console.log("Scroll To 0")
      $("html, body").animate({ scrollTop: 0 }, 0);
    }, 0)


    if (!jfFontLoaded[route.path] && !route.meta.no_font_flush){
      setTimeout(() => {
        _jf.flush();
        if (window.jfFontLoaded) {
          window.jfFontLoaded[route.path] = true;

        }
      }, route.meta.font_flush_delay || 100);
    }
  }

});

export default router