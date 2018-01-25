// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import "bootstrap/dist/css/bootstrap-grid.min.css"
import "slick-carousel/slick/slick.css"

Vue.config.productionTip = false

import navbar from './components/navbar.vue'
import full_menu from './components/full_menu.vue'
Vue.component("navbar", navbar)
Vue.component("full_menu", full_menu)

Vue.mixin({
  methods: {
    bgcss(url){
      return {
        'background-image': `url("${url}")`
      }

    }
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
