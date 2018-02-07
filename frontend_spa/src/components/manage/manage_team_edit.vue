<template lang='pug'>
.page.manage-company-edit(v-show="company || create_mode")
  .container-fluid.text-left
    .row
      .col-sm-12
        el-breadcrumb(separator="/")
          el-breadcrumb-item(:to="{ path: '/manage/company' }") 單位列表
          el-breadcrumb-item 單位編輯
        br
        br
      el-form(:model="company", label-width="90px").container-fluid

        el-header.header
          el-row
            el-col(:span="18")
              h2(style="text-align: left")
                span(v-if="create_mode") 新增單位 -
                span(v-else) 編輯單位 -
                | {{company.name_cht}}
              
            el-col(:span="6")
              el-button(type="primary", @click="handleSave") 儲存更新 
          hr
          br
          br
        //- hr
        .container-fluid
          .row
            .col-sm-5.col-info
              //- el-switch(
                v-model="company.status")
              el-form-item(label="中文名字")
                el-input(v-model="company.name_cht")
              el-form-item(label="英文名字")
                el-input(v-model="company.name_eng")
              el-form-item(label="短名稱")
                el-input(v-model="company.name_short")
              el-form-item(label="主題")
                el-input(v-model="company.theme")
              el-form-item(label="類別")
                el-input(v-model="company.cata")
              el-form-item(label="連結")
                el-input(v-model="company.website")
              //el-form-item(label="發布狀態")
                el-select(v-model="company.status")
                  el-option(:key="'draft'",:value="'draft'", :label="'草稿'")
                  el-option(:key="'published'",:value="'published'", :label="'已發布'")
              //el-form-item(label="首頁置頂")
                el-switch(v-model="company.stick_top_index")
              //el-form-item(label="類別置頂")
                el-switch(v-model="company.stick_top_cata")
              //el-form-item(label="單位類別")
                el-select(v-model="company.cata_id" placeholder="請選擇")
                  el-option(
                    v-for="cata in year_catas",
                    :label="cata.name",
                    :value="cata.id"
                  )
              //el-form-item(label="參展單位")
                el-select(v-model="company.company_id" filterable placeholder="請選擇")
                  el-option(
                    v-for="item in companies"
                    :key="item.id"
                    :label="item.name_cht"
                    :value="item.id")


              el-form-item(label="年份")
                el-select(v-model="company.year")
                  el-option(value="2016",label="2016")
                  el-option(value="2017",label="2017")
              
              //el-form-item(label="上稿時間")
                el-date-picker(v-model="company.established_time")
              //el-form-item(label="封面圖片")
                el-input(v-model="company.cover")
                img(:src="company.cover", style="width: 100%")
            .col-sm-7.col-content
              //el-form-item(label="標題")
                el-input(v-model="company.title")
              //- el-form-item(label="攤位編號")
              //-   el-input(v-model="company.company")
              el-form-item(label="中文簡介")
                el-input(v-model="company.discribe_cht" type="textarea",rows=4)
              el-form-item(label="英文簡介")
                el-input(v-model="company.discribe_eng" type="textarea",rows=4)
              el-form-item(label="想要教的")
                el-input(v-model="company.teach_thing" type="textarea",rows=2)
              el-form-item(label="想要學的")
                el-input(v-model="company.learn_thing" type="textarea",rows=2)
              //el-form-item
                VueEditor.ve(id ="content", v-model="company.content",
                        :useCustomImageHandler="true",
                        @imageAdded="handleImageAdded" ) 
              //- el-input(v-model="company.content" autosize)
</template>

<script>
import default_pic_selector from '../default_pic_selector.vue'
import { VueEditor } from 'vue2-editor'
import { mapState } from 'vuex'

export default {
  data(){
    return {
      company: {
        year: "2017",
        established_time: new Date().toLocaleDateString(),
        short_description: "",
        hashtag: []

      },
      create_mode: false,
    }
  },
  mounted(){
    if (this.$route.params.id){
      this.axios.get("/api/company/"+this.$route.params.id).then(res=>{
        this.company=res.data
        // if (!this.company.hashtag){
        //   this.company.hashtag=[]
        // }
        // if (typeof this.company.hashtag=="string"){
        //   this.company.hashtag=JSON.parse(this.company.hashtag)
        // }
      })
    }else{
      this.create_mode=true
    }
  },
  components:{
    VueEditor,
    default_pic_selector, 
  },
  methods: {
    select_pic(obj){
      console.log(obj)
      this.company.cover=obj.url
    },
    handleSave(){
      if (!this.create_mode){
        this.axios.patch(
          "/api/company/"+this.$route.params.id,
          this.company
        ).then(res=>{
          console.log(res.data)
          if (res.data.status=="success"){
            this.$message({
              message: '儲存成功',
              type: 'success'
            });
          }else{
            
            this.$message.error({
              message: '儲存失敗',
              // type: 'error'
            });
  
          }
        })

      }else{
        this.axios.post(
          "/api/company",
          this.company
        ).then(res=>{

          this.$message({
            message: '建立成功',
            type: 'success'
          });
          // let _this  = this
          console.log(res.data.data.id)
          // setTimeout(function(){
          this.$router.push("/company/"+res.data.data.id)
          // },300)
        })

      }
    }
  },
  computed: {
    ...mapState({
      companies: state=>state.manage.companies,
      catas: state=>state.manage.catas,
    }),
    year_catas(){
      return this.catas.filter(o=>o.year==this.post.year)
    }
  }
}
</script>

<style>
hr{
  margin-bottom: 30px;
}
.header{
  margin-bottom: 30px;
}
.col-info{
  padding-right: 50px
}
</style>
