<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendPagesController extends Controller
{
	    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {   

        $messages = \App\Messages::latest()->get();

        $portfolio = \App\Portfolio::latest()->get();

        return view('back-end.cms.home', compact('portfolio', 'messages'));
    }

    public function editPage()
    {
    	return view('back-end.cms.edit');
    }

    public function previousUpdates()
    {
    	$HomePageHeaders = \App\HomePageHeader::latest()->get();

        $AboutMes = \App\AboutMe::latest()->get();

        $SkillSets = \App\SkillSet::latest()->get();

        $portfolio = \App\Portfolio::latest()->get();

    	return view('back-end.cms.previous-updates', compact('HomePageHeaders', 'AboutMes', 'SkillSets', 'portfolio'));
    }
}

//