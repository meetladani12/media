@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
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
				    	<input name="group" class="form-control" placeholder="Enter Department" type="text">
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
			<th>Group</th>
			<th>Edit</th>
			<th>Delete</th>
		</thead>
			@foreach($group as $g)
			<tr>
				<td>
					{{$g->name}}
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