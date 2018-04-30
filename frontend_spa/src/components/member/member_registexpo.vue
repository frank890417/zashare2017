<template lang="pug">
.page.member-regist-expo.text-left
  .container
    .col-sm-12
      h2.mt-5 2018 雜學校報名表單
      h4.mt-3 為避免報名失敗，請務必先行詳閱徵展手冊中相關規範、時程與流程。
      p.mt-5 徵展手冊下載網址：
    .col-sm-12.text-left
      el-steps(:active="active" finish-status="success")
        el-step(title="參展資訊" , @click="active=0")
        el-step(title="申請單位資訊" , @click="active=1")
        el-step(title="參展聯絡資料" , @click="active=2")
        el-step(title="確認與送出" , @click="active=3")
        el-step(title="報名完成" , @click="active=4")
    div(v-show="active==0")
      h4.mt-5 ㄧ、參展資訊
      el-form(v-if="registExpo")
        el-form-item(label="申請攤位類型")
          el-select(v-model="registExpo.type")
            el-option(value="基礎單位 (1m*1m 限高2.5m)") 基礎單位 (1m*1m 限高2.5m)
            el-option(value="標準單位 (2m*3m 限高2.5m)") 標準單位 (2m*3m 限高2.5m)
            el-option(value="進階單位 (2m*6m 限高2.5m)") 進階單位 (2m*6m 限高2.5m)

        el-form-item(label="申請類別（主辦方保留最後分配權）")
          el-select(v-model="registExpo.theme")
            el-option(:value="v"
                  v-for='v in ["教育創新","文化實踐","生活探索","專業培育"]') {{v}}

        el-form-item(label="是否曾參展雜學校？")
          el-select(v-model="registExpo.attended")
            el-option(:value="v"
                  v-for='v in ["首次參展","2015不太乖教育節","2016雜學校","2017雜學校"]') {{v}}

    div(v-show="active==1")
      h4.mt-5 二、申請單位資訊
      el-form(v-if="registExpo")
        el-form-item(label="申請單位/個人名稱")
          el-form-item(label="中文")
            el-input(v-model="registExpo.name_cht")
          el-form-item(label="英文")
            el-input(v-model="registExpo.name_eng")

        el-form-item(label="申請單位/個人簡介 （請以200-300字讓我們能更認識你）")
          el-input(v-model="registExpo.description", type="textarea" rows="5",
                    :maxlength="300")

        el-form-item(label="你目前所經營/接觸的目標受眾（取前2個最接近的對話群、消費群）")
          el-select(v-model="registExpo.target_audience" multiple,
                    multiple-limit="2")
            el-option(:value="v"
                  v-for='v in audiences') {{v}}

        el-form-item(label="最希望在雜學校接觸/開放的目標受眾（取前2個最想開發的對話群、消費群）")
          el-select(v-model="registExpo.want_audience" multiple,
                    multiple-limit="2")
            el-option(:value="v"
                  v-for='v in audiences') {{v}}


        el-form-item(label="是否在展位進行銷售行為？")
          el-radio(label="1" v-model="registExpo.have_sell" ) 是
          el-radio(label="0" v-model="registExpo.have_sell" ) 否

        el-form-item(label="請以一份20頁(內)電子簡報檔闡述參展規劃（主辦單位將以此份檔案作為雜星賞評選依據）")
        div.text-left
          p 檔案大小限制 20MB 內，請輸出成PDF格式。
          ul 建議內容設定：
            li 一、品牌/團隊/個人介紹
            li 二、闡述自身教育觀點理念或與創新教育關聯性（參展雜學校原因）
            li 三、本次參展主題或議題設定（如本次展出重點與品牌本身並無直接關聯，可詳加補述）
            li 四、參展內容企劃與呈現方式（本次展出的亮點以及會如何執行與呈現）
            li 五、展位內互動體驗或活動規劃（須為不影響人流動線的體驗或活動）
            li 六、展位規劃示意圖
            li 七、過往參展經驗或活動成果
            li 八、如會在展位現場進行銷售或名單資料搜集，需提交商品介紹與現場售價或名單搜集方式（例如遊戲互動、傳單、coupon）

        el-form-item(label="請簡述參與雜學校的原因（100字以內）" :maxlength="100")
          el-input(v-model="registExpo.attend_reason", type="textarea" rows="5")

        el-form-item(label="備註－其他補充事項（200字以內）" :maxlength="200")
          el-input(v-model="registExpo.other", type="textarea" rows="5")


    div(v-show="active==2")
      h4.mt-5 三、參展聯絡資料
      .row
        .col-sm-12
          p 1.	主要聯絡人（請優先填寫執行窗口）
        .col-sm-12
          el-form(v-if="registExpo", label-width="150px")
            el-form-item(label="姓名")
              el-input(v-model="registExpo.main_contact_name")
            el-form-item(label="手機")
              el-input(v-model="registExpo.main_contact_phone")
            el-form-item(label="Email")
              el-input(v-model="registExpo.main_contact_email")

      .row
        .col-sm-12
          p 2.	次要聯絡人
        .col-sm-12
          el-form(v-if="registExpo", label-width="150px")
            el-form-item(label="姓名")
              el-input(v-model="registExpo.secondary_contact_name")
            el-form-item(label="手機")
              el-input(v-model="registExpo.secondary_contact_phone")
            el-form-item(label="Email")
              el-input(v-model="registExpo.secondary_contact_email")

    div(v-show="active==3") 
      pre(v-html="registExpo")
      el-button(@click="sendRegistForm") 送出報名
      el-button(@click="saveRegistForm") 更新報名

    div
      .btn(@click="prev") 上一步
      .btn(@click="next") 下一步

</template>

<script>
import {mapState, mapGetters} from 'vuex'
export default {
  data(){
    return {
      registExpo: {},
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
    this.axios.get(`/api/registexpo`,
      {
        params: {token: this.token}
        // registexpo: senddata
      }
    ).then(res=>{
      if (res.data){
        res.data.target_audience =res.data.target_audience? JSON.parse(res.data.target_audience):[]
        res.data.want_audience = res.data.want_audience? JSON.parse(res.data.want_audience):[]
        this.$set(this,"registExpo",res.data)
      }
    })

  },
  methods: {
    sendRegistForm(){
       let senddata = JSON.parse(JSON.stringify(this.registExpo))
       Object.keys(senddata).forEach(key=>{
         if (typeof senddata[key]=="object"){
           senddata[key]=JSON.stringify(senddata[key])
         }
       })
       this.axios.post(`/api/registexpo`,
        {
          token: this.token,
          registexpo: senddata
        }
       ).then(res=>{
          this.$message({
            message: '報名成功',
            type: 'success'
          });
          // let _this  = this
          // console.log(res.data.user)
          // setTimeout(function(){
          // this.$router.push(`/manage/${this.$route.meta.type}/`+res.data.data.id)
          // },300)
        })
    },
    saveRegistForm(){
      let senddata = JSON.parse(JSON.stringify(this.registExpo))
       Object.keys(senddata).forEach(key=>{
         if (typeof senddata[key]=="object"){
           senddata[key]=JSON.stringify(senddata[key])
         }
       })
       this.axios.patch(`/api/registexpo`,
        {
          token: this.token,
          registexpo: senddata
        }
       ).then(res=>{
          this.$message({
            message: '更新成功',
            type: 'success'
          });
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
  }
}
</script>

<style lang="sass">
.member-regist-expo
  .el-select
    width: 100%
</style>
