

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


     <meta property="og:title" content="雜學校Zashare-亞洲最大創新教育展" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://zashare.org/img/main.jpg" />
    <meta property="og:description" content="一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。" />

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
</head>
<body class='landing_page_body'> 
<nav class="navbar navbar-default navbar-fixed-top nav-transparent">
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
                       
                    
                    </ul>
                </div>
            </div>
        </nav>

  <div class='center_box text-center'>
    <img src="/img/logo_white.svg" style='margin-left: auto;margin-right: auto'>
    <br>
    <br>
    <h3 style='color: white'>學習從不是單一概念。</h3>
    <br>
    <br class="visible-xs">
    <br class="visible-xs">
    <a  href="{{ url('/blog') }}" class='btn btn-default btn-lg btn-trans visible-xs'> 來雜學吧！ </a>
  </div>
  <video autoplay loop class='landing-video'>
      <source src="http://2016.zashare.org/files/civideo.mp4" type="" >

  </video>


</body>
