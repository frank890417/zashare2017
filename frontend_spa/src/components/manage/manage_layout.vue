<template lang="pug">
#manage_app
  
  .container-fluid(v-if="canManage")
    .row
      //- el-header
      .col-sm-2.col-nav
        el-menu(:default-active="activeIndex" 
          class="el-menu-demo" @select="handleSelect",
          :router="true")
          el-menu-item(index="/manage/news") 新聞管理 
          el-menu-item(index="/manage/post") 文章管理 
          el-menu-item(index="/manage/company") 攤位管理 
          el-menu-item(index="/manage/expo") 展覽管理 
          el-menu-item(index="/manage/cata") 類別管理
          el-menu-item(index="/manage/coupon" v-if="isAdmin") Coupon管理 
          el-menu-item(index="/manage/regist" v-if="isAdmin") 參展報名
          el-menu-item(index="/manage/user" v-if="isAdmin") 使用者管理
        p.mt-4(v-if="!isAdmin") (編輯帳號僅能管理文章與新聞)
        auth_panel.mt-4(layout="function")
        router-link.btn(to="/") 返回首頁

      .col-sm-10.offset-2.col-content
        transition(name="fade", mode="out-in")
          router-view(:key="$route.path")
      .col-sm-12
        el-footer
  .container-fluid.login(v-else)
    h1 抱歉，你好像沒有管理權限 :(
    auth_panel
    
</template>

<script>
import {mapGetters} from 'vuex'
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
      isAdmin: 'auth/isAdmin'
    })
  }
}
</script>

<style lang="sass">
#manage_app 
  font-family: 'Avenir', Helvetica, Arial, sans-serif
  -webkit-font-smoothing: antialiased
  -moz-osx-font-smoothing: grayscale
  text-align: center
  color: #2c3e50
  background-color: #fafafa
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
</style>
