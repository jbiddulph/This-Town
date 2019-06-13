@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
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
                <br/>
                <button class="btn btn-success" style="width: 100%;">Show Interest</button>
            </div>
        </div>
    </div>
@endsection
