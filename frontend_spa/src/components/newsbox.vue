<template lang="pug">
router-link.news_box.animated.fadeIn(:to="target")
  .row
    .col-sm-12.col-cover
      .cover.news_box_cover(:style="bgcss(post.cover)")
        .tag {{ tag || 'ZA SHARE'}}
    .col-sm-12.col-info
      h3 {{post.title}}
      //- p {{ post.description.slice(0,50) }}
    
</template>

<script>
export default {
  props: ['post','target','tag'],
  
}
</script>

<style lang="sass">
.news_box
  background-color: #fff
  box-sizing: border-box
  position: relative
  margin-bottom: 50px
  cursor: pointer
  display: block

  text-decoration: none
  color: black
  // margin: 10px
  &:hover
    .col-cover .cover.news_box_cover
      background-size: 120% auto
      
  .col-cover
    .cover.news_box_cover
      height: 0
      width: 100%
      min-height: 0
      padding-bottom: 60%
      background-size: 110% auto

      background-position: center center
      position: relative
      transition: 0.5s
      

    .tag
      position: absolute
      left: 0
      top: 0
      background-color: black
      color: white
      padding: 5px 10px
      font-weight: 900
  h3
    line-height: 1.67
    letter-spacing: 1px
    font-size: 18px
    min-height: 2em
    text-align: left
    // background-color: #fafafa
  .col-info
    // padding: 10px
    padding: 30px
      top: 0px
    box-sizing: border-box
    position: relative
    &:after
      content: ""
      display: block
      position: absolute
      width: calc(100% - 30px)
      height: 5px
      left: 50%
      bottom: 0
      transform: translate(-50%)
      background-color: #ccc
</style>
