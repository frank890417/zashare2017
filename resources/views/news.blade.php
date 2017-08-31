@extends('layouts.app')

@section('meta_og')
<title>雜學校Zashare-最新消息</title>
 <meta property="og:title" content="雜學校Zashare-最新消息" />
<meta property="og:type" content="website" />
<meta property="og:image" content="http://zashare.org/img/main2.jpg" />
<meta property="og:description" content="一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。" />
@endsection

@section('content')

<div class='container-fluid page_news'>
	<div class="orange_bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-11">
					<h1 class="newsTitle">雜學校募資大業啟動 擔任建校元老就趁現在!</h1>
					<br>
					<p>在這裡,教育將沒有框架的限制<br>在這裡,你可以「學你想學、學你想成為」<br>在這裡,能夠客製化讓你創造一個獨一無二的自己。<br><br>現在,誠摯的邀請你們一起加入我們的建校大業,<br>成為雜學校第一批學生。</p>
					
					<img class="visible-xs" src="http://zashare.org/funding_assets/img/main/2-right.png" alt="">
				
				</div>
				<div class="col-sm-1">
					<p class="vertical_text">入學條件:1-99歲的每一個人<br>入學考試:破關『教育迷宮遊戲』<br>招生名額:2017位
					</p>
				</div>
				<div class="col-sm-12">
					<hr>
				</div>
				<div class="col-sm-8">
					<h3>身為 <u>雜學校建校元老</u>,有什麼「特權」?</h3>
					<div class="row">
						<div class="col-sm-4 fcenter vertical">
							<div class="num">01</div>
							<h4>雜學校學生證</h4>	
							<p>一張在手,雜學無窮!</p>
						</div>
						<div class="col-sm-4 fcenter vertical">
							<div class="num">02</div>
							<h4>雜博覽</h4>	
							<p>2017年尊榮級觀展體驗<br>@華山1914</p>
						</div>
						<div class="col-sm-4 fcenter vertical">
							<div class="num">03</div>
							<h4>雜學堂</h4>	
							<p>24 堂超狂講師<br>手把手教你最雜的知識</p>
						</div>
					</div>
					<hr>
					<h4>看更多建校內容>>> 
						<a class="btn" href="http://zashare.org/pacman/" target="_blank">
							立即支持建校
						</a>
					</h4>
				</div>
				<div class="col-sm-4">
					<img class="hidden-xs" src="http://zashare.org/funding_assets/img/main/2-right.png" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="blue_bg">

		<div class="container area_news">
			<div class="row ">
				<div class='col-sm-4 visible-xs'>
					<img class='person' src="http://zashare.org/funding_assets/img/main/header-s3.png" alt="">
				</div>
				<div class="col-sm-8 pdlr">
					<h1>2017 雜學校參展入圍名單出爐囉！</h1>
					<p class='subtitle'>今年度雜學校「有敢擇學try try see」公開徵展後，收到了近五百個優秀團隊的申請，
在策展團隊經過無數個爭辯廝殺討論後，熱騰騰的入選名單終於出爐囉！
快來一探究竟今年入選的優秀團隊有哪些！<br><br><br><br></p>
				</div>
				<div class='col-sm-4 hidden-xs'>
					<img class='person' src="http://zashare.org/funding_assets/img/main/header-s3.png" alt="">
				</div>
				
			</div>
			<div class='row'>
				<div class='col-sm-12'>
					<div class='form-inline'>
						<label for="" placeholder="請輸入關鍵字">快速搜尋：</label>
						<input type="text" class='form-control' v-model="teamfilter">	
						<label for=""> (共@{{filtered2017list.length}}項結果)</label>
					</div>
				</div>

			</div>
			<div class="row row_list" v-for="cata in cata2017" v-if="getCataTeam2017(cata).length">
				
				<div class='col-sm-12 '>
					<br>
					<h3> @{{cata}} </h3>
				</div>
				
				<div class="catabox col-sm-12">
					<a class="col-sm-4 team" v-for="team in getCataTeam2017(cata)" :href="team.website.indexOf('http')!=-1?team.website:'http://'+team.website" target="_blank" :title="'前往'+team.name+'的網站'">
						<div class="tag">@{{team.tag}}</div>
						<div class="title">@{{team.name}}</div>
					</a>
				</div>
			</div>
		</div>
		<br>
		<br>

		<div class="container area_news area_news_white">
			<div class="row">
				<div class="col-sm-12">
					<h1>【有看見去年的你嗎？】<br class="visible-xs">2016雜學校回顧影片釋出！</h1>
					<br>
					<br>
				</div>
				<div class='col-sm-12'>
					<iframe src="https://www.youtube.com/embed/fBgHQJG8UOM" frameborder="0" allowfullscreen></iframe>
					<br><br>
					<h4>
						匯聚所有學校沒教<br><br>
						適合每一個你的不同學習路徑<br>
					</h4>
					<p>
						
						<br>
						雜學校，亞洲最大創新教育展（前身為2015不太乖教育節）。通過針對創新教育單位的邀展，結合論壇、實作工作坊與主題策展，打造全新教育策展體驗。去年的你，到現場「雜」了嗎？！快來看看影片找尋你的身影吧！（錯過了？沒關係！看完影片一樣讓你身歷其境～！）<br><br>
						因為有了每一個你的大力相挺，2017雜學校正籌備著一樁前所未見的擴校計畫！從包下”整個華山“，然後再包下“整座城市”，雜學校希望學習這件事像空氣一樣充滿在每個角落～更落實讓1-99歲的所有人，都「學你想學，學你想成為」！<br>	<br>
						打勾勾，<br>
						今年我們相約10月20-22日 華山1914文化創意產業園區 見！
					</p>
					<br>
					<a class="btn btn-default" href="/blog">看更多2016精采故事</a>
				</div>
			</div>		
		</div>
	</div>
	

</div>




@endsection

@section('blade_pass_variables')
<script>

</script>
@endsection