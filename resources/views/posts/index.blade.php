@extends('layouts.app')

@section('content')
<v-container>
	<modal-container v-if="showingTypes" class="modal-container">
		<manage-post-types></manage-post-types>
	</modal-container>
	<header class="padded">
		<h1 class="bigger">Posts</h1>
		<h2>Add a new post<v-btn color="primary" href="posts/create" icon><v-icon>add</v-icon></v-btn></h2>
	</header>
	<v-container>
            <v-toolbar>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                	<v-btn flat @click="pluckType('type-no-type')">Posts with no type</v-btn>
                    @foreach($types as $type)
						<v-btn @click="pluckType('type-{{$type->slug}}')" flat>{{$type->name}}</v-btn>
                    @endforeach
                    <v-btn flat @click="showTypes">Edit Post Types</v-btn>
                </v-toolbar-items>
            </v-toolbar>
        	<v-layout v-if="selected" class="padded" row wrap>
				<v-flex style="border-right: 1px solid black" class="text-xs-center padded" md1>Title</v-flex>
				<v-flex style="border-right: 1px solid black" class="text-xs-center padded" md1>Type</v-flex>
				<v-flex md10 class="padded">Content</v-flex>
        	</v-layout>
            <h3 v-if="!selected" class="text-xs-center">Select a Post type to see it.</h3>
			<div class="room-top">
				@foreach($posts as $post)
					<v-card class="hidden post-preview type-{{$post->type}}" href="{{route('posts.edit', $post->id)}}">
		            	<v-layout style="height: 350px; overflow: hidden;" row wrap>
							<v-flex style="border-right: 1px solid black" class="text-xs-center display-flex justify-center align-center" md1>{{$post->title}}</v-flex>
							<v-flex style="border-right: 1px solid black" class="text-xs-center display-flex justify-center align-center" md1>{{$post->type}}</v-flex>
							<v-flex md10>{!! $post->content !!}</v-flex>
		            	</v-layout>
		            </v-card>
		            <br>
				@endforeach				
			</div>
	</v-container>
</v-container>
@stop