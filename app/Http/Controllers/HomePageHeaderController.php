<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class HomePageHeaderController extends Controller
{
    public function store(Request $request)
    {    	

    	if($request->hasFile('image')){
            
    		$file = $request->file('image');

    		$filename = "home-header-" . time() . '.jpg';

    		Image::make($file)->save(public_path('images/' . $filename));
    	}else{
            $filename = null;
        }

    	$homeHeader = new \App\HomePageHeader;

    	$homeHeader->title = request('title');
    	$homeHeader->body  = request('body');
    	$homeHeader->image = $filename;

    	$homeHeader->save();

    	return redirect('/');	

    }

    public function show()
    {
        return redirect('/');
    }

    public function edit($id)
    {
        $homeHeader = \App\HomePageHeader::find($id);

        return view('back-end.cms.update-master-header', compact('homeHeader'));
    }

    public function update(Request $request, $id)
    {
        $homeHeader = \App\HomePageHeader::find($id);

        if($request->hasFile('image')){
        
            $file = $request->file('image');

            $filename = "home-header-" . time() . '.jpg';

            Image::make($file)->save(public_path('images/' . $filename));

            
        }else{
            $file =  File::get('images/' . $homeHeader->image);

            $filename = $homeHeader->image;
;
        }



        $homeHeader->title = $request->input('title');
        $homeHeader->body  = $request->input('body');
        $homeHeader->image = $filename;

        $homeHeader->save();

        return redirect('/');

    }

    public function destroy($id)
    {
        $homeHeader = \App\HomePageHeader::find($id);

        File::delete('images/' . $homeHeader->image);

        $homeHeader->delete();

        return redirect('/previous-updates');
    }
}
