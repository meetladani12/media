@extends('layout.tem')

@section('body')
<div class="row">
	<div class="col-lg-4 offset-lg-4">
		<table>
		<thead>
			<th>Select Start Date</th>
			<th>Select End Date</th>
		</thead>
		<tbody>
			<tr>
				<td>
					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
				    	<input name="StartDate" id="startDate" class="form-control" data-toggle="tooltip" title="Select date of join" type="Date" required>
			    	</div>
				</td>
				<td>
					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
				    	<input name="EndDate" id="endDate" class="form-control" data-toggle="tooltip" title="Select date of join" type="Date" required>
			    	</div>
				</td>
			</tr>
			<tr>
			<td colspan="2">
				<div class="col-lg-4 offset-lg-4">            
			    <div class="form-group">
			        <button id="ssubmit" type="submit" class="btn btn-primary btn-block">Report</button>
			    </div>    
			    </div> 
			</td>
			</tr>
		</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<table id="acttable" class="table table-striped table-bordered" style="width:100%"	>
			<thead>
				<th>Farmer</th>
				<th>Scientist</th>
				<th>Group</th>
				<th>Question</th>
				<th>Answer</th>
				<th>Date</th>
			</thead>
		</table>
		<label id='total'></label>
	</div>
</div>

<script>
$("#ssubmit").click(function(e){
	console.log(e);
	var StartDate =$("#startDate").val();
	var EndDate =$("#endDate").val();
	if (StartDate<=EndDate) {
		$("#acttable").html("");
		$("#acttable").last().append("<thead><th>Farmer Profile</th><th>Scientist Profile</th><th>Group</th><th>Question</th><th>Answer</th><th>Date</th></thead>");
		$.get('/ajax-reportq?start='+StartDate+'&end='+EndDate,function(data){
			$.each(data,function(index,videoObj){
				$.get('/ajax-ans?qid='+videoObj.qid,function(data2){
					if(data2==0){
						var dt=videoObj.dt;
						var day=dt.substring(8, 10);
						var mon=dt.substring(5, 7);
						var yr=dt.substring(0, 4);

						$("#acttable").last().append("<tr><td>"+videoObj.fnm+"</td><td>"+videoObj.snm+"</td><td>"+videoObj.gnm+"</td><td>"+videoObj.question+"</td><td style='color:red'>Answer yet not given</td><td>"+day+"-"+mon+"-"+yr+"</td></tr>");
					}
					else{
						var dt=videoObj.dt;
						var day=dt.substring(8, 10);
						var mon=dt.substring(5, 7);
						var yr=dt.substring(0, 4);
						$("#acttable").last().append("<tr><td>"+videoObj.fnm+"</td><td>"+videoObj.snm+"</td><td>"+videoObj.gnm+"</td><td>"+videoObj.question+"</td><td>"+data2+"</td><td>"+day+"-"+mon+"-"+yr+"</td></tr>");
					}
					});
			});
			$('#total').text('Total :'+data.length);
		});
	}
	else{
		$("#endDate").val('');
		$("#startDate").val('');
		alert("Strat Date must be smaller than End Date");
	} 	
});
</script>
<!-- <script>

$("#clk").click(function(){
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Simple Line Chart"
	},
	axisY:{
		includeZero: true
	},
	data: [{        
		type: "line",       
		dataPoints: [
			{ y: 450 },
			{ y: 414},
			{ y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
			{ y: 460 },
			{ y: 450 },
			{ y: 500 },
			{ y: 480 },
			{ y: 480 },
			{ y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
			{ y: 500 },
			{ y: 480 },
			{ y: 510 }
		]
	}]
});
chart.render();
});




</script> -->
@endsection