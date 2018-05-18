import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex);
import softscroll from 'monoame-softscroll'
const store = new Vuex.Store({
  modules: {
    auth: require("./modules/auth.js").default,
    manage: require("./modules/manage.js").default,
    post: require("./modules/post.js").default,
    scroll: require("./modules/scroll.js").default,
    
  },
  state: {
    themes: require("../data/themes.js").default,
    menuState: false,
    menuType: "search",
    mobile: window.innerWidth<1200,
    mobile_mask_show: false,
    default_hashtags: "師培、教具、國小、偏鄉、國中、高中、大學、實驗教育、媒體、線上、空間、工作坊、技職、美感、文化、出走、輔導、maker、青少年、教師、親子、新媒體、影視、非營利、追求夢想、美感教育、思辨能力、性別平等、尊重生命、遊戲、感官體驗",
    // process.env.NODE_ENV == "production" ? true : false
    loading: true,
    searchKeyword: "",
    registExpo: {},
    expos: []
  },
  mutations: {
    // setPosts(state, value) {
    //   state.posts = value
    // },
    setMenuType(state,value){
      state.menuType=value
    },
    setMenuState(state, value) {
      window.jf_menu_loaded=true
      if(value == true && !window.jf_menu_loaded){
        _jf.flush();
      }
      state.menuState = value
      softscroll.set(!state.menuState)
    },
    setLoading(state, value) {
      state.loading = value
    },
    setMobileMask(state,value){
      state.mobile_mask_show=value
    },
    setMobile(state, value) {
      state.mobile = value
    },
    setSearchKeyword(state, value) {
      state.searchKeyword = value
    },
    openMenu(state, value) {
      state.menuType = value
      state.menuState = true
    },
    updateRegistData(state,value){
      state.registExpo=value
    },
    setExpos(state,value){
      state.expos=value
    }

  },
  actions: {
    loadExpos(context,value){
      axios.get(`/api/expo`).then(res => {
        context.commit("setExpos", res.data)
      })
    },
    openSearch(context,value){
      context.state.searchKeyword = value
      context.commit("setMenuState",true)
    },
    loadRegistData(context,value){
      console.log(value)
      axios.get(`/api/registexpo/my`,
        {
          params: { token: context.state.auth.token }
          // registexpo: senddata
        }
      ).then(res => {
        //workshop
        if (res.data.regist_workshop && res.data.regist_workshop.class_time){
          res.data.regist_workshop.class_time = JSON.parse(res.data.regist_workshop.class_time || [])
        }
        if (res.data) {
          res.data.target_audience = res.data.target_audience ? JSON.parse(res.data.target_audience) : []
          res.data.want_audience = res.data.want_audience ? JSON.parse(res.data.want_audience) : []
          context.state.registExpo = res.data
          console.log(res.data)
        }

      })
    },
    updateRegistForm(context,args){
      //如果有資料，報名資料就更新，不然就創建
      let apiMethod = context.state.registExpo.id?axios.patch:axios.post
      let senddata = JSON.parse(JSON.stringify(args.data))
      let filteredData = {}

      //過濾掉沒有值的資料
      Object.keys(senddata).filter(key => senddata[key] !== null).forEach(key => {
        if (Array.isArray(senddata[key])) {
          senddata[key] = JSON.stringify(senddata[key])
        }
        filteredData[key] = senddata[key]
      })

      //子清單扁平化
      let sublist = ['paid_record', 'regist_expo_speak','regist_workshop']
      sublist.forEach(sub => {
        let data = filteredData[sub]
        if (data){
          Object.keys(data).filter(key => data[key] !== null).forEach(key => {
            if (Array.isArray(data[key])) {
              data[key] = JSON.stringify(data[key])
            }
          })

        }

      })
      // console.log(filteredData)
      apiMethod(`/api/registexpo`,
        {
          token: context.state.auth.token,
          registexpo: filteredData
        }
        ).then(res => {
          // console.log(args.callback)
          if (args.callback){
            args.callback()
          }
        })
      context.dispatch('loadRegistData')
    }
  }
})

export default store