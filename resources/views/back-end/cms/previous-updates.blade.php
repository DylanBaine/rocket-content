@extends('back-end.layout.main-layout')

@section('content')
<div class="container-fluid">
 
	<div class="col">

		<div class="col-md-12">
			<h1 class="text-center">Previous Changes</h1>
		</div>
		
		<div class="well col-md-12">
			<div class="col-md-12 text-center">
					<h3 class="text-center">Main Header's</h3>
					<hr class="col-md-12">
						@foreach($HomePageHeaders as $header)
						<div class="col-md-8">

							<div class="panel panel-info">
								
								<div class="jumbotron flex-center" style="background-image: url(images/{{$header->image}}); background-repeat: no-repeat; background-size: cover; background-position: center; height: 70vh; background-attachment: initial;">
								<div>
									<h2 class="text-center">{{$header->title}}</h2>
									
									<small class="text-center"> {!! $header->body !!} </small>		
								</div>
								</div>

							</div>							
								
						</div>	

						<div class="col-md-2 col-md-offset-1 flex-center" style="height: 70vh;">

							<div class="well clear-fix">

								<a href="/update-content" class="btn btn-success btn-block">Add New</a>
								<br>
								<a href="/main-header/{{$header->id}}/edit" class="btn btn-primary btn-block">Edit</a>
								<br>
								<form action="/main-header/{{$header->id}}" method="POST">
									{{csrf_field()}}

									{{method_field("DELETE")}}

									<input type="submit" value="Delete" class="btn btn-danger btn-block">
								</form>
								<br>
								<small>Created about: {{$header->created_at->diffForHumans() }}</small>
								<br>
								<small>Updated about: {{$header->updated_at->diffForHumans()}}</small>
								
							</div>



						</div>
						<hr class="col-md-12">
						@endforeach							
						
			</div>
		</div>

		

		<div class="col-md-12 text-center well">
				<h3 class="text-center">About Me's</h3>
				<hr>
					@foreach($AboutMes as $aboutMe)
						<div class="col-md-8">

							<div class="panel panel-info">
								
								<div class="panel-heading">
									<h4>{{$aboutMe->title}}</h4>
								</div>
								<div class="panel-body">
									<img src="images/{{ $aboutMe->image }}" alt="" style="height: 100px;">
								</div>
								<div class="panel-footer">
									<p>{!! $aboutMe->body !!}</p>
								</div>

							</div>							
								
						</div>	
					<div class="well col-md-2 col-md-offset-1">


						<a href="/update-content" class="btn btn-success btn-block">Add New</a>
						<br>
						<a href="/about-me/{{$aboutMe->id}}/edit" class="btn btn-primary btn-block">Edit</a>
						<br>
						<form action="/about-me/{{$aboutMe->id}}" method="POST">

							{{csrf_field()}}

							{{method_field('DELETE')}}

							<input type="submit" value="Delete" class="btn btn-danger btn-block">
						</form>

							<br>
							<small>Created about: {{$aboutMe->created_at->diffForHumans() }}</small>
							<br>
							<small>Updated about: {{$aboutMe->updated_at->diffForHumans()}}</small>

					</div>
					<hr class="col-md-12">
					@endforeach


		</div>

			<div class="col-md-12 text-center well">
				<h3 class="text-center">Skill Set's</h3>
				<hr>
					@foreach($SkillSets as $skillSet)
						<div class="col-md-8">

							<div class="col-md-6 full-height about-me-image flex-center" style="background-image: url(images/{{$skillSet->image}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
									<h1 class="text-center">{{$skillSet->title}}</h1>		
							</div>

							<div class="col-md-6 flex-center full-height about-me-text">
								<div>

									<hr style="width: 90%">
									<p class="text-center col-md-10 col-md-offset-1"> {!! $skillSet->body !!} </p>
									<hr style="width: 90%">

								</div>
									
							</div>						
								
						</div>	
					<div class="well col-md-2 col-md-offset-1">


						<a href="/update-content" class="btn btn-success btn-block">Add New</a>
						<br>
						<a href="/skill-set/{{$skillSet->id}}/edit" class="btn btn-primary btn-block">Edit</a>
						<br>
						<form action="/skill-set/{{$skillSet->id}}" method="POST">

							{{csrf_field()}}

							{{method_field('DELETE')}}

							<input type="submit" value="Delete" class="btn btn-danger btn-block">
						</form>

							<br>
							<small>Created about: {{$skillSet->created_at->diffForHumans() }}</small>
							<br>
							<small>Updated about: {{$skillSet->updated_at->diffForHumans()}}</small>

					</div>
					<hr class="col-md-12">
					@endforeach


			</div>


			<div class="col-md-12 text-center well">
				<h3 class="text-center">Portfolio Items</h3>
				<hr>
					@foreach($portfolio as $portfolio)
						<div class="col-md-8">

							<div class="col-md-12 text-center" style="padding: 10vh 0;">
									<h1 class="text-center">{{$portfolio->title}}</h1>		
							</div>

							<div class="col-md-12">
								<img src="portfolios/images/{{$portfolio->image}}" alt=""
								style="width: 100%;">
							</div>

							<div class="text-center" style="padding:20px 0;">

									<p> {!! $portfolio->body !!} </p>
									
							</div>						
								
						</div>	
					<div class="well col-md-2 col-md-offset-1">


						<a href="/home" class="btn btn-success btn-block">Add New</a>
						<br>
						<a href="/portfoliw/{{$portfolio->id}}/edit" class="btn btn-primary btn-block">Edit</a>
						<br>
						<form action="/portfolio/{{$portfolio->id}}" method="POST">

							{{csrf_field()}}

							{{method_field('DELETE')}}

							<input type="submit" value="Delete" class="btn btn-danger btn-block">
						</form>

							<br>
							<small>Created about: {{$portfolio->created_at->diffForHumans() }}</small>
							<br>
							<small>Updated about: {{$portfolio->updated_at->diffForHumans()}}</small>

					</div>
					<hr class="col-md-12">
					@endforeach


			</div>

		
	</div>

</div>

	

@endsection
