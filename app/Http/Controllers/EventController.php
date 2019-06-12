<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = Event::all()->take(10);
        return view('events.index', compact('events'));
    }

    public function show($id, Event $event) {

        return view('events.show', compact('event'));
    }
}
