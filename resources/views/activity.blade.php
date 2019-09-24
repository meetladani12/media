@extends('layout.tem')

@section('body')
<div class="row">
	<div class="col-lg-4 offset-lg-4 table">
		<div id="chartContainer" style="height: 300px; width: 100%;"></div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 offset-lg-4 table">
		<button type="submit" id="clk" class="btn btn-primary btn-block">chart</button>
	</div>
</div>
<script>

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




</script>
@endsection