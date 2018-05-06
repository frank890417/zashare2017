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
          h3 奇幻繽紛的場景及融入生活的探索， 將教育與文化的多元串聯成亞洲最具影響力的創新會展品牌。
   
    .container-fluid.container-feature
      .row
        .col-6.col-xs-6.col-sm-6.col-md-3.col-lg-2.wow.fadeIn(v-for="(f,fid) in features", class="'delay-ani-'+(fid*2+2)")
          img(:src="f.img").animated.fadeIn
          br
          br
          h2.running-number.animated.fadeIn {{f.num}}
          h5.animated.fadeIn {{f.title}}
          br
  section.section-description
    .container
      .col-sm-12
        p.wow.fadeIn 雜學，是未來人才的基本能力，多樣多元的聚集混種才能有肥沃的土壤造就人才創新的生態。這是一所以城市為單位，以生活為內容，以人為主體的社會學校。ZA是雜的音譯，也是從Z到A由下而上的概念，SHARE 是各種串連與分享。
        img.wow.fadeIn(src="/static/img/About/about-pic.png")
        p.wow.fadeIn 雜學校是從台灣民間發起教育文化創新的社會運動，由蘇仰志先生於2015年創立，希望建構一個讓1-99歲能找到生命熱情的各種學習路徑的烏托邦。因此籌備一年一度的創新教育博覽會，公開徵集了華人世界各種非典型教育與文化的創新，透過全新的策展思維創造出一個多元多樣的舞台，打破框架讓人與人在這各種跨域的串連與交流中共好，同時讓更多的探索與驚喜發生，促使教育轉化為多樣生活型態的獨創展現，培養更多人才與機會的可能。持續建構起教育新創加速器，協助更多教育創新理念與新創事業，往創辦的初心一步一步邁進：「如果每一個人都可以在熱情裡面做事，這個社會將會有多強大」！
  section.section-theme
    .container-fluid
      .row
        .col-sm-4.col-explore.wow.fadeInUp(data-wow-delay="0s")
          .fimg(:style="bgcss('/static/img/About/about-spirit-explore.png')")
          h3.wow.fadeIn Imagine 打開想像
        .col-sm-4.col-diverse.wow.fadeInUp(data-wow-delay="0.2s")
          .fimg(:style="bgcss('/static/img/About/about-spirit-diverse.png')")
          h3.wow.fadeIn Explore 探索
        .col-sm-4.col-unique.wow.fadeInUp(data-wow-delay="0.4s")
          .fimg(:style="bgcss('/static/img/About/about-spirit-unique.png')")
          h3.wow.fadeIn Diversify 使其多元
  section.section-log
    .container
      .row
        .col-sm-12 
          h2 品牌大事記
          br
        .col-sm-12
          router-link.row.row-expo.wow.fadeInUp(v-for="expo in expos", :to="`/expo/${expo.year}`")
            .col-cover(:style="bgcss(expo.report_cover)")
            .col-content.text-left
              h3 {{expo.year}}
              br
              h4 {{expo.label}}
              h5 {{expo.spirit}}
              br
              ul.feature-list
                li(v-for="feature in expo.features") {{feature}}

</template>

<script>
import {mapState} from 'vuex'
import $ from 'jquery'
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
          num: "1062",
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
          num: "102683",
          title: "累計觀展人數",
        },{
          img: "/static/img/About/icon-6.svg",
          num: "40000000",
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
        "background-position": "center center",
        "background-size":"cover"
      }
    }
  },
  mounted(){
    new WOW().init();
    $(".running-number").each((id,obj)=>{
      let target = parseInt($(obj).text())
      let current = 0
      if (current<0){current=0}
      let timer = setInterval(()=>{
        current += (target-current)*0.2
        let shownum = Math.ceil(current)
        $(obj).text(shownum<0?0:shownum )
        if (current>=target){
          current=target
          clearInterval(timer)
        }
      },30)
    })
  }

}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"
.page-about
  background-color: #f2f2f2
  a
    color: inherit
    text-decoration: none
  .col-cover
    background-size: cover


  .section-hero
    background-color: black
    color: white
    min-height: 100vh
    +rwd_sm
      padding: 0
      min-height: initial
    h1
      font-size: 60px
      +rwd_sm
        font-size: 40px
    h3
      font-size: 18px
      +rwd_sm
        font-size: 16px
        margin-top: 20px
    .row-cover
      background-size: cover
      min-height: calc(100vh - 300px)
      display: flex
      justify-content: center
      align-items: center
      +rwd_sm
        padding: 100px 20px
    .container-feature
      padding: 50px

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
      +rwd_sm
        min-height: auto
        padding: 50px
        h3
          font-size: 28px
        .fimg
          background-position: center center
          background-size: auto 110%
          background-repeat: no-repeat
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
    margin-bottom: 100px
    background-color: #fff

    +rwd_md
      // margin-bottom: 120px
      h4,h5
        line-height: 1.5
      h3
        font-size: 26px
        margin-bottom: -10px
      h4
        font-size: 22px
      h5
        font-size: 16px


    .feature-list
      padding: 0
      list-style: none
      li
        padding-left: 1em
        font-size: 15px
        margin-bottom: 10px
        &:before
          content: '．'
          margin-left: -1em
    .col-cover 
      flex: 592
      +trans

    .col-content
      flex: 478
      padding: 20px
    &:hover
      .col-cover
        flex: 650

    &:nth-child(2n)
      flex-direction: row-reverse
    +rwd_sm
      display: block
      height: auto
      margin: 10px
      padding: 20px
      .col-cover

        min-height: 200px
        margin: -20px
      .col-content
        padding: 10px
        padding-top: 40px
        
    

</style>
