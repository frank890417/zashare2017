<template lang="pug">
div
  transition(name="fade")
    .fullpage(v-if="show")
      slot.front
      .closebg(@click="closeFullpage")
      .cross(@click="closeFullpage")
        i.fa.fa-times
</template>

<script>
import $ from 'jquery'
export default {
  props: ["show"],
  methods: {
    closeFullpage(){
      this.$emit("closeFullpage")
    }
  },
  mounted(){
    window.addEventListener("keydown",function(evt){
      // console.log(evt.key)
      if (evt.key=="Escape"){
        this.closeFullpage()
      }
    })
  }
}
</script>

<style lang="sass">
  
@import "../assets/_mixins.sass"
.fullpage
  position: fixed
  width: 100%
  height: 100%
  left: 0
  top: 0
  
  background-color: rgba(#333,0.9)
  z-index: 2000
  overflow-y: auto
  padding: 5vw
  padding-top: 60px
  display: flex
  justify-content: center
  align-items: center
  .front
    position: relative
  .closebg
    position: absolute
    z-index: -1
    +size(100%)
    left: 0
    top: 0
  
  .cross
    color: white
    cursor: pointer
    transform: scale(1.1)
    font-size: 40px
    position: absolute
    right: 20px
    top: 20px
    +rwd_sm
      font-size: 24px
    +trans
    opacity: 0.5
    &:hover
      opacity: 1


</style>