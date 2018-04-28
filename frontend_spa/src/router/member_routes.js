import member_layout from '@/components/member/member_layout'
import member_index from '@/components/member/member_index'
import member_info from '@/components/member/member_info'
import member_coupon from '@/components/member/member_coupon'
import member_registexpo from '@/components/member/member_registexpo'
import member_registexpo_paid from '@/components/member/member_registexpo_paid'
import member_registexpo_workshop from '@/components/member/member_registexpo_workshop'
import member_registexpo_speak from '@/components/member/member_registexpo_speak'
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
      component: member_index
    }, {
      path: 'info',
      component: member_info
    }, {
      path: 'coupon',
      component: member_coupon
    }, {
      path: 'registexpo',
      component: member_registexpo
    }, {
      path: 'registexpo/paid',
      component: member_registexpo_paid
    }, {
      path: 'registexpo/workshop',
      component: member_registexpo_workshop
    }, {
      path: 'registexpo/speak',
      component: member_registexpo_speak
    }
  ]
}
  
export default routes