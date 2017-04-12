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

                        <li class="dropdown dropdown_cata {{ isset($pagename)?(($pagename=='blog')?'active':''):'' }} hidden-xs">
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

                        <li class="dropdown dropdown_cata {{ isset($pagename)?(($pagename=='blog')?'active':''):'' }} visible-xs">
                            <a href="#"  role="button" aria-haspopup="true" aria-expanded="true" >參展報導<span class="caret"></span></a>
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