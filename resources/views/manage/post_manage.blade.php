@extends('layouts.app_manage')

@section('content')
<div class="row">
  <div class="col-md-12" >
    <h1 class="page-header">
      文章管理
    </h1>
  </div>
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading">文章列表</div>
            <div class="panel-body">
                @if (isset($posts))
                  <table class='table table-hover' id=posttable>
                    <thead>
                      <th> </th>
                      <th>縮圖</th>
                      <th>類別</th>
                      <th style="width: 65px">攤位編號</th>
                      <th style="width: 120px">名稱</th>
                      <th>文章標題</th>
                      <th style="width: 50px">狀態</th>
                      <th style="width: 50px">首頁置頂</th>
                      <th style="width: 50px">類別置頂</th>
                      <th style="width: 30px">年份</th>
                      @if (!Auth::guest())
                        <th>最後編輯</th>
                        <!-- <th>檢視</th> -->
                        <th>編輯</th>
                        <th>刪除</th>
                      @endif
                    </thead>
                    @foreach ($posts as $id => $post)
                      <tr class=''> 
                        <td> {{ $post->tag }}</td>
                        <td><img src="{{$post->cover}}" alt="" style="width: 80px"></td>
                        <td style='width: 140px'>
                          {{ $post->cataname }}
                        </td>
                        <td> {{ $post->company}}</td>
                        <td> {{ $post->name_cht }} </td>
                        @if (!Auth::guest())
                          <td> <a href="{!! URL::to('manage/post/').'/'.$post->id.'/edit' !!}" target=''>{{ $post->title }}</a> </td>
                        @else
                          <td> {{ $post->title }} </td>
                        @endif
                        @if (!Auth::guest())
                          <td> {{ $post->status=="draft"?"草稿":"已發布" }} </td>
                          <td> {{ $post->stick_top_index?'O':'-' }} </td>
                          <td> {{ $post->stick_top_cata?$post->tag:'-' }} </td>
                          <td> {{ $post->year }} </td>
                          <td> {{ $post->established_time }} </td>
                         <!--  <td> 
                              <a class='btn btn-default btn-md' href="{!! URL::to('manage/post/'.$post->id) !!}" >瀏覽</a>
                          </td> -->
                          <td>
                              <a class='btn btn-default btn-md' href="{!! URL::to('manage/post/'.$post->id.'/edit') !!}" >編輯</a>
                          </td>
                          <td>
                              <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除文章嗎？")){document.getElementById("delete_post_{{$post->id}}").submit();}'>刪除</button>
                              <form id='delete_post_{{$post->id}}' action="{{url('manage/post/'.$post->id)}}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              </form>
                             
                          </td>
                        @endif
                        
                      </tr>
                    @endforeach
                  </table>
                @endif
                @if (Auth::guest())
                  請<a href='{!! url("login") !!}'>登入帳號</a>管理文章
                @else
                  {{ Auth::user()->name }}，你已成功登入！
                  <a class='btn btn-default' href='{!! URL::to('manage/post/create') !!}'>新增文章</a>
                @endif

                <br>

                
            </div>


        </div>


        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">重要更新</h3>
          </div>
          <div class="panel-body">
            2017/2/28 彙整不太乖/雜學校到同一頁<br>
            2017/2/22 加上FB留言功能 / 加上首頁跟簡介<br>
            2017/2/21 建議封面圖要原始檔案重傳，不然會太糊 / 改進後台介面統整操作/ 持續優化系統<Br>
            2017/2/20 已加上自動去除格式功能，上稿可以直接從hackpad複製ok的，儲存後會去掉格式！
          </div>
        </div>


    </div>
</div>

@endsection


{{-- send varaibles to JS field --}}

@section('blade_pass_variables')
<script>
  window.data_storage.catalist= JSON.parse('{{ json_encode($catalist) }}'.replace(/&quot;/g,"\""));
</script>
@endsection



@section('require_js_after')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endsection