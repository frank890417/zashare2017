<template lang="pug">

.row.row-expo2018( v-if="isAdmin", :key="menuState")
  .col-sm-12(v-if="coupontypes.length")
    .tag 2018 ZA EXPO
    i.fa.fa-info
    | &nbsp;&nbsp;2018 年 6 月 15 日 申請截止
  .col-sm-12
    .row(@click="setMenuState(false)")
      .col-sm-6
        router-link.box.big(to="/member/registexpo") 
          .cover(:style="bgcss('/static/img/regist2018/ZAEXPO.jpg')")
            span(v-if="registExpo") 已報名
          .info 參展申請<br>
            span(v-if="registExpo") 參展編碼： {{ registId }}
      .col-sm-6
        router-link.box(to="/member/registexpo/workshop") 
          .cover(:style="bgcss('/static/img/regist2018/ZAWORKSHOP.jpg')")
          .info 雜工坊
        router-link.box(to="/member/registexpo/speak") 
          .cover(:style="bgcss('/static/img/regist2018/Zac.jpg')")
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
      registExpo: {}
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
      authInit: "auth/init"
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
    this.axios.get(`/api/registexpo`,
    {
      params: {token: this.token}
      // registexpo: senddata
    }
    ).then(res=>{
      if (res.data){
        res.data.target_audience =res.data.target_audience? JSON.parse(res.data.target_audience):[]
        res.data.want_audience = res.data.want_audience? JSON.parse(res.data.want_audience):[]
        this.$set(this,"registExpo",res.data)
      }
    })
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
    }
  }
}
</script>

<style lang="sass">
@import "../../assets/_mixins.sass"
.row-expo2018
  .box
    .cover
      color: white
      display: flex
      justify-content: flex-start
      align-items: flex-end
      padding: 10px
</style>
