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
        .col-sm-10.animated.fadeInUp
          h1 Make Education Different
          h3 {{ this.$t("page_about.sub_slogan") }}
   
    .container-fluid.container-feature
      .row
        .col-6.col-xs-6.col-sm-6.col-md-3.col-lg-2(v-for="(f,fid) in features", class="'delay-ani-'+(fid*2+2)")
          img(:src="f.img").animated.fadeIn
          br
          br
          h2.running-number.animated.fadeIn {{f.num}}
          h5.animated.fadeIn {{ $t('page_about.numberlabels['+fid+']') }}
          br
  section.section-description
    .container
      .col-sm-12
        p.wow.fadeIn(v-html="$t('page_about.content[0]')")
        img.wow.fadeIn(src="/static/img/About/about-pic.png")
        p.wow.fadeIn(v-html="$t('page_about.content[1]')")
  section.section-theme
    .container-fluid
      .row
        .col-sm-4.col-explore.wow.fadeInUp(data-wow-delay="0s")
          .fimg(:style="bgcss('/static/img/About/about-spirit-explore.png')")
          h3.wow.fadeIn {{ $t('page_about.themes[0]') }}
        .col-sm-4.col-diverse.wow.fadeInUp(data-wow-delay="0.2s")
          .fimg(:style="bgcss('/static/img/About/about-spirit-diverse.png')")
          h3.wow.fadeIn {{ $t('page_about.themes[1]') }}
        .col-sm-4.col-unique.wow.fadeInUp(data-wow-delay="0.4s")
          .fimg(:style="bgcss('/static/img/About/about-spirit-unique.png')")
          h3.wow.fadeIn {{ $t('page_about.themes[2]') }}
  section.section-log
    .container
      .row
        .col-sm-12 
          h2 {{ $t('page_about.title_brand') }}
          br
        .col-sm-12
          router-link.row.row-expo.wow.fadeInUp(v-for="expo in expos", :to="`/expo/${expo.year}`")
            .col-cover(:style="bgcss(expo.report_cover)")
            .col-content.text-left
              h3 {{expo.year}}
              h4 {{expo.label}}
              h5 {{expo.spirit}}
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
        h1
          font-size: 25px
        h3
          font-size: 15px
          opacity: 0.6
          line-height: 1.8
    .container-feature
      padding: 50px
      +rwd_md
        padding: 30px
        h2
          font-size: 28px
        h5
          font-size: 17px
          // opacity: 0.6
          line-height: 1.8
          // margin-bottom: 34px
          white-space: nowrap

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
        font-size: 30px
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
