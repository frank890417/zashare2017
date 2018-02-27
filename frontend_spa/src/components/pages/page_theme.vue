<template lang="pug">
.page-theme.animated
  .container-fluid(v-for="now_theme in mobile?Object.values(this.themes):[theme]",:key="theme.title")
    .row
      .col-info
        .info
          .slogan.animated.fadeIn
            img.slogan_image.animated.slideInLeft(:src="now_theme.slogan_image")
            h1.slogan_text.animated.slideInLeft(v-html="now_theme.slogan_text",:style="{color: now_theme.color}")
          p.animated.fadeIn(v-html="now_theme.description")
          router-link.nostyle.btn(
            v-if="$route.meta.type=='theme'", 
            :to="$route.meta.next.path",
            :key="$route.path") more
      .col-image.animated.fadeIn(:style="getCoverStyle(now_theme)")
      .lazy-detector

</template>

<script>
import {mapState} from 'vuex'
import $ from 'jquery'
export default {
  computed:{
    ...mapState({
      themes: state=>state.themes,
      scrollY: state=>state.scroll.position,
      mobile: state=>state.mobile
    }),
    theme(){
      return this.themes[this.$route.name]
     
    }
  },
  watch:{
    scrollY(){
      let detectorPos = $(".lazy-detector").offset().top
      let scrollPos = this.scrollY+$(window).height()*1.5
      console.log(detectorPos,scrollPos)
      if (detectorPos<scrollPos ){
        console.log("change theme")
      }
    }
  },
  methods: {

    getCoverStyle(theme){
      return {
        'background-color': theme.color,
        'background-image': `url("${theme.cover}")`,
        // 'background-size': `cover`,
        'background-position': `center center`
      }
    }
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"
$cubic: ease

.page-theme
  padding-right: 450px
  background-color: #fafafa

  +rwd_sm
    padding-bottom: 100px
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
      +rwd_md
        // margin-bottom: 50px

  h1.slogan_text
    font-size: 30px
    font-weight: 900
    margin-top: 30px
    display: none
    +rwd_md
      display: block
      letter-spacing: -1px
    // margin-bottom: 30px
  +rwd_md
    padding-right: 0
    .col-image
      flex: 250px
      

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
      flex: 150px
      opacity: 1
  .col-image
    animation: flexIn 1s both $cubic
    transition: 0.5s
    flex: 1.2
    animation-delay: 0.6s
    background-position: center center
    background-size: cover
    +rwd_md
      animation: none
      flex-grow: 0
      background-size: 80% auto
      background-repeat: no-repeat
      flex: 1
      max-height: 300px
    &:hover
      flex: 1.2
    // background-color: #8135f9
  .container-fluid
    padding-left: 15px
    padding-right: 15px
    // padding-bottom: 40px
</style>
