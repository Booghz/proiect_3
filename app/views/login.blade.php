@extends('layout')

@section('content')
<h1>Login</h1>

    <!-- check for login error flash var -->
    @if (Session::has('flash_error'))
        <div id="flash_error">{{ Session::get('flash_error') }}</div>
    @endif

    {{ Form::open(array('url' => 'login','method' => 'POST')) }}

    <!-- username field -->
     <div class="form-group">
        {{ Form::label('username', 'Username') }}<br/>
        {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
     </div>

    <!-- password field -->
     <div class="form-group">
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password', array('class' => 'form-control')) }}
     </div>

    <!-- submit button -->
    <p>{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}</p>
    {{ Form::close() }}
@stop