<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta_og')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    
  
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/img/logo_red.svg" height="30px">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
<!--                     <ul class="nav navbar-nav">
                        &nbsp;
                    </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                     <!-- Authentication Links -->
                        <!-- <li><a href="{{ url('/blog') }}">最新消息</a></li> -->
                        <li class="{{ isset($pagename)?(($pagename=='news')?'active':''):'' }} " ><a href="{{ url('/news') }}">最新消息</a></li>

                        <li class="dropdown {{ isset($pagename)?(($pagename=='blog')?'active':''):'' }} ">
                            <a href="{{ url('/blog') }}"  role="button" aria-haspopup="true" aria-expanded="true" >參展報導<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="/blog#A">學校現場與實驗教育</a></li>
                              <li><a href="/blog#B">教育倡議與實踐</a></li>
                              <li><a href="/blog#C">媒體與資訊平台</a></li>
                              <li><a href="/blog#D">創客與程式設計</a></li>
                              <li><a href="/blog#E">文化與歷史生活</a></li>
                              <li><a href="/blog#F">肢體與藝術創作</a></li>
                              <li><a href="/blog#G">自然與食農教育</a></li>

                            </ul>
                        </li>

                        <li class="{{ isset($pagename)?(($pagename=='about')?'active':''):'' }} " ><a href="{{ url('/about') }}">關於雜學校</a></li>
                        <li class="{{ isset($pagename)?(($pagename=='expo')?'active':''):'' }} " ><a href="{{ url('/expo') }}">歷屆展覽</a></li>
                        <!-- <li> <i class="fa fa-search"></i></li> -->
                        <!-- <li><a href="http://zashare.weebly.com/2015naughty.html" target="_blank">2015不太乖教育節</a></li>
                        <li><a href="http://zashare.org" target="_blank">2016雜學校</a></li>
 -->
                    </ul>
                </div>
            </div>
        </nav>

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
            <img src="http://zashare.org/img/ci_logosvg_purple.svg" width="130px">
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
