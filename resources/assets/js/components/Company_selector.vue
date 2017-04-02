<!-- 這邊是首頁的文章顯示區 -->
<template>
    <div class='form-group company_selector'>
      <label for='company'>攤位編號 
        <span v-if='company.name_cht && !company_linking'> (已連結攤位-{{company.name_cht}})</span> 
        <span v-if='!company.name_cht && !company_linking'> (無連結攤位)</span></label>
        <span v-if='company_linking'> 連結展位中...</span></label>
        
      <input id=company name=company class='form-control' v-model='company_filter'/>
    </div>
</template>

<script>

    var apiurl="http://build.zashare.org/api/company/tag/";

    module.exports={
      data:function (){
        return {
          company: {},
          company_filter: window.company_filter,
          company_linking: false
        }
      },
      watch: {
        company_filter: function(){
          this.update_company();
        }
      },methods: {
        update_company: function(){
          this.company_linking=true;
          this.company={};
          var vobj=this;
          this.$http.get(apiurl+this.company_filter).then(function(res){
            vobj.company=res.body;
            this.company_linking=false;
          });
          
        }
      },mounted: function(){
        this.update_company();
        vm=this;  
      }  
}

</script>

<style scoped lang=sass>

</style>