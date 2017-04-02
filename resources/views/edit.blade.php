@extends('layouts.app')

@section('content')  
<div class='container'>
  <ol class="breadcrumb">
    <li>
      <a href='{!! URL::to('post') !!}'>文章列表</a>
    </li>
    <li class="active">
      編輯文章</a>
    </li>

  </ol>


  <form action="{{url('post/'.$post->id)}}" method="post">

      <div style="position: relative;">
        <h1>{{ $title }}</h1>
        <div class="btn-group" style="float: right">
          <label for="status">草稿
            <input type="radio" name="status" value="draft" {{ $post->status=="draft"?"checked":"" }} >
          </label>
          &nbsp;
          <label for="status">已發布
            <input type="radio" name="status" value="published"  {{ $post->status=="published"?"checked":"" }}>
          </label>
        </div>
      </div>

      <hr>
    
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
     <div class='form-group'>
       <label for="title">標題 </label> 
       <input name=title id=title class='form-control' value='{!! $post->title !!}'>
     </div>
    <div class='form-group'>
      <label for='tag' >文章類別</label>
      <select name=tag id=tag class='form-control'>
        @foreach ($catas as $cata)
          @if ($post->tag==$cata->tag)
            <option value={!! $cata->tag !!} selected=selected> {{$cata->tag}}. {{$cata->name}} </option>
          @else
            <option value={!! $cata->tag !!}> {{$cata->tag}}. {{$cata->name}} </option>
          @endif
        @endforeach
      </select>
     </div>

     <company-selector></company-selector>

    <div class='form-group'>
      <label for='company'>撰文者</label>
      <input id=author name=author class='form-control' value='{!! $post->author !!}'></input>
    </div>
    <div class='form-group'>
      <label for='established_time'>顯示上稿時間</label>
      <input id=established_time name=established_time type='datetime' class='form-control' value='{!! $post->established_time !!}'></input>
    </div>
    <div class='form-group' >
      <label for='company'>封面圖片</label><br>
      <div class="row">
        <div class="col-sm-3">
          <img class='cover_preview' src='{!! $post->cover !!}' width="100%">
        </div>
        <div class="col-sm-9">
          <input id=cover name=cover class='form-control' style='width: 80%; display: inline-block' value='{!! $post->cover !!}'></input>
          <br>
          <div class="btn btn-default btn-md btn-dropzone-cover" style='width: 18%; display: inline-block'>上傳圖片</div><br>
        </div>
      </div>
      
       </div>
       <div class='form-group'>
         <label for='short_description'>一句話簡介</label>
         <textarea name='short_description' id='short_description' rows=2 class='form-control' > {!! $post->short_description !!} </textarea>
      </div>
      <div class='form-group'>
         <label for='description'>簡介</label>
         <textarea name='description' id='description' style='height: 100px' class='form-control' > {!! $post->description !!} </textarea>
      </div>
     <div class='form-group'>
        <div class="btn btn-default btn-md btn-dropzone"  style='display:none;'>上傳圖片</div><br>
       <label for='content'>內容</label>
        <textarea name='content' id='content' style='height: 400px' class='form-control indep_post' > {!! $post->content !!} </textarea> <br>
        <button type=submit class='btn btn-default btn-md'>更新文章</button>
        &nbsp;
        <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除文章嗎？")){document.getElementById("form_delete_post").submit();}'>刪除文章</button>
     </form> 
   

    <form action="{{ url('post/'.$post->id) }}" method="post" id='form_delete_post'> 
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      
    </form> 

  </div>
  <script>
    var company_filter="{!! $post->company !!}";
    var cover_url="{!! $post->covwe !!}";
    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    
  </script>
 
@endsection

@section('require_js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script>
@endsection
