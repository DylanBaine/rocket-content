@extends('layouts.app')

@section('content')

<v-container>

	<header class="padded">
		<h1 class="bigger">Insights</h1>
	</header>

	<section>
		<header class="padded">
			<h1>Popular Posts</h1>
		</header>
		<section>
			@foreach($posts as $post)
				<div class="padded">
					<b>ID:</b> {{$post->id}} | <b>Type:</b> {{$post->type}} | <b>Title: </b> {{$post->title}} | <b>Times Visited:</b> {{$post->times_visited}}
				</div>
				<hr>
			@endforeach
		</section>
	</section>

</v-container>

@stop