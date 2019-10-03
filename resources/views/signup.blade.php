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
				<form method="POST" action="/Farmer/signup">
				{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Farmer Registration</h2>
		    	</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
						 </div>
				        <input name="fullname" class="form-control" placeholder="Full name" type="text" required pattern="[a-zA-Z][a-zA-Z ]+" title="Name start with alphabet and include alphabets and space only">
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						 </div>
				        <input name="email" id="mail" class="form-control" placeholder="Email address" type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
				    </div>
				    <div class="form-group input-group"  id="ml" style="display: none;">
				    	<label><font color="red">EmailID already exist</font></label>
				    </div>

				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
						</div>
				    	<input name="mobile" id="MobileNo" maxlength="10" class="form-control" placeholder="Mobile number" type="text" required pattern="[6789][0-9]{9}" title="Mobile number start with 6-9 and remaing 9 digit with 0-9">
				    </div>
				    <div class="form-group input-group"  id="mob" style="display: none;">
				    	<label><font color="red">MobileNo. already exist</font></label>
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
						</select>
					</div>

					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<select name="taluka" id="taluka" class="form-control" required>
							<option selected=""> Select Taluka</option>
						</select>
					</div>

					<div class="form-group input-group">
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
				        <textarea name="address" minlength="10" class="form-control" placeholder="Address" required></textarea>
				    </div>
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" id="psd" name="password" placeholder="Enter password" type="password" required>
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" id="repsd" name="re-enter" placeholder="Re-Enter password" type="password" required>
				    </div> <!-- form-group// --> 
				    <div class="col-lg-6 offset-lg-3">                                     
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
$("#mail").focusout(function(){
	var email=$('#mail').val();
	$.get('/ajax-email?mail='+email,function(data){
		if(data==0){
			$("#ml").hide();
		}
		else{
			$("#ml").show();
			return false;
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
			return false;
		}
	});
});

$("#frmsubmint").click(function(){
	var password =$("#psd").val();
	var repassword =$("#repsd").val();
	if (password==repassword) {
		if ( ( $("#mob").css('display') == 'none' || $("#mob").css("visibility") == "hidden")&&( $("#ml").css('display') == 'none' || $("#ml").css("visibility") == "hidden")){
			
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