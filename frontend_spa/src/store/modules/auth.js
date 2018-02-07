import axios from 'axios';
const moduleAuth = {
  namespaced: true,
  state: {
    token: localStorage.zashare_auth_user_token || null,
    user: null,
    processing: false,
    status: ""
  },
  mutations: {
    setUserToken(state, value) {
      state.token = value
      localStorage.setItem("zashare_auth_user_token", state.token);
    },
    setUser(state, value) {
      state.user = value
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
      if (context.state.token){
        context.dispatch("getUser")
      }
    },
    register(context, user) {
      context.commit("setProcessing",true)
      axios.post("/api/auth/register", user).then((res) => {
        context.commit("setUserToken", res.data)
        context.dispatch("getUser")
      }).catch((res) => {
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
      axios.post("/api/auth/login", user).then((res) => {
        context.commit("setUserToken", res.data.access_token)
        context.dispatch("getUser")
      })
    },
    getUser(context) {
      axios.post("/api/auth/me", {
        token: context.state.token
      }).then((res) => {
        context.commit("setUser", res.data)
        context.commit("setProcessing", false)
      }).catch((res)=>{
        context.commit("setUserToken", "" )
      })
    },
    logout(context) {
      context.commit("setProcessing", true)
      axios.post("/api/auth/logout", {
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
      window.open("/api/auth/login/facebook")
    },
  },
  getters: {
    getUserPhoto: state=>{
      if (state.user){
        return state.user.cover
      } else {
        return "http://zashare.org/img/2017/index_za_logo_white.svg"

      }

    }

  }
}

export default moduleAuth