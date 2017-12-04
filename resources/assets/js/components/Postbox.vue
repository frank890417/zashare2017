<!-- 這邊是首頁的文章顯示區 -->
<template lang="pug">
  div
    .container.blog_posts_area(v-if='posts.length>0', :class="loading?'loading':''")
      .row
        // 搜尋
        .col-sm-12
          .col-sm-12
            .form-group(style='position: relative')
              i.fa.fa-search(style='position: absolute;top: 10px;left: 12px;')
              input#searchinput(style='width: 100%;padding: 5px 10px;border-radius: 5px;border:none;border:solid #aaa 1px;padding-left: 30px', type='text', placeholder=' 搜尋標題、內文、類別', v-model='filter')
        // 文章區域  使用vue.js渲染
        .col-sm-12
          // 類別標題
          h2.cata_title(v-if="!(filter_cata=='')", :class="{specified: filter_cata!=''}")
            | 類別-{{get_cata_name(filter_cata)}} 
            .cancelbtn(@click="set_cata('')")
        br
        // 類別 三篇文章
        div(v-for='cata in catalist', v-show="(filter_cata=='') && (limit_tag_split(filtered_post,3)[cata.tag])")
          .col-sm-12
            h2.cata_title
              | {{cata.name}}
              .more_btn(@click="set_cata(cata.tag)")
            br
          // 類別三篇文章
          .row
            .col-sm-4(v-for='(p,id) in limit_tag_split(filtered_post,3)[cata.tag]')
              router-link.postbox(:to="'/post/n/'+(p.ori_title?p.ori_title:p.title)")
                .topimg(:style='css_top_img(p)')
                  h3.company_name(v-html='p.name_cht')
                h3.post_title(v-html='"【"+p.name_short+"】"+p.title')
                p.post_para(v-html='(p.description+"").substr(0,70)+"..."')
                // <p class='post_author text-muted' v-text='p.author.replace(/\//g," / ")+ " " + p.established_time.split(" ")[0]'> </p>
      .row.post_wait
        .col-sm-12
          h3.text-center(v-show="!(filter_cata=='') && filtered_post.length==0") 相關報導即將上線
      // 瀏覽單一類別
      .row(v-for='fp in filtered_post_three', v-if="!(filter_cata=='')")
        .col-sm-4(v-for='p in fp')
          router-link.postbox(:to="'/post/n/'+(p.ori_title?p.ori_title:p.title)")
            .topimg(:style='css_top_img(p)')
              h3.company_name(v-html='p.name_cht')
            h3.post_title(v-html='"【"+p.name_short+"】"+p.title')
            p.post_para(v-html='(p.description+"").substr(0,70)+"..."')
            // <p class='post_author text-muted' v-text='p.author.replace(/\//g," / ")+ " " + p.established_time.split(" ")[0]'> </p>
    div(v-else='')
      h2 文章載入中...

</template>

<script>
    var temp={
      title: " ",
      authos: " ",
      established_time: " ",
      cover: " ",
      author: " ",
      tag: "temp"
    };
    export default {
        props: {
          catalist:{
            default(){
              return []
            }
          },
          posts:{
            default(){
              return [temp,temp,temp]
            } 
          },
          init_filter_cata: String
          // filter_cata:{
          //   default: ""
          // }
        },
        data: function (){
            return {
                loading: true,
                filter: "",
                filter_cata: ""
            }
        }
        ,
        mounted() {
          if (this.init_filter_cata){
            this.filter_cata=this.init_filter_cata
          }
            console.log('Postbox mounted.');
            this.loading=false;
            // this.filter_cata=window.location.hash.slice(1) ;

            var vobj=this;
            // window.onhashchange = function(){
            //   vobj.filter_cata=window.location.hash.slice(1) ;
            //   $("html,body").animate({scrollTop: $(".cata_title").offset().top-100},'fast');

            // }

            // }else{
              
            //   var vobj=this;
            //   this.$http.get('http://build.zashare.org/api/post/all').then(function(res){
            //       vobj.posts=res.body;
            //       vobj.loading=false;
            //       // console.log(vobj.posts);
            //   });
            // }
        },
        methods: {
            css_top_img: function(post){
                // console.log(post.cover);
                return {"background-image":"url("+post.cover.trim().replace(" ","%20")+")"};
            },
            set_filter: function(filter){
              this.filter=filter;
            },
            set_cata: function(cata){
              this.filter_cata=cata;
              $("html, body").animate({ scrollTop: $($(".blog_posts_area")[0]).offset().top });
            },
            get_cata_name: function(tag){
              var result="";
              this.catalist.forEach(function(obj){
                if (obj.tag==tag){
                  result=obj.name;
                }
              })
              return result;
            },
            limit_tag: function(posts,num){
              var npost=[];
              var catanum={};

              //過濾每個類別留下三個
              posts.forEach(function(obj,index){
                
                if (typeof catanum[obj.tag]=='undefined'){
                  catanum[obj.tag]=0;
                }
                if (catanum[obj.tag]<num){
                  // console.log(obj.tag+catanum[obj.tag]);
                  catanum[obj.tag]++;
                  npost.push(obj);
                }
                
              });

              return npost;
            },
            limit_tag_split: function(posts,num){
              var npost={};
              var catanum={};

              //過濾每個類別留下三個
              posts.forEach(function(obj,index){
                
                if (typeof catanum[obj.tag]=='undefined'){
                  catanum[obj.tag]=0;
                  npost[obj.tag]=[];
                }
                if (catanum[obj.tag]<num){
                  // console.log(obj.tag+catanum[obj.tag]);
                  catanum[obj.tag]++;
                  npost[obj.tag].push(obj);
                }
                
              });
              // console.log(npost);
              return npost;
            },
            highlight_post(post){
              if (this.filter.trim()=="") return post;
              var npost = JSON.parse(JSON.stringify(post));
              console.log(npost);
              npost.ori_title=npost.title;

              var mt1 = (npost.name_short+"").match(new RegExp(this.filter,'i'));
              if (mt1)
              npost.name_short = (npost.name_short+"").replace( new RegExp(this.filter,'i'),"<span style='background-color:#f24;color: white;'>"+mt1[0]+"</span>");


              
              var mt2 = (npost.title+"").match(new RegExp(this.filter,'i'));
              if (mt2)
              npost.title = (npost.title+"").replace( new RegExp(this.filter,'i'),"<span style='background-color:#f24;color: white;'>"+mt2[0]+"</span>");

              
              var mt3 = (npost.description+"").match(new RegExp(this.filter,'i'));
              if (mt3)
              npost.description = (npost.description+"").replace( new RegExp(this.filter,'i'),"<span style='background-color:#f24;color: white;'>"+mt3[0]+"</span>");
              return npost;
            }
        },
        computed: {
          filtered_post: function(){
            //if no filter return original posts
            if (this.filter=="" && this.filter_cata=="") return this.posts;

            //else apply filter
            var npost=[];
            var vobj=this;
            this.posts.forEach(function(obj,index){
              if (obj.title.toLowerCase().indexOf(vobj.filter.toLowerCase())!=-1 ||
                  obj.description.toLowerCase().indexOf(vobj.filter.toLowerCase())!=-1 ||
                  obj.name_short.toLowerCase().indexOf(vobj.filter.toLowerCase())!=-1 
                   ){
                if (vobj.filter_cata=='' || obj.tag==vobj.filter_cata){
                  npost.push(vobj.highlight_post(obj));
                }
              }
            });
            return npost;
          },
          filtered_post_three: function(){
            var stack_len = this.filtered_post.length;
            var result=[];
            for(var i=0;i<stack_len;i++){
              if (!result[parseInt(i/3)]){
                result[parseInt(i/3)] = [];
              }
              result[parseInt(i/3)].push(this.filtered_post[i]);
            }
            console.log(result);
            return result;
            
          }

        }
    }
</script>

<style scoped lang=sass>


</style>