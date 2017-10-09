<template lang="pug">
.page_expo_2017
  section.sectionHero.themeBlue.text-center
    img(style="max-width: 300px" src='http://zashare.org/img/2017/index0829_coverLogo.svg')
    
  section.sectionPurpose.themeDarkBlue
    .container-fluid
      .col-sm-6
        .row
          .col-sm-8.col-sm-offset-3
            h3.eng_title ZASHARE
            h2 雜學校
              br
              span 亞洲創新教育博覽會
            p 現在這個時代，我們不是不知道有什麼樣的途徑可以學習，而是不知道我們或生活還能「成為什麼樣子」。在打開對自己/生活的想像後，勇敢的選擇前往這個未來的學習途徑，成為你想成為的自己。這，就是「有敢擇學」的精神。
            .btn.btn-orange.btn-lg Tickets 勇敢購票
        //.col-sm-6
          img(src='/img/2017/expo_2017/02/宣傳圖.jpg')
  section.sectionAbout.themeWhite
    .container
      .row
        .col-sm-6
          img(src="/img/2017/expo_2017/03/03換圖_2015.jpg")
          img(src="/img/2017/expo_2017/03/03換圖_2016.jpg", style="margin-top: -100px;margin-left: -100px;margin-bottom: -100px;box-shadow: 0px 0px 20px rgba(0,0,0,0.1)")
          img(src="/img/2017/expo_2017/03/03換圖_2017.jpg")
        .col-sm-6
          h3.eng_title ABOUT SCHOOL
          h2 關於雜學校
          p 當大家都在批評教育體制的僵化或混亂時，我們一直在想以我們的專業，還能為台灣的教育做些什麼?同時也思考著，到底這個世代還能用什麼樣的方式，可以發揮更大的影響力。
            br
            | 台灣不缺創新教育內容、方法與獻身教育的人，卻缺乏讓這些多元且珍貴的人與內容，有一個被看見的舞台。於是，雜學校出現了。
            br
            | 2017 年，徵集 120 個創新教育機構參展，活動三天舉辦超過 50 場講座與工作坊，要你一次了解台灣教育現況，更可以從中找到屬於每個人的不同學習路徑。 
    
  section.sectionEvent.themeBlue
    .container
      .row.text-center
        .col-sm-6.col-sm-offset-3
          h3.eng_title BIG EVENT
          h2 亞洲唯一創新教育內容展
          p 邀請上百個創新學習機構、個人<br>重新定義五育，打破過往教育想像<br>我們說，教育是要讓我們成為更好的人<br>所以生活，才應該是教育的內容
    .panelCards
      ul.themeCards(:style="{'transform':'translateX('+themeCardOffset+')'}")
        li.card(v-for="card in themeCards" , :style="{'background-image': 'url('+card.img+')'}")
          h4.cardTitle {{card.title}}
          p(v-html="card.content")
  section.sectionEvents.themeDarkBlue
    .container
      .row
        .col-sm-6
          h3.eng_title BRAVE PEOPLE
          h2 絕對不能錯過的 20 個
            br
            span 勇敢講堂
          p 2017 年「超勇敢」的雜講堂， 讓各類議題、各種人生在這裡勇敢發聲。<br><br>身分證還可以是什麼樣子?讓知名作家詹偉雄、台大教授李明璁等人來和你聊一聊。還有知名部落客 AKKO、熊仁謙、台灣吧-蕭宇辰、知名 Youtuber MOM&DAD、最衝公民教師-黃益中、翻轉教育推手-葉丙成教授等等⋯，要來講堂跟你聊勇敢、聊人生。
        .col-sm-6
          
  section.sectionPlan.themeBlue
    .row.text-center
      .col-sm-6.col-sm-offset-3
        h3.eng_title LAUNCH PLAN
        h2 雜學校建校大業計畫啟動
        p 將單次展覽擴展成年度計畫<br>打造一間地表最嚮往的未來學校<br>MY SCHOOL, MY BRAVEDUCATION<br>我們堅信台灣可以是亞洲最大的創新教育內容平台。
        br
      .col-sm-10.col-sm-offset-1
        .row
          .col-sm-3
            .planCard.darkBlue
              .num 5
                span.small 折
              p 進入實體雜講堂現場<br>一睹講師的風采<br>帶走滿滿的收穫
          .col-sm-3
            .planCard.Orange
              .num 24
                span.small 堂
              p 行銷？程式？設計？<br>最狂講師陣容<br>手把手地教你史上最雜的知識<br>「學你想學，學你想成為」<br>不再是口號！
          .col-sm-3
            .planCard.darkBlue
              .num 9
                span.small 折
              p 雜學校特約夥伴周邊商品<br>以及課程優惠
          .col-sm-3
            .planCard.Orange
              .num ∞
                span.small 
              p 10/20-10/22<br>三日雜學校展覽<br>無限次進出 <br>另贈3張單日票
        
      .col-sm-6.col-sm-offset-3
        br
        br
        p 總價值超過$24,800  → 現在募資只要2,480，更有揪團優惠<br>跟朋友一起 「有敢」的支持我們建校
        a.btn.btn-primary.btn-lg(href="/funding") 支持募資計畫
      .col-sm-12
        h3.text-center 那個最近手頭有點緊<br>可不可以只買博覽會的票?
  
  section.sectionSchool.themeWhite
    .container
      .row.text-center
        .col-sm-6.col-sm-offset-3
          h3.eng_title OPEN SCHOOL
          h2 開學資訊
          p 2017年，雜學校勇敢包下整座華山園區，<br>以超實惠的票價，囊括創新教育博覽會、雜學主題館、<br>實驗教育館、演講、工作坊<br>讓・你・一・票・逛・到・底！
  
  section.sectionInfo.themeDarkBlue
    .row
      .col-sm-6.panelInfo
        .container
          .row
            .col-sm-6.col-sm-offset-3
              h3 開學時間DATE :
              h5 2017.10.20 FRI. - 10.22 SUN.
              p ※10/20-10/21 每日10-20點開放參觀<br>※10/22 10-17點開放參觀<br>※每日最後入場時間為閉館前30分鐘
              br
              h3 地點 VENUE :
              p 台北華山1914文創產業園區（捷運忠孝新生站)<br>Huashan1914.Creative Park, Taipei 
              
      .col-sm-6
        iframe(src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.703477056893!2d121.52721081483303!3d25.044135144039476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a96523e0246d%3A0xf1c9276707165c71!2z6I-v5bGxMTkxNOaWh-WJteWckuWNgA!5e0!3m2!1szh-TW!2stw!4v1507557998332" width="100%" height="480px" frameborder="0" style="border:0" allowfullscreen)
  
  section.sectionTicket.themeWhite
    .container
      .row
        .col-sm-12
          h1 購票
          a(href="https://kktix.com/events/2017zashare/registrations/new") https://kktix.com/events/2017zashare/registrations/new
    
      


</template>

<script>
export default {
  data(){
    return {
      themeCards: [
        {
          title: "德-公民道德",
          content: "公民道德是當代公民社會不可缺乏的素養。生活在現代公民社會中的我們，應該如何思考公共領域，以及人在公共領域中的行為。生活，關心、在乎的不是只有自己，更有這個社會，與你身邊的每一個人。",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_德.jpg"
        },{
          title: "智-思考批判",
          content: "在資訊爆炸的時代，我們缺乏的不是資訊或是獲得資訊的渠道。而是如何選擇、判斷資訊內容，並加以吸收的能力。當大量的資訊湧進的時候，我們如何驗證、如何求真、如何吸收之後進而產生自己的觀點?",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_智.jpg"
        },{
          title: "體-身體實踐",
          content: "關於體，大家可能會直接聯想到「體育」，但「體」其實更關乎的是實踐。如果沒有辦法實踐，再多的理想、夢想都是空談。通過親自去做，才能從中真正得到自己的體會，而非只是被動的「 被告知 」與接受",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_體.jpg"
        },{
          title: "群-關係",
          content: "人，生活在社會之中，我們無法與他人、外在環境斷裂。如何與外於「自己」的它者共處，建立良好關係，是至關重要的。在這個沒有群眾不能成事、 彼此緊密關連的時代中，「沒有人會是局外人」。",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_群.jpg"
        },{
          title: "美-美感經驗",
          content: "美，是一種對世界的感受能力，不是單一可以被判斷的價值。當我們可以靜下心來，用自己的方式觀察並感受這個世界，那剎那的感受，或許就是我們在說的美感經驗。",
          img: "/img/2017/expo_2017/04/新聞稿配圖-五育_美.jpg"
        }
      ],
      pageIndex: 0
    }
  },
  mounted(){
    setInterval(()=>{
      this.pageIndex++
    },2000)
  },
  computed:{
    themeCardOffset(){
      return -(this.pageIndex%5)*20+"%"
    }
  }

}
</script>

<style lang="sass?indentedSyntax" scoped>

$color_orange: #FF4C00
$color_blue: #0047BA
$color_dark_blue: #153691
section
  &.themeBlue
    background-color: $color_blue
    color: white
    .btn
      background-color: white
      color: $color_blue
      padding: 10px 30px
      border: none
    
  &.themeWhite
    background-color: white
    color: $color_blue
  &.themeDarkBlue
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
  padding-top: 60px
  padding-bottom: 60px
.btn
  margin-top: 30px
  margin-bottom: 30px
h2
  font-size: 36px
  line-height: 50px
  margin-bottom: 30px
  font-weight: 500
h3
  line-height: 45px
h3.eng_title
  font-size: 25px
  opacity: .7
  letter-spacing: 5px
p
  opacity: .8
  font-weight: 400


.panelCards
  margin-top: 50px

.themeCards
  display: flex
  /* overflow: hidden */
  list-style: none
  transition: 0.5s
  padding: 0

  .card
    box-shadow: 0px 20px 30px -20px rgba(black,0.4)
    padding: 170px 50px 30px 50px
    box-sizing: border-box
    position: relative
    overflow: hidden

    h4
      position: relative
      z-index: 1
    p
      text-shadow: 0px 0px 5px rgba(black,0.4)

    &:before
      content: ""
      display: block
      position: absolute
      width: 100%
      height: 100%
      left: 0
      top: 0
      background: linear-gradient(transparent 0%, #{rgba(black,0.4)} 100%)


    /* width: 20% */
    background-size: cover
    width: 40vw
    min-width: 500px
    max-width: calc(100vw - 30px)
    margin: 20px
    border-radius: 18px
    /* background-attachment: fixed */
    transition: 0.5s
    &:hover
      transform: translate(-10px,-10px)
    .cardTitle
      font-size: 30px

.planCard
  padding: 50px
  min-height: 450px
  margin-left: -12px
  margin-right: -12px
  
  
  &.darkBlue
    background-color: $color_dark_blue
    color: white
  &.Orange
    background-color: $color_orange
    color: white
  .num
    font-size: 130px
    .small
      font-size: 48px

.panelInfo
  padding-top: 50px
  padding-bottom: 50px

.sectionHero
  min-height: 100vh
  height: 100vh
  display: flex;
  justify-content: center
  align-items: center

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

.sectionAbout
  img
    width: 100%

.sectionInfo
  padding: 0



</style>
