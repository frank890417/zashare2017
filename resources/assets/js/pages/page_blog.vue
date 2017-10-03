<template lang="pug">
.page_blog
  .slick.carousel.slide(data-ride='carousel')
    // 文章輪播
    .item(
        @click="window.open('post/n/'+post.title ,'_self')", 
        style='cursor: pointer'
        v-for="(post,id) in show_posts"
      )
      .bg_parallax.carousel_bg(:style="{'background-image':'url('+post.cover+')'}")
      .carousel_cover
      .container.text-left
        .row
          .col-xs-12.col-sm-8
            .carousel-caption
              h5.text-left(style='opacity: 0.9') / {{post.name_cht}}
              h1.text-left {{post.title}}
              p.text-left(style='display: inline-block') {{  post.short_description }}
  .post-box-wrapper
    postbox(:posts="posts",
            :catalist="catalist",
            :filter_cata="filter_cata")

</template>

<script>
// import slick 
export default {
  metaInfo: {
    title: '展覽報導2016', // set a title
    titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
  },
  props: ['filter','filter_cata'],
  data(){
    return {
      posts: [],
      show_posts: [],
      catalist: []
    }
  },
  mounted(){
    axios.get("/api/page/blog").then((res)=>{
      this.posts=res.data.posts
      this.show_posts=res.data.show_posts
      this.catalist=res.data.catalist
      Vue.nextTick(()=>{
        $('.slick').slick({
          dots: true,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 2000,
        })

      })
    })
    
  }
}
</script>

<style>

</style>
