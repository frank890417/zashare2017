<template lang="pug">
footer
  .container
    .row
      .col-sm-4
        img(src='/img/2017/logo1011.svg', width='130px')
        br
        br
        .footer_logo
          a(href='https://www.facebook.com/zashare.expo/', target='_blank')
            i.fa.fa-facebook
            |                     Facebook
          a(href='https://www.youtube.com/channel/UCiCIqDTmahczFvmg8iNUVow', target='_blank')
            i.fa.fa-youtube
            |                     Youtube
          a(href='https://www.instagram.com/zashare_edu/', target='_blank')
            i.fa.fa-instagram
            |                     Instagram
          br
          a(href='http://weibo.com/6020066115/profile?rightmod=1&wvr=6&mod=personnumber&is_all=1', target='_blank')
            i.fa.fa-weibo
            |                     Weibo
          a(href='http://open.weixin.qq.com/qr/code/?username=zashare_edu', target='_blank')
            i.fa.fa-weixin
            |                     Wechat
        br
        .fb-like(data-href='https://www.facebook.com/zashare.expo/?fref=ts', data-layout='standard', data-action='like', data-size='small', data-show-faces='true', data-share='true', data-width='250px')
        br
        br
        br
      .col-sm-8
        h5 聯絡資訊 Contact Info
        hr(style='border-color: #333')
        p
          | Address. 台北市光復南路417巷213號1樓
          br
          |         Tel. +886-2-2729-7122
          br
          | Mail. zashare@ozzie-art.com
          br
          br
          span 網站製作：
            a(href="http://monoame.com" target="_blank" @click="$ga.event('link', 'click', '墨雨設計')") 墨雨設計
        p © 2017 雜学校 Za Share All Rights Reserved.    
        br
    //
      <h6>電話:  02-2346-7122 # 109</h6>
      <h6>信箱:  zashare@ozzie-art.com</h6>
      <h6>地址:  110台北市信義區松德路159號25樓25F., No.159, Songde Rd., Xinyi Dist., Taipei City 110, Taiwan (R.O.C.)</h6>

</template>

<script>
</script>

<style>

</style>
