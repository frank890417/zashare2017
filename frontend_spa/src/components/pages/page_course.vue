<template lang="pug">
.page.right.page-course
  iframe.animated.fadeIn(src="https://www.zashare.com.tw/pages/%E9%9B%9C%E9%81%B8%E8%AA%B2")
</template>

<script>
import {mapState} from 'vuex'
export default {
  mounted(){
  },
  computed: {
    ...mapState(['mobile'])
  }
}
</script>

<style lang="sass" scoped>
iframe
  width: 100%
  height: 100vh
</style>
