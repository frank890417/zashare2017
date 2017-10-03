import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
const store = new Vuex.Store({
  state: {
    loading: true
  },
  mutations: {
    setLoading(state,value){
      state.loading=value
    }
  }
});

export default store