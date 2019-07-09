@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{$event->title}}</div>

                    <div class="card-body">

                        <h3>Description</h3>
                        <p>{{$event->description}}</p>
{{--                        <h3>Duties</h3>--}}
{{--                        <p>{{$job->roles}}</p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info</div>

                    <div class="card-body">
                        <p>Venue: <a href="{{route('venue.index',[$event->venue->id, $event->venue->slug])}}">{{$event->venue->vname}}</a></p>
                        <p>Address: {{$event->venue->address}}</p>
                        <p>Type: {{$event->type}}</p>
                        <p>Cost: {{$event->event_price}}</p>
                        <p>Date: {{$event->created_at->diffForHumans()}}</p>

                    </div>
                </div>
                <div class="row actions">
                    <div class="col-md-6">
                        @if(Auth::check()&&Auth::user()->user_type=='seeker')
                            <span class="interest-btn">
                        @if(!$event->showInterest())
                                    <form action="{{route('showInterest', [$event->id])}}" method="POST">@csrf
                                <input type="hidden" name="status" value="Interested">
                                <button type="submit" class="btn btn-success" style="width: 100%;">Interested</button>
                            </form>
                                @else
                                    <button class="btn btn-success" disabled style="width: 100%;">Shown Interest</button>
                                @endif
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span class="attending-btn">
                        @if(!$event->checkAttending())
                                <form action="{{route('checkAttending', [$event->id])}}" method="POST">@csrf
                                <input type="hidden" name="status" value="Attending">
                                <button type="submit" class="btn btn-success" style="width: 100%;">Going</button>
                            </form>
                            @else
                                <button class="btn btn-success" disabled style="width: 100%;">Attending</button>
                            @endif
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
