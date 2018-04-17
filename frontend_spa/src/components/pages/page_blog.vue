<template lang="pug">
.page.right.page-blog.animated.fadeIn
  section.container-fluid.container-slider
    .container
      .row
        .col-sm-12(v-if="slides.length")
          .nostyle.row.row-head-news(v-if="$route.meta.type!='news'")
            .col-sm-8.col-cover
              .slick
                router-link.slide(v-for="slide in slides",
                                  :to="postTarget(slides[currentSlideId])") 
                  .cover(:style="bgcss(slide.cover)")
              //- .cover(:style="bgcss('http://via.placeholder.com/800x600')")

            router-link.nostyle.col-sm-4.col-info(
              v-if="slides[currentSlideId]", :key="currentSlideId",
              :to="postTarget(slides[currentSlideId])")
              //- .tag ZA COURSE
              .tagwrap
                .tag(v-if="$route.meta.type=='expo'") {{ slides[currentSlideId].year }}
              .ovh(v-if="slides[currentSlideId].company")
                h3.slide-company.animated.slideInUp {{ slides[currentSlideId].company.name_cht }}
              .ovh
                h2.slide-title {{ slides[currentSlideId].title }}
              //- hr
              p(v-if="$route.meta.type!='expo'") {{ strip_tags(slides[currentSlideId].short_description).slice(0,60) }}...
              p(v-else , v-html="slides[currentSlideId].short_description")
              //- router-link.btn.nostyle(:to="`/news/${slides[currentSlideId].id}`") 閱讀更多
          .nostype.row.row-index-news(v-else)
            .col-sm-12.col-cover
              .slick
                router-link.slide(v-for="slide in slides",
                                  :to="postTarget(slides[currentSlideId])") 
                  .cover.cover_21(:style="bgcss(slide.cover)")
            .col-sm-12.col-info
              h2.slide-title {{ slides[currentSlideId].title }}
  section.container.container-posts
    .container
      .row
        .col-sm-12
          h4.cata-title 文章分類
          ul.catas
            //- li(:class="{active: nowCata==''}", 
            //-   @click="nowCata=''") ALL
            li(v-for="cata in useCatas",
              :class="{active: nowCata==cata.value}", 
              @click="nowCata=cata.value") {{cata.label}}
      .row
        .col-xl-4.col-lg-6.col-md-6.col-sm-12.col-xs-12(v-for="post in use_posts").col-news
          newsbox(:post='post', 
                :target='postTarget(post)',
                :tag=" ((post.cata && post.cata.year)!='news')?post.year:(post.cata && post.cata.name)",
                :hideTag="$route.meta.type=='news'")
      .row.lazy-detector
        //- router-link.news_box.animated.fadeIn(to="/news/test")
        //-   .row
        //-     .col-sm-12.col-cover
        //-       .cover(:style="bgcss(post.cover)")
        //-         .tag ZA EXPO
        //-     .col-sm-12.col-info
        //-       h3 {{post.title}}
              //- p {{ post.description.slice(0,50) }}
</template>

<script>
import axios from 'axios'
import $ from 'jquery'
import slick from 'slick-carousel'
import {mapState } from 'vuex'
export default {
  data(){
    return {
      nowCata: "",
      // posts: [],
        slickOptions: {
            slidesToShow: 1,
            arrows: false,
            autoplay: true,
            dots: true
            // Any other options that can be got from plugin documentation
        },
      currentSlideId: 0,
      showCount: 6,
      newsCatas: [
        {label: "全部", value: ""},
        {label: "展覽公告", value: "expo"},
        {label: "活動公告", value: "activity"},
        {label: "一般公告", value: "normal"},
        {label: "媒體報導", value: "media"},
      ]
      // newsCatas: ["ZA COURSE","ZA BASE","ZA EXPO"]
    }
  },
  computed: {
    ...mapState({
      posts: state=>state.post.posts,
      scrollY: state=>state.scroll.position,
      news: state=>state.post.news,
      expos: state=>state.expos
    }),
    useCatas(){
      if (this.$route.meta.type=="expo"){
        let catas = this.posts
                          .map(p=>parseInt(p.year) )
                          .sort((a,b)=>(a-b)).filter((y,id,arr)=>arr.indexOf(y)==id )
                          .map(year=>({label: year,value: year}))
        catas.unshift({
          label: "全部",value: ""
        })
        return catas
      }
      if (this.$route.meta.type=="news"){
        return this.newsCatas
      }
    },
    use_source(){
      let use_source = this.posts
      use_source = use_source.filter(o=>o.status=="published")
      if (this.$route.meta.type=="expo"){
        use_source = use_source.slice().sort((a,b)=> -(parseInt(a.year)-parseInt(b.year)) )
        return use_source
      }
      
                            //  .slice().sort(o=>o.stick_top_index)
      if (this.$route.meta.type=="news"){
        use_source = this.news.filter(o=>o.status=="published")
      }
      return use_source
    },
    //Filtered by cata
    filtered_posts(){
      return this.use_source.filter(post=>this.nowCata=="" || (post.cata && post.cata.name==this.nowCata) || (post.year==this.nowCata) )
    },
    //Limit filtered posts by count
    use_posts(){
      // .filter(post=>!post.stick_top_index)
      return this.filtered_posts.slice(0,this.showCount)
    },
    //Genertae slide data
    slides(){
      if (this.$route.meta.type=="expo"){
        return this.expos.map(expo=>({
          ...expo,
          targetType: "expoyear",
          short_description: "時間："+expo.time+"<br>地點："+expo.place+"<hr><p>"+expo.feature+"</p>"
        }))

      }
      return this.use_source.filter(post=>post.stick_top_index)
    }

  },
  methods:{
    postTarget(post){
      if (post.targetType=="expoyear"){
        return `/expo/`+post.year
      }
      if (this.$route.meta.type=="expo"){
        return `/expo/${this.$route.params.year}/blog/${post.id}`
      }

      if (this.$route.meta.type=="news"){
        return `/news/${post.id}`
      }
    }
  },
  watch: {
    slides(){
      let _this = this
      // console.log("slide change")
      if (this.slides.length>0){
        setTimeout(()=>{
          _this.$nextTick(() => {
            $(".slick").slick(
              this.slickOptions
            )
            let _this=this
            $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
              // console.log(nextSlide)
              _this.currentSlideId=nextSlide
            })

          });

        },100)
      }
    },
    scrollY(){
      let detectorPos = $(".lazy-detector").offset().top
      let scrollPos = this.scrollY+$(window).height()*1.5
      // console.log(detectorPos,scrollPos)
      if (detectorPos<scrollPos ){
        this.showCount+=3
      }
    }
  },
  mounted(){

    //detect lazt scrollng show more post
    let _this = this

    $("#app").scroll(function(evt){
      // console.log(evt)
      let detectorPos = $(".lazy-detector").offset().top
      let scrollPos =  $("#app").scrollTop()+$(window).height()*1.5
      // console.log(detectorPos,scrollPos)
      if (detectorPos<scrollPos ){
        _this.showCount+=3
      }
    })
    setTimeout(()=>{
      _this.$nextTick(() => {
        $(".slick").slick(
          this.slickOptions
        )
        let _this=this
        $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
          // console.log(nextSlide)
          _this.currentSlideId=nextSlide
        })

      });

    },200)

     
  }
}
</script>


<style lang="sass">
@import "../../assets/_mixins.sass"

.page-blog
  padding-top: 60px
  text-align: left
  background-color: #f2f2f2
  +rwd_md
    padding-top: 0
    padding-top: 60px
    .row
      margin-left: -15px
      margin-right: -15px
    .col-sm-8
      padding-left: 0
      padding-right: 0
  .container-slider
    // background-color: white
    padding-bottom: 30px
    +rwd_md
      border-bottom: solid 1px #ccc
      background-color: #fff
  .slide-company
    margin-bottom: 0
  .slide-title
    font-size: 24px
    font-weight: bold
    margin-bottom: 0
    // border-bottom: solid 1px rgba(black,0.3)
    padding-bottom: 20px
  
  .cover
    min-height: 240px
    background-size: cover
    background-position: center center
    position: relative
    // margin-left: -15px
    // margin-right: -15px
    &.cover_21
      width: 100%
      height: 0
      padding-bottom: 50%
      background-color: #eee
  .tag
    position: absolute
    left: 0
    top: 0
    background-color: black
    color: white
    padding: 5px 10px
    font-weight: bold
  .col-news
    padding: 20px
    box-sizing: border-box
    position: relative
    .row
      position: relative
      margin: -15px

  a.btn
    display: inline-block
    

.row-head-news
  .cover
    height: 400px
    +rwd_md
      height: 40vh
  .col-cover
    padding-right: 0
  .col-info
    flex-direction: column
    display: flex
    justify-content: center
    background-color: #fff
    .tagwrap
      .tag
        // display: block
        position: relative
        display: inline-block
        margin-bottom: 20px
        width: auto

    h2
      min-height: 2.5em
    h3
      min-height: 1.5em
    p
      min-height: 5em
    .btn
      display: inline-block
      width: auto
    // align-items: flex-end
.row-index-news
  .col-info
    padding-left: 15px
    padding-right: 15px
    h2.slide-title
      width: 100%
      background-color: #ddd
      text-align: center
      padding: 20px 
      margin-top: -10px
    
.cata-title
  margin-top: 50px
.catas
  display: flex
  margin: 0
  list-style: none
  margin-bottom: 40px
  padding: 0


  li
    flex: 1
    border-top: solid 5px rgba(black,0.2)
    display: flex
    justify-content: center
    align-items: center 
    padding-top: 10px
    font-weight: bold
    cursor: pointer
    +trans
    
    &.active 
      border-top: solid 10px #333

  +rwd_md
    position: fixed
    top: 60px
    width: 100vw
    left: 0
    background-color: #fff
    font-size: 14px
    z-index: 1
    li
      border-top: none
      border-bottom: solid 3px rgba(black,0.2)
      padding-bottom: 8px
      +trans
      &.active 
        border-top: none
        border-bottom: solid 5px #333


</style>
