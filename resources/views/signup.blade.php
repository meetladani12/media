@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
				<form method="POST" action="/farmer">
				{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Farmer Registration</h2>
		    	</div>
					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
						 </div>
				        <input name="fullname" class="form-control" placeholder="Full name" type="text">
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						 </div>
				        <input name="email" class="form-control" placeholder="Email address" type="email">
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-mobile" aria-hidden="true"></i></span>
						</div>
				    	<input name="mobile" class="form-control" placeholder="Mobile number" type="text">
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<select name="district" id="district" class="form-control">
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
						<select name="taluka" id="taluka" class="form-control">
							<option selected=""> Select Taluka</option>
						</select>
					</div>

					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
						</div>
						<select name="village" id="village" class="form-control">
							<option selected=""> Select Village</option>
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
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" name="password" placeholder="Enter password" type="password">
				    </div> <!-- form-group// -->
				    <div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
						</div>
				        <input class="form-control" name="re-enter" placeholder="Re-Enter password" type="password">
				    </div> <!-- form-group// --> 
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
</script>
</article>
@endsection