<template lang="pug">
.page_news
  .container-fluid
    .blue_bg.news3
      .container
        .row
          .col-sm-4.visible-xs
            img.person(src='http://zashare.org/funding_assets/img/main/header-s1.png', alt='')
          .col-sm-8.pdlr(style="z-index: 1")
            h1 2017雜學校門票開賣囉！
            br
            p
              | 2017雜學校，售票系統正式上線！還記得我們去年的約定嗎？
              br
              | 今年我們包下整個華山，創造亞洲最大學習內容互動平台。
              br
              | 即日起到9/30可享早鳥優惠，快和我們一起「有感擇學TRY TRY SEE!」
            br
            br.hidden-xs
            br.hidden-xs
            br
          .col-sm-4.hidden-xs
            img.person.fadeIn.animated(src='http://zashare.org/funding_assets/img/main/header-s1.png', alt='')
            
        .row.dark_bg
          .row
            .col-sm-1
              h3
                | 購票
                br.hidden-xs
                | 方式
            .col-sm-11
              //img.visible-xs(src='http://zashare.org/funding_assets/img/main/2-right.png', alt='')
              .row
                .col-sm-4
                  .round_title 網路購票
                  a(
                    target='_blank', 
                    href='https://zashare.kktix.cc/events/2017zashare', 
                    @click="$ga.event('link', 'click', '購票-網路購票')"
                    )
                    | KKTIX 
                    i.fa.fa-link
                  h5 (KKTIX電子票券)
                  br
                  a(
                    target='_blank', 
                    href='http://tickets.books.com.tw/progshow/08010901224680/', 
                    @click="$ga.event('link', 'click', '購票-博客來')"
                    )
                    | 博客來 
                    i.fa.fa-link
                  h5 (iBon實體票券)
                .col-sm-4
                  .round_title 超商購票
                  a(target='_blank', 
                    href='http://support.kktix.com/knowledgebase/articles/636721-全家famiport購票', 
                    @click="$ga.event('link', 'click', '購票-全家FamiPort')"
                    )
                    | 全家FamiPort 
                    i.fa.fa-link
                  h5 (FamiPort實體票券)
                  br
                  a(
                    target='_blank', 
                    href='http://www.ticket.com.tw/infor/ibon.htm', 
                    @click="$ga.event('link', 'click', '購票-7-11 iBon')"
                    )
                    | 7-11 iBon 
                    i.fa.fa-link
                  h5 (iBon實體票券)
                .col-sm-4
                  .round_title 現場購票
                  h4 活動現場實體票券
          .row
            .col-sm-1
              h3 票價
            .col-sm-11
              .row
                .col-sm-4
                  .round_title
                    | 早鳥票
                    .small (僅於網路販售)
                  h5 即日起到9/30 (Sat.)
                  h4
                    | $280 團購票
                    br
                    | $300 單日票
                .col-sm-4
                  .round_title 網路票
                  h5 10/01 (Sun.) - 10/19 (Thu.)
                  h4
                    | $300 團購票
                    br
                    | $320 單日票
                .col-sm-4
                  .round_title 現場票
                  h5 10/20 (Fri.) - 10/22 (Sun.)
                  h4 $350 現場票
          .row
            .col-sm-1
              h3
                | 免票
                br.hidden-xs
                | 資格
            .col-sm-11
              ul.listWarn
                li — 持身心障礙手冊人士，現場憑證明文件可另攜一位陪同人免費入場
                li — 6歲以下（含6歲），65歲以上，出示相關證明文件可免費入場
                li — 符合免票資格者，入場前需先至博覽會入口處出示證明文件兌換入場手環
          .row
            .col-sm-1
              h3
                | 注意
                br.hidden-xs
                | 事項
            .col-sm-11
              ul.listWarn
                li — 6張以上為團購票價
                li — 超商取票一筆訂單手續費皆為$30 ｜  博客來宅配取票一筆訂單手續費皆為$50 
                li — KKTIX電子票券、超商購票、現場購票免手續費
                li — 超商購票、取票一筆訂單上限為4張｜  博客來宅配取票一筆訂單上限為49張 ｜  KKTIX電子票券一筆訂單上限為20張
                li — 超過50張以上的票券採購請聯繫主辦單位洽詢團購方案 ｜  聯繫窗口： zashare@ozzie-art.com 楊小姐
     
</template>

<script>
export default {
  metaInfo: {
    title: '展覽購票', // set a title
    titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
  },

}
</script>

<style>

</style>
