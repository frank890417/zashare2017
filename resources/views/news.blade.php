@extends('layouts.app')

@section('meta_og')
 <meta property="og:title" content="雜學校Zashare-亞洲最大創新教育展" />
<meta property="og:type" content="website" />
<meta property="og:image" content="http://zashare.org/img/main.jpg" />
<meta property="og:description" content="一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。" />
@endsection

@section('content')

<div class='container-fluid' style='padding: 0'>

	<div style="height: 300px;background-image: url(http://zashare.org/img/ci_people.png);background-color: #f24;background-repeat: no-repeat;"></div>
	</div>
	<div class="container">
		<div class="row">	
			<div class="col-sm-12">
				<br>
				<h1>最新消息</h1>	
				<hr>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-4" style='background-color: #eee; height: 300px;'>新聞圖片</div>
			<div class="col-sm-8">
				<h2>標題</h2>
				<p>新聞描述</p>
			</div>
		</div>		
	</div>
	

</div>




@endsection

@section('blade_pass_variables')
<script>

</script>
@endsection