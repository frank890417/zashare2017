

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
</head>
<body class='landing_page_body'> 
  <div class='center_box text-center'>
    <img src="/img/logo_white.svg" style='width: 400px;margin-left: auto;margin-right: auto'>
    <br>
    <br>
    <h3 style='color: white'>學習從不是單一概念。</h3>
    <br>
    <a href="{{ url('/blog') }}" class='btn btn-default btn-lg btn-trans'> 來雜學吧！ </a>
  </div>
  <video autoplay loop class='landing-video'>
      <source src="http://zashare.org/files/civideo.mp4" type="" >

  </video>


</body>
