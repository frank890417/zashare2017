<template lang="pug">
.menu(:class="{open: menuState}")
  transition(name="fade")
    .hambergur(@click="hambergurAction ", v-if="menuState || mobile")
      .icon-bar
      .icon-bar

  transition(name="fade")
    .fullPage(v-if="menuState")
      div(v-if="menuType=='search'")
        .col-sm-12
          .container.container-menu
            .row.row-search
              .col-sm-12
                input(placeholder="搜尋雜學校", v-model="tempSearchKeyword")
                div.pull-right.clearInput(@click="setSearchKeyword('')")
                  i.fa.fa-search(v-show="searchKeyword==''")
                  i.fa.fa-times(v-show="searchKeyword!=''")
                h3.input-text-count.pull-right(v-if="searchKeyword!=''") 共有 {{ filteredPost.length }} 項結果
                
                              
              .col-sm-12
                .tags.scrollX
                  .tag(v-for="tag in tags", @click="setSearchKeyword(tag)") {{tag}}
        br
        .col-sm-12
          .container
            div.row(v-if="searchKeyword!=''" 
                    @click="setMenuState(false)")
              newsbox.col-lg-4.col-md-6.col-sm-12(v-for="post in filteredPost", 
                              :post = "post" ,
                               :target="postTarget(post)",
                               :key="post.title",
                              :tag="post.tag",
                              :hideDetail="true")
      .row.row-page.h100(v-if="menuType=='nav'")
        .col-mobile-menu.col-sm-12
          .container.container-menu
            .row( v-if="searchKeyword==''")
                      
            .row-logo( @click="setMenuState(false)")
              router-link.col-sm-12.logo-part(to="/")
                img.logo-img(src="/static/img/Home/za-logo.svg") 
            .row-bottom
              .col-login
                span(v-if="auth.user") 
                  span Hello
                  span(@click="openMenu('login')") 雜學校學生
                    b {{auth.user.name}}
                span(v-else) 
                  b(style="margin-right: 30px") 雜學校 
                  span(@click="openMenu('login')")  登入 / 註冊
                span &nbsp;&nbsp;|&nbsp;&nbsp;
                span 
                  b(@click="openMenu('search')")  搜尋
              div(@click="setMenuState(false)")
                router-link.col-theme-nav.text-center.nav-course(to="/about")
                  span 關於雜學校
                router-link.col-theme-nav.text-center.nav-base(to="/expo")
                  span 歷屆展覽
                a.col-theme-nav.text-center.nav-expo(href="https://www.zashare.com.tw", target="_blank")
                  span 線上商店
            //.row
              .col-sm-12
                hr
              .col-sm-8
                h3 聯絡資訊　Contact Info
                ul.infos
                  li 
                  li Tel. +886-2-2729-7122
                  li Mail. zashare@ozzie-art.com
                  li Business hours. 10:00-19:00 Mon. - Fri.
              .col-sm-4
                p 網站製作：墨雨設計<br>© 2018 雜學校 Za Share All Rights Reserved.

        //登入跟會員頁面
      div(v-if="menuType=='login'")
        panel_member
                
</template>

<script>
import {mapState,mapMutations, mapActions, mapGetters} from 'vuex'
import navbar from './navbar.vue'
import panel_member from './panels/panel_member.vue'

export default {
  data() {
    return {
      tags: "師培、教具、國小、偏鄉、國中、高中、大學、實驗教育、媒體".split("、"),
      tempSearchKeyword: "",
      coupontypes: []
    }
  },
  computed: {
    ...mapState({
      menuState: state=>state.menuState,
      posts: state => state.post.posts,
      searchKeyword: state=>state.searchKeyword,
      menuType: state=>state.menuType,
      mobile: state=>state.mobile,
      auth: state=>state.auth,

      token: state=>state.auth.token,
      news: state=>state.post.news
    }),
    filteredPost(){
      return this.posts.map(o=>({...o,tag: "ZA EXPO"}))
            .filter(o=>JSON.stringify(o).indexOf(this.searchKeyword)!=-1)
            .filter(o=>o.status=="published")
    },
    latestNews(){
      return this.news.slice(-1)[0]
    },
    ...mapGetters({
      getUserPhoto: 'auth/getUserPhoto',
      isAdmin: 'auth/isAdmin'
    }),
  },
  methods: {
    ...mapMutations(['setMenuState','setSearchKeyword','openMenu']),
    ...mapActions({
      register: 'auth/register',
      login: 'auth/login',
      logout: 'auth/logout',
      loginFacebook: "auth/loginFacebook",
      authInit: "auth/init"
    }),
    postTarget(post){
      if (post.type=="expo"){
        return `/expo/blog/${post.id}`
      }

      if (post.type=="news"){
        return `/news/${post.id}`
      }
    },
    hambergurAction(){
      if (!this.menuState){
        this.openMenu('nav')
      }else{
        this.setMenuState(false)
      }
    },

    loadAllCoupon(){
      this.axios.post("/api/coupontype/user",{
        token: this.token,
      }).then(res=>{
        this.coupontypes = res.data
      })
    },
    getCoupon(coupontype){
      this.axios.post(
          `/api/coupontype/userget/`+coupontype.id,
          { 
            token: this.token,
          }
        ).then(res=>{
          this.$message({
            message: '資料更新成功',
            type: 'success'
          });
          // let _this  = this
          this.loadAllCoupon();
        })
    }
  },
  mounted(){
    if (this.menuState && this.menuType=="login" && this.auth.user){
        this.loadAllCoupon()

      }
  },
  watch: {
    tempSearchKeyword(){
      this.setSearchKeyword(this.tempSearchKeyword)
    },
    searchKeyword(){
      if (this.tempSearchKeyword!=this.searchKeyword){
        this.tempSearchKeyword=this.searchKeyword
      }
    },
    menuState(){
      if (this.menuState && this.auth.user){
        this.loadAllCoupon()

      }
    },
    user(){
      if (this.menuState && this.auth.user){
        this.loadAllCoupon()

      }
    }
  },
  components: {
    navbar,panel_member
  }
}
</script>

<style lang="sass">
@import "../assets/_mixins.sass"

.menu-nav-mobile
  position: relative
  width: 100%
  height: 100%
  
.hambergur
  +size(72px)
  position: fixed
  right: 0px
  top: 0px
  background-color: black
  padding: 10px
  cursor: pointer
  z-index: 50
  +rwd_md
    left: 0
    top: 0
    +size(60px)
    .icon-bar
      +size(30px,3px)
      &:nth-child(1)
        top: 40%
      &:nth-child(2)
        top: 60%
.menu
  input
    border: none
    outline: none
    width: 100%
    background-color: transparent
    padding: 5px 10px
    border-bottom: solid 1px rgba(#131116,0.2)
    margin-bottom: 10px


  &.open
    .hambergur
      .icon-bar:nth-child(1)
        top: 50%
        transform: translate(-50%,-50%) rotate(45deg)
      .icon-bar:nth-child(2)
        top: 50%
        transform: translate(-50%,-50%) rotate(-45deg)

  .container-posts
    max-height: 60vh
    overflow: hidden
    overflow-y: auto
    
  .icon-bar
    width: 40px
    height: 4px
    // margin: 8px 0px
    position: absolute
    left: 50%
    top: 50%
    transform: translate(-50%,-50%)
    background-color: #fff
    transform-origin: center center
    transition: 0.5s
    &:nth-child(1)
      top: 35%
    &:nth-child(2)
      top: 65%

  .fullPage
    position: fixed
    width: 100vw
    // height: auto
    overflow-y: auto
    // min-height: 100vh
    height: 100vh
    // padding: 20px

    top: 0
    left: 0
    background-color: #fff
    z-index: 40
    box-sizing: border-box
    text-align: left

    a
      display: inline-block
      color: inherit
      text-decoration: none

      
    h2
      font-size: 40px
      font-weight: 900
      margin-bottom: 20px
      text-transform: Uppercase

    .row-page
      
      height: 100vh
      min-height: 100vh
      // overflow: hidden
      overflow-y: auto
      position: relative
      &.h100
        height: 100vh
      +rwd_md
        height: auto
        overflow-y: auto
      &.h100
        +rwd_md
          height: 100vh
      
    .col-menu
      height: 100vh
    .col-menu
      padding: 50px 60px
      padding-left: 100px
      box-sizing: border-box
      .container
        margin-top: 20px
        +rwd_md
          margin-top: 0
          padding-top: 0
      +rwd_md
        padding: 0px

        // height: auto
        overflow-y: auto



    +rwd_md
      width: 100vw
      // padding-top: 80px
      overflow-y: auto
      // height: auto
      .nav-short-description
        display: none
      h2
        margin-top: 10px
        margin-bottom: 30px
        font-size: 24px
      .col-menu
        padding: 20px 60px
        padding-right: 20px
      .container-menu
        overflow-y: auto
        height: auto
        
        // margin-bottom: 100px
        // min-height: 100vh
        .row
          flex-shrink: 0
      .row-search
        width: 100%

    .row-search
      flex-shrink: 0
      padding-bottom: 20px
      padding-top: 100px
      .fa-search,.fa-times
        // position: absolute
        // right: 30px
        font-size: 28px

      .clearInput
        // position: absolute
        font-size: 20px
        // top: calc( 50% - 10px)
        // right: 30px
        // transform: translateY(-50%)
        cursor: pointer
        transition: 0.5s
        transform-origin: center center
        margin-top: -45px
        &:hover
          transform: scale(1.1)
      .input-text-count
        opacity: 0.5
        font-weight: 500
        font-size: 22px
        margin-right: 40px
        margin-top: -45px
        
        
      input
        font-size: 24px
      .tags
        // display: none
        display: flex
        +rwd_lg
          display: flex

        .tag
          white-space: nowrap
          margin: 10px
          background-color: #eee
          padding: 5px 10px
          cursor: pointer
          &:hover
            background-color: #ddd
    .container-menu
      display: flex
      flex-direction: column
      height: 100%
      max-width: 900px
      padding: 20px
      justify-content: space-between
            
    .nav-course
      &:hover,&.router-link-active
        background-color: #8135f9
    .nav-base
      &:hover,&.router-link-active
        background-color: #8af187
    .nav-expo
      &:hover,&.router-link-active
        background-color: #1161ef

  .infos
    list-style: none
    margin-bottom: 30px
    padding: 0

  .col-mobile-menu
    padding-left: 0
    padding-right: 0
    .logo-img
      margin: auto
    .logo-part
      +flexCenter
    .col-login
      padding: 35px 50px
      text-align: center
    .col-theme-nav
      padding: 35px 50px
      display: block
      text-decoration: none
      border-bottom: solid 1px #333
      cursor: pointer
      transition: 0.5s
      background-color: black
      color: white
      margin-left: -20px
      margin-right: -20px
      // margin-bottom: -10px
      width: calc(100% + 40px)
      // font-size: 24px
    .row-logo
      display: flex
      justify-content: center
      align-items: center
      width: 100%

      img
        width: 150px
      +rwd_md
        height: 100%
    .row-bottom
      margin-bottom: -20px
    .col-theme-nav
      &:hover 
        background-color: #aaa


  .col-member
    position: relative
    display: flex
    justify-content: center
    min-height: 100vh
    .fa-info
      +size(20px)
      +flexCenter
      background-color: black
      color: white
      border-radius: 50%
      display: inline-flex
      margin-left: 20px
      font-size: 15px

    .photo.small
      +size(36px)

    h4
      font-size: 1em
      opacity: 0.3
      margin-top: 30px
    ul
      list-style: none
      padding: 0
      li
        margin-bottom: 10px
        
    .row-coupon
      border-top: 1px solid rgba(black,0.1)
      padding-top: 30px
      .tag
        background-color: black
        color: white
        padding: 0px 10px
        display: inline-block
        font-weight: 800
    .coupon-box-inner
      .cover
        width: 100%
        height: 150px        
        background-color: #b7b7b7
        position: relative
        background-position: center center
        background-size: cover
        .num
          position: absolute
          left: 0
          top: 0
          background-color: black
          color: white
          padding: 5px 10px
          font-size: 15px
      .info
        background-color: #ddd
        padding: 10px
        margin-top: -20px
</style>
