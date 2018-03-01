<template lang="pug">
.menu(:class="{open: menuState}")
  .hambergur(@click="setMenuState(!menuState)")
    .icon-bar
    .icon-bar
  transition(name="fade")
    .fullPage(v-if="menuState")
      .row.row-page
        .col-menu.col-sm-9
          .container.container-menu
            .row.row-search
              .col-sm-12
                input(placeholder="搜尋雜學校", v-model="searchKeyword")
                
                div.clearInput(@click="searchKeyword=''")
                  i.fas.fa-search(v-show="searchKeyword==''")
                  i.fas.fa-times(v-show="searchKeyword!=''")
                
                              
              .col-sm-12
                .tags.scrollX
                  .tag(v-for="tag in tags", @click="searchKeyword=tag") {{tag}}
            .row( @click="setMenuState(false)" v-if="searchKeyword==''")
              router-link.col-sm-4(to="/")
                h2 Home
                p.nav-short-description 回首頁
              router-link.col-sm-4(to="/news")
                h2 News
                p.nav-short-description 最新消息
              router-link.col-sm-4(to="/about")
                h2 About
                p.nav-short-description 關於雜學校
            
            .row(@click="setMenuState(false)" v-if="searchKeyword==''")
              router-link.col-sm-4(to="/expo")
                h2.nav-expo ZA EXPO
                p.nav-short-description 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、框架...
              router-link.col-sm-4(to="/base")
                h2.nav-base ZA BASE
                p.nav-short-description 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化的價值、框架...
              router-link.col-sm-4(to="/course")
                h2.nav-course ZA COURSE
                p.nav-short-description 我們想著有沒有一間學校，沒有制式的選擇、沒有標準化值、沒有框架...
              
            div.row(v-if="searchKeyword!=''" 
                    @click="setMenuState(false)").scrollY
              newsbox.col-lg-4.col-md-6.col-sm-12(v-for="post in filteredPost", 
                              :post = "post" ,
                               :target='`/expo/blog/${post.id}`',
                               :key="post.title",
                              :tag="post.tag")

            .row
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
        .col-member.col-sm-3
          auth_panel
</template>

<script>
import {mapState,mapMutations, mapActions, mapGetters} from 'vuex'
export default {
  data() {
    return {
      tags: "師培、教具、國小學童、偏鄉、國中生、高中生、大學生、實驗教育、媒體".split("、"),
      searchKeyword: ""
    }
  },
  computed: {
    ...mapState({
      menuState: state=>state.menuState,
      posts: state => state.post.posts
    }),
    filteredPost(){
      return this.posts.map(o=>({...o,tag: "ZA EXPO"})).filter(o=>JSON.stringify(o).indexOf(this.searchKeyword)!=-1)
    }
  },
  methods: {
    ...mapMutations(['setMenuState']),
    ...mapActions({
      register: 'auth/register',
      login: 'auth/login',
      logout: 'auth/logout',
      loginFacebook: "auth/loginFacebook",
      authInit: "auth/init"
    }),
    ...mapGetters({
      getUserPhoto: 'auth/getUserPhoto',
      isAdmin: 'auth/isAdmin'
    })
  },
  mounted(){
    // this.authInit()
  }
}
</script>

<style lang="sass">
@import "../assets/_mixins.sass"


.hambergur
  +size(72px)
  position: fixed
  left: 0px
  top: 50px
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
  width: 100%
  height: 100%
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
    height: 100%
    +rwd_md
      overflow-y: auto
  .col-menu,.col-member
    height: 100%
  .col-menu
    padding: 50px 60px
    padding-left: 100px
    .container
      margin-top: 20px
      +rwd_md
        margin-top: 0
        padding-top: 0



  +rwd_md
    width: 100vw
    overflow-y: auto
    height: auto
    .nav-short-description
      display: none
    h2
      margin-top: 10px
      margin-bottom: 30px
      font-size: 24px
    .col-menu
      padding: 20px 60px
    .container-menu
      overflow-y: auto
      height: 100vh
      margin-bottom: 100px
      .row
        flex-shrink: 0
    .row-search
      width: 100%

  .col-member
    background-color: #eee
    padding: 40px
    box-sizing: border-box
    display: flex
    justify-content: center
    align-items: center
    .card
      text-align: center
      display: flex
      justify-content: center
      width: 100%
      box-sizing: border-box
      flex-direction: column
      .card-loading
        position: absolute
        width: 100%
        height: 100%
        background-color: rgba(#eee,0.6)
        // opacity: 0.5
        left: 0
        top: 0

      .top
        display: flex
        justify-content: center
        flex-direction: column
        align-items: center
        margin-bottom: 3px
        background-color: white
        padding: 25px
        padding-bottom: 0
        .name
          font-size: 18px
      .bottom
        background-color: white
        padding: 25px
      .photo
        width: 100px
        height: 100px
        margin-top: 55px
        margin-bottom: 40px
        background-color: black
        background-position: center center
        background-repeat: no-repeat
        background-size: 80% auto
  .row-search
    flex-shrink: 0
    padding-bottom: 20px
    .fa-search,.fa-times
      // position: absolute
      // right: 30px
      font-size: 28px

    .clearInput
      position: absolute
      font-size: 20px
      top: calc( 50% - 10px)
      right: 30px
      transform: translateY(-50%)
      cursor: pointer
      transition: 0.5s
      transform-origin: center center
      &:hover
        font-size: 25px
      
    input
      font-size: 24px
    .tags
      display: none
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
    justify-content: space-between
          
  .nav-course
    &:hover,&.router-link-active
      color: #8135f9
  .nav-base
    &:hover,&.router-link-active
      color: #8af187
  .nav-expo
    &:hover,&.router-link-active
      color: #1161ef

.infos
  list-style: none
  margin-bottom: 30px
  padding: 0


</style>
