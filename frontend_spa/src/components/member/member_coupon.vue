<template lang="pug">
.page.member-coupon
  .container
    h2 Coupon領取與管理
    ul.list-group.row
      li.list-group-item.col-sm-4(v-for="ct in coupontypes")
        .coupon-box-inner
          img(:src="ct.cover")
          h3 名稱：{{ct.title}}
          p(v-html="ct.description")
          p 
            span 啟用時間：{{ct.active_datetime}}<br>
            span 結束時間：{{ct.expiry_datetime}}<br>
          hr
          div(v-if="ct.can_get")
            .btn.btn-primary(v-if="!ct.my",@click="getCoupon(ct)") 領取
          div(v-else)
            h3 無法領取(不符合資格)
          h3(v-if="ct.my") 序號：{{ct.my.coupon}}
    //- el-form(v-if="userClone", label-width="100px")
    //-   el-form-item(label="姓名")
    //-     el-input(v-model="userClone.name")
    //- pre {{userClone}}
</template>

<script>
import {mapState, mapGetters} from 'vuex'
import axios from 'axios'
export default {
  data(){
    return {
      userClone: null,
      coupontypes: []
    }
  },
  computed: {
    ...mapState({
      auth: 'auth',
      user: state=>state.auth.user,

      token: state=>state.auth.token
    }),
  },
  mounted(){
    console.log(this.user)
    // this.userClone = JSON.parse(JSON.stringify(this.user))
    this.loadAll();
  },
  methods: {

    loadAll(){
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
          this.loadAll();
          // setTimeout(function(){
          // this.$router.push(`/manage/${this.$route.meta.type}/`+res.data.data.id)
          // },300)
        })
    },

    updateUserInfo(){
       this.axios.post(
          `/api/auth/user/update/info`,
          { 
            token: this.token,
            user: this.userClone
          }
        ).then(res=>{
          this.$message({
            message: '資料更新成功',
            type: 'success'
          });
          // let _this  = this
          console.log(res.data.user)
          // setTimeout(function(){
          // this.$router.push(`/manage/${this.$route.meta.type}/`+res.data.data.id)
          // },300)
        })
    }
  }
}
</script>

<style lang="sass">
.el-select
  width: 100%
.member-coupon
  .list-group
    list-style: none
.coupon-box-inner
  margin: 10px
  border: solid 1px #666
  padding: 10px
</style>
