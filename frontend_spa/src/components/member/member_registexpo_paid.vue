<template lang="pug">
.page.member-regist-expo.text-left
  .container
    .col-sm-12
      h2.mt-5 2018 雜學校報名表單
      
      .row
        .col-sm-12
          p.mt-5 提交申請表單後，務必於三日內繳交參展報名費($1,200，早鳥優惠$800)，並繼續填寫此份表單，提供匯款資訊協助我們進行款項確認後，才算申請參展成功呦！（報名費為申請參展之審核評選費用，若最終無入選參展，費用將不退還。）<br>＊海外參展優惠(含中國、香港、澳門等地區)免繳納報名費。
        .col-sm-12
          p 繳款帳戶：
            |<br> 開戶行－007第一銀行 永春分行
            |<br> 帳戶名－奧茲藝術顧問有限公司
            |<br> 帳號－157-10-031073

    .col-sm-12.text-left
      el-steps(:active="active" finish-status="success")
        el-step(title="匯款資訊" , @click="active=0")
        el-step(title="發票資訊" , @click="active=1")
        el-step(title="填寫完成" , @click="active=2")
      div(v-show="active==0")
        h4.mt-5 ㄧ、匯款資訊
        el-form(v-if="registExpoPaid")
          el-form-item(label="匯款日期/時間")
            el-date-picker(v-model="registExpoPaid.paid_datetime" type="datetime")
          p //此為協助我們確認款項之作業流程，  請務必填寫正確日期。

          el-form-item(label="是否使用銀行/郵局臨櫃匯款")
            div
              el-radio(label="1" v-model="registExpoPaid.paid_direct" ) 是
              el-radio(label="0" v-model="registExpoPaid.paid_direct" ) 否

          p 請填寫使用匯款之戶名
          br
          p 舉例：
            | <br>個人戶/陳雜兒
            | <br>公司戶/雜學股份有限公司
          el-form-item()
            el-input(v-model="registExpoPaid.paid_name")
          el-form-item(label="請輸入匯款帳號後五碼")
            el-input(v-model="registExpoPaid.paid_last_number")

      div(v-show="active==1")
        h4.mt-5 二、發票資訊
        el-form(v-if="registExpoPaid")
          el-form-item(label="種類")
            p 如需報帳請選擇「三聯式發票」，並繼續填寫統編資訊。
            div
              el-radio(label="二聯式發票" v-model="registExpoPaid.receipt_type" ) 二聯式發票
              el-radio(label="三聯式發票" v-model="registExpoPaid.receipt_type" ) 三聯式發票
          el-form-item(label="請輸入統編 （三聯式發票者須填）")
            el-input(v-model="registExpoPaid.receipt_number")
            
          el-form-item(label="請輸入抬頭 （三聯式發票者須填）")
            el-input(v-model="registExpoPaid.receipt_title")

          p 發票寄送：收件人姓名
          p 雜學校團隊會於甄選階段開立發票，若最終無入選參展，發票將於甄選結果釋出後一個月內以掛號寄出；<br>入選參選者，則於佈展日現場簽到領取發票。
          el-form-item
            el-input(v-model="registExpoPaid.receipt_name")

          el-form-item(label="發票寄送：收件人電話")
            el-input(v-model="registExpoPaid.receipt_phone")
          el-form-item(label="發票寄送：收件人地址")
            el-input(v-model="registExpoPaid.receipt_address")
          el-form-item(label="發票寄送：郵遞區號")
            el-input(v-model="registExpoPaid.receipt_postcode")

      div(v-show="active==2") 
        pre(v-html="registExpoPaid")


      div
        .btn(@click="prev") 上一步
        .btn(@click="next") 下一步

</template>

<script>
import {mapState, mapGetters} from 'vuex'
export default {
  data(){
    return {
      registExpoPaid: {},
      audiences: "學齡前幼兒／國小生／國中生／高中生／自學生／大專以上學生／職場新鮮人／青壯年／家長／教育工作者／投資人／創業者／學校單位／公部門／其他".split("／"),
      active: 0,
      success: false
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
