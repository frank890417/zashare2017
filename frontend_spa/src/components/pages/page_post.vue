<template lang="pug">
.page.right.page-post
  .container(v-if="post && ready").animated.fadeIn
    .row.row-banner
      .col-sm-12.animated.fadeIn
        .cover(:style="bgcss(post.cover)")
    .row.row-header
      .col-sm-12
        .tag {{postTag}}
        h1 {{ post.title }}
        h2 {{ post.subtitle }}
      .col-sm-12
        div
          p {{ post.established_time.split(" ")[0] }} 
          span {{post.author}}
          .tags
            .hashtag(v-for="tag in hashtags") {{tag}}
    .row
      .col-sm-12
        hr
    .row.row-content
      .col-sm-12(v-html="content")
    .row.row-company.text-left(v-if="post.company")
      .col-sm-12
        a.row.company-box.nostyle(:href="post.company.website", target="_blank")
          .col-md-3.col-sm-4.col-xs-12.col-logo
            .logo(:style="bgcss(post.company.logo)")
          .col-md-9.col-sm-8.col-xs-12
            h3 {{post.company.name_cht}}
            p {{post.company.discribe_cht}}
    .row.row-related
      .col-sm-12
        h3 相關消息
        hr
    .row
      .col-sm-4(v-for="post in relatedPost") 
        newsbox(:post='post', :target='`/expo/${$route.params.year}/blog/${post.id}`',:tag="post.cata && post.cata.name")
</template>

<script>
import axios from 'axios'
import {mapState } from 'vuex'

export default {
  data(){
    return {
      post: null,
      ready: false
    }
  },
  mounted(){
    let type = this.$route.meta.type=="expo"?"post":"news"
    let _this = this
    axios.get(`/api/${type}/`+this.$route.params.post_id).then(res=>{
      _this.post=res.data
      // _this.$nextTick(()=>{
      //   setTimeout(()=>{
      //     window._jf.flush();
      _this.ready=true

      //   },400)
      // })      
    })
  },
  computed: {
    ...mapState({
      posts: state=>state.post.posts
    }),
    postTag(){
      if (this.post.cata && this.post.cata.year=="news"){
        return this.post.cata.name
      }
      return this.post.year

    },
    // post(){
    //   let result =  this.posts.find(o=>o.id==this.$route.params.post_id) || 
    //     {
    //       cover: "http://service.zashare.org/img/expo/2017/3.jpg",
    //       title: "地瓜校長的雜入學先修開課定案 !",
    //       subtitle: "Ｃourse ００ ：不只知道，更能做到的練習",
    //       established_time: "2017/10/20-22",
    //       content: `<p>2018年雜選課Ｃourse 00 將於1月2號於線上開課囉！<br>想知道如何在學校、補習班以外學到其他能力、靠自己找出自己學習路徑的其他可能？就讓雜學校<br>校長－也是一人兼多職的雜學代表來談談他如何雜學？怎麼實踐雜學？</p><div class="quote">「給他魚不如教他做釣具，<br>與生活結合的知識提升孩童實踐力」</div><h2>每個孩子都該是第一名</h2><p>在人生狂飆期的國高中階段，孩子需要甚麼？清水小校是一個共學團體，一所體制外的完全中學，以培養能獨立思考的現代公民為宗旨，採取師生共治校園共享知識，一同在宜蘭三星共創多元教育的可能。最特別的是，在清水小校中，學生能夠直接參與校園民主及學習組織、規劃與領導，而此次參展「雜學校」也是由學生親手規劃！</p><img><blockquote>清水小校登山課程學習搭帳篷、露宿帳。照片/取自清水手札粉絲專頁   楊宜臻/台北報導</blockquote><h2>家鄉是核心，跳脫升學主義框架</h2><p>在偏鄉其實有許多自然資源與機會，是都市的快步調生活中講求速成所不可能獲得的。既然如此，設計教學時更不該只想著如何讓偏鄉的孩子與都市競爭或是融入都市，而是要能夠幫助發展學生自力更生的能力。這樣的理念的核心就是擺在「以家為出發點，為家鄉融入新活力」，甚至，如果偏鄉學校發揮更大的功能，可以讓孩子把所學的知識可以帶回家中，幫助家中的經濟發展，一旦偏鄉家庭生計得到維持，偏鄉小校才有永續發展的機會。漁光的家長瞭解黃老師的理念，也看到孩子的成長，都非常支持這樣的教學模式。</p><img><blockquote>同樣是做實驗，如果只有溫度計、燒杯、 等臂天平那似乎少了些溫度也與學生的生活少了些連結，所以黃老師認為既然要做『水的三態』單元霜和露的實驗，不如延伸一個步驟來作炒冰，瞬間書本上的知識就一躍成為能與生活經驗結合的技能　　　照片提供／黃鴻志臉書 洪璿岳/台北報導</blockquote><div class="quote">「給他魚不如教他做釣具，<br>與生活結合的知識提升孩童實踐力」</div><p>在偏鄉其實有許多自然資源與機會，是都市的快步調生活中講求速成所不可能獲得的。既然如此，設計教學時更不該只想著如何讓偏鄉的孩子與都市競爭或是融入都市，而是要能夠幫助發展學生自家庭生計得到維持，偏教學模式。</p>`
    //     }
    //   return result
    // },
    hashtags(){
      return JSON.parse(this.post.hashtag || "[]")
    },
    content(){
      return (this.post.content || "")
        .replace(/\.\.\/\.\.\//g,"/")
        .replace(/\/dropzone\/uploads/g,"http://service.zashare.org/dropzone/uploads")
        .replace(/(\<iframe.*?http.*?\"\><\/iframe>)/g,"<div class='video-wrapper'>$1</div>")
        // .replace(/..\/..\//g,"/")
    },
    relatedPost(){
      let type = this.$route.meta.type=="expo"?"expo":"news"
      // console.log(this.posts)
      let result =  this.posts.filter(p=>p.year==this.post.year)
                       .filter(o=>o.type==type).slice().sort((a,b)=>Math.random()-0.5).slice(0,3)
      console.log(result)
      return result
    }

  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"

.page-post
  padding-top: 100px
  padding-bottom: 100px
  background-color: #fafafa

  [class^="row-"]
    padding-left: 105px
    padding-right: 105px
    +rwd_md
      padding-left: 20px
      padding-right: 20px

  +rwd_sm
    padding-top: 0
  hr
    margin-top: 30px
    margin-bottom: 30px
    opacity: 0.3

  .row-banner
    .cover
      background-color: #eee
      min-height: 530px
      background-color: #eee
      margin-bottom: 60px
      // background-attachment: fixed
      background-position: center center
      background-size: cover
      +rwd_md
        min-height: 40vh
        margin-left: -20px
        margin-right: -20px
  .row-header
    text-align: left
    position: relative
    p
      margin-bottom: 0
    h1
      font-size: 36px
      font-weight: 900
      letter-spacing: 0.9px
    .tag
      background-color: black
      color: white
      padding: 3px 10px
      display: inline-block
      font-weight: 900
    .hashtag
      background-color: black
      color: white
      padding: 3px 10px
      border-radius: 5px
      margin-left: 5px
      letter-spacing: 2px
      display: inline-block
      font-weight: 600
      
      &:before
        content: "#"
    .tags
      position: absolute
      right: 0
      bottom: 0
  .row-content
    text-align: left
    .video-wrapper
      width: 100%
      position: relative
      padding-bottom: 56.25%
      margin-top: 30px
      margin-bottom: 30px
      &+blockquote
        margin-top: -35px
        margin-bottom: 42px
        line-height: 2
      // padding-right: 15px
    iframe
      position: absolute
      width: 100%
      height: 100%
      // width: 100%
      // height: 300px
    hr
      margin-left: -105px
      margin-right: -105px
      width: calc(100% + 210px)
    h1
      font-size: 36px
      font-weight: 900
      line-height: 1
      letter-spacing: 0.9px

    h2
      margin-top: 78px
      font-size: 30px
      line-height: 1.6
      font-weight: 900
    blockquote
      font-size: 14px
      opacity: 0.5
      margin: 0
    p
      font-size: 16px
      line-height: 1.88
      &+blockquote
        margin-top: -35px
        margin-bottom: 42px
        line-height: 2

    a
      color: #0F57ED
      text-decoration: none
      font-weight: 600

    img
      width: 100%
      // min-height: 300px
      height: auto
      background-color: #eee
      margin-top: 42px
      margin-bottom: 42px

    .quote
      font-size: 24px
      font-weight: 900
      line-height: 1.6
      text-align: center
      
      padding: 20px 50px
      border: solid 6px
      margin-top: 70px
      margin-bottom: 70px
      
  .row-company
    h3
      font-size: 24px
    .logo
      background-color: #aaa5b5
      width: 100%
      padding-bottom: 100%
      background-size: cover
    .company-box
      margin-top: 160px
      background-color: #e4e3e8
      padding: 30px
      .col-logo
        display: flex
        align-items: center
  .row-related
    h3
      margin-top: 100px
      font-size: 24px
  .cover
    min-height: 50px
  

</style>
