<template lang="pug">
.page_expo_2017
  .btn_go_to_top 
    i.fa.fa-angle-up

  section.sectionHero.themeBlue.text-center
    video(src="/video/za_brand_video.mp4" autoplay muted loop)
    img.logo( src='http://zashare.org/img/2017/index0829_coverLogo.svg')
    
  section.sectionPurpose.themeDarkBlue
    .container-fluid
      .col-sm-6
        .row
          .col-sm-8.col-sm-offset-3.col-xs-offset-0
            h3.eng_title ZASHARE
            h2 雜學校
              br
              span 亞洲創新教育博覽會
            p 現在這個時代，我們不是不知道有什麼樣的途徑可以學習，而是不知道我們或生活還能「成為什麼樣子」。在打開對自己/生活的想像後，勇敢的選擇前往這個未來的學習途徑，成為你想成為的自己。這，就是「有敢擇學」的精神。
            .btn.btn-orange.btn-lg.btn-tickets 勇敢購票
        //.col-sm-6
          img(src='/img/2017/expo_2017/02/宣傳圖.jpg')
  section.sectionAbout.themeWhite
    .container
      .row
        .col-sm-6
          .scenePics
            img(src="/img/2017/expo_2017/03/03換圖_2015.jpg")
            img(src="/img/2017/expo_2017/03/03換圖_2016.jpg")
            img(src="/img/2017/expo_2017/03/03換圖_2017.jpg")
        .col-sm-6
          h3.eng_title ABOUT SCHOOL
          h2 關於雜學校
          p 當大家都在批評教育體制的僵化或混亂時，我們一直在想以我們的專業，還能為台灣的教育做些什麼?同時也思考著，到底這個世代還能用什麼樣的方式，可以發揮更大的影響力。
            br
            | 台灣不缺創新教育內容、方法與獻身教育的人，卻缺乏讓這些多元且珍貴的人與內容，有一個被看見的舞台。於是，雜學校出現了。
            br
            | 2017 年，徵集 120 個創新教育機構參展，活動三天舉辦超過 50 場講座與工作坊，要你一次了解台灣教育現況，更可以從中找到屬於每個人的不同學習路徑。 
    
  section.sectionTheme.themeBlue
    .container
      .row.text-center
        .col-sm-6.col-sm-offset-3
          h3.eng_title BIG EVENT
          h2 亞洲唯一
              br.visible-xs
              | 創新教育內容展
          p 邀請上百個創新學習機構、個人<br>重新定義五育，打破過往教育想像<br>我們說，教育是要讓我們成為更好的人<br>所以生活，才應該是教育的內容
    .panelCards
      ul.themeCards
        .card(v-for="(card,cid) in themeCards" ,
                :style="{'background-image': 'url('+card.img+')'}",
                :title="'前往參展單位介紹-'+card.title")
          //:to="'/expo2017/attends#'+card.title",
          h4.cardTitle {{card.title}}
          p(v-html="card.content")
      //vue-slider(v-model="themeCardOffset")
      
  section.sectionEvents.themeDarkBlue
    .page.themeDarkBlue(@click="nowEventPage=0" , :style="{'left': getEventOffset(0)}" :class="{active: nowEventPage==0}")
      .ver_title 實驗教育館
        i.fa.fa-caret-left(v-if="nowEventPage<=0")
        i.fa.fa-caret-right(v-else)
      .container
        .row
          .col-sm-6
            h3.eng_title Ｍore Possibility
            h2 給未來的教育
              br.visible-xs
              | 更多可能性
              br
              span 實驗教育館
            p 2017年，雜學校邀請實驗教育推手-陳怡光 (陳爸)共同策展，邀請臺灣各地實驗教育機構前來參與展出，用親身的互動，讓大眾能理解當代實驗教育發展。同時，也邀請亞洲知名親子媒體-親子天下，共同策劃「臺灣實驗教育論壇」，創造更多的討論空間，一起找到屬於臺灣實驗教育的方向。 

          .col-sm-6
            img(src="/img/2017/expo_2017/event/實驗教育館.jpg", alt="")
          
    .page1.themeWhite(@click="nowEventPage=1", :style="{'left': getEventOffset(1)}" :class="{active: nowEventPage==1}")
      .ver_title 雜工坊
        i.fa.fa-caret-left(v-if="nowEventPage<=1")
        i.fa.fa-caret-right(v-else)
      .container
        .row
          .col-sm-6
            h3.eng_title DARE TO TRY
            h2 43 場勇敢試試看的
              br.visible-xs
              | 體驗工作坊
              br
              span 雜工坊
            p 雜工坊邀請各參展單位參與，在工坊空間帶出更有趣、 更身歷其境的創新教育內容的體 驗。<br>同時，雜學校更與「交點」 合作，成立雜點工作坊，讓更多有趣的想法可以在這裡有舞台被更多人看見。<br>另外，雜學校更關注到台灣教育中，缺乏對「技職」 的想像與注意，此次邀請到「職人」、「技職 3.0」兩個關注台灣技職領域的團隊，為我們開設一系列職人工坊，一探職人的世界!
            br
            //router-link.btn.btn-blue(to="/expo2017/workshops") 查看場次
          .col-sm-6
            img(src="/img/2017/expo_2017/event/雜工坊.jpg")
    .page2.themeDarkBlue(@click="nowEventPage=2" , :style="{'left': getEventOffset(2)}" ,:class="{active: nowEventPage==2}")
      .ver_title 雜講堂
        i.fa.fa-caret-left(v-if="nowEventPage<=2")
        i.fa.fa-caret-right(v-else)
      .container
        .row
          .col-sm-6
            h3.eng_title BRAVE PEOPLE
            h2 絕對不能錯過的
              br.visible-xs
              | 20 個勇敢講堂
              br
              span 雜講堂
            p 2017 年「超勇敢」的雜講堂， 讓各類議題、各種人生在這裡勇敢發聲。<br><br>身分證還可以是什麼樣子?讓知名作家詹偉雄、台大教授李明璁等人來和你聊一聊。還有知名部落客 AKKO、熊仁謙、台灣吧-蕭宇辰、知名 Youtuber MOM&DAD、最衝公民教師-黃益中、翻轉教育推手-葉丙成教授等等⋯，要來講堂跟你聊勇敢、聊人生。
          .col-sm-6
            img(src="/img/2017/expo_2017/event/雜講堂.jpg")  
  
  section.sectionPlan.themeBlue
    .row.text-center
      .col-sm-6.col-sm-offset-3.col-xs-offset-0
        h3.eng_title LAUNCH PLAN
        h2 雜學校建校大業
          br.visible-xs
          | 計畫啟動
        p 將單次展覽擴展成年度計畫<br>打造一間地表最嚮往的未來學校<br>MY SCHOOL, MY BRAVEDUCATION<br>我們堅信台灣可以是亞洲最大的創新教育內容平台。
        br
        br
      .col-sm-10.col-sm-offset-1.col-xs-offset-0
        .row
          .col-sm-3
            .planCard.Orange
              .num ∞
                span.small 
              p 10/20-10/22<br>三日雜學校展覽<br>無限次進出
          .col-sm-3
            .planCard.darkBlue
              .num 5
                span.small 折
              p 進入實體雜講堂現場<br>一睹講師的風采<br>帶走滿滿的收穫
          .col-sm-3
            .planCard.Orange
              .num 24
                span.small 堂
              p 行銷？程式？設計？<br>最狂講師陣容<br>手把手地教你史上最雜知識<br>「學你想學，學你想成為」<br>不再是口號！
          .col-sm-3
            .planCard.darkBlue
              .num 9
                span.small 折
              p 雜學校特約夥伴周邊商品<br>以及課程優惠
      .col-sm-6.col-sm-offset-3.col-xs-offset-0
        br
        br
        br
        h3 快跟朋友一起到活動現場 「有敢」的支持我們建校<br>（ 要來現場ZASHOP註冊雜學校學生證哦！）
        a.btn.btn-primary.btn-lg(href="/funding") 線上暸解學生證
        br
        br
        br
      .col-sm-12
        h3.text-center 那個活動現場要怎麼進去？<br>我想買博覽會的門票！
        br
        i.fa.fa-angle-double-down(style="color: white;font-size: 50px")

  section.sectionSchool.themeWhite
    .container
      .row.text-center
        .col-sm-6.col-sm-offset-3.col-xs-offset-0
          h3.eng_title OPEN SCHOOL
          h2 開學資訊
          p 2017年，雜學校勇敢包下整座華山園區，<br>以超實惠的票價，囊括創新教育博覽會、雜學主題館、<br>實驗教育館、演講、工作坊<br>讓・你・一・票・逛・到・底！
  
  section.sectionInfo.themeDarkBlue
    .container-fluid
      .row
        .col-sm-6.panelInfo
          .row
            .col-sm-6.col-sm-offset-3.col-xs-offset-0
              h3 開學時間DATE :
              h5 2017.10.20 FRI. - 10.22 SUN.
              p ※10/20-10/21 每日10-20點開放參觀<br>※10/22 10-17點開放參觀<br>※每日最後入場時間為閉館前30分鐘
              br
              h3 地點 VENUE :
              p 台北華山1914文創產業園區（捷運忠孝新生站)<br>Huashan1914.Creative Park, Taipei 
              br.visible-xs
        .col-sm-6.col-map
          iframe(src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.703477056893!2d121.52721081483303!3d25.044135144039476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a96523e0246d%3A0xf1c9276707165c71!2z6I-v5bGxMTkxNOaWh-WJteWckuWNgA!5e0!3m2!1szh-TW!2stw!4v1507557998332" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen)
    
  //.themeWhite
    .container
      .row
        .col-sm-12
          h1 購票
          a(href="https://kktix.com/events/2017zashare/registrations/new") https://kktix.com/events/2017zashare/registrations/new
    
        
  section.sectionTicket.page_news
    .blue_bg.news3
      .container
        .row
          .col-sm-4.visible-xs
            img.person(src='http://zashare.org/funding_assets/img/main/header-s1.png', alt='' ,style="z-index: 0")
          .col-sm-8.pdlr(style="z-index: 1")
            h1 一張門票打開創新教育的眼界，不買嗎？
            br
            p
              | 2017雜學校，售票系統正式上線！還記得我們去年的約定嗎？
              br
              | 今年我們包下整個華山，創造亞洲最大學習內容互動平台。
              br
              //| 即日起到9/30可享早鳥優惠，快和我們一起「有感擇學TRY TRY SEE!」
            //br
            //br.hidden-xs
            br.hidden-xs
            br
          .col-sm-4.hidden-xs
            img.person.fadeIn.animated(src='http://zashare.org/funding_assets/img/main/header-s1.png', alt='')
            
        .row.dark_bg(style="z-index: 1;position: relative;")
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
                    @click="$ga.event('link', 'click', '購票-kktix')"
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
      
  section.sectionSupport
    .container
      img(src="/img/2017/logos.jpg", style="width: 100%")
</template>

<script>


import vueSlider from 'vue-slider-component'

export default {
  components: {
		vueSlider
	},
  data(){
    return {
      metaInfo: {
        title: '2017展覽購票', // set a title
        titleTemplate: '%s - 雜學校 Zashare', // title is now "My Example App - Yay!"
      },
      themeCards: [
        {
          title: "德－公民道德",
          content: "公民道德是當代公民社會不可缺乏的素養。生活在現代公民社會中的我們，應該如何思考公共領域，以及人在公共領域中的行為。生活，關心、在乎的不是只有自己，更有這個社會，與你身邊的每一個人。",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_德.jpg"
        },{
          title: "智－思考批判力",
          content: "在資訊爆炸的時代，我們缺乏的不是資訊或是獲得資訊的渠道。而是如何選擇、判斷資訊內容，並加以吸收的能力。當大量的資訊湧進的時候，我們如何驗證、如何求真、如何吸收之後進而產生自己的觀點?",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_智.jpg"
        },{
          title: "體－身體實踐",
          content: "關於體，大家可能會直接聯想到「體育」，但「體」其實更關乎的是實踐。如果沒有辦法實踐，再多的理想、夢想都是空談。通過親自去做，才能從中真正得到自己的體會，而非只是被動的「 被告知 」與接受",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_體.jpg"
        },{
          title: "群－關係",
          content: "人，生活在社會之中，我們無法與他人、外在環境斷裂。如何與外於「自己」的它者共處，建立良好關係，是至關重要的。在這個沒有群眾不能成事、彼此緊密關連的時代中，「沒有人會是局外人」。",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_群.jpg"
        },{
          title: "美－美感經驗",
          content: "美，是一種對世界的感受能力，不是單一可以被判斷的價值。當我們可以靜下心來，用自己的方式觀察並感受這個世界，那剎那的感受，或許就是我們在說的美感經驗。",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_美.jpg"
        }
      ],
      themeCardOffset: 0,
      nowEventPage: 2
    }
  },
  mounted(){
    setInterval(()=>{
      this.pageIndex++
    },2000)
    $(".btn_go_to_top").click(()=>{
      $("html,body").animate({scrollTop: 0})
    });
    $(".btn-tickets").click(()=>{
      let target = $(".sectionTicket").offset().top
      $("html,body").animate({scrollTop: target})
    })


    $(".scenePics").slick({
      autoplay: true,
      fade: true,
      dots: true
    }) 
    $(".themeCards").slick({
      autoplay: true,
      // infinite: true,

      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            
          }
        }
      ]

    
    })

    

    $(".fa-angle-double-down").click(()=>{
      let target = $(".sectionTicket").offset().top
      $("html,body").animate({scrollTop: target})
    })
  },
  computed:{
  },
  methods:{
    // themeCardOffset(cid){
    //   return "translate( calc( "+(50-( (this.pageIndex)%5 -cid)*100)+"% )) "
    // },
    getEventOffset(i){
      if (this.nowEventPage==0){ 
        if (i==0){
          return 0
        }else if (i==1){
          return "calc(100% - 120px)"
        }else {
          return "calc(100% - 60px)"
        }
      }
      
      if (this.nowEventPage==1){
        if (i==0){
          return 0
        }else if (i==1){
          return "calc(60px)"
        }else {
          return "calc(100% - 60px)"
        }
      }


      if (this.nowEventPage==2){
        if (i==0){
          return 0
        }else if (i==1){
          return "calc(60px)"
        }else {
          return "calc(120px)"
        }
      }
    }
  }

}
</script>

<style lang="sass?indentedSyntax" scoped>

$color_orange: #FF4C00
$color_blue: #0047BA
$color_dark_blue: #153691

.btn_go_to_top
  width: 50px
  height: 50px
  background-color: white
  box-shadow: 0px 0px 20px rgba(0,0,0,0.2)
  transition: 0.5s
  position: fixed
  right: 30px
  bottom: 30px
  font-size: 35px
  padding-top: -20px
  z-index: 100
  display: flex
  justify-content: center
  align-items: center
  border-radius: 50%
  cursor: pointer
  &:hover
    background-color: #eee


section
  padding-top: 60px
  padding-bottom: 60px

  

.themeBlue
  background-color: $color_blue
  color: white
  .btn
    background-color: white
    color: $color_blue
    padding: 10px 30px
    border: none
    

  
.themeWhite
  background-color: white
  color: $color_blue
  .btn.btn-blue
    background-color: $color_blue
    color: white
    padding: 10px 30px
    border: none
    &:hover
      background-color: lighten($color_blue,5)

.themeDarkBlue
  background-color: $color_dark_blue
  color: white

  .btn
    background-color: white
    color: $color_blue
    padding: 10px 30px
    border: none

  .btn-orange
    background-color: $color_orange
    color: white
    padding: 10px 30px
    border: none
    &:hover
      background-color: lighten($color_orange,10)

.btn
  margin-top: 30px
  margin-bottom: 30px
h2
  font-size: 36px
  line-height: 50px
  margin-bottom: 30px
  font-weight: 700
h3
  line-height: 45px
h3.eng_title
  font-size: 25px
  opacity: .7
  letter-spacing: 5px

h4
  line-height: 30px

p
  opacity: .8
  font-weight: 400
  letter-spacing: 1px


.panelCards
  margin-top: 50px
  /* width: 0 */
  /* max-width: 0 */

.themeCards
  display: block
  white-space: nowrap
  /* overflow: hidden */
  list-style: none
  transition: 0.5s
  padding: 0
  
  .slick-dots
    bottom: -25px


  /* width: calc(100vw - 30px) */
  /* max-width: 500px */

  width: auto
  /* max-width: 500px*5+30px*4 */

  .card
    box-shadow: 0px 20px 30px -20px rgba(black,0.4)
    padding: 170px 50px 30px 50px
    box-sizing: border-box
    position: relative
    overflow: hidden
    border-radius: 20px
    display: inline-flex
    align-items: bottom
    flex-direction: column
    white-space: normal
    min-height: 430px
    color: white
    text-decoration: none

    /* cursor: pointer */

    h4
      position: relative
      z-index: 1
      margin-bottom: 20px
    p
      text-shadow: 0px 0px 2px rgba(black,0.2)

    

    &:before
      content: ""
      display: block
      position: absolute
      width: 100%
      height: 100%
      left: 0
      top: 0
      background: linear-gradient(transparent 0%, #{rgba(black,0.5)} 100%)
      opacity: 0.5
      transition: 0.5s
    &:hover
      &:before  
        opacity: 0.8

    
    /* width: 20% */
    background-size: cover
    width: calc(100vw - 30px)
    /* min-width:  */
    max-width: 500px
    margin: 20px
    border-radius: 18px
    /* background-attachment: fixed */
    transition: 0.5s
    &:hover
      transform: translate(-10px,-10px)
    .cardTitle
      font-size: 30px

.planCard
  padding: 30px
  margin: 20px
  min-height: 400px
  margin-left: -6px
  margin-right: -6px
  cursor: pointer
  border-radius: 10px
  overflow: hidden
  transition: 0.5s
  box-shadow: 0px 20px 30px -20px rgba(black,0.4)

  transform: translate(0px,0px)


  &:hover
    transform: translate(-10px,-10px)

  &.darkBlue
    background-color: $color_dark_blue
    color: white
  &.Orange
    background-color: $color_orange
    color: white
  .num
    font-size: 100px
    .small
      font-size: 32px
      margin-left: 10px

  @media screen and (max-width: 800px)
    width: calc(100% - 60px)
    margin: auto
    margin-top: 30px
    margin-bottom: 30px

.panelInfo
  /* padding-top: 50px */
  /* padding-bottom: 50px */


.sectionHero
  min-height: 100vh
  height: 100vh
  display: flex;
  justify-content: center
  align-items: center

  .logo
    position: absolute
    left: 50%
    top: 50%
    transform: translate(-50%,-50%)
    width: 80%
    max-width: 450px


.sectionPurpose
  background-image: url(/img/2017/expo_2017/02/宣傳圖.jpg)
  background-size: 80% auto
  background-position: 150% bottom
  position: relative
  

  &:before
    content: ""
    display: block
    position: absolute
    width: 50%
    height: 100%
    left: 0
    top: 0
    background-color: $color_dark_blue
  img
    width: 100%
  
  @media screen and (max-width: 800px)
    &:before
      width: 100%
      height: 50%
    background-size: auto 50%
    background-position: top center
    padding-bottom: 150%

.sectionAbout
  padding-top: 100px
  padding-bottom: 100px

  img 
    /* width: 50vw */
    width: 100%

  .row
    display: flex
    align-items: center
    /* margin-left: -70px */
    flex-direction: row
    @media screen and (max-width: 800px)
      display: block
      

  .col-sm-6:nth-child(2)    
    /* background-color: #fff */

.sectionTheme
  padding-bottom: 100px
  /* li
    background-attachment: fixed */

.sectionEvents
  position: relative
  padding: 0
  
  .ver_title
    width: 1em
    font-size: 24px
    top: 50px
    left: 20px
    position: absolute
    opacity: 1
    transition: 0.5s
    text-align: center

  .page,.page1,.page2
    position: absolute
    left: 0
    top: 0
    height: 100%
    width: 100%
    transition: 0.5s
    cursor: pointer
    padding-left: 65px
    padding-right: 65px
    img
      height: 100vh
      max-height: 800px
      filter: saturate(40%)
    &.active
      .ver_title
        opacity: 0

    @media screen and (max-width: 800px)
      img
        width: 100%
        height: auto
        margin-left: -15px
        margin-right: -15px

  .page
    left: 0
    position: relative
  .page1
    left: 50px
    /* background-color: #fff */
    position: absolute
    z-index: 1
  .page2
    left: 100px
    /* background-color: #fff */
    position: absolute
    z-index: 2

  img
    height: 300px



  //mobile settings
  @media screen and (max-width: 800px)
    .page,.page1,.page2
      position: relative
      left: 0 !important
      height: auto
      padding-bottom: 30px
      padding-top: 60px
      padding-left: 15px
      padding-right: 15px
      img
        width: 100vw
        height: auto
        margin-left: -30px
        margin-right: -30px
        margin-top: 30px
      .ver_title
        width: 100%
        margin-bottom: 30px
        text-align: left
        left: 30px
      i
        display: none

.sectionTicket
  padding-top: 0
  padding-bottom: 0
  
.sectionEvents,.sectionPurpose,.sectionInfo
  .row
    display: flex
    align-items: center

  @media screen and (max-width: 800px)
    .row
      display: block
    .container-fluid
      padding-left: 15px
      padding-right: 15px

.sectionInfo
  padding: 0
  
  .col-map
    padding-left: 0
    padding-right: 0
  iframe
    /* margin-left: -15px */
    /* margin-right: -15px */
    
    @media screen and (max-width: 800px)
      width: 100vw


</style>
