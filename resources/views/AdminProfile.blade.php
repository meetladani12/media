@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Profile updated Successfully.
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
				<form method="POST" action="/SAprofile/{{$_GET['id']}}">
				{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Update Profile</h2>
		    	</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
						 </div>
				        <input name="fullname" class="form-control" placeholder="Full name" type="text" value="{{$admin[0]->name}}" required>
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						 </div>
				        <input name="email" id="mail" class="form-control" placeholder="Email address" value="{{$admin[0]->email}}" type="email" required>
				    </div>

				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
						</div>
				    	<input name="mobile" id="MobileNo" class="form-control" placeholder="Mobile number" value="{{$admin[0]->mobile_no}}" type="text" required>
				    </div>

				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" id="psd" name="password" placeholder="Enter password" value="{{$admin[0]->password}}" type="password" required>
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" id="repsd" name="re-enter" placeholder="Re-Enter password" type="password" required>
				    </div> <!-- form-group// --> 
				    <div class="col-lg-4 offset-lg-4">                                     
				    <div class="form-group">
				        <button type="submit" id="frmsubmint" class="btn btn-primary btn-block">Update</button>
				    </div> 
				    </div>                                                                
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
<script>

$("#frmsubmint").click(function(){
	var password =$("#psd").val();
	var repassword =$("#repsd").val();
	if (password==repassword) {

	}
	else{
		alert("password and Re-Enter password not match");
		return false;
	}	
});

</script>
</article>
@endsection