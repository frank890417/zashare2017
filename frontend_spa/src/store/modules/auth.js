import axios from 'axios';

const moduleAuth = {
  namespaced: true,
  state: {
    token: localStorage.zashare_auth_user_token || null,
    user: null,
    processing: false,
    status: "",
    domain: "api/auth",
    jobcatas: ["產業別", "政府機關、公部門", "非營利組織相關", "教育業", "學生", "自由接案", "大眾傳播、出版相關", "設計與文創相關", "藝術文化相關", "流行與時尚文化相關", "旅遊、休閒、運動產業", "金融投顧、保險相關", "法律相關", "一般服務業", "一般傳統製造", "運輸物流、倉儲、貿易", "農、林、漁、牧業", "礦業土石、水電能源", "建築營造、不動產相關", "醫療照護、環境衛生", "批發零售", "電子科技、資訊、軟體、半導體", "其他"]
  },
  mutations: {
    setUserToken(state, value) {
      state.token = value
      localStorage.setItem("zashare_auth_user_token", state.token);
    },
    setUser(state, value) {
      state.user = value
      if (state.user) {
        localStorage.setItem("zashare_auth_user_email", state.user.email);

      }
    },
    setStatus(state, value) {
      state.status = value
      setTimeout(() => {
        state.status = ""
      }, 3000);
    },
    setProcessing(state,value){
      state.processing = value
    }
  },
  actions: {
    init(context){
      if (context.state.token) {
        context.commit("setProcessing", true)
        context.dispatch("getUser")
      }
    },
    register(context, user) {
      context.commit("setProcessing",true)
      axios.post(context.state.domain+"/register", user).then((res) => {

        // console.log(res.data)
        context.commit("setUserToken", res.data)
        context.dispatch("getUser")

        if (res.data.status=="fail"){
          console.log(res)
          context.commit("setProcessing", false)
          context.commit("setStatus", "註冊失敗.." + res.data.error)

        }
      }).catch((res) => {
        console.log(res)
        context.commit("setProcessing", false)
        context.commit("setStatus", "註冊失敗..")

        return {
          success: false,
          log: res.data
        }
      })
    },
    login(context, user) {
      context.commit("setProcessing", true)
      axios.post(context.state.domain+"/login", user).then((res) => {
        context.commit("setUserToken", res.data.access_token)
        context.dispatch("getUser")
      }).catch(res => {
        context.commit("setProcessing", false)
        context.commit("setStatus", "登入失敗..")
        
      })
    },
    getUser(context) {
      axios.post(context.state.domain+"/me", {
        token: context.state.token
      }).then((res) => {
        context.commit("setUser", res.data)
        context.commit("setProcessing", false)
      }).catch((res)=>{
        context.commit("setUserToken", "")
        context.commit("setProcessing", false)
      })
    },
    logout(context) {
      context.commit("setProcessing", true)
      axios.post(context.state.domain+"/logout", {
        token: context.state.token
      }).then((res) => {
        if (res.data.status == "success") {
          context.commit("setUser", null )
          context.commit("setUserToken", null)
          context.commit("setStatus", res.data.message)
          context.commit("setProcessing", false)
          
        }
      })
    },
    loginFacebook(context){
      window.open(context.state.domain+"/login/facebook")
    },
  },
  getters: {
    getUserPhoto: state=>{
      if (state.user){
        return state.user.cover
      } else {
        return "/static/img/Home/za-logo.svg"

      }

    },
    canManage: state => {
      if (state.user){
        return state.user.group == 'admin' || state.user.group == 'editor'
      }
      return false
    },
    isAdmin: state => {
      if (state.user) {
        return state.user.group == 'admin'
      }
      return false
    },
    userGroup: state => {
      if (state.user) {
        return state.user.group 
      }
      return null
    }


  }
}

export default moduleAuth