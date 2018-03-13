@extends('layouts.app')

@section('content')
	<v-layout row wrap>
		<header class="padded-lg">
			<h1 class="bigger">Add a Post</h1>
		</header>
		<v-card style="margin-top: 30px;" class="flex md8 offset-md2 padded">		
			<form action="{{route('posts.store')}}" method="post">

				{{csrf_field()}}

				<v-text-field
					v-model="postName"
					name="title"
					label="Name"
					required
				></v-text-field>

				<v-text-field
					v-model="postSlug"
					name="slug"
					label="Slug"
					required
				></v-text-field>

				<v-select
					v-model="postType"
					label="Type"
					:items="typeOptions"
					item-value="slug"
					item-text="name"
					required
				></v-select>

				<v-checkbox label="Active" v-model="postActive"></v-checkbox>

				<input type="hidden" name="type" :value="postType">
				<input type="hidden" name="active" :value="postActive">

				<textarea name="content" id="builder" rows="30"></textarea>

				<v-card-actions>
					<v-btn type="submit" color="primary" block>Save</v-btn>
				</v-card-actions>

			</form>
		</v-card>
	</v-layout>
@stop