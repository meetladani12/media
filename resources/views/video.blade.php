@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
				<div class="col-lg-12 table">
				<table style="width: 100%">
				@foreach($video as $v)
					<tr>
						<td>
							<iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$v->youtube_video_id}}">
							</iframe>
						</td>
					</tr>
				@endforeach
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection