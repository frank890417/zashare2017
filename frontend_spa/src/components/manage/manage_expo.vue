<template lang="pug">
  .page.manage-post.text-left
    .container
      .row
        .col-sm-12
          h3 展覽資料管理
          //- el-input(v-model="keyword", placeholder="輸入關鍵字")
          br
            
      .row
        .col-sm-4
          h2 expo類別清單
          ul.list-group
            li.list-group-item(v-for="ct in expotypes")
              h4 名稱：{{ct.title}}
                el-button.btn.btn-danger.float-right(@click="handleDelete(ct.id)",type="danger") -
              p 
                span 啟用時間：{{ct.active_datetime}}<br>
                span 結束時間：{{ct.expiry_datetime}}<br>
                span 領取資格：  {{ ct.user_can_get}}<br>
                span 類型： {{ ct.type=='single_time_hash'?'批次序號 / 單次使用':'單一序號 ／ 多次領取' }}<br>
                span(v-if="ct.type=='single_time_hash'") 已領取數量： {{ getexpoTotal(ct).got }} / {{ct.expos.length}}
                span(v-else) 已領取數量：{{ getUserLength(ct.users) }} 
              
        .col-sm-8
          h3 新增expo群組
          el-form(label-width="150px")
            el-form-item(label="標題")
              el-input(v-model="newexpo.title")
            el-form-item(label="封面圖片")
              el-input(v-model="newexpo.cover")
                default_pic_selector(@select_pic="select_pic" slot="append")
              img(:src="newexpo.cover", style="width: 100%;max-width: 100px")
            el-form-item(label="說明")
              el-input(v-model="newexpo.description")
            el-form-item(label="類別")
              el-select(v-model="newexpo.type")
                el-option(value="single_time_hash" label="批次序號 / 單次使用")   
                el-option(value="multi_time_single_hash" label="單一序號 ／ 多次領取")   
            el-form-item(label="可領取用戶別")
              el-select(v-model="newexpo.user_can_get"
                        multiple
                        filterable
                        default-first-option
                        placeholder="請選擇群組")
                el-option(
                  v-for="item in default_usergroup"
                  :key="item"
                  :label="item.label"
                  :value="item.value") 
            //el-form-item(label="已領取使用者")
              el-input(v-model="newexpo.users")
            //- el-form-item(label="可重複使用")
            //-   el-switch(v-model="newexpo.resuable")
            el-form-item(label="開始時間")
              el-date-picker(v-model="newexpo.active_datetime",
                                    type="datetime",
                                    value-format="yyyy-MM-dd HH:mm:ss")
            el-form-item(label="失效時間")
              el-date-picker(v-model="newexpo.expiry_datetime",
                                    type="datetime",
                                    value-format="yyyy-MM-dd HH:mm:ss")
            el-form-item(label="expo序號")

              el-input(type="textarea", v-model="newexpo.expos" , 
                        v-if="newexpo.type=='single_time_hash'",
                        placeholder="(從excel直接複製或以換行分隔)",
                        :rows="5")

              el-input(v-model="newexpo.expos" ,  
                      v-if="newexpo.type=='multi_time_single_hash'",
                        placeholder="請輸入單個序號")
                
            el-button(@click="addexpoType") 新增類別
          //- ul.list-group
            li.list-group-item 
          hr
    //- el-table(:data="catas" border)
      el-table-column(prop="id",label="#", width="60" sortable)
      //- el-table-column(prop="tag",label="類別", width="80" sortable)
      el-table-column(prop="name",label="名字", width="200" sortable)
     
      
</template>

<script>
import default_pic_selector from '../default_pic_selector.vue'
import {mapState} from 'vuex'
import axios from 'axios'
export default {
  data(){
    return {
      // posts: [],
      keyword: "",
      now_year: "2016",
      expotypes: [],
      newexpo: {
        user_can_get: [
          'studentcard'
        ],
        resuable: false
      },
      default_usergroup: [
        {value: "studentcard",label: "有學生證會員"},
        {value: "admin",label: "管理員"},
        {value: "all",label: "所有會員"}
      ]
    }
  },
  mounted(){
    this.loadAll()
  },
  methods: {
    getUserLength(users){
      if (users){
        return JSON.parse(users).length
      }else{
        return 0
      }
    },
    select_pic(obj){
      console.log(obj)
      this.$set(this.newexpo,"cover",obj.url)

    },
    getexpoTotal(ct){
      return {
        got: ct.expos.filter(o=>o.user_id).length,
        total: ct.expos.length
      }
    },
    addexpoType(){
      axios.post("/api/expo",{
        token: this.token,
        ...this.newexpo,
      }).then(res=>{
        console.log(res.data)
        this.loadAll()
      })

    },
    loadAll(){
      axios.get("/api/expo",{
        params: {
          token: this.token,
        }
      }).then(res=>{
        this.expos = res.data
        this.$message.success("新增成功")
      })
    },

    handleDelete(id){
      // console.log(row)
      this.$confirm("你確定要刪除嗎？").then(()=>{
        this.axios.post(`/api/expo/${id}`,{
          _method: 'DELETE',
          token: this.token,
          dataType: 'JSON',
        }).then((res)=>{
  
          this.$message.success("刪除完成")
          // this.$store.dispatch("loadWebsite")
           this.loadAll()
          // this.$router.push('/activity')
        })

      })
    },
  },
  computed:{
     ...mapState({
      catas: state=>state.manage.catas,
      token: state=>state.auth.token
    }),
    // filteredCompany(){
    //   return this.companies.filter(company=>{
    //     return this.keyword=="" || JSON.stringify(company).indexOf(this.keyword)!=-1
    //   }).filter(company=>{
    //     return this.now_year=="" || company.year == this.now_year
    //   }).map(company=>({
    //     ...company,
    //   }))
    // }
  },
  components: {
    default_pic_selector
  }
}
</script>

<style lang="sass">
.cell
  position: relative
  .cover
    width: 100px
</style>
