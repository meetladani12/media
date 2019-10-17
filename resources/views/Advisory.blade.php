@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Message send successfully!
	  		</div>
		</div>
	@endif
</div>
@endisset


<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
				<div class="jumbotron">
					<h3>Send WhatsApp Message</h3>
					<table width="100%">
					<thead>
						<th>Select District</th>
						<th>Select Taluka</th>
						<th>Select Village</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="form-group input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text"><i class="fa fa-building"></i></span>
									</div>
									<select name="district" id="district" class="form-control" required>
										<option selected=""> Select District</option>
										@foreach($dist as $d)
											<option value="{{$d->id}}">{{$d->name}}</option>
										@endforeach
									</select>
								</div>
							</td>

							<td>
								<div class="form-group input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text"><i class="fa fa-building"></i></i></span>
									</div>
							    	<select name="taluka" id="taluka" class="form-control" required>
										<option selected=""> Select Taluka</option>
									</select>
						    	</div>
							</td>

							<td>
								<div class="form-group input-group">
							    	<div class="input-group-prepend">
									    <span class="input-group-text"><i class="fa fa-building"></i></span>
									</div>
							    	<select name="village" id="village" class="form-control" required>
										<option selected=""> Select Village</option>
									</select>
						    	</div>
							</td>
						</tr>
						<br>
						<tr>
							<td colspan="3" align="center">
								<b>Select message Type:</b>
							</td>
						</tr>
						<tr>
							<td align="center">
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input radio" id="defaultUnchecked" name="defaultExampleRadios" value="video">
									<label class="custom-control-label" for="defaultUnchecked">Video</label>
								</div>
							</td>
							<td>
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input radio" id="mv" name="defaultExampleRadios" value="message&video">
									<label class="custom-control-label" for="mv">Message&Video</label>
								</div>
							</td>
							<td align="center">
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input radio" id="defaultchecked" name="defaultExampleRadios" value="message">
									<label class="custom-control-label" for="defaultchecked">Message</label>
								</div>
							</td>
						</tr>
						<tr id="video" style="display: none;">
							<td colspan="3">
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-building"></i></i></span>
									</div>
									<select name="taluka" id="wvideo" class="form-control" required>
										<option selected=""> Select Video</option>
										@foreach($video as $v)
											<option value="youtube.com/watch?v={{$v->youtube_video_id}}">{{$v->title}}</option>
										@endforeach
									</select>
								</div>
							</td>
						</tr>
						<tr id="message" style="display: none;">
							<td colspan="3">
								<div class="form-group input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-envelope"></i></span>
									</div>
									<textarea id='wmessage' minlength="10" class="form-control" placeholder="Message Body" required></textarea>
								</div>
							</td>
						</tr>
					</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<table id='sort' class="table table-striped table-bordered" style="width:100%">
							<thead>
								<th>Select</th>
								<th>Name</th>
								<th>Mobile No.</th>
							</thead>
							<tr>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="All">
										<label class="custom-control-label" for="All"></label>
									</div>
								</td>
								<td colspan="2">
									Select All
								</td>
							</tr>
						<form method="POST" action="/Advisory/send">
						{{csrf_field()}}
							<input type="hidden" name="msg" id="wmsg" value="">
							<input type="hidden" name="msg" id="wvideo" value="">
							@foreach($farmer as $f)
							<tr class="rw">
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" name="farmer{{$f->id}}" class="custom-control-input al" value="{{$f->mobile_no}}" id="{{$f->id}}">
										<label class="custom-control-label al" for="{{$f->id}}"></label>
									</div>
								</td>
								<td>
									{{$f->name}}
								</td>
								<td>
									{{$f->mobile_no}}
								</td>
							</tr>
							@endforeach
							<tr class="rb">
								<td colspan="3" align="center">
									<button id="abc" type="submit" class="btn btn-primary">Send</button>
								</td>
							</tr>
						</form>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$('#district').on('change',function(e){
	console.log(e);
	var dist_id = e.target.value;

	$.get('/ajax-taluka?dist='+dist_id,function(data){
		
		$('#taluka').empty();
		$('#village').empty();
		$('#taluka').append('<option value="">Select Taluka</option>');
		$('#village').append('<option value="">Select village</option>');
		$.each(data,function(index,talukaObj){
			$('#taluka').append('<option value="'+talukaObj.id+'">'+talukaObj.name+'</option>');
		});

	});
});


$('#taluka').on('change',function(e){
	console.log(e);
	var taluka_id = e.target.value;
	$.get('/ajax-village?taluka='+taluka_id,function(data){
		
		$('#village').empty();
		$('#village').append('<option value="">Select village</option>');
		$.each(data,function(index,villageObj){
			$('#village').append('<option value="'+villageObj.id+'">'+villageObj.name+'</option>');
		});

	});
});

$('.radio').on('change',function(e){
	console.log(e);
	var radio=$(this).val();
	if(radio=='video'){
		$("#message").hide();
		$("#video").show();
	}
	else if(radio=='message'){
		$("#video").hide();
		$("#message").show();
	}
	else if(radio=='message&video'){
		$("#video").show();
		$("#message").show();
	}
	
});

$('#wvideo').on('change',function(e){
	console.log(e);
	var videoid=$("#wvideo").val();
	$("#wvideo").val('');
	$("#wvideo").val(videoid);	
});

$("#wmessage").keyup(function(e){
	console.log(e);
	var msg=$('#wmessage').val();
	$("#wmsg").val(msg);
});

$('#village').on('change',function(e){
	var village=$('#village').val();
	$(".rw").html("");
	$(".rb").html("");
	$.get('/ajax-sort?village='+village,function(data){
		$.each(data,function(index,farmerObj){
			$("#sort").last().append("<tr class='rw'><td><div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input al' id='"+farmerObj.id+"'><label class='custom-control-label al' for='"+farmerObj.id+"'></label></div></td><td>"+farmerObj.name+"</td><td>"+farmerObj.mobile_no+"</td></tr>");
		});
		$("#sort").last().append("<tr class='rb'><td colspan='3' align='center'><button id='abc' type='submit' class='btn btn-primary'>Send</button></td></tr>");
	});
});
$(document).ready(function() {
	$(document).on('click','#abc',function(e){
		var msg=$("#wmsg").val();
		if(msg==''){
			alert("select Messge or Message can not null");
			return false;
		}
		else{
			alert(msg);
		}
		
	});
});
$(document).ready(function() {
	$(document).on('change','#All',function(e){
		if ($('#All').prop('checked')==true){ 
			$('.al').prop('checked', true);
	    }
	    else{
			$('.al').prop('checked', false);
		}
	});
});
</script>
@endsection