<template lang="pug">
.landing_page_body
  .container.main_info_container
    .row
      .col-md-6.col-md-push-3.col-sm-8.col-sm-push-2
        img.hidden-sm.hidden-xs.main.fadeIn.animated(src='/img/2017/index0829_coverLogo.svg', alt='')
        img.visible-sm.visible-xs.main.fadeIn.animated(src='/img/2017/index0829_coverLogo.svg', alt='')
        //.full_lang_sel(@click="full_lang_sel_show=false",
                       :class="{active: full_lang_sel_show}")
          a.btn(href='https://zashare.kktix.cc/events/2017zashare', target='_blank')
            | kktix
          a.btn(href='http://tickets.books.com.tw/progshow/08010901224680/', target='_blank')
            | 博客來
        .index_btns
          router-link.index_btn.btn_buy(to="/expo2017")
            img(src='/img/2017/index0829_btnBuy.svg', alt='')
          a.index_btn.btn_crowd(href='https://backme.tw/ref/GZMac/', target='_blank')
            img(src='/img/2017/index0829_btnFunding.svg', alt='')
    //.center_box.text-center
      .row
        img(src='/img/logo_white.svg', style='margin-left: auto;margin-right: auto')
        br
        br
        h3(style='color: white') 學習從不是單一概念。
        br
        br.visible-xs
        br.visible-xs
        router-link.btn.btn-default.btn-lg.btn-trans.visible-xs(to="/blog")  來雜學吧！ 

  video.landing-video(autoplay='', loop='')
    source(src='/video/zashare-website_1_compressed.mp4', type='')
  
</template>

<script>
import $ from 'jquery'
export default {
  data() {
    return {
      full_lang_sel_show: false

    }
  },
  mounted(){

  }
}
</script>

<style scoped lang="sass?indentedSyntax">
.main
  animation-delay: 0s
.index_btn
  animation-delay: 0.5s
  animation-name: fadeInUp
  animation-duration: 1s
  animation-fill-mode: both
  &:nth-child(2)
    animation-delay: 0.6s
</style>
