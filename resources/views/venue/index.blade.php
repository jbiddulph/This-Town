@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="venue-profile">
                <img src="{{asset('cover/tumblr-image-sizes-banner.png')}}" alt="" style="width:100%;">
                <div class="venue-desc">
                    <img src="{{asset('avatar/avatar-icon.png')}}" alt="" style="width:100px;">
                    {{$venue->description}}
                    <h1>{{$venue->vname}}</h1>
{{--                    <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp;--}}
{{--                        Phone-{{$company->phone}}&nbsp;Website-{{$company->website}}</p>--}}
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

