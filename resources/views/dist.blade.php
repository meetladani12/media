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
			@foreach($dist as $d)
			<tr>
				<td>
					{{$d->name}}
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