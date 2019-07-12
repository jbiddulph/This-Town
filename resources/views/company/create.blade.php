@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img src="{{asset('avatar/avatar-icon.png')}}" width="80" style="width: 100%" alt="">
                @else
                    <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="80" style="width: 100%" alt="">
                @endif
                <br/>
                <br/>
                <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Update Logo
                        </div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="company_logo">
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
                    <div class="card-header">Update your company information</div>
                    <form action="{{route('company.store')}}" method="POST">@csrf

                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{Auth::user()->company->phone}}">
                            </div>

                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website" value="{{Auth::user()->company->website}}">
                            </div>

                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="slogan" value="{{Auth::user()->company->slogan}}">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">{{Auth::user()->company->description}}</textarea>
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
                    <div class="card-header">About your company</div>
                    <div class="card-body">
                        <p>Namexx: {{Auth::user()->company->cname}}</p>
                        <p>Address: {{Auth::user()->company->address}}</p>
                        <p>Phone: {{Auth::user()->company->phone}}</p>
                        <p>Website: <a href="http://{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
                        <p>Slogan: {{Auth::user()->company->slogan}}</p>
                        <p>Description: {{Auth::user()->company->description}}</p>
                        <p>Company Page: <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                    </div>
                </div>
                <br />
                <form action="{{route('ccover.photo')}}" method="POST" enctype="multipart/form-data">
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
