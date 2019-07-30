@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Recent Events</h1>
            <table class="table">
                <thead>
                <th>Logo</th>
                <th>Title</th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td><img src="{{asset('avatar/avatar-icon.png')}}" width="80" /></td>
                        <td>Title: {{$event->title}} <br />
                            <i class="fas fa-clock"></i>&nbsp;{{$event->type}}
                        </td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Start Time: {{$event->event_startdate}}</td>
                        <td><i class="fas fa-calendar-alt"></i>&nbsp;Date: {{$event->created_at->diffForHumans()}}</td>
                        <td><a href="{{route('events.show', [$event->id, $event->slug])}}"> <button class="btn btn-success btn-sm">More</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
        <div>
            <a href="{{url(request('town').'/events/allevents')}}"><button class="btn btn-success btn-lg" style="width:100%;">Browse all events</button></a>
        </div>
        <br/>
        <br/>
        <h1>Featured Venues</h1>
    </div>
    <div class="container">
        <div class="row">

            @foreach($venues as $venue)
                <div class="col-md-3 venue-box">
                    <div class="card">
                        <div class="row">
                        <div class="col-sm-4">
                            <img src="{{asset('uploads/logo')}}/{{$venue->logo}}" width="80" />
                        </div>
                        <div class="col-sm-8">
                            <br />
                            {{$venue->address}}<br />
                            {{$venue->town}}<br />
                            {{$venue->region}}
                        </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{str_limit($venue->vname,23)}}</h5>
                            <p class="card-text">{{str_limit($venue->description,20)}}</p>
                            <a href="{{route('venue.index',[$venue->id,$venue->slug])}}" class="btn btn-primary">Visit Venue</a>
                        </div>
                    </div>
                </div>
            @endforeach
                {{$venues->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        </div>
    </div>
@endsection

<style>
    .fa, .fas {
        color: #3f9ae5;
    }
</style>
