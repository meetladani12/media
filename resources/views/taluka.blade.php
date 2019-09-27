@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Taluka updated successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2) 
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Taluka added successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==3)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Taluka deleted successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==4)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Taluka already exists
	   		</div>
		</div>
	@endif
</div>
@endisset

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
							<select name="district" id="district1" class="form-control">
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

<!-- <div class="row">
	<div class="col-lg-4 offset-lg-4">
		<table>
		<thead>
			<th>Select District</th>
		</thead>
		<tbody>
			<tr>
				<td>
					<select class="form-control" name="dist" id="district">
						<option selected=""> Select District</option>
						<option value="all">All</option>
						@foreach($dist as $d)
							<option value="{{$d->id}}">{{$d->name}}</option>
						@endforeach
					</select>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
</div> -->

<div class="row">
	<div id='frm' class="col-lg-4 offset-lg-4">
		<table id='taluka' class="table table-striped table-bordered" style="width:100%"	>
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
					<input type="hidden" name="did{{$t->id}}" value="{{$t->district_id}}">
					<label id="label{{$t->id}}">{{$t->name}}</label>
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
$(document).ready(function() {
    $('#taluka').DataTable();
});
</script>

<script>

// $('#district').on('change',function(e){
// 	console.log(e);
// 	var dist_id = e.target.value;
// 	$("#taluka").html("");
// 	$("#taluka").last().append("<thead><th>Village</th><th>Edit</th><th>Delete</th></thead>");
// 	$.get('/ajax-taluka?dist='+dist_id,function(data){
// 		$.each(data,function(index,talukaObj){
// 			var form=$("<form method='POST' id='"+talukaObj.id+"' action='/taluka/update'></form>");
// 			form.append('{{csrf_field()}}');
// 			form.append($("#taluka").last().append("<tr><td><input type='hidden' name='did"+talukaObj.id+"' value='"+talukaObj.district_id+"'><label id='label"+talukaObj.id+"'>"+talukaObj.name+"</label><input type='hidden' name='did' value='"+talukaObj.id+"'><input type='text' name='edit' id='text"+talukaObj.id+"' style='display: none;width: 100%'></td><td><button id='"+talukaObj.id+"' class='btn btn-success'><i class='fas fa-edit'></i></button><button style='display: none;' data="+talukaObj.id+" id='save"+talukaObj.id+"' class='btn btn-primary'><i class='fas fa-save'></i></button></td><td><a href='/taluka/delete?tid="+talukaObj.id+"'><button class='btn btn-danger' id='del"+talukaObj.id+"'><i class='fas fa-trash-alt'></i></button></a></td></tr>"));
// 			$("#frm").append(form);
// 		});
// 		$(".btn-success").click(function(e){
// 			console.log(e);
// 			var data = $(this).attr("id");
// 			var type = $("#label"+data).text();
// 			$(this).hide();
// 			$("#save"+data).show();
// 			$("#label"+data).hide();
// 			$("#del"+data).hide();
// 			$("#text"+data).show();
// 			$("#text"+data).val(type);
// 			return false;
// 		});

// 		$(".btn-primary").click(function(){
// 			var a=$(this).attr('data');
// 			alert($("#text"+a).val());
// 			alert(a);
// 			return false;
// 		});

// 		$(".btn-danger").click(function(){
// 			if(confirm("You will lose all data such as farmers, villages, questions, answers Confirm?")){
// 			}
// 			else{
// 				return false;
// 			}
// 		});
// 	});
	
// });


$(".btn-success").click(function(e){
	console.log(e);
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
	if(confirm("You will lose all data such as farmers, villages, questions, answers Confirm?")){
    }
    else{
        return false;
    }
});
</script>
@endsection