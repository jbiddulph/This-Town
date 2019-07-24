@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(Auth::user()->user_type==='seeker')
            <h2>Favourite Jobs</h2>
            @foreach($jobs as $job)
            <div class="card">
                <div class="card-header">{{$job->title}}</div>
                <small class="badge badge-primary">{{$job->position}}</small>

                <div class="card-body">
                    {{$job->description}}
                </div>
                <div class="card-footer">
                    <span><a href="{{route('jobs.show', [$job->id, $job->slug])}}">Read</a></span>
                    <span class="float-right">Last Date: {{$job->last_date}}</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-md-6">

            <h2>Favourite Events</h2>
            @foreach($events as $event)
                <div class="card">
                    <div class="card-header">{{$event->title}}</div>
                    <small class="badge badge-primary">{{$event->event_startdate}} at {{$event->event_starttime}}</small>

                    <div class="card-body">
                        {{$event->description}}
                    </div>
                    <div class="card-footer">
                        <span><a href="{{route('events.show', [$event->id, $event->slug])}}">Read</a></span>
                        <span class="float-right">Type: {{$event->type}}</span>
                    </div>
                </div>
            @endforeach
                @endif
        </div>
    </div>
</div>
@endsection
