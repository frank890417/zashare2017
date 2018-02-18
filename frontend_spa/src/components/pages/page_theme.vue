<template lang="pug">
.page-course.animated
  .container-fluid
    .row
      .col-info(v-for="theme in [theme]", :key="theme.title")
        .info
          .slogan.animated.fadeIn
            img.slogan_image.animated.slideInLeft(:src="theme.slogan_image")
            h1.slogan_text.animated.slideInLeft(v-html="theme.slogan_text",:style="{color: theme.color}")
          p.animated.fadeIn(v-html="theme.description")
          router-link.nostyle.btn(
            v-if="$route.meta.type=='theme'", 
            :to="$route.meta.next.path",
            :key="$route.path") more
      .col-image.animated.fadeIn(:style="coverStyle")

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
        'background-image': `url("${this.theme.cover}")`,
        // 'background-size': `cover`,
        'background-position': `center center`
      }
    }
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"

.page-course
  padding-right: 450px
  background-color: #fafafa
  .row
    display: flex
    height: 100vh

    +rwd_md
      flex-direction: column-reverse

  .col-info,.col-image
    height: 100vh
    display: flex
    justify-content: center
    align-items: center
    // border: solid 1px
    flex: 1.2
    
    p.animated.fadeIn
      animation-delay: 0.5s
  .col-info
    padding: 50px
    justify-content: center
    align-items: center
    box-sizing: border-box

    .info
      width: 350px
      text-align: left
    
      +rwd_md
        width: 100%
      .slogan
        overflow: hidden
        margin-bottom: 60px
      .slogan_image
        width: 100%
        +rwd_md
          display: none
    .btn
      margin-top: 30px

  h1.slogan_text
    font-size: 30px
    font-weight: 900
    margin-top: 30px
    display: none
    +rwd_md
      display: block
    // margin-bottom: 30px
  +rwd_md
    padding-right: 0
    .col-image
      flex: 280px
      

    .container-fluid
      // padding-left: 20px
      // padding-right: 20px  
    .col-info 
      padding: 40px
      // width: calc(100% - 40px)

      .info .slogan
        margin-bottom: 15px
    
        
  @keyframes flexIn
    0%
      flex: 1
      opacity: 0
    100%
      flex: 1.1
      opacity: 1


  @keyframes flexInMobile
    0%
      flex: 1
      opacity: 0
    100%
      flex: 180px
      opacity: 1
  .col-image
    animation: flexIn 1s both
    transition: 0.5s
    flex: 1.2
    animation-delay: 0.6s
    background-position: center center
    background-size: cover
    +rwd_md
      animation-name: flexInMobile
      background-size: 80% auto
      background-repeat: no-repeat
    &:hover
      flex: 1.2
    // background-color: #8135f9
</style>
