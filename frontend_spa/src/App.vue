<template lang="pug">
#app(:class="{noScroll: menuState}")
  transition(name="fade")
    page_loading(v-if="loading")
  .mobileBlock(v-if="mobile_mask_show")
    .logo-container.animated.swing
      img.logo(src="/static/img/Home/za-logo.svg")
    h2 手機版本還在開發中...<br>請使用電腦版瀏覽：）
  //- transition(name="page")
  router-view(:key="$route.path")
  navbar
  full_menu
    
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
@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css)

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
  height: 100vh
  overflow-x: hidden
.noScroll
  // overflow-y: hidden
.scrollY
  overflow-y: auto
.scrollX
  overflow-x: auto
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
    
    margin-right: 10px
    &:last-child
      margin-right: 0

.ovh
  overflow: hidden

.text-left
  text-align: left
.text-right
  text-align: right

// .animated
  // animation-duration: 2.5s

#app
  font-family: 'Noto Sans TC','Avenir', Helvetica, Arial, sans-serif
  -webkit-font-smoothing: antialiased
  -moz-osx-font-smoothing: grayscale
  text-align: center
  color: #000
  height: 100%
  width: 100%
  margin-top: 0
  position: absolute
  left: 0
  top: 0

.container
  max-width: 960px

.float-right
  float: right

.float-left
  float: left

.page
  min-height: 100vh
  &.right
    padding-left: 350px
    +rwd_md
      padding-left: 0

.fade-enter-active, .fade-leave-active 
  transition: opacity .5s

.fade-enter, .fade-leave-to
  opacity: 0


.container-fluid
  padding: 0

p 
  text-align: justify
  font-size: 15px
  line-height: 1.8

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
</style>
