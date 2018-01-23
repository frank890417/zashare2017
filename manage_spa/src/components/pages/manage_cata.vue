<template lang="pug">
  .page.manage-post.text-left
    h3 管理類別
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    br
    //router-link.btn.btn-primary(to="/post/new") + 新增文章
    //el-select(v-model="now_year")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
    br
    el-table(:data="catas" border)
      el-table-column(prop="id",label="#", width="60" sortable)
      //- el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="name",label="名字", width="200" sortable)
      //- el-table-column(prop="cover",label="封面", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.cover")
      //- el-table-column(prop="year",label="年度", width="100" sortable,
        :filters="[{ text: '2016', value: '2016' }, { text: '2017', value: '2017' }]",
        :filter-method="filterYear")
      el-table-column(prop="year",label="年份" width="60" sortable)
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

export default {
  data(){
    return {
      // posts: [],
      keyword: "",
      now_year: "2016",
    }
  },
  mounted(){
  },
  methods: {
    handleEdit(row){
      this.$router.push("/company/"+row.id)
    },
    filterYear(value,row){
      return row.year === value;
    }
  },
  computed:{
    ...mapState(['catas']),
    // filteredCompany(){
    //   return this.companies.filter(company=>{
    //     return this.keyword=="" || JSON.stringify(company).indexOf(this.keyword)!=-1
    //   }).filter(company=>{
    //     return this.now_year=="" || company.year == this.now_year
    //   }).map(company=>({
    //     ...company,
    //   }))
    // }
  }
}
</script>

<style lang="sass">
.cell
  position: relative
  .cover
    width: 100px
</style>
