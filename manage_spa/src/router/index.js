import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import manage_post from '@/components/pages/manage_post'
import manage_team from '@/components/pages/manage_team'
import manage_cata from '@/components/pages/manage_cata'
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
      name: 'post list',
      component: manage_post
    }, {
      path: '/company',
      name: 'company list',
      component: manage_team
    }, {
      path: '/cata',
      name: 'cata list',
      component: manage_cata
    },
    {
      path: '/post/new',
      name: 'HelloWorld',
      component: manage_post_edit
    },{
      path: '/post/:id',
      component: manage_post_edit
    }
  ]
})
