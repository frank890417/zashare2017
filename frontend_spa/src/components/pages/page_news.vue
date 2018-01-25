<template lang="pug">
.page-news.animated.slideInRight
  .container
    .row
      .col-sm-12
        h2 News
    .row
      .col-sm-12
        .row
          .col-sm-8
            .cover(:style="bgcss('http://via.placeholder.com/800x600')")
          .col-sm-4
            .tag 2017
            h2 地瓜校長的雜入學先修開課定案 !
            hr
            p 2018年雜選課Ｃourse 00 即將於 1月2號正式上線...
    .row
      .col-sm-12
        ul
          li ALL
          li ZA COURSE
          li ZA BASE
          li ZA EXPO
    .row
      .col-sm-4(v-for="i in 9").col-news
        .news_box
          .row
            .col-sm-12.col-cover
              .cover(:style="bgcss('http://via.placeholder.com/800x600')")
                .tag ZA EXPO
            .col-sm-12.col-info
              h3 地瓜校長的雜入學先修開課定案 !雜入學先修開課定案 !
              p 2018年雜選課Ｃourse 00 即將於 1月2號正式上線...2018年雜選課Ｃourse 00 即將於 1月2號正式上線...2018年雜選課Ｃourse 00 即將於 1月2號正式上線...
</template>

<script>
export default {

}
</script>


<style lang="sass">

.page-news
  padding-left: 300px
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
      border-bottom: solid 8px #999
      // margin: 10px
      .col-info
        // padding: 10px
        padding: 30px
          top: 0px
        box-sizing: border-box


</style>
