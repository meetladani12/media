@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Invalid Username or Password
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Logout Successfully
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
			<form method="POST" action="/login">
				{{csrf_field()}}
			<div class="form-group input-group">
				<h1>login</h1>
		    </div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
				 </div>
		        <input name="email" class="form-control" placeholder="Enter Email-ID" type="text" required>
		    </div>
		    <div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
				 </div>
		        <input name="password" class="form-control" placeholder="Enter password" type="password" required>
		    </div>
		    <div class="col-lg-6 offset-lg-3">
		    <div class="form-group">
		        <button type="submit" class="btn btn-primary btn-block"> Login </button>
		    </div>
		    </div>
		    <div class="col-lg-6 offset-lg-3">
		        <a href="/ForgotPassword">Forgot password</a>
		    </div>
		    
			</form>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection