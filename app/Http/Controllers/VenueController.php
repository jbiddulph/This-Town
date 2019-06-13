<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function index($id, Venue $venue) {
        return view('venue.index',compact('venue'));
    }
}
