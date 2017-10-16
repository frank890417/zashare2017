<template lang="pug">
.page_workshops
  .container-fluid.col-selector
    .container
      .row
        .col-sm-12
          .row
            .col-sm-12
              br
              h1 活動與講座資訊
              //hr
              br
              .col-sm-12.col-cata.fixed(v-if="fixed_cata_class")

                .btn-group
                  .btn.btn-secondary(
                    v-for="evt_type in event_types.map(o=>o.tag)",
                    @click="now_event_type = evt_type",
                    :class="{'btn-primary': now_event_type == evt_type}"
                  ) {{evt_type}}
                
                .btn-group
                  .btn.btn-secondary(
                    v-for="time in Object.keys(time_chunk(workshop))",
                    @click="now_date = time",
                    :class="{'btn-primary': now_date == time}"
                  ) {{time}}
                br
                br
                
            .col-sm-12.col-cata
              .btn-group
                .btn.btn-secondary(
                  v-for="evt_type in event_types.map(o=>o.tag)",
                  @click="now_event_type = evt_type",
                  :class="{'btn-primary': now_event_type == evt_type}"
                ) {{evt_type}}
              br
              br
            .col-sm-12.col-cata
              .btn-group
                .btn.btn-secondary(
                  v-for="time in Object.keys(time_chunk(workshop))",
                  @click="now_date = time",
                  :class="{'btn-primary': now_date == time}"
                ) {{time}}
              br
              br
  .container
    .row
      .col-sm-12
        .container-table(v-for="ws in event_types.filter(o=>o.tag==now_event_type)")
          .row
            .col-sm-12
              br
              h2 {{ws.tag}}
              p(v-if="ws.tag=='雜工坊'") 工作坊報名資格：持有雜學校門票，在線上報名工作坊的同時，別忘了提前購買2017雜學校入場門票哦！
              hr

            .col-sm-12(v-if="!time_chunk(ws.data)[now_date]") 
              h4 此時間/類型無對應活動場次
            .col-sm-12(
              v-for="(events,time) in time_chunk(ws.data)",
              v-if="time==now_date"
              )
              //h3 {{time}}
              h4 共{{events.length}}場活動
              table.table.table-hover(v-if="now_date == time")
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
                            @click="registerEvent(event,now_event_type)"
                            target="_blank",
                            v-if="event.website"
                          ) 報名
                    td.hidden-xs {{event.name}}
                      //<br>({{event.tag}})
                    td.hidden-xs {{event.place}}
                    td.hidden-xs {{event.register}}<br>
                      .btn.btn-secondary.btn-primary(
                        @click="registerEvent(event,now_event_type)"
                        target="_blank",
                        v-if="event.website"
                      ) 報名
    //.row
      .col-sm-12
        pre(v-html="workshop_c")
  //pre(v-html="time_chunk")
</template>

<script>
import {mapState} from 'vuex'
import workshop from "../data/workshop_2017.js"
import workshop_c from "../data/workshop_c_2017.js"
import zaforum from "../data/zaforum_2017.js"
import exforum from "../data/exforum_2017.js"
import talk from "../data/talk_2017.js"
import _ from 'lodash'
export default {
  metaInfo: {
    title: '工作坊', // set a title
    titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
  },
  data() {
    return {
      workshop: workshop.default,
      workshop_c: workshop_c.default,
      talk: talk.default,
      event_types: [
        {
          tag: "雜工坊",
          data: workshop.default.concat(workshop_c.default)
        },
        {
          tag: "雜講堂",
          data: talk.default
        },
        {
          tag: "雜論壇",
          data: zaforum.default
        },
        {
          tag: "實驗教育論壇",
          data: exforum.default
        }
      ],
      now_date: "10/19(四)",
      now_event_type: "雜工坊"
    }
  },
  computed:{
     ...mapState(['scrollTop','wsize']),
    fixed_cata_class(){
      let $cata_bar = $(".col-selector")
      let _this = this
      if (_this.scrollTop>$cata_bar.height() ){
        return true
      }
      
      return false
    }
  },
  watch:{
    now_date(){
      $("html,body").animate({scrollTop:0})
    },
    now_event_type(){
      $("html,body").animate({scrollTop:0})
    }
  },
  methods:{

    time_chunk(obj){
      return _.groupBy(obj,o=>o.date)
    },
    place_chunk(obj){
      return _.groupBy(obj,o=>o.place)
    },
    replaceDash(text){
      return text.replace('-','<br>|<br>')
    },
    registerEvent(event,type){
      if (type=='雜論壇'){
        if (this.$ga){
          this.$ga.event('workshop', 'click',event.title)
        }
        window.open(event.website)

      }else {
        if (confirm("必須持有雜學校門票才能報名，如果沒有請先購票再報名！")){
          if (this.$ga){
            this.$ga.event('workshop', 'click',event.title)
          }
          window.open(event.website)

        }
      }
    }
  }
  
}
</script>

<style>

</style>
