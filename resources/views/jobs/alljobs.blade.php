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
                    <label for="Keyword">Employment type&nbsp;</label>
                    <select name="type" class="form-control">
                        <option value="">-select-</option>
                        <option value="fulltime">Full Time</option>
                        <option value="parttime">Part Time</option>
                        <option value="casual">Casual</option>
                    </select>
                    &nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label for="category">Category&nbsp;</label>
                    <select name="category_id" class="form-control">
                            <option value="">-select-</option>
                        @foreach(App\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label for="Address">Address&nbsp;</label>
                    <input type="text" name="address" class="form-control">&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Search</button>
                </div>
            </div>
            </form>
            <h1>All Jobs</h1>
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
                        <td><img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" width="80" /></td>
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
            {{$jobs->links()}}
        </div>

    </div>

@endsection
<style>
    .fa, .fas {
        color: #3f9ae5;
    }
</style>
