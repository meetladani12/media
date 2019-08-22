@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
			<div class="jumbotron">
			
				<div class="">
					<label><h4>View Answer</h4></label>
				</div>
				<div class="col-lg-12 table">
				<table style="width: 100%">
				<thead>
					<th>Question</th>
					<th>Answer</th>
				</thead>
					@foreach($question as $q)
					<tr>
						<td>
							{{$q->question}}
						</td>
						<td>
							<button class="btn btn-outline-info meet" name="abc" data="{{$q->id}}" id="{{$q->id}}" ><i class="fa fa-eye" aria-hidden="true"></i></button>
						</td>
					</tr>
					@if($q->flag=='0')
						<tr>
							<td colspan="2" style="color:red">
							<div class="form-group input-group" id="answer{{$q->id}}" style="display: none;">
							Answer yet not given.
							</div>
							</td>
						</tr>
					@else
						<tr>
							<td colspan="3" style="color: #4f5dc2;font-size: 25px;">
							<div class="form-group input-group" id="answer{{$q->id}}" style="display: none;">
							@for($i=0;$i<$cnt;$i++)
								@if($answer[$i]->qid==$q->id)
									Answer : {{$answer[$i]->answer}}								
								@endif
							@endfor
							</div>
							</td>
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
	    	if (cls=='fa fa-eye'){
	    		$("#"+dataId+" i").attr('class', 'fa fa-times');
	    	}
	    	else{
	   			$("#"+dataId+" i").attr('class', 'fa fa-eye');
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

</script> 
@endsection