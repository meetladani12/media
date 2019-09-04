@extends('layout.tem')

@section('body')
<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
				<form method="POST" enctype="multipart/form-data" action="/UploadVideo">
				{{csrf_field()}}
				<div class="form-group input-group">
				<h2>Video Details</h2>
		    	</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-play" aria-hidden="true"></i></span>
					</div>
				    <input name="title" class="form-control" placeholder="Video title" type="text">
				</div> 

				<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
						 </div>
				        <textarea name="description" class="form-control" placeholder="Video Description"></textarea>
				</div>

				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
					</div>
				    <input name="tags" class="form-control" placeholder="Video Tags	" type="text">
				</div> 				

				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fas fa-file-video"></i></span>
					</div>
				    <input name="file" class="form-control" placeholder="Video File" type="file">
				</div> 

				<div class="col-lg-6 offset-lg-3">            
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block">Upload</button>
			    </div>    
			    </div> 
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
@endsection