@extends('layout.tem')

@section('body')

<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Answer added successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Answer updated successfully!
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="row">
	<div class="offset-3 col-6 offset-3">
		<div class="card">
			<div class="card-body" >
			<div class="jumbotron">
			
				<div class="">
					<label><h2>View Question</h2></label>
				</div>
				<div class="col-lg-12 table">
				<table style="width: 100%">
				<thead>
					<th>Farmer Profile</th>
					<th>Question</th>
					<th>View Image</th>
					<th>Reply</th>
				</thead>
					@foreach($question as $q)
					<tr>
						<td>
							<a href="#" id="farmer" class="farmer_modal" fdata="{{$q->farmer_id}}" data-toggle="modal" data-target="#smallModal"><i id="User" class="fa fa-user" aria-hidden="true"></i></a>

							<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
							  <div class="modal-dialog modal-sm">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h4 class="modal-title" id="myModalLabel">Farmer</h4>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <label id="fname"></label><br>
							        <label id="femail"></label><br>
							        <label id="fmobile"></label><br>
							        <label id="fvillage"></label>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>

						</td>
						<td>
							{{$q->question}}
						</td>
						<td>
							<img src="image/{{$q->path}}" style="width:50px;height:50px;cursor:zoom-in" onclick="document.getElementById('modal{{$q->id}}').style.display='block'">

						  <div id="modal{{$q->id}}" class="w3-modal" onclick="this.style.display='none'">
						    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
						    <div class="w3-modal-content w3-animate-zoom">
						      <img src="image/{{$q->path}}" style="width:100%;height: 500px">
						    </div>
						  </div>
						</td>
						<td>
							<button class="btn btn-info meet" name="abc" data="{{$q->id}}" id="{{$q->id}}" ><i class="fa fa-reply" aria-hidden="true"></i></button>
						</td>	
					</tr>
					@if($q->flag=='0')
						<tr>
						<form method="POST" action="/addAnswer">
						{{csrf_field()}}
						<input type="hidden" name="qid" value="{{$q->id}}">
							<td colspan="3">
							<div class="form-group input-group" id="answer{{$q->id}}" style="display: none;">
							<input id="answer" name="answer" class="form-control" placeholder="Give Answer" type="text" required>
							<div class="input-group-prepend">
								<button id="1" type="submit"><span class="input-group-text"><i class="fa fa-paper-plane" aria-hidden="true"></i></span></button>
							</div>
							</div>
							</td>
						</form>	
						</tr>
					@else
						<tr>
						<form method="POST" id="myform" action="/UpdateAnswer">	
						{{csrf_field()}}
						<input type="hidden" name="qid" value="{{$q->id}}">
							<td colspan="3">
							<div class="form-group input-group" id="answer{{$q->id}}" style="display: none;">
						@for($i=0;$i<$cnt;$i++)
							@if($answer[$i]->qid==$q->id)
							<input type="hidden" name="aid" value="{{$answer[$i]->aid}}">
							<input id="ans{{$answer[$i]->aid}}" name="ans" class="form-control" value="{{$answer[$i]->answer}}" disabled="true" placeholder="Give Answer" type="text">
							<div class="input-group-prepend">
								<button class="editButton" data2="{{$answer[$i]->aid}}" id="edit{{$answer[$i]->aid}}"><span class="input-group-text"><i class="fa fa-edit" aria-hidden="true"></i></span></button>

								<button class="submitButton" data2="{{$answer[$i]->aid}}" type="submit" id="edit1{{$answer[$i]->aid}}" style="display: none;"><span class="input-group-text"><i class="fa fa-paper-plane" aria-hidden="true"></i></span></button>

							</div>
							@endif
						@endfor
							
							</div>
							</td>
						</form>	
						</tr>
					@endif
					@endforeach
				</table>
				</div>
			
			</div>
			</div>
		</div>
	</div>
</div>
<br>

<script>
$(document).ready(function(){ 

    $(".meet").click(function(){

	    	var input = "answer";
	    	var dataId = $(this).attr("data");
	    	var div = input.concat(dataId);
	    	var cls = $("#"+dataId+" i").attr('class');
	    	if (cls=='fa fa-reply'){
	    		$("#"+dataId+" i").attr('class', 'fa fa-times');
	    	}
	    	else{
	   			$("#"+dataId+" i").attr('class', 'fa fa-reply');
	   		}
	    	$("#"+div).toggle();
	    	
  	});
  	
});	
  	
$(".editButton").click(function(){
	var data = $(this).attr("data2");
	$(this).siblings().show();
	$(this).hide();
    $('#ans'+data).removeAttr('disabled');
   // $("#edit1"+data+" i").attr('class', 'fa fa-edit');
    return false;
});

$(".farmer_modal").click(function(e){
	var farmer_id = $(this).attr("fdata");
	console.log(e);
	$.get('/ajax-farmer?farmer_id='+farmer_id,function(data){
		$.each(data,function(index,farmerObj){
			$('#fname').text('Name :'+farmerObj.name);
			$('#femail').text('Email :'+farmerObj.email);
			$('#fmobile').text('Mobile No :'+farmerObj.mono);
			$('#fvillage').text('Village :'+farmerObj.vnm);
		});
	});
});



</script> 
@endsection