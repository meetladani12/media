@extends('layout.tem')

@section('body')
<br>
@isset($_GET['err'])
<div class="row">
	@if($_GET['err']==1)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Video deleted successfully!
	  		</div>
		</div>
	@elseif($_GET['err']==2)
		<div class='col-md-4 offset-lg-4'>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
	    		Question-Answer deleted successfully!
	  		</div>
		</div>
	@endif
</div>
@endisset
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<table>
		<thead>
			<th>Select Report</th>
			<th>Select Start Date</th>
			<th>Select End Date</th>
		</thead>
		<tbody>
			<tr>
				<td>
					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fas fa-chart-line"></i></span>
						</div>
						<select id="rpt" class="form-control" required>
							<option value="0" selected=""> Select Report</option>
							<option value="video">Video</option>
							<option value="q-a">Question-Answer</option>
							<option value="advisories">Advisories</option>
						</select>
					</div>
				</td>

				<td>
					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
				    	<input name="StartDate" id="startDate" class="form-control" data-toggle="tooltip" title="Select date of join" type="Date" max="" required>
			    	</div>
				</td>

				<td>
					<div class="form-group input-group">
				    	<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
						</div>
				    	<input name="EndDate" id="endDate" class="form-control" data-toggle="tooltip" title="Select date of join" type="Date" max="" required>
			    	</div>
				</td>
			</tr>
			<tr>
			<td colspan="3">
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
		<table id="acttable" class="table table-striped table-bordered" style="width:100%">
		</table>
		<label id='total'></label>
	</div>
</div>

<script>
$(window).bind("load", function() { 
	var tdate = new Date();
	var dd = tdate.getDate(); //yields day
   	var mm = tdate.getMonth(); //yields month
   	var yyyy = tdate.getFullYear(); //yields year
   	var currentDate= yyyy + "-" +( mm+1) + "-" + dd;
	$('#startDate').attr("max", currentDate);
	$('#endDate').attr("max", currentDate);			
});
</script>

<script>
$("#ssubmit").click(function(e){
	console.log(e);
	var StartDate =$("#startDate").val();
	var EndDate =$("#endDate").val();
	var report=$("#rpt").val();
	if (StartDate<=EndDate && report!=0) {
		$("#acttable").html("");
		if(report=='q-a'){
			$("#acttable").last().append("<thead><th>Farmer Profile</th><th>Scientist Profile</th><th>Group</th><th>Question</th><th>Answer</th><th>Date</th><th>Delete</th></thead>");
			$.get('/ajax-reportq?start='+StartDate+'&end='+EndDate,function(data){
				$.each(data,function(index,videoObj){
					$.get('/ajax-ans?qid='+videoObj.qid,function(data2){
						if(data2==0){
							var dt=videoObj.dt;
							var day=dt.substring(8, 10);
							var mon=dt.substring(5, 7);
							var yr=dt.substring(0, 4);

							$("#acttable").last().append("<tr><td>"+videoObj.fnm+"</td><td>"+videoObj.snm+"</td><td>"+videoObj.gnm+"</td><td>"+videoObj.question+"</td><td style='color:red'>Answer yet not given</td><td>"+day+"-"+mon+"-"+yr+"</td><td><a href='/q-a/delete?id="+videoObj.qid+"'><button type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td></tr>");
						}
						else{
							var dt=videoObj.dt;
							var day=dt.substring(8, 10);
							var mon=dt.substring(5, 7);
							var yr=dt.substring(0, 4);
							$("#acttable").last().append("<tr><td>"+videoObj.fnm+"</td><td>"+videoObj.snm+"</td><td>"+videoObj.gnm+"</td><td>"+videoObj.question+"</td><td>"+data2+"</td><td>"+day+"-"+mon+"-"+yr+"</td><td><a href='/q-a/delete?id="+videoObj.qid+"'><button type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td></tr>");
						}
					});
				});
				$('#total').text('Total :'+data.length);
			});
		}
		else if(report=='video'){
			$.get('/ajax-reportv?start='+StartDate+'&end='+EndDate,function(data){
				$("#acttable").last().append("<thead><th>Scientist Name</th><th>Group</th><th>Title</th><th>tags</th><th>Description</th><th>Play</th><th>Date</th><th>Delete</th></thead>");
				$.each(data,function(index,videoObj){
					var dt=videoObj.dt;
					var day=dt.substring(8, 10);
					var mon=dt.substring(5, 7);
					var yr=dt.substring(0, 4);
					$("#acttable").last().append("<tr><td>"+videoObj.snm+"</td><td>"+videoObj.gnm+"</td><td>"+videoObj.title+"</td><td>"+videoObj.tags+"</td><td>"+videoObj.description+"</td><td><a href='https://www.youtube.com/embed/"+videoObj.youtube_video_id+"' target='_blank'><button type='button' class='btn btn-info'><i class='fas fa-play'></i></button></a></td><td>"+day+"-"+mon+"-"+yr+"</td><td><a href='/video/delete?id="+videoObj.vid+"'><button type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td></tr>");
				});
				$('#total').text('Total :'+data.length);
			});
		}
		else if(report=='advisories'){
			$.get('/ajax-advisories?start='+StartDate+'&end='+EndDate,function(data){
				$("#acttable").last().append("<thead><th>Farmer Name</th><th>Village</th><th>messge</th><th>Date</th></thead>");
				$.each(data,function(index,adviseObj){
					var dt=adviseObj.dt;
					var day=dt.substring(8, 10);
					var mon=dt.substring(5, 7);
					var yr=dt.substring(0, 4);
					$("#acttable").last().append("<tr><td>"+adviseObj.fnm+"</td><td>"+adviseObj.vnm+"</td><td>"+adviseObj.message+"</td><td>"+day+"-"+mon+"-"+yr+"</td></tr>");
				});
				$('#total').text('Total :'+data.length);
			});
		}
	}
	else{
		$("#acttable").html("");
		$("#endDate").val('');
		$("#startDate").val('');
		$('#total').text('');
		alert("Strat Date must be smaller than End Date or Select Report");
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