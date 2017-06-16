<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@welcome');



//----------- CMS -----------//
Route::get('/update-content', 'BackendPagesController@editPage');
Route::get('/previous-updates', 'BackendPagesController@previousUpdates');
Route::get('/home', 'BackendPagesController@home');

Route::resource('/main-header', 'HomePageHeaderController');
Route::resource('/about-me', 'AboutMeController');
Route::resource('/skill-set', 'SkillSetController');
Route::resource('/portfolio', 'PortfolioController');
Route::resource('/message', 'MessagesController');

Route::get('/pencil-rocket', function(){
	return view('demo.pencil-rocket');
});

Auth::routes();

//Route::get('/register', function(){
//	return redirect('/');
//});

//Route::get('/home', 'HomeController@index');
