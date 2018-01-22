<template lang="pug">
  .page.manage-post.text-left
    h3 管理文章
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    br
    router-link.btn.btn-primary(to="/post/new") + 新增文章
    el-select(v-model="now_year")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
    br
    el-table(:data="filteredPosts" border)
      el-table-column(prop="id",label="#", width="60" sortable)
      el-table-column(prop="company",label="編號", width="200" sortable)
      el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="cover",label="封面", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.cover")
      el-table-column(prop="year",label="年度", width="100" sortable,
        :filters="[{ text: '2016', value: '2016' }, { text: '2017', value: '2017' }]",
        :filter-method="filterYear")
      el-table-column(prop="title",label="標題" )
      el-table-column(label="操作", width="200")
        template(slot-scope="scope")
          el-button(@click="handleEdit(scope.row)" type="text" size="small") 編輯
          el-button(size="small" type="danger" @click="handleDelete(scope.$index, scope.row)") 刪除
      //- el-table-column(prop="title",label="標題", width="180")
      //- el-table-column(prop="title",label="標題", width="180")
      
</template>

<script>
import {mapState} from 'vuex'
import axios from 'Axios'
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
      this.$router.push("/post/"+row.id)
    },
    handleDelete(id,row){
      // console.log(row)
      this.$confirm("你確定要刪除嗎？").then(()=>{
        axios.post(`/api/spa/post/${row.id}`,{
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
    filterYear(value,row){
      return row.year === value;
    }
  },
  computed:{
    ...mapState(['posts']),
    filteredPosts(){
      return this.posts.filter(post=>{
        return this.keyword=="" || JSON.stringify(post).indexOf(this.keyword)!=-1
      }).filter(post=>{
        return this.now_year=="" || post.year == this.now_year
      }).map(post=>({
        ...post,
        company: ((post.company) && post.company.name_cht) || "-"
      }))
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
