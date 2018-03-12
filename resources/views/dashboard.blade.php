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
	<section>
		<header class="padded">
			<h1 class="bigger">Sitewide Settings</h1>
		</header>
		<section>
			<v-layout class="flex-center text-xs-center" row wrap>
				<v-flex md6 xs10 offset-md3 offset-xs1>
					<form action="{{route('user.edit')}}" method="post">
						<v-card class="text-xs-center padded-lg">

							{{csrf_field()}}
							{{method_field('put')}}

							<div class="margin-auto" style="width: 80%;">
								<v-text-field
									name="email"
									label="Email"
									value="{{Auth::user()->email}}"
								></v-text-field>
								<v-text-field
									name="name"
									label="name"
									value="{{Auth::user()->name}}"
								></v-text-field>

								<v-text-field
									name="password"
									type="password"
									label="New Password"
								></v-text-field>
							</div>

							<v-card-actions>
								<v-btn type="submit" color="primary" block>Save</v-btn>
							</v-card-actions>                        
							

						</v-card>
					</form>
				</v-flex>
			</v-layout>			
		</section>
	</section>
	<section>
		<header class="padded">
			<h1 class="bigger">Authentication Settings</h1>
		</header>
		<section>
			<v-layout class="flex-center text-xs-center" row wrap>
				<v-flex md6 xs10 offset-md3 offset-xs1>
					<form action="{{route('user.edit')}}" method="post">
						<v-card class="text-xs-center padded-lg">

							{{csrf_field()}}
							{{method_field('put')}}

							<div class="margin-auto" style="width: 80%;">
								<v-text-field
									name="email"
									label="Email"
									value="{{Auth::user()->email}}"
								></v-text-field>
								<v-text-field
									name="name"
									label="name"
									value="{{Auth::user()->name}}"
								></v-text-field>

								<v-text-field
									name="password"
									type="password"
									label="New Password"
								></v-text-field>
							</div>

							<v-card-actions>
								<v-btn type="submit" color="primary" block>Save</v-btn>
							</v-card-actions>                        
							

						</v-card>
					</form>
				</v-flex>
			</v-layout>
		</section>
	</section>


</v-container>

@stop