<template lang="pug">
.page.right.page-news.animated.slideInRight
  .container
    .row
      .col-sm-12
        h2 News
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
            h2 地瓜校長的雜入學先修開課定案 !
            hr
            p 2018年雜選課Ｃourse 00 即將於 1月2號正式上線...
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
        router-link.news_box.animated.fadeIn(to="/news/test")
          .row
            .col-sm-12.col-cover
              .cover(:style="bgcss(post.cover)")
                .tag ZA EXPO
            .col-sm-12.col-info
              h3 {{post.title}}
              //- p {{ post.description.slice(0,50) }}
</template>

<script>
import axios from 'axios'
import $ from 'jquery'
import slick from 'slick-carousel'
export default {
  data(){
    return {
      nowCata: "",
      posts: [],
        slickOptions: {
            slidesToShow: 1,
            arrows: false,
            autoplay: true
            // Any other options that can be got from plugin documentation
        },
    }
  },
  computed: {
    use_posts(){
      return this.posts.slice(3,12).map(o=> 
        ({...o,cover: "http://zashare.org/"+o.cover})
      )

    },
    slides(){
      return this.posts.slice(0,3).map(o=> 
        ({...o,cover: "http://zashare.org/"+o.cover}))
    }
  },
  mounted(){
    axios.get("http://zashare2017.test/api/spa/post").then(res=>{
      this.posts=res.data
    })
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
     
  }
}
</script>


<style lang="sass">

.page-news
  text-align: left
  background-color: #fafafa

  .cover
    min-height: 250px
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

    .news_box
      background-color: #fff
      box-sizing: border-box
      position: relative
      margin-bottom: 50px
      border-bottom: solid 5px #999
      cursor: pointer
      display: block

      text-decoration: none
      color: black
      // margin: 10px
      h3
        line-height: 1.67
      .col-info
        // padding: 10px
        padding: 30px
          top: 0px
        box-sizing: border-box

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
