import pageLogin from '@/components/pages/page_login.vue'
import pageIndex from '@/components/pages/page_index.vue'
import pageAbout from '@/components/pages/page_about.vue'
import pageBlog from '@/components/pages/page_blog.vue'
import pagePost from '@/components/pages/page_post.vue'
import pageTheme from '@/components/pages/page_theme.vue'
import pageBase from '@/components/pages/page_base.vue'
import pageCourse from '@/components/pages/page_course.vue'
import pageExpo from '@/components/pages/page_expo.vue'
import pageExpoYear from '@/components/pages/page_expo_year.vue'

let routes = 
[
  {
    path: '/',
    name: 'index',
    component: pageIndex,
    meta: {
      navWidth: "350px",
      mobilenav: {
        color: "white",
        // text: "INDEX",
        img: "/static/img/Home/za-logo.svg"
      },
      font_flush_delay: 800,
    }
  },
  {
    path: '/course',
    name: 'COURSE',
    component: pageTheme,
    meta: {
      type: "theme",
      next: {
        path: '/course/main'

        }
    }
  },
  {
    path: '/news',
    name: 'news',
    component: pageBlog,
    meta: {
      type: "news",
      // action: "back",
      navWidth: "350px",
      // back: {
      //   name: "INDEX",
      //   path: "/"
      // },
      subBack: {
        name: "回首頁",
        path: "/"

        },
      mobilenav: {
        color: "white",
        text: "NEWS"
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
      no_font_flush: true,
      font_flush_delay: 400,
      back: {
        name: "NEWS",
        path: "/news"
        },
      subBack: {
        name: "回首頁",
        path: "/"

        },
      mobilenav: {
        color: "white",
        text: "NEWS"
        },
      navPosition: "left"
      }
  },
  {
    path: '/base',
    name: 'BASE',
    component: pageTheme,
    meta: {
      type: "theme",
      next: {
        path: '/base/main'

        }
    }
  },

  {
    path: '/expo',
    name: 'EXPO',
    component: pageTheme,
    meta: {
      type: "theme",
      next: {
        path: '/expo/main'

        }
    }
  },
  {
    path: '/about',
    name: 'about',
    component: pageAbout,
    meta: {
      navWidth: "350px",
      action: "back",
      back: {
        name: "INDEX",
        path: "/"
        },
      mobilenav: {
        color: "white",
        text: "關於雜學校"
        },
      navPosition: "left"
      }
  },


  {
    path: '/base/main',
    name: 'base_indep',
    component: pageBase,
    meta: {
      navWidth: "350px",
      action: "back",
      back: {
        name: "ZA BASE",
        path: "/base"
        },
      navPosition: "left"
      }
  },
  {
    path: '/course/main',
    name: 'course_indep',
    component: pageCourse,
    meta: {
      navWidth: "350px",
      action: "back",
      back: {
        name: "ZA COURSE",
        path: "/course"
        },
      navPosition: "left"
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
      subBack: {
        name: "返回歷屆展覽",
        path: "/expo/main"

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
      subBack: {
        name: "返回歷屆展覽",
        path: "/expo/main",
        params: ["year"]

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
      no_font_flush: true,
      back: {
        name: "ZA EXPO",
        path: "/expo"
        },
      subBack: {
        name: "返回{year}展覽報導",
        path: "/expo/{year}/blog",
        params: ["year"]

      },
      navPosition: "left"
      }
  },
  {
    path: '/expo/blog/:post_id',
    name: 'expo_indep',
    component: pagePost,
    meta: {
      type: "post",
      navWidth: "350px",
      action: "back",
      font_flush_delay: 400,
      back: {
        name: "ZA EXPO",
        path: "/expo"
        },
      navPosition: "left"
      }
  },
  {
    path: '/login',
    name: 'login',
    component: pageLogin,
    meta: {
      type: "post",
      navWidth: "350px",
      action: "back",
      // font_flush_delay: 400,
      back: {
        name: "ZA EXPO",
        path: "/expo"
        },
      navPosition: "left"
      }
  }
]

export default routes