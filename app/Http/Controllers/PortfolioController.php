<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class PortfolioController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    

	public function index()
	{
		return redirect('/home');
	}

    public function show($id)
    {

    	return redirect('/');

    }

    public function store(Request $request)
    {

    	if($request->hasFile('image')){
            
    		$file = $request->file('image');

    		$filename = "portfolio-image-" . time() . '.jpg';

    		Image::make($file)->save(public_path('portfolios/images/' . $filename));
    	}

    	$portfolio = new \App\Portfolio;

    	$portfolio->title = request('title');
    	$portfolio->body  = request('body');
    	$portfolio->link  = request('link');
    	$portfolio->image = $filename;

    	$portfolio->save();

    	return redirect('/home');

    }

    public function edit($id)
    {
        $portfolio = \App\Portfolio::find($id);

        return view('back-end.cms.update-portfolio', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = \App\Portfolio::find($id);

        if($request->hasFile('image')){
        
            $file = $request->file('image');

            $filename = "portfolio-image-" . time() . '.jpg';

            Image::make($file)->save(public_path('images/' . $filename));

            
        }
        

        $portfolio->title = $request->input('title');
        $portfolio->body  = $request->input('body');
        $portfolio->link  = $request->input('link');
        $portfolio->image = $filename;

        $portfolio->save();

        return redirect('/');

    }

    public function destroy($id)
    {
        $portfolio = \App\Portfolio::find($id);

        File::delete('portfolios/images/' . $portfolio->image);

        $portfolio->delete();

        return redirect('/home');
    }
}
