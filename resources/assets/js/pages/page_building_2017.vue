<template lang="pug">
.page_building

  .container
    .row
      .col-sm-12
        h1 場館介紹
        hr
    
      .col-lg-12.col-md-12
        img(src="/img/2017/2017_all_map.svg")
        br
      .col-lg-12.col-md-12
        .row
          .col-sm-6(v-for="dataset in [building.slice(0,8), building.slice(8)]")
            li(v-for="(row,bid) in dataset").building
              .part_num
                h3.num {{row.num}}
              .part_info
                h2 {{row.name}}
                h4(style="opacity: 0.4") {{row.place}}
                p {{row.description}}
        br
          
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
