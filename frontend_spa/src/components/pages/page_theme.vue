<template lang="pug">
.page-theme.animated
  .container-fluid(v-for="now_theme in [theme]",:key="theme.title")
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
      router-link.col-image.animated.fadeIn(
        :style="getCoverStyle(now_theme)",:key="$route.path",
        :to="$route.meta.next.path")
        //- .readmore-mobile -> More

</template>

<script>
import {mapState} from 'vuex'
import $ from 'jquery'
export default {
  mounted(){
    let _this = this
    let lastY = null
    let delta = 0
    let lock = false
    document.querySelector(".page-theme").addEventListener("touchmove",function(evt){
      
      // console.log(delta)
      if (!lastY){
        delta = 0
      }else{
        delta = evt.touches[0].pageY-lastY
      }
      if (Math.abs(delta)>80 && !lock){
        lock=true
        let cid = _this.themes.map(t=>t.title).indexOf(_this.theme.title)
        let d = Math.sign(delta)
        console.log(cid+d)
        if (_this.themes[cid+d]){
          _this.$router.push('/'+ _this.themes[cid+d].title.toLowerCase())
        }
        setTimeout(()=>{
          lock=false
        },100)
      }
      lastY = evt.touches[0].pageY
    })
    document.querySelector(".page-theme").addEventListener("touchend",function(){
      lastY=null
    })


    // $('.page-theme').on('swipedown',function(){
    //   let id = Object.keys(_this.themes).indexOf(this.$route.name)+1
    //   if (_this.themes[id]){
    //     _this.$route.push('/theme/')
    //   }
    // } );
    // $('.page-theme').on('swipeup',function(){alert("swipeup..");} );
  },
  computed:{
    ...mapState({
      themes: state=>state.themes,
      scrollY: state=>state.scroll.position,
      mobile: state=>state.mobile
    }),
    theme(){
      return this.themes.find(o=>o.title==this.$route.name)
     
    },
    
  },
  watch:{
    scrollY(){
      // let detectorPos = $(".lazy-detector").offset().top
      // let scrollPos = this.scrollY+$(window).height()*1.5
      // console.log(detectorPos,scrollPos)
      // if (detectorPos<scrollPos ){
      //   console.log("change theme")
      // }
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

  // +rwd_sm
  //   padding-bottom: 100px
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
        margin-top: 10px
        // display: none
        // margin-bottom: 50px

  h1.slogan_text
    font-size: 30px
    font-weight: 900
    margin-top: 30px
    display: none
    +rwd_md
      display: block
      letter-spacing: -1px
      margin-bottom: 0
      margin-top: 0px
    // margin-bottom: 30px
  +rwd_md
    padding-right: 0
    .col-image
      flex: 250px
      

    .container-fluid
      // padding-left: 20px
      // padding-right: 20px  
    .col-info 
      padding: 25px
      align-items: flex-start
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
    animation: flexIn 1s both
    transition: 0.5s
    flex: 1
    animation-delay: 0.6s
    background-position: center center
    background-size: cover

    +rwd_md
      animation: none
      flex-grow: 0
      background-size: 55% auto
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
