<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class FavouritejobController extends Controller
{
    //
    public function savejob($id) {
        $jobID = Job::find($id);
        $jobID->favouritejobs()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unsavejob($id) {
        $jobID = Job::find($id);
        $jobID->favouritejobs()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
