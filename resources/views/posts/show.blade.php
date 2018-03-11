@extends('layouts.front-end')

@section('content')
	@if($post)
		<v-container grid-list-xl fluid style="padding: 0;" class="post-{{$post->type}}">
				{!!$post->content!!}
		</v-container>
	@else
		<div class="padded">
			<h1 class="bigger">No content. Are you site admin? <a href="/login">Login Here</a></h1>
		</div>
	@endif
	@if(Auth::user())
		<div class="pos-fixed bottom left" style="z-index: 999;">
			<v-btn href="{{url('/posts/'.$post->id.'/edit')}}" class="yellow accent-3 darken-2">Edit</v-btn>
			<v-btn href="{{url('/posts/'.$post->id.'/delete')}}" class="error">Delete</v-btn>
		</div>
	@endif
@stop