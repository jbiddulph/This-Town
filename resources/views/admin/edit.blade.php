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
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form action="{{route('post.update',[$post->id])}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <textarea name="content" id="" cols="30" rows="6" class="form-control @error('content') is-invalid @enderror">{{$post->content}}</textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Image">Image</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                <img src="{{asset('storage/'.$post->image)}}" style="width: 100%;"/>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Town:</label>
                                        <select name="town" class="form-control  @error('town') is-invalid @enderror"">
                                        @foreach(App\Venue::distinct()->orderBy('town', 'ASC')->pluck('town') as $town)
                                            <option value="{{$town}}" {{$post->town==$town?'selected':''}}>{{$town}}</option>
                                            @endforeach
                                            </select>
                                            @error('town')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Status">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="0">Draft</option>
                                            <option value="1">Published</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
