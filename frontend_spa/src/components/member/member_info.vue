<template lang="pug">
.page.member-info.text-left
  .container
    .row
      .col-sm-12
        h2.mt-5 {{ $t('menu.update_member_data') }} - {{userClone.name}}
        el-form(v-if="userClone", label-width="200")
          el-form-item(:label="$t('member.form.register.name')")
            el-input(v-model="userClone.name")
          el-form-item(:label="$t('member.form.register.email')")
            el-input(v-model="userClone.email",disabled = true)
          el-form-item(:label="$t('member.form.register.account_type')",disabled = true)
            el-input(v-model="userClone.group",disabled = true)
          el-form-item(:label="$t('member.form.register.phone')")
            el-input(v-model="userClone.phone")
          el-form-item(:label="$t('member.form.register.birthday')")
            el-date-picker(v-model="userClone.birthday", 
                      type="date", name="birthday", autocomplete="on",
                      value-format="yyyy-MM-dd", style="width: 100%")
          el-form-item(:label="$t('member.form.register.jobcata')",disabled = true)
            el-select(v-model="userClone.jobcata" , name="jobcata", autocomplete="on")
              el-option(v-for= "(jb,jbid) in $t('member.form.register.jobcatas')", 
                    :value="jb.value" :label="jb.label") {{jb.label}}
          el-form-item(:label="$t('member.form.register.job')",disabled = true)
            el-input(v-model="userClone.job")
          el-form-item(:label="$t('member.form.register.register_time')")
            el-input(v-model="userClone.created_at",disabled = true)
        br
        el-button(type="primary",@click="updateUserInfo") {{ $t('member.form.register.update') }}
        br
        div.mt-5(v-if="userClone && userClone.studentcard")
          h3 {{ $t('menu.label_student_card') }}
          el-form(label-width="200")
            el-form-item(:label="$t('menu.label_card_register_name')")
              el-input(v-model="userClone.studentcard.name" ,disabled = true)
            el-form-item(:label="$t('menu.label_card_id')")
              el-input(v-model="userClone.studentcard.card_id" ,disabled = true)
            el-form-item(:label="$t('menu.label_card_date')")
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
