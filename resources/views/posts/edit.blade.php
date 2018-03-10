@extends('layouts.app')

@section('content')
	<v-layout row wrap>
		<header class="padded-lg">
			<h1 class="bigger">Edit {{$post->type}}</h1>
		</header>
		<v-card style="margin-top: 30px;" class="flex md8 offset-md2 padded">		
			<form action="{{route('posts.update', $post->id)}}" method="post">

				{{csrf_field()}}
				{{method_field('put')}}

				<div>
					<label for="title"><h3> <v-icon>edit</v-icon> Title:</h3></label>
					<input class="custom" type="text" name="title" id="title" value="{{$post->title}}">
				</div>

				<div>
					<label for="slug"><h3> <v-icon>edit</v-icon> Slug:</h3></label>
					<input class="custom" type="text" name="slug" id="slug" value="{{$post->slug}}">
				</div>

				<div>
					<label for="type"><h3> <v-icon>edit</v-icon> Post Type:</h3></label>
					<select name="type" class="padded custom" id="type">
						@foreach($types as $option)
							<option {{$post->type == $option->slug ? 'selected' : ''}} value="{{$option->slug}}">{{$option->name}}</option>
						@endforeach
					</select>
				</div>

				<v-checkbox label="Active" v-model="postActive"></v-checkbox>

				<input type="hidden" name="active" :value="postActive">

				<textarea name="content" id="builder" rows="30">{!!$post->content!!}</textarea>

				<v-card-actions>
					<v-btn type="submit" color="primary" block>Save</v-btn>
				</v-card-actions>

			</form>
		</v-card>	
		<div class="pos-fixed bottom left">
			<v-btn href="{{url($post->slug)}}" class="yellow accent-3 darken-2">Visit</v-btn>
			<v-btn href="{{url('/posts/'.$post->id.'/delete')}}" class="error">Delete</v-btn>
		</div>
	</v-layout>
@stop