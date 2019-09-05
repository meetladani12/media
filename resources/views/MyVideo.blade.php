@extends('layout.tem')

@section('body')
<br>

<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
				<div class="form-group input-group">
				<h2>My Videos</h2>
		    	</div>
				<div class="col-lg-12 table">
				<table style="width: 100%"  id="videotable">
				<tbody id="last">
				@foreach($video as $v)
					<tr>
						<td>
							<iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$v->youtube_video_id}}">
							</iframe>
						</td>
					</tr>
				@endforeach
				</tbody>
				</table>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
<script>

</script>
@endsection