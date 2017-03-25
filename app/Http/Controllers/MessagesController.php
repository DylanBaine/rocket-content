<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{

	public function index()
	{
		return redirect('/');
	}

    public function store()
    {
    	$this->validate(request(),[
    		'email' 	=> 'required',
    		'message' 	=> 'required'
    		]);

    	$message = new \App\Messages;

    	$message->name 		= request('name');
    	$message->email 	= request('email');
    	$message->subject 	=request('subject');
    	$message->message 	= request('message');

    	$message->save();

    	return redirect('/');
    }

    public function destroy($id)
    {
        $message = \App\Messages::find($id);

        $message->delete();

        return redirect('/home');
    }
}
