
import axios from 'axios'
const manage = {
  namespaced: true,
  state: {
    posts: [],
    news: [],
    catas: [],
    companies: []
  },
  mutations: {
    setPosts(state, value) {
      state.posts = value
    },
    setNews(state, value) {
      state.news = value
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
      axios.get("/api/post").then((res) => {
        context.commit("setPosts", res.data)
      })
      axios.get("/api/news").then((res) => {
        context.commit("setNews", res.data)
      })
      axios.get("/api/cata").then((res) => {
        context.commit("setCatas", res.data)
      })
      axios.get("/api/company").then((res) => {
        context.commit("setCompanies", res.data)
      })
    },

  }
}
export default manage