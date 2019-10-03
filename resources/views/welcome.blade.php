@extends('layout.tem')

@section('body')
 <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
  }
  </style>
<div class="col-lg-10 offset-lg-1"  style="padding-top: 10px;padding-bottom: 10px; align-content: center;">
	<div id="demo" class="carousel slide" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#demo" data-slide-to="0" class="active"></li>
			<li data-target="#demo" data-slide-to="1"></li>
			<li data-target="#demo" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img src="image/farmer.jpg" alt="Los Angeles" width="1100" height="500">
			</div>
			<div class="carousel-item">
				<img src="image/farmlp1.jpg" alt="Chicago" width="1100" height="500">
			</div>
			<div class="carousel-item">
				<img src="image/farmcam.png" alt="New York" width="1100" height="500">
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