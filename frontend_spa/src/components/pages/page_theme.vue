<template lang="pug">
.page-course
  .container-fluid
    .row
      .col-info
        .info
          img.slogan_image(:src="theme.slogan_image")
          p(v-html="theme.description")
          .btn more
      .col-image(:style="coverStyle")

</template>

<script>
import {mapState} from 'vuex'
export default {
  computed:{
    ...mapState(['themes']),
    theme(){
      return this.themes[this.$route.name]
     
    },
    coverStyle(){
      return {
        'background-color': this.theme.color,
        'background-image': `url("${this.theme.cover}")`
      }
    }
  }
}
</script>

<style lang="sass" scoped>
.page-course
  padding-right: 300px
.row
  display: flex
  height: 100vh

.col-info,.col-image
  height: 100vh
  display: flex
  justify-content: center
  align-items: center
  // border: solid 1px
  flex: 1

.col-info
  padding: 50px
  justify-content: center
  align-items: center
  box-sizing: border-box
  .info
    width: 350px
    .slogan_image
      width: 100%

@keyframes flexIn
  0%
    flex: 0
  100%
    flex: 1
.col-image
  animation: flexIn 1s 
  transition: 0.5s
  flex: 1
  
  &:hover
    flex: 1.2
  // background-color: #8135f9
</style>
