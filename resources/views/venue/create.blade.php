@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->venue->logo))
                    <img src="{{asset('avatar/avatar-icon.png')}}" width="80" style="width: 100%" alt="">
                @else
                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->venue->logo}}" width="80" style="width: 100%" alt="">
                @endif
                <br/>
                <br/>
                <form action="{{route('venue.logo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Update Logo
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="venue_logo">
                            <br />
                            <button class="btn btn-dark float-right" type="submit">Update</button>
                            @if($errors->has('avatar'))
                                <div class="error" style="color: #ff0000;">{{$errors->first('avatar')}}</div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update your venue information</div>
                    <form action="{{route('venue.store')}}" method="POST">@csrf

                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" value="{{Auth::user()->venue->address}}">
                            </div>

                            <div class="form-group">
                                <label for="">Town</label>
                                <input type="text" class="form-control" name="town" value="{{Auth::user()->venue->town}}">
                            </div>

                            <div class="form-group">
                                <label for="">County</label>
                                <input type="text" class="form-control" name="county" value="{{Auth::user()->venue->county}}">
                            </div>

                            <div class="form-group">
                                <label for="">Postcode</label>
                                <input type="text" class="form-control" name="postcode" value="{{Auth::user()->venue->postcode}}">
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{Auth::user()->venue->phone}}">
                            </div>

                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website" value="{{Auth::user()->venue->website}}">
                            </div>

                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="slogan" value="{{Auth::user()->venue->slogan}}">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">{{Auth::user()->venue->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Latitude</label>
                                <input type="text" class="form-control" name="latitude" value="{{Auth::user()->venue->latitude}}">
                            </div>
                            <div class="form-group">
                                <label for="">Longitude</label>
                                <input type="text" class="form-control" name="longitude" value="{{Auth::user()->venue->longitude}}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-dark" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">About your venue</div>
                    <div class="card-body">
                        <p>Name: {{Auth::user()->venue->vname}}</p>
                        <p>Address: {{Auth::user()->venue->address}}</p>
                        <p>Phone: {{Auth::user()->venue->phone}}</p>
                        <p>Website: <a href="http://{{Auth::user()->venue->website}}">{{Auth::user()->venue->website}}</a></p>
                        <p>Slogan: {{Auth::user()->venue->slogan}}</p>
                        <p>Description: {{Auth::user()->venue->description}}</p>
                        <p>Venue Page: <a href="venue/{{Auth::user()->venue->slug}}">View</a></p>
                    </div>
                </div>
                <br />
                <form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Update Cover photo
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_photo">
                            <br />
                            <button class="btn btn-dark float-right" type="submit">Update</button>
                            @if($errors->has('cover_photo'))
                                <div class="error" style="color: #ff0000;">{{$errors->first('cover_photo')}}</div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
