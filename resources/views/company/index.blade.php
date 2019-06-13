@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            <img src="{{asset('cover/tumblr-image-sizes-banner.png')}}" alt="" style="width:100%;">
            <div class="company-desc">
                <img src="{{asset('avatar/avatar-icon.png')}}" alt="" style="width:100px;">
                {{$company->description}}
                <h1>{{$company->cname}}</h1>
                <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp;
                Phone-{{$company->phone}}&nbsp;Website-{{$company->website}}</p>

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
            @foreach($company->jobs as $job)
                <tr>
                    <td><img src="{{asset('avatar/avatar-icon.png')}}" width="80" /></td>
                    <td>Position: {{$job->position}} <br />
                        <i class="fas fa-clock"></i>&nbsp;{{$job->type}}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address: {{$job->address}}</td>
                    <td><i class="fas fa-calendar-alt"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}</td>
                    <td><a href="{{route('jobs.show', [$job->id, $job->slug])}}"> <button class="btn btn-success btn-sm">Apply</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

