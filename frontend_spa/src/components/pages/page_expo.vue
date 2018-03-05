<template lang="pug">
.page.right.page-expo.animated.slideInRight
  .container
    .row(v-for="expo in expos")
      .col-sm-12
        h2 {{expo.title}}
          span.title_eng
            span.dash &nbsp;-&nbsp;
            span.eng {{expo.title_eng}}
          .year {{expo.year}}
        hr
        .row.row-content
          router-link.col-sm-12.col-lg-6(:to="`/expo/${expo.year}`")
            .cover(:style="bgcss(expo.cover)", data-cover-tag = "展覽資訊")
          h3.text-center.visible-md 展覽介紹
          router-link.col-sm-12.col-lg-6(:to="`/expo/${expo.year}/blog`")
            .cover(:style="bgcss(expo.report_cover)", data-cover-tag = "參展單位報導")
          h3.text-center.visible-md 參展單位報導
    
        
</template>

<script>
import {mapState} from 'vuex'
export default {
  data(){
    return {
      
    } 
  },
  computed: {
    ...mapState(['expos'])
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"
.page-expo
  box-sizing: border-box
  text-align: left
  background-color: #fafafa
  +rwd_md
    padding-top: 30px
  h2
    position: relative
    +rwd_md
      font-size: 18px
      margin-bottom: 0
      .dash
        display: none
      .title_eng
        position: absolute
        left: 0
        font-size: 16px
        margin-top: -10px
        top: 50px
  h3
    width: 100%
    margin-top: 0px
    margin-bottom: 30px
  .container-fluid
    padding: 50px

  .cover
    width: 100%
    padding-bottom: 60%
    background-color: #eee
    background-size: cover
    background-position: center center
    position: relative
    color: white
    text-decoration: none
    &:before
      content: attr(data-cover-tag)
      display: block
      position: absolute
      left: 0
      top: 0
      width: 100%
      height: 100%
      background-color: rgba(black,0.6)
      opacity: 0
      transition: 0.5s
      font-size: 18px
      letter-spacing: 1px
      display: flex
      justify-content: center
      align-items: center
    &:hover
      &:before
        opacity: 1
  .container
    padding: 50px
    +rwd_md
      padding: 20px
  .year
    float: right
  hr
    border: none
    width: 100%
    height: 8px
    background-color: black
    margin-top: 5px
    margin-bottom: 40px
  .col-sm-12

    margin-bottom: 20px
  .row
    margin-bottom: 50px
    +rwd_md
      margin-bottom:: 0px
</style>
