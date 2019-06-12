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
    </div>
@endsection
<style>
    .fa, .fas {
        color: #3f9ae5;
    }
</style>
