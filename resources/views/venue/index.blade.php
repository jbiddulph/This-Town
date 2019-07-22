@extends('layouts.app')

@section('content')
    @if(empty($venue->cover_photo))
        <div class="header-image">
            <img src="{{asset('avatar/avatar-icon.png')}}" width="80" />
        </div>
    @else
        <div class="header-image">&nbsp;
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="venue-title">{{$venue->vname}}</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="col-md-12">
            <div class="venue-profile">
                <div class="venue-desc">
                    @if(empty($venue->logo))
                        <img src="{{asset('avatar/avatar-icon.png')}}" style="width: 100px" alt="">
                    @else
                        <img src="{{asset('uploads/logo')}}/{{$venue->logo}}" style="width: 100px" alt="">
                    @endif
                </div>

                <h2>{{$venue->address}} {{$venue->address2}}, {{$venue->town}}, {{$venue->county}}</h2>
                <h3>{{$venue->postcode}}</h3>
                <h4>{{$venue->website}}</h4>
            </div>
            <div class="claim-venue">
                @if(1 != $venue->user_id)
                    <a href="{{ route('man.register', ['venue' => $venue])}}"> <button class="btn btn-outline-danger btn-sm" disabled>Venue Claimed</button></a>
                @else
                    <a href="{{ route('man.register', ['venue' => $venue])}}"> <button class="btn btn-success btn-sm">Claim Venue</button></a>
                @endif
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
<style>
.header-image {
    margin-top: -1.5rem;
    background-image: url({{asset('uploads/coverphoto')}}/{{$venue->cover_photo}});
    height: 420px;
    background-repeat: no-repeat;
    background-size: cover;


    content: "";
    display: block;

    width: 100%;
    z-index: -2;
    opacity: 0.8;
 }
</style>
@endsection

