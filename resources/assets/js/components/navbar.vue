<template lang="pug">
nav.navbar.navbar-default.navbar-fixed-top
  .container
    .navbar-header
      // Collapsed Hamburger
      button.navbar-toggle.collapsed(type='button', data-toggle='collapse', data-target='#app-navbar-collapse')
        span.sr-only Toggle Navigation
        span.icon-bar
        span.icon-bar
        span.icon-bar
      // Branding Image
      router-link.navbar-brand(to="/", style="display: block")
        img(src='/img/2017/logo1011.svg', height='28px')
    #app-navbar-collapse.collapse.navbar-collapse
      // Left Side Of Navbar
      //
        <ul class="nav navbar-nav">
        &nbsp;
        </ul>
      // Right Side Of Navbar
      ul.nav.navbar-nav.navbar-right
        li(:class="{active: $router.path=='/news'}", @click="toggleNav")
          router-link(to="/news") 最新消息
        li.dropdown.dropdown_cata(:class="{active: $router.path=='/expo2017'}")
          router-link(to="/expo2017" ,role='button', aria-haspopup='true', aria-expanded='true')
            | 2017雜學校
            span.caret
          ul.dropdown-menu
            li.disable_current
              router-link(to='/expo2017') 購票資訊
            li.disable_current
              router-link(to='/expo2017/attends') 攤位一覽
            li.disable_current
              router-link(to='/expo2017/workshops') 活動與講座
            li.disable_current
              router-link(to='/expo2017/building') 場館介紹
            li.disable_current
              router-link(to='/expo2017/expoinfos') 展覽導覽
        //li(:class="{active: $router.path=='/expo2017'}", @click="toggleNav")
          router-link(to='/expo2017') 展覽購票
        li.dropdown.dropdown_cata(:class="{active: $router.path=='/blog'}")
          router-link(to="/blog/2016", role='button', aria-haspopup='true', aria-expanded='true')
            | 2016參展報導
            span.caret
          ul.dropdown-menu
            li.disable_current(v-for="cata in getYearCata('2016')")
              router-link(:to='`/blog/${cata.year}/${cata.name}`') {{cata.name}}
        //li.dropdown.dropdown_cata(:class="{active: $router.path=='/blog'}")
          router-link(to="/blog/2017", role='button', aria-haspopup='true', aria-expanded='true')
            | 參展報導2017
            span.caret
          ul.dropdown-menu
            li.disable_current(v-for="cata in getYearCata('2017')")
              router-link(:to='`/blog/${cata.year}/${cata.name}`') {{cata.name}}
            //- li.disable_current
            //-   router-link(to='/blog/B') 教育倡議與實踐
            //- li.disable_current
            //-   router-link(to='/blog/C') 媒體與資訊平台
            //- li.disable_current
            //-   router-link(to='/blog/D') 創客與程式設計
            //- li.disable_current
            //-   router-link(to='/blog/E') 文化與歷史生活
            //- li.disable_current
            //-   router-link(to='/blog/F') 肢體與藝術創作
            //- li.disable_current
            //-   router-link(to='/blog/G') 自然與食農教育
        

        //li(:class="{active: $router.path=='/about'}", @click="toggleNav")
          router-link(to='/about') 關於雜學校
        //li.dropdown.dropdown_cata(:class="{active: $router.path=='/blog'}")
          router-link(to='/blog', role='button', aria-haspopup='true', aria-expanded='true')
            | 2016參展報導
            span.caret
          ul.dropdown-menu
            li.disable_current
              router-link(to='/blog/A') 學校現場與實驗教育
            li.disable_current
              router-link(to='/blog/B') 教育倡議與實踐
            li.disable_current
              router-link(to='/blog/C') 媒體與資訊平台
            li.disable_current
              router-link(to='/blog/D') 創客與程式設計
            li.disable_current
              router-link(to='/blog/E') 文化與歷史生活
            li.disable_current
              router-link(to='/blog/F') 肢體與藝術創作
            li.disable_current
              router-link(to='/blog/G') 自然與食農教育
        li(:class="{active: $router.path=='/expo'}", @click="toggleNav")
          router-link(to='/expo') 歷屆展覽
       
</template>

<script>
import $ from 'jquery'
import {mapState} from 'vuex'
export default {
  mounted(){
    if ($('.dropdown').length>0){
      console.log("add event collapse")
      // if ($(window).width()>700){
      //   $('.dropdown').hover(function(){
      //     $(this).addClass('open');
      //   },function(){
      //     $(this).removeClass('open');
      //   });
      // }
      $(".dropdown").click(function(){
        $(this).toggleClass("open");
      });
      $(".dropdown-menu li").click(function(){
        // $(this).parent.toggleClass("open");
        $("#app-navbar-collapse").removeClass("in");
      });

      $(".dropdown_cata .dropdown-menu").click(function(){
        console.log("remove")
        setTimeout(()=>{
          $(".dropdown-menu").removeClass("open");
          $(".dropdown_cata").removeClass("open");
        },200)
      })
    }
  },
  methods: {
    toggleNav(){
      $(".navbar-collapse").collapse('hide');
    },
    getYearCata(year){
      return this.catas.filter(o=>o.year==year)
    }
  },
  computed: {
    ...mapState(['catas'])
  }
}
</script>

<style>

</style>
