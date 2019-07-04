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
                            @foreach($jobs as $job)
                                <tr>
                                    <td>


                                        @if(empty(Auth::user()->company->logo))
                                            <img src="{{asset('avatar/avatar-icon.png')}}" width="80" />
                                        @else
                                            <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="80" style="width: 100%" alt="">
                                        @endif

                                    </td>
                                    <td>Position: {{$job->position}} <br />
                                        <i class="fas fa-clock"></i>&nbsp;{{$job->type}}
                                    </td>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address: {{$job->address}}</td>
                                    <td><i class="fas fa-calendar-alt"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('jobs.show', [$job->id, $job->slug])}}"> <button class="btn btn-success btn-sm">Apply</button></a>
                                        <a href="{{route('job.edit', [$job->id])}}"><button class="btn btn-dark">Edit</button></a>
                                    </td>
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
