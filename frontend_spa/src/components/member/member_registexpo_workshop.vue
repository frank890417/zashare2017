<template lang="pug">
.page.member-regist-expo.text-left
  .mobile-block.d-lg-none.d-xl-none 
    img.animated.fadeIn.animated(src="https://service.zashare.org/img/2017/index_za_logo_white.svg")
    h3.animated.fadeIn.animated {{ $t('menu.register_mobile_warning') }}
  .container
    .col-sm-12
      h2.mt-5 {{ $t('regist_expoworkshop.title') }}
      p.mt-3(v-html="$t('regist_expoworkshop.sub_title')") 
    .col-sm-12.text-left.mt-3
      el-steps(:active="active" finish-status="success")
        el-step(v-for="section in sections",
                :title="section.title.indexOf('、')==-1?section.title:section.title.split('、')[1]" ,
                @click="active=section.id")
        el-step(:title="$t('form.step_confirm')")
        el-step(:title="$t('form.step_complete')")
    .col-sm-12
      // :disabled="typeof registExpoWorkshop.id=='number'"
      el-form(v-if="registExpoWorkshop",
              label-position="left",
              :rules="getRules(sections)",
              :validate-on-rule-change="false",
              :disabled="typeof registExpoWorkshop.id=='number'"
              ref="form_registexpo_workshop"
              :model="registExpoWorkshop")


        div(v-for="registFormObj in [registExpoWorkshop]")
          div(v-for="(section,sid) in sections" ,
              v-show="active==section.id",
              :key="sid")
            h4.mt-5.mb-3 {{section.title}}
            el-form-item(v-for="(question,qid) in section.questions ",
                        :required="(section.required && question.required!==false) || (!section.required && question.required)"
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
                      v-if="question.type=='number'",
                      :max="question.settings && question.settings.max")


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
          h4.mt-5.mb-5(v-html="$t('regist_expoworkshop.confirm_title')")
          p.mt-5.mb-5(v-html="$t('regist_expoworkshop.confirm_text')")
          p#err_msg
          el-button(@click="sendRegistForm" type="primary" size="medium") {{ $t('form.label_submit') }}

        div(v-if="active==sections.length+2") 
          p.mt-5(v-html="$t('regist_expoworkshop.complete_text')")
          panel_expo2018

        hr
        div.mt-5
          el-button.float-left(@click="prev", v-if="active>0 && active<=sections.length") {{ $t('form.label_back') }}
          el-button.float-right(@click="next" , v-if="active<sections.length") {{ $t('form.label_next') }}

</template>




<script>
import {mapState, mapGetters,mapActions} from 'vuex'
import panel_expo2018 from '@/components/panels/panel_expo2018'
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
      ],
      rules: {
        class_type:[
          { required: true, message: "請輸入課程類型"}
        ],
        class_audience:[
          // { required: true, message: "請輸入活動招生族群"}
        ],
        class_person_count:[
          { required: true, message: "請輸入預計人數"}
        ],
        class_time:[
          { required: true, message: "請選擇偏好時段"}
        ],
        class_proposal:[
          { required: true, message: "請上傳企劃書"}
        ],
        main_contact_name:[
          {required: true, message: "請輸入主要聯絡人姓名"}
        ],
        main_contact_phone:[
          {required: true, message: "請輸入主要聯絡人電話"}
        ],
        main_contact_email:[
          {required: true, message: "請輸入有效的主要聯絡人信箱", type:"email"}
        ],
        secondary_contact_name:[
          {required: true, message: "請輸入次要聯絡人姓名"}
        ],
        secondary_contact_phone:[
          {required: true, message: "請輸入次要聯絡人電話"}
        ],
        secondary_contact_email:[
          {required: true, message: "請輸入有效的次要聯絡人信箱", type:"email"}
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
      return this.$t("regist_expoworkshop.sections")
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

      this.$refs['form_registexpo_workshop'].validate(valid=>{
        if (valid){

          this.$confirm(_this.$t('form.confirm_dialog_title'), _this.$t('form.confirm_dialog_content'), {
            confirmButtonText: _this.$t('form.confirm_dialog_yes'),
            cancelButtonText: _this.$t('form.confirm_dialog_no'),
          }).then(() => {

            this.updateRegistForm({
              data:{
                regist_workshop: this.registExpoWorkshop
              },
              callback(){
                _this.$message({
                  message:  _this.$t('form.update_success'),
                  type: 'success'
                });

                _this.active=4
              }
            })


          }).catch(() => {
            this.$message({
              message: _this.$t('form.update_cancel')
            });          
          });;
        }else{
          this.$message({
            message: _this.$t('form.data_not_complete'),
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
@import "../../assets/_mixins.sass"
.member-regist-expo
  .mobile-block
    position: fixed
    background-color: black
    flex-direction: column
    left: 0
    top: 0
    font-size: 1.5rem
    +size(100%)
    padding: 5vw
    +flexCenter    
    color: white
    z-index: 1000
    img
      max-width: 150px
      margin-bottom: 5vmin
  .el-select
    width: 100%
</style>
