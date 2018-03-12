<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Setting;

class HomeController extends Controller
{
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

		$setting->icon = request('icon');
		$setting->title = request('title');

		$setting->save();

		return redirect()->back();
	}
}
