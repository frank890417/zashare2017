@extends('layouts.app')

@section('meta_og')
<title></title>
<meta property="og:title" content="【 {{$company->name_cht}} 】{{$post->title}}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:image" content="{{$post->cover }}">
<meta property="og:description" content="{{$post->description}}">
@endsection

@section('content') 

  @if (isset($post))
  <div class="container indep_post">
    <div class="row">
      <div class="col-sm-12">
       <!--  <ol class="breadcrumb">
            <li>
              <a href='{!! URL::to('') !!}'>文章列表</a>
            </li>
            <li class="active">
              {{ $post -> title }}</a>
            </li>

        </ol> -->
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-3 text-left col_company">
        
        <div class="hidden-xs">
          <br>
          <br> 
          <!-- <h4> {{ $company->tag }} -->
          </h4>
          <a href="{{$company->website}}" target="_blank" title='前往{{ $company->name_cht }}網站'>
            <img src='{{"http://2016.zashare.org/img/square_logos/".($company->tag).".jpg"}}'>  
          </a>
          <h5 class="text-muted"> #{{ $catalist[ $post->tag ] }} </h5>
          <h3>{{ $company->name_cht}}
            <!-- <a class='company_link' href="{{$company->website}}" target="_blank" title='前往{{ $company->name_cht }}網站'>
              <i class="fa fa-link"></i>
            </a> -->
          </h3>
            <!-- <br>  -->
          <p class="col_describe"> {{ $company->discribe_cht }}</p>
        </div>


      </div>
      <div class="col-xs-12 col-sm-9 col_post col-sm-offset-3">
        <div class="col-sm-12">
          <div class='post_image' style="background-image:url('{{ $post->cover }}');" alt="">
            <div class="infos">

              <h5 class='visible-xs'> / {{ $company->name_short }}</h5>
            	<h1>{{ $post->title }}</h1>
              <h5 class='jour'>{{ $post->author }}</h5>
            </div>
          </div>
          <hr>
          <div class='content-area'>{!! str_replace('&nbsp;</p>', '</p>' , $post->content)  !!}</div>
            @endif


          <div class="visible-xs col_company2">
          
                <a href="{{$company->website}}" target="_blank" title='前往{{ $company->name_short }}網站'>
                  <img src='{{"http://2016.zashare.org/img/square_logos/".($company->tag).".jpg"}}'>  
                </a>
                <br> 
                <h5 class="text-muted"> #{{ $catalist[ $post->tag ] }} </h5>
                <br> 
                <h3>{{ $company->name_cht}}
                  <!-- <a class='company_link' href="{{$company->website}}" target="_blank" title='前往{{ $company->name_cht }}網站'>
                    <i class="fa fa-link"></i>
                  </a> -->
                </h3>
                
                  <!-- <br>  -->
                <p> {{ $company->discribe_cht }}</p>

          </div>

          <div class='btns text-center'>
           <a class='btn btn-primary' href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current()}}" target="_blank">分享文章</a>
            <a class='btn btn-link' href="#" onclick="window.history.back();">回上一頁</a>
          </div>
          <br>
        </div>
        <br>
         


          <div class='col-sm-12'>
                
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8&appId=756438861174269";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>

              <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5" data-width="100%"></div>

          </div>
          <div class="col-sm-12">
            <h2>相關類別文章</h2>
            <hr>
          </div>
          @foreach ($related_posts as $rpost)
          <div class="col-sm-6" onclick='window.open("{{url("/post/".$rpost->id)}}","_self")' style='cursor:pointer'>
            
            <a class="relate_cover" style='display: block;background-image:url("{{$rpost->cover}}");'>
            <div class='mask'></div>
            <div class="related_info">
              <!-- <h5 style='margin: 0;margin-bottom: 10px'>{{ $rpost->name_cht }}</h3> -->
              <h3 style='margin: 0;margin-bottom: 10px'>{{ $rpost->title }}</h3>
              <p> {{ $rpost->short_description }}</p>

            </div>
            

            </a>

          </div>
          @endforeach
        </div>
   
      </div>
    </div>
    
@endsection


