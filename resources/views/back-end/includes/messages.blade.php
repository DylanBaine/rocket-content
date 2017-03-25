
<div class="col-md-4 messages-container">
	<h1 class="text-center">Messages</h1>
	@foreach($messages as $message)

	<div class="well clearfix">
		<div class="col-md-6">
			<h4 class="text-center">Subject:</h4>
			<p class="text-center">{{$message->subject}}</p>
		</div>
		<div class="col-md-6">
			<h4 class="text-center"> From: </h4>
			<p class="text-center">{{$message->name}} | <small> {{$message->email}}</small></p>			
		</div>

		<div class="col-md-12">
			<h4 class="text-center">Message: </h4>
			<hr class="col-md-12">
			<p class="text-center">{{$message->message}}</p>			
		</div>

		<form action="message/{{$message->id}}" method="POST">
			{{csrf_field()}}
			{{method_field('delete')}}
			<input type="submit" class="btn btn-danger btn-block" value="Delete">
		</form>

	</div>

	@endforeach
</div>

