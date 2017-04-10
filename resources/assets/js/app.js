
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

window.onload=function(){
  if ($('#posttable').length>0){
    $('#posttable').DataTable();
  }
  if ($('.dropdown').length>0){
    if ($(window).width()>700){
      $('.dropdown').hover(function(){
        $(this).addClass('open');
      },function(){
        $(this).removeClass('open');
      });
    }
    $(".dropdown").click(function(){
      $(this).toggleClass("open");
    });
    $(".dropdown-menu li").click(function(){
      // $(this).parent.toggleClass("open");
      $("#app-navbar-collapse").removeClass("in");
    });
  }
}

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
  el: "#app"
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
