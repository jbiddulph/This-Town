<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class FavouriteeventController extends Controller
{
    //
    public function saveevent($id) {
        $eventID = Event::find($id);
        $eventID->favouriteevents()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unsaveevent($id) {
        $eventID = Event::find($id);
        $eventID->favouriteevents()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
