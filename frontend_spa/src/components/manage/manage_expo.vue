<template lang="pug">
  .page.manage-post.text-left
    .container-fluid
      .row
        .col-sm-12
          h3.mt-5 展覽資料管理
          //- el-input(v-model="keyword", placeholder="輸入關鍵字")
          br
            
      .row
        .col-sm-12
          el-table.table(:data="expos")
            el-table-column(prop="year" label="年度" width=100, :sortable="true")
            el-table-column(prop="label" label="標題")
            el-table-column(prop="cover" label="封面")
              template(slot-scope="scope")
                img.cover(:src="scope.row.cover")
            el-table-column(prop="title" label="中文slogan")
            el-table-column(prop="place" label="地點")
            el-table-column(prop="start_date" label="開始日期")
            el-table-column(prop="end_date" label="結束日期")
            //- el-table-column(prop="updated_at" label="更新時間")
            el-table-column(prop="label" label="編輯" width=200)
              template(slot-scope="scope")
                el-button(@click="newExpo=scope.row" ) 編輯
                el-button(@click="handleDelete(scope.row.id)", type="danger") 刪除

              
          el-button.w100(type="primary", @click="addNewExpo") + 新增資料

        .col-sm-12(v-if="newExpo")
          h3.mt-5 {{ (newExpo.id?'編輯資料--':'新增資料--')+newExpo.year+' | '+newExpo.title }}
          el-form(label-width="150px").row
            .col-sm-6
              el-form-item(label="年度")
                el-input(v-model="newExpo.year")
              el-form-item(label="標題")
                el-input(v-model="newExpo.label" , placeholder="雜學校第二屆")
              el-form-item(label="中文Slogan")
                el-input(v-model="newExpo.title", placeholder="有敢擇學")
              el-form-item(label="英文Slogan")
                el-input(v-model="newExpo.title_eng", placeholder="Try Try See !")
              el-form-item(label="精神")
                el-input(v-model="newExpo.spirit", placeholder="年度精神提倡「有敢擇學 」")

              el-form-item(label="開始日期")
                el-date-picker(v-model="newExpo.start_date",
                                      type="date",
                                      value-format="yyyy-MM-dd")
              el-form-item(label="結束日期")
                el-date-picker(v-model="newExpo.end_date",
                                      type="date",
                                      value-format="yyyy-MM-dd")
          
            .col-sm-6
              el-form-item(label="地點")
                el-input(v-model="newExpo.place")
              el-form-item(label="特色(換行分隔)")
                el-input(v-model="newExpo.features",
                        type="textarea", :rows=4)
              el-form-item(label="詳細資訊")
                VueEditor.ve(id ="content", v-model="newExpo.content",
                        :useCustomImageHandler="true",
                        :editorToolbar="customToolbar",
                        :editorOptions="editorSettings",
                        @imageAdded="handleImageAdded",
                        style="height: 500px;margin-bottom: 50px" ) 
                //- el-input(v-model="newExpo.content",
                //-         type="textarea", :rows=4)           

              el-form-item(label="封面圖片")
                el-input(v-model="newExpo.cover")
                  default_pic_selector(@select_pic="select_pic" slot="append")
                img(:src="newExpo.cover", style="width: 100%;max-width: 100px")
              el-form-item(label="About封面圖片")
                el-input(v-model="newExpo.report_cover")
                  default_pic_selector(@select_pic="select_pic_report" slot="append")
                img(:src="newExpo.report_cover", style="width: 100%;max-width: 100px")
            
                
          el-button(@click="postExpo", type="primary") 更新資訊
          //- ul.list-group
            li.list-group-item 
          hr
    //- el-table(:data="catas" border)
      el-table-column(prop="id",label="#", width="60" sortable)
      //- el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="name",label="名字", width="200" sortable)
     
      
</template>

<script>
import default_pic_selector from '../default_pic_selector.vue'
import { VueEditor, Quill  } from 'vue2-editor'
import {mapState} from 'vuex'
import axios from 'axios'

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
      // posts: [],
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
      keyword: "",
      now_year: "2016",
      expos: [],
      currentExpo: null,
      newExpo: null
    }
  },
  mounted(){
    this.loadAll()
  },
  methods: {
    getUserLength(users){
      if (users){
        return JSON.parse(users).length
      }else{
        return 0
      }
    },
    select_pic(obj){
      console.log(obj)
      this.$set(this.newExpo,"cover",obj.url)

    },
    select_pic_report(obj){
      console.log(obj)
      this.$set(this.newExpo,"report_cover",obj.url)

    },
    getexpoTotal(ct){
      return {
        got: ct.expos.filter(o=>o.user_id).length,
        total: ct.expos.length
      }
    },
    //開始新增
    addNewExpo(){
      this.newExpo={}

    }
    ,
    //傳到後端建立資料
    postExpo(){
      let updateMethod = this.newExpo.id?axios.patch:axios.post
      updateMethod("/api/expo"+(this.newExpo.id?("/"+this.newExpo.id):""),{
        token: this.token,
        data: this.newExpo,
      }).then(res=>{
        this.$message.success("儲存成功")
        console.log(res.data)
        this.loadAll()
        this.newExpo=null
        
      })

    },
    loadAll(){
      axios.get("/api/expo",{
        params: {
          token: this.token,
        }
      }).then(res=>{
        this.expos = res.data
        // this.$message.success("更新成功")
      })
    },

    handleDelete(id){
      // console.log(row)
      this.$confirm("你確定要刪除嗎？").then(()=>{
        this.axios.post(`/api/expo/${id}`,{
          _method: 'DELETE',
          token: this.token,
          dataType: 'JSON',
        }).then((res)=>{
  
          this.$message.success("刪除完成")
          // this.$store.dispatch("loadWebsite")
           this.loadAll()
          // this.$router.push('/activity')
        })

      })
    },
  },
  computed:{
     ...mapState({
      catas: state=>state.manage.catas,
      token: state=>state.auth.token
    }),
    // filteredCompany(){
    //   return this.companies.filter(company=>{
    //     return this.keyword=="" || JSON.stringify(company).indexOf(this.keyword)!=-1
    //   }).filter(company=>{
    //     return this.now_year=="" || company.year == this.now_year
    //   }).map(company=>({
    //     ...company,
    //   }))
    // }
  },
  components: {
    default_pic_selector,VueEditor
  }
}
</script>

<style lang="sass">
.cell
  position: relative
  .cover
    width: 100px
</style>
