<section>


	<div class="col-md-10 col-md-offset-1 well">
	<h2 class="text-center">About Me</h2>
	<hr>
		<form action="{{url ( 'about-me' ) }}" method="post" enctype="multipart/form-data" class="col-md-12">

			{{csrf_field()}}

			<div class="form-group">
				<label for="about-me-title" class=" col-md-6 col-md-offset-3">
					Title
					<input type="string" class="form-control" name="title" id="about-me-title">
				</label>
			</div>
			
			<div class="form-group">
				<label for="profile-pic" class="col-md-offset-3 col-md-6">
					Profile Picture
					<input type="file" name="image" id="profile-pic">
				</label>
			</div>

			<div class="form-group">
				<label for="about-me-body" class="col-md-12">
					Body
					<textarea type="text" class="form-control" rows="10" name="body" id="about-me-body"></textarea>
				</label>
			</div>

			<input type="submit" value="SAVE" class="btn btn-primary btn-block">
			
		</form>
	</div>	

</section>


