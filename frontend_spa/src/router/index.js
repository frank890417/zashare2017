import Vue from 'vue'
import Router from 'vue-router'
import pageIndex from '@/components/pages/page_index.vue'
import pageTheme from '@/components/pages/page_theme.vue'
import pageExpo from '@/components/pages/page_expo.vue'

Vue.use(Router)

export default new Router({
  mode: "history",
  routes: [
    {
      path: '/',
      name: 'index',
      component: pageIndex
    },
    {
      path: '/course',
      name: 'course',
      component: pageTheme
    },
    {
      path: '/base',
      name: 'base',
      component: pageTheme
    },

    {
      path: '/expo',
      name: 'expo',
      component: pageTheme
    },
    {
      path: '/expo/all',
      name: 'expoall',
      component: pageExpo
    },


  ]
})
