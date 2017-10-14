<template lang="pug">
div
  .search_headpart_space(v-if="fixed_search_class")
  .row
    .col-sm-12
      h2.searchtitle.white 參展單位查詢
        span.white (共{{filtered_list.length}}攤位) &nbsp;
        i.fa.fa-search.pull-right(@click="showSearch=!showSearch")
  #search_headpart.row(:class='{fixed: fixed_search_class}')
    div(:class="{container: fixed_search_class}")
      .col-sm-12
        .form-group
          br.hidden-xs
          input.form-control.input_filter(v-if="showSearch", v-model='filter', placeholder='輸入代號、名字、或任何你想要搜尋的關鍵字')
          br(v-if="showSearch",)
          
          .row.row-cata-btn
            //.col-sm-1
              label 類別
            .col-sm-11
              span.keywordbtn(v-for='k in catas', @click='setFilter(k)', :class="{active: k==filter}") {{k}}
          span.filter_cancel(v-if="showSearch",@click='filter="";showSearch=false', title='清空篩選條件') x
          br.hidden-xs
          .row.row-keyword-btn.hidden-xs
            .col-sm-1
              label 關鍵字
            .col-sm-11
              span.keywordbtn(v-for='k in keywords', @click='setFilter(k)') {{k}}
          
  .row
    ul.col-sm-4(v-if='wsize>=992')
      attenditem(v-for='ll in splited_post3[0]',:key="ll.ori_tag?ll.ori_tag:ll.tag", :item='ll', :liststyle='liststyle')
    ul.col-sm-4(v-if='wsize>=992')
      attenditem(v-for='ll in splited_post3[1]',:key="ll.ori_tag?ll.ori_tag:ll.tag", :item='ll', :liststyle='liststyle')
    ul.col-sm-4(v-if='wsize>=992')
      attenditem(v-for='ll in splited_post3[2]',:key="ll.ori_tag?ll.ori_tag:ll.tag", :item='ll', :liststyle='liststyle')
    ul.col-sm-6(v-if='wsize<992 && wsize>=768')
      attenditem(v-for='ll in splited_post2[0]',:key="ll.ori_tag?ll.ori_tag:ll.tag", :item='ll', :liststyle='liststyle')
    ul.col-sm-6(v-if='wsize<992 && wsize>=768')
      attenditem(v-for='ll in splited_post2[1]',:key="ll.ori_tag?ll.ori_tag:ll.tag", :item='ll', :liststyle='liststyle')
    ul.col-sm-12(v-if='wsize<768')
      attenditem(v-for='ll in filtered_list',:key="ll.ori_tag?ll.ori_tag:ll.tag", :item='ll')  
</template>

<script>
import {mapState} from 'vuex'
export default {
  components: {
    attenditem: require( './attend_item.vue')
  },
  props: ["atlist"],
  data (){
    return {
      filter: "",
      liststyle: "normal",
      keywords: ["設計","小學","程式","翻轉","教育","遊戲"],
      catas: ["德－公民道德",
      "智－思考批判力",
      "體－身體實踐",
      "群－關係",
      "美－美感經驗",
      "實驗教育"],
      fixed: false,
      showSearch: false
    }
  },
  computed: {
     ...mapState(['scrollTop','wsize']),
    filtered_list(){
      var newlist=[];
      if (this.filter==""){
        return this.atlist;
      }
      
      var pending=null;
      for(var i=0;i<this.atlist.length;i++){
        var atitem=this.atlist[i];
        var ff=this.filter.toLowerCase();
        
        if ((atitem.tag+atitem.name_cht+atitem.discribe_cht+atitem.teach_thing+atitem.theme).toLowerCase().indexOf(ff)!=-1){
          var clone=JSON.parse(JSON.stringify(atitem)) ;
          
          var res = new RegExp("("+ff+")", "i");
          // console.log(res);
          if (clone.tag.toLowerCase().indexOf(ff)!=-1){
            clone.ori_tag=clone.tag;
            clone.tag=(""+clone.tag).replace(new RegExp("("+clone.tag+")"),"<span class=highlight>$1</span>");
          }
          if (clone.theme.toLowerCase().indexOf(ff)!=-1){
            clone.theme=(""+clone.theme).replace(new RegExp("("+clone.theme+")"),"<span class=highlight>$1</span>");
          }
          
          clone.name_cht=(""+clone.name_cht).replace(res,"<span class=highlight>$1</span>");
          clone.discribe_cht=(""+clone.discribe_cht).replace(res,"<span class=highlight>$1</span>");
          clone.teach_thing=(""+clone.teach_thing).replace(res,"<span class=highlight>$1</span>");
          
          if (atitem.name_cht!="墨雨設計")
            newlist.push(clone);    
          else
            pending=clone;
        }
      }
      if (pending){
        newlist.unshift(pending);
      }
      return newlist;
    },
    splited_post3: function(){
      var splist=[[],[],[]];
      for(var i=0;i<this.filtered_list.length;i++){
        splist[i%3].push(this.filtered_list[i]);
      }
      return splist;
    },
    splited_post2: function(){
      var splist=[[],[]];
      for(var i=0;i<this.filtered_list.length;i++){
        splist[i%2].push(this.filtered_list[i]);
      }
      return splist;
    },
    fixed_search_class(){
      let $search_bar = $("#search_headpart")
      let _this = this
      if (_this.scrollTop>$search_bar.height() ){
        return true
      }
      
      return false
    }
   
  },
  methods:{
    setFilter(k){
      if (this.filter!=k){
        this.filter=k
      }else{
        this.filter=""
      }
      $("html,body").animate({scrollTop:0})
    }
  },
  mounted(){
    if (window.location.hash!=""){
      this.filter= decodeURIComponent(window.location.hash.slice(1))

    }
  }
}
</script>

<style>

</style>
