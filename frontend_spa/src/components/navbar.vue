<template lang="pug">
.navbar(:style="navbarStyle")
  .container-fluid
    .row-logo
      router-link.col-sm-12.logo-part(to="/")
        img.logo-img(src="/static/img/Home/za-logo.svg", @click="loginAjax") 
        //- h1.nav-cht-logo 雜學校

      //- router-link.col-sm-12.logo-part.fadeIn.animated(to="/" v-if="$route.path=='/'")
      //-   img.logo-img(src="/static/img/Home/za-logo.svg", @click="loginAjax") 
      //-   h1.nav-cht-logo 雜學校
      //- h4(v-if="$route.meta.action!='back'") “ 雜學校，一個有效行動的學習場域。 ”
      //- .longline(
      //-     v-if="$route.path!='/'", 
      //-     :style="{'background-color': theme.color}",
      //-     :class="{nolen: $route.meta.action=='back'}")
      //- router-link.explore(
      //-   v-if="$route.meta.type=='theme'", 
      //-   :to="$route.meta.next.path",
      //-   :key="$route.path") 
      //-   .ovh
      //-     .animated.slideInUp Explore the
      //-   div.themename.ovh
      //-     span.text.animated.slideInUp ZA {{$route.name}}  
      //-     .arrow-right( :style="{'background-color': theme.color}", key="main_arrow")
      //- router-link.explore(
      //-   v-if="$route.meta.action=='back'", 
      //-   :to="$route.meta.back.path",
      //-   :key="$route.meta.back.path") 
      //-   .arrow-right.reverse( :style="{'background-color': theme.color}", key="sub_arrow")
      //-   .ovh
      //-     .animated.slideInUp Back to the
      //-   div.themename.ovh
      //-     span.text.animated.slideInUp {{$route.meta.back.name}}  
      //-     //- .arrow-right.reverse( :style="{'background-color': theme.color}", 
                        )
      //- router-link.subBack.nostyle.animated.fadeIn(
      //-   v-if="$route.meta.subBack", 
      //-   :to="subBack.path",
      //-   :key="$route.meta.subBack.name")
      //-   h3 {{subBack.name}}
      //-   .arrow-right.reverse( :style="{'background-color': theme.color}", key="sub_arrow")

    .row-bottom
      span.col-login
        span(v-if="auth.user")
          span Hello
          span(@click="openMenu('login')") 雜學校學生 
            b {{auth.user.name}}
        span(v-else) 
          b 雜學校&nbsp;
          span(@click="openMenu('login')")  登入 / 註冊
        span &nbsp;&nbsp;|&nbsp;&nbsp;
        span 
          b(@click="openMenu('search')")  搜尋
      .footer_logo
        a(href='https://www.facebook.com/zashare.expo/', target='_blank')
          img(src="/static/img/social-icon/social-fb.svg")
        a(href='https://www.flickr.com/photos/140061501@N03/albums', target='_blank')
          img(src="/static/img/social-icon/social-fl.svg")
        a(href='https://www.instagram.com/za_share/', target='_blank')
          img(src="/static/img/social-icon/social-ig.svg")
        a(href='https://mp.weixin.qq.com/s/TwpvJg7q7tGnafAJgFdUeA', target='_blank')
          img(src="/static/img/social-icon/social-wc.svg")
        a(href='https://www.youtube.com/channel/UCiCIqDTmahczFvmg8iNUVow/playlists', target='_blank')
          img(src="/static/img/social-icon/social-yt.svg")


        //- a(href='https://www.facebook.com/zashare.expo/', target='_blank')
        //-   svg(src="/static/img/social-icon/social-fb.svg")
        //- a(href='https://www.youtube.com/channel/UCiCIqDTmahczFvmg8iNUVow', target='_blank')
        //-   svg(src="/static/img/social-icon/social-yt.svg")
        //- a(href='https://www.instagram.com/zashare_edu/', target='_blank')
        //-   svg(src="/static/img/social-icon/social-ig.svg")
        //- a(href='http://weibo.com/6020066115/profile?rightmod=1&wvr=6&mod=personnumber&is_all=1', target='_blank')
        //-   svg(src="/static/img/social-icon/social-fl.svg")
        //- a(href='http://open.weixin.qq.com/qr/code/?username=zashare_edu', target='_blank')
        //-   svg(src="/static/img/social-icon/social-wc.svg")


      router-link.col-theme-nav.text-center.nav-course(to="/about")
        span 關於雜學校
      router-link.col-theme-nav.text-center.nav-base(to="/expo")
        span 歷屆展覽
        ul.years
          router-link.year-item.delay-ani-3(to="/expo/2015") 2015
          router-link.year-item.delay-ani-6(to="/expo/2016") 2016
          router-link.year-item.delay-ani-9(to="/expo/2017") 2017
      a.col-theme-nav.text-center.nav-expo(href="https://www.zashare.com.tw", target="_blank")
        span 線上商店

      // router-link.col-theme-nav.nav-expo(to="/expo")
      //   //- span ZA<br>Expo
      //   img(src="/static/img/Home/za-expo.svg")
      //   router-link.upCircle.animated.zoomIn(
      //     :to="upCircleTo",
      //     v-if="$route.meta.type=='theme' || $route.path=='/'",
      //     :class="{downCircle: $route.path=='/' }"
      //   ) 
      // router-link.col-theme-nav.nav-base(to="/base")
      //   //- span ZA<br>Base
      //   img(src="/static/img/Home/za-base.svg")
      // router-link.col-theme-nav.nav-course(to="/course") 
      //   //- span ZA<br>Course
      //   img(src="/static/img/Home/za-course.svg")
    .row-mobile-cata(
      v-if="$route.meta.type=='theme' || $route.path.indexOf('/expo')==0 || $route.meta.mobilenav",
      :style="mobileCataStyle")
      .ovh(v-if="$route.meta.mobilenav")
        .page-label.animated.slideInUp(
                    v-if="$route.meta.mobilenav.text",
                    :key="$route.meta.mobilenav.text") {{$route.meta.mobilenav.text}}
        .page-label.animated.slideInUp(
                    v-if="$route.meta.mobilenav.img",
                    :key="$route.meta.mobilenav.img") 
            img(:src="$route.meta.mobilenav.img")
        .loginbtn(@click="openMenu('login')") {{auth.user?"登出":"登入"}}
      .wrapper.ovh.animated.slideInUp
        .mt(:style="mobile_nav_style")
        img(v-for="theme in themes.slice().reverse()", :src="theme.nav_image")
        
        
</template>

<script>
import {mapState, mapMutations} from 'vuex'
import axios from 'axios'
export default {
  computed:{
    ...mapState(['themes','auth']),
    theme(){
      // console.log((this.$route).split("/")[1])
      return this.themes.find(o=> o.title.toLowerCase()==(this.$route.path).split("/")[1]) || {}
    },
    navbarStyle(){
      let width = this.$route.meta.navWidth || "450px"
      return {
        width,
        right: this.$route.meta.navPosition!='left'?"0px":`calc(100% - ${width})`,
        display: (this.$route.path.indexOf("/manage")==0) || (this.$route.path.indexOf("/member")==0) ? "none":"block"
      }
    },
    upCircleTo(){
      if (this.$route.path=="/"){
        return "/expo"
      }
      if (this.$route.meta.type=="theme"){
        return "/"
      }
    },
    mobile_nav_style(){
      let mt = 0
      if (this.$route.path.indexOf("/expo")==0){
        mt= -5
      }
      if (this.$route.path.indexOf("/base")==0){
        mt= -83
      }
      if (this.$route.path.indexOf("/course")==0){
        mt= -160
      }
      return {
        'margin-top': mt+"px"
      }
    },
    mobileCataStyle(){
      if (this.$route.meta.type=="theme"){
        return {
          'background-color': "transparent"
        }
      }else if (this.$route.path.indexOf('/expo')==0){
        return {
          'background-color': this.theme.color
        }
      }else if (this.$route.meta.mobilenav.color){
        return {
          'background-color': this.$route.meta.mobilenav.color
        }
      }
    },
    subBack(){

      // console.warn(this.$route.meta.subBack)
      let meta = this.$route.meta
      let name = meta.subBack.name
      let path = meta.subBack.path
      if (meta.subBack.params){
        meta.subBack.params.forEach(paramKey=>{
          name = name.replace("{"+paramKey+"}",this.$route.params[paramKey])
          path = path.replace("{"+paramKey+"}",this.$route.params[paramKey])
        })
      }
      return {
        name , path
      }
    }
  },
  methods: {
      ...mapMutations(['setMenuState','openMenu']),
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
@import "../assets/_mixins.sass"
.navbar
  position: fixed
  right: 0
  top: 0
  padding: 0
  width: 300px
  height: 100vh
  transition: 0.5s, right 1s
  .row-bottom
    width: 100%
  .row-mobile-cata
    position: fixed
    top: 0
    left: 60px
    height: 60px
    width: calc(100% - 60px)
    display: none
    background-color: black
    overflow: hidden
    +rwd_md
      display: block
    .wrapper
      height: 60px
      overflow: hidden
      box-sizing: border-box
    img
      height: 60px
      display: block
      margin: 10px
      margin-top: 16px
      // margin-bottom: 10px
    .page-label
      // font-weight: 900
      text-align: left
      vertical-align: middle
      height: 60px
      font-size: 30px
      padding-left: 10px
      line-height: 60px
      img
        height: 40px
    .loginbtn
      position: absolute
      right: 30px
      top: 20px
      color: black
      letter-spacing: 2px
      opacity: 0.5

  .animated.slideInUp
    animation-delay: 0.8s
  a
    text-decoration: none
  .nav-cht-logo
    font-size: 52px
    white-space: nowrap
    margin-left: -10px
    // font-weight: 900
    text-decoration: none
    color: black
    margin-top: -20px
  .logo-img
    width: 130px
    margin-right: -40px
  .logo-part
    display: flex
    flex-direction: column
    align-items: center
    justify-content: center

  
      
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
    flex: 1
    display: flex
    flex-direction: column
    padding: 80px 75px
    position: relative
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
    // font-size: 24px

    .years
      position: absolute
      left: 100%
      top: 0
      // transform: translateY(-50%)
      list-style: none
      padding: 0
      font-size: 15px
      .year-item
        display: block
        color: inherit
        padding: 15px 30px
        background-color: #8af187
        opacity: 0 
        pointer-events: none
        &:nth-child(1)
          transition: opacity 0.5s 0.3s
        &:nth-child(2)
          transition: opacity 0.5s 0.2s
        &:nth-child(3)
          transition: opacity 0.5s 0.1s
        +trans
        border-bottom: solid 1px rgba(white,0.5)
        border-left: solid 1px rgba(white,0.5)
        &:hover
          background-color: lighten(#8af187,5)
        
  .col-theme-nav
    &:hover 
      background-color: #aaa

      .years .year-item
        opacity: 1
        pointer-events: initial
        &:nth-child(1)
          transition: opacity 0.5s 0.1s
        &:nth-child(2)
          transition: opacity 0.5s 0.2s
        &:nth-child(3)
          transition: opacity 0.5s 0.3s

  .col-login
    border: none
    letter-spacing: 0.6px

  .explore
    text-align: left
    font-size: 24px
    text-decoration: none
    color: black
    
    .themename
      font-size: 34px
      font-weight: bold
      text-transform: uppercase
      display: flex
      align-items: flex-end

      .text
        flex-shrink: 0
        

  +rwd_md
    +size(100%,60px)
    background-color: transparent
    .container-fluid
      background-color: transparent
    .explore
      color: white
    .logo-img
      +size(60px,36px)
    .row-logo
      padding: 0
      height: 60px
      background-color: transparent
      flex-direction: row
      display: none
    .logo-part
      display: flex
    .nav-cht-logo
      display: none
    .container-fluid
      +size(100%,60px)
      padding: 0
    .col-image
      flex: 300px
      flex-grow: 0
    .row-bottom
      position: relative
      height: 100%
      // width: 100%
      margin-left: 60px
      background-color: transparent
      
      .col-theme-nav,.col-login
        position: absolute
        
        background-color: transparent
        left: 60px
        top: 0
        padding: 0
        height: 100%
      .col-theme-nav
        display: none


        
  @keyframes widthani
    0%
      width: 0
    100%
      width: 20px

  @keyframes widthaniSmall
    0%
      width: 0
    100%
      width: 10px

  @keyframes widthani100
    0%
      width: 0
      margin-left: 100px
    100%
      width: 100px
      margin-left: 0px

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
      animation: widthani100 1s 1.5s both
      &:before,&:after
        animation: widthaniSmall 1s 1.7s both
      transform-origin: center center
      transform: rotate(180deg)
      width: 100px
      margin-left: 0
      margin-bottom: 60px

      //back to (arrow)
      // .arrow-right.reverse
      //   position: absolute
      //   width: 100%
                

  @keyframes widthani50
    0%
      width: 0
      margin-left: 40px
    100%
      width: 40px
      margin-left: 10px
  .subBack
    position: absolute
    bottom: 30px 
    font-weight: 300
    letter-spacing: 2px
    display: flex
    align-items: center

    .arrow-right
      margin-top: 0
      margin-bottom: 0
      margin-left: 20px
      animation: widthani50 1s 1s both
      background-color: black !important
      &:before,&:after
        background-color: black
      width: 50px
      display: inline-block

  //hover的特別顏色
  .nav-course
    &:hover,&.router-link-active
      background-color: #8135f9
  .nav-base
    &:hover,&.router-link-active
      background-color: #8af187
  .nav-expo
    &:hover,&.router-link-active
      background-color: #1161ef
    
  .col-theme-nav
    background-color: black
    color: white
    font-size: 24px
    font-weight: bold
    text-align: left
    line-height: 1
    position: relative
    img
      height: 70px
      margin-bottom: -30px

 
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

    +rwd_md
      position: fixed
      left: initial
      top: 320px
      right: 30px

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
    
  .mt
    +trans
  // background-color: black
</style>
