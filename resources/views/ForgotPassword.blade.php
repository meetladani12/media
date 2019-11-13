@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Check Your Email
	  		</div>
		</div>
	@else
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Email-ID not found
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
			<div class="">
				<label><h2>Forgot Password</h2></label>
			</div>
			<form method="POST" action="/ForgotPassword/SendMail">
				{{csrf_field()}}
				<div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
				 </div>
		        <input name="email" class="form-control" placeholder="Enter Email-ID" type="text" required>
		   		</div>
		   		<div class="col-lg-6 offset-lg-3">
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block">Enter</button>
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