@extends('layout.tem')

@section('body')
<style type="text/css">
body {margin:2rem;}

.modal-dialog {
      max-width: 800px;
      margin: 30px auto;
  }



.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}
</style>
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
							<label>{{$v->title}}</label>
						</td>
						<td>
							<label>{{$v->description}}</label>
						</td>
						<td>
							<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/{{$v->youtube_video_id}}" data-target="#myModal">
							Play
							</button>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>        
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<br>
<script>
$(document).ready(function() {
var $videoSrc;  
$('.video-btn').click(function() {
    $videoSrc = $(this).data( "src" );
});
console.log($videoSrc);
$('#myModal').on('shown.bs.modal', function (e) {
$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
})
$('#myModal').on('hide.bs.modal', function (e) {
    $("#video").attr('src',$videoSrc); 
}) 
});
</script>

<script>
$('#grouptype').on('change',function(e){
	console.log(e);
	var grouptp_id= e.target.value;
	if (grouptp_id=="all") {
		$("#videotable").html("");
		$.get('/ajax-video',function(data){
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