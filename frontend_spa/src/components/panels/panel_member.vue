<template lang="pug">
.col-member
  auth_panel(v-if="!auth.user")
  .container(v-else)
    .row
      .col-sm-12
        .row.mt-5
          .col-sm-7
            .photo.small(:style="bgcss(getUserPhoto)")
            span Hello! {{auth.user.name}}
              span(@click="logout", style="opacity: 0.5").curp &nbsp;{{ $t('menu.logout') }}
              span.ml-5(@click="setMenuState(false)" v-if="isAdmin")
                router-link(to="/manage", style="opacity: 0.5").curp &nbsp;{{ $t('menu.manage') }}
            div(v-if="auth.user.studentcard")
              h4 {{ $t("menu.label_student_card") }}
              ul
                li {{ $t("menu.label_card_id") }}： {{auth.user.studentcard.card_id}}
                li {{ $t("menu.label_card_level") }}： {{auth.user.studentcard.type=="normal"?$t("menu.label_card_level_old"):$t("menu.label_card_level_member")}}
                li {{ $t("menu.label_card_date") }}： {{auth.user.studentcard.expiry_datetime}}
            div
              h4 {{ $t("menu.profile") }}
                div.float-right(@click="setMenuState(false)")
                  router-link(to="/member/info").curp.btn-menu {{ $t('menu.modify') }}
              ul
                li {{ $t("menu.label_id") }}： {{ "ZA"+("0000000"+auth.user.id).slice(-6) }}
                li {{ $t("menu.label_occupation") }}： {{ getCataTrans(auth.user.jobcata) }}
                li {{ $t("menu.label_position") }}： {{auth.user.job}} 
                li {{ $t("menu.label_phone") }}：{{auth.user.phone}}
                li {{ $t("menu.label_email") }}：{{auth.user.email}}
                li {{ $t("menu.label_birthday") }}：{{auth.user.birthday}}
                //- li 生日： 
            span
          .col-sm-1
          .col-sm-4(@click="setMenuState(false)" )
            h4 {{ $t("menu.news_title") }}
            .row
              newsbox(v-for="post in [latestNews]", 
                v-if="latestNews",
                :post = "post" ,
                :target="postTarget(post)",
                :key="post.title",
                :tag="post.tag")
    .row
      .col-sm-12
        .tag.mt-5.mb-3 2018 ZA EXPO
        a(href="https://zashare.org/static/2018雜學校徵件手冊中文版.pdf" target="_blank")
          i.fa.fa-info
        | &nbsp;&nbsp; {{ $t('menu.label_expo_regist_end') }}
      .col-sm-12
        panel_expo2018


    .row.row-coupon.mt-5(v-if="coupontypes_normal.length")
      .col-sm-12
        .tag {{ $t('menu.title_coupon_normal') }}
        i.fa.fa-info
        br
      .col-sm-6.col-md-4.mt-3(v-for="(ct,ctid) in coupontypes_normal")
        .coupon-box-inner
          .cover(:style="bgcss(ct.cover)")
            //.num 00{{ctid+1}}
          .info
            h4 {{ct.title}}
            p(v-html="ct.description")
            //p 
              span 啟用時間：{{ct.active_datetime}}<br>
              span 結束時間：{{ct.expiry_datetime}}<br>
          div(v-if="ct.can_get")
            .btn.btn-primary.text-center(v-if="!ct.my",@click="getCoupon(ct)") {{ $t('menu.get_coupon') }}
          div(v-else)
            h4.text-center {{ $t('menu.coupon_cannot_get') }}
          h4.text-center(v-if="ct.my") {{ $t('menu.label_coupon') }}：{{ct.my.coupon}}
      

    .row.row-coupon.mt-5( v-if="auth.user.studentcard || isAdmin")
      .col-sm-12
        .tag {{ $t('menu.title_coupon_zacourse') }}
        i.fa.fa-info
        br
      .col-sm-6.col-md-4.mt-3(v-for="(ct,ctid) in coupontypes_zacourse")
        .coupon-box-inner
          .cover(:style="bgcss(ct.cover)")
            //.num 00{{ctid+1}}
          .info
            h4 {{ct.title}}
            p(v-html="ct.description")
            //p 
              span 啟用時間：{{ct.active_datetime}}<br>
              span 結束時間：{{ct.expiry_datetime}}<br>
          div(v-if="ct.can_get")
            .btn.btn-primary.text-center(v-if="!ct.my",@click="getCoupon(ct)") {{ $t('menu.get_coupon') }}
          div(v-else)
            h4.text-center {{ $t('menu.coupon_cannot_get') }}
          h4.text-center(v-if="ct.my") {{ $t('menu.label_coupon') }}：{{ct.my.coupon}}
      
        
</template>

<script>
import {mapState,mapMutations, mapActions, mapGetters} from 'vuex'
import panel_expo2018 from './panel_expo2018'
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
      return this.posts.map(o=>({...o,tag: "ZA EXPO"})).filter(o=>JSON.stringify(o).indexOf(this.searchKeyword)!=-1)
    },
    latestNews(){
      return this.news.filter(post=>post.cata.name!='媒體報導').filter(o=>o.stick_top_member).slice(-1)[0]
    },
    ...mapGetters({
      getUserPhoto: 'auth/getUserPhoto',
      isAdmin: 'auth/isAdmin'
    }),
    coupontypes_zacourse(){
      return (this.coupontypes || []).filter(ct=>ct.type=="single_time_hash")
    },
    coupontypes_normal(){
      return (this.coupontypes || []).filter(ct=>ct.type=="multi_time_single_hash") 
    }
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
    getCataTrans(value){
      let item =  this.$t("member.form.register.jobcatas").find(ct=>ct.value==value)
      if ( item ){
        return item.label
      } else{
        return value
      }
    },
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
    menuState(){
      if (this.menuState && this.auth.user){
        this.loadAllCoupon()

      }
    },
    user(){
      if (this.menuState && this.auth.user){
        this.loadAllCoupon()

      }
    },
    token(){
      this.loadAllCoupon()
    }
  },
  components: {
    panel_expo2018
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"

.col-member
  background-color: #eee
  padding: 40px
  padding-top: 50px
  padding-bottom: 50px
  height: auto

  .btn-menu
    padding: 6px 15px
    border: solid 1px #777
    &:hover
      background-color: #aaa
    
  // box-sizing: border-box

  a.box
    margin-top: 30px
    box-shadow: 0px 0px 20px 5px rgba(black,0.1)
    border-radius: 5px
    display: block
    +trans
    &:hover
      transform: translate(-2px,-2px)
    .cover
      height: 100px
      background-size: cover
      border-radius: 5px 5px 0px 0px
    .info
      padding: 20px
    &.big
      .cover
        height: 240px
        +rwd_md
          height: auto

  +rwd_md
    display: block
  .auth-card
    background-color: transparent 
    max-width: 350px
    .top,.bottom
      background-color: transparent 
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

  position: relative
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
    // margin-top: 50px
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
      color: white
      display: flex
      justify-content: flex-start
      align-items: flex-start
      padding: 10px
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
