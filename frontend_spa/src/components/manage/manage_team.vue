<template lang="pug">
  .page.manage-post.text-left
    h3.mt-5 管理參展單位
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    br
    router-link(to="/manage/company/new")
      el-button.btn.btn-primary( type="primary") + 新增單位
    //el-select(v-model="now_year")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
    br
    el-pagination(layout="prev, pager, next",
                  :page-count="chunkedCompanies.length",
                  :current-page.sync="currentPage",
                  :pager-count="10"
                  )
    el-table(:data="chunkedCompanies[currentPage]" border max-height="800")
      el-table-column(prop="id",label="#", width="60" :sortable="true")
      //- el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="name_cht",label="名字", width="200" :sortable="true")
      el-table-column(prop="cover",label="Logo", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.logo")
      el-table-column(prop="year",label="年度", width="100" :sortable="true",
        :filters="[{ text: '2016', value: '2016' }, { text: '2017', value: '2017' }]",
        :filter-method="filterYear")
      el-table-column(prop="discribe_cht",label="中文敘述" )
      el-table-column(label="操作", width="100")
        template(slot-scope="scope")
          el-button(size="mini",@click="handleEdit(scope.$index, scope.row)") 編輯
          el-button(size="mini",type="danger",@click="handleDelete(scope.$index, scope.row)") 刪除
    
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
import store from '../../store'
import _ from 'lodash'
export default {
  data(){
    return {
      // posts: [],
      currentPage: 1,
      keyword: "",
      now_year: "",
    }
  },
  mounted(){
    store.dispatch("manage/loadWebsite")
  },
  methods: {
    handleEdit(id,row){
      console.log(row)
      this.$router.push("/manage/company/"+row.id)
    },
    filterYear(value,row){
      return row.year === value;
    },
    handleDelete(id,row){
      // console.log(row)
      this.$confirm("你確定要刪除嗎？").then(()=>{
        this.axios.post(`/api/company/${row.id}`,{
          _method: 'DELETE',
          // _token: this.csrf_token,
          dataType: 'JSON',
        }).then((res)=>{
  
          this.$message.success("刪除完成")
          this.$store.dispatch("loadWebsite")
          // this.$router.push('/activity')
        })

      })
    },
  },
  computed:{
     ...mapState({
      companies: state=>state.manage.companies
    }),
    filteredCompany(){
      return this.companies.filter(company=>{
        return this.keyword=="" || JSON.stringify(company).indexOf(this.keyword)!=-1
      }).filter(company=>{
        return this.now_year=="" || company.year == this.now_year
      }).map(company=>({
        ...company,
      }))
    },
    chunkedCompanies(){
      return _.chunk(this.filteredCompany,10)
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
