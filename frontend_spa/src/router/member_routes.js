import member_layout from '@/components/member/member_layout'
import member_index from '@/components/member/member_index'
import member_info from '@/components/member/member_info'
import member_coupon from '@/components/member/member_coupon'
import member_registexpo from '@/components/member/member_registexpo'
import member_registexpo_paid from '@/components/member/member_registexpo_paid'
import member_registexpo_workshop from '@/components/member/member_registexpo_workshop'
import member_registexpo_speak from '@/components/member/member_registexpo_speak'
import panel_expo2018 from '@/components/panels/panel_expo2018'
let routes = {
  path: '/member',
  meta: {
    member: true,
    navHide: true
  },
  component: member_layout,
  children: [
    {
      path: '/',
      // redirect: '/member/info',
      component: member_index,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }, {
      path: 'info',
      component: member_info,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }, {
      path: 'coupon',
      component: member_coupon,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }, {
      path: 'registexpo2018',
      component: panel_expo2018,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }, {
      path: 'registexpo',
      component: member_registexpo,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }, {
      path: 'registexpo/paid',
      component: member_registexpo_paid,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }, {
      path: 'registexpo/workshop',
      component: member_registexpo_workshop,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }, {
      path: 'registexpo/speak',
      component: member_registexpo_speak,
      meta: {
        navPosition: "left",
        navWidth: "350px",
      }
    }
  ]
}
  
export default routes