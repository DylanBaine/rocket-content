@extends('layouts.app')

@section('content')
	<v-container grid-list-xl fluid style="padding: 0;" class="post-{{$post->type}}">
		{!!$post->content!!}
	</v-container>
	@if(Auth::user())
		<div class="pos-fixed bottom left">
			<v-btn href="{{url('/posts/'.$post->id.'/edit')}}" class="yellow accent-3 darken-2">Edit</v-btn>
			<v-btn href="{{url('/posts/'.$post->id.'/delete')}}" class="error">Delete</v-btn>
		</div>
	@endif
@stop