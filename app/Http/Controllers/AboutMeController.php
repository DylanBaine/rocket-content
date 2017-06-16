<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class AboutMeController extends Controller
{
	    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

	public function store( Request $request)
	{
		
		if($request->hasFile('image')){

			$file = $request->file('image');

			$filename = "profile-pic-" . time() . '.jpg';

			Image::make($file)->save(public_path('images/' . $filename));
		}else{
            $filename = null;
        }

		$aboutMe = new \App\AboutMe;

		$aboutMe->title = request('title');
		$aboutMe->image = $filename;
		$aboutMe->body = request('body');

		$aboutMe->save();

		return redirect('/');
	}

	public function show()
	{
		return redirect('/');
	}

	public function edit($id)
	{
        $aboutMe = \App\AboutMe::find($id);

        return view('back-end.cms.update-about-me', compact('aboutMe'));

	}

	public function update(Request $request, $id)
	{

        $aboutMe = \App\AboutMe::find($id);

        if($request->hasFile('image')){
        
            $file = $request->file('image');

            $filename = "home-header-" . time() . '.jpg';

            Image::make($file)->save(public_path('images/' . $filename));

            
        }else{
            $file =  File::get('images/' . $aboutMe->image);

            $filename = $aboutMe->image;
;
        }



        $aboutMe->title = $request->input('title');
        $aboutMe->body  = $request->input('body');
        $aboutMe->image = $filename;

        $aboutMe->save();

        return redirect('/');

	}

	public function destroy($id)
	{
        $aboutMe = \App\aboutMe::find($id);

        $aboutMe->delete();

        File::delete('images/' . $aboutMe->image);

        return redirect('/previous-updates');
	}

}
