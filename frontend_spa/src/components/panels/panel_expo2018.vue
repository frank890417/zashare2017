<template lang="pug">
div(:class="{container: this.$route.path=='/member/registexpo2018'}")
  .row.row-expo2018(  
    :key="menuState", 
    @click="setMenuState(false)").text-left

    .col-sm-6
      router-link.box.big(to="/member/registexpo").animated.fadeIn.delay-3
        .cover
          .bg(:style="bgcss('/static/img/regist2018/ZAEXPO.jpg')")
          .infotext
            span {{ $t('menu.label_status') }}：<br>
            span(v-if="registExpo.id") {{ $t('menu.status_registered') }}&nbsp;|&nbsp;
            span(v-else) {{ $t('menu.status_not_registered') }} &nbsp;|&nbsp;
            span(v-if="!registExpo.paid_record") 未繳費
            span(v-if="registExpo.paid_record && !registExpo.paid_record.confirm") 主辦單位確認中
            span(v-if="registExpo.paid_record && registExpo.paid_record.confirm") 已繳費
        .info 
          div
            h5 {{ $t('menu.label_registexpo') }}
            router-link.float-right.btn(to="/member/registexpo/paid",
                                            v-if="registExpo.id ").animated.fadeIn.delay-6 確認繳交報名費
          span(v-if="registExpo") 參展編碼： 
            span(v-if="registExpo.id") {{ registId }}
          br
          span(v-if="registExpo") 參展單位名稱： 
            span(v-if="registExpo.id") {{ registExpo.name_cht }}

    .col-sm-6
      router-link.box(to="/member/registexpo/workshop").animated.fadeIn.delay-9
        .cover
          .bg(:style="bgcss('/static/img/regist2018/ZAWORKSHOP.jpg')")
          .infotext
            span {{ $t('menu.label_status') }}：
            span(v-if="!registExpo.id") 需先報名參展
            span(v-else)
              span(v-if="registExpo.regist_workshop") {{ $t('menu.status_registered') }}
              span(v-else) {{ $t('menu.status_open_register') }}
        .info  {{ $t('menu.label_registexpoworkshop') }}
      router-link.box(to="/member/registexpo/speak") 
        .cover
          .bg(:style="bgcss('/static/img/regist2018/Zac.jpg')")
          .infotext
            span {{ $t('menu.label_status') }}：
            span(v-if="!registExpo.id") 需先報名參展
            span(v-else)
              span(v-if="registExpo.regist_expo_speak") {{ $t('menu.status_registered') }}
              span(v-else) {{ $t('menu.status_open_register') }}
        .info  {{ $t('menu.label_registexpospeak') }}
        
</template>

<script>
import {mapState,mapMutations, mapActions, mapGetters} from 'vuex'
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
      news: state=>state.post.news,
      registExpo: state=>state.registExpo,
      
    }),
    filteredPost(){
      return this.posts.map(o=>({...o,tag: "ZA EXPO"})).filter(o=>JSON.stringify(o).indexOf(this.searchKeyword)!=-1)
    },
    latestNews(){
      return this.news.slice(-1)[0]
    },
    ...mapGetters({
      getUserPhoto: 'auth/getUserPhoto',
      isAdmin: 'auth/isAdmin'
    }),
    registId(){
      return "Z"+("000000"+this.registExpo.id).slice(-3)
    }
  },
  methods: {
    ...mapMutations(['setMenuState','setSearchKeyword','openMenu']),
    ...mapActions({
      register: 'auth/register',
      login: 'auth/login',
      logout: 'auth/logout',
      loginFacebook: "auth/loginFacebook",
      authInit: "auth/init",
      loadRegistData: "loadRegistData"
    }),
    postTarget(post){
      // if (this.$route.meta.type=="expo"){
        return `/expo/${post.year}/blog/${post.id}`
      // }

      // if (this.$route.meta.type=="news"){
      //   return `/news/${post.id}`
      // }
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
  },
  mounted(){
    this.loadRegistData()
  
  },
  watch: {
  
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"
.row-expo2018
  position: relative
  z-index: 100

  a.box
    margin-top: 20px
    box-shadow: 0px 0px 20px 5px rgba(black,0.1)
    border-radius: 5px
    display: block
    color: black


    +trans
    &:hover
      transform: translate(-2px,-2px)
      text-decoration: none

    .cover
      // height: 100px
      background-size: cover
      border-radius: 5px 5px 0px 0px
      height: 0
      padding-bottom: 20%
      position: relative
      .infotext
        position: absolute
        bottom: 10px
        left: 10px
      .bg
        position: absolute
        border-radius: 5px 5px 0px 0px
        +size(100%)
        left: 0
        top: 0
        background-size: cover
        background-position: left center !important


    .info
      padding: 15px 20px
    &.big
      .cover
        // height: 220px
        height: 0
        padding-bottom: 50%
    .btn
      &:hover
        background-color: #ddd
  .box
    .cover
      color: white
      display: flex
      justify-content: flex-start
      align-items: flex-end
      padding: 10px
</style>
