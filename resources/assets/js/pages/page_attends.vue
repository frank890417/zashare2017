<template lang="pug">
.page_attends
  .container
    attend_panel(:atlist="atlist")
</template>

<script>

export default {
  components: {
    attend_panel: require( '../components/attend_panel.vue')
  },
  data() {
    return {
      atlist: require('../data/team_2017.js').default
    }
  }
}
</script>

<style>

</style>
