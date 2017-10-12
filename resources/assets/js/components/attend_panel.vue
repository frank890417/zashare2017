<template lang="pug">
div
  #search_headpart_space
  #search_headpart(:class='[(scroll_top>170)?"fixtop":""]')
    .row
      h2.searchtitle.white 參展單位查詢
      span.white (共{{filtered_list.length}}項結果):
      .col-sm-12
        .form-group
          input.form-control.input_filter(v-model='filter', placeholder='輸入代號、名字、或任何你想要搜尋的關鍵字')
          span.keywordbtn(v-for='k in keywords', @click='filter=k') {{k}}
          span.filter_cancel(@click='filter=""', title='清空篩選條件') x
  .row
    ul.col-sm-4(v-if='wsize>=992')
      attenditem(v-for='ll in splited_post3[0]', :item='ll', :liststyle='liststyle')
    ul.col-sm-4(v-if='wsize>=992')
      attenditem(v-for='ll in splited_post3[1]', :item='ll', :liststyle='liststyle')
    ul.col-sm-4(v-if='wsize>=992')
      attenditem(v-for='ll in splited_post3[2]', :item='ll', :liststyle='liststyle')
    ul.col-sm-6(v-if='wsize<992 && wsize>=768')
      attenditem(v-for='ll in splited_post2[0]', :item='ll', :liststyle='liststyle')
    ul.col-sm-6(v-if='wsize<992 && wsize>=768')
      attenditem(v-for='ll in splited_post2[1]', :item='ll', :liststyle='liststyle')
    ul.col-sm-12(v-if='wsize<768')
      attenditem(v-for='ll in filtered_list', :item='ll')  
</template>

<script>
  export default {
    components: {
      attenditem: require( './attend_item.vue')
    },
    props: ["atlist","scroll_top"],
    data (){
      return {
        filter: "",
        liststyle: "normal",
        keywords: ["設計","小學","程式","翻轉","教育","遊戲"],
        wsize: window.innerWidth
      }
    },
    computed: {
      filtered_list(){
        var newlist=[];
        if (this.filter==""){
          return this.atlist;
        }
        
        var pending=null;
        for(var i=0;i<this.atlist.length;i++){
          var atitem=this.atlist[i];
          var ff=this.filter.toLowerCase();
          
          if ((atitem.tag+atitem.name_cht+atitem.discribe_cht+atitem.teach_thing).toLowerCase().indexOf(ff)!=-1){
            var clone=JSON.parse(JSON.stringify(atitem)) ;
            
            var res = new RegExp(ff, "i");
            // console.log(res);
            if (clone.tag.toLowerCase().indexOf(ff)!=-1){
              
              clone.ori_tag=clone.tag;
              clone.tag=clone.tag.replace(clone.tag,"<span class=highlight>"+clone.tag+"</span>");
            }
            
            clone.name_cht=clone.name_cht.replace(res,"<span class=highlight>"+this.filter+"</span>");
            clone.discribe_cht=clone.discribe_cht.replace(res,"<span class=highlight>"+this.filter+"</span>");
            clone.teach_thing=clone.teach_thing.replace(res,"<span class=highlight>"+this.filter+"</span>");
            
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
      }
    }
  }
</script>

<style>

</style>
