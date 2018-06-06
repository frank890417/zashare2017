<template lang="pug">
  .page.manage-post.text-left
    h3.mt-5 管理新聞
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    br
    router-link(to="/manage/news/new")
      el-button.btn.btn-primary( type="primary") + 新增新聞
    //- el-select(v-model="now_year")
      el-option(value="", label="2016 & 2017")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
    br
    el-table(:data="filteredPosts" border max-height="800",
               :default-sort = "{prop: 'id', order: 'descending'}")
      el-table-column(prop="id",label="#", width="60" :sortable="true")
      el-table-column(prop="status",label="狀態", width="100",
        :filters="[{ text: '草稿', value: '草稿' }, { text: '已發布', value: '已發布' }]",
        :filter-method="filterStatus" :sortable="true")
      //- el-table-column(prop="company",label="單位", width="200",:sortable="true")
      el-table-column(prop="cata",label="類別", width="80" :sortable="true")
      el-table-column(prop="cover",label="封面", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.cover")
      //- el-table-column(prop="year",label="年度", width="100",
        :filters="[{ text: '2016', value: '2016' }, { text: '2017', value: '2017' }]",
        :filter-method="filterYear" :sortable="true")
      el-table-column(prop="title",label="標題" :sortable="true")
      el-table-column(prop="stick_top_index",label="置頂",width="100" :sortable="true")
      el-table-column(prop="stick_top_member",label="會員置頂",width="100" :sortable="true")
      //- el-table-column(prop="stick_top_cata",label="類置頂",width="100" , :sortable="true")
      el-table-column(prop="updated_at",label="更新時間",width="100" , :sortable="true")
      el-table-column(label="操作", width="200")
        template(slot-scope="scope")
          el-button(@click="handleEdit(scope.row)" type="text" size="small") 編輯
          el-button(size="small" type="danger" @click="handleDelete(scope.$index, scope.row)") 刪除
      //- el-table-column(prop="title",label="標題", width="180")
      //- el-table-column(prop="title",label="標題", width="180")
      
</template>

<script>
import {mapState} from 'vuex'
import axios from 'axios'
import store from "../../store"
export default {
  data(){
    return {
      // posts: [],
      keyword: "",
      now_year: "",
    }
  },
  created(){
    store.dispatch("manage/loadWebsite")
  },
  methods: {
    handleEdit(row){
      this.$router.push("/manage/news/"+row.id)
    },
    handleDelete(id,row){
      // console.log(row)
      this.$confirm("你確定要刪除嗎？").then(()=>{
        axios.post(`/api/news/${row.id}`,{
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
    },
    filterStatus(value,row){
      return row.status === value;
    },

    
    filterStickIndex(value,row){
      return row.stick_top_index==value;
    },
    filterStickCata(value,row){
      return row.stick_top_cata==value;
    },
  },
  computed:{
    ...mapState({
      posts: state=>state.manage.news
    }),
    filteredPosts(){
      return this.posts.filter(post=>{
        return this.keyword=="" || JSON.stringify(post).indexOf(this.keyword)!=-1
      }).filter(post=>{
        return this.now_year=="" || post.year == this.now_year
      }).map(post=>({
        ...post,
        status: post.status=="draft"?"草稿":"已發佈",
        cata: (post.cata && post.cata.name) || "-",
        updated_at: (post.updated_at ) || "-",
        company: ((post.company) && post.company.name_cht) || "-",
        stick_top_index: post.stick_top_index?"是":"",
        stick_top_cata: post.stick_top_cata?"是":"",
        stick_top_member: post.stick_top_member?"是":"",
      }))
    }
  }
}
</script>

<style lang="sass">
.cell
  position: relative
  .cover
    width: 80px
</style>
