<template lang="pug">
.page-expo.animated.slideInRight
  .container
    .row(v-for="expo in expos")
      .col-sm-12
        h2 {{expo.title}}
          .year {{expo.year}}
        hr
        .row.row-content
          router-link.col-sm-12.col-lg-6(:to="`/expo/${expo.year}`")
            .cover(:style="bgcss(expo.cover)", data-cover-tag = "展覽資訊")
          router-link.col-sm-12.col-lg-6(:to="`/expo/${expo.year}/blog`")
            .cover(:style="bgcss(expo.report_cover)", data-cover-tag = "參展單位報導")
    
        
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
.page-expo
  padding-left: 350px 
  box-sizing: border-box
  text-align: left
  background-color: #fafafa
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
</style>
