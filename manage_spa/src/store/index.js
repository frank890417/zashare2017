import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'Axios'
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
    posts: [],
    catas: [],
    companies: [] 
  },
  mutations: {
    setPosts(state, value) {
      state.posts = value
    },
    setCatas(state, value) {
      state.catas = value
    },
    setCompanies(state, value) {
      state.companies = value
    },
  },
  actions: {
    loadWebsite(context) {
      context.dispatch("loadPosts")
      
    },
    loadPosts(context) {
      axios.get("/api/spa/post").then((res) => {
        context.commit("setPosts", res.data)
      })
      axios.get("/api/spa/cata").then((res) => {
        context.commit("setCatas", res.data)
      })
      axios.get("/api/spa/company").then((res) => {
        context.commit("setCompanies", res.data)
      })
    },

  }
})
export default store