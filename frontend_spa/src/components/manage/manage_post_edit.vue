<template lang='pug'>
.page.manage-post-edit(v-show="post || create_mode")
  .container-fluid.text-left
    .row
      .col-sm-12
        el-breadcrumb(separator="/")
          el-breadcrumb-item(:to="{ path: '/manage/post' }") {{editType.label}}列表
          el-breadcrumb-item {{editType.label}}編輯
        br
        br
      el-form(:model="post", label-width="90px").container-fluid

        el-header.header
          el-row
            el-col(:span="18")
              h2(style="text-align: left")
                span(v-if="create_mode") 新增{{editType.label}} -
                span(v-else) 編輯{{editType.label}} -
                | {{post.title}}
              
            el-col(:span="6")
              el-button(type="primary", @click="handleSave") 儲存更新 
              router-link(:to="getPreviewRoute(post)" ,target="_blank")
                el-button(type="primary") 前往{{editType.label}}
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
                    :value="cata.id",
                    :key="cata.id"
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
                  el-option(value="2015",label="2015")
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
                        :editorOptions="editorSettings",
                        @imageAdded="handleImageAdded",
                        style="height: 500px;margin-bottom: 50px" ) 
              //- el-input(v-model="post.content" autosize)
</template>

<script>
import default_pic_selector from '../default_pic_selector.vue'
import { VueEditor, Quill  } from 'vue2-editor'
import { mapState } from 'vuex'
import $ from 'jquery'
let quill_editor = null
var Block = Quill.import('blots/block');

var Parchment = Quill.import('parchment');
var Delta = Quill.import('delta');
let Break = Quill.import('blots/break');
let Embed = Quill.import('blots/embed');

class MyThing extends Block {}
MyThing.blotName = 'my-thing';
MyThing.className = 'quote';
MyThing.tagName = 'p';

Quill.register(MyThing);

// Quill.register('modules/counter', function(quill, options) {
//   // var container = document.querySelector('#counter');
//   quill.on('editor-change', function() {
//     quill_editor=quill
//     console.log(quill_editor)
//   //   var text = quill.getText();
//   //   // There are a couple issues with counting words
//   //   // this way but we'll fix these later
//   //   // console.log(Quill)
//   //   var range = quill.getSelection();
//   //   if (range) {
//   //     quill.insertText(range.index, "<div class='quote'>"+range+"</div>");
//   //   }
//   //   // container.innerText = text.split(/\s+/).length;
//   });
// });
function lineBreakMatcher() {
  var newDelta = new Delta();
  newDelta.insert({'break': ''});
  return newDelta;
}

Break.prototype.insertInto = function(parent, ref) {
    Embed.prototype.insertInto.call(this, parent, ref)
};
Break.prototype.length= function() {
    return 1;
}
Break.prototype.value= function() {
    return '\n';
}

export default {
  data(){
    return {
       customToolbar: [
          ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
          
          ['my-thing'],
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
      editorSettings: {
        modules: {
          clipboard: {
            matchers: [
              ['BR', lineBreakMatcher] 
            ]
          },
          keyboard: {
            bindings: {
              handleEnter: {
                key: 13,
                handler: function (range, context) {
                  if (range.length > 0) {
                    this.quill.scroll.deleteAt(range.index, range.length);  // So we do not trigger text-change
                  }
                  let lineFormats = Object.keys(context.format).reduce(function(lineFormats, format) {
                    if (Parchment.query(format, Parchment.Scope.BLOCK) && !Array.isArray(context.format[format])) {
                      lineFormats[format] = context.format[format];
                    }
                    return lineFormats;
                  }, {});
                  var previousChar = this.quill.getText(range.index - 1, 1);
                  // Earlier scroll.deleteAt might have messed up our selection,
                  // so insertText's built in selection preservation is not reliable
                  this.quill.insertText(range.index, '\n', lineFormats, Quill.sources.USER);
                  if (previousChar == '' || previousChar == '\n') {
                    this.quill.setSelection(range.index + 2, Quill.sources.SILENT);
                  } else {
                    this.quill.setSelection(range.index + 1, Quill.sources.SILENT);
                  }
                  this.quill.selection.scrollIntoView();
                  Object.keys(context.format).forEach((name) => {
                    if (lineFormats[name] != null) return;
                    if (Array.isArray(context.format[name])) return;
                    if (name === 'link') return;
                    this.quill.format(name, context.format[name], Quill.sources.USER);
                  });
                }
              },
              linebreak: {
                key: 13,
                shiftKey: true,
                  handler: function (range, context) {
                    var nextChar = this.quill.getText(range.index + 1, 1)
                    var ee = this.quill.insertEmbed(range.index, 'break', true, 'user');
                    if (nextChar.length == 0) {
                      // second line break inserts only at the end of parent element
                      var ee = this.quill.insertEmbed(range.index, 'break', true, 'user');
                    }
                    this.quill.setSelection(range.index + 1, Quill.sources.SILENT);
                  }
                }
              }
            }
          }
        //   counter: true
        
      },
      post: {
        year: "2017",
        established_time: new Date().toLocaleDateString(),
        short_description: "",
        hashtag: [],
       
      },
      create_mode: false,
      defaut_hashtags: "師培、教具、國小學童、偏鄉、國中生、高中生、大學生、實驗教育、媒體、線上、空間、工作坊、技職、美感、文化、出走、輔導、maker",
      quill_editor: null
    }
  },
  mounted(){
    if (this.$route.params.id){
      this.axios.get(`/api/${this.$route.meta.type}/`+this.$route.params.id).then(res=>{
        this.post=res.data
        // if (this.post.cover.indexOf(""))
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
    let _this = this
    
    // setTimeout(function(){
    //   $(".ql-formats").eq(0).append("<button type='button'><div class='ql-box qicon ql-strike ql-active'></div></button>")
    //   var customButton = document.querySelector('.ql-box');
      
    //   customButton.addEventListener('click', function() {
    //     console.log(quill_editor)
    //     var range = quill_editor.getSelection();
    //     if (range) {
    //       quill_editor.insertText(range.index, "<div class='quote'>"+range+"</div>");
    //     }
    //   });
    // },1000)
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
    getPreviewRoute(post){
      if (this.$route.meta.type=="post"){
        return `/expo/${this.$route.meta.year}/blog/${post.id}`
      }

      if (this.$route.meta.type=="news"){
        return `/news/${post.id}`
      }
    },
    handleSave(){
      if (!this.create_mode){
        this.axios.patch(
          `/api/${this.$route.meta.type}/`+this.$route.params.id,
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
          `/api/${this.$route.meta.type}`,
          this.post
        ).then(res=>{

          this.$message({
            message: '建立成功',
            type: 'success'
          });
          // let _this  = this
          console.log(res.data.data.id)
          // setTimeout(function(){
          this.$router.push(`/manage/${this.$route.meta.type}/`+res.data.data.id)
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
      if (this.$route.meta.type=="news"){
        return this.catas.filter(o=>o.year=="news")

      }
      return this.catas.filter(o=>o.year==this.post.year)
    },
    editType(){
      if (this.$route.meta.type=="news"){
        return {
          label: "新聞",
          route: "news"
        }
      }
      if (this.$route.meta.type=="post"){
        return {
          label: "文章",
          route: "post"
        }
      }
    }
  }
}
</script>

<style lang="sass">
hr
  margin-bottom: 30px
.header
  margin-bottom: 30px
.col-info
  /* position: fixed; */
  /* padding-right: 50px */
button
.ql-box
.qicon
  width: 16px 
  height: 16px
  border: solid 3px #333
.ql-toolbar
  text-align: left
.ql-toolbar .ql-my-thing 
  width: 60px !important

.ql-toolbar .ql-my-thing:before 
  content: ""
  display: block
  width: 16px 
  height: 16px
  border: solid 3px #333

.quote
  font-size: 20px
  font-weight: 900
  line-height: 1.6
  text-align: center
  
  padding: 15px 15px
  border: solid 6px
  margin-top: 30px
  margin-bottom: 30px
  
.my-thing 
  background: #f00
  color: #fff

</style>
