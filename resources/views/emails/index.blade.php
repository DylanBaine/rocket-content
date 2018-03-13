@extends('layouts.app')

@section('content')
<v-container>
	<header class="padded">
		<h1 class="bigger">Emails</h1>
		<h2>Send a new email.<v-btn color="primary" href="emails/create" icon><v-icon>add</v-icon></v-btn></h2>
	</header>
	<v-container>
		<div class="room-top">
        	<v-layout row wrap>
				<v-flex style="border-right: 1px solid black" class="text-xs-center padded" md3>Sent To</v-flex>
				<v-flex md9 class="padded">Content</v-flex>
        	</v-layout>
        	<br>
			@foreach($emails as $email)
				<v-card href="{{route('emails.show', $email->id)}}" class="email-preview">
	            	<v-layout row wrap style="height: 300px; overflow: hidden;">
						<v-flex style="border-right: 1px solid black" class="text-xs-center display-flex align-center justify-center padded" md3>{{str_limit($email->to, 200)}}</v-flex>
						<v-flex md9 class="padded"><div style="width: 70%; margin: 0 auto;">{!! $email->content !!}</div></v-flex>
	            	</v-layout>
	            </v-card>
	            <br>
			@endforeach
		</div>
	</v-container>
</v-container>
@stop