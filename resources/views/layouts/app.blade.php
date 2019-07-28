<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/solid.css" integrity="sha384-ypqxM+6jj5ropInEPawU1UEhbuOuBkkz59KyIbbsTu4Sw62PfV3KUnQadMbIoAzq" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/fontawesome.css" integrity="sha384-NnhYAEceBbm5rQuNvCv6o4iIoPZlkaWfvuXVh4XkRNvHWKgu/Mk2nEjFZpPQdwiz" crossorigin="anonymous">
</head>

<div>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div class="navbar-brand" href="{{ url('/') }}">
                    </div>
                {{--<form action="{{route('main'), [$venue->town]}}" method="POST">@csrf--}}
                <form action="/town/town" id="town-select" class="town-select" method="GET">@csrf

                        <select name="town" class="form-control">
                            <option value="">-select-</option>
                            @foreach($venuelist as $town)
                                <option value="{{$town}}" {{ request('town') === $town ? 'selected' : '' }}>{{$town}}</option>
                            @endforeach

{{--                            @foreach($venuelist as $venue)--}}
{{--                                <option value="{{$venue->town}}" {{ request('town') === $venue->town ? 'selected' : '' }}>{{$venue->town}}</option>--}}
{{--                            @endforeach--}}
                        </select>

                </form>

{{--                    {{ config('app.name', 'Visit Worthing') }}--}}

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <li class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto main-links">
                        <li class="nav-item"><a class="nav-link" href="{{url(request('town').'/jobs')}}">Jobs</a> </li>
                        <li class="nav-item"><a class="nav-link" href="{{url(request('town').'/events')}}">Events</a> </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Register
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        {{--<a class="dropdown-item" href="{{ route('manager.register') }}">{{ __('Manager Register') }}</a>--}}

                                        <a class="dropdown-item" href="{{ route('employer.register') }}">{{ __('Employer Register') }}</a>


                                    @if (Route::has('register'))

                                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Job Seeker Register') }}</a>

                                    @endif
                                </div>
                            </li>
                        @else
                        @if(Auth::check()&&Auth::user()->user_type=='manager')
                            <li class="nav-item">
                                <a href="{{route('event.create')}}">
                                    <button class="btn btn-secondary">Post an Event</button>
                                </a>
                            </li>
                        @endif
                        @if(Auth::check()&&Auth::user()->user_type=='employer')
                            <li class="nav-item">
                                <a href="{{route('job.create')}}">
                                    <button class="btn btn-secondary">Post a Job</button>
                                </a>
                            </li>
                        @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->user_type=='employer')
                                        {{Auth::user()->company->cname}}
                                    @elseif(Auth::user()->user_type=='manager')
                                        {{Auth::user()->venue->vname}}
                                    @else
                                        {{Auth::user()->name}}
                                    @endif
                                        <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type=='employer')
                                        <a class="dropdown-item" href="{{ route('company.view') }}">
                                            {{ __('Company') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('my.job') }}">My Jobs</a>
                                        <a class="dropdown-item" href="{{ route('applicant') }}">My Applicants</a>
                                    @elseif(Auth::user()->user_type=='manager')
                                        <a class="dropdown-item" href="{{ route('venue.view') }}">
                                            {{ __('Venue') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('my.event') }}">My Events</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('profile.view') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Favourites') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    <input type="hidden" value="{{request('town')}}" class="requestedtown">
        <main class="py-4">
            @yield('content')
        </main>
    {{--<script type="text/javascript" src="{{mix('js/app.js')}}"></script>--}}
</div>
<!-- Scripts -->
<script defer src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script   defer src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( ".datepicker" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    } );


        $(function () {
            $(".town-select").change(function() {
                $("#town-select").submit();
            });
        });
    if($('.requestedtown').val() != ''){
        $("ul.main-links").show();
    } else {
        $("ul.main-links").hide();
    }

</script>
</body>
</html>
