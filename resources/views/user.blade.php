@extends('layout.tem')

@section('body')

<br>
<div class="row">
	<div class="col-lg-4 offset-lg-4">
	<h3>Scientist:</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-10 offset-lg-1 table">
		<table>
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile No</th>
			<th>Designation</th>
			<th>Department</th>
			<th>Group</th>
			<th>Accept</th>
			<th>Reject</th>
		</thead>
			@foreach($scientist as $s)
			<tr>
				<td>
					{{$s->name}}
				</td>
				<td>
					{{$s->email}}
				</td>
				<td>
					{{$s->mobile_no}}
				</td>
				<td>
					{{$s->designation}}
				</td>
				<td>
					{{$s->dnm}}
				</td>
				@for ($i = 0; $i < $cnt; $i++)	
   					@if($group[$i]->sid1==$s->sid)
   						<td>{{$group[$i]->nm}}</td>
   					@endif
				@endfor
				<td>
					<a href="AcceptReject?accept={{$s->sid}}"><i class="fa fa-check" aria-hidden="true"></i></a>
				</td>
				<td>
					<a href="/AcceptReject?reject={{$s->sid}}"><i class="fa fa-times" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@endsection