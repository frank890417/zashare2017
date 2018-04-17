<template lang="pug">
.page.right.page-about
  section.section-hero
    .container-fluid
      .row.row-cover(:style="styleBgOffset")
        //- .col-sm-12
        //-   br
        //-   br
        //-   br
        //-   img.logo-img(src="/static/img/Home/za-logo.svg")
        //-   br
        .col-sm-12.animated.fadeInUp
          h1 Make Education Different
          h3 奇特有趣的議題場景及考究嚴選的創新體驗，令雜學校成為亞洲最具影響力的教育創新博覽會品牌
   
    .container-fluid.container-feature
      .row
        .col-xs-6.col-sm-6.col-md-3.col-lg-2(v-for="f in features")
          img(:src="f.img")
          br
          br
          h2 {{f.num}}
          h5 {{f.title}}
  section.section-description
    .container
      .col-sm-12
        p 雜學，是未來人才的基本能力，多樣多元的聚集混種才能有肥沃的土壤造就人才創新的生態。這是一所以城市為單位，以生活為內容，以人為主體的社會學校。ZA是雜的音譯，也是從Z到A由下而上的概念，SHARE 是各種串連與分享。
        img(src="/static/img/About/about-pic.png")
        p 雜學校是從台灣民間發起教育文化創新的社會運動，由蘇仰志先生於2015年創立，希望建構一個讓1-99歲能找到生命熱情的各種學習路徑的烏托邦。因此籌備一年一度的創新教育博覽會，公開徵集了華人世界各種非典型教育與文化的創新，透過全新的策展思維創造出一個多元多樣的舞台，打破框架讓人與人在這各種跨域的串連與交流中共好，同時讓更多的探索與驚喜發生，促使教育轉化為多樣生活型態的獨創展現，培養更多人才與機會的可能。持續建構起教育新創加速器，協助更多教育創新理念與新創事業，往創辦的初心一步一步邁進：「如果每一個人都可以在熱情裡面做事，這個社會將會有多強大」！
  section.section-theme
    .container-fluid
      .row
        .col-sm-4.col-explore
          .fimg(:style="bgcss('/static/img/About/about-spirit-explore.png')")
          h3 Explore 探索
        .col-sm-4.col-diverse
          .fimg(:style="bgcss('/static/img/About/about-spirit-diverse.png')")
          h3 Diverse 多樣
        .col-sm-4.col-unique
          .fimg(:style="bgcss('/static/img/About/about-spirit-unique.png')")
          h3 Unique 獨創
  section.section-log
    .container
      .row
        .col-sm-12 
          h2 品牌大事記
          br
        .col-sm-12
          .row.row-expo(v-for="expo in expos")
            .col-cover(:style="bgcss(expo.report_cover)")
            .col-content.text-left
              h2 {{expo.year}}
              h3 {{expo.label}}
              h5 {{expo.spirit}}
              p(v-html="expo.feature")
</template>

<script>
import {mapState} from 'vuex'
export default {
  data(){
    return {
      features: [
        {
          img: "/static/img/About/icon-1.svg",
          num: "3",
          title: "博覽會屆數",
        },{
          img: "/static/img/About/icon-2.svg",
          num: "1.062",
          title: "報名件數",
        },{
          img: "/static/img/About/icon-3.svg",
          num: "386",
          title: "入選團隊",
        },{
          img: "/static/img/About/icon-4.svg",
          num: "31",
          title: "海外城市串聯參與",
        },{
          img: "/static/img/About/icon-5.svg",
          num: "102,683",
          title: "累計觀展人數",
        },{
          img: "/static/img/About/icon-6.svg",
          num: "40,000,000",
          title: "網路社群觸及人次",
        }
      ]
    }
  },
  computed: {
    ...mapState({
      expos: state=>state.expos,
      scrollY: state=>state.scroll.position,
    }),
    styleBgOffset(){
      return {
        "background": "url("+"/static/img/About/about-banner.png"+")",
        "background-position": "0 "+ this.scrollY+"px"
      }
    }
  },
  mounted(){
    new WOW().init();
  }

}
</script>

<style lang="sass">
.page-about
  background-color: #f2f2f2
  .col-cover
    background-size: cover


  .section-hero
    background-color: black
    color: white
    min-height: 100vh
    h1
      font-size: 60px
    h3
      font-size: 18px
    .row-cover
      background-size: cover
      min-height: calc(100vh - 300px)
      display: flex
      justify-content: center
      align-items: center
    .container-feature
      padding-top: 60px
      padding-bottom: 60px
      padding-left: 50px
      padding-right: 50px

      img
        width: 90px

  .section-theme
    color: white
    .fimg
      position: absolute
      width: 100%
      height: 100%
      left: 0
      top: 0
    [class*=col]
      display: flex
      justify-content: center
      align-items: flex-end
      min-height: 540px
      padding-bottom: 20px
      h3
        font-size: 48px
        position: relative

    .col-explore
      background-color: #1161ef
    .col-diverse
      background-color: #8af187
    .col-unique
      background-color: #8135f9
  
  .section-description,.section-theme,.section-log
    padding-top: 60px
    padding-bottom: 60px

  .section-description
    max-width: 687px
    margin-right: auto
    margin-left: auto
    img
      width: 100%
    img,p
      margin-top: 30px
      margin-bottom: 30px
  
  .row-expo
    display: flex
    height: 270px
    margin-bottom: 50px
    background-color: #fff
    .col-cover 
      flex: 592

    .col-content
      flex: 478
      padding: 20px

    &:nth-child(2n)
      flex-direction: row-reverse
    

</style>
