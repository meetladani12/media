@extends('layout.tem')

@section('body')
<br>
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
		<table>
		<thead>
			<th>Department</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($department as $d)
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