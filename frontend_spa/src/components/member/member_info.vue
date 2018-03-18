<template lang="pug">
.page.member-info
  .container
    h2 會員資料修改
    el-form(v-if="userClone", label-width="100px")
      el-form-item(label="姓名")
        el-input(v-model="userClone.name")
      el-form-item(label="Email")
        el-input(v-model="userClone.email",disabled = true)
      el-form-item(label="帳號類別",disabled = true)
        el-input(v-model="userClone.group",disabled = true)
      el-form-item(label="工作類別",disabled = true)
        el-select(v-model="userClone.jobcata", placeholder="產業別" , name="jobcata", autocomplete="on")
          el-option(v-for= "(jb,jbid) in auth.jobcatas", 
                :value="jb") {{jb}}
      el-form-item(label="工作職稱",disabled = true , placeholder="e.g. 建築師 / 設計師 / 法官...")
        el-input(v-model="userClone.job")
      el-form-item(label="註冊時間")
        el-input(v-model="userClone.created_at",disabled = true)
    br
    el-button(type="primary",@click="updateUserInfo") 更新會員資料
    br
    div(v-if="userClone && userClone.studentcard")
      h3 學生證資訊
      el-form(label-width="100px")
        el-form-item(label="登記名")
          el-input(v-model="userClone.studentcard.name" ,disabled = true)
        el-form-item(label="序號")
          el-input(v-model="userClone.studentcard.id" ,disabled = true)
        el-form-item(label="使用期限")
          el-input(v-model="userClone.studentcard.expiry_datetime",disabled = true)
    //- pre {{userClone}}
</template>

<script>
import {mapState, mapGetters} from 'vuex'
export default {
  data(){
    return {
      userClone: null
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
    this.userClone = JSON.parse(JSON.stringify(this.user))
  },
  methods: {
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
</style>
