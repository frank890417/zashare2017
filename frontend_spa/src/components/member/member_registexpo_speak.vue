<template lang="pug">
.page.member-regist-expo.text-left
  .container
    .col-sm-12
      h2.mt-5 Zac. 教育新創短講評選申請表
      .row.mt-3
        .col-sm-12
      p 雜學校設法創造一個能提供實質資源的公開平台，透過Zac. 徵選，邀請通過初選之10 組入圍團隊（每一參與者均收21,000 元/ 展位）將移展至「雜學校概念館 」，由雜學校團隊量身訂製策展規劃，不只提供行銷與曝光的舞台，並讓其他參展團隊、記者媒體、貴賓等也有一個很棒的觀摩機會！（詳細參與辦法及相關評選內容請見徵展手冊 P.19)
      
    .col-sm-12.text-left.mt-5
      el-steps(:active="active" finish-status="success")
        el-step(title="申請基本資訊" , @click="active=0")
        el-step(title="申請資料填寫" , @click="active=1")
        el-step(title="申請人聯絡資料" , @click="active=2")
        el-step(title="確認送出" , @click="active=3")
        el-step(title="填寫完成" , @click="active=4")
        
    .col-sm-12    
      el-form(v-if="registExpoSpeak",  :disabled = "typeof registExpoSpeak.id=='number'",
              label-position="left",
              :model="registExpoSpeak")
        div(v-show="active==0")
          h4.mt-5.mb-5 ㄧ、申請基本資訊
          
          el-form-item(required label="1. 評選入圍之單位，是否同意策展權益交由給主辦單位規劃與設計")
            br
            br
            el-radio(:label="1" v-model="registExpoSpeak.agree_plan" ) 是，移展至雜學校概念館（由雜學校團隊量身規劃展位）
            el-radio(:label="0" v-model="registExpoSpeak.agree_plan" ) 否，維持在雜博覽展出（參展團隊自行規劃展位）             
            
            
        
          el-form-item(required label="2. 團隊人數")
            br
            br
            el-input-number(v-model="registExpoSpeak.team_person_count")

          el-form-item(required label="3. 是否已有獲得資金挹注")
            br
            br
            el-radio(:label="1" v-model="registExpoSpeak.has_money" ) 是
            el-radio(:label="0" v-model="registExpoSpeak.has_money" ) 否
                        


        div(v-show="active==1")
          h4.mt-5.mb-5 二、申請資料填寫


          el-form-item(required label="1. 請簡述你的具體創業內容（200-300字內）")
            el-input(v-model="registExpoSpeak.startup_content", type="textarea" rows="5" :maxlength="300")

          el-form-item(required label="2. 請簡述你的目標族群（200-300字內）")
            el-input(v-model="registExpoSpeak.startup_audience", type="textarea" rows="5" :maxlength="300")

          el-form-item(required label="3. 請簡述你目前的創業困境（200-300字內）")
            el-input(v-model="registExpoSpeak.startup_difficult", type="textarea" rows="5" :maxlength="300")

          el-form-item(required label="4. 請敘述你想解決的教育問題（200-300字內）")
            el-input(v-model="registExpoSpeak.startup_problem", type="textarea" rows="5" :maxlength="300")

          el-form-item(required label="5. 請敘述你認為團隊/產品賦予社會的影響力是（200-300字內）")
            el-input(v-model="registExpoSpeak.startup_power", type="textarea" rows="5" :maxlength="300")

          el-form-item(required label="6. 請檢附一份20頁(內)提案計畫書（主辦單位將以此份檔案作為「Zac.新創教育短講評選」初選評比依據。）")
            el-upload(
              drag
              auto-upload
              :limit="1"
              ref="upload"
              accept=".pdf"
              :data="{token: auth.token}"
              :on-success="(url)=>{registExpoSpeak.startup_proposal = url}"
              :action="apiDomain+'api/registexpo/uploadtemp'"
              
            )
              i.el-icon-upload
              div.el-upload__text 將文件拖曳到此處或<em>點擊上傳</em>
              div.el-upload__tip(slot="tip") 只能上傳不超過20MB的PDF文件


        div(v-show="active==2")
          h4.mt-5.mb-5 三、申請人聯絡資料
          .row
            .col-sm-12
              h6 1.	主要聯絡人（請優先填寫執行窗口）
            .col-sm-12

              el-form-item(required label="姓名")
                el-input(v-model="registExpoSpeak.main_contact_name")
              el-form-item(required label="手機")
                el-input(v-model="registExpoSpeak.main_contact_phone")
              el-form-item(required label="Email")
                el-input(v-model="registExpoSpeak.main_contact_email")

          .row.mt-5
            .col-sm-12
              h6 2.	次要聯絡人
            .col-sm-12

              el-form-item(required label="姓名")
                el-input(v-model="registExpoSpeak.secondary_contact_name")
              el-form-item(required label="手機")
                el-input(v-model="registExpoSpeak.secondary_contact_phone")
              el-form-item(required label="Email")
                el-input(v-model="registExpoSpeak.secondary_contact_email")

        div(v-show="active==3") 
          //- pre(v-html="registExpoSpeak")
          p.mt-5 恭喜你即將完成「Zac. 教育新創短講評選」的報名申請！<br>請再次確認所有填寫資料後按下「確認送出」，主辦單位收到報名申請後將以E-mail回覆確認。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。
          el-button.mt-5(@click="sendRegistForm" type="primary" size="medium") 送出 Zac. 教育短講 申請
        div(v-if="active==4") 
          p.mt-5 謝謝你願意和我們一同為教育而努力！<br>最後初選入圍名單將於2018/07/10公布在官方網站。
          panel_expo2018

      hr
      div.mt-5
        el-button.float-left(@click="prev", v-if="active>0 && active<4") 上一步
        el-button.float-right(@click="next" , v-if="active<3") 下一步

</template>




<script>
import {mapState, mapGetters, mapActions} from 'vuex'
import panel_expo2018 from '@/components/panels/panel_expo2018'
export default {
  data(){
    return {
      registExpoSpeak: {},
      // audiences: "學齡前幼兒／國小生／國中生／高中生／自學生／大專以上學生／職場新鮮人／青壯年／家長／教育工作者／投資人／創業者／學校單位／公部門／其他".split("／"),
      active: 0,
      success: false,
      types: [ "藝術體驗創作",
              "傳統工藝教學",
              "互動式教學",
              "科學動手實驗",
              "創新教案分享與教學",
              "小型分享座談",
              "戶外園區導覽",
              "其他"],
      timespans: [
        "10/5 (五) 13:00-14:30",
        "10/5 (五) 15:00-16:30",
        "10/5 (五) 17:00-18:30",
        "10/6 (六) 10:00-11:30",
        "10/6 (六) 13:00-14:30",
        "10/6 (六) 15:00-16:30",
        "10/6 (六) 17:00-18:30",
        "10/7 (日) 10:00-11:30",
        "10/7 (日) 13:00-14:30",
        "10/7 (日) 15:00-16:30",
        "10/7 (日) 17:00-18:30",
      ]
    }
  },
  computed: {
    ...mapState({
      auth: 'auth',
      user: state=>state.auth.user,
      registExpoOriginal: state=>state.registExpo,
      token: state=>state.auth.token
    }),
  },
  mounted(){
    // console.log(this.user)
    // this.userClone = JSON.parse(JSON.stringify(this.user))
    this.loadRegistData()

  },
  methods: {
    ...mapActions(['loadRegistData','updateRegistForm']),
    sendRegistForm(){
      let _this = this



      this.$confirm('確認送出講堂報名？送出將無法更改', '最後確認', {
        confirmButtonText: '確定',
        cancelButtonText: '取消',
      }).then(() => {
        
        this.updateRegistForm({
          data:{
            regist_expo_speak: this.registExpoSpeak
          },
          callback(){
            _this.$message({
              message: '雜講堂報名更新成功',
              type: 'success'
            });

            _this.active=4
          }
        })
      });
    },
    prev() {
      if (this.active-- < 0) this.active = 3;
      window.scrollTo(0,0)
    }, 
    next() {
      if (this.active++ > 3) this.active = 0;
      window.scrollTo(0,0)
    }
  },
  watch: {
    registExpoOriginal(){
      let newdata = JSON.parse(JSON.stringify(this.registExpoOriginal.regist_expo_speak))
      console.log(newdata)
      this.$set(this,"registExpoSpeak",newdata)
      
      if (this.registExpoSpeak==null){
        console.log("init paid")
        this.registExpoSpeak={}
      }
    }
  },
  components: {
    panel_expo2018
  }
}
</script>

<style lang="sass">
.member-regist-expo
  .el-select
    width: 100%
</style>
