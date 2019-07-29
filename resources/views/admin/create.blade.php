@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <label for="Title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="content" id="" cols="30" rows="6" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Status">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="0">Draft</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
