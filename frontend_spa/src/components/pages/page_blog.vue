<template lang="pug">
.page.right.page-blog.animated.fadeIn
  .container
    .row
      .col-sm-12
        //- h2 News
    .row
      .col-sm-12(v-if="slides.length")
        .nostyle.row.row-head-news(:to="postTarget(slides[currentSlideId])")
          .col-sm-8
            .slick
              .slide(v-for="slide in slides") 
                .cover(:style="bgcss(slide.cover)")
            //- .cover(:style="bgcss('http://via.placeholder.com/800x600')")

          router-link.nostyle.col-sm-4.col-info(
            v-if="slides[currentSlideId]", :key="currentSlideId",
            :to="postTarget(slides[currentSlideId])")
            //- .tag ZA COURSE
            .ovh(v-if="slides[currentSlideId].company")
              h3.slide-company.animated.slideInUp {{ slides[currentSlideId].company.name_cht }}
            .ovh
              h2.slide-title {{ slides[currentSlideId].title }}
            hr
            p {{ strip_tags(slides[currentSlideId].short_description).slice(0,60) }}...
            //- router-link.btn.nostyle(:to="`/news/${slides[currentSlideId].id}`") 閱讀更多
    .row
      .col-sm-12(v-if="$route.meta.type=='news'")
        h4.cata-title 文章分類
        ul.catas
          li(:class="{active: nowCata==''}", 
             @click="nowCata=''") ALL
          li(:class="{active: nowCata=='course'}", 
             @click="nowCata='course'") ZA COURSE
          li(:class="{active: nowCata=='base'}", 
             @click="nowCata='base'") ZA BASE
          li(:class="{active: nowCata=='expo'}", 
             @click="nowCata='expo'") ZA EXPO
      div(v-else)
        br
        br
    .row
      .col-xl-4.col-lg-6.col-md-6.col-sm-12.col-xs-12(v-for="post in use_posts").col-news
        newsbox(:post='post', :target='postTarget(post)',:tag="(post.cata && post.cata.name) || ''")
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
      showCount: 6
    }
  },
  computed: {
    ...mapState({
      posts: state=>state.post.posts,
      scrollY: state=>state.scroll.position,
      news: state=>state.post.news
    }),
    use_source(){
      let use_source = []
      
      if (this.$route.params.year){
        use_source = this.posts.filter(o=>o.year==this.$route.params.year)
      }
      use_source = use_source.filter(o=>o.status=="published")
                             .slice().sort(o=>o.stick_top_index)
      if (this.$route.meta.type=="news"){
        use_source = this.news.filter(o=>o.status=="published")
      }
      return use_source
    },
    use_posts(){
      // .filter(post=>!post.stick_top_index)
      return this.use_source.slice(0,this.showCount)
    },
    slides(){
      return this.use_source.filter(post=>post.stick_top_index).slice(0,3)
    }

  },
  methods:{
    postTarget(post){
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
      console.log("slide change")
      if (this.slides.length>0){
        setTimeout(()=>{
          _this.$nextTick(() => {
            $(".slick").slick(
              this.slickOptions
            )
            let _this=this
            $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
              console.log(nextSlide)
              _this.currentSlideId=nextSlide
            })

          });

        },300)
      }
    },
    scrollY(){
      let detectorPos = $(".lazy-detector").offset().top
      let scrollPos = this.scrollY+$(window).height()*1.5
      console.log(detectorPos,scrollPos)
      if (detectorPos<scrollPos ){
        this.showCount+=3
      }
    }
  },
  mounted(){
    let _this = this
    setTimeout(()=>{
      _this.$nextTick(() => {
        $(".slick").slick(
          this.slickOptions
        )
        let _this=this
        $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
          console.log(nextSlide)
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
  background-color: #fafafa
  background-color: #fafafa
  +rwd_md
    padding-top: 0
    .row
      margin-left: -15px
      margin-right: -15px
    .col-sm-8
      padding-left: 0
      padding-right: 0
  .slide-company
    margin-bottom: 0
  .slide-title
    font-size: 24px
    font-weight: 900
    margin-bottom: 0
    border-bottom: solid 1px rgba(black,0.3)
    padding-bottom: 20px
  .cover
    min-height: 240px
    background-size: cover
    background-position: center center
    position: relative
    // margin-left: -15px
    // margin-right: -15px
  .tag
    position: absolute
    left: 0
    top: 0
    background-color: black
    color: white
    padding: 5px 10px
    font-weight: 900
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
  .col-info
    flex-direction: column
    display: flex
    justify-content: flex-end
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
    font-weight: 900
    cursor: pointer
    
    &.active 
      border-top: solid 10px #333


</style>
