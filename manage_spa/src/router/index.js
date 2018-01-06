import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import manage_post from '@/components/pages/manage_post'
import manage_post_edit from '@/components/pages/manage_post_edit'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      redirect: '/post',
    },
    {
      path: '/post',
      name: 'HelloWorld',
      component: manage_post
    },{
      path: '/post/:id',
      component: manage_post_edit
    }
  ]
})
