@extends('layout.tem')

@section('body')

<div class="col-lg-10 offset-lg-1"  style="padding-top: 10px;padding-bottom: 10px; align-content: center;">
	<div id="demo" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img src="image/fcb.jpg" alt="Los Angeles" width="1100" height="500">
				<div class="carousel-caption">
					<h3>Més que un club</h3>
					<p>Great team in world</p>
				</div>   
			</div>
			<div class="carousel-item">
				<img src="image/unicorn.jpg" alt="Chicago" width="1100" height="500">
				<div class="carousel-caption">
					<h3>Chicago</h3>
					<p>Thank you, Chicago!</p>
				</div>   
			</div>
			<div class="carousel-item">
				<img src="image/cam3.jpg" alt="New York" width="1100" height="500">
				<div class="carousel-caption">
					<h3>New York</h3>
					<p>We love the Big Apple!</p>
				</div>   
			</div>
		</div>
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	</div>
</div>
@endsection