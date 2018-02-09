import Vue from 'vue'
import Router from 'vue-router'
import store from '../store'
import $ from 'jquery'
Vue.use(Router)


import pageIndex from '@/components/pages/page_index.vue'
import pageBlog from '@/components/pages/page_blog.vue'
import pagePost from '@/components/pages/page_post.vue'
import pageTheme from '@/components/pages/page_theme.vue'
import pageExpo from '@/components/pages/page_expo.vue'
import pageExpoYear from '@/components/pages/page_expo_year.vue'

import manage_layout from '@/components/manage/manage_layout'
import manage_post from '@/components/manage/manage_post'
import manage_news from '@/components/manage/manage_news'
import manage_team from '@/components/manage/manage_team'
import manage_cata from '@/components/manage/manage_cata'
import manage_post_edit from '@/components/manage/manage_post_edit'
import manage_company_edit from '@/components/manage/manage_team_edit'

let router = new Router({
  mode: "history",
  routes: [
    {
      path: '/',
      name: 'index',
      component: pageIndex,
      meta: {
        navWidth: "350px"
      }
    },
    {
      path: '/course',
      name: 'course',
      component: pageTheme,
      meta: {
        type: "theme",
        next: {
          path: '/expo/main'

        }
      }
    },
    {
      path: '/news',
      name: 'news',
      component: pageBlog,
      meta: {
        type: "news",
        action: "back",
        navWidth: "350px",
        back: {
          name: "INDEX",
          path: "/"
        },
        navPosition: "left"
      }
    },
    {
      path: '/news/:post_id',
      component: pagePost,
      meta: {
        type: "news",
        action: "back",
        navWidth: "350px",
        back: {
          name: "INDEX",
          path: "/"
        },
        navPosition: "left"
      }
    },
    {
      path: '/base',
      name: 'base',
      component: pageTheme,
      meta: {
        type: "theme",
        next: {
          path: '/expo/main'

        }
      }
    },

    {
      path: '/expo',
      name: 'expo',
      component: pageTheme,
      meta: {
        type: "theme",
        next: {
          path: '/expo/main'

        }
      }
    },
    {
      path: '/expo/main',
      name: 'expo_main',
      component: pageExpo,
      meta: {
        navWidth: "350px",
        action: "back",
        back: {
          name: "ZA EXPO",
          path: "/expo"
        },
        navPosition: "left"
      }
    },
    {
      path: '/expo/:year',
      name: 'expo_indep',
      component: pageExpoYear,
      meta: {
        navWidth: "350px",
        action: "back",
        back: {
          name: "ZA EXPO",
          path: "/expo"
        },
        navPosition: "left"
      }
    },
    {
      path: '/expo/:year/blog',
      name: 'expo_indep',
      component: pageBlog,
      meta: {
        type: "expo",
        navWidth: "350px",
        action: "back",
        back: {
          name: "ZA EXPO",
          path: "/expo"
        },
        navPosition: "left"
      }
    },
    {
      path: '/expo/:year/blog/:post_id',
      name: 'expo_indep',
      component: pagePost,
      meta: {
        type: "expo",
        navWidth: "350px",
        action: "back",
        back: {
          name: "ZA EXPO",
          path: "/expo"
        },
        navPosition: "left"
      }
    },
    {
      path: '/expo/blog/:post_id',
      name: 'expo_indep',
      component: pagePost,
      meta: {
        navWidth: "350px",
        action: "back",
        back: {
          name: "ZA EXPO",
          path: "/expo"
        },
        navPosition: "left"
      }
    },
    {
      path: '/manage',
      meta: {
        manage: true,
        navHide: true
      },
      component: manage_layout,
      children: [
        {
          path: '',
          redirect: '/manage/post',
          // component: manage_post
        },
        {
          path: 'post',
          name: 'post list',
          component: manage_post
        },
        {
          path: 'news',
          name: 'news list',
          component: manage_news
        }, {
          path: 'company',
          name: 'company list',
          component: manage_team
        }, {
          path: 'cata',
          name: 'cata list',
          component: manage_cata
        },
        {
          path: 'news/new',
          component: manage_post_edit,
          meta: {
            type: "news"
          }
        },
        {
          path: 'post/new',
          component: manage_post_edit,
          meta:{
            type: "post"
          }
        }, {
          path: 'post/:id',
          component: manage_post_edit,
          meta: {
            type: "post"
          }
        }, {
          path: 'news/:id',
          component: manage_post_edit,
          meta: {
            type: "news"
          }
        }, {
          path: 'company/:id',
          component: manage_company_edit
        },
      ]
    }

  ]
})

var savePositions = {}
router.beforeEach((to, from, next) => {
  console.log(to);
  if (to.path.indexOf("/manage") == 0) {
  } else {
    window.softScrollDisable = false
  }



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
      $("html, body").animate({ scrollTop: savePositions[route.path] }, 50);
    }, 600)
  } else {
    setTimeout(function () {
      // window.scrollTo(0, savePositions[route.path])
      console.log("Scroll To 0")
      $("html, body").animate({ scrollTop: 0 }, 50);
    }, 600)

  }


});

export default router