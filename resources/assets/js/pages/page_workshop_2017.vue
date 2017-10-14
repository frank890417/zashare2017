<template lang="pug">
.page_workshops
  .container
    .row
      .col-sm-12
        h1 工作坊活動
        hr
        .btn-group
          .btn.btn-secondary(
            v-for="time in Object.keys(time_chunk)",
            @click="now_date = time",
            :class="{'btn-primary': now_date == time}"
          ) {{time}}
        br
        br
  .container.container-table
    .row
      .col-sm-12(
        v-for="(events,time) in time_chunk",
        v-if="now_date == time"
        )
        //h3 {{time}}
        table.table.table-hover
          thead
            th(style="width: 10%") 時間
            //th(style="width: 5%") 參展編號
            //th(style="width: 10%") 攤位編號
            th(style="width: 15%") 名稱
            th(style="width: 15%") 主題
            th(style="width: 25%") 描述
            th(style="width: 20%") 報名方式
            //th(style="width: 5%") 報名連結
            th(style="width: 15%") 地點

          tbody
            tr(v-for="event in events")
              td.text-center {{event.time}} 
              //td {{event.tag_team}}
              td {{event.name}} ({{event.tag}})
              td {{event.title}}
              td {{event.description}}
              td {{event.register}}
                a.btn.btn-primary(
                  :href='event.website', 
                  target="_blank",
                  v-if="event.website"
                ) 報名
              td {{event.place}}

  //pre(v-html="time_chunk")
</template>

<script>
import workshop from "../data/workshop_2017.js"
import _ from 'lodash'
export default {
  data() {
    return {
      workshop: workshop.default,
      now_date: "10/19(四)"
    }
  },
  computed:{
    time_chunk(){
      return _.groupBy(this.workshop,o=>o.date)
    }
  },
  methods:{
    place_chunk(obj){
      return _.groupBy(obj,o=>o.place)
    }
  }
  
}
</script>

<style>

</style>
