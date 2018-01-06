// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

import axios from 'axios'
import VueAxios from 'vue-axios'
import VueQuillEditor from 'vue-quill-editor'

// require styles
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

Vue.use(VueQuillEditor, /* { default global options } */)

Vue.use(VueAxios, axios)

Vue.use(ElementUI)


Vue.mixin({
  methods: {
    strip_tags(txt) {
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
        url: '/api/upload',
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
      let use_url = url.replace("http://dschool.ntu.edu.tw/assets/", "/dschool_old_assets/")
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

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
