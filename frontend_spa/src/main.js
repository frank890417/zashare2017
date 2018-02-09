import "bootstrap/dist/css/bootstrap-grid.min.css"
import "slick-carousel/slick/slick.css"

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

// require styles
// import 'quill/dist/quill.core.css'
// import 'quill/dist/quill.snow.css'
// import 'quill/dist/quill.bubble.css'


// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import axios from 'axios'
import VueAxios from 'vue-axios'

import VueAnalytics from 'vue-analytics'
if (document.domain =="zashare.org") {
  Vue.use(VueAnalytics, {
    id: 'UA-52977512-12',
    router
  })
}

// import VueQuillEditor from 'vue-quill-editor'

// Vue.use(VueQuillEditor, /* { default global options } */)

Vue.use(VueAxios, axios)

Vue.use(ElementUI)

// axios.defaults.timeout = 5000;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';
axios.defaults.baseURL = process.env.API_DOMAIN;

store.dispatch("scroll/init")
store.dispatch("auth/init")
store.dispatch("post/loadWebsite")
store.dispatch("manage/loadWebsite")

Vue.config.productionTip = false

import navbar from './components/navbar.vue'
import full_menu from './components/full_menu.vue'
import newsbox from './components/newsbox.vue'
import auth_panel from './components/auth_panel.vue'
Vue.component("navbar", navbar)
Vue.component("full_menu", full_menu)
Vue.component("newsbox", newsbox)
Vue.component("auth_panel", auth_panel)

Vue.mixin({
  methods: {
    replaceBr(text){
      return text.replace(/\n/g,"<br>")
    },
    bgcss(url){
      let trans_url = (url || "")
        .replace(/..\/..\//g,"/")
        .replace(/\/dropzone\/uploads/g, "http://service.zashare.org/dropzone/uploads/")
      return {
        'background-image': `url("${trans_url}")`
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
    cssbg(url) {
      let use_url = url.replace("http://service.zashare.org/assets/", "/dschool_old_assets/")
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
      $("html,body").animate({ scrollTop: $(cname).offset().top + options.pan })
    },

  }
})


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App, navbar, full_menu },
  template: '<App/>'
})
