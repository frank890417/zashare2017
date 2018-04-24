import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex);
import softscroll from 'monoame-softscroll'
const store = new Vuex.Store({
  modules: {
    auth: require("./modules/auth.js").default,
    manage: require("./modules/manage.js").default,
    post: require("./modules/post.js").default,
    scroll: require("./modules/scroll.js").default,
    
  },
  state: {
    themes: require("../data/themes.js").default,
    menuState: false,
    menuType: "search",
    mobile: window.innerWidth<1200,
    mobile_mask_show: false,
    default_hashtags: "師培、教具、國小、偏鄉、國中、高中、大學、實驗教育、媒體、線上、空間、工作坊、技職、美感、文化、出走、輔導、maker、青少年、教師、親子、新媒體、影視、非營利、追求夢想、美感教育、思辨能力、性別平等、尊重生命、遊戲、感官體驗",
    // process.env.NODE_ENV == "production" ? true : false
    loading: true,
    searchKeyword: "",
    expos: [
      {
        year: 2017,
        label: "雜學校第二屆",
        title: "有敢擇學",
        title_eng: "Try Try See !",
        spirit: "年度精神提倡「有敢擇學 」",
        time: "10/20-22",
        place: "華山1914 文化創意產業園區",
        cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2017-1.jpg",
        report_cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2017-2.jpg",
        feature: "．包下整個華山園區，創下五萬人次觀展紀錄<br>．首創新創教育DemoDay ",
        content: `現在這個時代，我們不是不知道有什麼樣的途徑可以學習，而是不知道我們或生活還能「成為什麼樣子」。在打開對自己/生活的想像後，勇敢的選擇前往這個未來的學習途徑，成為你想成為的自己。

        通過一年一度博覽會形式，2017雜學校於台北華山全區開設 7大主題展館。4天觀展人次超過5萬人次、亞洲各國超過120個團隊參展。

        活動4天期間舉辦3場論壇、20場演講、6場實驗教育與自學分享、14場職人工作坊、42場教育體驗工作坊，容納最多元的創新教育內容，提供一般民眾、第一線教育者與產學界一個互動交流平台。`
      }, {
        year: 2016,
        label: "雜學校第一屆",
        title: "學你想學、學你想成為。",
        title_eng: "Learn to be, not taught to fit.",
        spirit: "年度精神提倡「學你想學、學你想成為。 」",
        time: "11/26-27",
        place: "華山1914 文化創意產業園區",
        cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2016-1.jpg",
        report_cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2016-2.jpg",
        feature: "．第一次售票，並創下華山單日售票最高紀錄<br>．成為亞洲最大量體創新教育博覽會",
        content: `雜學校，亞洲最大創新教育展，前身為2015不太乖教育節。

通過針對創新教育單位的邀展，結合論壇、實作工作坊與主題策展，打造全新教育策展體驗。在這裡，我們想給1-99歲的每一個人一個機會，去體驗教育的各種學習路徑與可能性。

2016年展覽售票展出，創下2日17000人次參觀，160個亞洲創新教育單位參展的紀錄。`
      },
      {
        year: 2015,
        label: "雜學校前身 不太乖教育節",
        title: "不太乖教育節",
        title_eng: "Naughty Education",
        spirit: "年度精神提倡「乖乖做自己 」",
        time: "05/09-10",
        place: "華山1914 文化創意產業園區",
        cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2015-1.jpg",
        report_cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2015-2.jpg",
        feature: "．全臺首次發起全公益非典型教育新創展覽<br>．獲選華山本土最佳展覽品牌",
        content: `為期兩天的不太乖教育節，是一個由民間自主發起由下而上的社會創新策展。

好或不好怎麼定義？不一樣的可能在哪裡？教育還可以走去哪？我們可以長成什麼樣子？
走過不太乖教育節，打開大眾對「教育」的想像。

我們知道教育沒有標準答案，
不管你乖不乖，都沒有人可以定義你。`
      },
    ]
  },
  mutations: {
    // setPosts(state, value) {
    //   state.posts = value
    // },
    setMenuType(state,value){
      state.menuType=value
    },
    setMenuState(state, value) {
      window.jf_menu_loaded=true
      if(value == true && !window.jf_menu_loaded){
        _jf.flush();
      }
      state.menuState = value
      softscroll.set(!state.menuState)
    },
    setLoading(state, value) {
      state.loading = value
    },
    setMobileMask(state,value){
      state.mobile_mask_show=value
    },
    setMobile(state, value) {
      state.mobile = value
    },
    setSearchKeyword(state, value) {
      state.searchKeyword = value
    },
    openMenu(state, value) {
      state.menuType = value
      state.menuState = true
    }

  },
  actions: {
    openSearch(context,value){
      context.state.searchKeyword = value
      context.commit("setMenuState",true)
    }
    // loadWebsite(context) {
    //   context.dispatch("loadPosts")

    // },
    // loadPosts(context) {
    //   axios.get("/api/spa/post").then((res) => {
    //     context.commit("setPosts", res.data)
    //   })
    //   axios.get("/api/spa/cata").then((res) => {
    //     context.commit("setCatas", res.data)
    //   })
    //   axios.get("/api/spa/company").then((res) => {
    //     context.commit("setCompanies", res.data)
    //   })
    // },

  }
})

export default store