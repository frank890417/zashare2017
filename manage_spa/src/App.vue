<template lang="pug">
#app
  el-container
    el-header
      el-menu(:default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect")
        el-menu-item(index="1") 文章管理 
        el-menu-item(index="2") 攤位管理 
        el-menu-item(index="3") 類別管理 

    el-container
      
  
      el-main
        transition(name="fade", mode="out-in" :key="$route.path")
          router-view
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
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
