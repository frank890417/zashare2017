<template lang="pug">
.page_news
  .container
    .row.theme.blue
      .col-sm-12
        iframe( width="100%" height="600" src="https://www.youtube.com/embed/_oES5Y1QQ7s" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen>)
      .col-sm-12
        h1 【2017雜學校 謝謝五萬名師生的入學支持
        p 當大家都在批評教育體制的僵化或混亂時，我們一直在想以我們的專業，還能為台灣的教育做些什麼?<br>同時也思考著，到底這個世代還能用什麼樣的方式，可以發揮更大的影響力。<br>
          | 台灣不缺創新教育內容、方法與獻身教育的人，卻缺乏讓這些多元且珍貴的人與內容，有一個被看見的舞台。於是，雜學校出現了。<br>
          | 2017年雜學校，<br>
          | 7大主題館、10+國籍參與者、<br>
          | 100+論壇與講座、120+海內外創新教育單位、<br>
          | 200+跨領域KOL與講師、500+體驗式學習活動。<br>
          | 匯集50,000+師生入學。<br>
          | 謝謝五萬名師生的入學支持<br>
          | 讓台灣創新教育的溫柔革命得以發生。<br>
          | ✦ 2018建校大業火熱籌備中！✦
    //.orange_bg
      .container
        .row
          .col-sm-11
            h1.newsTitle 雜學校募資大業啟動 擔任建校元老就趁現在!
            br
            p
              | 在這裡,教育將沒有框架的限制
              br
              | 在這裡,你可以「學你想學、學你想成為」
              br
              | 在這裡,能夠客製化讓你創造一個獨一無二的自己。
              br
              br
              | 現在,誠摯的邀請你們一起加入我們的建校大業,
              br
              | 成為雜學校第一批學生。
            img.visible-xs(src='http://zashare.org/funding_assets/img/main/2-right.png', alt='')
          .col-sm-1
            p.vertical_text
              | 入學條件:1-99歲的每一個人
              br
              | 入學考試:破關『教育迷宮遊戲』
              br
              | 招生名額:2017位
          .col-sm-12
            hr
          .col-sm-8
            h3
              | 身為 
              u 雜學校建校元老
              | ,有什麼「特權」?
            .row
              .col-sm-4.fcenter.vertical
                .num 01
                h4 雜學校學生證
                p 一張在手,雜學無窮!
              .col-sm-4.fcenter.vertical
                .num 02
                h4 雜博覽
                p
                  | 2017年尊榮級觀展體驗
                  br
                  | @華山1914
              .col-sm-4.fcenter.vertical
                .num 03
                h4 雜學堂
                p
                  | 24 堂超狂講師
                  br
                  | 手把手教你最雜的知識
            hr
            h4
              | 看更多建校內容>>> 
              a.btn(href='https://backme.tw/ref/GZMac/', target='_blank')
                | 立即支持建校
          .col-sm-4
            img.hidden-xs(src='http://zashare.org/funding_assets/img/main/2-right.png', alt='')
    //.blue_bg
      .container.area_news
        .row
          .col-sm-4.visible-xs
            img.person(src='http://zashare.org/funding_assets/img/main/header-s3.png', alt='')
          .col-sm-8.pdlr(style="z-index: 1")
            h1 2017 雜學校參展入圍名單出爐囉！
            p.subtitle
              | 今年度雜學校「有敢擇學try try see」公開徵展後，收到了近五百個優秀團隊的申請，
              | 在策展團隊經過無數個爭辯廝殺討論後，熱騰騰的入選名單終於出爐囉！
              | 快來一探究竟今年入選的優秀團隊有哪些！
              br
              br
            router-link.btn.btn-primary(to="/expo2017/attends") 查看2017攤位介紹!
            br
            br
          .col-sm-4.hidden-xs
            img.person(src='http://zashare.org/funding_assets/img/main/header-s3.png', alt='')
        .row
          .col-sm-12
            .form-inline
              input.form-control(type='text', v-model='teamfilter', placeholder='快速搜尋(名稱/編號)')
              label(for='')  &nbsp;(共{{filtered2017list.length}}項結果)
        .row.row_list(v-for='cata in cata2017', v-if='getCataTeam2017(cata).length')
          .col-sm-12
            br
            h3  {{cata}} 
          .catabox.col-sm-12
            a.col-sm-4.team(v-for='team in getCataTeam2017(cata)', :href="team.website.indexOf('http')!=-1?team.website:'http://'+team.website", target='_blank', :title="'前往'+team.name+'的網站'")
              .tag {{team.tag}}
              .title {{team.name}}
      br
      br
      .container.area_news.area_news_white
        .row
          .col-sm-12
            h1
              | 【有看見去年的你嗎？】
              br.visible-xs
              | 2016雜學校回顧影片釋出！
            br
            br
          .col-sm-12
            iframe(src='https://www.youtube.com/embed/fBgHQJG8UOM', frameborder='0', allowfullscreen='')
            br
            br
            h4
              | 匯聚所有學校沒教
              br
              br
              | 						適合每一個你的不同學習路徑
              br
            p
              br
              | 						雜學校，亞洲最大創新教育展（前身為2015不太乖教育節）。通過針對創新教育單位的邀展，結合論壇、實作工作坊與主題策展，打造全新教育策展體驗。去年的你，到現場「雜」了嗎？！快來看看影片找尋你的身影吧！（錯過了？沒關係！看完影片一樣讓你身歷其境～！）
              br
              br
              | 						因為有了每一個你的大力相挺，2017雜學校正籌備著一樁前所未見的擴校計畫！從包下”整個華山“，然後再包下“整座城市”，雜學校希望學習這件事像空氣一樣充滿在每個角落～更落實讓1-99歲的所有人，都「學你想學，學你想成為」！
              br
              br
              | 						打勾勾，
              br
              | 						今年我們相約10月20-22日 華山1914文化創意產業園區 見！
            br
            a.btn.btn-default(href='/blog') 看更多2016精采故事

</template>

<script>
export default {
  metaInfo: {
    title: '最新消息', // set a title
    titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
  },
  data() {
    return {
      list2017: require('../zashare_2017_group_list').default,
      cata2017: [
        "德－公民道德",
        "智－思考批判力",
        "體－身體實踐",
        "群－關係",
        "美－美感經驗",
        "實驗教育"
      ],
      teamfilter: ""
    }
  },
  methods: {
    getCataTeam2017(cata){
      return this.filtered2017list.filter(o=>o.theme==cata)
    }
  },
  computed: {
    filtered2017list(){
      if (this.teamfilter==""){
        return this.list2017
      }
      return this.list2017.filter(o=>(
        o.tag.toLowerCase().indexOf(this.teamfilter.toLowerCase())!=-1 || o.name.toLowerCase().indexOf(this.teamfilter.toLowerCase())!=-1
      ))
    }
  }
}
</script>

<style>

</style>
