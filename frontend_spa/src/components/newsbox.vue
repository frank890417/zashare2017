<template lang="pug">
  router-link.news_box(to="target",
                       :style="bgcss(post.cover)")
    .tag {{tag}}
    .title {{post.title}}

    
</template>

<script>
export default {
  props: ['post','target','tag'],
  
}
</script>

<style lang="sass">
  .news_box
    height: 195px

</style>
