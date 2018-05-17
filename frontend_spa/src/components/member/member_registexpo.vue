<template lang="pug">
.page.member-regist-expo.text-left(:key="user || user.id")
  .mobile-block.d-lg-none.d-xl-none 
    img.animated.fadeIn.animated(src="https://service.zashare.org/img/2017/index_za_logo_white.svg")
    h4.animated.fadeIn.animated {{ $t('menu.register_mobile_warning') }}
  .container
    .col-sm-12
      h2.mt-5 {{ $t('regist_expo.title') }}
      p.mt-3(v-html="$t('regist_expo.sub_title')") 
    .col-sm-12.text-left.mt-3
      el-steps(:active="active" finish-status="success")
        el-step(v-for="section in sections",
                :title="section.title.indexOf('、')==-1?section.title:section.title.split('、')[1]" ,
                @click="active=section.id")
        el-step(:title="$t('form.step_confirm')")
        el-step(:title="$t('form.step_complete')")
    // :disabled="typeof registExpo.id=='number'"
    .col-sm-12
      el-form(v-if="registExpo" ,
              label-position="left",
              :rules="getRules(sections)",
              :validate-on-rule-change="false",
              ref="form_registexpo",
              :disabled="typeof registExpo.id=='number'"
              :model="registExpo",
              :finish-status="finishStatus")
        div(v-for="registFormObj in [registExpo]")
          div(v-for="(section,sid) in sections" ,
              v-show="active==section.id",
              :key="sid")
            h4.mt-5.mb-3 {{section.title}}
            el-form-item(v-for="(question,qid) in section.questions ",
                        :label="question.title", :prop="question.prop",
                        v-if="question.display==undefined || (typeof question.display=='function' && question.display(registFormObj))"
                        :key="qid")
              // 說明文字
              div(v-if="question.explain")
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
          h4.mt-5.mb-5(v-html="$t('regist_expo.confirm_title')")
          p.mt-5.mb-5(v-html="$t('regist_expo.confirm_text')")
          p#err_msg
          el-button(@click="sendRegistForm" type="primary" size="medium") {{ $t('form.label_submit') }}

        div(v-if="active==sections.length+2") 
          p.mt-5(v-html="$t('regist_expo.complete_text')")
          panel_expo2018

        hr
        div.mt-5
          el-button.float-left(@click="prev", v-if="active>0 && active<4") {{ $t('form.label_back') }}
          el-button.float-right(@click="next" , v-if="active<3") {{ $t('form.label_next') }}

</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'
import panel_expo2018 from '@/components/panels/panel_expo2018'
import $ from 'jquery'
export default {
  data(){
    return {
      registExpo: {},
      active: 0,
      success: false,
      // rules: {
      //   type:[
      //     {required: true, message: "請選擇種類"}
      //   ],
      //   theme:[
      //     {required: true, message: "請選擇主題"}
      //   ],
      //   attended:[
      //     {required: true, message: "請選擇參與紀錄"}
      //   ],
      //   name_eng:[
      //     {required: true, message: "請輸入英文名稱"}
      //   ],
      //   name_cht:[
      //     {required: true, message: "請輸入中文名稱"}
      //   ],
      //   description:[
      //     {required: true, message: "請輸入描述"}
      //   ],
      //   target_audience:[
      //     {required: true, message: "請輸入目標客群"}
      //   ],
      //   want_audience:[
      //     {required: true, message: "請輸入想要的客群"}
      //   ],
      //   have_sell:[
      //     {required: true, message: "請選擇是否有銷售行為"}
      //   ],
      //   file_proposal:[
      //     {required: true, message: "請上傳企劃書"}
      //   ],
      //   attend_reason:[
      //     {required: true, message: "請輸入參展理由"}
      //   ],
      //   // other:[
      //     // {required: false}
      //   // ],
      //   main_contact_name:[
      //     {required: true, message: "請輸入主要聯絡人姓名"}
      //   ],
      //   main_contact_phone:[
      //     {required: true, message: "請輸入主要聯絡人電話"}
      //   ],
      //   main_contact_email:[
      //     {required: true, message: "請輸入有效的主要聯絡人信箱", type: "email"}
      //   ],
      //   secondary_contact_name:[
      //     {required: true, message: "請輸入次要聯絡人姓名"}
      //   ],
      //   secondary_contact_phone:[
      //     {required: true, message: "請輸入次要聯絡人電話"}
      //   ],
      //   secondary_contact_email:[
      //     {required: true, message: "請輸入有效的次要聯絡人信箱", type: "email"}
      //   ],

      // }
      

    }
  },
  computed: {
    ...mapState({
      auth: 'auth',
      user: state=>state.auth.user,
      token: state=>state.auth.token,
      registExpoOriginal: state=>state.registExpo
    }),
    sections(){
      return this.$t("regist_expo.sections")
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
      //如果是英文版報名，中文自動抓英文名稱
      if (this.$i18n.locale=='en'){
        this.registExpo.name_cht=this.registExpo.name_eng
      }
      this.$refs['form_registexpo'].validate(valid=>{
        if (valid){

          this.$confirm(_this.$t('form.confirm_dialog_title'), _this.$t('form.confirm_dialog_content'), {
            confirmButtonText: _this.$t('form.confirm_dialog_yes'),
            cancelButtonText: _this.$t('form.confirm_dialog_no'),
          }).then(() => {
            this.updateRegistForm({
              data: this.registExpo,
              callback(){
                _this.$message({
                  message:  _this.$t('form.update_success'),
                  type: 'success'
                });
                _this.active = _this.sections.length+2
              }
            })
          }).catch(() => {
            this.$message({
              message: _this.$t('form.update_cancel')
            });          
          });
        }else{
          this.$message({
            message: _this.$t('form.data_not_complete'),
            type: 'error'
          });          
        }
      })
      // console.log(result)


    },
    prev() {
      if (this.active-- < 0) this.active = this.sections.length-1;
      window.scrollTo(0,0)
    }, 
    next() {
      if (this.active++ >  this.sections.length-1) this.active = 0;
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
@import "../../assets/_mixins.sass"
.member-regist-expo
  .el-select
    width: 100%
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
</style>
