<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
 ini_set('mongo.long_as_object', 1);
?>
<html>
<head>
    <title>Laravel Authentication Demo</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('packages/bootstrap/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('packages/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/bootstrap-datetimepicker.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('/js/jquery-2.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('packages/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/moment-with-locales.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">    
</head>
<body>
    <div id="container">
        <div id="nav">
            <ul>
                <li><a href="{{ URL::route('home', 'Home') }}">Home</a></li>
                @if(Auth::check())
                <li><a href="{{ URL::route('profile', 'Profile' ) }}">Profile</a></li>
                <li><a href="{{ URL::to('consults', 'create' ) }}">Add Consult</a></li>
                <li><a href="{{ URL::to('consults') }}">View Consults</a></li>
                <li><a href="{{ URL::to('admin') }}">Administration Panel</a></li>
                <li><a href="{{ URL::route('logout', 'Logout ('.Auth::user()->username.')') }}">Log out</a></li>
                @else
                <li><a href="{{ URL::route('login', 'Login') }}">Login</a></li>
                @endif
            </ul>
        </div><!-- end nav -->

        <!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
            <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
        @endif

        @yield('content')
    </div><!-- end container -->
</body>
</html>