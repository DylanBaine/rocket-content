<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){

    	$header = \App\HomePageHeader::orderBy('id', 'desc')->take(1)->get();

    	$aboutMe = \App\AboutMe::orderBy('id', 'desc')->take(1)->get();

    	$skillSet= \App\SkillSet::orderBy('id', 'desc')->take(1)->get();

    	$portfolio = \App\Portfolio::orderBy('id', 'desc')->get();

    	return view('front-end.welcome', compact('header', 'aboutMe', 'skillSet', 'portfolio') );
    }

}
