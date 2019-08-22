@extends('layout.tem')

@section('body')
<div class="row">

	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
			<form method="POST" action="/scientist">
			{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Scientist Registration</h2>
		    	</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
					 </div>
			        <input name="fullname" class="form-control" placeholder="Full name" type="text">
			    </div>
			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
					 </div>
			        <input name="email" class="form-control" placeholder="Email address" type="email">
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
					</div>
			    	<input name="phone" class="form-control" placeholder="Phone number" type="text">
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
					</div>
			    	<input name="mobile" class="form-control" placeholder="Mobile number" type="text">
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
					</div>
			    	<input name="designation" class="form-control" placeholder="Designation" type="text">
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-building" aria-hidden="true"></i></span>
					</div>
					<select class="form-control" name="dept" id="dept">
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
					<select name="department" id="department" class="form-control">
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
					<select class="form-control" name="grouptype" id="grouptype">
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
					<select name="group" id="group" class="form-control">
						<option selected=""> Select sub group</option>
					</select>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
					 </div>
			        <textarea name="address" class="form-control" placeholder="Address"></textarea>
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input name="password" class="form-control" placeholder="Enter password" type="password">
			    </div>

			    <div class="form-group input-group">
			    	<div class="input-group-prepend">
					    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
					</div>
			        <input class="form-control" placeholder="Re-Enter password" type="password">
			    </div>                      
			    <div class="col-lg-6 offset-lg-3">            
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block"> Sign UP </button>
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
</script>
</article>
@endsection