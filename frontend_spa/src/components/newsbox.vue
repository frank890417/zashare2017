<template lang="pug">
router-link.news_box.animated.fadeIn(:to="target")
  .row(v-if="post")
    .col-sm-12.col-cover
      .cover.news_box_cover(:style="bgcss(post.cover)")
        .tag {{ tag || 'ZA SHARE'}}
    .col-sm-12.col-info
      h4.company(v-if="post.company") {{post.company.name_cht}}
      h3 {{post.title}}
      .bottom-info
        .hashtags 
          .hashtag(v-for="tag in hashtags") \#{{tag}}
        .date {{showDate}}
      //- p {{ post.description.slice(0,50) }}
    
</template>

<script>
import moment from 'moment'
export default {
  props: ['post','target','tag'],
  computed:{
    showDate(){
      return moment(this.post.established_time).format('YYYY[ 年 ]MM[ 月 ]DD[ 日 ]')
    },
    hashtags(){
      if (this.post.hashtags){
        return JSON.parse(this.post.hashtags)
      }
      return []
    }
  }
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
  box-shadow: 0px 0px 25px rgba(black,0.02)
  border-radius: 5px 5px 0 0
  text-decoration: none
  color: black
  transition: 0.5s
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
      left: 15px
      top: 0
      background-color: black
      color: white
      padding: 5px 10px
      font-weight: 900
  &:hover
    text-decoration: none
    color: inherit
    box-shadow: 0px 0px 20px rgba(black,0.1)
    transform: translate(0px,-1px)
  h4.company
    margin-bottom: 5px
    opacity: 0.4
    font-weight: normal
    font-size: 1em
    letter-spacing: 0.3px
  h3
    line-height: 1.67
    letter-spacing: 1px
    font-size: 20px
    min-height: 3.2em
    text-align: left
    margin-top: 0
  .bottom-info
    .hashtag
      margin-right: 10px
    .hashtag,.hashtags
      display: inline-block
    .date,.hashtag
      color: #4b4854
      font-size: 14px
      line-height: 2
      letter-spacing: 0.3px
    .hashtag
      color: #aaa5b5
    .date
      float: right
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
