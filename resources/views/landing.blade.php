

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
    <meta property="og:image" content="http://zashare.org/img/2017/og_2017.jpg" />
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
<body class='landing_page_body' style="overflow-y: scroll;height: 100vh"> 
  @include('nav')



  <div class="container main_info_container">
    <div class="row">
      <div class="col-md-7">
        <img class='hidden-sm hidden-xs main' src="/img/2017/index_index_desktop.svg" class="main_block" alt="">
        <img class='visible-sm visible-xs main' src="/img/2017/index_index_mobile.svg" class="main_block" alt="">
        <div class="index_btns">
          <div class="index_btn btn_apply">
            <img src="/img/2017/index_btn_attend.svg"  alt="">
          </div>
          <div class="index_btn btn_ticket disable">
            <img src="/img/2017/index_btn_buy.svg" alt="">
          </div>
          <div class="index_btn btn_crowd disable">
            <img src="/img/2017/index_btn_crowd.svg" alt="">
          </div>
        </div>
      </div>

    </div>
  </div>
 {{--  <div class='center_box text-center' id="app">
    <div class="row">
    
    </div>
    <img src="/img/logo_white.svg" style='margin-left: auto;margin-right: auto'>
    <br>
    <br>
    <h3 style='color: white'>學習從不是單一概念。</h3>
    <br>
    <br class="visible-xs">
    <br class="visible-xs">
    <a  href="{{ url('/blog') }}" class='btn btn-default btn-lg btn-trans visible-xs'> 來雜學吧！ </a>
  </div> --}}
  <video autoplay loop class='landing-video'>
      <source src="/video/ci_main_2017.mp4" type="" >
  </video>
    <script>
      if (!window.data_storage){
        window.data_storage={};
      }
       //傾斜效果
      if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        if(window.DeviceOrientationEvent){
          window.addEventListener("deviceorientation", orientation, false);
        }else{
          console.log("DeviceOrientationEvent is not supported");
        }

        function orientation(event){
          $(".landing_page_body").css("background-position",(50-(event.gamma/10))"% "+(50-(event.beta/10))"% ");
            $(".main_info_container").css("transform","translateX("+($(window).width()/2-event.gamma/1.5)+"px"+") translateY("+-event.beta/1.7+"px"+")");
          // mospos.x=mpos.x+event.gamma;
          // mospos.y=mpos.y+event.gamma;


        }
        
      }


    </script>
    @yield('blade_pass_variables')


    {{-- Script BEFORE app.js --}}
    @yield('require_js')
    <script src="/js/app.js"></script>

    {{-- Script AFTER app.js --}}
    @yield('require_js_after')
        
</body>
