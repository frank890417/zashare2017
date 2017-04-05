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
                        <li class="{{ isset($pagename)?(($pagename=='blog')?'active':''):'' }} " ><a href="{{ url('/blog') }}">參展報導</a></li>
                        <li class="{{ isset($pagename)?(($pagename=='about')?'active':''):'' }} " ><a href="{{ url('/about') }}">關於雜學校</a></li>
                        <li class="{{ isset($pagename)?(($pagename=='expo')?'active':''):'' }} " ><a href="{{ url('/expo') }}">歷屆展覽</a></li>
                        <!-- <li> <i class="fa fa-search"></i></li> -->
                        <!-- <li><a href="http://zashare.weebly.com/2015naughty.html" target="_blank">2015不太乖教育節</a></li>
                        <li><a href="http://zashare.org" target="_blank">2016雜學校</a></li>
 -->
                       
                        <li><a href="https://www.facebook.com/zashare.expo/?fref=ts" target="_blank">
                            <img src="https://cdn3.iconfinder.com/data/icons/picons-social/57/46-facebook-512.png" style='width: 20px;opacity: 0.6'>
                        </a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div style='padding-top: 60px;'>
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

 <div class="container"><img src="http://zashare.org/img/ci_logosvg_purple.svg" width="130px">
    <br>
  
  <h5>聯絡資訊 Contact Info</h5>
  <p>25F., No.159, Songde Rd., Xinyi Dist.Taipei City 110, Taiwan 110<br>
        台北市信義區松德路159號25樓25F.<br>
TEL. +886-2-23467122<br>mail. zashare@ozzie-art.com</p>
   <br>
  <p>© 2017 雜学校 Za Share All Rights Reserved.</p>
<!-- 
 <h6>電話:  02-2346-7122 # 109</h6>
 <h6>信箱:  zashare@ozzie-art.com</h6>
 <h6>地址:  110台北市信義區松德路159號25樓25F., No.159, Songde Rd., Xinyi Dist., Taipei City 110, Taiwan (R.O.C.)</h6> -->
 <br>
 <p>網站製作: <a href="http://www.monoame.com/" target="_blank">墨雨設計</a></p>
 <br>
 </div>


 </footer>



 </footer>
</body>
</html>
