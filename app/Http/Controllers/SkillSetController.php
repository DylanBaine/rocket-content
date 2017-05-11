<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class SkillSetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }


    
    public function store(Request $request)
    {

        if($request->hasFile('image')){
            
            $file = $request->file('image');

            $filename = "skill-sets-image" . time() . '.jpg';

            Image::make($file)->save(public_path('images/' . $filename));
        }else{
            $filename = null;
        }

        $skillSet = new \App\SkillSet;

        $skillSet->title = request('title');
        $skillSet->body  = request('body');
        $skillSet->image = $filename;

        $skillSet->save();

        return redirect('/');

    }

    public function edit($id)
    {
        $skillSet = \App\SkillSet::find($id);

        return view('back-end.cms.update-skill-set', compact('skillSet'));
    }

    public function update(Request $request, $id)
    {
        $skillSet = \App\SkillSet::find($id);

        if($request->hasFile('image')){
        
            $file = $request->file('image');

            $filename = "skill-set" . time() . '.jpg';

            Image::make($file)->save(public_path('images/' . $filename));

            
        }else{
            $file =  File::get('images/' . $skillSet->image);

            $filename = $skillSet->image;
;
        }



        $skillSet->title = $request->input('title');
        $skillSet->body  = $request->input('body');
        $skillSet->image = $filename;

        $skillSet->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $skillSet = \App\SkillSet::find($id);

        File::delete('images/' . $skillSet->image);

        $skillSet->delete();

        return redirect('/previous-updates');
    }

}
