<template lang="pug">
.page_post
  .container.post_area
    .row
      .col-sm-12

    .row(v-if="company")
      .col-xs-12.col-sm-3.text-left.col_company
        .hidden-xs
          br
          br
          // <h4> {{ company.tag }}
          a(:href='company.website', target='_blank', :title='`前往 ${company.name_cht} 網站`')
            img(:src='"http://2016.zashare.org/img/square_logos/"+(company.tag)+".jpg"')
          h5.text-muted(v-text="'#'+ catalist[ post.tag ]")
          h3
            | {{ company.name_cht}}
            //
              <a class='company_link' href="{{company.website}}" target="_blank" title='前往{{ company.name_cht }}網站'>
              <i class="fa fa-link"></i>
              </a>
          // <br>
          p.col_describe  {{ company.discribe_cht }}
      .col-xs-12.col-sm-9.col_post.col-sm-offset-3
        .col-sm-12
          .post_image(:style='{"background-image":"url(" + post.cover + ")"}', alt='')
            .infos
              h5.visible-xs  / {{ company.name_short }}
              h1 {{ post.title }}
              h5.jour {{ post.author }}
              h5.jour {{ post.updated_at.split(" ")[0] }}
          hr
          .content-area(v-html="post.content")
          .visible-xs.col_company2
            a(:href='company.website', target='_blank', :title='"前往"+ company.name_short +"網站"')
              img(:src='"http://2016.zashare.org/img/square_logos/"+company.tag+".jpg"')
            br
            h5.text-muted(v-text="'#'+ catalist[ post.tag ]")
            br
            h3
              | {{ company.name_cht}}

            p  {{ company.discribe_cht }}
          .btns.text-center
            a.btn.btn-primary(:href='"https://www.facebook.com/sharer/sharer.php?u="+now_url', target='_blank') 分享文章
            a.btn.btn-link(href='#', onclick='window.history.back();') 回上一頁
          br
        br
        .col-sm-12
          #fb-root

          .fb-comments(:data-href='now_url', data-numposts='5', data-width='100%')
        .col-sm-12
          h2 相關類別文章
          hr
        .col-sm-6(
          style='cursor:pointer'
          v-for="rpost in related_posts")
          router-link.relate_cover(:style='{"background-image":"url("+rpost.cover+")"}',
                          :to='"/post/n/"+rpost.title')
            .mask
            .related_info
              h3(style='margin: 0;margin-bottom: 10px') {{ rpost.title }}
              p  {{ rpost.short_description }}

</template>

<script>
import $ from 'jquery'
export default {
  metaInfo() {
    return {
      title: this.title, // set a title
      titleTemplate: '參展報導 - %s - 雜學校 Zashare', // title is now "My Example App - Yay!" 
    }
  },
  props: ["title"],
  data(){
    return {
      // title: "",
      company: null,
      posts: [],
      related_posts: [],
      catalist: [],
      now_url: window.location.href
    }
  },
  mounted(){
    axios.get("/api/post/n/"+this.title).then((res)=>{
      // this.title=res.data.title
      this.post=res.data.post
      this.company=res.data.company
      this.related_posts=res.data.related_posts
      this.catalist=res.data.catalist

      Vue.nextTick(()=>{
        let col_descibe=$(".col_describe");
        if ($(".col_describe").length>0){
          $(window).scroll(function(){
            if (col_descibe.offset().top+col_descibe.outerHeight() > $("footer").offset().top ){
              col_descibe.css("opacity",0);
            }else{
              col_descibe.css("opacity",1);
            }
            console.log(col_descibe.css("opacity") );
          });
        }
      })
    })
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8&appId=756438861174269";
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'))
    
    
  }
}
</script>

<style lang="sass?indentedSyntax">
.relate_cover
  display: block
</style>
