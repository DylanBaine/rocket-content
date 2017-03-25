<section id="portfolio-form" class="">
	<div class="col-md-8 text-center">
		<h1 class="text-center">Add a Portfolio Item</h1>
	</div>
	<div class="pull-right col-md-8 well">
		<form action="/portfolio" method="POST" enctype="multipart/form-data" class="col-md-12">

			{{csrf_field()}}

			<div class="form-group">
				<label for="portfolio-title" class=" col-md-6 col-md-offset-3">
					Title
					<input type="string" class="form-control" name="title" id="portfolio-title">
				</label>
			</div>
			
			<div class="form-group">
				<label for="portfolio-pic" class="col-md-offset-3 col-md-6">
					Portfolio Picture
					<input type="file" name="image" id="portfolio-pic">
				</label>
			</div>

			<div class="form-group">
				<label for="link" class="col-md-offset-3 col-md-6">
					Link 
					<input type="string" name="link" id="link" class="form-control" value="http://">
				</label>
			</div>

			<div class="form-group">
				<label for="portfolio-body" class="col-md-12">
					Body
					<textarea type="text" class="form-control" rows="10" name="body" id="portfolio-body"></textarea>
				</label>
			</div>

			<input type="submit" value="SAVE" class="btn btn-primary btn-block">
			
		</form>
	</div>
</section>
