@extends('layouts.app_manage')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class='page-header'>
      攤位資料編輯
    </h1>
  </div>
</div>
<div class="row">
    <div class="col-md-12" style='padding-top: 20px'>
        <div class="panel panel-default">
            <div class="panel-heading">攤位列表</div>
            <div class="panel-body">
                @if (isset($companies))
                  <table class='table table-hover' id=posttable>
                    <thead>
                      <th> </th>
                      <th></th>
                      <th>名字</th>
                      <th>短團隊名稱</th><!-- 
                      <th>描述</th> -->
                      @if (!Auth::guest())

                        <!-- <th>檢視</th> -->
                        <th>編輯</th>
                      @endif
                    </thead>
                    @foreach ($companies as $id => $company)
                      <tr class=''> 
                        <td> {{ $company->tag }}</td>
                        <td><img src='{{"http://zashare.org/img/square_logos/".$company->tag.".jpg"}}' style="width: 60px" alt=""></td>
                        <!-- <td><img src="{{$company->cover}}" alt="" style="width: 80px"></td> -->
                       
                        <td> {{ $company->name_cht }} </td>
                        <td> {{ $company->name_short }} </td><!-- 
                        <td> {{ $company->discribe_cht }} </td> -->

                        @if (!Auth::guest())
                         <!--  <td> 
                              <a class='btn btn-default btn-md' href="{!! URL::to('manage/company/'.$company->id) !!}" >瀏覽</a>
                          </td> -->
                          <td>
                              <a class='btn btn-default btn-md' href="{!! URL::to('manage/company/'.$company->id.'/edit') !!}" >編輯</a>
                          </td>
                        <!--   <td>
                              <button class='btn btn-danger btn-md' onclick='event.preventDefault();if(confirm("你確定要刪除文章嗎？")){document.getElementById("delete_company_{{$company->id}}").submit();}'>刪除</button>
                              <form id='delete_company_{{$company->id}}' action="{{url('company/'.$company->id)}}" method="company">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              </form>
                             
                          </td> -->
                        @endif
                        
                      </tr>
                    @endforeach
                  </table>
                @endif
                @if (Auth::guest())
                  請<a href='{!! url("login") !!}'>登入帳號</a>管理文章
                @else
                  {{ Auth::user()->name }}，你已成功登入！
                  <a class='btn btn-default' href='{!! URL::to('manage/company/create') !!}'>新增文章</a>
                @endif

                <br>

                
            </div>


        </div>


    </div>
</div>


@endsection


{{-- send varaibles to JS field --}}

@section('blade_pass_variables')
<script>
 
</script>
@endsection



@section('require_js_after')
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endsection