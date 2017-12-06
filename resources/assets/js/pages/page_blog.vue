<template lang="pug">
.page_blog
  
  .slick.carousel.slide(data-ride='carousel')
    // 文章輪播
    // 
    a.item(
        style='cursor: pointer',
        v-for="(post,id) in show_posts",
        :href="(''+post.cover).indexOf('richartXhahow')!=-1?('https://goo.gl/CgwNZZ'):('/post/n/'+post.title)"
      )
      //- img.carousel_image(:src="post.cover")
      .bg_parallax.carousel_bg(:style="{'background-image':'url('+post.cover+')'}")
      .carousel_cover
      .container.text-left
        .row
          .col-xs-12.col-sm-8
            .carousel-caption(v-if="post.tag!='H'")
              h5.text-left(style='opacity: 0.9') / {{post.name_cht}}
              h1.text-left {{post.title}}
              p.text-left(style='display: inline-block') {{  post.short_description }}
  .post-box-wrapper
    postbox(:posts="YearPosts",
            :catalist="catalist",
            :cataname="filter_cata",
            :init_filter_cata="filter_cata")

</template>

<script>
// import slick 
export default {
  metaInfo: {
    title: '展覽報導', // set a title
    titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
  },
  props: ['filter','filter_cata','year'],
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
          autoplaySpeed: 4000,
        })

      })
    })
    
  },
  computed:{
    YearPosts(){
      return this.posts.filter(o=>o.year==this.year)
    }
  },
  methods:{
    openpost(post){
      if ((""+post.cover).indexOf("richartXhahow")!=-1){
        if (this.$ga) {this.$ga.event('sponsor','click','richartXhahow')}
        window.open( "https://goo.gl/CgwNZZ" ,'_self')
      }else{
        window.open('post/n/'+post.title ,'_self')

      }
    },
    
  }
}
</script>

<style>

</style>
