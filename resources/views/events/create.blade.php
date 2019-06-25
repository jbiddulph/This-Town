@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create an event</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('event.store')}}" method="POST">@csrf
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
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"></textarea>
                                @if($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="role">Start date:</label>
                                <input type="date" name="event_startdate" class="form-control @error('event_startdate') is-invalid @enderror" value="{{ old('event_startdate') }}">
                                @if($errors->has('event_startdate'))
                                    <span class="invalid-feedback" role="event_startdate">
                                    <strong>{{$errors->first('event_startdate')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="role">End date:</label>
                                <input type="date" name="event_enddate" class="form-control @error('event_enddate') is-invalid @enderror" value="{{ old('event_enddate') }}">
                                @if($errors->has('event_enddate'))
                                    <span class="invalid-feedback" role="event_enddate">
                                    <strong>{{$errors->first('event_enddate')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="role">End Start time:</label>
                                <input type="time" name="event_starttime" class="form-control @error('event_starttime') is-invalid @enderror" value="{{ old('event_starttime') }}">
                                @if($errors->has('event_starttime'))
                                    <span class="invalid-feedback" role="event_starttime">
                                    <strong>{{$errors->first('event_starttime')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="role">End price:</label>
                                <input type="text" name="event_price" class="form-control @error('event_price') is-invalid @enderror" value="{{ old('event_price') }}">
                                @if($errors->has('event_price'))
                                    <span class="invalid-feedback" role="event_price">
                                    <strong>{{$errors->first('event_price')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="eventcategory_id" class="form-control">
                                    @foreach(App\Eventcategory::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" class="form-control">
                                    <option value="livemusic">Live music</option>
                                    <option value="outdoorfestival">Outdoor Festival</option>
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
                                <input type="date" name="last_date" class="form-control @error('last_date') is-invalid @enderror" value="{{ old('last_date') }}">
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
