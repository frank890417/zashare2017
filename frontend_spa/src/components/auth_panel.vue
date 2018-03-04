<template lang="pug">
.auth-card
  div(v-if="layout=='card'")
    transition(name="fade")
      .card-loading(v-if="auth.processing")
    .top
      .photo(:style="bgcss(getUserPhoto(auth.user))")
      h3.name
        span(v-if="auth.user") {{ auth.status ||  `Hello ! 雜學校學生　${auth.user.name}` }}
        span(v-else) {{ auth.status || '這名學生未登入哦！' }}
    .bottom(v-if="mode=='login' && !auth.user")
      h4 登入雜學校
      //- label 信箱
      input(v-model="loginData.email", placeholder="信箱", type="email")
      //- label 密碼
      input(v-model="loginData.password", placeholder="密碼" , type="password")
      button.btn.fw.black(@click="login(loginData)") 登入
      //- button.btn.fw(@click="loginFacebook") 使用 Facebook 登入
      button.btn.fw.nobg 忘記密碼
      button.btn.fw.nobg(@click="mode='register'") 註冊為雜學校學生
    .bottom(v-if="mode=='register' && !auth.user")
      h4 會員註冊
      //- label email
      input(v-model="registerData.email", placeholder="電子郵件(登入帳號)", type="email", name="email", autocomplete="on")
      //- label name
      input(v-model="registerData.name", placeholder="名字", type="name", name="name", autocomplete="on")
      label.mention ※若您持有「雜學校學生證」，請務必填寫您的真實姓名，方便核對身分及保障您的權益。
      select(v-model="registerData.jobcata", placeholder="產業別" , name="jobcata", autocomplete="on")
        option(v-for= "(jb,jbid) in jobcatas", 
              :value="jb") {{jb}}
      input(v-model="registerData.job", :placeholder="jobInforLabel", type="job", name="job", autocomplete="on")
      input(v-model="registerData.password", placeholder="密碼", type="password")
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
    
      .btn-group
        button.btn.fw.black(@click="logout") 登出
        router-link.btn.fw(to="/member/setting") 設定
      .btn-group(v-if="isAdmin()", @click="setMenuState(false)")
        router-link.btn.fw.black(to="/manage") 前往後台
  div(v-if="layout=='function'")
    .btn-group
      button.btn.fw.black(@click="logout") 登出
      router-link.btn.fw(to="/member/setting") 設定
    .btn-group(v-if="isAdmin()", @click="setMenuState(false)")
      router-link.btn.fw.black(to="/manage") 前往後台
    //pre {{auth}}



</template>

<script>
import {mapState,mapMutations, mapActions, mapGetters} from 'vuex'
export default {
  props: {
    layout: {
      type: String,
      default: "card",
    }
  },
  data() {
    return {
      jobcatas: ["產業別","政府機關、公部門","非營利組織相關","教育業","學生","自由接案","大眾傳播、出版相關","設計與文創相關","藝術文化相關","流行與時尚文化相關","旅遊、休閒、運動產業","金融投顧、保險相關","法律相關","一般服務業","一般傳統製造","運輸物流、倉儲、貿易","農、林、漁、牧業","礦業土石、水電能源","建築營造、不動產相關","醫療照護、環境衛生","批發零售","電子科技、資訊、軟體、半導體","其他"],
      registerData: {
        email: "",
        name: "",
        password: "",
        jobcata: "",
        job: "",
        
      },
      loginData: {
        email: "",
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
      isAdmin: 'auth/isAdmin'
    })
  },
  mounted(){
    // this.authInit()
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
    width: 100px
    height: 100px
    margin-top: 55px
    margin-bottom: 40px
    background-color: black
    background-position: center center
    background-repeat: no-repeat
    background-size: 80% auto



</style>
