<template lang="pug">
.auth-card
  transition(name="fade")
    div(v-if="layout=='card'")
      transition(name="fade")
        .card-loading(v-if="auth.processing")
      .top
        .photo(:style="bgcss(getUserPhoto(auth.user))")
        h3.name
          span(v-if="auth.user") {{ (auth.status && $t(auth.status)) || ($t('member.hello') + `${auth.user.name}`) }}
          span(v-else) {{ (auth.status && $t(auth.status))  || $t('member.form.login.not_logined') }}
      
      .bottom(v-if="mode=='reset_send_email'")
        h4 {{ $t("member.reset_send_email_title") }}
        div(v-if="!auth.password_reset_success")
          el-input(placeholder="輸入原帳號信箱(E-Mail)", type="email", name="email", v-model="resetSendMailData.email")
          button.btn.fw.black(@click="resetSendMail(resetSendMailData)" @keydown.enter.prevent="resetSendMail(resetSendMailData)")  {{ $t("member.btn_send_reset_link") }}
        div(v-else)
          h4 {{ $t("member.password_reset_email_sent") }}

      .bottom(v-else-if="mode=='reset_password'")
        h4 {{ $t("member.reset_password_title") }}
        el-input(placeholder="輸入原帳號信箱 (E-Mail)", type="email", name="email", v-model="resetPasswordData.email")
        el-input(placeholder="請輸入新密碼 (New Password)", type="password", name="password", v-model="resetPasswordData.password")
        el-input(placeholder="再次輸入密碼 (Confirm Password)", type="password", name="password_confirmation", v-model="resetPasswordData.password_confirmation")
        button.btn.fw.black(@click="userResetPassword" ) {{ $t("member.btn_reset") }}

      
      
      .bottom(v-else-if="mode=='login' && !auth.user")
        h4.login-title {{$t('member.form.login.title')}}
        //- label 信箱
        input(v-model="loginData.email", :placeholder="$t('member.form.login.user')", type="email")
        //- label 密碼
        input.loginPwd(v-model="loginData.password", :placeholder="$t('member.form.login.password')" , type="password")
        button.btn.fw.black(@click="login(loginData)") {{$t('member.form.login.login')}}
        //- button.btn.fw(@click="loginFacebook") 使用 Facebook 登入'
        // - 忘記密碼-頁面
        button.btn.fw.nobg(@click="mode='reset_send_email'") {{$t('member.form.login.forget')}}
        button.btn.fw.nobg(@click="mode='register'") {{$t('member.form.login.register')}}

    
      .bottom(v-else-if="mode=='register' && !auth.user")
        h4 {{$t('member.form.register.title')}}
        //- label email
        el-input(v-model="registerData.email", 
              :placeholder="$t('member.form.register.email')", type="email", name="email",
              @input="checkMail")
        //- label name
        el-input(v-model="registerData.name", :placeholder="$t('member.form.register.name')", type="name", name="name")
        label.mention {{ $t('member.form.register.name_explain') }}
        el-select(v-model="registerData.jobcata", :placeholder="$t('member.form.register.jobcata')" , name="jobcata", style="width: 100%")
          el-option(v-for= "(jb,jbid) in $t('member.form.register.jobcatas')", 
                :value="jb.value", :label="jb.label") {{jb.label}}
        el-input(v-model="registerData.job", :placeholder="$t('member.form.register.job')" type="job", name="job")
        el-input(v-model="registerData.phone", :placeholder="$t('member.form.register.phone')", type="phone", name="phone")
        el-date-picker(v-model="registerData.birthday", :placeholder="$t('member.form.register.birthday')", 
                      type="date", name="birthday",style="width: 100%",
                      value-format="yyyy-MM-dd")
        el-input(v-model="registerData.password", :placeholder="$t('member.form.register.password')", type="password")
        el-input(v-model="registerData.password_confirmation", :placeholder="$t('member.form.register.confirm_password')", type="password")
        button.btn.fw.black(@click="register(registerData)") {{ $t('member.form.register.regist') }}
        //- label(v-if="auth.status") {{auth.status}}
        button.btn.fw.nobg(@click="mode='login'") {{ $t('member.form.register.have_account') }}
      .bottom(v-else-if="auth.user")
        h4 {{ $t('menu.label_student_card') }}
        div(v-if="auth.user.studentcard")
          label.info-group
            span {{ $t('menu.label_card_id') }}：
            span {{ auth.user.studentcard.card_id }}
          label 
            span {{ $t('menu.label_card_level') }}：
            span {{ auth.user.studentcard.type }}
          label 
            span {{ $t('menu.label_card_date') }}：
            span {{ auth.user.studentcard.expiry_datetime }}
        div(v-else)
          //label.info-group
            span 學生證卡號：
            span 尚未綁定

        br
      
        .btn-group( @click="setMenuState(false)")
          button.btn.fw.black(@click="logout") {{ $t('member.logout') }}
          router-link.btn.fw(to="/member/info") {{ $t('member.setting') }}
        .btn-group(v-if="canManage()", @click="setMenuState(false)")
          router-link.btn.fw.black(to="/manage") 前往後台({{userGroup()}})
    div(v-if="layout=='function'")
      .btn-group
        button.btn.fw.black(@click="logout") {{ $t('member.logout') }}
        router-link.btn.fw(to="/member/info") {{ $t('member.setting') }}
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
      resetSendMailData:{
        email: ""
      },
      resetPasswordData:{
        email: "",
        password: "",
        password_confirmation: "",
        token: ""
      },
      loginData: {
        email: localStorage.zashare_auth_user_email || "",
        password: "",
        
      },
      mode: window.queryObject.reset_token?"reset_password":"login",
    }
  },
  computed: {
    ...mapState(['menuState','auth','resetToken']),
    jobInforLabel(){
      if (this.registerData.jobcata=="學生"){
        return "學校系所"
      }
      return "職稱"
    }
  },
  methods: {
    ...mapMutations({
      setMenuState: "setMenuState",
      setResetToken: "auth/setResetToken"
    }),
    ...mapActions({
      register: 'auth/register',
      login: 'auth/login',
      logout: 'auth/logout',
      loginFacebook: "auth/loginFacebook",
      authInit: "auth/init",
      resetSendMail: "auth/resetSendMail",
      resetPassword: "auth/resetPassword"
    }),
    ...mapGetters({
      getUserPhoto: 'auth/getUserPhoto',
      isAdmin: 'auth/isAdmin',
      isEditor: 'auth/isEditor',
      canManage: 'auth/canManage',
      userGroup: 'auth/userGroup'
    }),
    userResetPassword(){
      this.resetPassword({
        data: this.resetPasswordData,
        successHook: ()=>{
          this.$message.success( this.$t("member.password_reset_success") )
          setTimeout(()=>{
            this.setResetToken(null)
            this.mode="login"
            this.$router.push("/")
            this.setMenuState(false)
          },2000)
          
        },
        failHook: ()=>{
          this.$message.error( this.$t("member.password_reset_fail") )
        }
      })
    },
    checkMail(){
      // console.log(this.registerData)
      if ( /[^\x00-\xff]/g.test(this.registerData.email)){
        this.$message.error("請勿輸入全形文字")
        this.$set(this.registerData,"email","")
      }
    }
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
