import member_layout from '@/components/member/member_layout'
import member_info from '@/components/member/member_info'
import member_coupon from '@/components/member/member_coupon'
let routes = {
  path: '/member',
  meta: {
    member: true,
    navHide: true
  },
  component: member_layout,
  children: [
    {
      path: '',
      redirect: '/member/info',
      component: member_info
    }, {
      path: 'info',
      component: member_info
    }, {
      path: 'coupon',
      component: member_coupon
    }
  ]
}
  
export default routes