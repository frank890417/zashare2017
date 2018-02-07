import Vue from 'vue'
import Router from 'vue-router'
import pageIndex from '@/components/pages/page_index.vue'
import pageNews from '@/components/pages/page_news.vue'
import pagePost from '@/components/pages/page_post.vue'
import pageTheme from '@/components/pages/page_theme.vue'
import pageExpo from '@/components/pages/page_expo.vue'
import pageExpoYear from '@/components/pages/page_expo_year.vue'

Vue.use(Router)

export default new Router({
  // mode: "history",
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
      name: 'news',
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


  ]
})
