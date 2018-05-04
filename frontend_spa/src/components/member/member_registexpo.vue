<template lang="pug">
.page.member-regist-expo.text-left(:key="user || user.id")
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
    //- :disabled="typeof registExpo.id=='number'"
    .col-sm-12
      el-form(v-if="registExpo"  :disabled="typeof registExpo.id=='number'",
              label-position="left",
              :rules="rules",
              ref="form_registexpo",
              :model="registExpo")
        div(v-show="active==0")
          h4.mt-5.mb-5 ㄧ、參展資訊
          el-form-item(required label="1. 申請攤位類型", prop="type")
            el-select(v-model="registExpo.type")
              el-option(value="基礎單位 (1m*1m 限高2.5m)") 基礎單位 (1m*1m 限高2.5m)
              el-option(value="標準單位 (2m*3m 限高2.5m)") 標準單位 (2m*3m 限高2.5m)
              el-option(value="進階單位 (2m*6m 限高2.5m)") 進階單位 (2m*6m 限高2.5m)

          el-form-item(required label="2. 申請類別（主辦方保留最後分配權）", prop="theme")
            el-select(v-model="registExpo.theme")
              el-option(:value="v"
                    v-for='v in ["教育創新","文化實踐","生活探索","專業培育"]') {{v}}

          el-form-item(required label="3. 是否曾參展雜學校？", prop="attended")
            br
            br
            p 若參展過2屆以上，請填寫「最近一次」的參展年份。
            el-select(v-model="registExpo.attended" , placeholder="若參展過2屆以上，請填寫「最近一次」的參展年份。")
              el-option(:value="v"
                    v-for='v in ["首次參展","2015不太乖教育節","2016雜學校","2017雜學校"]') {{v}}

        div(v-show="active==1")
          h4.mt-5.mb-5 二、申請單位資訊
          
          el-form-item(required label="1. 申請單位/個人名稱 - 中文", prop="name_cht")
              el-input(v-model="registExpo.name_cht")
          el-form-item(required label="1. 申請單位/個人名稱 - 英文", prop="name_eng")
              el-input(v-model="registExpo.name_eng")

          el-form-item(required label="2. 申請單位/個人簡介 （請以200-300字讓我們能更認識你）", prop="description")
            el-input(v-model="registExpo.description", type="textarea" :rows="5",
                      :maxlength="300")

          el-form-item(required label="3. 你目前所經營/接觸的目標受眾（取前2個最接近的對話群、消費群）", prop="target_audience")
            el-select(v-model="registExpo.target_audience" multiple,
                      :multiple-limit="2")
              el-option(:value="v"
                    v-for='v in audiences') {{v}}

          el-form-item(required label="4. 最希望在雜學校接觸/開放的目標受眾（取前2個最想開發的對話群、消費群）", prop="want_audience")
            el-select(v-model="registExpo.want_audience" multiple,
                      :multiple-limit="2")
              el-option(:value="v"
                    v-for='v in audiences') {{v}}


          el-form-item(required label="5. 是否在展位進行銷售行為？", prop="have_sell")
            br
            br
            el-radio(:label="1" v-model="registExpo.have_sell" ) 是（請於參展規劃簡報中介紹商品與現場售價）
            el-radio(:label="0" v-model="registExpo.have_sell" ) 否

          el-form-item(required label="6. 請以一份20頁(內)電子簡報檔闡述參展規劃（主辦單位將以此份檔案作為雜星賞評選依據）", prop="file_proposal")
            div.text-left
              br
              br
              p 請務必輸出成pdf格式，並確認檔案大小在20MB限制內。若檔案不符導致系統無法存取，主辦方將不另行確認及通知。<br><br>建議內容設定：
                |<br> 一、品牌/團隊/個人介紹
                |<br> 二、闡述自身教育觀點理念或與創新教育關聯性（參展雜學校原因）
                |<br> 三、本次參展主題或議題設定（如本次展出重點與品牌本身並無直接關聯，可詳加補述）
                |<br> 四、參展內容企劃與呈現方式（本次展出的亮點以及會如何執行與呈現）
                |<br> 五、展位內互動體驗或活動規劃（須為不影響人流動線的體驗或活動）
                |<br> 六、展位規劃示意圖
                |<br> 七、過往參展經驗或活動成果
                |<br> 八、如會在展位現場進行銷售或名單資料搜集，需提交商品介紹與現場售價或名單搜集方式（例如遊戲互動、傳單、coupon）
              el-upload(
                  auto-upload
                  ref="upload"
                  accept=".pdf"
                  :limit="1"
                  :data="{token: auth.token}"
                  :on-success="(url)=>{registExpo.file_proposal = url}"
                  :action="apiDomain+'api/registexpo/uploadtemp'"
                )
                  el-button(size="small" type="primary") 點擊上傳
                  div.el-upload__tip(slot="tip") 請務必輸出成pdf格式，並確認檔案大小在20MB限制內。若檔案不符導致系統無法存取，主辦方將不另行確認及通知。
          // :action "apiDomain+'api/registexpo/uploadtemp'"
    

          el-form-item(required label="7. 請簡述參與雜學校的原因（100字以內）" , prop="attend_reason")
            el-input(v-model="registExpo.attend_reason", type="textarea" :rows="5" :maxlength="100")

          el-form-item(label="8. 備註－其他補充事項（200字以內）" , prop="other")
            el-input(v-model="registExpo.other", type="textarea" :rows="5" :maxlength="200")


        div(v-show="active==2")
          h4.mt-5.mb-5 三、參展聯絡資料
          .row
            .col-sm-12
              h6 1.	主要聯絡人（請優先填寫執行窗口）
            .col-sm-12
              el-form-item(required label="姓名", prop="main_contact_name")
                el-input(v-model="registExpo.main_contact_name")
              el-form-item(required label="手機", prop="main_contact_phone")
                el-input(v-model="registExpo.main_contact_phone")
              el-form-item(required label="Email", prop="main_contact_email")
                el-input(v-model="registExpo.main_contact_email")

          .row.mt-5
            .col-sm-12.mt-5
              h6 2.	次要聯絡人
            .col-sm-12
              el-form-item(required label="姓名", prop="secondary_contact_name")
                el-input(v-model="registExpo.secondary_contact_name")
              el-form-item(required label="手機", prop="secondary_contact_phone")
                el-input(v-model="registExpo.secondary_contact_phone")
              el-form-item(required label="Email", prop="secondary_contact_email")
                el-input(v-model="registExpo.secondary_contact_email")

        div(v-show="active==3") 
          //- pre(v-html="registExpo")
          h4.mt-5.mb-5 恭喜你即將完成參展報名申請！
          p.mt-4 
            | 請再次確認所有填寫資料後按下「確認送出」，並於三日內繳交報名費，才算完成所有報名手續呦！
            br
            | ＊海外參展者（含中國、港、澳等地區）享「免報名費」優惠。
            br 
            br 
            | 報名費繳款帳戶：
            br
            | 銀行名稱－第一銀行永春分行 (007)
            br 
            | 帳戶名稱－雜學股份有限公司
            br
            | 帳號－157-10-029362
            br
            br
            | 遞交報名申請後，將由主辦單位以E-mail回覆收到線上報名資料，及提供上列報名費繳費資訊。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。
          br
          vr
          p 我確認資料已經正確無誤，送出後將無法修改
          p#err_msg
          el-button(@click="sendRegistForm" type="primary" size="medium") 確認送出
          //el-button(@click="test" type="primary" size="medium") 測試

        div(v-if="active==4") 
          p.mt-5 謝謝你願意和我們一同為教育而努力！<br>最後甄選入選名單將於2018/07/10公布在官方網站。<br><br>如欲報名「ZA WORKSHOP 雜工坊」及「Zac. 教育新創短講評選」請繼續填寫表單：
          panel_expo2018

        hr
        div.mt-5
          el-button.float-left(@click="prev", v-if="active>0 && active<4") 上一步
          el-button.float-right(@click="next" , v-if="active<3") 下一步

</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'
import panel_expo2018 from '@/components/panels/panel_expo2018'
import $ from 'jquery'
export default {
  data(){
    return {
      registExpo: {},
      audiences: "學齡前幼兒／國小生／國中生／高中生／自學生／大專以上學生／職場新鮮人／青壯年／家長／教育工作者／投資人／創業者／學校單位／公部門／其他".split("／"),
      active: 0,
      success: false,
      rules: {
        type:[
          {required: true, message: "請選擇種類"}
        ],
        theme:[
          {required: true, message: "請選擇主題"}
        ],
        attended:[
          {required: true, message: "請選擇參與紀錄"}
        ],
        name_eng:[
          {required: true, message: "請輸入英文名稱"}
        ],
        name_cht:[
          {required: true, message: "請輸入中文名稱"}
        ],
        description:[
          {required: true, message: "請輸入描述"}
        ],
        target_audience:[
          {required: true, message: "請輸入目標客群"}
        ],
        want_audience:[
          {required: true, message: "請輸入想要的客群"}
        ],
        have_sell:[
          {required: true, message: "請選擇是否有銷售行為"}
        ],
        file_proposal:[
          {required: true, message: "請上傳企劃書"}
        ],
        attend_reason:[
          {required: true, message: "請輸入參展理由"}
        ],
        // other:[
          // {required: false}
        // ],
        main_contact_name:[
          {required: true, message: "請輸入主要聯絡人姓名"}
        ],
        main_contact_phone:[
          {required: true, message: "請輸入主要聯絡人電話"}
        ],
        main_contact_email:[
          {required: true, message: "請輸入有效的主要聯絡人信箱", type: "email"}
        ],
        secondary_contact_name:[
          {required: true, message: "請輸入次要聯絡人姓名"}
        ],
        secondary_contact_phone:[
          {required: true, message: "請輸入次要聯絡人電話"}
        ],
        secondary_contact_email:[
          {required: true, message: "請輸入有效的次要聯絡人信箱", type: "email"}
        ],

      }
      
    }
  },
  computed: {
    ...mapState({
      auth: 'auth',
      user: state=>state.auth.user,
      token: state=>state.auth.token,
      registExpoOriginal: state=>state.registExpo
    }),
  },
  mounted(){
    // console.log(this.user)
    // this.userClone = JSON.parse(JSON.stringify(this.user))
    this.loadRegistData()
    

  },
  methods: {
    ...mapActions(['loadRegistData','updateRegistForm']),
    test(){
     
    },
    sendRegistForm(){
      let _this = this
      this.$refs['form_registexpo'].validate(valid=>{
        if (valid){

          this.$confirm('確認送出參展報名？送出將無法更改', '最後確認', {
            confirmButtonText: '確定',
            cancelButtonText: '取消',
          }).then(() => {
            this.updateRegistForm({
              data: this.registExpo,
              callback(){
                _this.$message({
                  message: '資料更新成功',
                  type: 'success'
                });
                _this.active=4
              }
            })
          }).catch(() => {
            this.$message({
              message: '已取消送出'
            });          
          });
        }else{
          this.$message({
            message: '資料填寫不完整，請往前填寫完整後再送出',
            type: 'error'
          });          
        }
      })
      // console.log(result)


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
      this.$set(this,"registExpo",JSON.parse(JSON.stringify(this.registExpoOriginal)))
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
