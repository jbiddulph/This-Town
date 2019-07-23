@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="" method="GET">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="Keyword">Keyword&nbsp;</label>
                        <input type="text" name="title" class="form-control">&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label for="Keyword">Event type&nbsp;</label>
                        <select name="type" class="form-control">
                            <option value="">-select-</option>
                            <option value="livemusic">Live music</option>
                            <option value="outdoor">Outdoor Festival</option>
                            <option value="casual">Casual</option>
                        </select>
                        &nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label for="category">Category&nbsp;</label>
                        <select name="eventcategory_id" class="form-control">
                            <option value="">-select-</option>
                            @foreach(App\Eventcategory::all() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <label for="venue">Venue&nbsp;</label>
                        <select name="venue_id" class="form-control">
                            <option value="">-select-</option>
                            @foreach(App\Venue::where('town',request('town'))->get() as $venue)
                                <option value="{{$venue->id}}">{{$venue->vname}}</option>
                            @endforeach
                        </select>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>
                </div>
            </form>
            <h1>All Events in {{request('town')}}</h1>
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
            {{$events->links()}}
        </div>
    </div>

@endsection
<style>
    .fa, .fas {
        color: #3f9ae5;
    }
</style>
