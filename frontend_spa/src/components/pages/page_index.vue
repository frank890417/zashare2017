<template lang="pug">
.page.right.page-index.animated.fadeIn
  .container
    .row-cover.animated.fadeIn()
      .slick
        router-link.slide(v-for="slide in slides", :to="`/news/${currentSlide.id}`") 
          .cover(:style="bgcss(slide.cover)")
          //- .cover
          //-   .slice.s1(:style="bgcss(slide.cover)")
          //-   .slice.s2(:style="bgcss(slide.cover)")
          //-   .slice.s3(:style="bgcss(slide.cover)")
          //-   .slice.s4(:style="bgcss(slide.cover)")
          //-   .slice.s5(:style="bgcss(slide.cover)")

    .row-news
      router-link.upCircle.animated.zoomIn(
        to="/expo",
        v-if="$route.meta.type=='theme' || $route.path=='/'",
        :class="{downCircle: $route.path=='/' }"
      ) 
      .row
        router-link.btn-news.nostyle.col-sm-3.col-left(to="/news")
          h2 News
          h4 最新消息
          .btn-more
            span more
            span.arrowRight
          
        .col-sm-9.col-right(:key="currentSlideId")
          h3.ovh
            .animated.slideInUp {{ currentSlide.title }}
          //-     .num {{ "0"+currentSlideId }}
          div.ovh.content-container
            p.animated.slideInUp.content-slide(v-html="mobile?(currentSlide.description.slice(0,70)+'...'):currentSlide.description")
          br
          router-link.nostyle.btn-more.fadeIn.animated(:to="`/news/${currentSlide.id}`") 閱讀更多
          
          .btns
            .prev(@click="prev")
              i.fa.fa-chevron-left
            .next(@click="next")
              i.fa.fa-chevron-right
        .black_area
</template>

<script>

import {mapState,mapMutations} from 'vuex'
import $ from 'jquery'
import slick from 'slick-carousel'
export default {
  data() {
      return {
          slickOptions: {
              slidesToShow: 1,
              arrows: false,
              autoplay: true,
              dots: true
              // Any other options that can be got from plugin documentation
          },
          // slides: [
            // {
            //   title: "謝謝五萬名師生的入學支持，讓台灣創新教育的溫柔革命得...",
            //   description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
            //   cover: "http://service.zashare.org/img/expo/2017/2.jpg"
            // },{
            //   title: "讓台灣創新教育的溫柔革命得...",
            //   description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
            //   cover: "http://service.zashare.org/img/expo/2017/3.jpg"
            // },{
            //   title: "謝謝五萬名師生的入學支持，",
            //   description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
            //   cover: "http://service.zashare.org/img/expo/2017/4.jpg"
            // },{
            //   title: "五萬名師生的入學支持讓台灣創新教育的溫柔革命得...",
            //   description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
            //   cover: "http://service.zashare.org/img/expo/2017/5.jpg"
            // }
          // ],
          currentSlideId: 0,
          slickEl: null
      };
  },
  methods: {
      next() {
          // console.log(this.slickEl)
          // console.log($(".slick"))
          $(".slick").slick("next");
      },

      prev() {
          $(".slick").slick("prev");
      },

      // reInit() {
      //     // Helpful if you have to deal with v-for to update dynamic lists
      //     this.$nextTick(() => {
      //         $(".slick").slick.reSlick();
      //     });
      // },
      
  },
  mounted(){
    
     if (this.slides.length>0){
        setTimeout(()=>{
          this.$nextTick(() => {
            this.slickEl=$(".slick").slick(
              this.slickOptions
            )
            let _this=this
            $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
              console.log(nextSlide)
              _this.currentSlideId=nextSlide
            })

          });
        },0)
      }else{
        setTimeout(()=>{
          this.$nextTick(() => {
            this.slickEl=$(".slick").slick(
              this.slickOptions
            )
            let _this=this
            $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
              console.log(nextSlide)
              _this.currentSlideId=nextSlide
            })

          });
        },1500)
      }
    
// $(".slider").slick({
    // $(this.$el).children(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
    //   console.log(nextSlide);
      
    // });
 
  },
  computed: {
    ...mapState({
      news: state=>state.post.news,
      scrollTop: state=>state.scroll.position,
      mobile: state=>state.mobile
    }),
    slides(){
      return this.news
    },
    currentSlide(){
      return this.slides[this.currentSlideId]
    }
  },
  watch:{
    scrollTop(){
      if (this.scrollTop>window.innerHeight-$(".page-index").height()+50){
        this.$router.push("/expo")
      }
    },
    slides(){
      // if (this.slides.length>0){
      //   setTimeout(()=>{
      //     this.$nextTick(() => {
      //       _this.slickEl=$(".slick").slick(
      //         this.slickOptions
      //       )
      //       let _this=this
      //       $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
      //         console.log(nextSlide)
      //         _this.currentSlideId=nextSlide
      //       })

      //     });
      //   },200)
      // }
    }
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"


@keyframes flexIn
  0%
    flex: 0
  100%
    flex: 228px
.page-index
  // padding-right: 350px
  width: 100vw
  height: 100%
  box-sizing: border-box
  
  .slick-list,.slick-track ,.slick-slide
    position: relative
    height: 100%
  .slick-slide div
    height: 100%

  +rwd_md
    padding-right: 0
    .row-bottom
      margin-left: 0
      display: none
  .container-fluid
    width: 100%
    height: 100%
    display: flex
    flex-direction: column
  .row-cover
    flex: 400px
    overflow: hidden
    background-color: #ddd
    .slick
      height: 100%
    +rwd_md
      flex: 350px
      flex-grow: 0
  .btn-news
    &:hover
      background-color: #eee
  .row-news
    // animation: flexIn 1s both
    transition: 0.5s
    flex: 228px
    flex-grow: 0
    text-align: left
    position: relative
    .content-slide
      line-height: 2em
      height: calc(2em * 2)
      +rwd_md
        height: calc(2em * 3.5)

    .content-container
      line-height: 2em
      height: calc(2em * 2)
      margin-top: 20px
      +rwd_md
        height: calc(2em * 3.5)
    .upCircle
      position: absolute
      right: 20px
      top: -35px
      display: none
      +rwd_md
        display: flex
    // height: 200px 
    // background-color: #fafafa
    h3
      font-size: 24px
    .col-left
      position: relative
      top: -60px
      margin-left: -15px

      padding-left: 50px
      padding-right: 50px
      height: calc(100% + 60px)
      background-color: #fff
      display: flex
      flex-direction: column
      justify-content: space-between
      +rwd_md
        display: none
      h2
        margin-bottom: 0
      h4
        margin-top: 0
        // font-weight: 400
      .btn-more
        // margin-top: 60px
        font-weight: 800
        display: flex
        align-items: center
        transform: translateY(60px)
        .arrowRight
          display: block
          height: 2px
          width: 100%
          background-color: #333
          position: relative
          margin-left: 40px
          &:before,&:after
            content: ""
            display: block
            width: 10px
            height: 2px
            background-color: inherit
            position: absolute
            transform-origin: right center
            transform: rotate(45deg)
            right: 0
          &:after
            transform: rotate(-45deg)
          &.reverse
            transform-origin: center center
            transform: rotate(180deg)
      .black_area
        position: absolute
        top: 0
        right: 0
        background-color: black
        height: 100
        width: 50px
        display: none
        +rwd_md
          display: block
    .col-right
      // border-left: solid #ddd 2px

      padding-left: 60px

      .num
        float: right
      h3
        margin-top: 10px
        margin-bottom: 10px
      p
        margin-top: 0
        margin-bottom: 0

      .btn-more
        font-size: 14px
        color: rgba(black,0.5)
        margin-top: -20px

      // background-color: #fafafa
      &:before
        content: ""
        display: block
        position: absolute
        left: 0
        width: 2px
        background-color: #ddd
        height: 236px
        top: -30px

    &>*
      padding: 30px
      box-sizing: border-box
    h2
      font-size: 40px
      // font-weight: bold
    +rwd_md

      .col-right
        border-left: none
        padding-left: 20px
        padding-top: 10px
        &:before
          display: none
  .slide
    width: 100%
    height: 100%
    position: relative
    // height: 700px
    +rwd_md
      height: 100%

  
  .slick-dots
    position: absolute
    right: 20px
    bottom: 20px
    left: initial
    text-align: right
    justify-content: flex-end


  .cover
    width: 100%
    height: 100%
    // background-image: url("http://service.zashare.org/img/2017/expo_2017/event/%E5%AF%A6%E9%A9%97%E6%95%99%E8%82%B2%E9%A4%A8.jpg")
    background-size: cover
    background-position: center center
    position: relative
    +rwd_md
      background-size: auto 100%
    display: flex
    flex-direction: column
    .slice
      flex: 1
      $count: 5
      +trans
    
      @for $i from 1 through $count
        &.s#{$i}
          transition-duration: #{0.5+random(1)}s
          // background-size: auto 500%
          background-position: #{ 50 + random(500)-250 }% #{100%/$count*$i}
  .slick-active .slice
    $count: 5
    @for $i from 1 through $count
      &.s#{$i}
        background-position: 50% #{100%/$count*$i}
  
.btns
  position: absolute
  right: 0px
  bottom: 0px
  display: flex

  &>*
    width: 25px
    height: 25px
    border-radius: 50%
    background-color: black
    margin: 20px
    margin-bottom: 10px
    cursor: pointer
    color: white
    display: flex
    font-size: 12px
    justify-content: center
    align-items: center
    &:hover
      background-color: #444
  +rwd_md
    position: fixed
    right: 20px
    bottom: 20px
  .prev
  .next
    // background-color: #aaa
    // height: 650px

</style>
