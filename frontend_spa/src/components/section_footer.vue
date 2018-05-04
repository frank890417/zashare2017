<template lang="pug">
.section_footer
  .container
    .row
      .col-sm-4
        br
      .col-sm-4
        br
      .col-sm-4
        .footer_logo
          a(href='https://www.facebook.com/zashare.expo/', target='_blank')
            img(src="/static/img/social-icon/social-fb.svg")
          a(href='https://www.youtube.com/channel/UCiCIqDTmahczFvmg8iNUVow', target='_blank')
            img(src="/static/img/social-icon/social-fl.svg")
          a(href='https://www.instagram.com/za_share/', target='_blank')
            img(src="/static/img/social-icon/social-ig.svg")
          a(href='https://mp.weixin.qq.com/s/TwpvJg7q7tGnafAJgFdUeA', target='_blank')
            img(src="/static/img/social-icon/social-wc.svg")
          a(href='https://www.youtube.com/channel/UCiCIqDTmahczFvmg8iNUVow/playlists', target='_blank')
            img(src="/static/img/social-icon/social-yt.svg")
    .row
      .col-sm-4.footer-text 
        h3 Tel. +886-2-2729-7122<br>Mail. zashare@ozzie-art.com<br>Business hours. 10:00-19:00 Mon. - Fri.
      .col-sm-4.footer-text 
        h3
          a(href="https://www.yottau.com.tw/partner/344" target="_blank") 雜選課 ZA COURSE
          br
          a(href="http://revolution.zashare.org/" target="_blank")  雜學起義 ZA SHARE Revolution

      .col-sm-4.footer-text 
        h3 網站製作：墨雨設計<br>© 2018 雜學校 Za Share All Rights Reserved.<br>
</template>

<script>
export default {

}
</script>

<style lang="sass">
@import "../assets/_mixins.sass"
.section_footer
  padding-left: 350px
  padding-top: 50px
  padding-bottom: 50px
  background-color: #fafafa
  border-top: 1px solid #ddd

  .container
    max-width: calc(1200px)
    margin-left: auto
    margin-right: auto
    padding-left: 100px
    padding-right: 100px
  .footer_logo
    justify-content: flex-start
  .footer-text
    min-height: 4em
    display: flex
    flex-direction: column
    justify-content: flex-end
  h3
    font-weight: 300
    font-size: 14px
    text-align: left
    line-height: 1.5
    letter-spacing: 0.3px
    a
      color: black
  +rwd_md
    padding-left: 0
    .container
      padding-left: 30px
      padding-right: 30px
      // max-width: calc(100vw - 50px)
</style>
