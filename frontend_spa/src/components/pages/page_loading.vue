<template lang="pug">
.page.page-loading
  img.animated.fadeIn.animated(src="https://service.zashare.org/img/2017/index_za_logo_white.svg")
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
  img
    width: 80%
    max-width: 220px
</style>
