import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
    loading: true,
    scrollTop: 0,
    wsize: 0
  },
  mutations: {
    setLoading(state,value){
      state.loading=value
    },
    setScrollTop(state,value){
      state.scrollTop=value
    },
    setWsize(state,value){
      state.wsize=value
    }
  }
});

export default store