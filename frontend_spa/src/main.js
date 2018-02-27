import "bootstrap/dist/css/bootstrap-grid.min.css"
import "slick-carousel/slick/slick.css"

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'

// require styles
// import 'quill/dist/quill.core.css'
// import 'quill/dist/quill.snow.css'
// import 'quill/dist/quill.bubble.css'


// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.


import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import axios from 'axios'
import VueAxios from 'vue-axios'

import VueAnalytics from 'vue-analytics'
if (document.domain =="zashare.org") {
  Vue.use(VueAnalytics, {
    id: 'UA-52977512-16',
    router
  })
}


// import VueQuillEditor from 'vue-quill-editor'

// Vue.use(VueQuillEditor, /* { default global options } */)

Vue.use(VueAxios, axios)

Vue.use(ElementUI)

// axios.defaults.timeout = 5000;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';
axios.defaults.baseURL = process.env.API_DOMAIN;

store.dispatch("scroll/init")
store.dispatch("auth/init")
store.dispatch("post/loadWebsite")
store.dispatch("manage/loadWebsite")

Vue.config.productionTip = false

import page_loading from './components/pages/page_loading.vue'
import navbar from './components/navbar.vue'
import full_menu from './components/full_menu.vue'
import newsbox from './components/newsbox.vue'
import auth_panel from './components/auth_panel.vue'
Vue.component("page_loading", page_loading)
Vue.component("navbar", navbar)
Vue.component("full_menu", full_menu)
Vue.component("newsbox", newsbox)
Vue.component("auth_panel", auth_panel)

Vue.mixin({
  methods: {
    replaceBr(text){
      return text.replace(/\n/g,"<br>")
    },
    bgcss(url){
      let trans_url = (url || "")
        .replace(/..\/..\//g,"/")
        .replace(/\/dropzone\/uploads/g, "http://service.zashare.org/dropzone/uploads/")
      return {
        'background-image': `url("${trans_url}")`
      }

    }, strip_tags(txt) {
      let result = ("" + txt).replace(/(<([^>]+)>)/ig, "")
      return result
    },
    handleImageAdded(file, Editor, cursorLocation) {
      // An example of using FormData
      // NOTE: Your key could be different such as:
      // formData.append('file', file)
      console.log("get picture!")
      var formData = new FormData();
      formData.append('file', file)
      console.log(file)

      axios({
        url: process.env.API_DOMAIN+'/api/upload',
        method: 'POST',
        data: formData
      })
        .then((result) => {
          let url = result.data // Get url from response
          Editor.insertEmbed(cursorLocation, 'image', url);
        })
        .catch((err) => {
          console.log(err);
        })
    },
    cssbg(url) {
      let use_url = url.replace("http://service.zashare.org/assets/", "/dschool_old_assets/")
      let result = {
        'background-image': `url("${use_url}")`
      }
      // console.log(result)
      return result
    },
    scrollTo(cname, custon_option) {
      let options = Object.assign({
        pan: 0
      },
        custon_option
      )
      $("html,body").animate({ scrollTop: $(cname).offset().top + options.pan })
    },

  }
})


if (process.env.NODE_ENV == "development") {
  setTimeout(() => {
    store.commit("setLoading", false)
  }, 500);
}
if (process.env.NODE_ENV == "production") {
  setTimeout(() => {
    store.commit("setLoading", false)
  }, 3000);

  // var _jf = _jf || [];_jf.push(['p','53890']);_jf.push(['_setFont','xingothic-tc-w3','css','.xingothic-tc-w3']);_jf.push(['_setFont','xingothic-tc-w3','css','p']);_jf.push(['_setFont','xingothic-tc-w3','alias','xingothic-tc']);_jf.push(['_setFont','xingothic-tc-w3','weight',300]);_jf.push(['_setFont','xingothic-tc-w7','css','.xingothic-tc-w7']);_jf.push(['_setFont','xingothic-tc-w7','css','h1']);_jf.push(['_setFont','xingothic-tc-w7','css','h2']);_jf.push(['_setFont','xingothic-tc-w7','css','h3']);_jf.push(['_setFont','xingothic-tc-w7','css','h4']);_jf.push(['_setFont','xingothic-tc-w7','alias','xingothic-tc']);_jf.push(['_setFont','xingothic-tc-w7','weight',700]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return }var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w = (y || "").match(j) || []; z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u = 0; while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z += v + " "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w = (y || "").match(j) || []; z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u = 0; while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z = z.replace(" " + v + " ", " ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h); m(e)}]);k.push(["_eventInactived",function(){p(h); m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E = E || function () { }; B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src = ""; x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v = setTimeout(function () { D() }, C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y = true; if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function () { E() }, 200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/236098121883");
  // window._jf = _jf
}

function preload_all(array_img){
  let promises = array_img.map(url => {
    return new Promise((resolve, reject) => {
      let i = new Image()
      i.onload = function () {
        // console.log("loaded")
        resolve("ok")
        console.log(url)
      }
      i.src = url
    })
  })
  return Promise.all(promises)
  // window.array_img = array_img
  // window.promises = promises
  // window.allpromise = allpromise
  // return allpromise
}
window.preload_all = preload_all

import themes from "@/data/themes.js"
let loadgroups = 
  [
    Object.values(themes).map(v => v.cover),
    Object.values(themes).map(v => v.slogan_image),
    store.state.expos.map(v => v.cover),
    store.state.expos.map(v => v.report_cover),
    ["https://service.zashare.org/img/2017/index_za_logo_white.svg"]
  
  ].reduce((pre, cur) => {
    return pre = pre.concat(cur)
  }, [])

preload_all(loadgroups).then(() => {
  console.log('load all success!')
  // store.commit("setLoading", false)
}).catch(() => {
  console.log("oh no")
})

window.onresize=function(){
  store.commit("setMobile", window.innerWidth < 1200)
}

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App, navbar, full_menu, page_loading},
  template: '<App/>'
})
