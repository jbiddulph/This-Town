<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>array('main')]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Auth::user()->favouritejobs;
        $events = Auth::user()->favouriteevents;
        return view('home', compact('jobs', 'events'));
    }

    public function main($town)
    {
//$town = $request->input('town');

//        return view('main', compact('town'));
        return view('main')->with('town', $town);
    }
}
