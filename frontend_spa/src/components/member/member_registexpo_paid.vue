<template lang="pug">
.page.member-regist-expo.text-left
  .container
    .col-sm-12
      h2.mt-5 2018 雜學校繳費確認 
      
      .row
        .col-sm-12
          p.mt-5 提交申請表單後，務必於三日內繳交參展報名費($1,200，早鳥優惠$800)，並繼續填寫此份表單，提供匯款資訊協助我們進行款項確認後，才算申請參展成功呦！（報名費為申請參展之審核評選費用，若最終無入選參展，費用將不退還。）<br>＊海外參展優惠(含中國、香港、澳門等地區)免繳納報名費。
        .col-sm-12
          p 繳款帳戶：
            |<br> 銀行名稱－007 第一銀行 永春分行
            |<br> 帳戶名稱－雜學股份有限公司
            |<br> 帳號－157-10-029362

    .col-sm-12.text-left
      el-steps(:active="active" finish-status="success")
        el-step(title="匯款資訊" , @click="active=0")
        el-step(title="發票資訊" , @click="active=1")
        el-step(title="確認送出" , @click="active=2")
        el-step(title="填寫完成" , @click="active=3")
    .col-sm-12
      el-form(v-if="registExpoPaid",  :disabled = "typeof registExpoPaid.id=='number'",
              label-position="left",
              :model="registExpoPaid")
        div(v-show="active==0")
          h4.mt-5 ㄧ、匯款資訊
          el-form-item(required label="1. 匯款日期/時間")
            br
            br
            p 此為協助我們確認款項之作業流程，  請務必填寫正確日期。
            el-date-picker(v-model="registExpoPaid.paid_datetime" type="datetime",
                          value-format="yyyy-MM-dd HH:mm:ss")
          

          el-form-item(required label="2. 是否使用銀行/郵局臨櫃匯款")
            br
            br
            div
              el-radio(label="1" v-model="registExpoPaid.paid_direct" ) 是
              el-radio(label="0" v-model="registExpoPaid.paid_direct" ) 否，使用非臨櫃匯款（如ATM、網路轉帳等）


          el-form-item(required label="3. 請填寫使用匯款之戶名")
            br
            br
            p 舉例：
              | <br>個人戶/陳雜兒
              | <br>公司戶/雜學股份有限公司
            el-input(v-model="registExpoPaid.paid_name")
          el-form-item(required label="4. 請輸入匯款帳號後五碼")
            el-input(v-model="registExpoPaid.paid_last_number")

        div(v-show="active==1")
          h4.mt-5 二、發票資訊

          el-form-item(required label="1. 發票種類")
            br
            br
            p 如需報帳請選擇「三聯式發票」，並繼續填寫統編資訊。
            div
              el-radio(label="二聯式發票" v-model="registExpoPaid.receipt_type" ) 二聯式發票
              el-radio(label="三聯式發票" v-model="registExpoPaid.receipt_type" ) 三聯式發票
          el-form-item(label="2. 請輸入統編 （三聯式發票者須填）" :required = "registExpoPaid.receipt_type=='三聯式發票'")
            el-input(v-model="registExpoPaid.receipt_number")
            
          el-form-item(label="3. 請輸入抬頭 （三聯式發票者須填）" :required = "registExpoPaid.receipt_type=='三聯式發票'")
            el-input(v-model="registExpoPaid.receipt_title")

          el-form-item(required label="4. 發票寄送：收件人姓名")
            br
            br
            p 雜學校團隊會於甄選階段開立發票，若最終無入選參展，發票將於甄選結果釋出後一個月內以掛號寄出；<br>入選參選者，則於佈展日現場簽到領取發票。
            el-input(v-model="registExpoPaid.receipt_name")
          el-form-item(required label="5. 發票寄送：收件人電話")
            el-input(v-model="registExpoPaid.receipt_phone")
          el-form-item(required label="6. 發票寄送：收件人地址")
            el-input(v-model="registExpoPaid.receipt_address")
          el-form-item(required label="7. 發票寄送：郵遞區號")
            el-input(v-model="registExpoPaid.receipt_postcode")

        div(v-show="active==2") 
          //- pre(v-html="registExpoPaid")
          p.mt-5 請再次確認所有填寫資料後按下「確認送出」，主辦單位將於收到表單回填三日內進行款項確認，並以E-mail回覆確認。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。
          el-button.mt-5(@click="sendRegistForm" type="primary" size="medium") 送出繳費紀錄
        div(v-if="active==3") 
          p.mt-5 非常感謝您的填寫！<br>我們會於三日內確認款項，並寄出確認信。
          panel_expo2018
          
        hr
        div.mt-5
          el-button.float-left(@click="prev", v-if="active>0 && active<3") 上一步
          el-button.float-right(@click="next" , v-if="active<2") 下一步
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'
import panel_expo2018 from '@/components/panels/panel_expo2018'
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
      token: state=>state.auth.token,
      registExpoOriginal: state=>state.registExpo
    })
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


      this.$confirm('確認送出付款確認？送出將無法更改', '最後確認', {
        confirmButtonText: '確定',
        cancelButtonText: '取消',
      }).then(() => {
        this.updateRegistForm({
          data:{
            paid_record: this.registExpoPaid
          },
          callback(){
            _this.$message({
              message: '付費紀錄更新成功',
              type: 'success'
            });
  
            _this.active=3
          }
        })
        
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
      let newdata = JSON.parse(JSON.stringify(this.registExpoOriginal.paid_record))
      console.log(newdata)
      this.$set(this,"registExpoPaid",newdata)
      
      if (this.registExpoPaid==null){
        console.log("init paid")
        this.registExpoPaid={}
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
