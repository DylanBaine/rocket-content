@extends('back-end.layout.main-layout')

@section('content')

	<div class="containter-fluid">
		<div class="col">

			<div class="col-md-10 col-md-offset-1 well">

				<h2 class="text-center">Update Portfolio Item</h2>

				<hr>
				
				<form action="/portfolio/{{$portfolio->id}}" method="POST" enctype="multipart/form-data">

				{{csrf_field()}}

				{{method_field('PUT')}}


				<div class="form-group">
					<label for="title" class="col-md-6 col-md-offset-3">
						Title
						<input type="string" name="title" id="title" class="form-control" value="{{$portfolio->title}}">
					</label>
				</div>

				<div class="form-group">
					<label for="image" class="col-md-6 col-md-offset-3">
						Image 
						<input type="file" name="image" id="image" value="{{$portfolio->image}}">
					</label>
				</div>

				<div class="form-group">
					<label for="image" class="col-md-6 col-md-offset-3">
						Link 
						<input class="form-control" type="text" name="link" id="image" value="{{$portfolio->link}}">
					</label>
				</div>
				
				<div class="form-group">
					<label for="body" class="col-md-12">
						Body
						<textarea type="text" name="body" id="body" rows="10" class="form-control" >{{$portfolio->body}}</textarea>
					</label>
				</div>

				<input type="submit" class="btn btn-primary btn-block" value="SAVE">
					
				</form>

			</div>

		</div>
	</div>

@endsection