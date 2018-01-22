<template lang="pug">
#app
  .container-fluid
    .row
      //- el-header
      .col-sm-2.col-nav
        el-menu(:default-active="activeIndex" 
          class="el-menu-demo" @select="handleSelect")
          el-menu-item(index="1")
            router-link(to="/post") 文章管理 
          el-menu-item(index="2") 
            router-link(to="/company") 攤位管理 
          el-menu-item(index="3") 
            router-link(to="/cata") 類別管理 

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
}

#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
