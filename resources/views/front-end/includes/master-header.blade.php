@foreach($header as $header)


	<div class="jumbotron col-md-12 flex-center" style="background-image: url(images/{{$header->image}}); background-size: cover;">
		<div class="header-text white-font" >
			<h1 style="text-shadow: 1px 4px 6px black";>{{$header->title}}</h1>
			<p style="text-shadow: 2px 2px 2px black";> {!! $header->body !!} </p>		
		</div>
	</div>

@endforeach