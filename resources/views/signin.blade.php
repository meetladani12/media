@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
			<form method="POST" action="/login">
				{{csrf_field()}}
			<div class="form-group input-group">
				<h1>login</h1>
		    </div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
				 </div>
		        <input name="email" class="form-control" placeholder="Enter Email-ID" type="text">
		    </div>
		    <div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
				 </div>
		        <input name="password" class="form-control" placeholder="Enter password" type="password">
		    </div>
		    <div class="col-lg-6 offset-lg-3">
		    <div class="form-group">
		        <button type="submit" class="btn btn-primary btn-block"> Sign IN </button>
		    </div>
		    </div>
			</form>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection