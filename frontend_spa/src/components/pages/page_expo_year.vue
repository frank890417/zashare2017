<template lang="pug">
.page.page-post.page-expo-year.right.animated.fadeIn
  .container
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
    .row
      .col-sm-12
        h3 推薦參展報導
        hr
    .row
      .col-sm-4(v-for="post in recommandPosts") 
        newsbox(:post='post', :target='`/expo/${$route.params.year}/blog/${post.id}`',tag="ZA EXPO")
        
</template>

<script>
import {mapState} from 'vuex'
export default {
  data(){
    return {
      
    } 
  },
  computed: {
    ...mapState({
      expos: state=>state.expos,
      posts: state=>state.post.posts

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
.page-expo-year
  .cover
    min-height: 400px
    background-size: cover
    background-position: center center
    
</style>
