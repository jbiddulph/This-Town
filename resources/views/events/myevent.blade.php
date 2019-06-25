@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
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
                                    <td>
                                        @if(empty(Auth::user()->venue->logo))
                                            <img src="{{asset('avatar/avatar-icon.png')}}" width="80" />
                                        @else
                                            <img src="{{asset('uploads/logo')}}/{{Auth::user()->venue->logo}}" width="80" style="width: 100%" alt="">
                                        @endif
                                    </td>
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
            </div>
        </div>
    </div>
@endsection
