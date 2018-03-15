<?php

Route::get('/dashboard', function(){
	$posts = App\Post::orderBy('times_visited', 'DESC')->get();
	$users = App\User::get();
	return view('dashboard', compact('posts', 'users'));
})->middleware('auth');

Route::post('register-user', 'HomeController@register');

Route::put('edit-current-user', 'HomeController@editCurrentUser')->name('user.edit')->middleware('auth');

Route::put('edit-settings', 'HomeController@editSettings')->name('settings.edit')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostController', ['except' => ['show', 'destroy']]);
Route::get('/posts/{id}/delete', "PostController@destroy");

Route::resource('/component-api/photos', 'PhotoController', ['only' => ['index', 'store', 'update', 'destroy']]);

Route::resource('/component-api/post-types', 'PostTypeController');
Route::get('/component-api/menu', 'PostTypeController@menu');

Route::resource('/component-api/newsletter-subscribers', 'NewsletterSubscriberController', ['except' => ['create']]);

Route::resource('/emails', 'EmailController', ['only' => ['index', 'show', 'store', 'create']]);

Route::get('browse/{type}', 'PostTypeController@posts')->name('types.posts');

Route::get('/{post}', 'PostController@show')->name('posts.show');

Route::get('/', 'PostController@frontPage')->name('welcome');

Route::get('/register', function(){
	return redirect()->back();
});

