<template lang="pug">
#member_app
  
  .container-fluid(v-if="auth.user")
    .row
      //- el-header
      .col-sm-2.col-nav(v-if="!mobile")
        el-menu(:default-active="activeIndex" 
          class="el-menu-demo" @select="handleSelect",
          :router="true")
          el-menu-item(index="/member/info") 會員資料管理 
          //- el-menu-item(index="/member/coupon", v-if="user.studentcard || isAdmin") 領取Coupon 
          el-menu-item(index="/member/registexpo2018") 報名2018展覽
          //- el-menu-item(index="/manage/company") 攤位管理 
          //- el-menu-item(index="/manage/cata") 類別管理 
        //- auth_panel(layout="function")
        router-link.btn(to="/") 返回首頁

      .col-sm-10.col-content(:class="{'offset-2': !mobile}")
        transition(name="fade", mode="out-in")
          router-view(:key="$route.path")
      .col-sm-12
        el-footer
  .container-fluid.login(v-else)
    h3 請先登入後再使用會員功能哦！
    auth_panel
    
</template>

<script>
import {mapState, mapGetters} from 'vuex'
export default {
  name: 'manage_app',
  data(){
    return {
      activeIndex: '1'
    }
  },
  methods:{
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    }
  },
  computed: {
    ...mapGetters({
      canManage: 'auth/canManage',
      isAdmin: 'auth/isAdmin',
    }),
    ...mapState({
      auth: 'auth',
      user: state=>state.auth.user,
      mobile: state=>state.mobile
    })
  }
}
</script>

<style lang="sass">
#member_app
  background-color: #eee
  font-family: 'Avenir', Helvetica, Arial, sans-serif
  -webkit-font-smoothing: antialiased
  -moz-osx-font-smoothing: grayscale
  text-align: center
  color: #2c3e50
  // background-color: #fafafa
  min-height: 100vh
  .container-fluid
    padding: 20px
    &.login
      width: 100%
      height: 100%
      display: flex
      justify-content: center
      align-items: center
      flex-direction: column
        

  .col-nav
    position: fixed
    top: 150px
  .auth-card
    box-shadow: 0px 0px 20px rgba(black,0.1)
  label
    font-size: 15px
    font-weight: 800
    color: rgb(44, 62, 80)
    margin-top: 15px
    // display: block

</style>
