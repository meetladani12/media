@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Department updated successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Department added successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==3)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Department deleted successfully!
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
				<form method="POST" action="/addDepartment">
				{{csrf_field()}}
					
					<div id="city" class="jumbotron">
						<div class="">
							<label><h6>Add Department</h6></label>
						</div>
						<div class="form-group input-group">
						   	<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-building"></i> </span>
							</div>
							<select name="departmenttp" id="departmenttp" class="form-control">
							<option selected=""> Select Department Type</option>
							@foreach($dept as $d)
								<option value="{{$d->id}}">{{$d->type}}</option>
							@endforeach
							</select>
						</div>
						<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-building"></i></span>
						</div>
				    	<input name="department" class="form-control" placeholder="Enter Department" type="text">
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
	<div class="col-lg-6 offset-lg-3 table">
		<table width="100%">
		<thead>
			<th>Department</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($department as $d)
			<tr>
			<form method="POST" action="/department/update">
			{{csrf_field()}}
				<td>
					<label id="label{{$d->id}}"">{{$d->name}}</label>
					<input type="hidden" name="did" value="{{$d->id}}">
					<input type="text" name="edit" id="text{{$d->id}}" style="display: none;width: 100%">
				</td>
				<td>
					<button id="{{$d->id}}" class="btn btn-success"><i class="fas fa-edit"></i></button>
					<button style="display: none;" id="save{{$d->id}}" class="btn btn-primary"><i class="fas fa-save"></i></button>
				</td>
			</form>
				<td>
					<a href="/department/delete?did={{$d->id}}"><button class="btn btn-danger" id="del{{$d->id}}"><i class="fas fa-trash-alt"></i></button></a>
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
	if(confirm("You will lose all data such as scientist, questions, answers Confirm?")){
    }
    else{
        return false;
    }
});
</script>

@endsection