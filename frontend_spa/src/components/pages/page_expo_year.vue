<template lang="pug">
.page.page-post.page-expo-year.right.animated.fadeIn
  .container.text-left
    .row.row-banner
      .col-sm-12
        .cover(:style="bgcss(expo.cover)")
        br
        br
    .row
    .row.row-header  
      .col-sm-12
        h3 {{expo.year}}
        h1 {{expo.title}}
        //- h2 有敢擇學 MY BRAVECATION!
      .col-sm-12
        div
          p TIME: {{expo.year}}/{{expo.time}}<br>PLACE: {{expo.place}}
          //- .tags #影音　#影音　#影音
      .col-sm-12
        hr
    .row.row-content
      .col-sm-12
        p(v-html="replaceBr(expo.content)")
    .row.row-recommand(v-if="recommandPosts.length")
      .col-sm-12
        h4 推薦參展報導
          router-link.float-right.more-btn(:to="`/expo/${expo.year}/blog`") 更多參展報導
        hr
    .row(v-if="recommandPosts.length")
      .col-xl-4.col-lg-6.col-md-6.col-sm-12.col-xs-12.wow.fadeIn(v-for="(post,pid) in recommandPosts", :class="'delay-ani-'+pid") 
        newsbox.text-left(:post='post', :target='`/expo/${$route.params.year}/blog/${post.id}`',tag="ZA EXPO")

</template>

<script>
import {mapState, mapGetters} from 'vuex'
export default {
  data(){
    return {
      
    } 
  },
  computed: {
    ...mapState({
      expos: state=>state.expos,
      // posts: state=>state.post.posts

    }),
    ...mapGetters({
      posts: "post/availblePosts"
    }),
    expo(){
      return this.expos.find(o=>o.year==this.$route.params.year)
    },
    recommandPosts(){
      return this.posts.filter(o=>o.year==this.$route.params.year).slice(0,3)
    }

  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"

.page-expo-year
  .row-banner
    .cover
      padding-bottom: 40%
      background-size: cover
      background-position: center center
      height: 250px
      // margin-top: 60px
      margin-top: 60px
      // margin-left: -15px
      // margin-right: -15px
      +rwd_md
        margin-top: 0
        margin-left: -15px
        margin-right: -15px
        width: 100vw
  .row-recommand
    margin-top: 60px
  h3
    vertical-align: middle
  .more-btn
    font-size: 18px
    color: #bbb
    text-decoration: none
    +trans
    margin-top: 5px
    &:hover
      color: #999
      
  
</style>
