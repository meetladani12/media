@extends('layout.tem')

@section('body')
<br>
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
				    	<input name="dist" class="form-control" placeholder="Enter District" type="text">
				    	</div>
				    	<div class="col-lg-4 offset-lg-4">
				    	<div class="form-group">
				        	<button type="submit" class="btn btn-primary btn-block" style="width: 100px"> ADD </button>
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
				<td>
					{{$d->name}}
				</td>

				<td><a href="#" id="farmer" class="edit_modal" fdata="{{$d->id}}" data-toggle="modal" data-target="#smallModal{{$d->id}}"><i class="far fa-edit"></i></a></td>

				<div class="modal fade" id="smallModal{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">District</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<label id="dist">District:</label><br>
								<input class="edittext" did="{{$d->id}}" type="text" id="abc" name="distedit" value="{{$d->name}}"><br>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

				<td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

			</tr>
			@endforeach
		</table>
	
	</div>
	
</div>

<script>
$(".edit_modal").click(function(e){
	var dist_id = $(this).attr("fdata");
	console.log(e);
	

});
$(".edittext").keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		var distname = $(this).val();+
		var dist_id = $(this).attr("did");
		$.get('/ajax-distedit?did='+dist_id+'&dnm='+distname,function(data){
			location.reload();
		});

	}
});


</script>


@endsection