@extends('layouts.app')

@section('content')
<v-container grid-list-xl>
	<header class="padded">
		<h1 class="text-xs-center capitalize bigger">{{$type}}</h1>
	</header>
	<v-layout row wrap>
		@foreach($posts as $post)
			<v-flex md3>
				<v-card>
					<v-card-text>
						<h2 class="text-xs-center capitalize padded">{{$post->title}}</h2>
						<div style="height: 300px; width: 100%; overflow: hidden;">
							{!!$post->content!!}
						</div>
					</v-card-text>
					<v-card-actions>
						<v-spacer></v-spacer>
						<v-btn color="success" href="{{url($post->slug)}}">Go</v-btn>
					</v-card-actions>
				</v-card>
			</v-flex>
		@endforeach
	</v-layout>
</v-container>
@stop