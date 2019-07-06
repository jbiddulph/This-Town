@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a job</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('job.store')}}" method="POST">@csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            </div>
                            @if($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('title')}}</strong>
                                </span>
                            @endif

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{ old('roles') }}</textarea>
                                @if($errors->has('roles'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('roles')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="category" class="form-control">
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}">
                                @if($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('position')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('address')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" class="form-control">
                                    <option value="fulltime">Full Time</option>
                                    <option value="parttime">Part Time</option>
                                    <option value="casual">Casual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="1">live</option>
                                    <option value="0">draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="lastdate">Last date:</label>
                                <input type="text" name="last_date" class="form-control datepicker @error('last_date') is-invalid @enderror" value="{{ old('last_date') }}">
                                @if($errors->has('last_date'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('last_date')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
