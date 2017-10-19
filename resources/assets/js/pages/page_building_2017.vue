<template lang="pug">
.page_building

  .container
    .row
      .col-sm-12
        h1 場館介紹
        hr
    ul.row
      li.col-sm-6(v-for="(row,bid) in building")
        h3 {{bid+1}}
        h2 {{row.name}}
        h4(style="opacity: 0.4") {{row.place}}
        p {{row.description}}
  
</template>

<script>
import building_2017 from "../data/building_2017.js"
import _ from "lodash"
export default {
  data(){
    return {
      building: building_2017.default
    }
  },
  computed:{
    chunk_building(){
      return _.chunk(this.building,2)
    }
  }
}
</script>

<style>

</style>
