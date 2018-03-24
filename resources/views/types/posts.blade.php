@extends('layouts.front-end')

@section('content')
<v-container grid-list-xl>
	<header class="padded">
		<h1 class="text-xs-center capitalize bigger">{{$type->name}}</h1>
	</header>
	<v-layout row wrap>
		@foreach($posts as $post)
			<v-flex md3 xs12>
				@if($type->layout_style == 'Basic Card')
					<v-card>
						<v-card-text>
							<h2 class="text-xs-center capitalize padded">{{$post->title}}</h2>
							<div style="height: 300px; width: 100%; overflow: hidden;">
								{!!$post->content!!}
							</div>
						</v-card-text>
						<v-card-actions>
							<v-spacer></v-spacer>
							<v-btn color="success" href="{{url($type .'/'. $post->slug)}}">Go</v-btn>
						</v-card-actions>
					</v-card>
				@elseif($type->layout_style == 'Square with Preview')

					<post-preview
						href="{{url($type->slug .'/'. $post->slug)}}"
						headline="{{$post->title}}"
						overlay-color="{{$setting->header_color}}"
					>
						{!!$post->content!!}
					</post-preview>

				@endif
			</v-flex>
		@endforeach
	</v-layout>
</v-container>
@stop