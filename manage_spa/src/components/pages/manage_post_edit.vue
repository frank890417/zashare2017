<template lang='pug'>
  .page.manage-post-edit(v-if="post")
    el-container
      el-main
        el-breadcrumb(separator="/")
          el-breadcrumb-item(:to="{ path: '/post' }") 文章列表
          el-breadcrumb-item 文章編輯
        br
        el-form(:model="post", label-width="80px")
          el-container
            el-header
              el-row
                el-col(:span="18")
                  h2(style="text-align: left") 編輯-{{post.title}}
                el-col(:span="6")
                  el-button(type="primary", @click="handleSave") 儲存更新 
          //- hr
          el-container
            el-aside(width="300px")
              el-row
                el-col(:span="24")
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
                  el-input(v-model="post.tag")
                el-form-item(label="年份")
                  el-input(v-model="post.year")
                el-form-item(label="撰文者")
                  el-input(v-model="post.author")
                el-form-item(label="上稿時間")
                  el-date-picker(v-model="post.established_time")
                el-form-item(label="封面圖片")
                  el-input(v-model="post.cover")
                  img(:src="post.cover", style="width: 100%")
            el-main
              el-form-item(label="標題")
                el-input(v-model="post.title")
              el-form-item(label="攤位編號")
                el-input(v-model="post.company")
              el-form-item(label="短簡介")
                el-input(v-model="post.short_description" type="textarea")
              el-form-item(label="簡介")
                el-input(v-model="post.description" type="textarea")
              el-form-item
                VueEditor.ve(id ="content", v-model="post.content",
                        :useCustomImageHandler="true",
                        @imageAdded="handleImageAdded" ) 
                //- el-input(v-model="post.content" autosize)
</template>

<script>
import { VueEditor } from 'vue2-editor'
export default {
  data(){
    return {
      post: null
    }
  },
  mounted(){
    this.axios.get("/api/post/"+this.$route.params.id).then(res=>{
      this.post=res.data
    })
  },
  components:{
    VueEditor
  },
  methods: {
    handleSave(){
        
      this.axios.patch(
        "/api/post/"+this.$route.params.id,
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
    }
  }
}
</script>

<style>

</style>
