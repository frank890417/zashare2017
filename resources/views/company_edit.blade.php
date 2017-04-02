@extends('layouts.app')

@section('content')
<div class='container'>
  <a href='{!! URL::to('company') !!}'>返回編輯列表</a>
  <br>
  <br>
 
@if (isset($company))
  <form action="{{ url('company/'.$company->id) }}" method="post">
    <input type="hidden" name="_method" value="put">
@else
  <form action="{{ url('company/') }}" method="post">
    <input type="hidden" name="_method" value="post">
@endif

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class='form-group'>
      <label for='tag'>編號</label>
      <input id=tag name=tag class='form-control' value='{!! isset($company)?$company->tag:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='theme'>主題</label>
      <input id=theme name=theme class='form-control' value='{!! isset($company)?$company->theme:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='cata'>類型</label>
      <input id=cata name=cata class='form-control' value='{!! isset($company)?$company->cata:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='place'>地點</label>
      <input id=place name=place class='form-control' value='{!! isset($company)?$company->place:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='name_cht'>中文名稱</label>
      <input id=name_cht name=name_cht class='form-control' value='{!! isset($company)?$company->name_cht:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='name_short'>短名稱(顯示在文章用)</label>
      <input id=name_short name=name_short class='form-control' value='{!! isset($company)?$company->name_short:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='name_eng'>英文名稱</label>
      <input id=name_eng name=name_eng class='form-control' value='{!! isset($company)?$company->name_eng:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='discribe_cht'>中文描述</label>
      <textarea id=discribe_cht name=discribe_cht class='form-control' rows=15 >{!! isset($company)?$company->discribe_cht:"" !!}</textarea>
    </div>

    <div class='form-group'>
      <label for='discribe_eng'>英文描述</label>
      <textarea id=discribe_eng name=discribe_eng class='form-control' rows=15>{!! isset($company)?$company->discribe_eng:"" !!}</textarea>
    </div>

    <div class='form-group'>
      <label for='website'>網站</label>
      <input id=website name=website class='form-control' value='{!! isset($company)?$company->website:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='teach_thing'>想教的東西</label>
      <input id=teach_thing name=teach_thing class='form-control' value='{!! isset($company)?$company->teach_thing:"" !!}'></input>
    </div>

    <div class='form-group'>
      <label for='learn_thing'>想學的東西</label>
      <input id=learn_thing name=learn_thing class='form-control' value='{!! isset($company)?$company->learn_thing:"" !!}'></input>
    </div>

     <div class='form-group'>
      <button type=submit class='btn btn-primary btn-md'>儲存變更</button>
    </div>

</form>





</div>

  
  <script>
    window.require_js={};
    window.require_js.dropzone=true;
    window.require_js.tinymce=true;
    
  </script>

@endsection


@section('require_js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.3/tinymce.min.js'></script>
@endsection