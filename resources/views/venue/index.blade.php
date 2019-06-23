@extends('layouts.app')

@section('content')
    @if(empty(Auth::user()->venue->cover_photo))
        <img src="{{asset('avatar/avatar-icon.png')}}" width="80" />
    @else
        <img src="{{asset('uploads/coverphoto')}}/{{Auth::user()->venue->cover_photo}}" style="width:100%;" />
    @endif
    <div class="container">
        <div class="col-md-12">
            <div class="venue-profile">
                <div class="venue-desc">
                    @if(empty(Auth::user()->venue->logo))
                        <img src="{{asset('avatar/avatar-icon.png')}}" style="width: 100px" alt="">
                    @else
                        <img src="{{asset('uploads/logo')}}/{{Auth::user()->venue->logo}}" style="width: 100px" alt="">
                    @endif
                </div>
            </div>

            <table class="table">
                <thead>
                <th>Logo</th>
                <th>Title</th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($venue->events as $event)
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

