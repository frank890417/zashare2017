import "bootstrap/dist/css/bootstrap.min.css"
import "slick-carousel/slick/slick.css"
import 'element-ui/lib/theme-chalk/index.css'

import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/zh-TW'
Vue.use(ElementUI, { locale })

import softscroll from 'monoame-softscroll'
// softscroll.init()

//
// ─── VUE AND ROUTER BASIC SETTINGS ──────────────────────────────────────────────
//

  

import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import axios from 'axios'
import VueAxios from 'vue-axios'

import VueI18n from 'vue-i18n'
import messages from './i18n/messages.js'

Vue.use(VueI18n)

const i18n = new VueI18n({
  locale: localStorage.zashare_locale || "zh",
  messages
});


import VueAnalytics from 'vue-analytics'
if (document.domain =="zashare.org") {
  Vue.use(VueAnalytics, {
    id: 'UA-52977512-16',
    router
  })
}

Vue.use(VueAxios, axios)
Vue.use(ElementUI)

// axios.defaults.timeout = 5000;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';
axios.defaults.baseURL = process.env.API_DOMAIN;

//
// ───  ──────────────────────────────────────────────────────────────────────────
//

//取得網址的query string 轉換為物件
window.queryObject = (window.location.href.split("?")[1] || "")
  .split("&")
  .reduce((obj, text) => {
    obj[text.split("=")[0]] = text.split("=")[1];
    return obj;
  }, {});


if (queryObject.reset_token) {
  store.commit("setResetToken", queryObject.reset_token);
}


store.dispatch("scroll/init")
store.dispatch("auth/init")
store.dispatch("post/loadWebsite")
store.dispatch("manage/loadWebsite")
store.dispatch("loadExpos")



Vue.config.productionTip = false;

import page_loading from './components/pages/page_loading.vue'
import navbar from './components/navbar.vue'
import full_menu from './components/full_menu.vue'
import newsbox from './components/newsbox.vue'
import auth_panel from './components/auth_panel.vue'
import section_footer from './components/section_footer.vue'
import csv_export from "./components/csv_export.vue";
Vue.component("page_loading", page_loading)
Vue.component("navbar", navbar)
Vue.component("full_menu", full_menu)
Vue.component("newsbox", newsbox)
Vue.component("auth_panel", auth_panel)
Vue.component("section_footer", section_footer)
Vue.component("csv_export", csv_export);

import full_page from './components/full_page.vue'
Vue.component("full_page", full_page)

Vue.mixin({
  computed: {
    apiDomain(){
      return process.env.API_DOMAIN
    }
  },
  methods: {
    replaceBr(text){
      return text.replace(/\n/g,"<br>")
    },
    bgcss(url){
      let trans_url = (url || "")
        .replace(/..\/..\//g,"/")
        .replace(/\/dropzone\/uploads/g, "dropzone/uploads/")
      return {
        'background-image': `url("${trans_url}")`,
        'background-position': 'center center'
      }

    }, strip_tags(txt) {
      let result = ("" + txt).replace(/(<([^>]+)>)/ig, "")
      return result
    },
    handleImageAdded(file, Editor, cursorLocation) {
      // An example of using FormData
      // NOTE: Your key could be different such as:
      // formData.append('file', file)
      console.log("get picture!")
      var formData = new FormData();
      formData.append('file', file)
      console.log(file)

      axios({
        url: process.env.API_DOMAIN+'/api/upload',
        method: 'POST',
        data: formData
      })
        .then((result) => {
          let url = result.data // Get url from response
          Editor.insertEmbed(cursorLocation, 'image', url);
        })
        .catch((err) => {
          console.log(err);
        })
    },

    uploadFile(filedata) {
      // An example of using FormData
      // NOTE: Your key could be different such as:
      // formData.append('file', file)
      console.log(filedata)
      var formData = new FormData();
      formData.append('file', filedata.file)
      formData.append('token', store.state.auth.token)
      console.log(formData)

      axios({
        url: process.env.API_DOMAIN + 'api/registexpo/uploadtemp',
        method: 'POST',
        data: formData
      })
      .then((result) => {
        let url = result.data // Get url from response
        console.log(result.data)
      })
      .catch((err) => {
        console.log(err);
      })
    }, 
    cssbg(url) {
      let use_url = url
      let result = {
        'background-image': `url("${use_url}")`
      }
      // console.log(result)
      return result
    },
    scrollTo(cname, custon_option) {
      let options = Object.assign({
        pan: 0
      },
        custon_option
      )
      $("html,body").animate({ scrollTop: $(cname).password_confirmationoffset().top + options.pan })
    },
    getDurationText(date1,date2){
      //傳入兩個日期，傳回連結字 (e.g. 10/20,10/22 -> 10/20-22  )
      console.log(date1,date2)
      let m1 = date1.split('-')[1]
      let m2 = date2.split('-')[1]
      let d1 = date1.split('-')[2]
      let d2 = date2.split('-')[2]
      if (m1==m2){
        return m1+"/"+d1+"-"+d2
      }else{

        return m1 + "/" + d1 + "-" + m2 + "/" + d2
      }
      return ""
    },
    
  }
})

//
// ─── SHOW INIT LOADING ──────────────────────────────────────────────────────────
//

  

if (process.env.NODE_ENV == "development") {
  
  setTimeout(() => {
    store.commit("setLoading", false)
  }, 500);
}
if (process.env.NODE_ENV == "production") {

  setTimeout(() => {
    store.commit("setLoading", false)
  }, 3000);

}

import ImageProloader from "./plugins/image-preloader"
window.preload_all = ImageProloader.preload_all

import themes from "@/data/themes.js"
let loadgroups = 
  [
    Object.values(themes).map(v => v.cover),
    Object.values(themes).map(v => v.slogan_image),
    store.state.expos.map(v => v.cover),
    store.state.expos.map(v => v.report_cover),
    ["https://service.zashare.org/img/2017/index_za_logo_white.svg"]
  
  ].reduce((pre, cur) => {
    return pre = pre.concat(cur)
  }, [])

preload_all(loadgroups).then(() => {
  console.log('load all success!')
  // store.commit("setLoading", false)
}).catch(() => {
  console.log("oh no")
})

// ────────────────────────────────────────────────────────────────────────────────


window.onresize=function(){
  store.commit("setMobile", window.innerWidth < 1200)
}


if (queryObject.reset_token) {
  store.commit("setResetToken",queryObject.reset_token);
  store.commit("openMenu", "login");
}

/* eslint-disable no-new */
let vm = new Vue({
  el: '#app',
  router,
  store,
  i18n,
  components: { App, navbar, full_menu, page_loading},
  template: '<App/>'
})
// window.vm=vm