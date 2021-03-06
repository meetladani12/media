@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Group updated successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Group added successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==3)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Group deleted successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==4)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Group already exist
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<div class="card">
			<div class="card-body" >
				<form method="POST" action="/addGroup">
				{{csrf_field()}}
					
					<div id="city" class="jumbotron">
						<div class="">
							<label><h6>Add Group</h6></label>
						</div>
						<div class="form-group input-group">
						   	<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-building"></i> </span>
							</div>
							<select name="grouptp" id="grouptp" class="form-control">
							<option selected=""> Select Group Type</option>
							@foreach($grouptp as $g)
								<option value="{{$g->id}}">{{$g->type}}</option>
							@endforeach
							</select>
						</div>
						<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-building"></i></span>
						</div>
				    	<input name="group" class="form-control" placeholder="Enter Department" type="text" required pattern="[a-zA-Z][a-zA-Z ]+" title="start with alphabets and include alphabets, space.">
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
		<table id='grouptbl' class="table table-striped table-bordered" style="width:100%">
		<thead>
			<th>Group</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($group as $g)
			<tr>
			<form method="POST" action="/group/update">
				{{csrf_field()}}
				<td>
					<label id="label{{$g->id}}"">{{$g->name}}</label>
					<input type="hidden" name="gid" value="{{$g->id}}">
					<input type="text" name="edit" id="text{{$g->id}}" style="display: none;">
				</td>
				<td>
					<button id="{{$g->id}}" class="btn btn-success"><i class="fas fa-edit"></i></button>
					<button style="display: none;" id="save{{$g->id}}" class="btn btn-primary"><i class="fas fa-save"></i></button>
				</td>
			</form>
				<td>
					<a href="/group/delete?gid={{$g->id}}"><button class="btn btn-danger" id="del{{$g->id}}"><i class="fas fa-trash-alt"></i></button></a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
<script>
$(document).ready(function() {
    $('#grouptbl').DataTable();
});
</script>

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