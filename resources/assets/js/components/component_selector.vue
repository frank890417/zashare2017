<!-- 這邊是首頁的文章顯示區 -->
<template>
    <div class="container" v-if='posts.length>0' :class="loading?'loading':''">
        <div class="row">

            <!-- 左設選單 -->
            <div class="col-sm-2">
              <div class="form-group">
                <input class='form-control' type="text" placeholder="搜尋標題、內文、類別" v-model='filter'>
              </div>
              <div class="form-group">
              <ul class="list-group">
                <li :class='["list-group-item",(cata.tag==filter_cata)?"active":""]' v-for="cata in catalist" @click="set_cata(cata.tag)"  style='cursor: pointer'>{{cata.tag}}.{{cata.name}}</li>
              </ul>
              </div>
            </div>

            <!-- 文章區域  使用vue.js渲染 -->
            <div class="col-sm-10">
                <div class="col-sm-12" v-if='filter_cata'>
                  <h2>&nbsp;#{{get_cata_name(filter_cata)}} <span class='btn btn-default' @click="set_cata('')">X</span></h2>
                  <hr>
                </div>
                
                <div class="col-sm-4" v-for='p in filtered_post' >
                    <a class="postbox" :href="'post/'+p.id">
                        <div class="topimg" :style='css_top_img(p)' >
                            <h3 class='company_name' v-text='p.name_cht'></h3>
                        </div>
                        <h3 class='post_title' v-text='p.title'></h3>
                        <p class='post_para' v-html='p.description'></p>
                        <p class='post_author text-muted' v-text='p.author.replace(/\//g," / ")+ " " + p.established_time.split(" ")[0]'> </p>
                    </a>
                </div>
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
  author: " "
};
export default {
    data (){
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
        },
        get_cata_name: function(tag){
          var result="";
          this.catalist.forEach(function(obj){
            if (obj.tag==tag){
              result=obj.name;
            }
          })
          return result;
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
              npost.push(obj);
            }
          }
        });
        return npost;
      }
    }
  }
</script>

<style scoped lang=sass>


.loading .postbox{
  .post_title,p,.topimg{
    background-color: #ddd;
  }
  .post_title{
    height: 2em;
    width: 100%;
  }
}

.postbox{
    text-decoration: none;
    color: black;
    min-height: 450px;
    display: block;
    padding: 5px;

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
            background-color: rgba(black,0.4);
        }
    }
  }

  .post_title{
    min-height: 1.2em;
    font-weight: 900;
  }
  .post_author{
    font-size: 0.7em;
  }
  .post_para{
    text-indent: 2em;
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