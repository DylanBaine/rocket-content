<div class="col-md-10 col-md-offset-1 well">

	<h2 class="text-center">Home Page Header</h2>

	<hr>

	<form method="POST" action="{{ url( 'main-header' ) }}" class="col-md-12" enctype="multipart/form-data">

	{{csrf_field()}}


	<div class="form-group">
		<label for="title" class="col-md-6 col-md-offset-3">
			Title
			<input type="string" name="title" id="title" class="form-control">
		</label>
	</div>

	<div class="form-group">
		<label for="image" class="col-md-6 col-md-offset-3">
			Image <input type="file" name="image" id="image">
		</label>
	</div>
	
	<div class="form-group">
		<label for="body" class="col-md-12">
			Body
			<textarea type="text" name="body" id="body" rows="10" class="form-control"></textarea>
		</label>
	</div>

	<input type="submit" class="btn btn-primary btn-block" value="SAVE">
		
	</form>
	
</div>

