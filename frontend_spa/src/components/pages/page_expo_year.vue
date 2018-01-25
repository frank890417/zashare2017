<template lang="pug">
.page-expo-year.animated.slideInRight
  .container
    .row
      .col-sm-12
        .cover
      .col-sm-12
        h3 {{$route.params.year}}
        h1 雜學校－亞洲創新教育博覽會
        h2 有敢擇學 MY BRAVECATION!
      .col-sm-12
        p TIME: ２０１７/１０/２０-２２<br>PLACE: 華山1914文化創意產業園區
          .floatright #影音　#影音　#影音
        hr
      .col-sm-12
        p 現在這個時代，我們不是不知道有什麼樣的途徑可以學習，而是不知道我們或生活還能「成為什麼樣子」。<br><br>在打開對自己/生活的想像後，勇敢的選擇前往這個未來的學習途徑，成為你想成為的自己。<br><br>通過一年一度博覽會形式，2017雜學校於台北華山全區開設 7大主題展館。4天觀展人次超過5萬人次、亞洲各國超過120個團隊參展。活動4天期間舉辦3場論壇、20場演講、6場實驗教育與自學分享、14場職人工作坊、42場教育體驗工作坊，容納最多元的創新教育內容，提供一般民眾、第一線教育者與產學界一個互動交流平台。
    .row
      .col-sm-12
        h3 推薦參展報導
        hr
    .row
      .col-sm-4(v-for="i in 3") 
        
        h4 阿滴英文
        
</template>

<script>
export default {

}
</script>

<style lang="sass">
.page-expo-year
  padding-left: 300px
  text-align: left
  .cover
    height: 300px
    background-color: #aaa
    margin-top: 50px
    margin-bottom: 50px
  .container
    margin-left: auto
    margin-right: auto
</style>
