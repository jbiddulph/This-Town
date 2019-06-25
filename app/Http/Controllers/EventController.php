<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Event;
use App\Venue;
use App\Http\Requests\EventPostRequest;

class EventController extends Controller
{
    public function index() {
        $events = Event::all()->take(10);
        return view('events.index', compact('events'));
    }

    public function show($id, Event $event) {

        return view('events.show', compact('event'));
    }

    public function create() {
        return view('events.create');
    }

    public function myevent() {
        $events = Event::where('user_id',auth()->user()->id)->get();
        return view('events.myevent', compact('events'));
    }

    public function store(EventPostRequest $request) {
        $user_id = auth()->user()->id;
        $venue = Venue::where('user_id',$user_id)->first();
        $venue_id = $venue->id;
//        echo request('title');
//        echo request('description');
//        echo request('event_startdate');
//        echo request('event_enddate');
//        echo request('event_starttime');
//        echo request('event_price');
//        echo request('eventcategory_id');
//        echo request('type');
//        echo request('status');
//        echo request('last_date');

        Event::create([
            'user_id'=>$user_id,
            'venue_id'=>$venue_id,
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'description'=>request('description'),
            'event_startdate'=>request('event_startdate'),
            'event_enddate'=>request('event_enddate'),
            'event_starttime'=>request('event_starttime'),
            'event_price'=>request('event_price'),
            'eventcategory_id'=>request('eventcategory_id'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date')
        ]);
        return redirect()->back()->with('message','Event posted successfully!');
    }
}
