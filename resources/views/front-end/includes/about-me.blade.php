@foreach($aboutMe as $aboutMe)

<div class="hidden-xs hidden-sm visible-md-12">
	<div class="flex-center full-height about-me-text col-md-6 ">
		<div>
			<h1 class="text-center">{{$aboutMe->title}}</h1>
			<hr style="width: 90%">
			<p class="text-center col-md-10 col-md-offset-1" {!! $aboutMe->body !!} </p>
		</div>		
	</div>

	<div class="full-height about-me-image col-md-6" style=" background-image: url(images/{{$aboutMe->image}}); background-repeat: no-repeat; background-size: cover;">
	
	</div>
</div>

<div class="visible-xs-12 hidden-md hidden-lg">

	<h1 class="text-center half-height flex-center">{{$aboutMe->title}}</h1>

	<div class="half-height flex-center about-me-image col-xs-10 col-xs-offset-1" style=" background-image: url(images/{{$aboutMe->image}}); background-repeat: no-repeat; background-size: cover; background-position: center;">
		
	
	</div>

	<div class="flex-center full-height about-me-text col-xs-12">
		<div>
			<p class="text-center col-md-10 col-md-offset-1" {!! $aboutMe->body !!} </p>
		</div>		
	</div>
</div>


	


@endforeach