@extends('layout.tem')

@section('body')
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
				<div class="jumbotron">
					<table>
					<thead>
						<th>Select District</th>
						<th>Select Taluka</th>
						<th>Select Village</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="form-group input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text"><i class="fa fa-building"></i></span>
									</div>
									<select name="district" id="district" class="form-control" required>
										<option selected=""> Select District</option>
										@foreach($dist as $d)
											<option value="{{$d->id}}">{{$d->name}}</option>
										@endforeach
									</select>
								</div>
							</td>

							<td>
								<div class="form-group input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text"><i class="fa fa-building"></i></i></span>
									</div>
							    	<select name="taluka" id="taluka" class="form-control" required>
										<option selected=""> Select Taluka</option>
									</select>
						    	</div>
							</td>

							<td>
								<div class="form-group input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text"><i class="fa fa-building"></i></span>
									</div>
							    	<select name="village" id="village" class="form-control" required>
										<option selected=""> Select Village</option>
									</select>
						    	</div>
							</td>
						</tr>
					</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-lg-8 offset-lg-2">
						<table id='sort' class="table table-striped table-bordered" style="width:100%">
							<thead>
								<th>Select</th>
								<th>Name</th>
								<th>Mobile No.</th>
							</thead>
							<tr>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="All">
										<label class="custom-control-label" for="All"></label>
									</div>
								</td>
								<td colspan="2">
									Select All
								</td>
							</tr>
							@foreach($farmer as $f)
							<tr id='{{$f->village_id}}'>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input al" id="{{$f->id}}">
										<label class="custom-control-label al" for="{{$f->id}}"></label>
									</div>
								</td>
								<td>
									{{$f->name}}
								</td>
								<td>
									{{$f->mobile_no}}
								</td>
							</tr>
							@endforeach
						</table>
					</div>
				</div>
			</div>
		</div>
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

$('#village').on('change',function(e){
	var village=$('#village').val();
	$("#sort").html("");
	$.get('/ajax-sort?village='+village,function(data){
		$("#sort").last().append("<thead><th>Select</th><th>Name</th><th>Mobile No</th></thead>");
		$("#sort").last().append("<tr><td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='All'><label class='custom-control-label' for='All'></label></div></td><td colspan='2'>Select All</td></tr>");
		$.each(data,function(index,farmerObj){
			$("#sort").last().append("<tr><td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input al' id='"+farmerObj.id+"'><label class='custom-control-label al' for='"+farmerObj.id+"'></label></div></td><td>"+farmerObj.name+"</td><td>"+farmerObj.mobile_no+"</td></tr>");
		});
	});
});

$('#All').on('change',function(e){
	if ($('#All').prop('checked')==true){ 
		$('.al').prop('checked', true);
    }
    else{
		$('.al').prop('checked', false);
	}
});
</script>
@endsection