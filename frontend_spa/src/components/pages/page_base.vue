<template lang="pug"> 
.page.right.page-base
  iframe.animated.fadeIn(src="https://www.zashare.com.tw")
</template>

<script>
import {mapState} from 'vuex'
export default {
  mounted(){
    if (this.mobile){
      // window.open("https://www.zashare.com.tw")
      document.location = "https://www.zashare.com.tw"
    }
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
