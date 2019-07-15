<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Event;
use App\Venue;
use App\Http\Requests\EventPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager',['except'=>array('index','show','showInterest','checkAttending','allEvents')]);
    }

    public function index() {
        $events = Event::latest()->limit(10)->where('status',1)->get();
        $venues = Venue::get()->random(12);
        return view('events.index', compact('events','venues'));
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

    public function edit($id) {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id) {
//        dd($request->all());
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->back()->with('message', 'Event updated successfully!');
    }

    public function interestsAttending() {
        $users = DB::table('users')
            ->join('event_user', 'users.id', '=', 'event_user.user_id')
            ->join('events', 'event_user.event_id', '=', 'events.id')
            ->select('users.*', 'event_user.status')
            ->where("event_user.status","=","Attending ")
            ->get();

        $attendees = Event::has('users')->where('user_id',auth()->user()->id)->get();
        return view('events.attendees', compact('attendees', 'users'));
    }

    public function showInterests() {
        $attendees = Event::has('users')->where('user_id',auth()->user()->id)->where('status','Interested')->get();
        return view('events.attendees', compact('attendees'));
    }

    public function showAttending() {
        $attendees = Event::has('users')->where('user_id',auth()->user()->id)->where('status','Attending')->get();
        return view('events.attendees', compact('attendees'));
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

    public function showInterest(Request $request,$id) {
        $eventID = Event::find($id);
        $status = request('status');
        $eventID->users()->attach(Auth::user()->id, ['status' => $request->status]);
        return redirect()->back()->with('message','Shown Interest!');
    }

    public function checkAttending(Request $request,$id) {
        $eventID = Event::find($id);
        $eventID->users()->attach(Auth::user()->id, ['status' => $request->status]);
        return redirect()->back()->with('message','Shown Interest!');
    }
    public function allEvents(Request $request) {
        $keyword = $request->get('title');
        $type = $request->get('type');
        $category = $request->get('eventcategory_id');
        $venue_id = $request->get('venue_id');


        $events = Event::query();

        if ($keyword) {
            $events = $events->where('title','LIKE','%'.$keyword.'%');
        }

        if ($type) {
            $events = $events->where('type',$type);
        }

        if ($category) {
            $events = $events->where('eventcategory_id',$category);
        }

        if ($venue_id) {
            $events = $events->where('venue_id',$venue_id);
        }

        $events = $events->paginate(10);
        return view('events.allevents',compact('events'));
    }
}
