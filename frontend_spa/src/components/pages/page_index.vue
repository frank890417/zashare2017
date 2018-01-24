<template lang="pug">
.page-index
  .container-fluid
    .row-cover
      slick(ref="slick" :options="slickOptions")
        .cover(style="background-image: url('http://zashare.org/img/expo/2017/2.jpg');")
        .cover(style="background-image: url('http://zashare.org/img/expo/2017/3.jpg');")
        .cover(style="background-image: url('http://zashare.org/img/expo/2017/4.jpg');")
        .cover(style="background-image: url('http://zashare.org/img/expo/2017/5.jpg');")
    .row-news
      .row
        .col-sm-3.col-left
          h2 News
          h4 最新消息
          p more    ->

          
        .col-sm-9.col-right
          h3 謝謝五萬名師生的入學支持，讓台灣創新<br>教育的溫柔革命得...
          p 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、沒有世俗的框架、沒有年齡的限制，充滿了各種想像？
          .btn 閱讀更多
          .btns
            .b <
            .b >
</template>

<script>
import Slick from 'vue-slick'
export default {
 components: { Slick },
  data() {
      return {
          slickOptions: {
              slidesToShow: 1,
              arrows: false,
              autoplay: true
              // Any other options that can be got from plugin documentation
          },
      };
  },
  methods: {
      next() {
          this.$refs.slick.next();
      },

      prev() {
          this.$refs.slick.prev();
      },

      reInit() {
          // Helpful if you have to deal with v-for to update dynamic lists
          this.$nextTick(() => {
              this.$refs.slick.reSlick();
          });
      },
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
    animation: flexIn 1s 
    transition: 0.5s
    flex: 1
    text-align: left
    .col-left
      position: relative
      top: -60px
      margin-left: -15px
      margin-right: -15px
      padding-left: 60px
      padding-right: 60px
      height: calc(100% + 60px)
      background-color: #fff
    &>*
      padding: 30px
      box-sizing: border-box
    h2
      font-size: 40px
      font-weight: 900
  .cover
    width: 100%
    height: 700px
    background-image: url("http://zashare.org/img/2017/expo_2017/event/%E5%AF%A6%E9%A9%97%E6%95%99%E8%82%B2%E9%A4%A8.jpg")
    background-size: cover
    background-position: center center

    // background-color: #aaa
    // height: 650px

</style>
