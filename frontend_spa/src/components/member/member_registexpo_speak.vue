<template lang="pug">
.page.member-regist-expo.text-left
  .container
    .col-sm-12
      h2.mt-5 {{ $t('regist_expospeak.title') }}
      p.mt-3(v-html="$t('regist_expospeak.sub_title')") 
      
    .col-sm-12.text-left.mt-5
      el-steps(:active="active" finish-status="success")
        el-step(v-for="section in sections",
                :title="section.title.indexOf('、')==-1?section.title:section.title.split('、')[1]" ,
                @click="active=section.id")
        el-step(:title="$t('form.step_confirm')")
        el-step(:title="$t('form.step_complete')")
    // :disabled = "typeof registExpoSpeak.id=='number'"
    .col-sm-12    
      el-form(v-if="registExpoSpeak",
              label-position="left",
              ref="form_registexpo_speak",
              :disabled = "typeof registExpoSpeak.id=='number'"
              :rules="rules"
              :model="registExpoSpeak")


        div(v-for="registFormObj in [registExpoSpeak]")
          div(v-for="(section,sid) in sections" ,
              v-show="active==section.id",
              :key="sid")
            h4.mt-5.mb-3 {{section.title}}
            el-form-item(v-for="(question,qid) in section.questions ",
                        :label="question.title", :prop="question.prop",
                        :key="qid")
              // 說明文字
              div(v-if="question.explain || question.type=='number'")
                br
                br
                p(v-html="question.explain")

              // [預設] 單行輸入 (input)
              el-input(v-model="registFormObj[question.prop]",
                      :placeholder="question.settings && question.settings.placeholder",
                      v-if="question.type=='input' || question.type===undefined")

              // 多行輸入 (textarea)
              el-input(v-model="registFormObj[question.prop]",
                        v-if="question.type=='textarea'",
                        :placeholder="question.settings && question.settings.placeholder",
                        :maxlength="question.settings && question.settings.maxlength",
                        type="textarea",
                        rows="5" )

              
              // 數字 (number)
              el-input-number(v-model="registFormObj[question.prop]",
                      v-if="question.type=='number'")


              // 選擇 (select)
              el-select(v-model="registFormObj[question.prop]",
                        v-if="question.type=='select'",
                        :placeholder="question.settings && question.settings.placeholder",
                        :multiple="question.settings && question.settings.multiple",
                        :multiple-limit="question.settings && question.settings['multiple-limit']")
                el-option(v-for="option in question.options",
                          :value="typeof option=='object'?option.value:option",
                          :label="typeof option=='object'?option.label:option",
                          :key="typeof option=='object'?option.value:option")
          
              // 檔案 (file)
              el-upload(
                v-if="question.type=='file'"
                auto-upload
                ref="upload"
                accept=".pdf"
                :limit="1"
                :data="{token: auth.token}"
                :on-success="(url)=>{registFormObj[question.prop] = url}"
                :action="apiDomain+'api/registexpo/uploadtemp'"
              )
                el-button(size="small" type="primary") {{ $t('form.label_upload') }}


        div(v-show="active==sections.length") 
          //- pre(v-html="registExpo")
          h4.mt-5.mb-5(v-html="$t('regist_expospeak.confirm_title')")
          p.mt-5.mb-5(v-html="$t('regist_expospeak.confirm_text')")
          p#err_msg
          el-button(@click="sendRegistForm" type="primary" size="medium") {{ $t('form.label_submit') }}

        div(v-if="active==sections.length+2") 
          p.mt-5(v-html="$t('regist_expospeak.complete_text')")
          panel_expo2018

        hr
        div.mt-5
          el-button.float-left(@click="prev", v-if="active>0 && active<=sections.length") {{ $t('form.label_back') }}
          el-button.float-right(@click="next" , v-if="active<sections.length") {{ $t('form.label_next') }}

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
      rules: {
        agree_plan:[
          {required: true, message: "請選擇策展權益"}
        ],
        team_person_count:[
          {required: true, message: "請填寫團隊人數"}
        ],
        has_money:[
          {required: true, message: "請選擇資金挹注"}
        ],
        startup_content:[
          {required: true, message: "請輸入創業內容"}
        ],
        startup_audience:[
          {required: true, message: "請輸入目標族群"}
        ],
        startup_difficult:[
          {required: true, message: "請輸入創業困境"}
        ],
        startup_problem:[
          {required: true, message: "請輸入教育問題"}
        ],
        startup_power:[
          {required: true, message: "請輸入社會影響力"}
        ],
        startup_proposal:[
          {required: true, message: "請上傳企劃書"}
        ],
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
      registExpoOriginal: state=>state.registExpo,
      token: state=>state.auth.token
    }),
    sections(){
      return this.$t("regist_expospeak.sections")
    }
  },
  mounted(){
    // console.log(this.user)
    // this.userClone = JSON.parse(JSON.stringify(this.user))
    this.loadRegistData()

  },
  methods: {
    ...mapActions(['loadRegistData','updateRegistForm']),
    getRules(sections){
      let rules = {}
      
      sections.forEach(section=>{
        section.questions.forEach(question=>{
          rules[question.prop]={
            required: false,
            message: this.$t("form.data_not_complete")
          }
         
          if ( (section.required && question.required!==false) ||
               (!section.required && question.required)){
            rules[question.prop].required=true   
          }
          if ( (question.prop+"").indexOf('email')!=-1){
            rules[question.prop].type="email"
          }
        })
      })
      return rules
    },
    sendRegistForm(){
      let _this = this

      this.$refs['form_registexpo_speak'].validate(valid=>{
        if (valid){

          this.$confirm('確認送出Zac.報名？送出將無法更改', '最後確認', {
            confirmButtonText: '確定',
            cancelButtonText: '取消',
          }).then(() => {
            
            this.updateRegistForm({
              data:{
                regist_expo_speak: this.registExpoSpeak
              },
              callback(){
                _this.$message({
                  message: 'Zac.報名更新成功',
                  type: 'success'
                });

                _this.active=5
              }
            })
          });
        }else{
          this.$message({
            message: '資料填寫不完整，請往前填寫完整後再送出',
            type: 'error'
          });   
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
