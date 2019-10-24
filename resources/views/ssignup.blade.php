@extends('layout.tem')

@section('body')
<style>
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('image/LOAD.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
    display: block;
    visibility: hidden;
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
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Registration Successfully.
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="loader" id="gif"></div>
<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
			<form method="POST" id="scientist_form" action="/Scientist/signup">
			{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Scientist Registration</h2>
		    	</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
					 </div>
			        <input name="fullname" id="name" class="form-control" placeholder="Full name" type="text">&nbsp

			        <div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					 </div>
			        <input name="email" id="mail" class="form-control" placeholder="Email address" type="email">
			    </div>
			    <div class="row">
				    <div class="col-lg-6">
						<span id="fnm" style="display: none;"><font color="red">Name start with alphabet and include alphabets and space only and atleast 4 character required</font></span>
					</div>
					<div class="col-lg-6">
						<span id="ml" style="display: none;"><font color="red">EmailID already exist</font></span>
					</div>
				</div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
					</div>
			    	<input name="phone" id="PhoneNo" class="form-control" placeholder="Phone number" maxlength="10" type="tel">&nbsp

			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
					</div>
			    	<input name="mobile" id="MobileNo" class="form-control" placeholder="Mobile number" type="text" required pattern="[6789][0-9]{9}" maxlength="10" title="Mobile number start with 6-9 and remaing 9 digit with 0-9">
			    </div>
			    <div class="row">
				    <div class="col-lg-6">
			    		<span id="phn" style="display: none;"><font color="red">PhoneNo. already exist</font></span>
			    	</div>
			    	<div class="col-lg-6">
			    		<span id="mob" style="display: none;"><font color="red">MobileNo. already exist</font></span>
			    	</div>
			    </div>


			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
					</div>
			    	<select name="designation" class="form-control" required>
						<option selected=""> Select Designation</option>
						<option value="assistant prof.">assistant prof.</option>
						<option value="associate prof.">associate prof.</option>
						<option value="prof.">prof.</option>
					</select>&nbsp
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
					</div>
			    	<input name="date" class="form-control" data-toggle="tooltip" title="Select date of join" type="Date">
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
					</select>&nbsp

					<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-building" aria-hidden="true"></i></span>
					</div>
					<select name="department" id="department" class="form-control" required>
						<option selected=""> Select Department</option>
					</select>
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
					</select>&nbsp

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
			        <textarea name="address" id="addres" class="form-control" placeholder="Address" ></textarea>
			    </div>
			    <div class="row">
				    <div class="col-lg-12">
			    		<span id="add" style="display: none;"><font color="red">Atleast 10 character required</font></span>
			    	</div>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input id="psd" name="password" class="form-control" placeholder="Enter password" type="password" required>&nbsp

			        <div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input id="repsd" class="form-control" placeholder="Re-Enter password" type="password" required>
			    </div>          

			    <div class="col-lg-6 offset-lg-3">
			    <div class="form-group input-group">
			    	<input name="captcha" class="form-control" placeholder="Enter captcha" type="text" required>
			    	<div class="form-group captcha">
			    		<span>{!! captcha_img() !!}</span>
			    		<i class="fas fa-sync" id="refresh"></i>
			    	</div>
			    </div>
			    </div> 

			    <div class="col-lg-2 offset-lg-5">            
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

<script type="text/javascript">
    $('#scientist_form').submit(function() {
    	$('#gif').css('visibility', 'visible');
	});
</script>

<script type="text/javascript">
$('#refresh').click(function(){
	var a=$(this).val();
	$.get('/refreshcaptcha',function(data){
        $(".captcha span").html(data.captcha);
    });
});
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
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

$("#name").focusout(function(){
	var fnm=$('#name').val();
	var pattern=/^([a-zA-Z][a-zA-Z ]{3,19})$/;
	if(!fnm.match(pattern)){
		$("#fnm").show();
	}
	else{
		$('#fnm').css('display', 'none');
		return false;
	}
});

$("#mail").focusout(function(){
	var email=$('#mail').val();
	var pattern=/^([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4})$/;
	if(!email.match(pattern)){
		$("#ml").html('<font color="red">Email is not in correct format</font>');
		$("#ml").show();
	}
	else{
		$.get('/ajax-email?mail='+email,function(data){
			if(data==0){
				$('#ml').css('display', 'none');
			}
			else{
				$("#ml").html('<font color="red">EmailID already exist</font>');
				$("#ml").show();
				return false;
			}
		});
	}
});

$("#MobileNo").focusout(function(){
	var mono=$('#MobileNo').val();
	var pattern=/^([6789][0-9]{9})$/;
	if(!mono.match(pattern)){
		$("#mob").html('<font color="red">number start with 6 to 9 and length is 10</font>');
		$("#mob").show();
	}
	else{
		$.get('/ajax-mobile?mobile='+mono,function(data){
			
			if(data==0){
				$("#mob").css('display', 'none');	
			}
			else{
				$("#mob").html('<font color="red">MobileNo. already exist</font>');
				$("#mob").show();
				return false;
			}
		});
	}
});

$("#PhoneNo").focusout(function(){
	
	var mono=$('#PhoneNo').val();
	var pattern=/^([6789][0-9]{9})$/;
	if(!mono.match(pattern)){
		$("#phn").html('<font color="red">number start with 6 to 9 and length is 10</font>');
		$("#phn").show();
	}
	else{
		$.get('/ajax-phone?mobile='+mono,function(data){
			if(data==0){
				$('#phn').css('display', 'none');
			}
			else{
				$("#phn").html('<font color="red">PhoneNo. already exist</font>');
				$("#phn").show();
				return false;
			}
		});
	}
});

$("#addres").focusout(function(){
	var address=$('#addres').val();
	if(address.length<10){
		$("#add").show();
	}
	else{
		$('#add').css('display', 'none');
		return false;
	}
});

$("#ssubmit").click(function(){

	var password =$("#psd").val();
	var repassword =$("#repsd").val();
	if (password==repassword) {
		if ( ( $("#mob").css('display') == 'none' ) && ( $("#ml").css('display') == 'none') && ( $("#phn").css('display') == 'none') && ( $("#fnm").css('display') == 'none') && ( $("#add").css('display') == 'none')){
			
		}
		else{
			return false;
		}
	}
	else{
		alert("password and Re-Enter password not match");
		return false;
	}
	
});


</script>
</article>
@endsection