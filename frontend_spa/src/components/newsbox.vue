<template lang="pug">
.news_box.animated.fadeIn(:is="target.indexOf('http')!=-1?'a':'router-link'" 
            :to="target", :href="target", :target="target.indexOf('http')!=-1?'_blank':'_self'" )
  .row(v-if="post")
    .col-sm-12.col-cover
      .cover.animated.fadeIn.news_box_cover
        .innerCover.animated.fadeIn.delay-ani-3(:style="bgcss(post.cover)")
        .tag(v-if="!hideTag") {{ tag || 'ZA SHARE'}}
    .col-sm-12.col-info
      h4.company(v-if="post.company && !hideDetail") {{post.company ? post.company.name_cht : ""}}
      h3 {{post.title}}
      .bottom-info(v-if="!hideDetail")
        .hashtags 
          .hashtag(v-for="tag in hashtags") \#{{tag}}
        .date {{showDate}}
      //- p {{ post.description.slice(0,50) }}
    
</template>

<script>
import moment from 'moment'
export default {
  props: ['post','target','tag',"hideTag","hideDetail"],
  computed:{
    showDate(){
      return moment(this.post.established_time).format('YYYY[ 年 ]MM[ 月 ]DD[ 日 ]')
    },
    hashtags(){
      if (this.post.hashtag){
        return JSON.parse(this.post.hashtag)
      }
      return []
    }
  }
}
</script>

<style lang="sass">
@import "../assets/_mixins.sass"
.news_box
  background-color: #fff
  box-sizing: border-box
  position: relative
  margin-bottom: 50px
  cursor: pointer
  display: block
  box-shadow: 0px 0px 25px rgba(black,0.02)
  border-radius: 6px 6px 0 0
  text-decoration: none
  color: black
  transition: 0.5s
  
  // margin: 10px
  &:hover
    .col-cover .cover.news_box_cover,.col-cover .innerCover
      background-size: 125% auto
      
  .col-cover
    .cover.news_box_cover
      height: 0
      width: 100%
      min-height: 0
      padding-bottom: 60%

      position: relative
      transition: 0.5s
      border-radius: 6px 6px 0 0
    .innerCover
      +size(100%)
      position: absolute
      border-radius: 6px 6px 0 0
      left: 0
      top: 0
      background-position: center center
      background-size: 120% auto
      +trans

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
    margin-top: 20px
    min-height: 1em
    +rwd_md
      font-size: 15px
  h3
    line-height: 1.67
    letter-spacing: 1px
    font-size: 20px
    min-height: 3.2em
    text-align: left
    margin-top: 10px
    +rwd_md
      font-size: 18px
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
      background-color: #555
</style>
