<template lang="pug">

.row.row-expo2018( v-if="isAdmin", :key="menuState").text-left
  .container
    .col-sm-12
      .tag 2018 ZA EXPO
      i.fa.fa-info
      | &nbsp;&nbsp;2018 年 6 月 15 日 申請截止
    .col-sm-12
      .row(@click="setMenuState(false)")
        .col-sm-6
          router-link.box.big(to="/member/registexpo").animated.fadeIn.delay-3
            .cover(:style="bgcss('/static/img/regist2018/ZAEXPO.jpg')")
              span 申請/繳費狀態：
              span(v-if="registExpo.id && !registExpo.paid_record") 已報名 未繳費
              span(v-if="registExpo.id && registExpo.paid_record") 已繳費
              span(v-if="!registExpo.id ") 未報名
            .info 
              div
                h5 參展申請
                router-link.float-right.btn(to="/member/registexpo/paid",
                                                v-if="registExpo.id ").animated.fadeIn.delay-6 繳費確認
              span(v-if="registExpo") 參展編碼： 
                span(v-if="registExpo.id") {{ registId }}
              br
              span(v-if="registExpo") 參展單位名稱： 
                span(v-if="registExpo.id") {{ registExpo.name_cht }}

        .col-sm-6
          router-link.box(to="/member/registexpo/workshop").animated.fadeIn.delay-9
            .cover(:style="bgcss('/static/img/regist2018/ZAWORKSHOP.jpg')")
              span 申請狀態：
              span(v-if="registExpo.regist_workshop") 已報名
              span(v-else) 開放報名
            .info 雜工坊
          router-link.box(to="/member/registexpo/speak") 
            .cover(:style="bgcss('/static/img/regist2018/Zac.jpg')")
              span 申請狀態：
              span(v-if="registExpo.regist_expo_speak") 已報名
              span(v-else) 開放報名
            .info Zac. 教育新創短講評選
          
</template>

<script>
import {mapState,mapMutations, mapActions, mapGetters} from 'vuex'
export default {
  data() {
    return {
      tags: "師培、教具、國小、偏鄉、國中、高中、大學、實驗教育、媒體".split("、"),
      tempSearchKeyword: "",
      coupontypes: [],
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
      height: 100px
      background-size: cover
      border-radius: 5px 5px 0px 0px
    .info
      padding: 15px 20px
    &.big
      .cover
        height: 220px
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
