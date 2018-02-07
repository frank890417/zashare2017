<template lang="pug">
.page-expo.animated.slideInRight
  .container
    .row(v-for="expo in expos")
      .col-sm-12
        h2 {{expo.title}}
          .year {{expo.year}}
        hr
        .row.row-content
          router-link.col-sm-6(:to="`/expo/${expo.year}`")
            .cover(:style="bgcss(expo.cover)")
          router-link.col-sm-6(:to="`/expo/${expo.year}/blog`")
            .cover(:style="bgcss(expo.report_cover)")
    
        
</template>

<script>
import {mapState} from 'vuex'
export default {
  data(){
    return {
      
    } 
  },
  computed: {
    ...mapState(['expos'])
  }
}
</script>

<style lang="sass">
.page-expo
  padding-left: 350px 
  box-sizing: border-box
  text-align: left
  .container-fluid
    padding: 50px

  .cover
    width: 100%
    height: 300px
    background-color: #eee
    background-size: cover
  .container
    padding: 50px
  .year
    float: right
  hr
    border: none
    width: 100%
    height: 8px
    background-color: black
    margin-top: 5px
    margin-bottom: 40px
  .col-sm-12
    margin-bottom: 100px
</style>
