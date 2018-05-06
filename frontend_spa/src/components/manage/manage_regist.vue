<template lang="pug">
  .page.manage-post.text-left
    h3 管理2018報名紀錄
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    br
    //router-link.btn.btn-primary(to="/post/new") + 新增文章
    //el-select(v-model="now_year")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
    br
    el-table(:data="filteredRegistexpo" border)
      el-table-column(prop="id",label="#", width="60" sortable)
      //- el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="name_cht",label="中文", width="200" sortable)
      el-table-column(prop="name_eng",label="英文", width="200" sortable)

      el-table-column(prop="description",label="描述", width="200" sortable)
      el-table-column(prop="target_audience",label="目標受眾", width="200" sortable)
      el-table-column(prop="want_audience",label="希望觸及受眾", width="200" sortable)
      el-table-column(prop="have_sell",label="有銷售", width="100" sortable)
        template(slot-scope="scope")
          span {{scope.have_sell?"有":"無"}}
      el-table-column(prop="attend_reason",label="參與原因", width="200" sortable)
      el-table-column(prop="paid_record_status",label="繳款狀態", width="120" sortable)
        
      el-table-column(prop="file_proposal",label="簡報", width="80")
        template(slot-scope="scope")
          a(:href="apiDomain+scope.row.file_proposal.replace('/stroage/app/public','')", target="_href") 連結
      el-table-column(prop="main_contact_name",label="主要聯絡人", width="200" sortable)
      el-table-column(prop="main_contact_phone",label="電話", width="200" sortable)
      el-table-column(prop="main_contact_email",label="信箱", width="200" sortable)


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
