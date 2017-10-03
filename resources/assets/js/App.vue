<template lang="pug">
div.app_container
  navbar(:class="{at_landing_page: $route.path=='/'}")
  transition(name='fade', mode='out-in')
    router-view(:key="$router.path")
  sectionFooter(v-if="$route.path!='/'")

</template>

<script>
import navbar from './components/navbar'
import sectionFooter from './sections/sectionFooter'

export default {
  components: {
    navbar,
    sectionFooter
  },
  computed:{

  }
}
</script>
