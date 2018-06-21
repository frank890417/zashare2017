<template lang="pug">
.member-reset-password
  .container-fluid.login
    auth_panel(forceMode="reset")
    
</template>

<script>
import {mapGetters} from 'vuex'
export default {
  data(){
    return {

    }
  },
  methods:{
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    }
  },
  computed: {
    ...mapGetters({
      canManage: 'auth/canManage',
      isAdmin: 'auth/isAdmin'
    })
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"
.member-reset-password
  .auth-card
    background-color: transparent 
    max-width: 350px
    box-shadow: 0px 0px 0px transparent !important
    .top,.bottom
      background-color: transparent 
// #manage_app 
//   font-family: 'Avenir', Helvetica, Arial, sans-serif
//   -webkit-font-smoothing: antialiased
//   -moz-osx-font-smoothing: grayscale
//   text-align: center
//   color: #2c3e50
//   background-color: #fafafa
//   min-height: 100vh
//   .container-fluid
//     padding: 20px
//     &.login
//       width: 100%
//       height: 100%
//       display: flex
//       justify-content: center
//       align-items: center
//       flex-direction: column
        

//   .col-nav
//     position: fixed
//     top: 150px
//   .auth-card
//     box-shadow: 0px 0px 20px rgba(black,0.1)
</style>
