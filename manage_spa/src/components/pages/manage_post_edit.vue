<template lang='pug'>
.page.manage-post-edit(v-show="post || create_mode")
  .container-fluid.text-left
    .row
      .col-sm-12
        el-breadcrumb(separator="/")
          el-breadcrumb-item(:to="{ path: '/post' }") 文章列表
          el-breadcrumb-item 文章編輯
        br
        br
      el-form(:model="post", label-width="90px").container-fluid

        el-header.header
          el-row
            el-col(:span="18")
              h2(style="text-align: left")
                span(v-if="create_mode") 新增文章 -
                span(v-else) 編輯文章 -
                | {{post.title}}
              
            el-col(:span="6")
              el-button(type="primary", @click="handleSave") 儲存更新 
          hr
          br
          br
        //- hr
        .container-fluid
          .row
            .col-sm-3.col-info
              //- el-switch(
                v-model="post.status")
              el-form-item(label="發布狀態")
                el-select(v-model="post.status")
                  el-option(:key="'draft'",:value="'draft'", :label="'草稿'")
                  el-option(:key="'published'",:value="'published'", :label="'已發布'")
              el-form-item(label="首頁置頂")
                el-switch(v-model="post.stick_top_index")
              el-form-item(label="類別置頂")
                el-switch(v-model="post.stick_top_cata")
              el-form-item(label="文章類別")
                el-select(v-model="post.cata_id" placeholder="請選擇")
                  el-option(
                    v-for="cata in year_catas",
                    :label="cata.name",
                    :value="cata.id"
                  )
              el-form-item(label="參展單位")
                el-select(v-model="post.company_id" filterable placeholder="請選擇")
                  el-option(
                    v-for="item in companies"
                    :key="item.id"
                    :label="item.name_cht+'('+item.year+')'"
                    :value="item.id")
              el-form-item(label="Hashtag")
                el-select(v-model="post.hashtag"
                          multiple
                          filterable
                          allow-create
                          default-first-option
                          placeholder="請選擇Hashtag或建立")
                  el-option(
                    v-for="item in defaut_hashtags.split('、')"
                    :key="item"
                    :label="item"
                    :value="item")

              el-form-item(label="年份")
                el-select(v-model="post.year")
                  el-option(value="2016",label="2016")
                  el-option(value="2017",label="2017")
              el-form-item(label="撰文者")
                el-input(v-model="post.author")
              el-form-item(label="上稿時間")
                el-date-picker(v-model="post.established_time",
                               type="date",
                               value-format="yyyy-MM-dd HH:mm:ss")
              el-form-item(label="封面圖片")
                el-input(v-model="post.cover")
                  default_pic_selector(@select_pic="select_pic" slot="append")
              
                img(:src="post.cover", style="width: 100%;max-width: 100px")
                //el-form-item(label="封面圖片")
                //el-input(v-model="post.cover")
                //img(:src="post.cover", style="width: 100%")
            .col-sm-9.col-content
              el-form-item(label="標題")
                el-input(v-model="post.title")
              //- el-form-item(label="攤位編號")
              //-   el-input(v-model="post.company")
              el-form-item(label="短簡介")
                el-input(v-model="post.short_description" type="textarea")
              el-form-item(label="簡介")
                el-input(v-model="post.description" type="textarea",rows=4)
              el-form-item
                VueEditor.ve(id ="content", v-model="post.content",
                        :useCustomImageHandler="true",
                        :editorToolbar="customToolbar",
                        @imageAdded="handleImageAdded",
                        style="height: 500px;margin-bottom: 50px" ) 
              //- el-input(v-model="post.content" autosize)
</template>

<script>
import default_pic_selector from '../default_pic_selector.vue'
import { VueEditor } from 'vue2-editor'
import { mapState } from 'vuex'

export default {
  data(){
    return {
       customToolbar: [
          ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
          ['blockquote', 'code-block','image','video','link'],

          // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
          [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
          [{ 'direction': 'rtl' }],                         // text direction

          // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

          [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
          [{ 'font': [] }],
          [{ 'align': [] }],

          ['clean']                                         // remove formatting button
],
      post: {
        year: "2017",
        established_time: new Date().toLocaleDateString(),
        short_description: "",
        hashtag: [],
       
      },
      create_mode: false,
      defaut_hashtags: "師培、教具、國小學童、偏鄉、國中生、高中生、大學生、實驗教育、媒體、線上、空間、工作坊、技職、美感、文化、出走、輔導、maker"
    }
  },
  mounted(){
    if (this.$route.params.id){
      this.axios.get("/api/spa/post/"+this.$route.params.id).then(res=>{
        this.post=res.data
        if (!this.post.hashtag){
          this.post.hashtag=[]
        }
        if (typeof this.post.hashtag=="string"){
          this.post.hashtag=JSON.parse(this.post.hashtag)
        }
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
      this.post.cover=obj.url
    },
    handleSave(){
      if (!this.create_mode){
        this.axios.patch(
          "/api/spa/post/"+this.$route.params.id,
          this.post
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
          "/api/spa/post",
          this.post
        ).then(res=>{

          this.$message({
            message: '建立成功',
            type: 'success'
          });
          // let _this  = this
          console.log(res.data.data.id)
          // setTimeout(function(){
          this.$router.push("/post/"+res.data.data.id)
          // },300)
        })

      }
    }
  },
  computed: {
    ...mapState(['companies','catas']),
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
  /* position: fixed; */
  /* padding-right: 50px */
}
</style>
