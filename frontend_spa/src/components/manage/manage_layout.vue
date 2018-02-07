<template lang="pug">
#manage_app
  .container-fluid
    .row
      //- el-header
      .col-sm-2.col-nav
        el-menu(:default-active="activeIndex" 
          class="el-menu-demo" @select="handleSelect",
          router="true")
          el-menu-item(index="/manage/post") 文章管理 
          el-menu-item(index="/manage/company") 攤位管理 
          el-menu-item(index="/manage/cata") 類別管理 

      .col-sm-10.offset-2.col-content
        transition(name="fade", mode="out-in")
          router-view(:key="$route.path")
      .col-sm-12
        el-footer
</template>

<script>
export default {
  name: 'app',
  data(){
    return {
      activeIndex: '1'
    }
  },
  methods:{
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    }
  }
}
</script>

<style>
.col-nav{
  position: fixed;
  top: 150px;
}

#manage_app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  padding-top: 20px;
}
</style>
