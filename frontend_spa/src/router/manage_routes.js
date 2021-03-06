
import manage_layout from '@/components/manage/manage_layout'
import manage_post from '@/components/manage/manage_post'
import manage_news from '@/components/manage/manage_news'
import manage_team from '@/components/manage/manage_team'
import manage_cata from '@/components/manage/manage_cata'
import manage_coupon from '@/components/manage/manage_coupon'
import manage_regist from '@/components/manage/manage_regist'
import manage_expo from '@/components/manage/manage_expo'
import manage_user from "@/components/manage/manage_user";
// import manage_registexpo from '@/components/manage/manage_registexpo'
import manage_post_edit from '@/components/manage/manage_post_edit'
import manage_company_edit from '@/components/manage/manage_team_edit'

let routes = {
  path: "/manage",
  meta: {
    manage: true,
    navHide: true,
    navPosition: "left"
  },
  component: manage_layout,
  children: [
    {
      path: "",
      redirect: "/manage/post"
      // component: manage_post
    },
    {
      path: "user",
      name: "user list",
      component: manage_user
    },
    {
      path: "post",
      name: "post list",
      component: manage_post
    },
    {
      path: "news",
      name: "news list",
      component: manage_news
    },
    {
      path: "company",
      name: "company list",
      component: manage_team
    },
    {
      path: "cata",
      name: "cata list",
      component: manage_cata
    },
    {
      path: "coupon",
      name: "coupon list",
      component: manage_coupon
    },
    {
      path: "regist",
      name: "regist list",
      component: manage_regist
    },
    {
      path: "expo",
      name: "expo list",
      component: manage_expo
    },
    {
      path: "news/new",
      component: manage_post_edit,
      meta: {
        type: "news"
      }
    },
    {
      path: "post/new",
      component: manage_post_edit,
      meta: {
        type: "post"
      }
    },
    {
      path: "post/:id",
      component: manage_post_edit,
      meta: {
        type: "post"
      }
    },
    {
      path: "news/:id",
      component: manage_post_edit,
      meta: {
        type: "news"
      }
    },
    {
      path: "company/:id",
      component: manage_company_edit
    }
  ]
};

export default routes