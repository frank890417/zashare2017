<template lang="pug">
.page-expo.animated.slideInRight
  .container
    .row(v-for="expo in expos")
      .col-sm-12
        h2 {{expo.title}}
          .year {{expo.year}}
        hr
        .row
          router-link.col-sm-6(:to="`/expo/${expo.year}`")
            .cover(:style="bgcss(expo.cover)")
          .col-sm-6
            .cover(:style="bgcss(expo.report_cover)")
    
        
</template>

<script>
export default {
  data(){
    return {
      expos: [
        {
          year: 2018,
          title: "有敢擇學 - Try Try See !",
          cover: "http://zashare.org/img/expo/2017/1.jpg", 
          report_cover: "http://zashare.org/img/expo/2017/3.jpg", 
        },{
          year: 2017,
          title: "學你想學、學你想成為。 - Learn to be, not taught to fit.",
          cover: "https://az796311.vo.msecnd.net/userupload/afe7351a4adc41ca8a828fd5b606798f.jpg",
          report_cover: "http://zashare.org/img/expo/2016/2.jpg",  
        },
        {
          year: 2016,
          title: "不太乖教育節 - Naughty Education",
          cover: "http://img.accupass.com/userupload/dcfc34cde62f4340aae2dd00452b0ef9.jpg", 
          report_cover: "http://zashare.org/img/expo/2015/4.jpg", 
        },
      ]
    } 
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
