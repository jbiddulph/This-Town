@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
        </div>
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><img src="{{asset('storage/'.$post->image)}}" width="80" /></td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->content,20)}}</td>
                    <td>{{$post->status}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td><button class="btn btn-primary btn-sm">Edit</button> <button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
