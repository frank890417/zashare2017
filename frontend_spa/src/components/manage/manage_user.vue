<template lang="pug">
  .page.manage-user.text-left
    h3.mt-5 管理使用者
    el-input(v-model="keyword", placeholder="輸入關鍵字")
    br
    //router-link(to="/manage/company/new")
      el-button.btn.btn-primary( type="primary") + 新增單位
    //el-select(v-model="now_year")
      el-option(value="2017", label="2017")
      el-option(value="2016", label="2016")
    br
    csv_export(:data="users", title="使用者清單")
    el-pagination(layout="prev, pager, next",
                  :page-count="chunkedUsers.length",
                  :current-page.sync="currentPage",
                  :pager-count="10"
    )
    el-table(:data="chunkedUsers[currentPage-1]" border max-height="800")
      el-table-column(prop="id",label="#", width="60" :sortable="true")
      //- el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="name",label="名字", width="150" :sortable="true")
      el-table-column(prop="email",label="Email", width="300" :sortable="true")
      el-table-column(prop="job",label="職業", width="200", :sortable="true")
      el-table-column(prop="jobcata",label="職業類別", width="200", :sortable="true")
      el-table-column(prop="birthday",label="生日", width="100", :sortable="true")
      el-table-column(prop="phone",label="手機", width="100", :sortable="true")
      el-table-column(prop="created_at",label="註冊時間", width="160", :sortable="true")
      el-table-column(prop="group",label="權限", width="100" :sortable="true")
      //el-table-column(prop="cover",label="Logo", width="120")
        template(slot-scope="scope")
          img.cover(:src="scope.row.logo")
      //el-table-column(prop="year",label="年度", width="100" :sortable="true",
        :filters="[{ text: '2016', value: '2016' }, { text: '2017', value: '2017' }]",
        :filter-method="filterYear")
      //el-table-column(prop="discribe_cht",label="中文敘述" )
      //el-table-column(label="操作", width="100")
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
import axios from 'axios'
export default {
  data(){
    return {
      users: [],
      keyword: "",
      currentPage: 1
    }
  },
  created(){
    axios.get('/api/user',{params: {token: this.token}}).then(res=>{
      this.users=res.data
    })
  },
  methods: {
    
  },
  computed:{
     ...mapState({
      token: state=>state.auth.token
    }),
    filteredUser(){
      return this.users.filter(user=>{
        return this.keyword=="" || JSON.stringify(user).indexOf(this.keyword)!=-1
      }).map(user=>({
        ...user,
      }))
    },
    chunkedUsers(){
      return _.chunk(this.filteredUser,10)
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
