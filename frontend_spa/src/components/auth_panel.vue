<template lang="pug">
.auth-card
  transition(name="fade")
    div(v-if="layout=='card'")
      transition(name="fade")
        .card-loading(v-if="auth.processing")
      .top
        .photo(:style="bgcss(getUserPhoto(auth.user))")
        h3.name
          span(v-if="auth.user") {{ auth.status ||  `Hello ! 雜學校學生　${auth.user.name}` }}
          span(v-else) {{ auth.status || '這名學生未登入哦！' }}
      .bottom(v-if="mode=='login' && !auth.user")
        h4.login-title 登入雜學校
        //- label 信箱
        input(v-model="loginData.email", placeholder="信箱", type="email")
        //- label 密碼
        input.loginPwd(v-model="loginData.password", placeholder="密碼" , type="password")
        button.btn.fw.black(@click="login(loginData)") 登入
        //- button.btn.fw(@click="loginFacebook") 使用 Facebook 登入
        button.btn.fw.nobg 忘記密碼
        button.btn.fw.nobg(@click="mode='register'") 註冊為雜學校學生
      .bottom(v-if="mode=='register' && !auth.user")
        h4 會員註冊
        //- label email
        el-input(v-model="registerData.email", placeholder="電子郵件(登入帳號)", type="email", name="email", autocomplete="on")
        //- label name
        el-input(v-model="registerData.name", placeholder="名字", type="name", name="name", autocomplete="on")
        label.mention ※若您持有「雜學校學生證」，請務必填寫您的真實姓名，方便核對身分及保障您的權益。
        el-select(v-model="registerData.jobcata", placeholder="現職產業別" , name="jobcata", autocomplete="on", style="width: 100%")
          el-option(v-for= "(jb,jbid) in auth.jobcatas", 
                :value="jb", :label="jb") {{jb}}
        el-input(v-model="registerData.job", :placeholder="jobInforLabel", type="job", name="job", autocomplete="on")
        el-input(v-model="registerData.password", placeholder="密碼", type="password")
        button.btn.fw.black(@click="register(registerData)") 註冊
        //- label(v-if="auth.status") {{auth.status}}
        button.btn.fw.nobg(@click="mode='login'") 我已經有帳號了！ 前往登入
      .bottom(v-if="auth.user")
        h4 學生簡介
        div(v-if="auth.user.studentcard")
          label.info-group
            span 學生證卡號：
            span {{ auth.user.studentcard.card_id }}
          label 
            span 學生證級別：
            span {{ auth.user.studentcard.type }}
          label 
            span 會員效期：
            span {{ auth.user.studentcard.expiry_datetime }}
        div(v-else)
          label.info-group
            span 學生證卡號：
            span 尚未綁定

        br
      
        .btn-group( @click="setMenuState(false)")
          button.btn.fw.black(@click="logout") 登出
          router-link.btn.fw(to="/member/info") 設定
        .btn-group(v-if="canManage()", @click="setMenuState(false)")
          router-link.btn.fw.black(to="/manage") 前往後台({{userGroup()}})
    div(v-if="layout=='function'")
      .btn-group
        button.btn.fw.black(@click="logout") 登出
        router-link.btn.fw(to="/member/info") 設定
      .btn-group(v-if="canManage()", @click="setMenuState(false)")
        router-link.btn.fw.black(to="/manage") 前往後台({{userGroup()}})
      //pre {{auth}}



</template>

<script>
import {mapState,mapMutations, mapActions, mapGetters} from 'vuex'
import $ from 'jquery'
export default {
  props: {
    layout: {
      type: String,
      default: "card",
    }
  },
  data() {
    return {
      registerData: {
        email: "",
        name: "",
        password: "",
        jobcata: "",
        job: "",
        
      },
      loginData: {
        email:  localStorage.zashare_auth_user_email || "",
        password: "",
        
      },
      mode: "login",
    }
  },
  computed: {
    ...mapState(['menuState','auth']),
    jobInforLabel(){
      if (this.registerData.jobcata=="學生"){
        return "學校系所"
      }
      return "職稱"
    }
  },
  methods: {
    ...mapMutations(['setMenuState']),
    ...mapActions({
      register: 'auth/register',
      login: 'auth/login',
      logout: 'auth/logout',
      loginFacebook: "auth/loginFacebook",
      authInit: "auth/init"
    }),
    ...mapGetters({
      getUserPhoto: 'auth/getUserPhoto',
      isAdmin: 'auth/isAdmin',
      isEditor: 'auth/isEditor',
      canManage: 'auth/canManage',
      userGroup: 'auth/userGroup'
    })
  },
  mounted(){
    // this.authInit()
    $("input.loginPwd").keypress((ev)=> {
          var keycode = (ev.keyCode ? ev.keyCode : ev.which);
          if (keycode == '13') {
            this.login(this.loginData)
          }
      })
  }
}
</script>

<style lang="sass" >

.auth-card
  text-align: center
  display: flex
  justify-content: center
  width: 100%
  box-sizing: border-box
  flex-direction: column
  max-width: 500px
  h4.login-title
    margin-top: -20px
    margin-bottom: 30px
  label.mention
    font-size: 13px
    opacity: 0.5
  input,select
    border: none
    outline: none
    width: 100%
    background-color: transparent
    padding: 5px 10px
    border-bottom: solid 1px rgba(#131116,0.2)
    margin-bottom: 10px
    font-size: 14px
  .card-loading
    position: absolute
    width: 100%
    height: 100%
    background-color: rgba(#eee,0.6)
    // opacity: 0.5
    left: 0
    top: 0

  .top
    display: flex
    justify-content: center
    flex-direction: column
    align-items: center
    margin-bottom: 3px
    background-color: white
    padding: 25px
    padding-bottom: 0
    .name
      font-size: 18px
  .bottom
    background-color: white
    padding: 25px
    label
      display: flex
      justify-content: space-between
  .photo
    width: 136px
    height: 136px
    overflow: hidden
    margin-top: 55px
    margin-bottom: 40px
    // background-color: black
    background-position: center center
    background-repeat: no-repeat
    background-size: 100% auto



</style>
