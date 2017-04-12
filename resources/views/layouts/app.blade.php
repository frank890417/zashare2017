<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta_og')

    <title>雜學校Zashare-亞洲最大創新教育展</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    
  
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-52977512-16', 'auto');
      ga('send', 'pageview');

    </script>
      
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8&appId=756438861174269";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
    <div id="app">
      @include('nav')

        <div class='content_frame'>
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.3/vue.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.1.2/vue-resource.min.js"></script> -->
    {{-- send varaibles to JS field --}}
    <script>
      if (!window.data_storage){
        window.data_storage={};
      }
    </script>
    @yield('blade_pass_variables')
    

    {{-- Script BEFORE app.js --}}
    @yield('require_js')
    <script src="/js/app.js"></script>

    {{-- Script AFTER app.js --}}
    @yield('require_js_after')
    
    
 <footer>

     <div class="container">
     <div class="row">
        <div class="col-sm-4">
            <img src="/img/ci_logosvg_purple.svg" width="130px">
            <br><br>
            <div class=footer_logo>
                <a href="https://www.facebook.com/zashare.expo/" target="_blank">
                    <i class="fa fa-facebook"></i>
                    Facebook 
                </a>
                <a href="https://www.youtube.com/channel/UCiCIqDTmahczFvmg8iNUVow" target="_blank">
                    <i class="fa fa-youtube"></i>
                    Youtube 
                </a>

                <a href="https://www.instagram.com/zashare_edu/" target="_blank">
                    <i class="fa fa-instagram"></i>
                    Instagram 
                </a>
                <br>
                <a href="http://weibo.com/6020066115/profile?rightmod=1&wvr=6&mod=personnumber&is_all=1" target="_blank">
                    <i class="fa fa-weibo"></i>
                    Weibo 
                </a>
                <a href="http://open.weixin.qq.com/qr/code/?username=zashare_edu" target="_blank">
                    <i class="fa fa-weixin"></i>
                    Wechat 
                </a>
             </div>
             <br>
             <div class="fb-like" data-href="https://www.facebook.com/zashare.expo/?fref=ts" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true" data-width="250px"></div>
             <br><br><br>
        </div>
        <div class="col-sm-8">
            <h5>聯絡資訊 Contact Info</h5>
            <hr style='border-color: #333'>
            <p>Address. 台北市信義區松德路159號25樓<br>
        Tel. +886-2-23467122<br>Mail. zashare@ozzie-art.com<br><br></p>
            <p>© 2017 雜学校 Za Share All Rights Reserved.&nbsp;&nbsp;&nbsp;&nbsp;</p>
    
            <br>
        </div>

     </div>
     
        
      
    <!-- 
     <h6>電話:  02-2346-7122 # 109</h6>
     <h6>信箱:  zashare@ozzie-art.com</h6>
     <h6>地址:  110台北市信義區松德路159號25樓25F., No.159, Songde Rd., Xinyi Dist., Taipei City 110, Taiwan (R.O.C.)</h6> -->
     
     


 </footer>


</body>
</html>
