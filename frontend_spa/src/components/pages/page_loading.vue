<template lang="pug">
.page.page-loading
  img.animated.fadeIn.animated(src="https://service.zashare.org/img/2017/index_za_logo_white.svg")
  br
  h4 網站建置中...
</template>

<script>
export default {

}
</script>

<style lang="sass">
.page-loading
  display: flex
  justify-content: center
  align-items: center
  background-color: black
  width: 100%
  height: 100%
  z-index: 1000
  position: fixed
  color: white
  flex-direction: column
  img
    width: 40vw
    max-width: 120px
</style>
