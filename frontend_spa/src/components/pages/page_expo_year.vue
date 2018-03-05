<template lang="pug">
.page.page-post.page-expo-year.right.animated.fadeIn
  .container.text-left
    .row.row-banner
      .col-sm-12
        .cover(:style="bgcss(expo.cover)")
    .row.row-header  
      .col-sm-12
        h3 {{expo.year}}
        h1 {{expo.title}}
        //- h2 有敢擇學 MY BRAVECATION!
      .col-sm-12
        div
          p TIME: {{expo.year}}/{{expo.time}}<br>PLACE: {{expo.place}}
          //- .tags #影音　#影音　#影音
    .row
      .col-sm-12
        hr
    .row.row-content
      .col-sm-12
        p(v-html="replaceBr(expo.content)")
    .row.row-recommand(v-if="recommandPosts.length")
      .col-sm-12
        h3 推薦參展報導
        hr
    .row(v-if="recommandPosts.length")
      .col-xl-4.col-lg-6.col-md-6.col-sm-12.col-xs-12(v-for="post in recommandPosts") 
        newsbox(:post='post', :target='`/expo/${$route.params.year}/blog/${post.id}`',tag="ZA EXPO")

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
  .cover
    padding-bottom: 40%
    background-size: cover
    background-position: center center
    height: 250px
    margin-top: 60px
    +rwd_md
      margin-left: -15px
      margin-right: -15px
      width: 100vw
  .row-recommand
    margin-top: 60px
    
</style>
