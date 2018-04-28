<template lang="pug">
.page.member-regist-expo.text-left
  .container
    .col-sm-12
      h2.mt-5 雜工坊申請表
      .row
        .col-sm-12
      p 每一工坊場次時限為90分鐘(含進、退場時間)、可容納座位數30人為上限。<br>如成功登記到雜工坊場次，開課單位須支付10000元場次費，並由主辦單位統籌各場次報名、收費（每一參與者收500元/場）事宜，如課堂衍生材料須由開課單位協力提供。 （詳細說明請見徵展手冊 P.XX）

    .col-sm-12.text-left
      el-steps(:active="active" finish-status="success")
        el-step(title="申請基本資訊" , @click="active=0")
        el-step(title="工坊聯絡資料" , @click="active=1")
        el-step(title="填寫完成" , @click="active=2")
    div(v-show="active==0")
      h4.mt-5 ㄧ、申請基本資訊
      el-form(v-if="registExpoWorkshop")
      
        el-form-item(label="1.	課程類型")
          el-select(v-model="registExpoWorkshop.class_type")
            el-option(:value="v"
                  v-for='v in types') {{v}}

        h5 2.	活動招生族群
        p 請填寫是否有報名身份、年齡等限制資格，如為限定親子參加、限定特定年齡層等可選擇「其他」，並簡述。
        el-form-item(label="無限制（一般大眾皆可）")
          el-checkbox(v-model="audience_normal")
        div(v-if="!audience_normal")
          el-input(v-model="registExpoWorkshop.class_audience")

        el-form-item(label="3.	活動預計招生人數(場地建議容納人數以30人為限)")
          el-input-number(v-model="registExpoWorkshop.class_person_count")

        el-form-item(label="4.	登記場次")
          el-select(v-model="registExpoWorkshop.class_time" multiple)
            el-option(:value="t", v-for="t in timespans" ) {{t}}

        h5 5.	檢附一份10頁(內)提案活動企劃書（主辦單位將以此份檔案作為「雜工坊」徵選依據。）
          p 檔案大小限制 20MB 內，請輸出成PDF格式。
          p 建議內容設定：
            | <br>一、背景介紹（含品牌/團隊/講師介紹）
            | <br>二、主題或議題設定（如本次體驗活動重點與品牌本身並無直接關聯，可詳加補述）
            | <br>三、活動內容（目標族群、活動企劃、執行方式、人力分工配置等）
            | <br>四、過往活動經驗或舉辦成果
        el-upload
          


    div(v-show="active==1")
      h4.mt-5 工坊聯絡資料
      .row
        .col-sm-12
          p 1.	主要聯絡人（請優先填寫執行窗口）
        .col-sm-12
          el-form(v-if="registExpoWorkshop", label-width="150px")
            el-form-item(label="姓名")
              el-input(v-model="registExpoWorkshop.main_contact_name")
            el-form-item(label="手機")
              el-input(v-model="registExpoWorkshop.main_contact_phone")
            el-form-item(label="Email")
              el-input(v-model="registExpoWorkshop.main_contact_email")

      .row
        .col-sm-12
          p 2.	次要聯絡人
        .col-sm-12
          el-form(v-if="registExpoWorkshop", label-width="150px")
            el-form-item(label="姓名")
              el-input(v-model="registExpoWorkshop.secondary_contact_name")
            el-form-item(label="手機")
              el-input(v-model="registExpoWorkshop.secondary_contact_phone")
            el-form-item(label="Email")
              el-input(v-model="registExpoWorkshop.secondary_contact_email")


    div(v-show="active==2") 
      pre(v-html="registExpoWorkshop")
    div
      .btn(@click="prev") 上一步
      .btn(@click="next") 下一步

</template>




<script>
import {mapState, mapGetters} from 'vuex'
export default {
  data(){
    return {
      registExpoWorkshop: {},
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

      token: state=>state.auth.token
    }),
  },
  mounted(){
    console.log(this.user)
    this.userClone = JSON.parse(JSON.stringify(this.user))
  },
  methods: {
    updateUserInfo(){
       this.axios.post(
          `/api/auth/user/update/info`,
          { 
            token: this.token,
            user: this.userClone
          }
        ).then(res=>{
          this.$message({
            message: '資料更新成功',
            type: 'success'
          });
          // let _this  = this
          console.log(res.data.user)
          // setTimeout(function(){
          // this.$router.push(`/manage/${this.$route.meta.type}/`+res.data.data.id)
          // },300)
        })
    },
    prev() {
      if (this.active-- < 0) this.active = 2;
      window.scrollTo(0,0)
    }, 
    next() {
      if (this.active++ > 2) this.active = 0;
      window.scrollTo(0,0)
    }
  }
}
</script>

<style lang="sass">
.member-regist-expo
  .el-select
    width: 100%
</style>
