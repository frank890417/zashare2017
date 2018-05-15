<template lang="pug">
#app(:class="{noScroll: menuState}")
  transition(name="fade")
    page_loading(v-if="loading")
  .mobileBlock(v-if="mobile_mask_show")
    .logo-container.animated.swing
      img.logo(src="/static/img/Home/za-logo.svg")
    h2 手機版本還在開發中...<br>請使用電腦版瀏覽：）
  //- transition(name="page")
  
  transition(name="page" , mode="out-in")
    router-view(:key="$route.path")
    
  navbar
  full_menu
  section_footer
    
</template>

<script>
import {mapState} from 'vuex'
export default {
  name: 'App',
  
  computed: {
    ...mapState(['menuState','mobile_mask_show','loading'])
  }
}
</script>

<style lang="sass">
@import "assets/_mixins.sass"
// @import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css)
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700)


//just font fadeIn

.mobileBlock
  position: fixed
  width: 100vw
  height: 100vh
  left: 0
  top: 0
  background-color: rgba(black,0.8)
  line-height: 1.8
  color: white
  z-index: 5000
  display: flex
  justify-content: center
  align-items: center
  flex-direction: column
  display: none
  +rwd_md
    display: flex
  .logo-container
    background-color: white
    padding-left: 25px
    padding-top: 20px
    animation-iteration-count: infinite
    animation-duration: 2s
    margin-bottom: 50px
  .logo
    width: 100px
    // height: 50px

    // padding: 10px


html,body
  margin: 0
  padding: 0
  width: 100vw
  // height: 100vh
  font-size: 16px
  overflow-x: hidden
i
  position: relative

//字體設定

h1,h2,h3,h4,h5,h6,p,li
  letter-spacing: 0.05rem
  line-height: 2
  &.small
    font-size: 0.6em
    
h1
  font-size: 2.8rem
  font-weight: 700
  line-height: 1.5
  +rwd_md
    font-size: 2.6rem
h2
  font-size: 2rem
  font-weight: 500
  line-height: 1.5
  +rwd_md
    font-size: 1.8rem
h3
  font-size: 1.6rem
  font-weight: 500
  line-height: 1.5
  +rwd_md
    font-size: 1.4rem
h4
  font-size: 1.2rem
  font-weight: 500
  line-height: 1.5
h5
  font-size: 1rem
  font-weight: 500
  line-height: 1.5
p
  font-size: 1rem
  line-height: 2
  font-weight: 500
  opacity: 0.9
// span
//   font-size: 1rem

li
  font-size: 1rem

p
  text-align: justify


.noScroll
  overflow-y: hidden
  height: 100vh

.scrollY
  overflow-y: auto
.scrollX
  overflow-x: auto
.curp
  cursor: pointer
.btn
  cursor: pointer
  padding: 8px 40px
  border: solid 1px #ccc
  display: inline-block
  margin-top: 10px
  font-size: 12px
  text-decoration: none
  // color: inherit
  // &:hover
    // background-color: #eee

  &.fw
    width: 100%

  @mixin colorSet($frontColor,$backColor)
    
  &.black
    background-color: black
    color: white
    &:hover
      background-color: #333
  &.nobg
    color: #333
    background-color: transparent
    border: none

.btn-group
  display: flex
  justify-content: space-between
  .btn
    padding: 10px
    margin-right: 10px
    &:last-child
      margin-right: 0
  +rwd_md
    // flex-direction: column
    .btn
      // margin-right: 0
.ovh
  overflow: hidden

.text-left
  text-align: left
.text-right
  text-align: right

// .animated
  // animation-duration: 2.5s
.jf-active 
  h1,h2,h3,h4,h5,h6,p
    font-family:  'Open Sans','xingothic-tc', 'Avenir', Helvetica , sans-serif !important

#app
  font-family:  'Open Sans','xingothic-tc', 'Avenir', Helvetica , sans-serif !important
  -webkit-font-smoothing: antialiased
  -moz-osx-font-smoothing: grayscale
  text-align: center
  color: #000
  height: auto
  width: 100%
  margin-top: 0
  // position: absolute
  overflow-x: hidden
  overflow-y: auto
  // left: 0
  // top: 0

.container
  max-width: 960px

.float-right
  float: right

.float-left
  float: left

.page
  min-height: 100vh
  // padding-left: 30px
  // padding-right: 30px
  +rwd_sm
    padding-top: 60px
  &.right
    padding-left: 350px
    +rwd_md
      padding-left: 0px
      padding-right: 0px

.fade-enter-active, .fade-leave-active 
  transition: opacity .5s

.fade-enter, .fade-leave-to
  opacity: 0



.page-enter-active, .page-leave-active 
  transition: opacity 0.5s

.page-enter, .page-leave-to
  opacity: 0
  
// .page-enter-active
//   @keyframes pageBlockUp
//     0%
//       bottom: 0
//       height: 100vh
//     100%
//       bottom: 0
//       height: 0%

//   &:before
//     content: ''
//     display: block
//     position: fixed
//     left: 0
//     +size(100%)
//     z-index: 3
//     animation: pageBlockUp 0.5s both
//     background-color: black


// .page-leave-active
//   @keyframes pageBlockDown
//     0%
//       top: 0
//       height: 0
//     100%
//       top: 0
//       height: 100vh

//   &:before
//     content: ''
//     display: block
//     position: fixed
//     left: 0
//     +size(100%)
//     z-index: 3
//     animation: pageBlockDown 0.5s both
//     background-color: black
    

.container-fluid
  padding: 0

p 
  text-align: justify
  font-size: 15px
  line-height: 1.8
  font-weight: 500

a.nostyle
  text-decoration: none
  color: inherit

.flex
  display: flex
  &.col
    flex-direction: column
  &.row
    flex-direction: row


.upCircle
  // transform: translate(-50%,50%)
  transform-origin: center center
  z-index: 10
  box-shadow: 0px 0px 20px rgba(black,0.3)

  width: 70px
  height: 70px
  background-color: white
  border-radius: 50%
  color: black

  +flexCenter

  &:before
    content: ""
    display: block
    
    width: 10px
    height: 10px
    border-style: solid
    border-width: 0 10px 17.3px 10px
    border-color: transparent transparent #000000 transparent
    transition: 0.5s
    transform-origin: center center
  &.downCircle
    &:before
      transform: rotate(180deg)



.slick-dots
  display: flex
  list-style: none
  position: absolute
  left: 50%
  bottom: 20px
  padding-left: 0
  transform: translateX(-50%)
  padding: 0
  margin: 0


  button
    border: none
    +size(20px)
    transform: scale(0.5)
    border-radius: 50%
    background-color: #fff
    color: transparent
    font-size: 0
    margin: 2px
    outline: none
    cursor: pointer
    opacity: 0.4
    +trans
    +rwd_md
      transform: scale(0.35)
      margin: -2px


    &:hover
      opacity: 1

  .slick-active button
    opacity: 1
      

@for $i from 1 through 15
  .col-#{$i}
    flex: $i

.text-center
  text-align: center
.hidden-md
  +rwd_md
    display: none
.visible-md
  display: none
  +rwd_md
    display: block


.footer_logo
  line-height: 30px
  display: -webkit-box
  display: flex
  -webkit-box-pack: center
  justify-content: center
  width: 100%
  margin-top: -20px
  margin-bottom: 20px
  img
    width: 28px
    opacity: 0.6
    +trans
  a
    display: block
    +size(28px)
    color: #bbb
    background-color: #fff
    border: solid 1px #bbb
    border-radius: 50%
    -webkit-box-pack: center
    justify-content: center
    -webkit-box-align: center
    align-items: center
    font-size: 18px
    display: -webkit-inline-box
    display: inline-flex
    width: 30px
    height: 30px
    margin: 8px
    +trans
    &:hover
      color: white
      background-color: black
      border-color: black
      img
        filter: contrast(0%) brightness(200%)
        opacity: 0.8
  i
    font-size: 20px

</style>
