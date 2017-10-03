<template lang="pug">
div.app_container
  transition(name="fade")
    page_loading(v-if="loading")
  navbar(:class="{at_landing_page: $route.path=='/'}")
  transition(name='fade', mode='out-in')
    router-view(:key="$router.path")
  sectionFooter(v-if="$route.path!='/'")

</template>

<script>
import navbar from './components/navbar'
import sectionFooter from './sections/sectionFooter'
import page_loading from './pages/page_loading'
import {mapState,mapMutations} from 'vuex'

export default {
  mounted(){

  },
  data() {
    return {

    }
  },
  components: {
    navbar,
    sectionFooter,
    page_loading
  },
  computed:mapState(['loading']),
  methods: mapMutations(['setLoading'])
}
</script>
