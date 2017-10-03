<template lang="pug">
.landing_page_body
  .container.main_info_container
    .row
      .col-md-6.col-md-push-3.col-sm-8.col-sm-push-2
        img.hidden-sm.hidden-xs.main(src='/img/2017/index0829_coverLogo.svg', alt='')
        img.visible-sm.visible-xs.main(src='/img/2017/index0829_coverLogo.svg', alt='')
        .full_lang_sel
          a.btn(href='https://zashare.kktix.cc/events/2017zashare', target='_blank')
            | kktix
          a.btn(href='http://tickets.books.com.tw/progshow/08010901224680/', target='_blank')
            | 博客來
        .index_btns
          a.index_btn.btn_buy(target='_blank')
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
  mounted(){
    $(".btn_buy").click(function(){
      $(".full_lang_sel").addClass("active")
    })
    $(".full_lang_sel").click(function(){
      $(".full_lang_sel").removeClass("active")

    })
  }
}
</script>

<style>

</style>
