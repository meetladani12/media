@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<div class="card">
			<div class="card-body" >
				<form method="POST" action="/addDepartmenttp">
				{{csrf_field()}}
					<div id="city" class="jumbotron">
						<div class="">
							<label><h6>Add Department</h6></label>
						</div>
						<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-building" aria-hidden="true"></i></span>
						</div>
				    	<input name="departmenttp" class="form-control" placeholder="Enter Department Type" type="text">
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
		<table>
		<thead>
			<th>District</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($dept as $d)
			<tr>
				<td>
					{{$d->type}}
				</td>
				<td>
					Edit
				</td>
				<td>
					delete
				</td>
			</tr>
			@endforeach
		</table>
	
	</div>
	
</div>




@endsection