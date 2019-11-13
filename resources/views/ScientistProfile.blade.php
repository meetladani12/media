@extends('layout.tem')

@section('body')
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
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
			<form method="POST" action="/scientist/{{$_GET['id']}}">
			{{csrf_field()}}
			{{ method_field('PUT') }}
				<div class="form-group input-group">
					<h2>Scientist Profile</h2>
		    	</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
					 </div>
			        <input name="fullname" value="{{$scientist[0]->name}}" class="form-control" placeholder="Full name" type="text" required>&nbsp

			        <div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					 </div>
			        <input name="email" value="{{$scientist[0]->email}}" id="mail" class="form-control" placeholder="Email address" type="email" required>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
					</div>
			    	<input name="phone" value="{{$scientist[0]->phone_no}}" class="form-control" placeholder="Phone number" type="text" required>&nbsp

			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
					</div>
			    	<input name="mobile" value="{{$scientist[0]->mobile_no}}" id="MobileNo" class="form-control" maxlength="10" placeholder="Mobile number" type="text" required>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
					</div>
			    	<select name="designation" class="form-control" required>
						<option selected=""> Select Designation</option>
						<option value="Principal">Principal</option>
						<option value="Associate Professor">Associate Professor</option>
						<option value="Assistant Professor">Assistant Professor</option>
						<option value="Registrar">Registrar</option>
						<option value="Assistant Director of Research">Assistant Director of Research</option>
						<option value="Director of Research & Dean PG Studies">Director of Research & Dean PG Studies</option>
						<option value="Assistant Director of Extension Education">Assistant Director of Extension Education</option>
						<option value="Associate Research Scientist">Associate Research Scientist</option>
						<option value="Assistant Research Scientist">Assistant Research Scientist</option>
						<option value="Research Scientist">Research Scientist</option>
						<option value="Extension Educationist">Extension Educationist</option>
						<option value="Associate Extension Educationist">Associate Extension Educationist</option>
						<option value="Assistant Extension Educationist">Assistant Extension Educationist</option>
						<option value="Scientist">Scientist</option>
						<option value="Other">Other</option>
					</select>&nbsp

					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
					</div>
			    	<input name="date" value="{{$scientist[0]->date_of_join}}" class="form-control" placeholder="Date of join" type="Date">
			    </div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-building" aria-hidden="true"></i></span>
					</div>
					<input type="hidden" id="d_id" name="d__id" value="{{$departid[0]->department_type_id}}">
					<select class="form-control" name="dept" id="dept" required>
						<option selected=""> Select Department Type</option>
						@foreach($dept as $d)
							<option value="{{$d->id}}">{{$d->type}}</option>
						@endforeach
					</select>&nbsp

			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-building" aria-hidden="true"></i></span>
					</div>
					<input type="hidden" id="de_id" name="de__id" value="{{$scientist[0]->department_id}}">
					<select name="department" id="department" class="form-control" required>
						<option selected=""> Select Department</option>
						@foreach($department as $d)
							<option value="{{$d->id}}">{{$d->name}}</option>
						@endforeach
					</select>
				</div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
					</div>
					<input type="hidden" id="g_id" name="g__id" value="{{$groupid[0]->group_type_id}}">
					<select class="form-control" name="grouptype" id="grouptype" required>
						<option selected=""> Select Group</option>
						@foreach($grouptp as $g)
							<option value="{{$g->id}}">{{$g->type}}</option>
						@endforeach
					</select>&nbsp

					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
					</div>
					<input type="hidden" id="gr_id" name="gr__id" value="{{$scientist[0]->group_id}}">
					<select name="group" id="group" class="form-control" required>
						<option selected=""> Select sub group</option>
						@foreach($group as $g)
							<option value="{{$g->id}}">{{$g->name}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
					 </div>
			        <textarea name="address" class="form-control" placeholder="Address" required>{{$scientist[0]->address}}</textarea>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input id="psd" value="{{$scientist[0]->password}}" name="password" class="form-control" placeholder="Enter password" type="password" required>&nbsp

			        <div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input id="repsd" class="form-control" placeholder="Re-Enter password" type="password" required>
			    </div>
   
			    <div class="col-lg-4 offset-lg-4">            
			    <div class="form-group">
			        <button id="ssubmit" type="submit" class="btn btn-primary btn-block">Update</button>
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

$(window).bind("load", function() { 
	var d_id=$('#d_id').val();
	var de_id=$('#de_id').val();
	var g_id=$('#g_id').val();
	var gr_id=$('#gr_id').val();

	$('#dept').val(d_id).attr("selected", "selected");
	$('#department').val(de_id).attr("selected", "selected");
	$('#grouptype').val(g_id).attr("selected", "selected");	
	$('#group').val(gr_id).attr("selected", "selected");			
});

</script>
</article>
@endsection