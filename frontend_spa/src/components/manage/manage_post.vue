<template lang="pug">
  .page.manage-post.text-left
    h3 管理文章
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    br
    router-link(to="/manage/post/new")
      el-button.btn.btn-primary( type="primary") + 新增文章
    el-select(v-model="now_year")
      el-option(value="", label="2016 & 2017")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
      el-option(value="2015", label="2015")
    br
    el-table.table(:data="filteredPosts" border max-height="800",
               :default-sort = "{prop: 'id', order: 'descending'}")
      el-table-column(prop="id",label="#", width="60" :sortable="true")
        template(slot-scope="scope")
          span {{scope.row.id}}
          span(v-if="scope.row.admin_lock")
            span &nbsp;
            i.fa.fa-lock(title="總編輯已鎖定")
      el-table-column(prop="admin_lock",label="鎖定", width="60" :sortable="true", v-if="isAdmin")
        template(slot-scope="scope")
          el-switch(v-model="scope.row.admin_lock", @change="(value)=>{set_admin_lock(scope.row)}")
          
      el-table-column(prop="status",label="狀態", width="70",
        :filters="[{ text: '草稿', value: '草稿' }, { text: '已發佈', value: '已發佈' }]",
        :filter-method="filterStatus" :sortable="true")
        template(slot-scope="scope")
          span.post_status(:data-status="scope.row.status") {{scope.row.status}}
          //- span(v-if="scope.row.admin_lock && !isAdmin")
          //-   span &nbsp;
          //-   i.fa.fa-lock(title="總編輯已鎖定")
      el-table-column(prop="company",label="單位", width="160",:sortable="true")
      el-table-column(prop="cata",label="類別", width="80" :sortable="true")
      el-table-column(prop="cover",label="封面", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.cover")
      el-table-column(prop="year",label="年度", width="60",
        :filters="[{ text: '2015', value: '2015' },{ text: '2016', value: '2016' }, { text: '2017', value: '2017' }]",
        :filter-method="filterYear" :sortable="true")
      el-table-column(prop="title",label="標題" width="200" :sortable="true")
      el-table-column(prop="hashtag",label="#Hash" :sortable="true")
      el-table-column(prop="stick_top_index",label="置頂",width="70" :sortable="true")
      //- el-table-column(prop="stick_top_cata",label="類置頂",width="100" , :sortable="true")
      el-table-column(prop="updated_at",label="更新時間",width="100" , :sortable="true")
      el-table-column(label="操作", width="150")
        template(slot-scope="scope")
          span(v-if="!(scope.row.admin_lock && !isAdmin)")
            el-button(@click="handleEdit(scope.row)" type="secondary" size="small") 編輯
            el-button(size="small" type="danger" @click="handleDelete(scope.$index, scope.row)") 刪除
          div(v-else) 文章已鎖定&nbsp;
            i.fa.fa-lock(title="總編輯已鎖定")
      //- el-table-column(prop="title",label="標題", width="180")
      //- el-table-column(prop="title",label="標題", width="180")
      
</template>

<script>
import {mapState, mapGetters} from 'vuex'
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
  mounted(){

    store.dispatch("manage/loadWebsite")
  },
  methods: {
    handleEdit(row){
      this.$router.push("/manage/post/"+row.id)
    },
    handleDelete(id,row){
      // console.log(row)
      this.$confirm("你確定要刪除嗎？").then(()=>{
        axios.post(`/api/post/${row.id}`,{
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
    set_admin_lock(post){
      if (this.isAdmin){
        this.axios.patch(
          `/api/post/`+post.id,
          {admin_lock:post.admin_lock}
        ).then(()=>{
          this.$message.success("文章"+(post.admin_lock?"鎖定":"解鎖")+"成功!")
        })
      }
    }
  },
  computed:{
    ...mapState({
      posts: state=>state.manage.posts
    }),
    ...mapGetters({
      isAdmin: 'auth/isAdmin'
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
        admin_lock: post.admin_lock?true:false,
        hashtag: JSON.parse(post.hashtag || '[]').join(" , "),
        company: ((post.company) && post.company.name_cht) || "-",
        stick_top_index: post.stick_top_index?"是":"",
        stick_top_cata: post.stick_top_cata?"是":"",
      }))
    }
  },
  watch:{
    
  }
}
</script>

<style lang="sass">
.manage-post
  .table
    font-size: 13px
  .cell
    position: relative
    .cover
      width: 80px
  .post_status
    display: inline-block
    padding-left: 4px
    padding-right: 4px
    border-radius: 4px
    text-align: center
    
    &[data-status="已發佈"]
      background-color: #ffde9e
      color: #222
    &[data-status="草稿"]
      background-color: #eee
      color: #222
</style>
