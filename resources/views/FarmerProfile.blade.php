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
				<form method="POST" action="/farmer/{{$_GET['id']}}">
				{{csrf_field()}}
				{{ method_field('PUT') }}
				<div class="form-group input-group">
				<h2>Update Profile</h2>
		    	</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
						 </div>
				        <input name="fullname" class="form-control" placeholder="Full name" type="text" value="{{$farmer[0]->name}}" required>
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						 </div>
				        <input name="email" id="mail" class="form-control" placeholder="Email address" value="{{$farmer[0]->email}}" type="email" required>
				    </div>

				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
						</div>
				    	<input name="mobile" id="MobileNo" class="form-control" placeholder="Mobile number" maxlength="10" value="{{$farmer[0]->mobile_no}}" type="text" required>
				    </div>

				    <div class="form-group input-group">
				    	<div id="Did" class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<input type="hidden" id="d_id" name="d__id" value="{{$districtid[0]->district_id}}">
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
						<input type="hidden" id="t_id" name="t__id" value="{{$talukaid[0]->taluka_id}}">
						<select name="taluka" id="taluka" class="form-control" required>
							<option selected=""> Select Taluka</option>
							@foreach($talu as $t)
								<option value="{{$t->id}}">{{$t->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<input type="hidden" id="v_id" name="v__id" value="{{$farmer[0]->village_id}}">
						<select name="village" id="village" class="form-control" required>
							<option selected=""> Select Village</option>
							@foreach($villa as $v)
								<option value="{{$v->id}}">{{$v->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
						 </div>
				        <textarea name="address" class="form-control" placeholder="Address" required>{{$farmer[0]->address}}</textarea>
				    </div>
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" id="psd" name="password" placeholder="Enter password" value="{{$farmer[0]->password}}" type="password" required>
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
$(window).bind("load", function() { 
	var d_id=$('#d_id').val();
	var t_id=$('#t_id').val();
	var v_id=$('#v_id').val();

	$('#district').val(d_id).attr("selected", "selected");
	$('#taluka').val(t_id).attr("selected", "selected");
	$('#village').val(v_id).attr("selected", "selected");			
});
	
</script>
</article>
@endsection