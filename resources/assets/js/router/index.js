import $ from 'jquery'

import Vue from 'vue'
import VueRouter from 'vue-router'
import Meta from 'vue-meta'
Vue.use(VueRouter)
Vue.use(Meta)

// import page_service from '../components/page_service';
// // import page_works from '../components/page_work';
// // import page_works_indep from '../components/page_work_indep';

// import page_artist from '../components/page_artist';
// import page_artist_indep from '../components/page_artist_indep';

// import page_works from '../components/page_works';
// import page_works_indep from '../components/page_works_indep';

// import page_blog from '../components/page_blog';
// import page_post_indep from '../components/page_post_indep';

// import page_contact from '../components/page_contact';

const routes = [
  { path: '/', component: require( '../pages/page_index.vue') },
  { path: '/news', component: require( '../pages/page_news.vue') },
  { path: '/expo', component: require( '../pages/page_expo.vue') },
  { path: '/ticket',redirect: '/expo2017', component: require( '../pages/page_ticket.vue') },
  { path: '/about', component: require( '../pages/page_about.vue') },
  { path: '/blog', component: require( '../pages/page_blog.vue')},

  { path: '/expo2017', component: require( '../pages/page_expo_2017.vue') },
  { path: '/expo2017/workshops', component: require( '../pages/page_workshop_2017.vue') },
  { path: '/expo2017/attends', component: require( '../pages/page_attends.vue')},
  { path: '/blog/:filter_cata', component: require( '../pages/page_blog.vue') ,props: true},
  { path: '/post/n/:title', component: require( '../pages/page_post.vue') ,props: true},
  // { path: '/service', component: page_service },

  // { path: '/works', component: page_works },
  // { path: '/works/:wkid', component: page_works_indep ,props: true},

  // { path: '/artist', component: page_artist},
  // { path: '/artist/:wkid', component: page_artist_indep ,props: true},
  // { path: '/blog', component: page_blog },
  // { path: '/blog/:wkid', component: page_post_indep ,props: true},
  // { path: '/contact', component: page_contact }
]

const router = new VueRouter({
  routes,
  mode: "history"
})
router.beforeEach((to, from, next) => {
  setTimeout(()=>{
    $("html,body").animate({scrollTop: 0});
  },100)
  next()
})


export default router;