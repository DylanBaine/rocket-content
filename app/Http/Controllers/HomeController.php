<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Setting;
use App\User;

class HomeController extends Controller
{
	public function index(){
		return redirect('/dashboard');
	}

	public function auth(){
		return Auth::user();
	}
	
	public function editCurrentUser(Request $request)
	{
		$user = Auth::user();

		$user->name = request('name');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));

		$user->save();
		 return redirect()->back();
	}

	public function editSettings(Request $request)
	{
		$setting = Setting::find(1);

		request('icon') ? $setting->icon = request('icon'): '';
		$setting->title = request('title');
		$setting->menu_text = request('top_left');
		$setting->footer = request('footer');
		request('header_color') ? $setting->header_color = request('header_color'): '';
		$setting->icon_in_top_left = request('icon_in_top_left');

		$setting->save();

		return redirect()->back();
	}

	public function register(Request $request)
	{
		$user = new User;

		$user->name = request('name');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));

		$user->save();

		return redirect()->back();
	}
}
