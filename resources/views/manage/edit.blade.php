@extends('layouts.app_manage')

@section('content')  
<div class="row">
  <ol class="breadcrumb">
    <li>
      <a href='{!! URL::to('manage/post') !!}'>文章列表</a>
    </li>
    <li class="active">
      編輯文章</a>
    </li>

  </ol>
  <div class="col-lg-12">
      <h1 class='page-header'>
        {{ $title }}
      </h1>
    </div>
</div>
<form class='row' action="{{ isset($post)?url('manage/post/'.($post->id)):url('manage/post') }}" method="post">  
  <div class='col-lg-9'>
    <div class="panel panel-default">
      <div class='panel-heading'>
        編輯
      </div>
      <div class='panel-body'>
        <input type="hidden" name="_method" value="{{isset($post)?'put':'post'}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
         <div class='form-group'>
           <label for="title">標題 </label> 
           <input name=title id=title class='form-control' value='{!! isset($post)?($post->title):'' !!}'>
         </div>

       <company-selector></company-selector>

       <div class='form-group'>
         <label for='short_description'>一句話簡介</label>
         <textarea name='short_description' id='short_description' rows=2 class='form-control' > {!! isset($post)?($post->short_description):'' !!} </textarea>
      </div>
      <div class='form-group'>
         <label for='description'>簡介</label>
         <textarea name='description' id='description' rows=3 class='form-control' > {!! isset($post)?($post->description):'' !!} </textarea>
      </div>


     <div class='form-group'>
        <div class="btn btn-default btn-md btn-dropzone"  style='display:none;'>上傳圖片</div><br>
         <label for='content'>內容</label>
        <textarea name='content' id='content' rows=20 class='form-control indep_post' > {!! isset($post)?($post->content):'' !!} </textarea> <br> 

      </div>

    </div>
  </div>
  </div>

  <div class='col-lg-3'>
    <div class="panel panel-default">
      <div class='panel-heading'>
        文章設定
      </div>
      <div class='panel-body'>
    
        <div class='form-group'>
          <label>發佈狀態</label>
          <br>
          <div class="btn-group">

            <label for="status">草稿
              <input type="radio" name="status" value="draft" {{ (isset($post)?($post->status):'')=="draft"?"checked":"" }} >
            </label>
            &nbsp;
            <label for="status">已發布
              <input type="radio" name="status" value="published"  {{ (isset($post)?($post->status):'')=="published"?"checked":"" }}>
            </label>
          </div>
        </div>

        <div class='form-group'>
          <label>首頁置頂</label>
          <br>
          <div class="btn-group">

            <label for="stick_top_index">置頂
              <input type="radio" name="stick_top_index" value=1 {{ ((isset($post)?($post->stick_top_index):0)==1)?"checked":"" }} >
            </label>
            &nbsp;
            <label for="stick_top_index">否
              <input type="radio" name="stick_top_index" value=0  {{ ((isset($post)?($post->stick_top_index):0)==0)?"checked":"" }}>
            </label>
          </div>
        </div>

        <div class='form-group'>
          <label>類別置頂</label>
          <br>
          <div class="btn-group">

            <label for="stick_top_cata">置頂
              <input type="radio" name="stick_top_cata" value=1 {{ ((isset($post)?($post->stick_top_cata):0)==1)?"checked":"" }} >
            </label>
            &nbsp;
            <label for="stick_top_cata">否
              <input type="radio" name="stick_top_cata" value=0  {{ ((isset($post)?($post->stick_top_cata):0)==0)?"checked":"" }}>
            </label>
          </div>
        </div>


        <div class='form-group'>
          <label for='tag' >文章類別</label>
          <select name=tag id=tag class='form-control'>
            @foreach ($catas as $cata)
              @if ((isset($post)?($post->tag):'')==$cata->tag)
                <option value={!! $cata->tag !!} selected=selected> {{$cata->tag}}. {{$cata->name}} </option>
              @else
                <option value={!! $cata->tag !!}> {{$cata->tag}}. {{$cata->name}} </option>
              @endif
            @endforeach
          </select>
        </div>

        <div class='form-group'>
          <label for='company'>年份</label>
          <input id=year name=year class='form-control' value='{!! isset($post)?($post->year):'2017' !!}'></input>
        </div>
        <div class='form-group'>
          <label for='company'>撰文者</label>
          <input id=author name=author class='form-control' value='{!! isset($post)?($post->author):'' !!}'></input>
        </div>
      

        <div class='form-group'>
          <label for='established_time'>上稿時間</label>
          <input id=established_time name=established_time type='datetime' class='form-control' value='{!! isset($post)?($post->established_time):'' !!}'></input>
        </div>

        <div class='form-group' >
          <label for='company'>封面圖片</label><br>
          <div class="row">
            <div class="col-sm-3">
              <img class='cover_preview' src='{!! isset($post)?($post->cover):'' !!}' width="100%">
            </div>
            <div class="col-sm-9">
              <input id=cover name=cover class='form-control' style='display: inline-block' value='{!! isset($post)?($post->cover):'' !!}'></input>
              <br>
              <div class="btn btn-default btn-md btn-dropzone-cover" style='display: inline-block'>上傳圖片</div>
              <br>
            </div>
          </div>
        </div>

        <div class="form-group">
          <hr>
          <button type=submit class='btn btn-default btn-md'>{{ isset($post)?'更新文章':'新增文章' }}</button>
          @if(isset($post))
            <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除文章嗎？")){document.getElementById("form_delete_post").submit();}'>刪除文章</button>
          @endif
        </div>
          
    
      </div>
    </div>
  </div>
</form> 

<form id="form_delete_post" action="{{url('manage/post/'.(isset($post)?($post->id):''))}}" method="POST">
  <input type="hidden" name="_method" value="delete"/>
  <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
</form>

  <script>
    var company_filter="{!! isset($post)?($post->company):'' !!}";
    var cover_url="{!! isset($post)?($post->cover):'' !!}";
    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    
  </script>
 
@endsection

@section('require_js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script>
@endsection
