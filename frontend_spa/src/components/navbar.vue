<template lang="pug">
.navbar(:style="navbarStyle")
  .container-fluid
    .row-logo
      router-link.col-sm-12(to="/" v-if="$route.path=='/'")
        img(src="/static/img/Home/za-logo.svg", @click="loginAjax") 
      //- h4(v-if="$route.meta.action!='back'") “ 雜學校，一個有效行動的學習場域。 ”
      .longline(
          v-if="$route.path!='/'", 
          :style="{'background-color': theme.color}",
          :class="{nolen: $route.meta.action=='back'}")
      router-link.explore(
        v-if="$route.meta.type=='theme'", 
        :to="$route.meta.next.path",
        :key="$route.path") 
        .ovh
          .animated.slideInUp Explore the
        div.themename.ovh
          span.text.animated.slideInUp ZA {{$route.name}}  
          .arrow-right( :style="{'background-color': theme.color}")
      router-link.explore(
        v-if="$route.meta.action=='back'", 
        :to="$route.meta.back.path",
        :key="$route.path") 
        .ovh
          .animated.slideInUp Back to the
        div.themename.ovh
          span.text.animated.slideInUp {{$route.meta.back.name}}  
          .arrow-right.reverse( :style="{'background-color': theme.color}", 
                        )
    
    .row-bottom
      span.col-login(v-if="$route.path=='/'",@click="setMenuState(true)") 
        span(v-if="auth.user") Hello 雜學校學生 {{auth.user.name}}
        span(v-else) 學生登入 / 註冊

      router-link.col-theme-nav.nav-course(to="/course") 
        //- span ZA<br>Course
        img(src="/static/img/Home/za-course.svg")
        router-link.upCircle.animated.zoomIn(
          :to="upCircleTo",
          v-if="$route.meta.type=='theme' || $route.path=='/'",
          :class="{downCircle: $route.path=='/' }"
        ) 
      router-link.col-theme-nav.nav-base(to="/base")
        //- span ZA<br>Base
        img(src="/static/img/Home/za-base.svg")
      router-link.col-theme-nav.nav-expo(to="/expo")
        //- span ZA<br>Expo
        img(src="/static/img/Home/za-expo.svg")
        
</template>

<script>
import {mapState, mapMutations} from 'vuex'
import axios from 'axios'
export default {
  computed:{
    ...mapState(['themes','auth']),
    theme(){
      // console.log((this.$route).split("/")[1])
      return this.themes[ (this.$route.path).split("/")[1]] || {}
    },
    navbarStyle(){
      let width = this.$route.meta.navWidth || "450px"
      return {
        width,
        right: this.$route.meta.navPosition!='left'?"0px":`calc(100% - ${width})`,
        display: this.$route.path.indexOf("/manage")==0 ? "none":"block"
      }
    },
    upCircleTo(){
      if (this.$route.path=="/"){
        return "/course"
      }
      if (this.$route.meta.type=="theme"){
        return "/"
      }
    }
  },
  methods: {
      ...mapMutations(['setMenuState']),
      loginAjax(){
        axios.post("/api/spa/login",{
          email: "frank890417@gmail.com",
          password: "@##434frt))"
        }).then(res=>{
          console.log(res)
        })
      }
  }
}
</script>

<style lang="sass">
.animated.slideInUp
  animation-delay: 0.8s
.navbar
  position: fixed
  right: 0
  top: 0
  width: 300px
  height: 100vh
  transition: 0.5s, right 1s

  @keyframes textOut
  0%
    top: 100px
  100%
    top: 0px

  .textout
    // overflow: hidden
    display: block
    .text
      position: relative
      top: 100px
      // animation: textOut 1s both
  .container-fluid
    display: flex
    height: 100vh
    flex-direction: column
    background-color: #fff
    justify-content: space-between
    
  .row-logo
    height: 100%
    display: flex
    flex-direction: column
    padding: 80px 75px
    // justify-content: space-between
    align-items: space-between
    .longline
      flex: 4
      width: 2px
      background-color: #333
      transition: 0.5s

      margin: 
        bottom: 20px
        top: 20px
      &.nolen
        flex: 0.5
        opacity: 0

  .col-theme-nav,.col-login
    padding: 35px 50px
    display: block
    text-decoration: none
    border-bottom: solid 1px #333
    cursor: pointer
    transition: 0.5s
    &:hover 
      background-color: #aaa

  .explore
    text-align: left
    font-size: 24px
    text-decoration: none
    color: black
    
    .themename
      font-size: 34px
      font-weight: 900
      text-transform: uppercase
      display: flex
      align-items: flex-end

      .text
        flex-shrink: 0
        
      @keyframes widthani
        0%
          width: 0
        100%
          width: 20px

      .arrow-right
        display: block
        height: 2px
        width: 100%
        background-color: #333
        margin-bottom: 15px
        position: relative
        margin-left: 20px
        &:before,&:after
          animation: widthani 1s 0.2s both
          content: ""
          display: block
          width: 20px
          height: 2px
          background-color: inherit
          position: absolute
          transform-origin: right center
          transform: rotate(45deg)
          right: 0
        &:after
          transform: rotate(-45deg)
        &.reverse
          transform-origin: center center
          transform: rotate(180deg)



  .col-theme-nav
    background-color: black
    color: white
    font-size: 32px
    font-weight: 900
    text-align: left
    line-height: 1
    position: relative
    img
      height: 70px
      margin-bottom: -30px


  .nav-course
    &:hover,&.router-link-active
      background-color: #8135f9
  .nav-base
    &:hover,&.router-link-active
      background-color: #8af187
  .nav-expo
    &:hover,&.router-link-active
      background-color: #1161ef
    


  .upCircle
    position: absolute
    // transform: translate(-50%,50%)
    transform-origin: center center
    left: -35px
    bottom: -35px
    z-index: 10
    box-shadow: 0px 0px 20px rgba(black,0.3)

    width: 70px
    height: 70px
    background-color: white
    border-radius: 50%
    color: black

    display: flex
    justify-content: center
    align-items: center

    &:before
      content: ""
      display: block
      
      width: 0
      height: 0
      border-style: solid
      border-width: 0 10px 17.3px 10px
      border-color: transparent transparent #000000 transparent
      transition: 0.5s
      transform-origin: center center
    &.downCircle
      &:before
        transform: rotate(180deg)

  .router-link-active
    
  // background-color: black
</style>
