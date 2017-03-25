@extends('back-end.layout.main-layout')

@section('content')

	<div class="containter-fluid">
		<div class="col">

			<div class="col-md-10 col-md-offset-1 well">

				<h2 class="text-center">Skill Set</h2>

				<hr>
				
				<form action="/skill-set/{{$skillSet->id}}" method="POST" enctype="multipart/form-data">

				{{csrf_field()}}

				{{method_field('PUT')}}


				<div class="form-group">
					<label for="title" class="col-md-6 col-md-offset-3">
						Title
						<input type="string" name="title" id="title" class="form-control" value="{{$skillSet->title}}">
					</label>
				</div>

				<div class="form-group">
					<label for="image" class="col-md-6 col-md-offset-3">
						Image <input type="file" name="image" id="image" value="{{$skillSet->image}}">
					</label>
				</div>
				
				<div class="form-group">
					<label for="body" class="col-md-12">
						Body
						<textarea type="text" name="body" id="body" rows="10" class="form-control" >{{$skillSet->body}}</textarea>
					</label>
				</div>

				<input type="submit" class="btn btn-primary btn-block" value="SAVE">
					
				</form>

			</div>

		</div>
	</div>

@endsection