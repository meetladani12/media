@extends('layout.tem')

@section('body')

<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<table>
		<thead>
			<th>Search Video</th>
		</thead>
		<tbody>
			<tr>
				<td colspan="3">
					<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"> <i class="fa fa-search"></i> </span>
						 </div>
				        <input name="searchv" class="form-control" id="search" placeholder="Search Video" type="text" required>
			    	</div>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<table>
		<thead>
			<th>Select Group Type:</th>
			<th>Select Group:</th>
		</thead>
		<tbody>
			<tr>
				<td>
					<select class="form-control" name="grouptype" id="grouptype">
						<option selected=""> Select Group</option>
						<option value="all">All</option>
						@foreach($group as $g)
							<option value="{{$g->id}}">{{$g->type}}</option>
						@endforeach
					</select>
				</td>
				<td>
					<select name="group" id="group" class="form-control">
						<option selected=""> Select Group</option>
					</select>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
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


<script>
$('#grouptype').on('change',function(e){
	console.log(e);
	var grouptp_id= e.target.value;
	if (grouptp_id=="all") {
		$("#videotable").html("");
		$.get('/ajax-video2',function(data){
			$.each(data,function(index,videoObj){
				$("#videotable").last().append("<tr><td><iframe width='100%'' height='315' src='https://www.youtube.com/embed/"+videoObj.youtube_video_id+"'></td></tr>");
			});
		});
	}
	else{
		$.get('/ajax-grouptype?grouptp='+grouptp_id,function(data){
			$("#videotable").html("");
			$('#group').empty();
			$('#group').append('<option value="">Select Group</option>');
			$.each(data,function(index,groupObj){
				$('#group').append('<option value="'+groupObj.id+'">'+groupObj.name+'</option>');
			});
		});
	}

});

$('#group').on('change',function(e){
	console.log(e);
	var group_id= e.target.value;

	$.get('/ajax-group?group='+group_id,function(data){
		$.each(data,function(index,videoObj){
			$("#videotable").last().append("<tr><td><iframe width='100%'' height='315' src='https://www.youtube.com/embed/"+videoObj.youtube_video_id+"'></td></tr>");
		});
	});
});

$("#search").keyup(function(e){
	var keyup=$("#search").val();
		if ((e.which <= 90 && e.which >= 48) || e.which==8 || e.which==46)
	    {
	        $("#videotable").html("");
	        $.get('/ajax-video?keyword='+keyup,function(data){
				$.each(data,function(index,videoObj){
					$("#videotable").last().append("<tr><td><iframe width='100%'' height='315' src='https://www.youtube.com/embed/"+videoObj.youtube_video_id+"'></td></tr>");
				});
			});
	    }
});
</script>
@endsection