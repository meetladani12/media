@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Registration Successfully.
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
			<form method="POST" action="/Scientist/signup">
			{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Scientist Registration</h2>
		    	</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
					 </div>
			        <input name="fullname" class="form-control" placeholder="Full name" type="text" required>
			    </div>
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					 </div>
			        <input name="email" id="mail" class="form-control" placeholder="Email address" type="email" required>
			    </div>
			    <div class="form-group input-group"  id="ml" style="display: none;">
				    <label><font color="red">EmailID already exist</font></label>
				</div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
					</div>
			    	<input name="phone" class="form-control" placeholder="Phone number" type="text" required>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
					</div>
			    	<input name="mobile" id="MobileNo" class="form-control" placeholder="Mobile number" type="text" required>
			    </div>
			    <div class="form-group input-group"  id="mob" style="display: none;">
				    <label><font color="red">MobileNo. already exist</font></label>
				</div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
					</div>
			    	<input name="designation" class="form-control" placeholder="Designation" type="text" required>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-building" aria-hidden="true"></i></span>
					</div>
					<select class="form-control" name="dept" id="dept" required>
						<option selected=""> Select Department Type</option>
						@foreach($dept as $d)
							<option value="{{$d->id}}">{{$d->type}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-building" aria-hidden="true"></i></span>
					</div>
					<select name="department" id="department" class="form-control" required>
						<option selected=""> Select Department</option>
					</select>
				</div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
					</div>
			    	<input name="date" class="form-control" placeholder="Date of join" type="Date">
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
					</div>
					<select class="form-control" name="grouptype" id="grouptype" required>
						<option selected=""> Select Group</option>
						@foreach($group as $g)
							<option value="{{$g->id}}">{{$g->type}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
					</div>
					<select name="group" id="group" class="form-control" required>
						<option selected=""> Select sub group</option>
					</select>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
					 </div>
			        <textarea name="address" class="form-control" placeholder="Address" required></textarea>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input id="psd" name="password" class="form-control" placeholder="Enter password" type="password" required>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input id="repsd" class="form-control" placeholder="Re-Enter password" type="password" required>
			    </div>                      
			    <div class="col-lg-6 offset-lg-3">            
			    <div class="form-group">
			        <button id="ssubmit" type="submit" class="btn btn-primary btn-block"> Sign UP </button>
			    </div>    
			    </div>                                                                    
			</form>
			</div>
			</div>
		</div>
	</div>
</div>
<script>
$('#dept').on('change',function(e){
	console.log(e);
	var dept_id = e.target.value;

	$.get('/ajax-dept?dept='+dept_id,function(data){
		
		$('#department').empty();
		$('#department').append('<option value="">Select Department</option>');
		$.each(data,function(index,departObj){
			$('#department').append('<option value="'+departObj.id+'">'+departObj.name+'</option>');
		});

	});
});

$('#grouptype').on('change',function(e){
	console.log(e);
	var grouptp_id= e.target.value;

	$.get('/ajax-grouptype?grouptp='+grouptp_id,function(data){
		
		$('#group').empty();
		$('#group').append('<option value="">Select Group</option>');
		$.each(data,function(index,groupObj){
			$('#group').append('<option value="'+groupObj.id+'">'+groupObj.name+'</option>');
		});

	});
});

$("#ssubmit").click(function(){

	    	var password =$("#psd").val();
	    	var repassword =$("#repsd").val();
	    	if (password==repassword) {

	    	}
	    	else{
	    		alert("password and Re-Enter password not match");
	    		return false;
	    	}
	    	if (($('#mob').is(':visible')) || ($('#ml').is(':visible'))) {
				return false;
			}
			else{
		
			}
	    	
});

$("#mail").focusout(function(){
	var email=$('#mail').val();
	$.get('/ajax-email?mail='+email,function(data){
		if(data==0){
			$("#ml").hide();
		}
		else{
			$("#ml").show();
		}
	});
});

$("#MobileNo").focusout(function(){
	var mono=$('#MobileNo').val();
	$.get('/ajax-mobile?mobile='+mono,function(data){
		if(data==0){
			$("#mob").hide();
		}
		else{
			$("#mob").show();
		}
	});
});

</script>
</article>
@endsection