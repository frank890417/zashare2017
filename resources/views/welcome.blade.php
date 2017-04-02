@extends('layouts.app')

@section('content')

<div id="carousel-id" class="carousel slide" data-ride="carousel" style='margin-bottom: 50px'>
	<ol class="carousel-indicators">
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
	</ol>
	<div class="carousel-inner">
		

    @foreach ($show_posts as $id=>$post)
		<div class="item {{$id==0?'active':''}}" onclick="window.open('{{ url('post/'.$post->id) }}','_self')" style='cursor: pointer'>
			<div style="background-image:url('{{ $post->cover }}');height: 480px;background-size: cover;background-position: center;"></div>
			<div class="container text-right">
				<div class="carousel-caption" style='text-align: right;'>
					<h5 style='opacity: 0.9'>/ {{$post->name_cht}}</h5>
					<h1>{{$post->title}}</h1>
					<div class='text-right row'>
						<p class='col-xs-12 col-sm-7 col-sm-offset-5 text-right' style='display: inline-block'>{{$post->description}}</p>
					<!-- <p><a class="btn btn-default" href="{{url('post/'.$posts[0]->id)}}" role="button">查看故事</a></p> -->
					</div>
					
				</div>
			</div>
		</div>
    @endforeach

		

	</div>
	<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
	<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>


<postbox />

@endsection

@section('blade_pass_variables')
<script>
  window.data_storage.posts= JSON.parse('{{ json_encode($posts) }}'.replace(/&quot;/g,"\""));
  window.data_storage.catalist= JSON.parse('{{ json_encode($catalist) }}'.replace(/&quot;/g,"\""));
</script>
@endsection