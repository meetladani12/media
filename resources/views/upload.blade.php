@extends('layout.tem')

@section('body')

<style>
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('image/LOAD2.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
    display: block;
    visibility: hidden;
}
</style>

<br>
<div class="row">
	<div class="col-lg-6 offset-lg-3">
		<div class="card">
			<div class="card-body" >
			<div  class="jumbotron">
				<form method="POST" enctype="multipart/form-data" id="upload_form" action="/UploadVideo">
				{{csrf_field()}}
				<div class="loader" id="gif"></div>
				<div class="form-group input-group">
				<h2>Video Details</h2>
		    	</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fab fa-youtube"></i></span>
					</div>
				    <input name="title" class="form-control" placeholder="Video title" type="text" required pattern="[a-zA-Z][a-zA-Z ]+" title="Title start with alphabet and include alphabets and space only">
				</div> 

				<div class="form-group input-group">
						<div class="input-group-prepend">
						    <span class="input-group-text"><i class="fa fa-info-circle" aria-hidden="true"></i></span>
						 </div>
				        <textarea name="description" class="form-control" placeholder="Video Description" required></textarea>
				</div>
				<label>Note: You can add more tag using "," exa:-education,technolodgy</label>
				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fa fa-tag" aria-hidden="true"></i></span>
					</div>
				    <input name="tags" class="form-control" placeholder="Video Tags	" type="text" required pattern="[a-zA-Z][a-zA-Z,]+" title="Tags start with alphabet and include alphabets and comma(,)  only">
				</div> 				

				<div class="form-group input-group">
					<div class="input-group-prepend">
					    <span class="input-group-text"><i class="fas fa-file-video"></i></span>
					</div>
				    <input name="file" accept="video/*"  class="form-control" placeholder="Video File" type="file" required> 
				</div> 

				<div class="col-lg-4 offset-lg-4">            
			    <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-block load"><i class="fas fa-upload"></i>Upload</button>
			    </div>    
			    </div> 
				</form>
			</div>
			</div>
		</div>
	</div>
</div>
<br>
<script type="text/javascript">
    $('#upload_form').submit(function() {
    	$('#gif').css('visibility', 'visible');
	});
</script>
@endsection