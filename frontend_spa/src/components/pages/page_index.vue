<template lang="pug">
transition(name="fade")
  .page-index
    .container-fluid
      .row-cover.animated.fadeIn
        .slick
          .slide(v-for="slide in slides") 
            .cover(:style="bgcss(slide.cover)")
      .row-news
        .row
          router-link.nostyle.col-sm-3.col-left(to="/news")
            h2 News
            h4 最新消息
          
            
          .col-sm-9.col-right
            h3.ovh
              .animated.slideInUp {{ currentSlide.title }}
                .num {{ "0"+currentSlideId }}
            p.ovh
              .animated.slideInUp  {{ currentSlide.description }}
            br
            .btn 閱讀更多
            
            .btns
              .prev(@click="prev") <
              .next(@click="next") >
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
              // Any other options that can be got from plugin documentation
          },
          slides: [
            {
              title: "謝謝五萬名師生的入學支持，讓台灣創新教育的溫柔革命得...",
              description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
              cover: "http://zashare.org/img/expo/2017/2.jpg"
            },{
              title: "讓台灣創新教育的溫柔革命得...",
              description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
              cover: "http://zashare.org/img/expo/2017/3.jpg"
            },{
              title: "謝謝五萬名師生的入學支持，",
              description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
              cover: "http://zashare.org/img/expo/2017/4.jpg"
            },{
              title: "五萬名師生的入學支持讓台灣創新教育的溫柔革命得...",
              description: "我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？",
              cover: "http://zashare.org/img/expo/2017/5.jpg"
            }
          ],
          currentSlideId: 0
      };
  },
  methods: {
      next() {
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
    this.$nextTick(() => {
      $(".slick").slick(
        this.slickOptions
      )
      let _this=this
      $(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
        console.log(nextSlide)
        _this.currentSlideId=nextSlide
      })

    });
     
    
// $(".slider").slick({
    // $(this.$el).children(".slick").on('beforeChange', function(event, slick, currentSlide, nextSlide){
    //   console.log(nextSlide);
      
    // });
 
  },
  computed: {
    currentSlide(){
      return this.slides[this.currentSlideId]
    }
  }
}
</script>

<style lang="sass">

@keyframes flexIn
  0%
    flex: 0
  100%
    flex: 1
.page-index
  padding-right: 350px
  width: 100%
  height: 100%
  box-sizing: border-box
  .container-fluid
    width: 100%
    height: 100%
    display: flex
    flex-direction: column
  .row-cover
    flex: 400px
    overflow: hidden
    background-color: #ddd
  .row-news
    animation: flexIn 1s both
    transition: 0.5s
    flex: 1
    text-align: left
    // background-color: #fafafa
    h3
      font-size: 24px
    .col-left
      position: relative
      top: -60px
      margin-left: -15px

      padding-left: 60px
      padding-right: 60px
      height: calc(100% + 60px)
      background-color: #fff

    .col-right
      border-left: solid #ddd 2px
      padding-left: 60px
      .num
        float: right
        
      // background-color: #fafafa

    &>*
      padding: 30px
      box-sizing: border-box
    h2
      font-size: 40px
      font-weight: 900
  .slide
    width: 100%
    height: 700px
  .cover
    width: 100%
    height: 100%
    // background-image: url("http://zashare.org/img/2017/expo_2017/event/%E5%AF%A6%E9%A9%97%E6%95%99%E8%82%B2%E9%A4%A8.jpg")
    background-size: cover
    background-position: center center
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
    cursor: pointer
    color: white
    &:hover
      background-color: #eee

  .prev
  .next
    // background-color: #aaa
    // height: 650px

</style>
