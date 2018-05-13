<template lang="pug">
  .page.manage-post.text-left
    h3.mt-5 管理2018報名紀錄
    el-input(v-model="keyword", placeholder="輸入關鍵字")

    //router-link.btn.btn-primary(to="/post/new") + 新增文章
    //el-select(v-model="now_year")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
    br
    el-tabs.mt-5.mb-3(v-model="activeName" @tab-click="handleClick")
      el-tab-pane(label="報名紀錄" name="regist") 報名紀錄
        el-table(:data="filteredRegistexpo" border)
          el-table-column(prop="id",label="編號", width="80" sortable)
          el-table-column(prop="paid_record_status",label="繳款狀態", width="120" sortable)
          //- el-table-column(prop="tag",label="類別", width="80" sortable)
          el-table-column(prop="name_cht",label="中文", width="150" sortable)
          el-table-column(prop="name_eng",label="英文", width="150" sortable)
          el-table-column(prop="type",label="單位種類", width="250" sortable)
          el-table-column(prop="theme",label="類別", width="120" sortable)

          //- el-table-column(prop="description",label="描述", width="200" sortable)
          //- el-table-column(prop="target_audience",label="目標受眾", width="200" sortable)
          //- el-table-column(prop="want_audience",label="希望觸及受眾", width="200" sortable)
          //el-table-column(prop="have_sell",label="有銷售", width="100" sortable)
            template(slot-scope="scope")
              span {{scope.have_sell?"有":"無"}}
          //el-table-column(prop="attend_reason",label="參與原因", width="200" sortable)
            
          el-table-column(prop="file_proposal",label="簡報", width="80")
            template(slot-scope="scope")
              a(:href="apiDomain+scope.row.file_proposal.replace('/stroage/app/public','')", target="_href") 連結
          el-table-column(prop="main_contact_name",label="主要聯絡人", width="150" sortable)
          el-table-column(prop="main_contact_email",label="主要信箱", width="200" sortable)
          el-table-column(prop="secondary_contact_name",label="次要聯絡人", width="150" sortable)
          el-table-column(prop="secondary_contact_email",label="次要信箱", width="200" sortable)
          
          //- el-table-column(prop="main_contact_phone",label="電話", width="200" sortable)

      el-tab-pane(label="繳費記錄" name="paidrecord") 繳費記錄
        el-table(:data="paidRecords" border)
          //- el-table-column(prop="id",label="#", width="60" sortable)

          el-table-column(prop="registid",label="報名編號", width="120" sortable)
          el-table-column(prop="registname",label="攤位名稱", width="200" sortable)
          el-table-column(prop="paid_datetime",label="確認繳費", width="160" sortable)
            template(slot-scope="scope")
              div
                span.mr-1(v-if="scope.row.confirmed") ✔︎ 已確認
                span.mr-1(v-else) 未確認
                el-switch(v-model="scope.row.confirmed", @change="uploadPaidStatus(scope)")
          el-table-column(prop="paid_amount",label="繳費金額", width="200" sortable)
          el-table-column(prop="paid_datetime",label="繳費時間", width="200" sortable)
          el-table-column(prop="paid_direct",label="臨櫃匯款", width="120" sortable)
            template(slot-scope ="scope")
              span {{ scope.row.paid_direct?'是':'否' }}
          el-table-column(prop="paid_name",label="名字", width="100" sortable)
          el-table-column(prop="paid_last_number",label="後五碼", width="100" sortable)
          el-table-column(prop="receipt_type",label="發票種類", width="120" sortable)

      el-tab-pane(label="雜工坊報名" name="workshop") 雜工坊報名
        el-table(:data="workshops" border)
          el-table-column(prop="id",label="#", width="60" sortable)
          el-table-column(prop="registid",label="報名編號", width="120" sortable)
          el-table-column(prop="registname",label="攤位名稱", width="200" sortable)
          el-table-column(prop="class_type",label="課程類型", width="200" sortable)
          el-table-column(prop="audience_normal",label="活動招生族群", width="160" sortable)
            template(slot-scope ="scope")
              span {{ scope.row.audience_normal || '無限制' }}
          el-table-column(prop="class_person_count",label="預計人數", width="130" sortable)
          el-table-column(prop="class_proposal",label="提案簡報", width="80")
            template(slot-scope="scope")
              a(:href="apiDomain+scope.row.class_proposal.replace('/stroage/app/public','')", target="_href") 連結
          //- el-table-column(prop="agree_plan",label="同意規劃", width="200" sortable)
          el-table-column(prop="main_contact_name",label="主要聯絡人", width="150" sortable)
          el-table-column(prop="main_contact_email",label="主要信箱", width="200" sortable)
          el-table-column(prop="secondary_contact_name",label="次要聯絡人", width="150" sortable)
          el-table-column(prop="secondary_contact_email",label="次要信箱", width="200" sortable)

      el-tab-pane(label="Zac." name="zac") Zac.
        el-table(:data="registSpeaks" border)
          el-table-column(prop="id",label="#", width="60" sortable)
          el-table-column(prop="registid",label="報名編號", width="120" sortable)
          el-table-column(prop="registname",label="攤位名稱", width="200" sortable)
          el-table-column(prop="agree_plan",label="同意策展權益", width="130" sortable)
            template(slot-scope ="scope")
              span {{ scope.row.agree_plan?'是':'否' }}
          el-table-column(prop="startup_content",label="創業內容", width="200" sortable)
          el-table-column(prop="startup_problem",label="想解決的問題", width="200" sortable)
          el-table-column(prop="startup_proposal",label="提案簡報", width="80")
            template(slot-scope="scope")
              a(:href="apiDomain+scope.row.startup_proposal.replace('/stroage/app/public','')", target="_href") 連結


          el-table-column(prop="main_contact_name",label="主要聯絡人", width="150" sortable)
          el-table-column(prop="main_contact_email",label="主要信箱", width="200" sortable)
          el-table-column(prop="secondary_contact_name",label="次要聯絡人", width="150" sortable)
          el-table-column(prop="secondary_contact_email",label="次要信箱", width="200" sortable)





      //- el-table-column(prop="cover",label="封面", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.cover")
      //- el-table-column(prop="year",label="年度", width="100" sortable,
        :filters="[{ text: '2016', value: '2016' }, { text: '2017', value: '2017' }]",
        :filter-method="filterYear")
      //- el-table-column(prop="year",label="年份" width="60" sortable)
      //- el-table-column(label="操作", width="200")
        template(slot-scope="scope")
          el-button(@click="handleEdit(scope.row)" type="text" size="small") 編輯
          el-button(size="small" type="danger" @click="handleDelete(scope.$index, scope.row)") 刪除
      
      //- el-table-column(prop="title",label="標題" )
      //- el-table-column(label="操作", width="200")
      //-   template(slot-scope="scope")
      //-     el-button(@click="handleEdit(scope.row)" type="text" size="small") 編輯
      //-     el-button(size="small" type="danger" @click="handleDelete(scope.$index, scope.row)") 刪除
      //- el-table-column(prop="title",label="標題", width="180")
      //- el-table-column(prop="title",label="標題", width="180")
      
</template>

<script>
import {mapState} from 'vuex'
import axios from 'axios'
export default {
  data(){
    return {
      // posts: [],
      keyword: "",
      activeName: "zac",
      now_year: "2016",
      registexpos: []
    }
  },
  mounted(){
    console.log("loag")
    this.loadAll()
  },
  methods: {
    // handleEdit(row){
    //   this.$router.push("/api/registexpo")
    // },
    filterYear(value,row){
      return row.year === value;
    },

    loadAll(){
      axios.get("/api/registexpo",{
        params: {
          token: this.token,
        }
      }).then(res=>{
        this.$set(this,"registexpos",res.data)
      })
    },
    handleClick(tab, event) {
          console.log(tab, event);
    },
    uploadPaidStatus(scope){
      console.log("upload status!!!!!!!!");
      axios.post('/api/confirmPaid',{
        id: scope.row.id,
        value: scope.row.confirmed,
        token: this.token
      }).then(res=>{
        console.log(res.data)
        if (res.data.status=="success"){
          this.loadAll()
          this.$message({
            message: '更新成功',
            type: 'success'
          }); 
        }else{
          this.$message({
            message: '更新狀態失敗',
            type: 'error'
          }); 
        }
      })

    }
        
  },
  computed:{
     ...mapState({
      catas: state=>state.manage.catas,
      token: state=>state.auth.token
    }),
    filteredRegistexpo(){
      return (this.registexpos || []).filter(regist=>{
        return this.keyword=="" || JSON.stringify(regist).indexOf(this.keyword)!=-1
      }).map(regist=>{
        let paid_record_status = "✖︎未回報"
        if (regist.paid_record && regist.paid_record.id){
          if (regist.paid_record.confirmed){
            paid_record_status="✔︎已確認"
          }else{
            paid_record_status="待確認"
          }
        }
        return {
          ...regist,
          paid_record_status
        }
      })
    },
    paidRecords(){
      return this.filteredRegistexpo.map(r=>({
        registid: r.id,
        registname: r.name_cht,
        ...r.paid_record,
        confirmed: r.paid_record.confirmed?true:false
      }) ).filter(r=>r.id)
    },
    workshops(){
      return this.filteredRegistexpo.map(r=>({
        registid: r.id,
        registname: r.name_cht,
        ...r.regist_workshop
      })).filter(r=>r.id)
    },
    registSpeaks(){
      return this.filteredRegistexpo.map(r=>({
        registid: r.id,
        registname: r.name_cht,
        ...r.regist_expo_speak
      })).filter(r=>r.id)

    }

  }
}
</script>

<style lang="sass">
.cell
  position: relative
  .cover
    width: 100px
</style>
