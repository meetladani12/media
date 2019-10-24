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
				<form method="POST" id="farmer_form" action="/Farmer/signup">
				{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Farmer Registration</h2>
		    	</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fas fa-user"></i></span>
						 </div>
				        <input name="fullname" class="form-control" id="name" placeholder="Full name" type="text">
				    </div> <!-- form-group// -->
				    <div class="row">
				    	<div class="col-lg-12">
				    		<span id="fnm" style="display: none;"><font color="red">Name start with alphabet and include alphabets and space only and atleast 4 character required</font></span>
				    	</div>
					</div>
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						 </div>
				        <input name="email" id="mail" class="form-control" placeholder="Email address" type="email">&nbsp

				        <div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
						</div>
				    	<input name="mobile" id="MobileNo" maxlength="10" class="form-control" placeholder="Mobile number" type="text" required pattern="[6789][0-9]{9}" title="Mobile number start with 6-9 and remaing 9 digit with 0-9">
				    </div>
				    <div class="row">
				    	<div class="col-lg-6">
				    		<span id="ml" style="display: none;"><font color="red">EmailID already exist</font></span>
				    	</div>
				    	<div class="col-lg-6">
				    		<span id="mob" style="display: none;"><font color="red">MobileNo. already exist</font></span>
				    	</div>
				    </div>

				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<select name="district" id="district" class="form-control" required>
							<option selected=""> Select District</option>
							@foreach($dist as $d)
								<option value="{{$d->id}}">{{$d->name}}</option>
							@endforeach
						</select>&nbsp

						<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<select name="taluka" id="taluka" class="form-control" required>
							<option selected=""> Select Taluka</option>
						</select>&nbsp

						<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<select name="village" id="village" class="form-control" required>
							<option selected=""> Select Village</option>
						</select>

					</div>

					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
						 </div>
				        <textarea name="address" id="addres" class="form-control" placeholder="Address" required></textarea>
				    </div>
				    <div class="row">
				    	<div class="col-lg-12">
				    		<span id="add" style="display: none;"><font color="red">Atleast 10 character required</font></span>
				    	</div>
				    </div>


				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" id="psd" name="password" placeholder="Enter password" type="password" required>
				        &nbsp
				        <div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" id="repsd" name="re-enter" placeholder="Re-Enter password" type="password" required>
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
				        <button type="submit" id="frmsubmint" class="btn btn-primary btn-block"> Sign UP </button>
				    </div> 
				    </div>                                                                
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
<br>

<script type="text/javascript">
    $('#farmer_form').submit(function() {
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
$('#district').on('change',function(e){
	console.log(e);
	var dist_id = e.target.value;

	$.get('/ajax-taluka?dist='+dist_id,function(data){
		
		$('#taluka').empty();
		$('#village').empty();
		$('#taluka').append('<option value="">Select Taluka</option>');
		$('#village').append('<option value="">Select village</option>');
		$.each(data,function(index,talukaObj){
			$('#taluka').append('<option value="'+talukaObj.id+'">'+talukaObj.name+'</option>');
		});

	});
});
$('#taluka').on('change',function(e){
	console.log(e);
	var taluka_id = e.target.value;
	$.get('/ajax-village?taluka='+taluka_id,function(data){
		
		$('#village').empty();
		$('#village').append('<option value="">Select village</option>');
		$.each(data,function(index,villageObj){
			$('#village').append('<option value="'+villageObj.id+'">'+villageObj.name+'</option>');
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
		alert('');
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
				$("#mob").hide();
			}
			else{
				$("#mob").html('<font color="red">MobileNo. already exist</font>');
				$("#mob").show();
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

$("#frmsubmint").click(function(){
	var password =$("#psd").val();
	var repassword =$("#repsd").val();
	if (password==repassword) {
		if (( $("#mob").css('display') == 'none') && ( $("#ml").css('display') == 'none') && ( $("#fnm").css('display') == 'none') && ( $("#add").css('display') == 'none')){
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