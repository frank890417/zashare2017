import axios from 'axios'
import $ from 'jquery'
const post = {
  namespaced: true,
  state: {
    position: 0
  },
  mutations: {
    setPosition(state, value) {
      state.position = value
    },
   
  },
  actions: {
    init(context) {
      console.log("Scroll Module init")
      $(window).scroll(o=>{
        // console.log(context.state.position)
        context.commit("setPosition",$(window).scrollTop())
      })

    },
  
  }
}
export default post