<template lang="pug">
.menu(:class="{open: menuState}")
  .hambergur(@click="setMenuState(!menuState)")
    .icon-bar
    .icon-bar
  transition(name="fade")
    .fullPage(v-if="menuState")
      .row.row-page
        .col-menu.col-sm-9
          .container
            .row.row-search
              .col-sm-12
                input(placeholder="搜尋雜學校")
              .col-sm-12
                .tags
                  .tag(v-for="i in 10") 地瓜
            .row(@click="setMenuState(false)")
              router-link.col-sm-4(to="/news")
                h2 News
                p 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化值、沒有框架...
              router-link.col-sm-8(to="/about")
                h2 雜學校
                p 2018年起，我們試圖匯聚各個領域的燈塔，建立起教育與時俱進的指標，讓學習的方向更加明確與有邏輯。提供線下至線上、各種多元面向的課程選擇，以脈絡式的課程大綱進行規劃，讓自主學習這件事不是茫然地像在汪洋中學習。
            .row(@click="setMenuState(false)")
              router-link.col-sm-4(to="/course")
                h2 ZA COURSE
                p 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化值、沒有框架...
              router-link.col-sm-4(to="/base")
                h2 ZA BASE
                p 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、框架...
              router-link.col-sm-4(to="/expo")
                h2 ZA EXPO
                p 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、框架...
            .row
              .col-sm-12
                hr
              .col-sm-8
                ul 
                  li 聯絡資訊　Contact Info
                  li 
                  li Tel. +886-2-2729-7122
                  li Mail. zashare@ozzie-art.com
                  li Business hours. 10:00-19:00 Mon. - Fri.
              .col-sm-4
                p 網站製作：墨雨設計<br>© 2018 雜学校 Za Share All Rights Reserved.
        .col-member.col-sm-3


</template>

<script>
import {mapState,mapMutations} from 'vuex'
export default {
  computed: {
    ...mapState(['menuState'])
  },
  methods: {
    ...mapMutations(['setMenuState'])
  }
}
</script>

<style lang="sass">



.hambergur
  width: 72px
  height: 72px
  position: fixed
  left: 0px
  top: 50px
  background-color: black
  padding: 10px
  cursor: pointer
  z-index: 50
.menu
  input
    border: none
    border-bottom: solid 4px black
    outline: none
    width: 100%


  &.open
    .hambergur
      .icon-bar:nth-child(1)
        top: 50%
        transform: translate(-50%,-50%) rotate(45deg)
      .icon-bar:nth-child(2)
        top: 50%
        transform: translate(-50%,-50%) rotate(-45deg)

  
.icon-bar
  width: 40px
  height: 4px
  // margin: 8px 0px
  position: absolute
  left: 50%
  top: 50%
  transform: translate(-50%,-50%)
  background-color: #fff
  transform-origin: center center
  transition: 0.5s
  &:nth-child(1)
    top: 35%
  &:nth-child(2)
    top: 65%

.fullPage
  position: fixed
  width: 100%
  height: 100%
  top: 0
  left: 0
  background-color: #fff
  z-index: 40
  box-sizing: border-box
  text-align: left
  a
    display: inline-block
    color: inherit
    text-decoration: none
  h2
    font-size: 40px
    font-weight: 900
    margin-bottom: 20px
  .row-page
    height: 100%
  .col-menu,.col-member
    height: 100%
  .col-menu
    padding: 50px
    .container
      margin-top: 50px
  .col-member
    background-color: #eee

  .row-search
    .tags
      display: flex

      .tag
        margin: 10px
        background-color: #eee
        padding: 5px 10px
          


</style>
