@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($attendees as $attendee)
                        <div class="card-header"><a href="{{route('events.show', [$attendee->id, $attendee->slug])}}">{{$attendee->title}}</a></div>


                    <div class="card-body">
                        @foreach($attendee->users as $user)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Name: {{$user->name}}</td>
                                    <td>E-mail: {{$user->email}}</td>
                                    <td>Address: {{$user->profile->address}}</td>
                                    <td>Gender: {{$user->profile->gender}}</td>
                                    <td>Bio: {{$user->profile->bio}}</td>
                                    <td>Exp: {{$user->profile->experience}}</td>
                                    <td>{{$attendee->eu.status}}</td>
                                    <td><a href="{{\Illuminate\Support\Facades\Storage::url($user->profile->cover_letter)}}">Cover Letter</a></td>

                                </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
