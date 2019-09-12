	@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<div class="card">
			<div class="card-body" >
				<form method="POST" action="/addVillage">
				{{csrf_field()}}
					
					<div id="city" class="jumbotron">
						<div class="">
							<label><h6>Add Village</h6></label>
						</div>
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
						    <span class="input-group-text"><i class="fa fa-building"></i></span>
						</div>
				    	<input name="village" class="form-control" placeholder="Enter Village" type="text">
				    	</div>
				    	<div class="form-group">
				        	<button type="submit" class="btn btn-primary btn-block" style="width: 100px"> ADD </button>
				    	</div>	
					</div>
				</form>
			</div>
	
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-4 offset-lg-4 table">
		<table style="width: 100%">
		<thead>
			<th>District</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($village as $v)
			<tr>
			<form method="POST" action="/village/update">
			{{csrf_field()}}
				<td>
					<label id="label{{$v->id}}"">{{$v->name}}</label>
					<input type="hidden" name="vid" value="{{$v->id}}">
					<input type="text" name="edit" id="text{{$v->id}}" style="display: none;width: 100%">
				</td>
				<td>
					<button id="{{$v->id}}" class="btn btn-success"><i class="fas fa-edit"></i></button>
					<button style="display: none;" id="save{{$v->id}}" class="btn btn-primary"><i class="fas fa-save"></i></button>
				</td>
			</form>
				<td>
					<a href="/village/delete?vid={{$v->id}}"><button class="btn btn-danger" id="del{{$v->id}}"><i class="fas fa-trash-alt"></i></button></a>
				</td>
			</tr>
			@endforeach
		</table>
	
	</div>
	
</div>



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

$(".btn-success").click(function(){
	var data = $(this).attr("id");
	var type = $("#label"+data).text();
	$(this).hide();
	$("#save"+data).show();
	$("#label"+data).hide();
	$("#del"+data).hide();
	$("#text"+data).show();
	$("#text"+data).val(type);
    return false;
});

$(".btn-danger").click(function(){
	if(confirm("You will lose all data such as farmers, talukas, villages, questions, answers Confirm?")){
    }
    else{
        return false;
    }
});

</script>
<br>


@endsection