@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Group Type updated successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Group Type added successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==3)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Group Type deleted successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==4)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		GroupType already exist
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<div class="card">
			<div class="card-body" >
				<form method="POST" action="/addGrouptp">
				{{csrf_field()}}
					<div id="city" class="jumbotron">
						<div class="">
							<label><h6>Add Group Type</h6></label>
						</div>
						<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-building" aria-hidden="true"></i></span>
						</div>
				    	<input name="grouptp" class="form-control" placeholder="Enter Group Type" type="text" required>
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
		<table id='grouptptbl' class="table table-striped table-bordered" style="width:100%"	>
		<thead>
			<th>Group Type</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($grouptp as $g)
			<tr>
			<form method="POST" action="/groupType/update">
				{{csrf_field()}}
				<td>
					<label id="label{{$g->id}}"">{{$g->type}}</label>
					<input type="hidden" name="gid" value="{{$g->id}}">
					<input type="text" name="edit" id="text{{$g->id}}" style="display: none;" required>
				</td>
				<td>
					<button id="{{$g->id}}" class="btn btn-success"><i class="fas fa-edit"></i></button>
					<button style="display: none;" id="save{{$g->id}}" class="btn btn-primary"><i class="fas fa-save"></i></button>
				</td>
			</form>
				<td>
					<a href="/groupType/delete?gid={{$g->id}}"><button class="btn btn-danger" id="del{{$g->id}}"><i class="fas fa-trash-alt"></i></button></a>
				</td>
			
			</tr>
			@endforeach
		</table>
	</div>
</div>

<script>
$(document).ready(function() {
    $('#grouptptbl').DataTable();
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
	if(confirm("You will lose all data such as scientist, groups, questions, answers Confirm?")){
    }
    else{
        return false;
    }
});

</script>


@endsection