<template lang="pug">
.page.right.page-blog
  section.container-fluid.container-slider
    .container
      .row(@click="$ga.event($route.meta.type, 'click', 'banner')")
        .col-sm-12(v-if="slides.length")
          .nostyle.row.row-head-news(v-if="$route.meta.type!='news'")
            .col-sm-8.col-cover
              .slick
                .slide(
                        v-for="slide in slides",
                        :is="postTarget(slide).indexOf('http')!=-1?'a':'router-link'" 
                        :to="postTarget(slide)",
                        :href="postTarget(slide)" ) 
                  .cover(:style="bgcss(slide.cover)")
              //- .cover(:style="bgcss('http://via.placeholder.com/800x600')")

            .nostyle.col-sm-4.col-info(
              v-if="slides[currentSlideId]", :key="currentSlideId",
              :to="postTarget(slides[currentSlideId])",
              :href="postTarget(slides[currentSlideId])")
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
              
              // feature list
              ul.feature-list(v-if="$route.meta.type=='expo'")
                li(v-for="feature in splitNewline(slides[currentSlideId].features)") {{feature}}

              //- router-link.btn.nostyle(:to="`/news/${slides[currentSlideId].id}`") 閱讀更多
          .nostype.row.row-index-news(v-else)
            .col-sm-12.col-cover
              .slick
                .slide(v-for="slide in slides",
                          :to="postTarget(slides[currentSlideId])",
                          :is="postTarget(slide).indexOf('http')!=-1?'a':'router-link'" 
                          :href="postTarget(slides[currentSlideId])" 
                          :target="postTarget(slides[currentSlideId]).indexOf('http')!=-1?'_blank':''") 
                  .cover.cover_21(:style="bgcss(slide.cover)")
            .col-sm-12.col-info-news
              h2.slide-title {{ slides[currentSlideId].title }}

  //所有文章
  section.container.container-posts
    .container
      //分類
      .row
        .col-sm-12
          h4.cata-title {{ $t('page_news.title') }}
          ul.catas
            //- li(:class="{active: nowCata==''}", 
            //-   @click="nowCata=''") ALL
            li(v-for="cata in useCatas",
              :class="{active: nowCata==cata.value}", 
              @click="nowCata=cata.value;$ga.event($route.meta.type, 'cata', cata.label)") {{ $i18n.locale=='en'? (cata.label_eng || cata.label) : cata.label  }}
      .row
        .col-xl-4.col-lg-6.col-md-6.col-sm-12.col-xs-12(v-for="(post,pid) in use_posts").col-news
          newsbox(:post='post', 
                :target='postTarget(post)',
                :tag=" ((post.cata && post.cata.year)!='news')?post.year:(post.cata && post.cata.name)",
                :hideTag="$route.meta.type=='news'",
                :class="'delay-ani-'+(pid % 3)*2",
                :key="post.id")
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
import moment from 'moment'
export default {
  data(){
    return {
      nowCata: this.$route.params.year || "",
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
        {label: "全部", label_eng: "ALL", value: ""},
        {label: "展覽公告", label_eng: "Expos", value: "展覽公告"},
        {label: "活動公告", label_eng: "Activities", value: "活動公告"},
        {label: "一般公告", label_eng: "Others", value: "一般公告"},
        {label: "媒體報導", label_eng: "Report", value: "媒體報導"},
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
                        .sort((a,b)=>-(a-b)).filter((y,id,arr)=>arr.indexOf(y)==id )
                        .map(year=>({label: year,value: year}))

        catas.unshift({
          label: "全部",label_eng: "ALL",value: ""
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
        use_source = use_source.slice()
                    .sort((a,b)=>  (moment(a.established_time).isAfter(b.established_time)?-1:1) + (parseInt(b.year)-parseInt(a.year))*100  )
        return use_source
      }
      
                            //  .slice().sort(o=>o.stick_top_index)
      if (this.$route.meta.type=="news"){
        use_source = this.news.filter(o=>o.status=="published").slice()
                    .sort((a,b)=>  (moment(a.established_time).isAfter(b.established_time)?-1:1))
                      // .sort((a,b)=>new Date(a.established_time)>new Date(b.established_time)?1:-1)
                             
      }
      return use_source
    },
    //Filtered by cata
    filtered_posts(){

      let result = this.use_source.filter(post=>( this.nowCata=="" && (post.cata && post.cata.name)!='媒體報導')
            || (post.cata && post.cata.name==this.nowCata) 
            || (post.year==this.nowCata) )
      return result
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
          short_description: "時間："+this.getDurationText(expo.start_date,expo.end_date)+"<br>地點："+expo.place+"<hr>",
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
        if (post.media_link){
          return post.media_link
        }
        return `/news/${post.id}`
      }
    },
    splitNewline(text){
      return text.split('\n')
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
    },
    nowCata(){
      this.$nextTick(()=>{
        _jf.flush();
      })
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

    },50)

     
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
    // padding-bottom: 30px
    padding-top: 54px
    +rwd_md
      border-bottom: solid 1px #ccc
      background-color: #fff
      .container
        padding-left: 0
        padding-right: 0
    .feature-list
      padding: 0
      list-style: none
      li
        padding-left: 1em
        margin-bottom: 10px
        &:before
          content: '．'
          margin-left: -1em
          // position: absolute
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
    &.cover_21
      width: 100%
      height: 0
      min-height: 0px
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
    +rwd_md
      padding: 15px 30px
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
  .col-info-news
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
  margin-top: 10px


  li
    flex: 1
    border-top: solid 1px rgba(black,0.2)
    color: rgba(black,0.2)
    display: flex
    justify-content: center
    align-items: center 
    padding-top: 10px
    font-weight: bold
    cursor: pointer
    +trans

        
    &.active 
      border-top: solid 10px #333
      color: #333


  +rwd_md
    position: fixed
    top: 60px
    width: 100vw
    left: 0
    background-color: #fff
    font-size: 14px
    z-index: 1

    margin-top: 0
    li
      border-top: none
      // border-bottom: solid 3px rgba(black,0.2)
      padding-bottom: 8px
      border-bbottom: solid 5px rgba(black,0)
      +trans
      &.active 
        border-top: none
        border-bottom: solid 5px #333


</style>
