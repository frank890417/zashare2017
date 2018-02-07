import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex);
const store = new Vuex.Store({
  modules: {
    auth: require("./modules/auth.js").default,
  },
  state: {
    themes: require("../data/themes.js").default,
    menuState: false,
    expos: [
      {
        year: 2018,
        title: "有敢擇學 - Try Try See !",
        cover: "http://zashare.org/img/expo/2017/1.jpg",
        report_cover: "http://zashare.org/img/expo/2017/3.jpg",
      }, {
        year: 2017,
        title: "學你想學、學你想成為。 - Learn to be, not taught to fit.",
        cover: "https://az796311.vo.msecnd.net/userupload/afe7351a4adc41ca8a828fd5b606798f.jpg",
        report_cover: "http://zashare.org/img/expo/2016/2.jpg",
      },
      {
        year: 2016,
        title: "不太乖教育節 - Naughty Education",
        cover: "http://img.accupass.com/userupload/dcfc34cde62f4340aae2dd00452b0ef9.jpg",
        report_cover: "http://zashare.org/img/expo/2015/4.jpg",
      },
    ]
  },
  mutations: {
    // setPosts(state, value) {
    //   state.posts = value
    // },
    setMenuState(state, value) {
      state.menuState = value
    },

  },
  actions: {
    
    // loadWebsite(context) {
    //   context.dispatch("loadPosts")

    // },
    // loadPosts(context) {
    //   axios.get("/api/spa/post").then((res) => {
    //     context.commit("setPosts", res.data)
    //   })
    //   axios.get("/api/spa/cata").then((res) => {
    //     context.commit("setCatas", res.data)
    //   })
    //   axios.get("/api/spa/company").then((res) => {
    //     context.commit("setCompanies", res.data)
    //   })
    // },

  }
})

export default store