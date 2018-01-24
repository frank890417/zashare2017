import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
    themes: require("../data/themes.js").default,
    menuState: false
  },
  mutations: {
    // setPosts(state, value) {
    //   state.posts = value
    // },
    setMenuState(state,value){
      state.menuState=value
    }

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