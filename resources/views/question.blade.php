@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Question added successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-info alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Scientist not available for this field.
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
				<form method="POST" enctype="multipart/form-data" action="/addQuestion">
				{{csrf_field()}}
					
					<div id="city" class="jumbotron">
						<div class="">
							<label><h4>Ask Question</h4></label>
						</div>
						<div class="form-group input-group">
					    	<div class="input-group-prepend">
							    <span class="input-group-text"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
							</div>
							<select class="form-control" name="grouptype" id="grouptype" required>
								<option selected=""> Select Group</option>
								@foreach($grouptp as $g)
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
						    <span class="input-group-text"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
						</div>
				    	<input name="question" class="form-control" placeholder="Enter Question" type="text" required pattern="[a-zA-Z][a-zA-Z.? ]+" title="Question start with alphabets and include alphabets, space, dot and qurstion mark.">
				    	</div>
				    	<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="far fa-image"></i></span>
						</div>
				    	<input name="file" accept="image/*" class="form-control" placeholder="Add Image" type="file" required>
				    	</div>	
				    	</div>
				    	
				    	<div class="form-group">
				        	<button type="submit" class="btn btn-primary btn-block" style="width: 100px"> SUBMIT </button>
				    	</div>	
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<br>

<script>
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



@endsection