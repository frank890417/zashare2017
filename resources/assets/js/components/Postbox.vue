<!-- 這邊是首頁的文章顯示區 -->
<template>
  <div class="container" v-if='posts.length>0' :class="loading?'loading':''">
    <div class="row">
      <!-- 搜尋 -->
      <div class="col-sm-12" >
        <div class="col-sm-12">
          <div class="form-group" style='position: relative'>
            <i class="fa fa-search" style='position: absolute;top: 10px;left: 12px;'></i>
            <input style='width: 100%;padding: 5px 10px;border-radius: 5px;border:none;border:solid #aaa 1px;padding-left: 30px' type="text" placeholder=" 搜尋標題、內文、類別" v-model='filter' id='searchinput'>
          </div>
        </div>
      </div>

      <!-- 文章區域  使用vue.js渲染 -->
      <div class="col-sm-12" >
          <!-- 類別標題 -->
          <h2 class="cata_title" v-if="!(filter_cata=='')">{{get_cata_name(filter_cata)}} <div class='cancelbtn' @click="set_cata('')"></div></h2>
          <br>

          <!-- 類別 三篇文章 -->
          <div v-for="cata in catalist" v-show="(filter_cata=='') && (limit_tag_split(filtered_post,3)[cata.tag])">
            <div class="col-sm-12">
              <h2 class='cata_title'>{{cata.name}}
                <div class="more_btn"  @click="set_cata(cata.tag)" >More</div>
              </h2>
              <br>
            </div>

            <!-- 類別三篇文章 -->
            <div class="row">
              <div class="col-sm-4" v-for='(p,id) in limit_tag_split(filtered_post,3)[cata.tag]' >
                <a class="postbox" :href="'post/'+p.id">
                  <div class="topimg" :style='css_top_img(p)' >
                      <h3 class='company_name' v-html='p.name_cht'></h3>
                  </div>
                  <h3 class='post_title' v-html='"【"+p.name_short+"】"+p.title'></h3>
                  <p class='post_para' v-html='(p.description+"").substr(0,70)+"..."'></p>
                  <!-- <p class='post_author text-muted' v-text='p.author.replace(/\//g," / ")+ " " + p.established_time.split(" ")[0]'> </p> -->
                </a>
              </div>
            </div>

          </div>
      </div>

    </div>

    <div class="row post_wait" >
      <div class="col-sm-12">
        <h3 class="text-center" v-show="!(filter_cata=='') && filtered_post.length==0">相關報導即將上線</h3>
      </div>
    </div>
    

    <!-- 瀏覽單一類別 -->
    <div class="row" v-for='fp in filtered_post_three' v-if="!(filter_cata=='')">
      <div class="col-sm-4" v-for='p in fp'>
        <a class="postbox" :href="'post/'+p.id">
            <div class="topimg" :style='css_top_img(p)' >
                <h3 class='company_name' v-html='p.name_cht'></h3>
            </div>
            <h3 class='post_title' v-html='"【"+p.name_short+"】"+p.title'></h3>
            <p class='post_para' v-html='(p.description+"").substr(0,70)+"..."'></p>
            <!-- <p class='post_author text-muted' v-text='p.author.replace(/\//g," / ")+ " " + p.established_time.split(" ")[0]'> </p> -->
        </a>
      </div>
    </div>
</div>
<div v-else>
  <h2>文章載入中...</h2>
</div>

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
    module.exports={
        data: function (){
            return {
                posts: [temp,temp,temp],
                loading: true,
                catalist: [],
                filter: "",
                filter_cata: ""
            }
        }
        ,
        mounted() {
            console.log('Postbox mounted.');
            this.catalist=window.data_storage.catalist;

            // if (window.data_storage.posts){
            this.posts=window.data_storage.posts;
            this.loading=false;
            this.filter_cata=window.location.hash.slice(1) ;

            var vobj=this;
            window.onhashchange = function(){
              vobj.filter_cata=window.location.hash.slice(1) ;
              $("html,body").animate({scrollTop: $(".cata_title").offset().top-100},'fast');

            }

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
              $("html, body").animate({ scrollTop: 0 }, "fast");
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
              var npost = JSON.parse(JSON.stringify(post));
              console.log(npost);
              npost.name_short = (npost.name_short+"").replace( new RegExp(this.filter,'g'),"<span style='background-color:#f24;color: white;'>"+this.filter+"</span>");
              npost.title = (npost.title+"").replace( new RegExp(this.filter,'g'),"<span style='background-color:#f24;color: white;'>"+this.filter+"</span>");
              npost.description = (npost.description+"").replace( new RegExp(this.filter,'g'),"<span style='background-color:#f24;color: white;'>"+this.filter+"</span>");
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
              if (obj.title.indexOf(vobj.filter)!=-1 ||
                  obj.description.indexOf(vobj.filter)!=-1 ||
                  obj.name_cht.indexOf(vobj.filter)!=-1 
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
$color_red: #EE3441;
.list-group{
  border-left: solid 3px $color_red;
  .list-group-item{
    height: 50px;
    border: none;
    &.active{
      /*&:before{
        content: "";
        display: block;
        width: 10px;
        height: 10px;
        background-color: $color_red;
        position: absolute;
        left: -10px;
        top: 50%;
        border-radius: 50%;
        transform: translate(0,-50%);
      }*/
    }
  }
}

.cancelbtn{
  width: 30px;
  height: 30px;
  display: inline-block;
  position: relative;
  vertical-align: middle;
  /*border: none;*/
  cursor: pointer;
  margin-top: -5px;
  &:hover{
    background-color: transparent;
    &:before , &:after{
      width: 85%;
    }
    &:before {
      transform: translate(-50%,-50%) rotate(135deg);
      
    }
    &:after {
      transform: translate(-50%,-50%) rotate(45deg);

    }
  }
  &:before , &:after {
    content: "";
    display: block;
    width: 80%;
    height: 2px;
    transition: 0.5s;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    background-color: $color_red;
  }
  &:before{
    transform: translate(-50%,-50%) rotate(45deg);
    /*animation: rr 1s both;*/
  }
  &:after{
    transform: translate(-50%,-50%) rotate(-45deg);
    /*animation: ll 1s both;*/
  }

}

.cata_title{
  border-bottom: solid 1px $color_red;
  padding-left: 20px;
  margin-bottom: 10px;
  padding-bottom: 8px;
  position: relative;

  @media screen and (max-width: 800px){
    margin-bottom: 50px;
    margin-top: 30px;
  }
  &:before{
    content: "";
    display: block;
    position: absolute;
    bottom: 0px;
    left: 2px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 5px 6px 5px;
    border-color: transparent transparent $color_red transparent;
  }

  .more_btn{
    font-size: 12px;
    float: right;
    padding: 5px 12px;
    background-color: $color_red;
    color: white;
    margin-top: 12px;
    cursor: pointer;
    font-weight: 300;
    letter-spacing: 2px;

  }

}

.loading .postbox{
  .post_title,p,.topimg{
    background-color: #ddd;
  }
  .post_title{
    min-height: 70px;
    width: 100%;

  }
}

.postbox{

    text-decoration: none;
    color: black;
    min-height: 360px;
    display: block;
    padding: 10px;
    margin-bottom: 40px;

    @media screen and (max-width: 800px){
      margin-bottom: 40px;
      min-height: 200px;
    }

    .postbox


    *{
      transition-duration: 0.5s;
    }

    &:hover,&:focus,.topimg:focus {
    .company_name{
      color: white;
      border-left-color: white;
      border-right-color: white;
    }
    .topimg{
      /*background-size: 110% auto;*/
        &:before{
            background-color: rgba(#EE3441,0.8);
        }
    }
  }

  .post_title{
    min-height: 60px;
    font-weight: 900;
    /*letter-spacing: 0.5px;*/
    color: #333;
    /*font-size: 1.5em;*/
    line-height: 1.5em;
  }
  .post_author{
    /*font-size: 0.7em;*/
  }

}

.company_name{
  color: transparent;
  position: absolute;
  width: 70%;
  left: 50%;
  top: 50%;
  text-align: center;
  transform: translate(-50%,-50%);
  z-index: 2;
  transition: 0.5s,border-color 0.5s 0.2s,padding 0.5s 0.2s;
  margin: 0;
  padding: 0px 5px;
  line-height: 30px;
  user-select: none;

  border-left: solid 2px transparent;
  border-right: solid 2px transparent;

}
.topimg{
  width: 100%;
  background-size: 100% auto;
  background-position: center;
  transition: 0.5s;
  position: relative;
  padding-bottom: 55%;
  &:before{
    content: "";
    display: block;
    background-color: rgba(black,0);
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    transition: 0.5s;

  }
}


</style>