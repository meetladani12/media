@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<div class="card">
			<div class="card-body" >
				<form method="POST" action="/addTaluka">
				{{csrf_field()}}
					
					<div id="city" class="jumbotron">
						<div class="">
							<label><h6>Add Taluka</h6></label>
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
						    <span class="input-group-text"><i class="fa fa-building"></i></span>
						</div>
				    	<input name="taluka" class="form-control" placeholder="Enter Taluka" type="text">
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
<br>

<div class="row">
	<div class="col-lg-4 offset-lg-4 table">
		<table width="100%">
		<thead>
			<th>Village</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($taluka as $t)
			<tr>
			<form method="POST" action="/taluka/update">
			{{csrf_field()}}
				<td>
					<label id="label{{$t->id}}"">{{$t->name}}</label>
					<input type="hidden" name="did" value="{{$t->id}}">
					<input type="text" name="edit" id="text{{$t->id}}" style="display: none;width: 100%">
				</td>
				<td>
					<button id="{{$t->id}}" class="btn btn-success"><i class="fas fa-edit"></i></button>
					<button style="display: none;" id="save{{$t->id}}" class="btn btn-primary"><i class="fas fa-save"></i></button>
				</td>
			</form>
				<td>
					<a href="/taluka/delete?tid={{$t->id}}"><button class="btn btn-danger" id="del{{$t->id}}"><i class="fas fa-trash-alt"></i></button></a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

<script>
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
@endsection