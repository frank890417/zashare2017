<template lang="pug">
.page_expo
  .container-fluid
    .row
      .col-carousel
        #myCarousel3.carousel.slide(data-ride='carousel', href='http://zashare.org')
          // Wrapper for slides
          .carousel-inner(role='listbox')
            .item.item_2017.active
              .bg_img(style="background-image:url(/img/expo/2017/1.jpg);")
              .carousel-caption
            .item.item_2017
              .bg_img(style='background-image:url(/img/expo/2017/2.jpg);')
              .carousel-caption
            .item.item_2017
              .bg_img(style='background-image:url(/img/expo/2017/3.jpg);')
              .carousel-caption
            .item.item_2017
              .bg_img(style='background-image:url(/img/expo/2017/4.jpg);')
              .carousel-caption
            .item.item_2017
              .bg_img(style='background-image:url(/img/expo/2017/5.jpg);')
              .carousel-caption
            .item.item_2017
              .bg_img(style='background-image:url(/img/expo/2017/6.jpg);')
              .carousel-caption
          // Left and right controls
          a.left.carousel-control(href='#myCarousel3', role='button', data-slide='prev', style='background: none')
            span.glyphicon.glyphicon-chevron-left(aria-hidden='true')
            span.sr-only Previous
          a.right.carousel-control(href='#myCarousel3', role='button', data-slide='next', style='background: none')
            span.glyphicon.glyphicon-chevron-right(aria-hidden='true')
            span.sr-only Next
      .col-content
        .text
          .text_inner
            .title
              h2
                | 2017
                br
                span 雜學校
              .bt_line(data-color='blue')
              h5
                | 10/20-22 華山1914
                br
                | 文化創意產業園區
            br
            p
              | 現在這個時代，我們不是不知道有什麼樣的途徑可以學習，而是不知道我們或生活還能「成為什麼樣子」。在打開對自己/生活的想像後，勇敢的選擇前往這個未來的學習途徑，成為你想成為的自己。
              br
              br
              | 過一年一度博覽會形式，2017雜學校於台北華山全區開設 7大主題展館。4天觀展人次超過5萬人次、亞洲各國超過120個團隊參展。
              br
              br
              | 動4天期間舉辦3場論壇、20場演講、6場實驗教育與自學分享、14場職人工作坊、42場教育體驗工作坊，容納最多元的創新教育內容，提供一般民眾、第一線教育者與產學界一個互動交流平台。

        .blue
    .row
      .col-carousel
        #myCarousel.carousel.slide(data-ride='carousel', href='http://zashare.org')
          // Indicators
          ol.carousel-indicators
            li.active(data-target='#myCarousel', data-slide-to='0')
            li(data-target='#myCarousel', data-slide-to='1')
            li(data-target='#myCarousel', data-slide-to='2')
            li(data-target='#myCarousel', data-slide-to='3')
            li(data-target='#myCarousel', data-slide-to='4')
            li(data-target='#myCarousel', data-slide-to='5')
            li(data-target='#myCarousel', data-slide-to='6')
          // Wrapper for slides
          .carousel-inner(role='listbox')
            .item.item_2016.active
              .bg_img(style="background-image: url('https://az796311.vo.msecnd.net/userupload/afe7351a4adc41ca8a828fd5b606798f.jpg');")
              .carousel-caption
            .item.item_2016
              .bg_img(style='background-image:url(/img/expo/2016/1.jpg);')
              .carousel-caption
            .item.item_2016
              .bg_img(style='background-image:url(/img/expo/2016/2.jpg);')
              .carousel-caption
            .item.item_2016
              .bg_img(style='background-image:url(/img/expo/2016/3.jpg);')
              .carousel-caption
            .item.item_2016
              .bg_img(style='background-image:url(/img/expo/2016/4.jpg);')
              .carousel-caption
            .item.item_2016
              .bg_img(style='background-image:url(/img/expo/2016/5.jpg);')
              .carousel-caption
            .item.item_2016
              .bg_img(style='background-image:url(/img/expo/2016/6.jpg);')
              .carousel-caption
          // Left and right controls
          a.left.carousel-control(href='#myCarousel', role='button', data-slide='prev', style='background: none')
            span.glyphicon.glyphicon-chevron-left(aria-hidden='true')
            span.sr-only Previous
          a.right.carousel-control(href='#myCarousel', role='button', data-slide='next', style='background: none')
            span.glyphicon.glyphicon-chevron-right(aria-hidden='true')
            span.sr-only Next
      .col-content
        .text
          .text_inner
            .title
              h2
                | 2016
                br
                span 雜學校
              .bt_line(data-color='red')
              h5
                | 11/26-27 華山1914
                br
                | 文化創意產業園區
            br
            p
              | 雜學校，亞洲最大創新教育展，前身為2015不太乖教育節。
              br
              br
              | 通過針對創新教育單位的邀展，結合論壇、實作工作坊與主題策展，打造全新教育策展體驗。在這裡，我們想給1-99歲的每一個人一個機會，去體驗教育的各種學習路徑與可能性。
              br
              br
              | 2016年展覽售票展出，創下2日17000人次參觀，160個亞洲創新教育單位參展的紀錄。
        .red
    .row
      .col-carousel(style='cursor: pointer')
        #myCarousel2.carousel.slide(data-ride='carousel', href='http://zashare.org')
          // Indicators
          ol.carousel-indicators
            li.active(data-target='#myCarousel2', data-slide-to='0')
            li(data-target='#myCarousel2', data-slide-to='1')
            li(data-target='#myCarousel2', data-slide-to='2')
            li(data-target='#myCarousel2', data-slide-to='3')
            li(data-target='#myCarousel2', data-slide-to='4')
            li(data-target='#myCarousel2', data-slide-to='5')
            li(data-target='#myCarousel2', data-slide-to='6')
          // Wrapper for slides
          .carousel-inner(role='listbox')
            .item.item_2015.active
              .bg_img(style="background-image: url('http://img.accupass.com/userupload/dcfc34cde62f4340aae2dd00452b0ef9.jpg');")
              .carousel-caption
            .item.item_2015
              .bg_img(style='background-image:url(/img/expo/2015/1.jpg);')
              .carousel-caption
            .item.item_2015
              .bg_img(style='background-image:url(/img/expo/2015/2.jpg);')
              .carousel-caption
            .item.item_2015
              .bg_img(style='background-image:url(/img/expo/2015/3.jpg);')
              .carousel-caption
            .item.item_2015
              .bg_img(style='background-image:url(/img/expo/2015/4.jpg);')
              .carousel-caption
            .item.item_2015
              .bg_img(style='background-image:url(/img/expo/2015/5.jpg);')
              .carousel-caption
            .item.item_2015
              .bg_img(style='background-image:url(/img/expo/2015/6.jpg);')
              .carousel-caption
          // Left and right controls
          a.left.carousel-control(href='#myCarousel2', role='button', data-slide='prev', style='background: none')
            span.glyphicon.glyphicon-chevron-left(aria-hidden='true')
            span.sr-only Previous
          a.right.carousel-control(href='#myCarousel2', role='button', data-slide='next', style='background: none')
            span.glyphicon.glyphicon-chevron-right(aria-hidden='true')
            span.sr-only Next
      .col-content
        .text
          .text_inner
            .title
              h2
                | 2015
                br
                span 不太乖教育節
              .bt_line(data-color='green')
              h5
                | 05/09-10 華山1914
                br
                | 文化創意產業園區
            br
            p
              | 為期兩天的不太乖教育節，是一個由民間自主發起由下而上的社會創新策展。
              br
              br
              |               好或不好怎麼定義？不一樣的可能在哪裡？教育還可以走去哪？我們可以長成什麼樣子？
              br.lg
              | 走過不太乖教育節，打開大眾對「教育」的想像。
              br
              br
              | 我們知道教育沒有標準答案，
              br
              | 不管你乖不乖，都沒有人可以定義你。
        .green

</template>

<script>
import $ from 'jquery'
import slick from 'slick-carousel'

export default {
  metaInfo: {
    title: '歷屆展覽', // set a title
    titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
  }
}
</script>

<style>

</style>
