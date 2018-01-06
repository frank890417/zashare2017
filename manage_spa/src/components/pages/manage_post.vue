<template lang="pug">
  .page.manage-post
    //h3 管理文章
    el-button(type="primary") + 新增文章
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    el-table(:data="filteredPosts" border)
      el-table-column(prop="id",label="#", width="60" sortable)
      el-table-column(prop="company",label="編號", width="80" sortable)
      el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="cover",label="封面", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.cover")
      el-table-column(prop="year",label="年度", width="80" sortable)
      el-table-column(prop="title",label="標題", width="350")
      el-table-column(label="操作", width="200")
        template(slot-scope="scope")
          el-button(@click="handleEdit(scope.row)" type="text" size="small") 編輯
          el-button(size="small" type="danger" @click="handleDelete(scope.$index, scope.row)") 刪除
      //- el-table-column(prop="title",label="標題", width="180")
      //- el-table-column(prop="title",label="標題", width="180")
      
</template>

<script>

export default {
  data(){
    return {
      posts: [],
      keyword: ""
    }
  },
  mounted(){
    this.axios.get("/api/post").then((res)=>{
      this.posts = res.data
      // console.log(res.data)
    })
  },
  methods: {
    handleEdit(row){
      this.$router.push("/post/"+row.id)
    }
  },
  computed:{
    filteredPosts(){
      return this.posts.filter(post=>{
        return this.keyword=="" || JSON.stringify(post).indexOf(this.keyword)!=-1
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
