<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
	public function EditCurrentUser(Request $request)
	{
		$user = Auth::user();

		$user->name = request('name');
		$user->email = request('email');
		$user->password = bcrypt(request('password'));

		$user->save();
		 return redirect()->back();
	}
}
