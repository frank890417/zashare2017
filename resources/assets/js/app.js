
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// require('./components/Example.vue');
import Example from './components/Example.vue';
import Company_selector from './components/Company_selector.vue';
import Postbox from './components/Postbox.vue';

Vue.component('example', Example );
Vue.component('company-selector', Company_selector );
Vue.component('postbox',Postbox);

// const app = new Vue({
//     el: '#app'
// });

$(window).ready(()=>{
  if ($('#posttable').length>0){
    $('#posttable').DataTable();
  }
  if ($('.dropdown').length>0){
    // if ($(window).width()>700){
    //   $('.dropdown').hover(function(){
    //     $(this).addClass('open');
    //   },function(){
    //     $(this).removeClass('open');
    //   });
    // }
    $(".dropdown").click(function(){
      $(this).toggleClass("open");
    });
    $(".dropdown-menu li").click(function(){
      // $(this).parent.toggleClass("open");
      $("#app-navbar-collapse").removeClass("in");
    });
  }
  $(".item_2015").click(function(){
      window.open("https://zh-tw.facebook.com/feexpos/");
  });

  $(".item_2016").click(function(){
      window.open("http://2016.zashare.org/");
    
  });
  $(".btn_crowd").click(function(){
    $(".full_lang_sel").addClass("active")
  })
  $(".full_lang_sel").click(function(){
    $(".full_lang_sel").removeClass("active")

  })
  var col_descibe=$(".col_describe");
  if ($(".col_describe").length>0){
    $(window).scroll(function(){
      if (col_descibe.offset().top+col_descibe.outerHeight() > $("footer").offset().top ){
         col_descibe.css("opacity",0);
      }else{
        col_descibe.css("opacity",1);
      }
      console.log(col_descibe.css("opacity") );
    });
  }
});

// $(window).scroll(function(){
//   var st=$(window).scrollTop();
//   var hh=$(window).height();
//   $(".bg_parallax").css("background-size","100% auto");
//   $(".bg_parallax").css("background-position","center "+(hh/2+st/10)+"px");
// });

$(document).ready(function(){
  if ($('expo_pics_list')){
    $('.eplist2015 li').hover(function(){
      console.log("hover in");
      $(".cover_2015").css("background-image","url("+$(this).attr("data-pic")+")");
    },function(){
      console.log("hover out");
      $(".cover_2015").css("background-image","");

    });
  }
  if ($('expo_pics_list')){
    $('.eplist2016 li').hover(function(){
      console.log("hover in");
      $(".cover_2016").css("background-image","url("+$(this).attr("data-pic")+")");
    },function(){
      console.log("hover out");
      $(".cover_2016").css("background-image","");

    });
  }
});


if (!window.require_js) window.require_js={};

if (window.require_js.tinymce){
  tinymce.init({
  	selector: '#content',
  	api_key: 'ngpn9ha5mk1a69lvgt66jzupekxmd86rn8e1iwjtyw3i3m6c',
    images_upload_url: 'postAcceptor.php',
    images_upload_base_path: '/some/basepath',
    images_upload_credentials: true,
    setup: function (editor) {
      editor.addButton('uploadpic', {
        text: '上傳圖片',
        icon: false,
        onclick: function () {
          $(".btn-dropzone").click();
        }
      });
      editor.addButton('uploadpic_url', {
        text: '插入圖片(連結網址)',
        icon: false,
        onclick: function () {
          var imgurl = prompt("輸入圖片網址", "插入圖片");
          if(imgurl!="" && imgurl ){
            tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');

          }
        }
      });
    },
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | uploadpic | uploadpic_url',
    plugins : "paste,link",
    theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
    paste_auto_cleanup_on_paste : true,
    paste_preprocess : function(pl, o) {
        // Content string containing the HTML from the clipboard
        // alert(o.content);
        console.log(o.content);
        
        // o.content = $("<p></p>").html(o.content).text();
    },
    paste_postprocess : function(pl, o) {
        // Content DOM node containing the DOM structure of the clipboard
        // alert(o.node.innerHTML);
        o.node.innerHTML = o.node.innerHTML;
    }
  });
}


// Dropzone class:
// var myDropzone = new Dropzone(".dropzone", { url: "/file/post"});


var vm = new Vue({
  el: "#app",
  data: {
    list2017: [
      {
        "theme": "德－公民道德",
        "tag": "Z033",
        "name": "阿普蛙工作室",
        "website": "https://www.facebook.com/Wasupstudio/",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z040",
        "name": "打嗝文化",
        "website": "https://mp.weixin.qq.com/mp/homepage?__biz=MzA4MjYxODc2Nw==&hid=1&sn=aa665655d74d1a71df4f3b8b94dfd84e#wechat_redirect",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z048",
        "name": "享實做樂",
        "website": "https://www.facebook.com/GoodWork.TaiChung/",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z066",
        "name": "教育丸子",
        "website": "http://eduone.moe.edu.tw/main/",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z107",
        "name": "公民叮：教學影片分享平台",
        "website": "https://www.facebook.com/gongmingding",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z131",
        "name": "小台江讀書會",
        "website": "https://www.google.com.tw/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwi2h765qOPVAhUIvrwKHf3bD74QFggkMAA&url=https%3A%2F%2Ftaichiangriver.tian.yam.com%2F&usg=AFQjCNFcGPbq6dnVCmRl004vAodEsz60JQ",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z137",
        "name": "wowAfrica阿非卡",
        "website": "www.facebook.com/wowafrica.tw",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z138",
        "name": "台大社會創新社",
        "website": "https://www.facebook.com/pg/NTUNetImpact/about/?ref=page_internal",
      },
      {
        "theme": "德－公民道德",
        "tag": "Z155",
        "name": "社團法人中華民國夢想之家青年發展協會",
        "website": "http://www.dreams.org.tw/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z007",
        "name": "社團法人中華學習體驗分享協會",
        "website": "http://www.lensverymuch.com/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z011",
        "name": "Snapask 知之有限公司",
        "website": "https://snapask.co/tw/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z016",
        "name": "SEE MORE教育",
        "website": "http://web.seemore.org.tw/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z026",
        "name": "台北城市散步",
        "website": "https://www.taipei-walkingtour.tw/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z029",
        "name": "LIS線上教學平台",
        "website": "www.lis.org.tw",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z046",
        "name": "幫你優",
        "website": "https://www.pagamo.org/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z057",
        "name": "國立臺灣大學數位學習中心",
        "website": "https://www.facebook.com/ntumooc2017",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z064",
        "name": "First Code Academy",
        "website": "https://tw.firstcodeacademy.com/en",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z074",
        "name": "智慧鐵人創意競賽",
        "website": "http://ironman.creativity.edu.tw/15th/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z076",
        "name": "Hahow 好學校",
        "website": "https://hahow.in/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z081",
        "name": "六書堂",
        "website": "https://www.facebook.com/wuwowtw/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z085",
        "name": "TimeMap",
        "website": "https://www.facebook.com/pipingeducation/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z101",
        "name": "翻滾海貍工作室",
        "website": "https://www.facebook.com/acrossbeaver/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z113",
        "name": "N次坊",
        "website": "https://www.facebook.com/npower.workshop/?fref=ts",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z119",
        "name": "不來梅創意 Bremen Knowledge Academy",
        "website": "www.bka2learn.com",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z132",
        "name": "意識物",
        "website": "https://www.facebook.com/consciousness.sciwrite/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z148",
        "name": "[De]science",
        "website": "https://percusion123.wixsite.com/descience",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z150",
        "name": "時習教育工作室",
        "website": "https://www.facebook.com/LIFEeducationstudio/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z154",
        "name": "紅點子科技",
        "website": "https://tw.voicetube.com/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z157",
        "name": "啟萌教育",
        "website": "www.groupbe.com.tw",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z160",
        "name": "橘子蘋果兒童程式學苑",
        "website": "https://orangeapple.co/",
      },
      {
        "theme": "智－思考批判力",
        "tag": "Z162",
        "name": "數感實驗室",
        "website": "https://www.facebook.com/numeracylab/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z003",
        "name": "玩轉學校",
        "website": "http://www.pleyschool.org",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z010",
        "name": "YOTTA - 專屬於你最有效的學習夥伴",
        "website": "http://www.yottau.com.tw/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z025",
        "name": "客遊天下旅行社有限公司",
        "website": "https://www.klook.com/zh-TW/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z028",
        "name": "傑作國際專業教練有限公司",
        "website": "https://www.facebook.com/true.identity.coaching",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z038",
        "name": "財團法人新漾基金會",
        "website": "https://www.xinyoung.org",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z043",
        "name": "WeSchool維創教育",
        "website": "http://www.weschool.tw/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z049",
        "name": "月釀杯（台灣月亮杯）",
        "website": "http://www.formoonsacup.com/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z053",
        "name": "財團法人超越文創教育基金會",
        "website": "http://eball.tw/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z060",
        "name": "鹿樂",
        "website": "http://fund.ruraledu.tw/home.php",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z068",
        "name": "陳信安足球學校",
        "website": "https://www.facebook.com/陳信安足球學校-401507449991259/?fref=ts",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z069",
        "name": "財團法人為台灣而教教育基金會",
        "website": "http://www.teach4taiwan.org/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z070",
        "name": "接棒啟蒙計劃",
        "website": "https://www.facebook.com/BatonEnlightenmentProject/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z072",
        "name": "Skyrock Projects",
        "website": "www.skyrockprojects.com",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z073",
        "name": "讓狂人飛",
        "website": "https://www.facebook.com/flying.crazyer/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z079",
        "name": "夢想騎士計畫",
        "website": "http://www.dreamlighter.asia/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z083",
        "name": "野雪塾",
        "website": "facebook.com/noyukia",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z087",
        "name": "深活共構有限公司",
        "website": "https://www.facebook.com/Senselifemaker/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z096",
        "name": "偶爾鏘",
        "website": "https://www.facebook.com/orkiang/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z100",
        "name": "小玩伴食農教育顧問團隊",
        "website": "https://www.facebook.com/farmingbuddies/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z103",
        "name": "青年迴響計畫",
        "website": "https://www.facebook.com/RethinkTaiwan2027/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z106",
        "name": "第二回合設計",
        "website": "http://www.r2design.com.tw/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z108",
        "name": "BridgePlus",
        "website": "bridgeplus.cn",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z109",
        "name": "技職3.0",
        "website": "http://www.tvet3.info/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z111",
        "name": "純粹學",
        "website": "https://www.facebook.com/purestudent.tw/?ref=bookmarks",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z114",
        "name": "啟夢 －教育諮詢",
        "website": "https://goo.gl/8JAC1k",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z126",
        "name": "玩轉創意教育工作坊",
        "website": "https://www.refunstudio.com/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z130",
        "name": "總務の生存法則",
        "website": "https://www.facebook.com/LivingCFO",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z135",
        "name": "火柴青年",
        "website": "http://match.strikingly.com/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z139",
        "name": "人心解碼讀心術",
        "website": "http://mindreadingcoach.weebly.com/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z141",
        "name": "台灣潛水",
        "website": "https://www.taiwandivecenter.com",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z156",
        "name": "遊牧行",
        "website": "http://nomadicstory.net/about.html",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z158",
        "name": "職人",
        "website": "http://shokuzine.com",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z165",
        "name": "滾出趣",
        "website": "http://www.letsrollout.com.tw/",
      },
      {
        "theme": "群－關係",
        "tag": "Z004",
        "name": "緩緩農作",
        "website": "https://www.facebook.com/slowgrowing/",
      },
      {
        "theme": "群－關係",
        "tag": "Z006",
        "name": "Arcterus Co., Ltd.",
        "website": "http://cleartw.pixnet.net/blog",
      },
      {
        "theme": "群－關係",
        "tag": "Z017",
        "name": "藍色小屋",
        "website": "https://www.facebook.com/profile.php?id=1777086923",
      },
      {
        "theme": "群－關係",
        "tag": "Z018",
        "name": "新北市樹林區文林國民小學",
        "website": "https://www.facebook.com/bankofwenlin/",
      },
      {
        "theme": "群－關係",
        "tag": "Z024",
        "name": "冒險島嶼戶外教育中心",
        "website": "https://www.facebook.com/ventureisland/",
      },
      {
        "theme": "群－關係",
        "tag": "Z027",
        "name": "阿滴英文",
        "website": "http://youtube.com/rayduenglish",
      },
      {
        "theme": "群－關係",
        "tag": "Z030",
        "name": "日心月藝工作室",
        "website": "https://www.facebook.com/solarandlunarstudio/",
      },
      {
        "theme": "群－關係",
        "tag": "Z031",
        "name": "綿羊犬百寶箱",
        "website": "https://www.facebook.com/Shepherdkit",
      },
      {
        "theme": "群－關係",
        "tag": "Z036",
        "name": "失戀花園｜失落花園",
        "website": "http://inbound.tw/",
      },
      {
        "theme": "群－關係",
        "tag": "Z045",
        "name": "亮語文創教育",
        "website": "http://shininglife99.weebly.com/",
      },
      {
        "theme": "群－關係",
        "tag": "Z052",
        "name": "小人小學兒童環境教育平台",
        "website": "https://smallkidsstudio.wixsite.com/smallkidsedu",
      },
      {
        "theme": "群－關係",
        "tag": "Z056",
        "name": "UDSTAND STUDIO",
        "website": "https://www.behance.net/understandstudio",
      },
      {
        "theme": "群－關係",
        "tag": "Z059",
        "name": "社團法人社區大學全國促進會",
        "website": "http://www.napcu.org.tw/index.html",
      },
      {
        "theme": "群－關係",
        "tag": "Z061",
        "name": "財團法人台灣尤努斯基金會",
        "website": "https://www.facebook.com/FoundationforYunusSocialBusiness/",
      },
      {
        "theme": "群－關係",
        "tag": "Z077",
        "name": "社團法人台灣四十分之一移工教育文化協會",
        "website": "http://one-forty.org/",
      },
      {
        "theme": "群－關係",
        "tag": "Z097",
        "name": "IDLC / 山夢嫻",
        "website": "http://blog.xuite.net/shan.way/tw",
      },
      {
        "theme": "群－關係",
        "tag": "Z105",
        "name": "金瓜三號",
        "website": "https://www.facebook.com/pumpkinno3/?fref=ts",
      },
      {
        "theme": "群－關係",
        "tag": "Z117",
        "name": "映趣國際教育有限公司",
        "website": "",
      },
      {
        "theme": "群－關係",
        "tag": "Z127",
        "name": "行政院農業委員會水土保持局",
        "website": "https://www.facebook.com/rural.young/?fref=ts",
      },
      {
        "theme": "群－關係",
        "tag": "Z129",
        "name": "牠牠－「浪，我幫你說」體驗式生命教育",
        "website": "https://www.facebook.com/tatafortaiwan/",
      },
      {
        "theme": "群－關係",
        "tag": "Z134",
        "name": "極熊設計工作室",
        "website": "https://www.facebook.com/gicumadesignstudio/",
      },
      {
        "theme": "群－關係",
        "tag": "Z136",
        "name": "YK Club",
        "website": "www.yk-club.com",
      },
      {
        "theme": "群－關係",
        "tag": "Z142",
        "name": "萬華社區小學",
        "website": "https://www.facebook.com/wanhuaxiaoxiao/",
      },
      {
        "theme": "群－關係",
        "tag": "Z143",
        "name": "善步。地方教育",
        "website": "https://www.facebook.com/GoodStepforPlace/",
      },
      {
        "theme": "群－關係",
        "tag": "Z161",
        "name": "社會影響力製造所",
        "website": "https://taipei.impacthub.net/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z002",
        "name": "小盒子藝術教育",
        "website": "http://littleboxart.weebly.com/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z019",
        "name": "羅傑耀",
        "website": "http://www.roger528.com/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z035",
        "name": "杜宅咖啡",
        "website": "https://www.facebook.com/dou.zhai.homemade.roasted.cafe/?ref=bookmarks",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z039",
        "name": "虎科小花農",
        "website": "https://www.facebook.com/pg/Tigerfarmer.tw/about/?ref=page_internal",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z041",
        "name": "五感計畫 / 微笑音符",
        "website": "https://www.facebook.com/smileyrhythmmusic/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z042",
        "name": "摺學主義",
        "website": "https://www.facebook.com/FoldismTW/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z047",
        "name": "尹太工作坊",
        "website": "https://www.facebook.com/Yintai2017/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z050",
        "name": "Motioner - 動態影像交流社群",
        "website": "http://motioner.tw/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z051",
        "name": "財團法人廣達文教基金會",
        "website": "http://www.quanta-edu.org/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z058",
        "name": "illuBase 插畫人基地",
        "website": "http://www.otr-illubase.com/3836426044.html",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z067",
        "name": "肯夢學院",
        "website": "http://www.cistylist.com/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z071",
        "name": "水顏木房—常民木工運動",
        "website": "https://www.facebook.com/changminwood/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z078",
        "name": "Circle 設計微誌",
        "website": "https://www.facebook.com/circlezine/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z088",
        "name": "錦和堂廟宇彩繪工作室",
        "website": "https://www.facebook.com/燕霧堡-錦和堂-1448883068489691/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z089",
        "name": "WIZARDENX LEE studio.",
        "website": "http://wizardenx-lee-studio.com/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z091",
        "name": "來字哪裡",
        "website": "https://business.facebook.com/laizinali",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z098",
        "name": "彰化縣南郭國小資優班",
        "website": "https://www.facebook.com/ngesgifted/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z099",
        "name": "Taiwan ReDesign",
        "website": "https://www.facebook.com/TaiwanReDesign/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z118",
        "name": "塑聲計畫",
        "website": "https://thatishsinchi.myportfolio.com/amelie",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z121",
        "name": "芒果遊戲",
        "website": "https://www.facebook.com/MGS.fan/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z146",
        "name": "學學國際文化創意事業股份有限公司",
        "website": "http://www.xuexue.tw/",
      },
      {
        "theme": "美－美感經驗",
        "tag": "Z163",
        "name": "墨雨設計",
        "website": "http://monoame.com/#/",
      },{
        "theme": "實驗教育",
        "tag": "Z023",
        "name": "臺北市影視音實驗教育機構",
        "website": "http://www.mediaschool.taipei/",
      },
      {
        "theme": "實驗教育",
        "tag": "Z084",
        "name": "全人實驗學校",
        "website": "http://holistic.org.tw/",
      },
      {
        "theme": "實驗教育",
        "tag": "Z104",
        "name": "人文無學籍行動高中（人文展賦行動學苑）",
        "website": "https://www.facebook.com/人文無學籍行動高中-Humanities-Explorational-High-School-197428987035257/?ref=bookmarks",
        "": ""
      },
      {
        "theme": "實驗教育",
        "tag": "Z055",
        "name": "清水小校",
        "website": "https://www.facebook.com/YiLanQingShuiXiaoXiao/?fref=ts",
      },
      {
        "theme": "實驗教育",
        "tag": "Z145",
        "name": "學學文化創意基金會",
        "website": "http://www.xuexuefoundation.org.tw/",
      },
      {
        "theme": "群－關係",
        "tag": "Z086",
        "name": "BTS無界塾",
        "website": "https://www.facebook.com/無界塾-279310215857863/",
      },
      {
        "theme": "體－身體實踐",
        "tag": "Z044",
        "name": "心對話股份有限公司",
        "website": "https://www.facebook.com/SEABreezers/",
      },
    ],
    cata2017: [
      "德－公民道德",
      "智－思考批判力",
      "體－身體實踐",
      "群－關係",
      "美－美感經驗",
      "實驗教育"
    ],
    teamfilter: ""
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
});


if (window.require_js.dropzone){
  //初始化Dropzone上傳圖片function
  function gen_dz(classname,callback){  
    var myDropzone = new window.Dropzone(classname, {
      url: "http://image.zashare.org/upload.php",maxFiles: 1
      ,sending: function(){
        // vm.page_status="圖片上傳中<img src='../img/loadingicon_gold.png' class=loadingspin>";
      }
      ,success: function(evt,res){
        callback(evt,res);
      }
    });
    // myDropzone.createThumbnailFromUrl(file, this.ndata.img, callback, crossOrigin);
    // $("#dropfrontimg").dropzone({ url: "http://citi2016.unitedway.org.tw/dropzone/" });
    myDropzone.on("complete", function(file) {
      myDropzone.removeFile(file);
      setTimeout(function(){
        // vm.page_status="圖片上傳完畢";
      },300);
      
    });
  }

  gen_dz(".btn-dropzone",function(evt,res){
     console.log(res);
     var imgurl=res.replace("/var/www/zashare2017/public/","/");
     console.log(imgurl);
     tinymce.activeEditor.execCommand('mceInsertContent', false, '<img src=\"'+imgurl+'\" style=\"width: 100%;height: auto\"></img>');
  });

  gen_dz(".btn-dropzone-cover",function(evt,res){
     console.log(res);
     var imgurl=res.replace("/var/www/zashare2017/public/","/");
     console.log(imgurl);
     $("#cover").val(imgurl);
     $(".cover_preview").attr('src',imgurl);
  });

}
