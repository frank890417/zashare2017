<template lang="pug">
.page.right.page-news.animated.slideInRight
  .container
    .row
      .col-sm-12
        //- h2 News
    .row
      .col-sm-12
        .row.row-head-news
          .col-sm-8
            .slick
              .slide(v-for="slide in slides") 
                .cover(:style="bgcss(slide.cover)")
            //- .cover(:style="bgcss('http://via.placeholder.com/800x600')")
          .col-sm-4.col-info
            .tag ZA COURSE
            h3.slide-company {{ slides[currentSlideId].company.name_cht }}
            h2.slide-title {{ slides[currentSlideId].title }}
            hr
            p {{ strip_tags(slides[currentSlideId].content).slice(0,60) }}...
            router-link.btn.nostyle(:to="`/expo/${$route.params.year}/blog/${slides[currentSlideId].id}`") 閱讀更多
    .row
      .col-sm-12
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
    .row
      .col-sm-4(v-for="post in use_posts").col-news
        newsbox(:post='post', :target='`/expo/${$route.params.year}/blog/${post.id}`',tag)
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
            autoplay: true
            // Any other options that can be got from plugin documentation
        },
      currentSlideId: 0
    }
  },
  computed: {
    ...mapState({
      posts: state=>state.post.posts
    }),
    use_posts(){
      let use_source = []
      if (this.$route.params.year){
        use_source = this.posts.filter(o=>o.year==this.$route.params.year)
      }
      use_source = use_source.filter(o=>o.status=="published")
      return use_source.slice(3,15)

    },
    slides(){
      return this.posts.slice(0,3)
    },

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

        },500)
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

.page-news
  padding-top: 60px
  text-align: left
  background-color: #fafafa
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
  .col-info
    flex-direction: column
    display: flex
    justify-content: flex-end

    // align-items: flex-end
.cata-title
  margin-top: 70px
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
