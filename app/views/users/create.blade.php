@extends('layout')

@section('content')
<h1>New Doctor </h1>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'users')) }}

    
    <div class="form-group">
        {{ Form::label('username', 'Doctor') }}
        {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('specialty', 'Speciality') }}
        {{ Form::text('specialty', Input::old('specialty'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Confirm password') }}
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Add doctor !', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop