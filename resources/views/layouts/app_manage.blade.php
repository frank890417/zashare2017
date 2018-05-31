<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZASHARE 雜學校重設密碼</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <link href="/css/admin_css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin_css/datepicker3.css" rel="stylesheet">
    <link href="/css/admin_css/styles.css" rel="stylesheet">
    <!-- Icons -->
    <script src="/js/admin_js/lumino.glyphs.js"></script>
    <!--      
      script(src='/js/admin_js/html5shiv.js')
      script(src='/js/admin_js/respond.min.js')
    -->
    <script>
      window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
    </script>

    <script>
    document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
    ':35729/livereload.js?snipver=1"></' + 'script>');
    </script>
  </head>
  <body>
    <!-- <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#sidebar-collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"><span>Zashare 2017</span> Admin</a>
          <ul class="user-menu">
            <li class="dropdown pull-right"><a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <svg class="glyph stroked male-user">
                  <use xlink:href="#stroked-male-user"></use>
                </svg>  <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#">
                    <svg class="glyph stroked male-user">
                      <use xlink:href="#stroked-male-user"></use>
                    </svg> Profile</a></li>
                <li><a href="#">
                    <svg class="glyph stroked gear">
                      <use xlink:href="#stroked-gear"></use>
                    </svg> Settings</a></li>
                <li><a href="#">
                    <svg class="glyph stroked cancel">
                      <use xlink:href="#stroked-cancel"></use>
                    </svg> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      
    </nav> -->
    <!-- <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
      <form role="search">
        <div class="form-group">
          <input type="text" placeholder="Search" class="form-control">
        </div>
      </form>
      <ul class="nav menu">

        <li class="{{ isset($pagename)?(($pagename=='post')?'active':''):'' }} " ><a href="{{ url('manage/post') }}">
            <svg class="glyph stroked calendar">
              <use xlink:href="#stroked-calendar"></use>
            </svg> 文章管理</a></li>
       
        <li class="{{ isset($pagename)?(($pagename=='cata')?'active':''):'' }}"><a href="{{ url('manage/cata') }}">
              <svg class="glyph stroked calendar">
                <use xlink:href="#stroked-calendar"></use>
              </svg> 類別管理</a></li>

        <li class="{{ isset($pagename)?(($pagename=='company')?'active':''):'' }}"><a href="{{ url('manage/company') }}">
              <svg class="glyph stroked calendar">
                <use xlink:href="#stroked-calendar"></use>
              </svg> 攤位資料管理</a></li>
        {{--          
          a(href='#')
            span(data-toggle='collapse', href='#sub-item-1')
              svg.glyph.stroked.chevron-down
                use(xlink:href='#stroked-chevron-down')
            |  Dropdown
          ul#sub-item-1.children.collapse
            li
              a(href='#')
                svg.glyph.stroked.chevron-right
                  use(xlink:href='#stroked-chevron-right')
                |  Sub Item 1
            li
              a(href='#')
                svg.glyph.stroked.chevron-right
                  use(xlink:href='#stroked-chevron-right')
                |  Sub Item 2
            li
              a(href='#')
                svg.glyph.stroked.chevron-right
                  use(xlink:href='#stroked-chevron-right')
                |  Sub Item 3
        --}}
        <li role="presentation" class="divider"></li>
        @if (Auth::guest())
          <li><a href="{{ url('/login') }}">
              <svg class="glyph stroked male-user">
                <use xlink:href="#stroked-male-user"></use>
              </svg> Login Page</a>
          </li>
        @else
          <li>
            <a onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
              <svg class="glyph stroked male-user">
                <use xlink:href="#stroked-male-user"></use>
              </svg> Login out
            </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        @endif
      </ul>
    </div> -->
    <!-- /.sidebar -->
    <div class="col-sm-12 main" id="app">
      @yield('content')
      <div class="clearfix"></div>
    
      <!-- /.row -->
    </div>
    <!-- /.main -->
    
    @yield('blade_pass_variables')
    {{-- Script BEFORE app.js --}}
    @yield('require_js')
    <script src="/js/admin_js/jquery-1.11.1.min.js"></script>
    <script src="/js/admin_js/bootstrap.min.js"></script>
    {{-- script(src='/js/admin_js/chart.min.js') --}}
    <script src="/js/app.js"></script>
    {{-- script(src='/js/admin_js/chart-data.js') --}}
    {{-- script(src='/js/admin_js/easypiechart.js') --}}
    {{-- script(src='/js/admin_js/easypiechart-data.js') --}}
    {{-- script(src='/js/admin_js/bootstrap-datepicker.js') --}}
    {{--      
      $('#calendar').datepicker({
      });
      !function ($) {
      $(document).on("click","ul.nav li.parent > a > span.icon", function(){
      $(this).find('em:first').toggleClass("glyphicon-minus");
      });
      $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
      }(window.jQuery);
      $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
      })
      $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
      })
      
      
    --}}
    {{-- Script AFTER app.js --}}
    @yield('require_js_after')
  </body>
</html>

