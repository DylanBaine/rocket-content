@extends('layouts.app')

@section('content')
	<v-layout row wrap>
		<header class="padded-lg">
			<h1 class="bigger">Add a Post</h1>
		</header>
		<v-card style="margin-top: 30px;" class="flex md8 offset-md2 padded">		
			<form action="{{route('emails.store')}}" method="post">

				{{csrf_field()}}

				<div class="hidden">
					<label for="to"><v-icon>edit</v-icon>Send To (separated by commas)</label>
					<textarea ref="subInput" class="custom" name="to" id="to" cols="5">@foreach($subscribers as $subscriber){{$subscriber->email}}, @endforeach</textarea>
				</div>

				<div class="padded">
					<label for="subject"><v-icon>edit</v-icon>Subject</label>
					<input type="text" class="custom" name="subject" id="subject">
				</div>

				<div class="padded">
					<label for="content"><v-icon>edit</v-icon>Content</label>
					<textarea name="content" id="emailContent" rows="30" id="content"></textarea>
				</div>
		
				<v-card-actions>
					<v-btn @click="patience()" type="submit" color="primary" block>Send</v-btn>
				</v-card-actions>

			</form>
		</v-card>
	</v-layout>
@stop