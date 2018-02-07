<template lang="pug">
.page.right.page-post.animated.slideInRight
  .container
    .row.row-banner
      .col-sm-12
        .cover(style="background-image: url('http://zashare.org/img/expo/2017/3.jpg')") BANNER
    .row.row-header
      .col-sm-12
        .tag ZA COURSE
        h1 地瓜校長的雜入學先修開課定案 !
        h2 Ｃourse ００ ：不只知道，更能做到的練習
      .col-sm-12
        div
          p TIME: ２０１７/１０/２０-２２<br>PLACE: 華山1914文化創意產業園區
          .tags #影音　#影音　#影音
    .row
      .col-sm-12
        hr
    .row.row-content
      .col-sm-12
        p 2018年雜選課Ｃourse 00 將於1月2號於線上開課囉！<br>想知道如何在學校、補習班以外學到其他能力、靠自己找出自己學習路徑的其他可能？就讓雜學校<br>校長－也是一人兼多職的雜學代表來談談他如何雜學？怎麼實踐雜學？
        .quote 「給他魚不如教他做釣具，<br>與生活結合的知識提升孩童實踐力」
        h2 每個孩子都該是第一名
        p 在人生狂飆期的國高中階段，孩子需要甚麼？清水小校是一個共學團體，一所體制外的完全中學，以培養能獨立思考的現代公民為宗旨，採取師生共治校園共享知識，一同在宜蘭三星共創多元教育的可能。最特別的是，在清水小校中，學生能夠直接參與校園民主及學習組織、規劃與領導，而此次參展「雜學校」也是由學生親手規劃！
        img
        blockquote 清水小校登山課程學習搭帳篷、露宿帳。照片/取自清水手札粉絲專頁   楊宜臻/台北報導
        h2 家鄉是核心，跳脫升學主義框架
        p 在偏鄉其實有許多自然資源與機會，是都市的快步調生活中講求速成所不可能獲得的。既然如此，設計教學時更不該只想著如何讓偏鄉的孩子與都市競爭或是融入都市，而是要能夠幫助發展學生自力更生的能力。這樣的理念的核心就是擺在「以家為出發點，為家鄉融入新活力」，甚至，如果偏鄉學校發揮更大的功能，可以讓孩子把所學的知識可以帶回家中，幫助家中的經濟發展，一旦偏鄉家庭生計得到維持，偏鄉小校才有永續發展的機會。漁光的家長瞭解黃老師的理念，也看到孩子的成長，都非常支持這樣的教學模式。
        img
        blockquote 同樣是做實驗，如果只有溫度計、燒杯、 等臂天平那似乎少了些溫度也與學生的生活少了些連結，所以黃老師認為既然要做『水的三態』單元霜和露的實驗，不如延伸一個步驟來作炒冰，瞬間書本上的知識就一躍成為能與生活經驗結合的技能　　　照片提供／黃鴻志臉書 洪璿岳/台北報導
        .quote 「給他魚不如教他做釣具，<br>與生活結合的知識提升孩童實踐力」
        p 在偏鄉其實有許多自然資源與機會，是都市的快步調生活中講求速成所不可能獲得的。既然如此，設計教學時更不該只想著如何讓偏鄉的孩子與都市競爭或是融入都市，而是要能夠幫助發展學生自家庭生計得到維持，偏教學模式。
    .row.row-related
      .col-sm-12
        h3 相關消息
        hr
    .row
      .col-sm-4(v-for="i in 3") 
        
        h4 阿滴英文
</template>

<script>
export default {

}
</script>

<style lang="sass">

.page-post
  padding-top: 100px
  padding-bottom: 100px

  hr
    margin-top: 30px
    margin-bottom: 30px
    opacity: 0.3

  .row-banner
    .cover
      min-height: 500px
      background-color: #eee
      margin-bottom: 60px
      background-attachment: fixed
      
  .row-header
    padding-left: 105px
    padding-right: 105px
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
    .tags
      position: absolute
      right: 0
      bottom: 0
  .row-content
    padding-left: 105px
    padding-right: 105px
    text-align: left
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
    img
      width: 100%
      min-height: 300px
      background-color: #eee
      margin-top: 42px
      margin-bottom: 42px
      &+blockquote
        margin-top: -14px
        margin-bottom: 42px

    .quote
      font-size: 30px
      font-weight: 900
      line-height: 1.6
      text-align: center
      
      padding: 37px 110px
      border: solid 6px
      margin-top: 70px
      margin-bottom: 70px
      
  .row-related
    h3
      margin-top: 100px
      font-size: 24px
  .cover
    min-height: 50px

</style>
