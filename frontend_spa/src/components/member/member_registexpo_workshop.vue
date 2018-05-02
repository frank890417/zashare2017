<template lang="pug">
.page.member-regist-expo.text-left
  .container
    .col-sm-12
      h2.mt-5 雜工坊申請表
      .row
        .col-sm-12
      p.mt-5 每一工坊場次時限為90 分鐘( 含進、退場時間)、可容納座位數30 人為上限。<br>如成功登記到雜工坊場次，開課單位須支付10,000 元場次費，並由主辦單位統籌各場次報名、收費（每一參與者收500 元/ 場）事宜，如課堂衍生材料須由開課單位協力提供。（ 詳細說明請見徵展手冊 P.18）
    .col-sm-12.text-left.mt-3
      el-steps(:active="active" finish-status="success")
        el-step(title="申請基本資訊" , @click="active=0")
        el-step(title="工坊聯絡資料" , @click="active=1")
        el-step(title="確認與送出" , @click="active=2")
        el-step(title="填寫完成" , @click="active=3")
    //:disabled = "typeof registExpoWorkshop.id=='number'"
    .col-sm-12()
      el-form(v-if="registExpoWorkshop", :disabled="typeof registExpoWorkshop.id=='number'",
              label-position="left",
              :model="registExpoWorkshop")
        div(v-show="active==0")
          h4.mt-5.mb-5 ㄧ、申請基本資訊
          el-form-item(required label="1.	課程類型")
            el-select(v-model="registExpoWorkshop.class_type")
              el-option(:value="v"
                    v-for='v in types') {{v}}
          el-form-item(required label="2. 活動招生族群")
            br
            br
            p 請確認是否有報名身份/年齡等限制資格，如為限定親子參加、指定年齡層等請將「勾選取消」，並簡述。&nbsp;&nbsp;&nbsp;
            div 
              el-checkbox(v-model="audience_normal")
              span(v-if="audience_normal") &nbsp;&nbsp;無限制（一般大眾皆可）
              span(v-else) &nbsp;&nbsp;其他
            
            el-input(v-if="!audience_normal" ,v-model="registExpoWorkshop.class_audience")

          el-form-item(required label="3.	活動預計招生人數(場地建議容納人數以30人為限)")
            br
            br
            el-input-number(v-model="registExpoWorkshop.class_person_count", :max="30")

          el-form-item(required label="4.	登記場次")
            br
            br
            p 請複選可配合安排之場次，若確定有登記到工坊場次，主辦單位會以此做為時段安排的參考。 <br>主辦方保有最終審定權，參展方不得有異議。
            el-select(v-model="registExpoWorkshop.class_time" multiple)
              el-option(:value="t", v-for="t in timespans" ) {{t}}
          
          el-form-item(required label="5. 檢附一份10頁(內)提案活動企劃書（主辦單位將以此份檔案作為「雜工坊」徵選依據。）")
            br
            br
            p 檔案大小限制 20MB 內，請輸出成PDF格式。
            p 建議內容設定：
              | <br>一、背景介紹（含品牌/團隊/講師介紹）
              | <br>二、主題或議題設定（如本次體驗活動重點與品牌本身並無直接關聯，可詳加補述）
              | <br>三、活動內容（目標族群、活動企劃、執行方式、人力分工配置等）
              | <br>四、過往活動經驗或舉辦成果
            el-upload(
              drag
              auto-upload
              ref="upload"
              accept="pdf"
              :data="{token: auth.token}"
              :on-success="(url)=>{registExpoWorkshop.class_proposal = url}"
              :action="apiDomain+'api/registexpo/uploadtemp'"
              
            )
              i.el-icon-upload
              div.el-upload__text 將文件拖曳到此處或<em>點擊上傳</em>
              div.el-upload__tip(slot="tip") 只能上傳不超過20MB的PDF文件
        // :action "apiDomain+'api/registexpo/uploadtemp'"
                  


        div(v-show="active==1")
          h4.mt-5.mb-5 工坊聯絡資料
          .row
            .col-sm-12
              h6 1.	主要聯絡人（請優先填寫執行窗口）
            .col-sm-12
              el-form-item(required label="姓名")
                el-input(v-model="registExpoWorkshop.main_contact_name")
              el-form-item(required label="手機")
                el-input(v-model="registExpoWorkshop.main_contact_phone")
              el-form-item(required label="Email")
                el-input(v-model="registExpoWorkshop.main_contact_email")

          .row.mt-5
            .col-sm-12
              h6 2. 次要聯絡人
            .col-sm-12
              el-form-item(required label="姓名")
                el-input(v-model="registExpoWorkshop.secondary_contact_name")
              el-form-item(required label="手機")
                el-input(v-model="registExpoWorkshop.secondary_contact_phone")
              el-form-item(required label="Email")
                el-input(v-model="registExpoWorkshop.secondary_contact_email")


        div(v-show="active==2") 
          //- pre(v-html="registExpoWorkshop")
          el-button.mt-5(@click="sendRegistForm" type="primary" size="medium") 送出雜工坊申請
        div(v-if="active==3") 
          p 謝謝你願意和我們一同為教育而努力！<br>最後甄選入選名單將於2018/07/10公布在官方網站。<br><br>如欲報名「ZA WORKSHOP 雜工坊」及「Zac. 教育新創短講評選」請繼續填寫表單：
          panel_expo2018

        hr
        div.mt-5
          el-button.float-left(@click="prev", v-if="active>0 && active<3") 上一步
          el-button.float-right(@click="next" , v-if="active<2") 下一步
</template>




<script>
import {mapState, mapGetters,mapActions} from 'vuex'
import panel_expo2018 from '@/components/panels/panel_expo2018'
export default {
  data(){
    return {
      registExpoWorkshop: {class_person_count: 0},
      // audiences: "學齡前幼兒／國小生／國中生／高中生／自學生／大專以上學生／職場新鮮人／青壯年／家長／教育工作者／投資人／創業者／學校單位／公部門／其他".split("／"),
      active: 0,
      audience_normal: true,
      success: false,
      types: [ "藝術體驗創作",
              "傳統工藝教學",
              "互動式教學",
              "科學動手實驗",
              "創新教案分享與教學",
              "小型分享座談",
              "戶外活動",
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
      this.updateRegistForm({
        data:{
          regist_workshop: this.registExpoWorkshop
        },
        callback(){
          _this.$message({
            message: '雜工坊報名更新成功',
            type: 'success'
          });

          _this.active=3
        }
      })
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
      let newdata = JSON.parse(JSON.stringify(this.registExpoOriginal.regist_workshop))
      console.log(newdata)
      this.$set(this,"registExpoWorkshop",newdata)
      
      if (this.registExpoWorkshop==null){
        console.log("init paid")
        this.registExpoWorkshop={class_time: []}
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
