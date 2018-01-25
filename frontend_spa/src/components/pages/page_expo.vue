<template lang="pug">
.page-expo.animated.slideInRight
  .container
    .row
      .col-sm-12
        h2 有敢擇學 - Try Try See !
          .year 2018
        hr
        .row
          router-link.col-sm-6(to="/expo/2018")
            .cover
          .col-sm-6
            .cover
      .col-sm-12
        h2 學你想學、學你想成為。 - Learn to be, not taught to fit.
          .year 2017
        hr
        .row
          router-link.col-sm-6(to="/expo/2017")
            .cover
          .col-sm-6
            .cover
      .col-sm-12
        h2 不太乖教育節 - Naughty Education
          .year 2016
        hr
        .row
          router-link.col-sm-6(to="/expo/2016")
            .cover
          .col-sm-6
            .cover
</template>

<script>
export default {

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
