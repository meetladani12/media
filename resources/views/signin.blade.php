@extends('layout.tem')

@section('body')
<style type="text/css">
.btn-circle {
  width: 45px;
  height: 45px;
  line-height: 45px;
  text-align: center;
  padding: 0;
  border-radius: 50%;
}

.btn-circle i {
  position: relative;
  top: -1px;
}

.btn-circle-sm {
  width: 35px;
  height: 35px;
  line-height: 35px;
  font-size: 0.9rem;
}

.btn-circle-lg {
  width: 55px;
  height: 55px;
  line-height: 55px;
  font-size: 1.1rem;
}

.btn-circle-xl {
  width: 70px;
  height: 70px;
  line-height: 70px;
  font-size: 1.3rem;
}
</style>

<br>
@if ($errors->any())
	<div class='col-md-4 offset-lg-4'>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
	    	Invalid Captcha
	  	</div>
	</div>
@endif
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
		        <input name="email" class="form-control" placeholder="Enter Email-ID" type="text" required>
		    </div>
		    <div class="form-group input-group">
				<div class="input-group-prepend">
				    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
				 </div>
		        <input name="password" class="form-control" placeholder="Enter password" type="password" required>
		    </div>

		    <div class="col-lg-8 offset-lg-2">
		    <div class="form-group input-group">
		        <input name="captcha" class="form-control" placeholder="Enter captcha" type="text" required>
			    <div class="form-group captcha">
			        <span>{!! captcha_img() !!}</span>
	               <button type="button" id="refresh" class="btn btn-success btn-circle btn-circle-sm m-1"><i class="fas fa-sync"></i></button>
			    </div>
		    </div>
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
<script type="text/javascript">
$('#refresh').click(function(){
	var a=$(this).val();
	$.get('/refreshcaptcha',function(data){
        $(".captcha span").html(data.captcha);
    });
});
</script>
@endsection