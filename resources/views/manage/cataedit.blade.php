@extends('layouts.app_manage')

@section('meta_og')
 <meta property="og:title" content="雜學校Zashare-亞洲最大創新教育展" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://zashare.org" />
<meta property="og:image" content="http://zashare.org/img/main.jpg" />
<meta property="og:description" content="一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。" />
@endsection

@section('content')

<div class='row'>
  <div class='col-lg-12' >
     <h1 class='page-header'>編輯類別</h1>
     <div class="panel">
       <div class="panel-heading">
         類別列表
       </div>
       <div class="panel-body">
         @if (Auth::guest())
         @else
            <form action="{{ url('manage/cata') }}" method="post">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="count" value="{{ count($catas) }}">
              <table class="table table-bordered">
                <thead>
                  <th>編號</th>
                  <th>TAG</th>
                  <th>名稱</th>
                  <th>年份</th>
                </thead>
                <tbody>
                  @foreach ($catas as $cata)
                  <tr>
                    <td>{{$cata->id}}</td>
                    <td><input name="{{ 'tag_'.($cata->id) }}" value="{{$cata->tag}}"></td>
                    <td><input name="{{ 'name_'.($cata->id) }}" value="{{$cata->name}}"></td>
                    <td><input name="{{ 'year_'.($cata->id) }}" value="{{$cata->year}}"></td>

                  </tr>
                  @endforeach
                  <tr>
                    <td><button>新增類別</button> </td>
                    <td><input name="tag" value="" placeholder="新類別代號"></td>
                    <td><input name="name" value="" placeholder="新類別名稱"></td>
                    <td><input name="year" value="2017" placeholder="新類別年份"></td>

                  </tr>
                  
                </tbody>
              </table>
              <button type="submit">更新</button>
            </form>
         @endif
       </div>
     </div>
     
  </div>


</div>
@endsection

@section('blade_pass_variables')
<script>
</script>
@endsection