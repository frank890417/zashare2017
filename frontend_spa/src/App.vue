<template lang="pug">
  #app
    router-view(:key="$route.path")
    navbar
    full_menu

</template>

<script>
export default {
  name: 'App'
}
</script>

<style lang="sass">
html,body
  margin: 0
  padding: 0
  width: 100%
  height: 100%

.btn
  cursor: pointer
  padding: 8px 40px
  border: solid 1px #ccc
  display: inline-block
  &:hover
    background-color: #eee

.ovh
  overflow: hidden

// .animated
  // animation-duration: 2.5s

#app
  font-family: 'Avenir', Helvetica, Arial, sans-serif
  -webkit-font-smoothing: antialiased
  -moz-osx-font-smoothing: grayscale
  text-align: center
  color: #2c3e50
  height: 100%
  width: 100%
  margin-top: 0
  position: absolute
  left: 0
  top: 0

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
