import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
Vue.use(Vuex);

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
    mobile_mask_show: process.env.NODE_ENV=="production"?true:false,

    loading: true,
    expos: [
      {
        year: 2017,
        title: "有敢擇學 - Try Try See !",
        time: "10/20-22",
        place: "華山1914 文化創意產業園區",
        cover: "http://service.zashare.org/img/expo/2017/1.jpg",
        report_cover: "http://service.zashare.org/img/expo/2017/3.jpg",
        content: `現在這個時代，我們不是不知道有什麼樣的途徑可以學習，而是不知道我們或生活還能「成為什麼樣子」。在打開對自己/生活的想像後，勇敢的選擇前往這個未來的學習途徑，成為你想成為的自己。

        通過一年一度博覽會形式，2017雜學校於台北華山全區開設 7大主題展館。4天觀展人次超過5萬人次、亞洲各國超過120個團隊參展。

        活動4天期間舉辦3場論壇、20場演講、6場實驗教育與自學分享、14場職人工作坊、42場教育體驗工作坊，容納最多元的創新教育內容，提供一般民眾、第一線教育者與產學界一個互動交流平台。`
      }, {
        year: 2016,
        title: "學你想學、學你想成為。 - Learn to be, not taught to fit.",
        time: "11/26-27",
        place: "華山1914 文化創意產業園區",
        cover: "https://az796311.vo.msecnd.net/userupload/afe7351a4adc41ca8a828fd5b606798f.jpg",
        report_cover: "http://service.zashare.org/img/expo/2016/2.jpg",
        content: `雜學校，亞洲最大創新教育展，前身為2015不太乖教育節。

通過針對創新教育單位的邀展，結合論壇、實作工作坊與主題策展，打造全新教育策展體驗。在這裡，我們想給1-99歲的每一個人一個機會，去體驗教育的各種學習路徑與可能性。

2016年展覽售票展出，創下2日17000人次參觀，160個亞洲創新教育單位參展的紀錄。`
      },
      {
        year: 2015,
        title: "不太乖教育節 - Naughty Education",
        time: "05/09-10",
        place: "華山1914 文化創意產業園區",
        cover: "http://img.accupass.com/userupload/dcfc34cde62f4340aae2dd00452b0ef9.jpg",
        report_cover: "http://service.zashare.org/img/expo/2015/4.jpg",
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
    setMenuState(state, value) {
      state.menuState = value
    },
    setLoading(state, value) {
      state.loading = value
    }

  },
  actions: {
    
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