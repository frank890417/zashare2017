@extends('layouts.app')

@section('meta_og')
<title>雜學校Zashare-參展報導</title>
 <meta property="og:title" content="雜學校Zashare-參展報導" />
<meta property="og:type" content="website" />
<meta property="og:image" content="http://zashare.org/img/main.jpg" />
<meta property="og:description" content="一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。" />
@endsection

@section('content')
<div class="page_blog">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
	<!-- 	<ol class="carousel-indicators">
			<li data-target="#carousel-id" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-id" data-slide-to="1" class=""></li>
			<li data-target="#carousel-id" data-slide-to="2" class=""></li>
			<li data-target="#carousel-id" data-slide-to="3" class=""></li>
			<li data-target="#carousel-id" data-slide-to="4" class=""></li>
			<li data-target="#carousel-id" data-slide-to="5" class=""></li>
			<li data-target="#carousel-id" data-slide-to="6" class=""></li>
			<li data-target="#carousel-id" data-slide-to="7" class=""></li>
			<li data-target="#carousel-id" data-slide-to="8" class=""></li>
			<li data-target="#carousel-id" data-slide-to="9" class=""></li>
		</ol> -->
		<div class="carousel-inner">
			
		<!-- 文章輪播 -->
	    @foreach ($show_posts as $id=>$post)
			<div class="item {{$id==0?'active':''}}" onclick="window.open('{{ url('post/'.$post->id) }}','_self')" style='cursor: pointer'>
				<div class="bg_parallax carousel_bg" style="background-image:url('{{ $post->cover }}');"></div>
				<div class="carousel_cover"></div>
				<div class="container text-left">
					<div class="row">
						<div class="col-xs-12 col-sm-8 ">
							<div class="carousel-caption">
								<h5 class="text-left" style='opacity: 0.9'>/ {{trim($post->name_cht)}}</h5>
								<h1 class="text-left">{{trim($post->title)}}</h1>
								<p class="text-left" style='display: inline-block'>{{  trim($post->short_description) }}</p>
							
							</div>
						</div>
					</div>
					
				</div>
			</div>
	    @endforeach

			

		</div>
		<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>

	<div class="post-box-wrapper">
		<postbox />
	</div>
</div>

@endsection

@section('blade_pass_variables')
<script>
  window.data_storage.posts={!! json_encode($posts->toArray()) !!};
  window.data_storage.catalist= {!! json_encode($catalist->toArray()) !!};
  window.data_storage.filter= "{!! $filter !!}";
</script>
@endsection