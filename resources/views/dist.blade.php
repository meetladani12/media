@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		District updated successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		District added successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==3)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		District deleted successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==4)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		District already exist
	  		</div>
		</div>
	@endif
</div>
@endisset

<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<div class="card">
			<div class="card-body" >
				<form method="POST" action="/addDist">
				{{csrf_field()}}
					<div id="city" class="jumbotron">
						<div class="">
							<label><h6>Add District</h6></label>
						</div>
						<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-building"></i></span>
						</div>
				    	<input name="dist" id='addDist' class="form-control" placeholder="Enter District" type="text" required>
				    	</div>
				    	<div class="col-lg-4 offset-lg-4">
				    	<div class="form-group">
				        	<button type="submit" id='add' class="btn btn-primary btn-block" style="width: 100px"> ADD </button>
				    	</div>	
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
		<table style="width: 100%">
		<thead>
			<th>District</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($dist as $d)
			<tr>
			<form method="POST" action="/district/update">
			{{csrf_field()}}
				<td>
					<label id="label{{$d->id}}"">{{$d->name}}</label>
					<input type="hidden" name="did" value="{{$d->id}}">
					<input type="text" name="edit" id="text{{$d->id}}" style="display: none;width: 100%">
				</td>
				<td>
					<button id="{{$d->id}}" class="btn btn-success"><i class="fas fa-edit"></i></button>
					<button style="display: none;" id="save{{$d->id}}" data='{{$d->id}}' class="btn btn-primary edit"><i class="fas fa-save"></i></button>
				</td>
			</form>
				<td>
					<a href="/district/delete?did={{$d->id}}"><button class="btn btn-danger" id="del{{$d->id}}"><i class="fas fa-trash-alt"></i></button></a>
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