@extends('layouts.app')

@section('content')

<v-container grid-list-xl>
	@if($posts->count())

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
	@endif
	<section>
		<header class="padded">
			<h1 class="bigger">Sitewide Settings</h1>
		</header>
		<section>
			<v-layout class="flex-center text-xs-center" row wrap>
				<v-flex md6 xs10 offset-md3 offset-xs1>
					<form action="{{route('settings.edit')}}" method="post">
						<v-card class="text-xs-center padded-lg">

							{{csrf_field()}}
							{{method_field('put')}}

							<div class="margin-auto" style="width: 80%;">

								<label for="icon">Title Icon</label>
								<input type="hidden"
									id="icon" 
									role="uploadcare-uploader"
									name="icon"
									data-crop=""
									data-images-only="true" />
							   
								<v-text-field
									name="title"
									label="Site Title"
									name="title"
									value="{{$setting->title}}"
								></v-text-field>
							   
								<v-text-field
									name="top_left"
									label="Top Left Menu Text"
									value="{{$setting->menu_text}}"
								></v-text-field>

								<textarea name="footer" id="builder" rows="30">{!!$setting->footer!!}</textarea>

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
				<v-flex md3>
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
									label="Name"
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
				<v-flex md5>
					<form action="/register-user" method="post">
						<v-card class="text-xs-center padded-lg">

							<div class="padded">
								<h2>Add Users</h2>
							</div>

							{{csrf_field()}}

							<div class="margin-auto" style="width: 80%;">
								<v-text-field
									name="email"
									label="Email"
								></v-text-field>
								<v-text-field
									name="name"
									label="Name"
								></v-text-field>

								<v-text-field
									name="password"
									type="password"
									label="Password"
								></v-text-field>
							</div>

							<v-card-actions>
								<v-btn type="submit" color="primary" block>Save</v-btn>
							</v-card-actions>                        
							

						</v-card>
					</form>
				</v-flex>
				<v-flex md2>
					@foreach($users as $user)
						<v-card>
							<v-card-content>
								<p>{{$user->name}}</p>
								<p>{{$user->email}}</p>
							</v-card-content>
						</v-card>
					@endforeach
				</v-flex>
			</v-layout>
		</section>
	</section>


</v-container>

@stop