<template lang="pug">
.page_attends
  .container
    attend_panel(:atlist="atlist")
</template>

<script>

export default {
  metaInfo: {
    title: '參展攤位2017', // set a title
    titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
  },
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
