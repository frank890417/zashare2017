import Vue from 'vue'
import Router from 'vue-router'
import pageIndex from '@/components/pages/page_index.vue'
import pageNews from '@/components/pages/page_news.vue'
import pagePost from '@/components/pages/page_post.vue'
import pageTheme from '@/components/pages/page_theme.vue'
import pageExpo from '@/components/pages/page_expo.vue'
import pageExpoYear from '@/components/pages/page_expo_year.vue'

Vue.use(Router)

import manage_layout from '@/components/manage/manage_layout'
import manage_post from '@/components/manage/manage_post'
import manage_team from '@/components/manage/manage_team'
import manage_cata from '@/components/manage/manage_cata'
import manage_post_edit from '@/components/manage/manage_post_edit'
import manage_company_edit from '@/components/manage/manage_team_edit'


export default new Router({
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
      component: pageNews,
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
      path: '/news/:id',
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
          path: 'post/new',
          name: 'HelloWorld',
          component: manage_post_edit
        }, {
          path: 'post/:id',
          component: manage_post_edit
        }, {
          path: 'company/:id',
          component: manage_company_edit
        },
      ]
    }

  ]
})
