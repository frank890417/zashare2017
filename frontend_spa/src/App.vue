<template lang="pug">
  #app(:class="{noScroll: menuState}")
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
    ...mapState(['menuState'])
  }
}
</script>

<style lang="sass">
@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css)

html,body
  margin: 0
  padding: 0
  width: 100%
  height: 100%

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
  &.right
    padding-left: 350px

.fade-enter-active, .fade-leave-active 
  transition: opacity .5s

.fade-enter, .fade-leave-to
  opacity: 0


.container-fluid
  padding: 0

p 
  text-align: left
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

@for $i from 1 through 15
  .col-#{$i}
    flex: $i

</style>
