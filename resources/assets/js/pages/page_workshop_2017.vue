<template lang="pug">
.page_workshops
  .container
    .row
      .col-sm-12
        h1 工作坊活動
        hr
        p 工作坊報名資格：持有雜學校門票，在線上報名工作坊的同時，別忘了提前購買2017雜學校入場門票哦！
        br
      .col-sm-12.col-cata.fixed(v-if="fixed_cata_class")
        .btn-group
          .btn.btn-secondary(
            v-for="time in Object.keys(time_chunk)",
            @click="now_date = time",
            :class="{'btn-primary': now_date == time}"
          ) {{time}}
      .col-sm-12.col-cata
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
            th.text-center(style="width: 10%") 時間
            //th(style="width: 5%") 參展編號
            //th(style="width: 10%") 攤位編號
            th(style="width: 45%") 主題
            th.hidden-xs(style="width: 15%") 單位
            th.hidden-xs(style="width: 15%") 地點
            //th(style="width: 25%") 描述
            th.hidden-xs(style="width: 15%") 報名方式
            //th(style="width: 5%") 報名連結

          tbody
            tr(v-for="event in events")
              td.text-center(v-html="replaceDash(event.time)")
              //td {{event.tag_team}}
              td
                h3 {{event.title}}
                p {{event.description}}
                .visible-xs
                  hr
                  p.mobile_info
                    | 單位：{{event.name}} <br>
                    //({{event.tag}})
                    | 地點：{{event.place}}<br>
                    | 報名方式：{{event.register}}<br>
                    .btn.btn-secondary.btn-primary(
                      @click="registerEvent(event)"
                      target="_blank",
                      v-if="event.website"
                    ) 報名
              td.hidden-xs {{event.name}}
                //<br>({{event.tag}})
              td.hidden-xs {{event.place}}
              td.hidden-xs {{event.register}}<br>
                .btn.btn-secondary.btn-primary(
                  @click="registerEvent(event)"
                  target="_blank",
                  v-if="event.website"
                ) 報名

  //pre(v-html="time_chunk")
</template>

<script>
import {mapState} from 'vuex'
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
    },
     ...mapState(['scrollTop','wsize']),
    fixed_cata_class(){
      let $cata_bar = $(".col-cata")
      let _this = this
      if (_this.scrollTop>$cata_bar.height() ){
        return true
      }
      
      return false
    }
  },
  methods:{
    place_chunk(obj){
      return _.groupBy(obj,o=>o.place)
    },
    replaceDash(text){
      return text.replace('-','<br>|<br>')
    },
    registerEvent(event){
      if (confirm("必須持有雜學校門票才能報名，如果沒有請先購票再報名！")){
        if (this.$ga){
          this.$ga.event('workshop', 'click',event.title)
        }
        window.open(event.website)
      }
    }
  }
  
}
</script>

<style>

</style>
