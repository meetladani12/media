@extends('layout.tem')

@section('body')
<br>
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
							<select name="district" id="district" class="form-control">
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

<div class="row">
	<div class="col-lg-4 offset-lg-4 table">
		<table>
		<thead>
			<th>Taluka</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($taluka as $t)
			<tr>
				<td>
					{{$t->name}}
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